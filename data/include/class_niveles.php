<?php
/*******************************************************************************
* data/include/class_niveles.php
*
* Procesa y devuelve el contenido de los directorios
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
* class PFN_Niveles
*
* clase que navega, realiza operaciones y obtiene su contenido
*/
class PFN_Niveles {
	var $conf;
	var $handle;
	var $nivel;
	var $arbore_txt;
	var $completo;
	var $imaxes;
	var $indice = 0;
	var $posicion = 0;
	var $opc_orde = array('nome','data','tamano','tipo'); // Ver 'Columnas' en configuración
	var $cnt = array();
	var $peso_real = false;

	/**
	* function PFN_Niveles (object &$PFN_conf)
	*
	* recibe el objecto $PFN_conf con los parametros de configuración
	*/
	function PFN_Niveles (&$PFN_conf) {
		$this->conf = &$PFN_conf;
	}

	/**
	* function imaxes (object &$PFN_conf)
	*
	* recibe el objecto $PFN_conf con los parametros de configuración
	*/
	function imaxes (&$PFN_imaxes) {
		$this->imaxes = &$PFN_imaxes;
	}

	/**
	* function e_dir (string $dir)
	*
	* pregunta si $dir es un directorio
	*
	* return string
	*/
	function e_dir ($dir='') {
		return @is_dir(empty($dir)?$this->nivel:$dir);
	}

	/**
	* function pon_nivel (string $nivel)
	*
	* coloca como nivel actual a $nivel
	*/
	function pon_nivel ($nivel) {
		$this->nivel = $nivel;
	}

	/**
	* function abre_nivel (void)
	*
	* abre el $this->nivel actual y empieza su lectura
	* tanto en Windows como Linux los dos primeros
	* readdir devolverán '..' y '.'
	*/
	function abre_nivel () {
		$this->handle = @opendir($this->nivel);
	}

	/**
	* function lee_nivel (void)
	*
	* lee el elemento actual contenido en el directorio
	* en caso de finalizar, cierra el apuntador
	*
	* return string
	*/
	function lee_nivel ($nivel='') {
		$temp = '.';
		$this->nivel = empty($nivel)?$this->nivel:$nivel;

		if (!$this->handle) $this->abre_nivel();

		while ($temp == '.' || $temp == '..') {
			$temp = @readdir($this->handle);
		}

		 return $temp?$temp:$this->pecha_nivel();
	}

	/**
	* function pecha_nivel (void)
	*
	* cierra el directorio actual
	*/
	function pecha_nivel () {
		@closedir($this->handle);
		$this->handle = false;
	}

	/**
	* function get_contido (string $nivel, string $orde, string $pos, boolean $PFN_arbore)
	* $nivel: directorio a leer
	* $orde: campo por el cual ordenar el contenido
	* $pos: orden Ascendente o Descendente
	* $PFN_arbore: si esta activa solo carga el nombre y evita cargar toda la
	*		información de los ficheros como tamaño, fecha, permisos, ...
	*
	* lee el contenido de un directorio, lo ordena, lo pagina
	* y devuelve el resultado
	*
	* return array
	*/
	function get_contido ($nivel, $orde='nome', $pos='ASC', $PFN_arbore=false) {
		$lista = &$this->carga_contido($nivel,true,$PFN_arbore);
		$datos = &$this->ordena($lista, $orde, $pos);
		$this->paxina($datos);

		return $datos;
	}

	/**
	* function carga_contido (string $nivel, boolean $completo, boolean $PFN_arbore)
	* $nivel: directorio a leer
	* $completo: cargar todo el contenido o solo los directorios
	* $PFN_arbore: si esta activa solo carga el nombre y evita cargar toda la
	*		información de los ficheros como tamaño, fecha, permisos, ...
	*
	* obtiene todo el contenido de un directorio o solo los directorios
	* segun el valor del parametro $completo (true/false)
	*
	* return array
	*/
	function carga_contido ($nivel, $completo=true, $PFN_arbore=false) {
		$this->nivel = $nivel;
		$lista['nome'] = $lista['data'] = $lista['tamano'] = $lista['tipo'] = array();
		$arqs = false;

		if ($this->e_dir()) {
			while ($arq = $this->lee_nivel()) {
				if ($completo || $this->e_dir($this->nivel.'/'.$arq)) {
					$lista['nome'][] = $arq; 

					if ($PFN_arbore) {
						$peso = PFN_espacio_disco($this->nivel.'/'.$arq);
						$this->cnt['peso'] += $peso;
					} else {
						if ($this->conf->g('columnas','tipo')) {
							$ext = explode('.',$arq);
							$lista['tipo'][] = end($ext);
						} if ($this->conf->g('columnas','data')) {
							$lista['data'][] = @filectime($this->nivel.'/'.$arq);
						} if ($this->conf->g('columnas','tamano')) {
							$peso = PFN_espacio_disco($this->nivel.'/'.$arq);
							$lista['tamano'][] = $peso;
							$this->cnt['peso'] += $peso;
						} if ($this->conf->g('columnas','permisos')) {
							$lista['permisos'][] = @fileperms($this->nivel.'/'.$arq);
						}
					}
				}
			}
		}

		return $lista;
	}

