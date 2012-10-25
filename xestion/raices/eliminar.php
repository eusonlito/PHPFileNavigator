<?php
/****************************************************************************
* xestion/raices/eliminar.php
*
* Elimina una raíz y su relación con los usuarios
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

PFN_quita_url_SERVER(array('id_raiz','borrar_inc'));

session_write_close();

$erros = array();
$id_raiz = intval($PFN_vars->get('id_raiz'));
$borrar_inc = intval($PFN_vars->get('borrar_inc'));

if (empty($id_raiz) || $sPFN['raiz']['id'] == $id_grupo) {
	$erros[] = 5;
} else {
	$PFN_usuarios->init('raiz', $id_raiz);
	$path_raiz = $PFN_usuarios->get('path');

	$query = 'DELETE FROM '.$PFN_usuarios->tabla('raices')
		.' WHERE id = "'.$id_raiz.'";';

	if ($PFN_usuarios->actualizar($query) == -1) {
		$erros[] = 6;
	} else {
		$query = 'DELETE FROM '.$PFN_usuarios->tabla('r_u')
			.' WHERE id_raiz = "'.$id_raiz.'";';
		$PFN_usuarios->actualizar($query);

		$query = 'DELETE FROM '.$PFN_usuarios->tabla('r_g_c')
			.' WHERE id_raiz = "'.$id_raiz.'";';
		$PFN_usuarios->actualizar($query);

		include_once ($PFN_paths['include'].'class_indexador.php');

		$PFN_indexador = new PFN_Indexador($PFN_conf);
		$PFN_indexador->eliminar_raiz($id_raiz);

		$info_raiz = $PFN_niveles->path_correcto($PFN_paths['info'].'raiz'.$id_raiz);

		if (is_dir($info_raiz)) {
			include_once ($PFN_paths['include'].'class_accions.php');

			$PFN_conf->p(false, 'logs', 'accions');

			$PFN_accions = new PFN_Accions($PFN_conf);

			$PFN_accions->rexistro(false);
			$PFN_accions->eliminar($info_raiz);
		}

		$PFN_usuarios->init('raices');
		$parecida = false;

		for (; $PFN_usuarios->mais(); $PFN_usuarios->seguinte()) {
			if ($PFN_usuarios->get('id') == $id_raiz) {
				continue;
			}

			$este_path = $PFN_usuarios->get('path');

			if (strstr($este_path, $path_raiz) || strstr($path_raiz, $este_path)) {
				$parecida = true;
				break;
			}
		}

		if (!$parecida) {
			include_once ($PFN_paths['include'].'class_extra.php');
			$PFN_extra->vacia_path($path_raiz, true, true, true);
		}
	}
}

$ok = count($erros)?false:2;

Header('Location: ../index.php?'.PFN_cambia_url(array('id_raiz','opc','erros','ok'), array('',1,implode(',', $erros),$ok), false, true));
exit;
?>
