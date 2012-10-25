<?php
/****************************************************************************
* data/accions/redimensionar.inc.php
*
* Realiza la visualización o acción de crear un thumbnail de una imagen
*

PHPfileNavigator versión 2.3.2

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

$PFN_tempo->rexistra('precodigo');

$destino = $PFN_conf->g('raiz','path').$PFN_niveles->path_correcto($dir);
$imx_path = $PFN_niveles->path_correcto($destino.'/'.$cal);
$ucal = rawurlencode($cal);
$mais = $PFN_vars->get('mais_0');
$fin = false;
$estado_accion = '';
$estado = true;

if ($PFN_vars->get('executa')) {
	@set_time_limit($PFN_conf->g('tempo_maximo'));
	@ini_set('memory_limit', $PFN_conf->g('memoria_maxima'));

	if ($PFN_vars->get('modo') == 'recortar') {
		$PFN_imaxes->recortar($imx_path, $PFN_vars->get('posX'), $PFN_vars->get('posY'), $PFN_vars->get('ancho'), $PFN_vars->get('alto'));
	} else {
		$PFN_imaxes->reducir($imx_path);
	}

	if (empty($mais)) {
		$fin = true;
	} else {
		$PFN_vars->get('cal', $mais);
		$PFN_vars->get('mais_0', '');

		for ($i = 0, $cnt = 0; $i < $PFN_conf->g('inc','limite'); $i++) {
			if ($PFN_vars->get("mais_$i") != '') {
				$PFN_vars->get("mais_$cnt", $PFN_vars->get("mais_$i"));
				$PFN_vars->get("mais_$i", '');
				$cnt++;
			}
		}

		$imx_path = $PFN_niveles->path_correcto($destino.'/'.$PFN_vars->get('cal'));
	}
}

if ($PFN_vars->post('eliminar_peq')) {
	@unlink($PFN_imaxes->nome_pequena($imx_path));
	$estado_accion = $PFN_conf->t('estado.redimensionar', 2);
	$fin = true;
}

if (!$fin && $PFN_conf->g('imaxes','pequena') && ($datos = $PFN_imaxes->e_imaxe($imx_path))) {
	$PFN_accions->arquivos($PFN_arquivos);

	$tamano = PFN_espacio_disco($imx_path, true);
	$estado = $PFN_accions->log_ancho_banda($tamano, true);

	if ($estado === true) {
		$hai_pequena = is_file($PFN_imaxes->nome_pequena($imx_path));

		include ($PFN_paths['plantillas'].'redimensionar.inc.php');
	} else {
		$fin = true;
	}
}

if ($fin) {
	if (!$estado_accion) {
		if ($estado === true) {
			$estado_accion = $PFN_conf->t('estado.redimensionar', 1);
		} elseif ($estado === -1) {
			$estado_accion = $PFN_conf->t('estado.descargar', 3);
		} else {
			$estado_accion = $PFN_conf->t('estado.descargar', 2);
		}
	}

	include ($PFN_paths['web'].'opcions.inc.php');
	include ($PFN_paths['web'].'navega.inc.php');
}

$PFN_tempo->rexistra('postcodigo');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
