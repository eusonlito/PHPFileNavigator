<?php
/****************************************************************************
* data/include/class_conf.php
*
* Procesa y devuelve los datos de los ficheros de configuración (data/conf/)
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
* class PFN_Conf
*
* clase que carga y devuelve los parametros de configuración
* de conf/default.conf y carga los fichero auxiliares de idiomas
*/
class PFN_Conf {
	var $var = array();
	var $paths = array();
	var $txt = array();

	/**
	* function PFN_Conf (void)
	*
	* carga el email por defecto para contacto, y poder ser usardo en 
	* data/include/usuarios.php
	*/
	function PFN_Conf () {
		global $PFN_paths;

		$this->paths = &$PFN_paths;
		$this->var = @include_once ($this->paths['conf'].'basicas.inc.php');
	}

	/**
	* function inicial (string $cal)
	*
	* Carga el fichero de configuración por defecto
	*/

	function inicial ($cal='') {
		$cal = empty($cal)?$this->g('raiz','conf'):$cal;

		if (is_file($this->paths['conf'].$cal.'.inc.php')) {
			$mais = include_once ($this->paths['conf'].$cal.'.inc.php');
			$this->var = array_merge((array)$this->var, (array)$mais);
		}
	}

	/**
	* function carga (void)
	*
	* realiza la precarga del fichero de configuración
	* y del fichero de idioma básico
	*/
	function carga () {
		$this->inicial();
		$this->textos('web');
	}

	/**
	* function textos (string $texto)
	*
	* carga los textos del idioma
	*/
	function textos ($texto) {
		$arq = $this->paths['idiomas'].$this->g('idioma')."/$texto.inc.php";

		is_file($arq) or die(
			'Debes configurar correctamente el idioma en el fichero data/conf/basicas.inc.php'
			.'<br />You must configure correctly the language in the file data/conf/basicas.inc.php'
		);

		$txt = include ($arq);
		$this->txt = is_array($this->txt)?array_merge($this->txt, $txt):$txt;
	}

	/**
	* function p (string $v, string $p1, string $p2)
	* $v: valor que asignamos
	* $p1: indice 1 del array
	* $p2: indice 2 del array
	*
	* coloca un valor en el array de los valores de configuracion
	*/
	function p ($v, $p1, $p2='') {
		if (strlen($p2)) {
			$this->var[$p1][$p2] = $v;
		} else {
			$this->var[$p1] = $v;
		}
	}

	/**
	* function g (string $g1, string $g2)
	* $g1: indice 1 del array
	* $g2: indice 2 del array
	*
	* obtiene un valor del array con los valores de configuracion
	*
	* return string;
	*/
	function g ($g1, $g2='') {
		if (strlen($g2)) {
			return $this->var[$g1][$g2];
		} else {
			return $this->var[$g1];
		}
	}

	/**
	* function t (mixed $t1, mixed $t2)
	* $t1: indice 1 del array
	* $t2: indice 2 del array
	*
	* obtiene un texto relacionado con el indice $t1 y $t2
	*
	* return string
	*/
	function t ($t1, $t2='') {
		if (is_array($t1)) {
			if (count($t1) == 1) {
				return vsprintf($this->txt[$t1[0]], $t2);
			} else {
				return vsprintf($this->txt[$t1[0]][$t1[1]], $t2);
			}
		} else {
			if (strlen($t2)) {
				return $this->txt[$t1][$t2];
			} else {
				return $this->txt[$t1];
			}
		}
	}
}

$PFN_conf = new PFN_Conf();
?>
