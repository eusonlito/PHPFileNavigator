<?php
/****************************************************************************
* data/accions/info.inc.php
*
* Carga lo necesario para la visualización de la ventana popup de información
* adicional
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

defined('OK') && defined('ACCION') or die();

PFN_quita_url_SERVER(array('accion','calcula_tamano'));

$PFN_arquivos->niveles($PFN_niveles);

$erro = false;
$datos_inc = array();
$protexido = false;
$capas = $PFN_conf->g('info','capas');
$zlib = $PFN_conf->g('zlib');

if ($tipo == 'dir') {
	$icono = $PFN_imaxes->icono('dir');
} elseif (is_file($arquivo)) {
	$icono = $PFN_imaxes->sello($dir.'/'.$cal,false,false);
}

if (in_array('descricion', $capas)) {
	$datos = stat($arquivo);
}

if ($PFN_conf->g('inc','estado')) {
	include_once ($PFN_paths['include'].'class_inc.php');
	$PFN_inc = new PFN_INC($PFN_conf);
}

if ($PFN_vars->post('executa')) {
	if (($PFN_vars->post('formulario') == 'form_inc') && in_array('formulario', $capas)) {
		if ($PFN_conf->g('inc','estado')) {
			$PFN_inc->arquivos($PFN_arquivos);
			$arq_inc = $PFN_inc->crea_inc($arquivo.$fin, $tipo);
		}

		if ($PFN_conf->g('inc','indexar')) {
			include_once ($PFN_paths['include'].'class_indexador.php');

			$PFN_indexador = new PFN_Indexador($PFN_conf);
			$PFN_indexador->alta_modificacion("$dir/", "$cal$fin", $arq_inc);
		}
	} elseif (($PFN_vars->post('formulario') == 'protexer')
	&& in_array('protexer', $capas)
	&& $PFN_conf->g('usuario','admin')
	&& ($tipo == 'dir')) {
		if (trim($PFN_vars->post('ht_usuario')) == '') {
			$PFN_arquivos->eliminar_htpasswd("$arquivo/");
		} else {
			$PFN_arquivos->crear_htpasswd("$arquivo/");
		}
	}
}

$ahref = '<a href="'.$PFN_niveles->enlace($dir, $PFN_vars->get('cal').$fin)
	.'" target="_blank" class="ao14">'.$PFN_vars->get('cal').'</a>';

if ($tipo == 'dir') {
	if ($PFN_vars->get('calcula_tamano')) {
		$tamano_real = $PFN_niveles->get_tamano("$arquivo/");
		$tamano_disco = PFN_peso(PFN_espacio_disco($tamano_real));
		$tamano_real .= ' Bytes';
	} else {
		$tamano_real = '<a href="accion.php?'.PFN_cambia_url(array('cal','accion','calcula_tamano'),array($cal,'info',true), false)
			.'">'.$PFN_conf->t('calcular_tamano').'</a>';
		$tamano_disco = '&nbsp;';
	}
} else {
	$tamano_real = PFN_espacio_disco($arquivo, true);
	$tamano_disco = PFN_peso(PFN_espacio_disco($tamano_real));
	$tamano_real .= ' Bytes';
}

$permisos = PFN_permisos(fileperms($arquivo.$fin));

if ($PFN_conf->g('inc','estado')) {
	$PFN_inc->carga_datos($arquivo.$fin);

	if (in_array('descricion', $capas)) {
		$datos_inc['desc'] = $PFN_inc->crea_descricion($tipo);
	}

	if (in_array('formulario', $capas)) {
		$datos_inc['form'] = $PFN_inc->crea_formulario($tipo);
	}
}

if (in_array('protexer',$capas) && $PFN_conf->g('usuario','admin') && ($tipo == 'dir')) {
	$protexido = is_file("$arquivo/.htpasswd");
}

if (in_array('enlaces',$capas)) {
	$enlace_rel = $PFN_niveles->enlace($dir, $cal, false).$fin;

	if ($PFN_conf->g('inc','estado')) {
		$enlace_href = htmlentities(('<a href="'.$enlace_abs.'">'.$PFN_inc->valor($PFN_conf->g('inc','tit_enlaces')).'</a>'), ENT_NOQUOTES, $PFN_conf->g('charset'));
		$tit_enlace = $PFN_inc->valor($PFN_conf->g('inc','tit_enlaces'));

		if (empty($tit_enlace)) {
			$enlace_phpwiki = '['.$cal.'|'.$enlace_abs.']';
			$enlace_mediawiki = '['.$enlace_abs.' '.$cal.']';
		} else {
			$enlace_phpwiki = '['.$PFN_inc->valor($PFN_conf->g('inc','tit_enlaces')).'|'.$enlace_abs.']';
			$enlace_mediawiki = '['.$enlace_abs.' '.$PFN_inc->valor($PFN_conf->g('inc','tit_enlaces')).']';
		}
	} else {
		$enlace_href = htmlentities(('<a href="'.$enlace_abs.'">'.$cal.'</a>'), ENT_NOQUOTES, $PFN_conf->g('charset'));
		$enlace_phpwiki = '['.$cal.'|'.$enlace_abs.']';
		$enlace_mediawiki = '['.$enlace_abs.'|'.$cal.']';
	}
}

include ($PFN_paths['plantillas'].'cab.inc.php');

$PFN_tempo->rexistra('precodigo');

include ($PFN_paths['web'].'opcions.inc.php');
include ($PFN_paths['plantillas'].'posicion.inc.php');
include ($PFN_paths['plantillas'].'info_cab.inc.php');
include ($PFN_paths['plantillas'].'info_corpo.inc.php');

$PFN_tempo->rexistra('postcodigo');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
