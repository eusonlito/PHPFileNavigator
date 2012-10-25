<?php
/****************************************************************************
* xestion/configuracions/duplicar.php
*
* Duplica un fichero de configuración
*

PHPfileNavigator versión 2.0.1

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

PFN_quita_url_SERVER(array('id_conf','novo'));

session_write_close();

$erros = array();
$ok = 0;

$id_conf = $PFN_vars->get('id_conf');

$existe = $PFN_usuarios->init('configuracion', $id_conf);
$PFN_conf_orix = $PFN_usuarios->get('conf');
$vale = $PFN_usuarios->get('vale');
$nome_orix = $PFN_niveles->path_correcto($PFN_paths['conf'].$PFN_conf_orix.'.inc.php');

$PFN_conf->p(false, 'logs', 'accions');
$PFN_conf->p(true, 'nome_riguroso');

$PFN_conf_copia = str_replace('.inc.php', '', $PFN_niveles->nome_correcto($PFN_vars->get('novo')));
$PFN_conf_copia= trim(str_replace('.php', '', $PFN_conf_copia));
$nome_copia = $PFN_niveles->path_correcto($PFN_paths['conf'].$PFN_conf_copia.'.inc.php');

if (!$existe || !is_file($nome_orix)) {
	$erros[] = 18;
} elseif (empty($PFN_conf_copia)) {
	$erros[] = 20;
} elseif (is_file($nome_copia)) {
	$erros[] = 21;
} elseif ($PFN_usuarios->init('configuracion_nome', $PFN_conf_copia)) {
	$erros[] = 22;
} else {
	if ($novo_id = $PFN_usuarios->accion('conf_crear', $PFN_conf_copia)) {
		include_once ($PFN_paths['include'].'class_accions.php');

		$PFN_accions = new PFN_Accions($PFN_conf);
		$estado = $PFN_accions->copiar($nome_orix, $nome_copia);

		if ($PFN_accions->estado('copiar_arq')) {
			$id_conf = $novo_id;
			$PFN_vars->get('id_conf', $id_conf);
		} else {
			$PFN_usuarios->accion('conf_eliminar', $novo_id);
			$erros[] = 24;
		}
	} else {
		$erros[] = 23;
	}
}

$ok = count($erros)?false:3;

Header('Location: index.php?'.PFN_cambia_url(array('id_conf','ok','erros'), array($id_conf,$ok,implode(',', $erros)), false, true));
exit;
?>
