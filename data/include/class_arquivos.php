<?php
/****************************************************************************
* data/include/class_arquivos.php
*
* Realiza acciones con los ficheros
*

PHPfileNavigator versión 2.3.2

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
* class PFN_Arquivos
*
* clase que realiza la mayoría de las acciones con fichero
* o directorios
*/
class PFN_Arquivos {
	var $conf;
	var $fp;
	var $niveles;
	var $vars;

	/**
	* function PFN_Arquivos (object $PFN_conf)
	*
	* recibe el objecto con los parametros de configuración y carga el objeto
	* gestor de las variables
	*/
	function PFN_Arquivos (&$PFN_conf) {
		global $PFN_vars;

		$this->conf = &$PFN_conf;
		$this->vars = &$PFN_vars;
	}

	/**
	* function niveles (object $PFN_niveles)
	*
	* recibe el objecto $PFN_niveles para funciones de directorio
	*/
	function niveles (&$PFN_niveles) {
		$this->niveles = &$PFN_niveles;
	}

	/**
	* function abrir (string $arq, string $modo)
	*
	* abre un fichero $arq en el $modo escogido
	*
	* return boolean
	*/
	function abrir ($arq, $modo='a+') {
		$cnt = 0;
		$bloqueo = ($modo == 'r')?LOCK_SH:LOCK_EX;
		$this->fp = false;

		while (true) {
			if ($cnt > 10) {
				return false;
			}

			if ($this->fp = @fopen($arq, $modo)) {
				if (flock($this->fp, $bloqueo)) {
					return true;
				}
			}

			$cnt++;
			$k = rand(0, 20);
			usleep(round($k * 10000));  # k * 10ms
		}

		return true;
	}

	/**
	* function ler (integer $bits)
	*
	* lee la longitud pedida de un fichero abierto
	*
	* return string
	*/
	function ler ($bits = 1024) {
		return @fread($this->fp, $bits);
	}

	/**
	* function escribir (string $texto)
	*
	* escribe en el fichero abierto la cadena $texto
	*
	* return boolean
	*/
	function escribir ($texto) {
		@fwrite($this->fp, $texto, strlen($texto));
	}

	/**
	* function pechar ()
	*
	* escribe en el fichero abierto la cadena $texto
	*/
	function pechar () {
		@flock($this->fp, LOCK_UN);
		@fclose($this->fp);
	}

	/**
	* function abre_escribe (string $arq, string $texto, string $modo)
	*
	* abre un fichero $arq en modo $modo y escribe la cadena $texto
	*
	* return boolean
	*/
	function abre_escribe ($arq, $texto, $modo='w') {
		if ($this->abrir($arq, $modo)) {
			$this->escribir($texto);
			$this->pechar();
			@chmod($arq,0644);

			return true;
		}
	}

	/**
	* function filtrar (string $cal)
	*
	* comprueba que un fichero no tiene un nombre no vaálido
	*
	* return boolean
	*/
	function filtrar ($cal) {
		foreach ($this->conf->g('oculto') as $v) {
			$v = str_replace('/', '\\/', $v);

			if (preg_match('/'.$v.'/i', $cal)) {
				return false;
			}
		}

		return true;
	}

	/**
	* function get_contido (string $cal, boolean $volcar)
	*
	* devuelve el contenido de un fichero, en caso de que
	* volcar sea true, lo hace mediante echo, sino mediante
	* cadena de texto
	*
	* return string
	*/
	function get_contido ($cal, $volcar=false) {
		$buffer = '';

		$fp = @fopen($cal, 'rb');

		if ($fp === false) {
			return false;
		}

		while (!feof($fp)) {
			if ($volcar) {
				echo fread($fp, (1024 * 1024));
			} else {
				$buffer .= fread($fp, (1024 * 1024));
			}

			flush();
		}

		fclose($fp);

		return $buffer;
	}

	/**
	* function array_contido (string $cal)
	*
	* devuelve el contenido de un fichero en un array por linea
	*
	* return array
	*/
	function array_contido ($cal) {
		return @file($cal);
	}

	/**
	* function permisos (string $cal, int $perms)
	*
	* SOLO FUNCIONA EN LINUX/UNIX, OMITIDO EN WINDOWS
	*
	* coloca los permisos $perms al archivo o directorio $cal
	*
	* return boolean
	*/
	function permisos ($cal, $perms) {
		return @chmod($cal, $perms);
	}