	/**
	* function ordena (array &$lista, string $orde, string $pos)
	* $lista: array con el contenido del directorio
	* $orde: campo por el cual ordenar el contenido
	* $pos: orden Ascendente o Descendente
	*
	* filtra y ordena el contenido del directorio y devuelve el resultado
	*
	* return array
	*/
	function ordena (&$lista, $orde, $pos) {
		$datos['dir']['nome'] = $datos['arq']['nome'] = array();
		$datos['dir']['data'] = $datos['arq']['data'] = array();
		$datos['dir']['tamano'] = $datos['arq']['tamano'] = array();
		$datos['dir']['permisos'] = $datos['arq']['permisos'] = array();
		$datos['dir']['tipo'] = $datos['arq']['tipo'] = array();

		$orde = in_array($orde,$this->opc_orde)?$orde:'nome';

		if ($this->conf->g('orde_natural')) {
			@natcasesort($lista[$orde]);

			if ($pos == 'DESC') {
				$lista[$orde] = @array_reverse($lista[$orde], true);
			}
		} else {
			($pos == 'DESC')?@arsort($lista[$orde]):@asort($lista[$orde]);
		}

		foreach ($lista[$orde] as $k => $v) {
			if ($this->filtrar($lista['nome'][$k])) {
				$q = $this->e_dir($this->nivel.'/'.$lista['nome'][$k])?'dir':'arq';
				$this->cnt[$q]++;

				foreach ($datos['dir'] as $k2 => $v2) {
					$datos[$q][$k2][] = $lista[$k2][$k];
				}
			}
		}

		return $datos;
	}

	/**
	* function filtrar (string $cal)
	*
	* filtra por el nombre del fichero/directorio comparandolo
	* con las expresiones regulares de $this->conf->g('oculto')
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
	* function paxina (array &$datos)
	* $datos: array con el resultado de la ordenación y filtrado
	*
	* despues de la ordenación y filtrado, pagina la lista
	* quitando del inicio y del final según se necesite con
	* respecto a la posción actual del listado en navegación
	*
	* return array
	*/
	function paxina (&$datos) {
		$this->indice = 0;
		$this->inicio_lista($datos['dir']);
		$this->inicio_lista($datos['arq']);

		$this->indice = count($datos['arq']['nome'])+count($datos['dir']['nome']);

		$this->fin_lista($datos['arq']);
		$this->fin_lista($datos['dir']);
		$this->indice = 0;
	}

	/**
	* function posicion (integer $pos)
	*
	* situa la posición actual en la navegación por el contenido de un
	* directorio paginado
	*/
	function posicion ($pos=0) {
		$pos = intval($pos);
		$this->posicion = ($pos < -1)?0:$pos;
	}

	/**
	* function inicio_lista (array &$lista)
	* $lista: array con la lista de 'dir'/'arq'
	*
	* elimina elementos al principio del array, empezando por directorios
	* y a continuación ficheros, así conseguimos una ordenación estilo
	* windows que mantiene los directorios siempre al inicio
	*/
	function inicio_lista (&$lista) {
		if ($this->posicion == -1) {
			return true;
		}

		for (; $this->indice < $this->posicion && count($lista['nome']) > 0; $this->indice++) {
			foreach ($lista as $k => $v) {
				array_shift($lista[$k]);
			}
		}
	}

