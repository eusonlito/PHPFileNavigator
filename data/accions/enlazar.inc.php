<?php
/****************************************************************************
* data/accions/enlazar.inc.php
*
* Realiza la visualización o acción de enlazar un fichero o directorio
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

defined('OK') && defined('ACCION') or die();

$erro = false;

include ($PFN_paths['plantillas'].'cab.inc.php');
include ($PFN_paths['web'].'opcions.inc.php');

$PFN_tempo->rexistra('precodigo');

if ($PFN_vars->post('executa')) {
	if (!empty($cal) && !empty($dir)) {
		$orixinal = $arquivo;
		$destino = $PFN_conf->g('raiz','path').$PFN_accions->path_correcto($PFN_vars->post('escollido').'/')
			.'/'.$cal;

		if (strstr($destino, $orixinal)) {
			$estado_accion = $PFN_conf->t('estado.copiar_dir',7);
			$erro = true;
		}

		if (!$erro && $tipo == 'dir') {
			$PFN_accions->enlazar($orixinal, $destino);
			$estado = $PFN_accions->estado_num('enlazar_dir');
			$estado_accion = $PFN_conf->t('estado.enlazar_dir',intval($estado));
			
			if ($PFN_accions->estado('enlazar_dir')) {
				if ($PFN_conf->g('inc','indexar')) {
					include_once ($PFN_paths['include'].'class_indexador.php');
					$PFN_indexador = new PFN_Indexador($PFN_conf);

					$i_destino = $PFN_accions->path_correcto($PFN_vars->post('escollido').'/');
					$PFN_indexador->copiar("$dir/", "$i_destino/", "$cal/");
				}
			}
		} elseif (!$erro) {
			$PFN_accions->enlazar($orixinal,$destino);
			$estado = $PFN_accions->estado_num('enlazar_arq');
			$estado_accion = $PFN_conf->t('estado.enlazar_arq',intval($estado));

			if ($PFN_accions->estado('enlazar_arq')) {
				if ($PFN_conf->g('inc','estado')) {
					include_once ($PFN_paths['include'].'class_inc.php');

					$PFN_inc = new PFN_INC($PFN_conf);
					$PFN_inc->copiar($orixinal, $destino);
				}

				if ($PFN_conf->g('inc','indexar')) {
					include_once ($PFN_paths['include'].'class_indexador.php');

					$i_destino = $PFN_accions->path_correcto($PFN_vars->post('escollido').'/');

					$PFN_indexador = new PFN_Indexador($PFN_conf);
					$PFN_indexador->copiar("$dir/", "$i_destino/", $cal);
				}

				if ($PFN_conf->g('imaxes','pequena')) {
					$PFN_imaxes->copiar($orixinal,$destino);
				}
			}
		}
	}

	include ($PFN_paths['web'].'navega.inc.php');
} else {
	if (file_exists($arquivo)) {
		include_once ($PFN_paths['include'].'class_arbore.php');
		$PFN_arbore = new PFN_Arbore($PFN_conf);

		$PFN_arbore->imaxes($PFN_imaxes);
		$PFN_arbore->pon_radio('escollido');
		$PFN_arbore->pon_enlaces(false);

		if ($PFN_accions->e_dir($arquivo)) {
			$contido = $PFN_accions->get_contido($arquivo);
			$PFN_arbore->pon_copia($arquivo);
	
			if (count($contido['dir']['nome']) || count($contido['arq']['nome'])) {
				$adv = $PFN_conf->t('estado.enlazar_dir',2);
			} else {
				$adv = $PFN_conf->t('estado.enlazar_dir',3);
			}
		} else {
			$adv = $PFN_conf->t('estado.enlazar_arq',2);
		}

		$PFN_arbore->carga_arbore($PFN_conf->g('raiz','path'), './', false);

		include ($PFN_paths['plantillas'].'posicion.inc.php');
		include ($PFN_paths['plantillas'].'info_cab.inc.php');
		include ($PFN_paths['plantillas'].'enlazar.inc.php');
	} else {
		include ($PFN_paths['web'].'navega.inc.php');
	}
}

$PFN_tempo->rexistra('postcodigo');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
