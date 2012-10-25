<?php
/*******************************************************************************
* instalar/index.php
*
* Carga lo necesario para la visualización de la pantalla de instalación
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

$relativo = '../';

include ($relativo.'paths.php');
include_once ($PFN_paths['include'].'class_tempo.php');
include_once ($PFN_paths['include'].'funcions.php');
include_once ($PFN_paths['include'].'class_conf.php');
include_once ($PFN_paths['include'].'class_vars.php');
include_once ($PFN_paths['include'].'class_arquivos.php');

$PFN_paths['instalar'] = $PFN_paths['web'].'instalar/';

$form = array();
$form['idioma'] = strlen($PFN_vars->get('idioma'))?$PFN_vars->get('idioma'):$PFN_vars->post('idioma');
$form['tipo'] = trim($PFN_vars->post('tipo'));
$form['zlib'] = trim($PFN_vars->post('zlib'));
$form['gd2'] = trim($PFN_vars->post('gd2'));
$form['charset'] = trim($PFN_vars->post('charset'));
$form['aviso_instalacion'] = trim($PFN_vars->post('aviso_instalacion'));
$form['db_servidor'] = trim($PFN_vars->post('db_servidor'));
$form['db_nome'] = trim($PFN_vars->post('db_nome'));
$form['db_usuario'] = trim($PFN_vars->post('db_usuario'));
$form['db_contrasinal'] = trim($PFN_vars->post('db_contrasinal'));
$form['db_prefixo'] = trim($PFN_vars->post('db_prefixo'));
$form['ad_nome'] = trim($PFN_vars->post('ad_nome'));
$form['ad_usuario'] = trim($PFN_vars->post('ad_usuario'));
$form['ad_contrasinal'] = trim($PFN_vars->post('ad_contrasinal'));
$form['ad_rep_contrasinal'] = trim($PFN_vars->post('ad_rep_contrasinal'));
$form['ad_correo'] = trim($PFN_vars->post('ad_correo'));
$form['ra_nome'] = trim($PFN_vars->post('ra_nome'));
$form['ra_path'] = trim($PFN_vars->post('ra_path'));
$form['ra_web'] = trim($PFN_vars->post('ra_web'));
$form['ra_dominio'] = trim($PFN_vars->post('ra_dominio'));

$paso = $PFN_vars->post('paso');
$paso = empty($paso)?1:intval($paso);

if (!is_file($PFN_paths['instalar'].'include/paso_'.$paso.'.inc.php')) {
	$paso = 1;
}

$PFN_conf->inicial('default');
$PFN_conf->p('estilos/pfn/','estilo');

if (is_file($PFN_paths['conf'].'basicas.inc.php')) {
	$basicas = include ($PFN_paths['conf'].'basicas.inc.php');
} else {
	$basicas = array();
	$basicas['idioma'] = 'es';
}

$form['idioma'] = empty($form['idioma'])?$basicas['idioma']:$form['idioma'];
$form['aviso_instalacion'] = empty($form['tipo'])?'true':$form['aviso_instalacion'];

if (empty($form['charset'])) {
	if (empty($basicas['charset'])) {
		switch ($form['idioma']) {
			case 'es': case 'it': case 'fr': case 'pt': case 'br':
			case 'gl': case 'de': case 'nl': case 'ct': case 'da':
			case 'fi': case 'sv': case 'no':
				$basicas['charset'] = 'ISO-8859-1';
				break;
			case 'pl': case 'cz': case 'hu':
				$basicas['charset'] = 'ISO-8859-2';
				break;
			case 'ru':
				$basicas['charset'] = 'ISO-8859-5';
				break;
			case 'ae':
				$basicas['charset'] = 'ISO-8859-6';
				break;
			case 'il':
				$basicas['charset'] = 'ISO-8859-8';
				break;
			case 'tr':
				$basicas['charset'] = 'ISO-8859-9';
				break;
			case 'jp':
				$basicas['charset'] = 'ISO-2022-JP';
				break;
			case 'kr':
				$basicas['charset'] = 'ISO-2022-KR';
				break;
			case 'tw': case 'cn':
				$basicas['charset'] = 'Big5';
				break;
			default:
				$basicas['charset'] = 'UTF-8';
				break;
		}
	}

	$form['charset'] = $basicas['charset'];
}

$PFN_conf->p($form['idioma'],'idioma');
$PFN_conf->textos('web');
$PFN_conf->textos('idiomas');
$PFN_conf->textos('instalar');

$PFN_arquivos = new PFN_Arquivos($PFN_conf);

if (is_dir($PFN_paths['tmp'])) {
	if (is_file($PFN_paths['tmp'].'instalar.lock')) {
		$ip = file($PFN_paths['tmp'].'instalar.lock');
		$ip = $ip[0];
	} else {
		$ip = $PFN_vars->ip();
		$PFN_arquivos->abre_escribe($PFN_paths['tmp'].'instalar.lock', $ip);
	}
} elseif (is_dir($PFN_paths['web'].'tmp')) {
	if (is_file($PFN_paths['web'].'tmp/instalar.lock')) {
		$ip = file($PFN_paths['web'].'tmp/instalar.lock');
		$ip = $ip[0];
	} else {
		$ip = $PFN_vars->ip();
		$PFN_arquivos->abre_escribe($PFN_paths['web'].'tmp/instalar.lock', $ip);
	}
} else {
	$ip = $PFN_vars->ip();
}

include ($PFN_paths['instalar'].'plantillas/cab.inc.php');

if ($ip == $PFN_vars->ip()) {
	include ($PFN_paths['instalar'].'include/paso_'.$paso.'.inc.php');
} else {
	include ($PFN_paths['instalar'].'plantillas/bloqueo_instalacion.inc.php');
}

include ($PFN_paths['instalar'].'plantillas/pe.inc.php');
?>