	/**
	* function comprime (string $orixe, string $destino, integer $nivel)
	*
	* función que comprime un fichero $orixe devolviendo el estado de
	* comprimirlo en el $destino, con un nivel de compresión $nivel
	*
	* return boolean
	*/
	function comprime ($orixe, $destino, $nivel=false) {
		$erro = false;
		$modo = 'wb'.$nivel;

		if ($fp_out = gzopen($destino,$modo)) {
			if ($fp_in = fopen($orixe,'rb')) {
				while (!feof($fp_in)) {
					gzputs($fp_out,fread($fp_in,1024*512));
				}

				fclose($fp_in);
			} else {
				$erro = true;
			}

			gzclose($fp_out);
		} else {
			$erro = true;
		}

		return $erro;
	}

	/**
	* function editable (string $cal)
	*
	* comprueba si el fichero $cal está entre la lista de editables
	*
	* return boolean
	*/
	function editable ($cal) {
		$ext = explode('.',$cal);

		if (count($ext) > 1) {
			$ext = strtolower(end($ext));
		} else {
			$ext = '';
		}

		return in_array($ext, $this->conf->g('editables'));
	}

	/**
	* function crear_htpasswd (string $dir)
	*
	* crea un fichero .htpasswd para permitir protección
	* mediante contraseñas para un directorio
	*/
	function crear_htpasswd ($dir) {
		$htpasswd = $this->vars->post('ht_usuario').':'
			.crypt($this->vars->post('ht_contrasinal'), CRYPT_STD_DES);

		$this->abre_escribe("$dir.htpasswd", $htpasswd);

		$htaccess = "AuthUserFile '$dir.htpasswd'"
			."\nAuthName '".$this->conf->t('msx_htpasswd')."'"
			."\nAuthType Basic"
			."\nrequire valid-user";

		$this->abre_escribe("$dir.htaccess", $htaccess);
	}

	/**
	* function eliminar_htpasswd (string $dir)
	*
	* elimina los ficheros .htpasswd y un .htaccess para desproteger un
	* directorio
	*/
	function eliminar_htpasswd ($dir) {
		if (is_file("$dir.htpasswd")) {
			@unlink("$dir.htpasswd");
			@unlink("$dir.htaccess");
		}
	}

	/**
	* function vale_extraer (string $arq, boolean $ver=false)
	*
	* Comprueba si un fichero tiene la extensión valida para poder ser
	* descomprimido en el servidor
	*
	* Si $ver es true, tambien acepta los 'ZIP' solo para visulaizar el
	* contenido
	*
	* return boolean
	*/
	function vale_extraer ($arq, $ver=false) {
		$ext = explode('.', $arq);
		$ext = strtolower(end($ext));
		$valen = array(
			'tar' => 'tar',
			'gzip' => 'gzip',
			'gz' => 'gzip',
			'tgz' => 'gzip',
			'bzip' => 'bzip',
			'bzip2' => 'bzip',
			'bz' => 'bzip',
			'bz2' => 'bzip'
		);

		if ($ver && ($ext == 'zip')) {
			if ($this->conf->g('permisos', 'ver_comprimido')
			&& is_file($arq)) {
				return true;
			}
		} else {
			if ($this->conf->g('zlib')
			&& in_array($valen[$ext], $this->conf->g('valen_extraer'))
			&& is_file($arq)) {
				if ($ver && $this->conf->g('permisos', 'ver_comprimido')) {
					return true;
				} elseif ($this->conf->g('permisos', 'extraer')) {
					return true;
				}
			}
		}

		return false;
	}

	/**
	* function comprobar_sintaxis (string $texto, boolean $arq)
	*
	* Función que chequea la sintaxis de un texto recibido
	* o de un fichero PHP en caso de que arq sea true
	*
	* return array
	*/
	function comprobar_sintaxis ($texto, $arq=false) {
		if ($arq && is_file($texto)) {
			$texto = $this->get_contido($texto);
		}

		$texto = preg_replace('/<\?(php)?/', '/*<?php*/', $texto);
		$texto = str_replace('?>', '/*?>*/', $texto);

		ob_start();
		eval($texto);
		$test = ob_get_contents();
		ob_end_clean();

		$texto = str_replace('/*<?php*/', '<?php', $texto);
		$texto = str_replace('/*?>*/', '?>', $texto);

		if (strlen($test)) {
			preg_match('/line <b>([0-9]+)<\/b>/', $test, $linha);
			$partes = explode("\n", $texto);

			$alertas['erro'] = str_replace('<br />', '', preg_replace('/ in <b>[^>]+>/', '', $test));
			$alertas['linha-1'] = $partes[$linha[1]-2];
			$alertas['linha'] = $partes[$linha[1]-1];
			$alertas['linha+1'] = $partes[$linha[1]+1];

			unset($partes);
			unset($test);

			return $alertas;
		} else {
			return '';
		}
	}
}
?>
