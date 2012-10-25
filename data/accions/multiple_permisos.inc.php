<?php
/****************************************************************************
* data/accions/multiple_permisos.inc.php
*
* Realiza la visualización o acción de cambiar los permisos a multiples ficheros
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
		$perimisos = 0;

		foreach (array('p400','p200','p100','p040','p020','p010','p004','p002','p001') as $v) {
			$permisos += $PFN_vars->post($v);
		}

		foreach ($multiple_escollidos as $v) {
			$erro = false;
			$cal = $v = $PFN_accions->nome_correcto($v);
			$arquivo = $PFN_conf->g('raiz','path').$PFN_accions->path_correcto($dir.'/')
				.'/'.$cal;

			if (empty($v) || ($v == '.') || ($v == './') || !file_exists($arquivo)) {
				$erro = true;
				$estado = 2;
			}

			if (!$erro) {
				$PFN_accions->permisos($arquivo, $permisos);
				$estado = $PFN_accions->estado_num('multiple_permisos');
			}

			if ($erro || !$PFN_accions->estado('multiple_permisos')) {
				$estado_accion .= $PFN_conf->t('estado.multiple_permisos',intval($estado)).' '.$cal.'<br />';
				$cnt_erros++;
			}
		}
	}

	if ($cnt_erros == 0) {
		$estado_accion = $PFN_conf->t('estado.multiple_permisos', 1);
	} elseif ($cnt_erros != count($multiple_escollidos)) {
		$estado_accion .= $PFN_conf->t('estado.multiple_permisos', 3);
	}

	include ($PFN_paths['web'].'navega.inc.php');
} elseif ($PFN_conf->g('columnas','multiple') && count($multiple_escollidos) > 0) {
	foreach ($multiple_escollidos as $k => $v) {
		$v = $PFN_accions->nome_correcto($v);
		$arquivo = $PFN_conf->g('raiz','path').$PFN_accions->path_correcto($dir.'/').'/'.$v;

		if (empty($v) || ($v == '.') || ($v == './') || !file_exists($arquivo)) {
			$adv = $PFN_conf->t('estado.multiple_permisos', 2).' '.$v.'<br />';
			unset($multiple_escollidos[$k]);
		} else {
			$multiple_escollidos[$k] = $v;
		}
	}

	if (count($multiple_escollidos) > 0) {
		include ($PFN_paths['plantillas'].'posicion.inc.php');
		include ($PFN_paths['plantillas'].'multiple_permisos.inc.php');
	} else {
		include ($PFN_paths['web'].'navega.inc.php');
	}
} else {
	include ($PFN_paths['web'].'navega.inc.php');
}

$PFN_tempo->rexistra('postcodigo');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
