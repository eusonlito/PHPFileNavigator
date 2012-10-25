<?php
/****************************************************************************
* xestion/informes/accions.inc.php
*
* Prepara los datos para mostrar el informe de acciones sobre ficheros y
* directorios
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

defined('OK') && defined('XESTION') or die();

$ai_raiz = intval($PFN_vars->post('ai_raiz'));
$ai_buscar = trim($PFN_vars->post('ai_buscar'));
$ai_lineas = intval($PFN_vars->post('ai_lineas'));
$ai_lineas = ($ai_lineas < 1 || $ai_lineas > 500)?50:$ai_lineas;
$ai_amosar = is_array($PFN_vars->post('ai_amosar'))?$PFN_vars->post('ai_amosar'):array();
$ai_copiar_arq = in_array('copiar_arq', $ai_amosar);
$ai_copiar_dir = in_array('copiar_dir', $ai_amosar);
$ai_mover_arq = in_array('mover_arq', $ai_amosar);
$ai_mover_dir = in_array('mover_dir', $ai_amosar);
$ai_eliminar_arq = in_array('eliminar_arq', $ai_amosar);
$ai_eliminar_dir = in_array('eliminar_dir', $ai_amosar);
$ai_crear_dir = in_array('crear_dir', $ai_amosar);
$ai_subir_arq = in_array('subir_arq', $ai_amosar);
$ai_subir_url = in_array('subir_url', $ai_amosar);
$ai_renomear = in_array('renomear', $ai_amosar);
$ai_enlazar_arq = in_array('enlazar_arq', $ai_amosar);
$ai_editar = in_array('editar', $ai_amosar);
$ai_extraer = in_array('extraer', $ai_amosar);
$ai_enviar_correo = in_array('enviar_correo', $ai_amosar);

$lineas = $ai_lineas;
$info_raiz = $PFN_niveles->path_correcto($PFN_paths['info'].'raiz'.$ai_raiz);

if ($PFN_conf->g('logs','accions') && is_file($info_raiz.'/'.$PFN_conf->g('logs','accions'))) {
	include_once ($info_raiz.'/'.$PFN_conf->g('logs','accions'));

	if (count($log)) {
		rsort($log);

		$b = 1;
		$busca = empty($ai_buscar)?array():explode(' ', $ai_buscar);
		$txt = '<table class="tabla_informes" summary="">'
			.'<tr><th>'.$PFN_conf->t('Xcol_data').'</th>'
			.'<th>'.$PFN_conf->t('Xcol_usuario').'</th>'
			.'<th>'.$PFN_conf->t('Xcol_accion').'</th>'
			.'<th>'.$PFN_conf->t('Xcol_arquivo').'</th></tr>';

		foreach ($log as $k => $v) {
			$borrar = false;

			foreach ($busca as $v2) {
				$borrar = !stristr($v, $v2);

				if ($borrar) {
					break;
				}
			}

			if ($borrar) {
				unset($log[$k]);
				continue;
			}

			preg_match_all("/^\[([^\]]+)\] \[([^\]]+)\] \[([^\]]+)\] \[([^\]]+)\]$/", $v, $partes);

			if (empty($partes[3][0])) {
				unset($log[$k]);
				continue;
			}

			if (!$ai_copiar_arq && stristr('copiar_arq', $partes[3][0])) {
				unset($log[$k]);
				continue;
			}

			if (!$ai_copiar_dir && stristr('copiar_dir', $partes[3][0])) {
				unset($log[$k]);
				continue;
			}

			if (!$ai_mover_arq && stristr('mover_arq', $partes[3][0])) {
				unset($log[$k]);
				continue;
			}

			if (!$ai_mover_dir && stristr('mover_dir', $partes[3][0])) {
				unset($log[$k]);
				continue;
			}

			if (!$ai_eliminar_arq && stristr('eliminar_arq', $partes[3][0])) {
				unset($log[$k]);
				continue;
			}

			if (!$ai_eliminar_dir && stristr('eliminar_dir', $partes[3][0])) {
				unset($log[$k]);
				continue;
			}

			if (!$ai_crear_dir && stristr('crear_dir', $partes[3][0])) {
				unset($log[$k]);
				continue;
			}

			if (!$ai_subir_arq && stristr('subir_arq', $partes[3][0])) {
				unset($log[$k]);
				continue;
			}

			if (!$ai_subir_url && stristr('subir_url', $partes[3][0])) {
				unset($log[$k]);
				continue;
			}

			if (!$ai_renomear && stristr('renomear', $partes[3][0])) {
				unset($log[$k]);
				continue;
			}

			if (!$ai_enlazar_arq && stristr('enlazar_arq', $partes[3][0])) {
				unset($log[$k]);
				continue;
			}

			if (!$ai_editar && stristr('editar', $partes[3][0])) {
				unset($log[$k]);
				continue;
			}

			if (!$ai_extraer && stristr('extraer', $partes[3][0])) {
				unset($log[$k]);
				continue;
			}

			if (!$ai_enviar_correo && stristr('enviar_correo', $partes[3][0])) {
				unset($log[$k]);
				continue;
			}

			$b++;
			$txt .= '<tr'.((($b % 2) == 0)?' class="tr_par"':'').'><td>'.$partes[1][0].'</td>'
				.'<td>'.$partes[2][0].'</td>'
				.'<td>'.$PFN_conf->t('Xamosar_'.$partes[3][0]).'</td>'
				.'<td>'.$partes[4][0].'</td></tr>';

			if ($i++ && $i > $ai_lineas) {
				break;
			}
		}

		$txt .= '</table>';
	} else {
		$erros[] = 30;
	}
} else {
	$erros[] = 30;
}
?>
