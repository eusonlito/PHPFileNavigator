<?php
/****************************************************************************
* xestion/configuracions/gdar.php
*
* Guarda el resultado de la edición de un fichero de configuración
*

PHPfileNavigator versión 2.2.0

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

$relativo = '../../';

include ($relativo.'paths.php');
include_once ($PFN_paths['include'].'basicweb.php');
include_once ($PFN_paths['include'].'Xusuarios.php');

session_write_close();

$id_conf = $PFN_vars->post('id_conf');

$erros = array();
$existe = $PFN_usuarios->init('configuracion', $id_conf);
$nome_arq = $PFN_niveles->path_correcto($PFN_paths['conf'].$PFN_usuarios->get('conf').'.inc.php');

if (!$existe || !is_file($nome_arq)) {
	$erros[] = 18;
} elseif (!is_writable($nome_arq)) {
	$erros[] = 19;
}

$test = '';
$alertas = array();
$estado_accion = '';

include_once ($PFN_paths['include'].'class_arquivos.php');
$PFN_arquivos = new PFN_Arquivos($PFN_conf);

$texto = trim($PFN_vars->post('texto'));

if ((count($erros) == 0) && $PFN_vars->post('executa')) {
	$alertas = $PFN_arquivos->comprobar_sintaxis($texto);

	if (empty($alertas)) {
		$PFN_conf->textos('estado');

		$estado = $PFN_arquivos->abre_escribe($nome_arq, $texto);
		$estado_accion = $PFN_conf->t('estado.editar', intval($estado));
		$ok = 5;
	} else {
		$erros[] = 28;
	}
}

if (count($erros) == 0) {
	Header('Location: index.php?'.PFN_cambia_url(array('id_conf','ok'), array($id_conf,$ok), false, true));
	exit;
}

$PFN_tempo->rexistra('precarga');

include ($PFN_paths['plantillas'].'cab.inc.php');
include ($PFN_paths['xestion'].'Xopcions.inc.php');

$PFN_tempo->rexistra('precodigo');

include ($PFN_paths['plantillas'].'Xconfiguracions_modi.inc.php');

$PFN_tempo->rexistra('postcodigo');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
