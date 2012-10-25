<?php
/****************************************************************************
* xestion/grupos/eliminar.php
*
* Elimina un grupo y sus relaciones
*

PHPfileNavigator versión 2.0.0

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

$erros = array();
$id_grupo = intval($PFN_vars->get('id_grupo'));

if (empty($id_grupo) || ($sPFN['usuario']['id_grupo'] == $id_grupo)) {
	$erros[] = 16;
} else {
	$query = 'DELETE FROM '.$PFN_usuarios->tabla('grupos')
		.' WHERE id="'.$id_grupo.'";';
	
	if ($PFN_usuarios->actualizar($query) == -1) {
		$erros[] = 6;
	} else {
		$query = 'DELETE FROM '.$PFN_usuarios->tabla('r_g_c')
			.' WHERE id_grupo="'.$id_grupo.'";';
		$PFN_usuarios->actualizar($query);
	}
}

$ok = count($erros)?false:2;

Header('Location: ../index.php?'.PFN_cambia_url(array('id_grupo','opc','erros','ok'), array('',3,implode(',', $erros),$ok), false, true));
exit;
?>
