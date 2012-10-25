<?php
/*******************************************************************************
* data/include/class_arbore.php
*
* Genera estructuras de directorio en árbol
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
* class PFN_Arbore extends Niveles
*
* clase que crea el árbol de directorio y archivos para
* visualización o acciones como copiar y mover
*/
class PFN_Arbore extends PFN_Niveles {
	var $conf;
	var $radio = false;
	var $enlaces = true;
	var $fondo = 0;
	var $completo;
	var $fin = array();
	var $dir;
	var $vars;
	var $arbore_txt;
	var $cnt_arbore = array('dir' => 0,'arq' => 0);
	var $copia = false;
	var $destino;

	/**
	* function PFN_Arbore (object $PFN_conf)
	*
	* recibe el objecto $PFN_conf con los parametros de configuración
	* y el objeto $PFN_vars por global para obtener variables
	*/
	function PFN_Arbore (&$PFN_conf) {
		global $PFN_vars;

		$this->vars = &$PFN_vars;
		$this->conf = &$PFN_conf;
	}

	/**
	* function pon_radio (string $opcion)
	*
	* carga la opción de <input type='radio' para el árbol
	* y pone como name="$opcion"
	*/
	function pon_radio ($opcion) {
		$this->radio = $opcion;
	}

	/**
	* function pon_enlaces (boolean $opcion)
	*
	* activa o desactiva la opción de enlaces en los nombres
	*/
	function pon_enlaces ($opcion) {
		$this->enlaces = $opcion;
	}

	/**
	* function pon_copia (string $destino)
	*
	* activa la funcion de copia para no marcar los subdirectorios
	* en caso de copiar directorios y evitar asi copias recursivas
	* en si mismo
	*/
	function pon_copia ($destino) {
		$this->copia = $destino;
	}

	/**
	* function radio (string $cal)
	*
	* devuelve la cadena html para el radio
	* y coloca la variable $cal en value="$cal"
	*
	* reuturn string
	*/
	function radio ($cal) {
		return $this->radio?'<label><input type="radio" name="'.$this->radio.'" value="'.$cal.'" class="checkbox" />':''; 
	}

	/**
	* function carga_arbore (string $raiz, string $raiz_web, boolean $completo)
	*
	* $raiz: path absoluto para la carga del contenido
	* $raiz_web: ruta para la visualización en web
	* $completo: activo o desactivo para enseñar fichero y directorio o sólo directorios
	*
	* inicializa la carga del árbol
	*/
	function carga_arbore ($raiz, $raiz_web, $completo) {
		$this->fondo = 0;
		$this->fin[0] = 1;
		$this->completo = $completo;
		$this->dir = $this->vars->get('dir');
		$this->arbore_txt = $this->enlaces?'<a href="navega.php?'.PFN_cambia_url('dir',$raiz_web,false).'">':'';

		if (($this->dir == $raiz_web) || ($this->dir.'/' == $raiz_web)) {
			$this->arbore_txt .= '<img src="'.$this->conf->g('estilo').'ico/edir.png" alt="Dir" /> '.$raiz_web;
		} else {
			$this->arbore_txt .= '<img src="'.$this->conf->g('estilo').'ico/dir.png" alt="Dir" /> '.$this->radio($raiz_web).$raiz_web.($this->radio?'</label>':'');
		}

		$this->arbore_txt .= ($this->enlaces?'</a>':'')."<br />\n";

		$this->arbore_recursivo($raiz, $raiz_web);
	}

	/**
	* function arbore_recursivo (string $dende, string $web)
	*
	* $dende: path absoluto para la carga del contenido
	* $web: ruta para la visualización en web
	*
	* navega recursivamente por los directorios
	*/
	function arbore_recursivo ($dende, $web) {
		$lista = &$this->carga_contido($dende, $this->completo, true);
		$datos = &$this->ordena($lista, 'nome', 'ASC');

		$this->imprime_dirs($dende, $web, $datos);

		if ($this->completo) {
			$this->imprime_arqs($web, $datos);
		}
	}