	/**
	* function fin_lista (array &$lista)
	* $lista: array con la lista de 'dir'/'arq'
	*
	* elimina elementos al final del array, empezando por ficheros
	* y a continuación directorios, así conseguimos una ordenación estilo
	* windows que mantiene los directorios siempre al inicio
	*/
	function fin_lista (&$lista) {
		if ($this->posicion == -1) {
			return true;
		}

		for (; $this->indice > $this->conf->g('paxinar') && count($lista['nome']) > 0; $this->indice--) {
			foreach ($lista as $k => $v) {
				array_pop($lista[$k]);
			}
		}
	}

	/**
	* function cnt (string $q)
	*
	* devuelve el contador de directorio ('dir') o ficheros ('arq')
	* que hay contenidos en un directorio
	*
	* return integer
	*/
	function cnt ($q) {
		return intval($this->cnt[$q]);
	}

	/**
	* function nome_correcto (string $nome)
	*
	* realiza una serie de comprobaciones y transformaciones
	* en un nombre de directorio/fichero dado para evitar
	* problemas :)
	*
	* return string
	*/
	function nome_correcto ($nome) {
		return preg_replace('/\.{2,}/','', PFN_check_nome($nome));
	}

	/**
	* function path_correcto (string $path)
	*
	* realiza una serie de comprobaciones y transformaciones
	* en una ruta de directorio dado para evitar
	* problemas :)
	*
	* return string
	*/
	function path_correcto ($path) {
		if (empty($path)) {
			return '.';
		}

		$path = str_replace(array('\\','/./'),array('/','/'),$path);
		$path = preg_replace('/\.{2,}/','',$path);
		$path = preg_replace('/\/+/','/',$path);
		$path = preg_replace('/\/$/','',$path);

		if (empty($path)
		|| ($path == './.')
		|| ($path == '/.')) {
			return '.';
		}

		return $path;
	}

	/**
	* function ultimo_path (string $cal)
	*
	* devuelve la última posición de una ruta dada
	*
	* return string
	*/
	function ultimo_path ($cal) {
		return basename($cal);
	}

	/**
	* function dir_destino (string $cal)
	*
	* obtiene la ruta destino para un elemento,
	* lo que hace es eliminar el último elemento
	* de una ruta
	*
	* return string
	*/
	function dir_destino ($cal) {
		return dirname($cal).'/';
	}

	/**
	* function get_tamano (string $cal, boolean $real)
	*
	* devuleve el tamaño total de un directorio, si el valor de $real es true
	* no hará la conversión a tamaño de bloque
	*
	* return string
	*/
	function get_tamano ($cal, $real=false) {
		$this->peso_real = $real;
		$this->cnt['peso'] = 0;

		if (is_dir($cal)) {
			$fp = @opendir($cal);

			$this->tamano_recursivo($cal, $fp);

			@closedir($fp);
		} else {
			$this->cnt['peso'] = PFN_espacio_disco($cal, $this->peso_real);
		}

		return $this->cnt['peso'];
	}

	/**
	* function tamano_recursivo (string $nivel, pointer $fp)
	*
	* recorre recursivamente los directorios y realiza el recuento de
	* peso de su contenido
	*/
	function tamano_recursivo ($nivel, $fp) {
		while ($arq = @readdir($fp)) {
			if ($arq == '.' || $arq == '..') {
				continue;
			}

			if ($this->e_dir("$nivel$arq")) {
				$fp2 = @opendir("$nivel$arq");

				$this->tamano_recursivo("$nivel$arq/", $fp2);

				@closedir($fp2);
			}

			$this->cnt['peso'] += PFN_espacio_disco("$nivel$arq", $this->peso_real);
		}
	}

	/**
	* function enlace (string $dir, string $cal, boolean $abs)
	*
	* $dir: es el directorio actual, a partir del $this->conf->g('raiz','web')
	* $cal: es el documento o directorio a enlazar
	* $abs: activa o desactiva el enlace absoluto (sin protocolo ni dominio)
	*
	* devuelve el enlace a un archivo o directorio
	*
	* return string
	*/
	function enlace ($dir, $cal, $abs=true) {
		$ok = '';
		$cad = $this->conf->g('raiz','web')
			.$this->path_correcto($dir.'/').'/'.$cal;

		foreach (explode('/', $cad) as $v) {
			$v = trim($v);
			$ok .= (empty($v) || $v == '.')?'':('/'.rawurlencode($v));
		}

		return ($abs?($this->conf->g('protocolo').$this->conf->g('raiz','host')):'').$ok;
	}
}
?>
