<?php
/****************************************************************************
* accion.php
*
* Controla y ejecuta los permisos sobre la realización de una acción
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

include ('paths.php');

$borra_cache = is_array($_GET)?($_GET['accion'].$_POST['accion']):($HTTP_GET_VARS['accion'].$HTTP_POST_VARS['accion']);
$borra_cache = ($borra_cache != 'descargar');

include ($PFN_paths['include'].'basicweb.php');

session_write_close();

$PFN_tempo->rexistra('precarga');

$PFN_vars->server('PHP_SELF','navega.php');

$accion = $PFN_niveles->nome_correcto($PFN_vars->get('accion').$PFN_vars->post('accion'));

include_once ($PFN_paths['include']."class_imaxes.php");
include_once ($PFN_paths['include']."class_arquivos.php");

$PFN_imaxes = new PFN_Imaxes($PFN_conf);
$PFN_arquivos = new PFN_Arquivos($PFN_conf);

if (!empty($accion) && $PFN_conf->g('permisos',$accion)
&& is_file($PFN_paths['accions']."$accion.inc.php")) {
	define('ACCION', true);

	$PFN_conf->textos('estado');

	include_once ($PFN_paths['include'].'class_accions.php');
	$PFN_accions = new PFN_Accions($PFN_conf);

	$PFN_tempo->rexistra('precomprobacion');

	$cal = $arquivo = $ucal = $tipo = $enlace_abs = '';
	$e_imaxe = $redimensionar = $redimensionar_dir = $ver_contido = false;
	$editar = $PFN_extraer = $ver_comprimido = $descargar = $correo = false;

	if (strstr($accion, 'multiple_')) {
		$multiple_escollidos = (array)$PFN_vars->post('multiple_escollidos');

		if (count($multiple_escollidos) == 1) {
			$accion = substr($accion, strlen('multiple_'));
			$PFN_vars->get('cal', $multiple_escollidos[0]);
		}
	}

	if (!in_array($accion, array('crear_dir','subir_arq','subir_url','multiple_copiar','multiple_mover','multiple_eliminar','multiple_permisos','multiple_descargar','multiple_correo','buscador','novo_arq'))) {
		$cal = $PFN_vars->post('executa')?$PFN_vars->post('cal'):$PFN_vars->get('cal');
		$cal = $PFN_accions->nome_correcto($cal);
		$arquivo = str_replace(array('/./','/'),'/',$PFN_conf->g('raiz','path').$PFN_accions->path_correcto($dir.'/').'/'.$cal);
		$ucal = rawurlencode($cal);
		$tipo = is_file($arquivo)?'arq':(is_dir($arquivo)?'dir':'');
		$fin = ($tipo == 'dir')?'/':'';
		$enlace_abs = $PFN_niveles->enlace($dir, $cal).$fin;

		$PFN_tempo->rexistra('pretipo');

		if (empty($tipo) || empty($cal) || (!$PFN_niveles->filtrar($cal) && $cal != '.')) {
			Header('Location: '.PFN_quita_url(array('cal','accion'), true, true));
			exit;
		} elseif ($tipo == 'arq') {
			$e_imaxe = $PFN_imaxes->e_imaxe($arquivo);
			$redimensionar = $e_imaxe && $PFN_conf->g('permisos','redimensionar');
			$ver_contido = !$e_imaxe && $PFN_arquivos->editable($cal) && $PFN_conf->g('permisos','ver_contido');
			$editar = !$e_imaxe && $PFN_arquivos->editable($cal) && $PFN_conf->g('permisos','editar');
			$PFN_extraer = !$e_imaxe && $PFN_arquivos->vale_extraer($arquivo);
			$ver_comprimido = !$e_imaxe && $PFN_arquivos->vale_extraer($arquivo, true);
			$descargar = $PFN_conf->g('permisos','descargar');
			$correo = $PFN_conf->g('permisos','correo');
		} else {
			$redimensionar_dir = $PFN_conf->g('permisos','redimensionar_dir');
		}
	}

	$PFN_tempo->rexistra('preaccion');

	include ($PFN_paths['accions'].$accion.'.inc.php');

	$PFN_tempo->rexistra('postaccion');
} else {
	$PFN_tempo->rexistra('preplantillas');

	include ($PFN_paths['plantillas'].'cab.inc.php');
	include ($PFN_paths['web'].'opcions.inc.php');

	$PFN_tempo->rexistra('precodigo');

	include ($PFN_paths['web'].'navega.inc.php');

	$PFN_tempo->rexistra('postcodigo');

	include ($PFN_paths['plantillas'].'pe.inc.php');
}
?>