	/**
	* function imprime_dirs (string $dende, string $web, array &$lista)
	*
	* $dende: path absoluto para la carga del contenido
	* $web: ruta para la visualización en web
	* &$lista: contiene la lista de archivos y directorios de un nivel
	*
	* imprime los directorios de un nivel y navega recursivamente
	*/
	function imprime_dirs ($dende, $web, &$lista) {
		if (is_array($lista['dir']['nome']) && $max = count($lista['dir']['nome'])) {
			foreach ($lista['dir']['nome'] as $k => $v) {
				for ($i = 0; $i < $this->fondo; $i++) {
					if ($this->fin[$i] == 1) {
						$this->arbore_txt .= '<img src="'.$this->conf->g('estilo').'imx/0.png" style="width: 32px;" alt=" " />';
					} else {
						$this->arbore_txt .= '<img src="'.$this->conf->g('estilo').'imx/barra.png" alt=" | " />';
					}
				}

				if (count($lista['arq']['nome']) && $this->completo) {
					$this->arbore_txt .= '<img src="'.$this->conf->g('estilo').'imx/cruce.png" alt="+" />';
					$this->fin[$this->fondo] = 0;
				} else {
					if (($k+1) == $max) {
						$this->arbore_txt .= '<img src="'.$this->conf->g('estilo').'imx/esquina.png" alt=" |_ " />';
						$this->fin[$this->fondo] = 1;
					} else {
						$this->arbore_txt .= '<img src="'.$this->conf->g('estilo').'imx/cruce.png" alt=" + " />';
						$this->fin[$this->fondo] = 0;
					}
				}

				$this->arbore_txt .= $this->enlaces?'<a href="navega.php?'.PFN_cambia_url('dir',"$web$v",false).'">':'';

				if ($this->dir == "$web$v") {
					$this->arbore_txt .= '<img src="'.$this->conf->g('estilo').'ico/edir.png" alt="Dir" /> ';
				} else {
					$this->arbore_txt .= '<img src="'.$this->conf->g('estilo').'ico/dir.png" alt="Dir" /> ';

					if ($this->copia) {
						if ($this->copia != "$dende$v/" && !strstr("$dende$v", $this->copia)) {
							$this->arbore_txt .= $this->radio("$web$v");
						}
					} else {
						$this->arbore_txt .= $this->radio("$web$v");
					}
				}

				$this->arbore_txt .= $v.($this->radio?'</label>':'').($this->enlaces?'</a>':'')."<br />\n";
				$this->cnt_arbore['dir']++;
				$this->fondo++;

				$this->arbore_recursivo("$dende$v/","$web$v/");

				$this->fondo--;
			}
		}
	}

	/**
	* function imprime_arqs (string $web, array &$lista)
	*
	* $web: ruta para la visualización en web
	* &$lista: contiene la lista de archivos y directorios de un nivel
	*
	* imprime los ficheros de un nivel
	*/
	function imprime_arqs ($web, &$lista) {
		if (is_array($lista['arq']['nome']) && $max = count($lista['arq']['nome'])) {
			foreach ($lista['arq']['nome'] as $k => $v) {
				for ($i = 0; $i < $this->fondo; $i++) {
					if ($this->fin[$i] == 1) {
						$this->arbore_txt .= '<img src="'.$this->conf->g('estilo').'imx/0.png" style="width: 32px;" alt=" " />';
					} else {
						$this->arbore_txt .= '<img src="'.$this->conf->g('estilo').'imx/barra.png" alt=" | " />';
					}
				}

				if (($k+1) == $max) {
					$this->arbore_txt .= '<img src="'.$this->conf->g('estilo').'imx/esquina.png" alt=" |_ " />';
					$this->fin[$this->fondo] = 1;
				} else {
					$this->arbore_txt .= '<img src="'.$this->conf->g('estilo').'imx/cruce.png" alt=" + " />';
					$this->fin[$this->fondo] = 0;
				}

				if ($this->conf->g('permisos','info')) {
					$this->arbore_txt .= '<a href="accion.php?'
						.PFN_cambia_url(array('dir','cal','accion'),array($web, $v, 'info'), false).'">';
				} elseif ($this->conf->g('permisos','descargar')) {
					$this->arbore_txt .= '<a href="accion.php?'
						.PFN_cambia_url(array('dir','cal','accion'),array($dir,$v,'descargar'),false)
						.'" onclick="window.open(this.href); return false;">';
				} else {
					$this->arbore_txt .= '<a href="#">';
				}

				if ($this->vars->get('ver_imaxes')) {
					$this->arbore_txt .= '<img src="'.$this->imaxes->sello("$web$v", false).'" height="32" ';
				} else {
					$this->arbore_txt .= '<img src="'.$this->imaxes->icono($v).'" ';
				}

				$this->arbore_txt .= 'alt="'.$v.'" /> '.$v.'</a><br />'."\n";
				$this->cnt_arbore['arq']++;
			}
		}
	}

	/**
	* function contador (string $cal)
	*
	* devuelve el total de 'dir' (directorios) o 'arq' (ficheros) visualizados
	*/
	function contador ($cal) {
		return $this->cnt_arbore[$cal];
	}
}
?>
