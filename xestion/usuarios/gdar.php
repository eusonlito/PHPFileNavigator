<?php
/****************************************************************************
* xestion/usuarios/gdar.php
*
* Guarda las modificaciónes de datos de un usuario y su relación con las raices
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

$relativo = '../../';

include ($relativo.'paths.php');
include_once ($PFN_paths['include'].'basicweb.php');
include_once ($PFN_paths['include'].'Xusuarios.php');

$id_usuario = intval($PFN_vars->post('id_usuario'));
$nome = addslashes(trim($PFN_vars->post('nome')));
$usuario = addslashes(trim($PFN_vars->post('usuario')));
$contrasinal = addslashes(trim($PFN_vars->post('contrasinal')));
$rep_contrasinal = addslashes(trim($PFN_vars->post('rep_contrasinal')));
$email = addslashes(trim($PFN_vars->post('email')));
$id_grupo = intval($PFN_vars->post('id_grupo'));
$admin = ($PFN_vars->post('admin') == 1)?1:0;
$estado = ($PFN_vars->post('estado') == 1)?1:0;
$cambiar_datos = ($PFN_vars->post('cambiar_datos') == 1)?1:0;
$max_descargas = addslashes(trim($PFN_vars->post('max_descargas')));
$actual_descargas = addslashes(trim($PFN_vars->post('actual_descargas')));
$max_descargas = empty($max_descargas)?0:$max_descargas;
$actual_descargas = empty($actual_descargas)?0:$actual_descargas;

$Fraices = (array)$PFN_vars->post('Fraices');

$query = '';
$erros = array();
$ok = 0;
$ok2 = false;

if (empty($nome) || empty($usuario) || (empty($contrasinal) && empty($id_usuario))) {
	$erros[] = 1;
} elseif ($contrasinal != $rep_contrasinal) {
	$erros[] = 11;
} elseif (($id_usuario == $sPFN['usuario']['id']) && ($estado == 0)) {
	$erros[] = 10;
} elseif (($id_usuario == $sPFN['usuario']['id']) && ($admin == 0)) {
	$erros[] = 12;
} elseif ($PFN_usuarios->init('existe_usuario', $usuario, $id_usuario)) {
	$erros[] = 8;
} elseif (($sPFN['usuario']['id'] == $id_usuario) && !in_array($sPFN['raiz']['id'], $Fraices)) {
	$erros[] = 9;
} elseif (!preg_match('/^[0-9]+$/', $max_descargas) || !preg_match('/^[0-9\.,]+$/', $actual_descargas)) {
	$erros[] = 35;
} else {
	if (empty($id_usuario)) {
		$query = 'INSERT INTO '.$PFN_usuarios->tabla('usuarios')
			.' SET nome = "'.$nome.'"'
			.', usuario = "'.$usuario.'"'
			.', contrasinal = "'.md5($contrasinal).'"'
			.', email = "'.$email.'"'
			.', id_grupo = "'.$id_grupo.'"'
			.', estado = "'.$estado.'"'
			.', admin = "'.$admin.'"'
			.', cambiar_datos = "'.$cambiar_datos.'"'
			.', descargas_maximo = "'.($max_descargas*1024*1024).'";';
	} else {
		$query = 'UPDATE '.$PFN_usuarios->tabla('usuarios')
			.' SET nome = "'.$nome.'"'
			.', usuario = "'.$usuario.'"'
			.(empty($contrasinal)?'':', contrasinal = "'.md5($contrasinal).'"')
			.', email = "'.$email.'"'
			.', id_grupo = "'.$id_grupo.'"'
			.', estado = "'.$estado.'"'
			.', admin = "'.$admin.'"'
			.', cambiar_datos = "'.$cambiar_datos.'"'
			.', descargas_maximo = "'.($max_descargas*1024*1024).'"'
			.' WHERE id = "'.$id_usuario.'"'
			.' LIMIT 1;';
	}

	if ($PFN_usuarios->actualizar($query) == -1) {
		$erros[] = 2;
	}
}

if (count($erros)) {
	session_write_close();
} else {
	$id_usuario = empty($id_usuario)?$PFN_usuarios->id_ultimo():$id_usuario;

	$query = 'SELECT id_conf FROM '.$PFN_usuarios->tabla('grupos')
		.' WHERE id = "'.$id_grupo.'" LIMIT 1;';
	$PFN_clases->put_query($query);

	$id_conf = $PFN_clases->get('id_conf');

	foreach ($Fraices as $k => $v) {
		$Fraices[$k] = intval($v);
	}

	$query = 'SELECT * FROM '.$PFN_usuarios->tabla('r_g_c')
		.' WHERE id_grupo = "'.$id_grupo.'"'
		.' AND id_raiz IN ("'.implode('","', $Fraices).'");';

	for ($PFN_clases->put_query($query); $PFN_clases->mais(); $PFN_clases->seguinte()) {
		$rgc[$PFN_clases->get('id_raiz')][$PFN_clases->get('id_grupo')] = $PFN_clases->get('id_conf');
	}
	
	$query = 'DELETE FROM '.$PFN_usuarios->tabla('r_u')
		.' WHERE id_usuario="'.$id_usuario.'";';
	$PFN_usuarios->actualizar($query);

	$query1 = 'INSERT INTO '.$PFN_usuarios->tabla('r_u')
		.' (id_raiz,id_usuario) VALUES ';

	$query2 = 'REPLACE INTO '.$PFN_usuarios->tabla('r_g_c')
		.' (id_raiz,id_grupo,id_conf) VALUES '; 

	foreach ($Fraices as $v) {
		$query1 .= '("'.$v.'","'.$id_usuario.'"),';

		if (empty($rgc[$v][$id_grupo])) {
			$ok2 = true;
			$query2 .= '("'.$v.'","'.$id_grupo.'","'.$id_conf.'"),';
		}
	}

	count($Fraices)?$PFN_clases->actualizar(substr($query1,0,-1).';'):'';
	$ok2?$PFN_clases->actualizar(substr($query2,0,-1).';'):'';

	$sPFN['usuario']['descargas_maximo'] = ($max_descargas*1024*1024);

	if ($id_usuario == $sPFN['usuario']['id']) {
		$sPFN['usuario']['usuario'] = $usuario;
		(empty($contrasinal)?'':($sPFN['usuario']['contrasinal'] = md5($contrasinal)));
	}

	session_register('sPFN');

	$PFN_vars->session('sPFN', $sPFN);

	session_write_close();

	include_once ($PFN_paths['include'].'class_arquivos.php');
	$PFN_arquivos = new PFN_Arquivos($PFN_conf);

	$info_usuario = $PFN_niveles->path_correcto($PFN_paths['info'].'usuario'.$id_usuario);

	if (!is_dir($info_usuario)) {
		@mkdir($info_usuario, 0755);
	}

	if ($actual_descargas > 0) {
		$actual = '<?php return '.($actual_descargas*1024*1024).'; ?>';
		$PFN_arquivos->abre_escribe($info_usuario.'/descargas.'.(date('Ym')).'.php', $actual);
	} else {
		if (is_file($info_usuario.'/descargas.'.(date('Ym')).'.php')) {
			@unlink($info_usuario.'/descargas.'.(date('Ym')).'.php');
		}
	}

	$ok = (count($erros) > 0)?0:1;
}

$PFN_tempo->rexistra('precarga');

include ($PFN_paths['plantillas'].'cab.inc.php');
include ($PFN_paths['xestion'].'Xopcions.inc.php');

$PFN_tempo->rexistra('precodigo');

include ($PFN_paths['xestion'].'usuarios/index.inc.php');
include ($PFN_paths['plantillas'].'Xusuarios.inc.php');

$PFN_tempo->rexistra('postcodigo');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
