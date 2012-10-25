<?php
/****************************************************************************
* xestion/grupos/gdar.php
*
* Guarda las modificaciónes de datos de un grupo
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

$relativo = '../../';

include ($relativo.'paths.php');
include_once ($PFN_paths['include'].'basicweb.php');
include_once ($PFN_paths['include'].'Xusuarios.php');

session_write_close();

$id_grupo = intval($PFN_vars->post('id_grupo'));
$nome = addslashes(trim($PFN_vars->post('nome')));
$id_conf = intval($PFN_vars->post('id_conf'));
$estado = intval($PFN_vars->post('estado'));

$query = '';
$erros = array();
$ok = 0;

if (empty($nome) || empty($id_conf)) {
	$erros[] = 1;
} elseif (($id_grupo == $sPFN['usuario']['id_grupo']) && ($estado == 0)) {
	$erros[] = 14;
} elseif ($PFN_usuarios->init('existe_grupo', $nome, $id_grupo)) {
	$erros[] = 15;
} else {
	if (empty($id_grupo)) {
		$query = 'INSERT INTO '.$PFN_usuarios->tabla('grupos')
			.' SET nome = "'.$nome.'"'
			.', id_conf = "'.$id_conf.'"'
			.', estado = "'.$estado.'";';
	} else {
		$query = 'UPDATE '.$PFN_usuarios->tabla('grupos')
			.' SET nome = "'.$nome.'"'
			.', id_conf = "'.$id_conf.'"'
			.', estado = "'.$estado.'"'
			.' WHERE id = "'.$id_grupo.'"'
			.' LIMIT 1;';
	}

	if ($PFN_usuarios->actualizar($query) == -1) {
		$erros[] = 2;
	}
}

if (!count($erros)) {
	if (empty($id_grupo)) {
		$id_grupo = $PFN_usuarios->id_ultimo();

		$PFN_usuarios->init('raices');

		$query = 'INSERT INTO '.$PFN_usuarios->tabla('r_g_c')
			.' (id_raiz,id_grupo,id_conf) VALUES ';

		for (; $PFN_usuarios->mais(); $PFN_usuarios->seguinte()) {
			$query .= '("'.$PFN_usuarios->get('id').'","'.$id_grupo.'","'.$id_conf.'"),';
		}

		$PFN_usuarios->actualizar(substr($query,0,-1).';');
	} elseif ($PFN_vars->post('revisar_relacions_raices') == 'true') {
		$query = 'UPDATE '.$PFN_usuarios->tabla('r_g_c')
			.' SET id_conf = "'.$id_conf.'"'
			.' WHERE id_grupo = "'.$id_grupo.'";';

		$PFN_usuarios->actualizar($query);
	}

	$ok = 1;
}	

$PFN_tempo->rexistra('precarga');

include ($PFN_paths['plantillas'].'cab.inc.php');
include ($PFN_paths['xestion'].'Xopcions.inc.php');

$PFN_tempo->rexistra('precodigo');

include ($PFN_paths['xestion'].'grupos/index.inc.php');
include ($PFN_paths['plantillas'].'Xgrupos.inc.php');

$PFN_tempo->rexistra('postcodigo');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
