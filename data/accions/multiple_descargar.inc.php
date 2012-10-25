<?php
/****************************************************************************
* data/accions/multiple_descargar.inc.php
*
* Realiza la visualización o acción de descargar multiples ficheros y
* directorios
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

PFN_quita_url_SERVER('nome_comprimido');

$nome_comprimido = $PFN_vars->get('nome_comprimido');
$multiple_escollidos = (array)$PFN_vars->post('multiple_escollidos');
$erro = false;

if ($PFN_conf->g('columnas','multiple')
&& ($PFN_conf->g('zlib') == true)
&& (count($multiple_escollidos) > 0)
&& !empty($nome_comprimido)
&& !empty($dir)) {
	@set_time_limit($PFN_conf->g('tempo_maximo'));
	@ini_set('memory_limit', $PFN_conf->g('memoria_maxima'));

	include_once ($PFN_paths['include'].'class_easyzip.php');
	$EasyZIP->pon_dirbase($PFN_conf->g('raiz','path')
		.$PFN_accions->path_correcto($dir.'/')
		.'/'.$multiple_escollidos[0]);

	foreach ($multiple_escollidos as $v) {
		$erro = false;
		$cal = $PFN_accions->nome_correcto($v);
		$arquivo = $PFN_conf->g('raiz','path').$PFN_accions->path_correcto($dir.'/').'/'.$cal;

		if (!file_exists($arquivo)) {
			$erro = true;
		}

		if (!$erro && $PFN_accions->e_dir($arquivo)) {
			$EasyZIP->addDir($arquivo);
		} elseif (!$erro) {
			$EasyZIP->addFile($arquivo);
		}
	}

	$contido = &$EasyZIP->zipFile();

	include_once ($PFN_paths['include'].'class_arquivos.php');
	include_once ($PFN_paths['include'].'class_inc.php');

	$PFN_arquivos = new PFN_Arquivos($PFN_conf);
	$PFN_inc = new PFN_INC($PFN_conf);

	$PFN_inc->arquivos($PFN_arquivos);
	$PFN_inc->carga_datos($arquivo);
	$PFN_accions->arquivos($PFN_arquivos);

	$tamano = strlen($contido);

	$estado = $PFN_accions->log_ancho_banda($tamano);

	if ($estado === true) {
		$nome_comprimido = strstr($nome_comprimido, '.zip')?$nome_comprimido:($nome_comprimido.'.zip');

		header('Pragma: private');
		header('Expires: 0');
		header('Cache-control: private, must-revalidate');
		header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
		header('Content-Type: application/force-download');
		header('Content-Transfer-Encoding: binary');
		header('Content-Disposition: attachment; filename="'.str_replace(array(' ','"'),'_',$nome_comprimido).'"');
		header('Content-Length: '.$tamano);

		echo $contido;
	} elseif ($estado === -1) {
		$erro = true;
		$estado_accion = $PFN_conf->t('estado.descargar', 3);
	} else {
		$erro = true;
		$estado_accion = $PFN_conf->t('estado.descargar', 2);
	}

	unset($contido);
} else {
	$erro = true;
}

if ($erro) {
	include ($PFN_paths['plantillas'].'cab.inc.php');
	include ($PFN_paths['web'].'opcions.inc.php');

	$PFN_tempo->rexistra('precodigo');

	include ($PFN_paths['web'].'navega.inc.php');

	$PFN_tempo->rexistra('postcodigo');

	include ($PFN_paths['plantillas'].'pe.inc.php');
}
?>
