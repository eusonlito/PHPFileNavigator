<?php
/****************************************************************************
* data/accions/multiple_copiar.inc.php
*
* Realiza la visualización o acción de copiar multiples ficheros y directorios
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
&& $PFN_vars->post('executa')
&& (count($multiple_escollidos) > 0)) {
	if (!empty($dir)) {
		@set_time_limit($PFN_conf->g('tempo_maximo'));
		@ini_set('memory_limit', $PFN_conf->g('memoria_maxima'));

		include_once ($PFN_paths['include'].'class_extra.php');
		include_once ($PFN_paths['include'].'class_inc.php');
		include_once ($PFN_paths['include'].'class_indexador.php');

		$PFN_indexador = new PFN_Indexador($PFN_conf);
		$PFN_inc = new PFN_INC($PFN_conf);
		$PFN_extra->accions($PFN_accions);

		foreach ($multiple_escollidos as $v) {
			$erro = false;
			$cal = $PFN_accions->nome_correcto($v);
			$orixinal = $PFN_conf->g('raiz','path').$PFN_accions->path_correcto($dir.'/')
				.'/'.$cal;
			$destino = $PFN_conf->g('raiz','path').$PFN_accions->path_correcto($PFN_vars->post('escollido').'/')
				.'/'.$cal;

			if (!file_exists($orixinal)) {
				$erro = true;
				$estado = 7;
			}

			if (strstr($destino, $orixinal)) {
				$erro = true;
				$estado = 9;
			}

			if (!$erro && $PFN_accions->e_dir($orixinal)) {
				if ($PFN_conf->g('raiz','peso_maximo') > 0) {
					if ($PFN_conf->g('raiz','peso_actual') >= $PFN_conf->g('raiz','peso_maximo')) {
						$erro = true;
						$estado = 6;
					} else {
						$peso_este = $PFN_accions->get_tamano("$orixinal/", true);

						if (is_dir(PFN_get_path_extra($orixinal))) {
							$peso_este += $PFN_accions->get_tamano(PFN_get_path_extra("$orixinal/"), true);
						}

						if (($peso_este + $PFN_conf->g('raiz', 'peso_actual')) > $PFN_conf->g('raiz','peso_maximo')) {
							$erro = true;
							$estado = 6;
						}
					}
				}

				if (!$erro) {
					$PFN_accions->copiar($orixinal, $destino);
					$estado = $PFN_accions->estado_num('multiple_copiar');
				}

				if (!$erro && $PFN_accions->estado('multiple_copiar')) {
					if (is_dir(PFN_get_path_extra($orixinal))) {
						$PFN_extra->copiar($orixinal, $destino);
					}

					if ($PFN_conf->g('raiz','peso_maximo') > 0) {
						$peso_este += $PFN_conf->g('raiz', 'peso_actual');

						$PFN_conf->p($peso_este, 'raiz', 'peso_actual');

						$PFN_usuarios->accion('peso', $peso_este, $PFN_conf->g('raiz','id'));
					}

					$i_destino = $PFN_accions->path_correcto($PFN_vars->post('escollido').'/');
					$PFN_indexador->copiar("$dir/", "$i_destino/", "$cal/");
				} else {
					$erro = true;
				}
			} elseif (!$erro) {
				if ($PFN_conf->g('raiz','peso_maximo') > 0) {
					if ($PFN_conf->g('raiz','peso_actual') >= $PFN_conf->g('raiz','peso_maximo')) {
						$erro = true;
						$estado = 6;
					} else {
						$peso_este = PFN_espacio_disco($orixinal, true);

						if (is_file($PFN_inc->nome_inc($orixinal))) {
							$peso_este += PFN_espacio_disco($PFN_inc->nome_inc($orixinal), true);
						}

						if (is_file($PFN_imaxes->nome_pequena($orixinal))) {
							$peso_este += PFN_espacio_disco($PFN_imaxes->nome_pequena($orixinal), true);
						}

						if (($peso_este + $PFN_conf->g('raiz', 'peso_actual')) > $PFN_conf->g('raiz','peso_maximo')) {
							$erro = true;
							$estado = 6;
						}
					}
				}

				if (!$erro) {
					$PFN_accions->copiar($orixinal, $destino);
					$estado = $PFN_accions->estado_num('multiple_copiar');
				}

				if (!$erro && $PFN_accions->estado('multiple_copiar')) {
					if (is_file($PFN_inc->nome_inc($orixinal))) {
						$PFN_extra->copiar($PFN_inc->nome_inc($orixinal), $PFN_inc->nome_inc($destino));
					}

					if (is_file($PFN_imaxes->nome_pequena($orixinal))) {
						$PFN_extra->copiar($PFN_imaxes->nome_pequena($orixinal), $PFN_imaxes->nome_pequena($destino));
					}

					$i_destino = $PFN_accions->path_correcto($PFN_vars->post('escollido').'/');
					$PFN_indexador->copiar("$dir/", "$i_destino/", $cal);

					if ($PFN_conf->g('raiz','peso_maximo') > 0) {
						$peso_este += $PFN_conf->g('raiz', 'peso_actual');

						$PFN_conf->p($peso_este, 'raiz', 'peso_actual');
						$PFN_usuarios->accion('peso', $peso_este, $PFN_conf->g('raiz','id'));
					}
				} else {
					$erro = true;
				}
			}

			if ($erro) {
				$estado_accion .= $PFN_conf->t('estado.multiple_copiar',intval($estado)).' '.$cal.'<br />';
				$cnt_erros++;
			}
		}
	}

	if ($cnt_erros == 0) {
		$estado_accion = $PFN_conf->t('estado.multiple_copiar', 1);
	} elseif ($cnt_erros != count($multiple_escollidos)) {
		$estado_accion .= $PFN_conf->t('estado.multiple_copiar', 8);
	}

	include ($PFN_paths['web'].'navega.inc.php');
} elseif ($PFN_conf->g('columnas','multiple') && count($multiple_escollidos) > 0) {
	foreach ($multiple_escollidos as $k => $v) {
		$arquivo = $PFN_conf->g('raiz','path').$PFN_accions->path_correcto($dir.'/')
			.'/'.$PFN_accions->nome_correcto($v);

		if (!file_exists($arquivo)) {
			$adv .= $PFN_conf->t('estado.multiple_copiar', 7).' '.$PFN_accions->nome_correcto($v).'<br />';
			unset($multiple_escollidos[$k]);
		}
	}

	if (count($multiple_escollidos) > 0) {
		include_once ($PFN_paths['include'].'class_arbore.php');
		$PFN_arbore = new PFN_Arbore($PFN_conf);

		$PFN_arbore->imaxes($PFN_imaxes);
		$PFN_arbore->pon_radio('escollido');
		$PFN_arbore->pon_enlaces(false);

		$adv .= $PFN_conf->t('estado.multiple_copiar', 2);

		$PFN_arbore->carga_arbore($PFN_conf->g('raiz','path'), "./", false);

		include ($PFN_paths['plantillas'].'posicion.inc.php');
		include ($PFN_paths['plantillas'].'multiple_copiar.inc.php');
	} else {
		include ($PFN_paths['web'].'navega.inc.php');
	}
} else {
	include ($PFN_paths['web'].'navega.inc.php');
}

$PFN_tempo->rexistra('postcodigo');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
