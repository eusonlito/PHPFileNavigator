<?php
/****************************************************************************
* data/include/mysql.php
*
* Ejecuta las instrucciones MySQL
*

PHPfileNavigator versión 2.3.0

Copyright (C) 2004-2005 Lito <lito@eordes.com>

http://phpfilenavigator.litoweb.net/

Este programa es software libre. Puede redistribuirlo y/o modificarlo bajo los
términos de la Licencia Pública General de GNU según es publicada por la Free
Software Foundation, bien de la versión 2 de dicha Licencia o bien (según su
elección) de cualquier versión posterior. 

Este programa se distribuye con la esperanza de que sea útil, pero SIN NINGUNA
GARANTÍA, incluso sin la garantía MERCANTIL implícita o sin garantizar la
CONVENIENCIA PARA UN PROPÓSITO PARTICULAR. Véase la Licencia Pública General de
GNU para más detalles. 

Debería haber recibido una copia de la Licencia Pública General junto con este
programa. Si no ha sido así, escriba a la Free Software Foundation, Inc., en
675 Mass Ave, Cambridge, MA 02139, EEUU. 
*******************************************************************************/

defined('OK') or die();

/**
* class PFN_MySQL
*
* realiza las operaciones básicas contra una base de datos MySQL
*/
class PFN_MySQL {
	var $conexion;
	var $resultado;
	var $depurar = true;
	var $imprimir = true;
	var $FILE = __FILE__;
	var $LINE;
	var $lock = false;
	var $conf;

	/**
	* function abre_conexion (object $PFN_conf)
	*
	* cubre los datos para conexión a base de datos
	* y realiza la conexión
	*/
	function abre_conexion (&$PFN_conf) {
		$this->conf = &$PFN_conf;

		// sql($host, $user, $password, $database);
		$d = array(
			$this->conf->g('db','host'),
			$this->conf->g('db','usuario'),
			$this->conf->g('db','contrasinal'),
			$this->conf->g('db','base_datos')
		);

		$this->conecta($d[0],$d[1],$d[2],$d[3]) or die(
			'No se pudo conectar a la base de datos'
		);
	}

	/**
	* function conecta (string $host, string $user, string $password, string $database)
	*
	* conecta con la base de datos y carga las variables necesarias
	*
	* return boolean
	*/
	function conecta ($host, $user, $password, $database) {
		$this->LINE = __LINE__+1;
		$this->conexion = @mysql_connect($host,$user,$password);

		if (!$this->conexion) {
			// No se ha podido conectar
			$this->rexistro_error("<b>HOST:</b> $host, <b>USER:</b> $user, <b>DATABASE:</b> $database", mysql_error());
			return false;
		}

		$this->LINE = __LINE__+1;
		if (!@mysql_select_db($database,$this->conexion)) {
			// no se ha podido conectar
			$this->rexistro_error("<b>DB:</b> $database", mysql_error());
		}

		return $this->conexion;
	}

	/**
	* function query (string $cadena)
	*
	* realiza una consulta y guarda el resultado
	*/
	function query ($cadena) {
		$this->resultado = @mysql_query($cadena);

		if (!$this->resultado) {
			$this->rexistro_error($cadena, mysql_error());
			return -1;
		} else {
			return true;
		}
	}

	/**
	* function actualizar (string $cadena)
	*
	* realiza una actualización en la base de datos
	*
	* return integer
	*/
	function actualizar ($cadena) {
		if ($this->query($cadena) === -1) {
			return -1;
		} else {
			return @mysql_affected_rows($this->conexion);
		}
	}

	/**
	* function fila (void)
	*
	* devuelve los datos de la fila actual del
	* resultado de una consulta
	*
	* return array
	*/
	function fila () {
		return @mysql_fetch_array($this->resultado);
	}

	/**
	* function desconectar (void)
	*
	* cierra la conexión con la base de datos
	*/
	function desconectar () {
		@mysql_close($this->conexion);
	}

	/**
	* function recuperar (string $query)
	*
	* realiza un consulta a la base de datos y
	* obtiene el array de resultados
	*
	* return array
	*/
	function recuperar ($query) {
		$this->query($query);
		$resultado = array();

		while ($algo = $this->fila()) {
			$resultado[] = $algo;
		}

		@mysql_free_result($this->resultado);

		return $resultado;
	}

	/**
	* function id_ultimo (void)
	*
	* devuelve el id del último registro insertado
	*
	* return integer
	*/
	function id_ultimo () {
		return @mysql_insert_id();
	}

	/**
	* function lock (mixed $tablas, string $modo)
	*
	* Bloquea las tablas recibidas en $tablas en modo WRITE/READ
	*/
	function lock ($tablas, $modo = 'WRITE') {
		if ($this->lock) {
			return true;
		}

		if (is_array($tablas)) {
			$cadena = 'LOCK TABLES '.implode(" $modo,", $tablas)." $modo;";
		} else {
			$cadena = "LOCK TABLES $tablas $modo;";
		}

		if (!@mysql_query($cadena)) {
			$file = $this->FILE;
			$line = $this->LINE;
			$this->FILE = __FILE__;
			$this->LINE = __LINE__-4;
			$this->rexistro_error("<b>LOCK:</b> $cadena", mysql_error());
			$this->LINE = $line;
			$this->FILE = $file;
			return -1;
		}

		$this->lock = true;
	}

	/**
	* function unlock ()
	*
	* Desbloquea las tablas bloqueadas con LOCK
	*/
	function unlock () {
		if ($this->lock) {
			if (!@mysql_query("UNLOCK TABLES;")) {
				$file = $this->FILE;
				$line = $this->LINE;
				$this->FILE = __FILE__;
				$this->LINE = __LINE__-4;
				$this->rexistro_error("<b>UNLOCK:</b> $cadena", mysql_error());
				$this->LINE = $line;
				$this->FILE = $file;
				return -1;
			}

			$this->lock = false;
		}
	}

	/**
	* function rexistro_error (string $query, string $erro)
	*
	* Escribe en el registro de errores $PFN_paths['logs'].'sql.log' los problemas
	* en consultas y conexiones
	*
	*/
	function rexistro_error ($query, $erro) {
		if (!$this->depurar) {
			return true;
		}

		$txt = '['.date('Y/m/d H:i:s').'] ['.$this->FILE.'] ['.$this->LINE.'] ['.$query.'] ['.$erro.']';

		if ($this->imprimir) {
			echo '<div class="aviso">'.$txt.'</div>';
		}

		if ($this->conf->g('logs','mysql')) {
			$arq = $this->conf->paths['logs'].$this->conf->g('logs','mysql');
			$ini = '';
			$cnt = 0;

			if (is_file($arq)) {
				while (true) {
					if ($cnt > 10) {
						return false;
					}

					if ($fp = @fopen($arq, 'a+')) {
						if (@flock($fp, LOCK_EX)) {
							break;
						}

						@fclose($fp);
					}

					$cnt++;
					$k = rand(0, 20);
					usleep(round($k * 10000));  # k * 10ms
				}

				if (!$fp) {
					return false;
				}
			} else {
				if ($fp = @fopen($arq,'w')) {
					flock($fp, LOCK_EX);

					$ini = '<?php'."\n"
						.'// $log[] = [fecha/date] [fichero/file] [linea/line] [query] [error]';
				} else {
					return false;
				}
			}

			fwrite($fp, "$ini\n".'$log[] = \''.addslashes($txt).'\';');
			flock($fp, LOCK_UN);
			fclose($fp);
		}
	}
}

$PFN_dbsql = new PFN_MySQL;
?>
