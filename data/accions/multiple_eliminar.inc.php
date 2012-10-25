<?php
/****************************************************************************
* data/accions/multiple_eliminar.inc.php
*
* Realiza la visualización o acción de eliminar multiples ficheros
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

$multiple_escollidos = (array)$PFN_vars->post('multiple_escollidos');
$estado_accion = '';
$cnt_erros = 0;
$adv = '';

include ($PFN_paths['plantillas'].'cab.inc.php');
include ($PFN_paths['web'].'opcions.inc.php');

$PFN_tempo->rexistra('precodigo');

if ($PFN_conf->g('columnas','multiple')
&& ($PFN_vars->post('executa') || !$PFN_conf->g('confirmar_eliminar'))
&& (count($multiple_escollidos) > 0)) {
	include_once ($PFN_paths['include'].'class_extra.php');
	include_once ($PFN_paths['include'].'class_inc.php');
	include_once ($PFN_paths['include'].'class_indexador.php');

	$PFN_indexador = new PFN_Indexador($PFN_conf);
	$PFN_inc = new PFN_INC($PFN_conf);
	$PFN_extra->accions($PFN_accions);

	if (!empty($dir)) {
		foreach ($multiple_escollidos as $v) {
			$erro = false;
			$cal = $v = $PFN_accions->nome_correcto($v);
			$arquivo = $PFN_conf->g('raiz','path').$PFN_accions->path_correcto($dir.'/')
				.'/'.$cal;
			$e_dir = $PFN_accions->e_dir($arquivo);

			if (empty($v) || ($v == '.') || ($v == './') || !file_exists($arquivo)) {
				$erro = true;
				$estado = 4;
			}

			if (!$erro) {
				if ($PFN_conf->g('raiz','peso_maximo') > 0) {
					if ($e_dir) {
						$peso_este = $PFN_accions->get_tamano("$arquivo/");
					} else {
						$peso_este = PFN_espacio_disco($arquivo, true);
					}
				}

				$PFN_accions->eliminar($arquivo);
				$estado = $PFN_accions->estado_num('multiple_eliminar');
			}

			if (!$erro && $PFN_accions->estado('multiple_eliminar')) {
				if ($e_dir) {
					if (is_dir(PFN_get_path_extra($arquivo))) {
						if ($PFN_conf->g('raiz','peso_maximo') > 0) {
							$peso_este += $PFN_accions->get_tamano(PFN_get_path_extra("$arquivo/"), true);
						}

						$PFN_extra->eliminar($arquivo, true);
					}
				} else {
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
				}
			} else {
				$estado_accion .= $PFN_conf->t('estado.multiple_eliminar',intval($estado)).' '.$cal.'<br />';
				$cnt_erros++;

				if ($e_dir && $estado != 4) {
					clearstatcache();
					$peso_este = $PFN_accions->get_tamano("$arquivo/");
					$peso_este += $PFN_accions->get_tamano(PFN_get_path_extra("$arquivo/"), true);
				}
			}

			if (($estado !== 4) && ($e_dir || !$erro) && ($PFN_conf->g('raiz','peso_maximo') > 0)) {
				$peso_este = $PFN_conf->g('raiz', 'peso_actual') - $peso_este;
				$peso_este = ($peso_este < 0)?0:$peso_este;

				$PFN_conf->p($peso_este, 'raiz', 'peso_actual');
				$PFN_usuarios->accion('peso', $peso_este, $PFN_conf->g('raiz','id'));
			}
		}
	}

	if ($cnt_erros == 0) {
		$estado_accion = $PFN_conf->t('estado.multiple_eliminar', 1);
	} elseif ($cnt_erros != count($multiple_escollidos)) {
		$estado_accion .= $PFN_conf->t('estado.multiple_eliminar', 3);
	}

	include ($PFN_paths['web'].'navega.inc.php');
} elseif ($PFN_conf->g('columnas','multiple') && count($multiple_escollidos) > 0) {
	foreach ($multiple_escollidos as $k => $v) {
		$v = $PFN_accions->nome_correcto($v);
		$arquivo = $PFN_conf->g('raiz','path').$PFN_accions->path_correcto($dir.'/').'/'.$v;

		if (empty($v) || ($v == '.') || ($v == './') || !file_exists($arquivo)) {
			$adv = $PFN_conf->t('estado.multiple_eliminar', 7).' '.$v.'<br />';
			unset($multiple_escollidos[$k]);
		} else {
			$multiple_escollidos[$k] = $v;
		}
	}

	if (count($multiple_escollidos) > 0) {
		include ($PFN_paths['plantillas'].'posicion.inc.php');
		include ($PFN_paths['plantillas'].'multiple_eliminar.inc.php');
	} else {
		include ($PFN_paths['web'].'navega.inc.php');
	}
} else {
	include ($PFN_paths['web'].'navega.inc.php');
}

$PFN_tempo->rexistra('postcodigo');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
