<?php
/****************************************************************************
* xestion/configuracions/index.inc.php
*
* Carga los datos y relaciones de un fichero de configuración
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

defined('OK') && defined('XESTION') or die();

if ($PFN_vars->get('erros') != '') {
	$erros = explode(',', $PFN_vars->get('erros'));
} else {
	$erros = array();
}

$editar = $eliminar = $existe_arq = false;
$ok = ($PFN_vars->get('ok') == '')?false:intval($PFN_vars->get('ok'));

$existe = $PFN_usuarios->init('configuracion', $id_conf);
$nome = $PFN_usuarios->get('conf');
$vale = $PFN_usuarios->get('vale');
$nome_arq = $PFN_niveles->path_correcto($PFN_paths['conf'].$nome.'.inc.php');

if ($existe) {
	$eliminar = true;

	if (is_file($nome_arq)) {
		$existe_arq = true;
		$stat = stat($nome_arq);

		if (is_writable($nome_arq)) {
			$editar = true;
		} else {
			$erros[] = 19;
		}
	} else {
		$erros[] = 18;
	}
} else {
	$erros[] = 18;
	$stat = array();
}
?>
