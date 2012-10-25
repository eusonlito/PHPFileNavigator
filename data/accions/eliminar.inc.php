<?php
/****************************************************************************
* data/accions/eliminar.inc.php
*
* Realiza la visualización o acción de eliminar un fichero o directorio
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

include ($PFN_paths['plantillas'].'cab.inc.php');
include ($PFN_paths['web'].'opcions.inc.php');

$PFN_tempo->rexistra('precodigo');

$erro = false;

if ($PFN_vars->post('executa') || !$PFN_conf->g('confirmar_eliminar')) {
	if (!empty($cal) && !empty($dir)) {
		include_once ($PFN_paths['include'].'class_extra.php');
		include_once ($PFN_paths['include'].'class_inc.php');
		include_once ($PFN_paths['include'].'class_indexador.php');

		$PFN_indexador = new PFN_Indexador($PFN_conf);
		$PFN_inc = new PFN_INC($PFN_conf);
		$PFN_extra->accions($PFN_accions);

		if ($tipo == 'dir') {
			$peso_este = 0;

			if ($PFN_conf->g('raiz','peso_maximo') > 0) {
				$peso_este = $PFN_accions->get_tamano("$arquivo/", true);
			}

			$PFN_accions->eliminar($arquivo);
			$estado = $PFN_accions->estado_num('eliminar_dir');
			$estado_accion = $PFN_conf->t('estado.eliminar_dir',intval($estado));

			if ($PFN_accions->estado('eliminar_dir')) {
				if (is_dir(PFN_get_path_extra($arquivo))) {
					if ($PFN_conf->g('raiz','peso_maximo') > 0) {
						$peso_este += $PFN_accions->get_tamano(PFN_get_path_extra("$arquivo/"), true);
					}

					$PFN_extra->eliminar($arquivo, true);
				}

				$PFN_indexador->eliminar("$dir/", "$cal/");
			} elseif ($PFN_conf->g('raiz','peso_maximo') > 0) {
				clearstatcache();

				$peso_este = $PFN_accions->get_tamano("$arquivo/", true);
				$peso_este += $PFN_accions->get_tamano(PFN_get_path_extra("$arquivo/"), true);
			}

			if ($PFN_conf->g('raiz','peso_maximo') > 0) {
				$peso_este = $PFN_conf->g('raiz', 'peso_actual') - $peso_este;

				$peso_este = ($peso_este < 0)?0:$peso_este;
				$PFN_conf->p($peso_este, 'raiz', 'peso_actual');
				$PFN_usuarios->accion('peso', $peso_este, $PFN_conf->g('raiz','id'));
			}
		} else {
			if ($PFN_conf->g('raiz','peso_maximo') > 0) {
				$peso_este = PFN_espacio_disco($arquivo, true);
			}

			$PFN_accions->eliminar($arquivo);
			$estado = $PFN_accions->estado_num('eliminar_arq');
			$estado_accion = $PFN_conf->t('estado.eliminar_arq',intval($estado));

			if ($PFN_accions->estado('eliminar_arq')) {
				if (is_file($PFN_inc->nome_inc($arquivo))) {
					if ($PFN_conf->g('raiz','peso_maximo') > 0) {
						$peso_este += PFN_espacio_disco($PFN_inc->nome_inc($arquivo), true);
					}

					$PFN_extra->eliminar($PFN_inc->nome_inc($arquivo), false);
				}

				if (is_file($PFN_imaxes->nome_pequena($arquivo))) {
					if ($PFN_conf->g('raiz','peso_maximo') > 0) {
						$peso_este += PFN_espacio_disco($PFN_imaxes->nome_pequena($arquivo), true);
					}

					$PFN_extra->eliminar($PFN_imaxes->nome_pequena($arquivo), false);
				}

				$PFN_indexador->eliminar("$dir/", $cal);

				if ($PFN_conf->g('raiz','peso_maximo') > 0) {
					$peso_este = $PFN_conf->g('raiz', 'peso_actual') - $peso_este;

					$peso_este = ($peso_este < 0)?0:$peso_este;
					$PFN_conf->p($peso_este, 'raiz', 'peso_actual');
					$PFN_usuarios->accion('peso', $peso_este, $PFN_conf->g('raiz','id'));
				}
			}
		}
	}

	include ($PFN_paths['web'].'navega.inc.php');
} else {
	if (file_exists($arquivo)) {
		if ($tipo == 'dir') {
			$contido = $PFN_accions->get_contido($arquivo);
	
			if (count($contido['dir']['nome']) || count($contido['arq']['nome'])) {
				include_once ($PFN_paths['include'].'class_arbore.php');
				$PFN_arbore = new PFN_Arbore($PFN_conf);

				$PFN_arbore->imaxes($PFN_imaxes);
				$PFN_arbore->carga_arbore("$arquivo/", "$dir/$cal/", true);

				$adv = $PFN_conf->t('estado.eliminar_dir',3);
			} else {
				$adv = $PFN_conf->t('estado.eliminar_dir',2);
			}
	
			include ($PFN_paths['plantillas'].'posicion.inc.php');
			include ($PFN_paths['plantillas'].'info_cab.inc.php');
			include ($PFN_paths['plantillas'].'eliminar_dir.inc.php');
		} else {
			include ($PFN_paths['plantillas'].'posicion.inc.php');
			include ($PFN_paths['plantillas'].'info_cab.inc.php');
			include ($PFN_paths['plantillas'].'eliminar_arq.inc.php');
		}
	} else {
		include ($PFN_paths['web'].'navega.inc.php');
	}
}

$PFN_tempo->rexistra('postcodigo');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
