<?php
/****************************************************************************
* data/accions/multiple_correo.inc.php
*
* Realiza la visualización o acción de enviar multiples ficheros en un
* correo electronico
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

$multiple_escollidos = (array)$PFN_vars->post('multiple_escollidos');
$estado_accion = '';
$estado = 1;
$cnt_erros = 0;
$adv = '';

include ($PFN_paths['plantillas'].'cab.inc.php');
include ($PFN_paths['web'].'opcions.inc.php');

$PFN_tempo->rexistra('precodigo');

if ($PFN_conf->g('columnas','multiple')
&& $PFN_vars->post('executa')
&& (count($multiple_escollidos) > 0)) {
	$para = trim($PFN_vars->post('para'));
	$titulo = trim($PFN_vars->post('titulo'));
	$mensaxe = trim($PFN_vars->post('mensaxe'));
	$so_lista = trim($PFN_vars->post('so_lista'));
	$cada_correo = array();

	if (empty($para)) {
		$estado = 4;
		$estado_accion = $PFN_conf->t('estado.correo', $estado).'<br />';
	} if (empty($titulo)) {
		$estado = 2;
		$estado_accion .= $PFN_conf->t('estado.correo', $estado).'<br />';
	} if (empty($mensaxe)) {
		$estado = 3;
		$estado_accion .= $PFN_conf->t('estado.correo', $estado).'<br />';
	}

	if (preg_match('/[,;]/', $para)) {
		$cada_correo = split('[,;]', $para);

		foreach ($cada_correo as $k => $v) {
			$v = trim($v);

			if (empty($v)) {
				unset($cada_correo[$k]);
			}

			if (PFN_check_correo($v)) {
				$cada_correo[$k] = $v;
			} else {
				$estado = 5;
				$estado_accion .= $PFN_conf->t('estado.correo', $estado).$v.'<br />';

				unset($cada_correo[$k]);
			}
		}

		if (count($cada_correo) == 0) {
			$estado = 6;
			$estado_accion .= $PFN_conf->t('estado.correo', $estado).'<br />';
		}
	} elseif (PFN_check_correo($para)) {
		$cada_correo = array($para);
	} else {
		$estado = 5;
		$estado_accion .= $PFN_conf->t('estado.correo', $estado).$para.'<br />';
	}

	if ($estado === 1) {
		$PFN_usuarios->init('usuario', $PFN_conf->g('usuario','id'));

		$from = array($PFN_usuarios->get('email'), $PFN_usuarios->get('nome'));

		include ($PFN_paths['include'].'class_nxs.php');

		$nxs = new PFN_nxs_mimemail($PFN_conf);
		$nxs->imaxes($PFN_imaxes);

		if ($so_lista == 'true') {
			$mensaxe .= "\n";

			foreach ($multiple_escollidos as $v) {
				$mensaxe .= "\n".$PFN_niveles->enlace($dir, $v);
			}

			$nxs->new_mail($from, $cada_correo, $titulo, $mensaxe);
		} else {
			$PFN_accions->arquivos($PFN_arquivos);

			foreach ($multiple_escollidos as $v) {
				$v = $PFN_accions->nome_correcto($v);
				$arquivo = $PFN_conf->g('raiz','path').$PFN_accions->path_correcto($dir.'/').'/'.$v;

				$tamano = PFN_espacio_disco($arquivo, true);
				$estado = $PFN_accions->log_ancho_banda($tamano, true);

				if ($estado !== true) {
					$estado = 9;
					$estado_accion .= $PFN_conf->t('estado.correo', $estado);
				} elseif ($tamano > $PFN_conf->g('limite_correo')) {
					$estado = 10;
					$estado_accion .= $PFN_conf->t(array('estado.correo', $estado), PFN_peso($PFN_conf->g('limite_correo')));
				}

				if ($estado != 1) {
					break;
				}
			}

			if ($estado == 1) {
				$nxs->new_mail($from, $cada_correo, $titulo, $mensaxe);

				foreach ($multiple_escollidos as $v) {
					$v = $PFN_accions->nome_correcto($v);
					$arquivo = $PFN_conf->g('raiz','path').$PFN_accions->path_correcto($dir.'/').'/'.$v;

					if ($nxs->add_attachment($arquivo, str_replace(' ','_',$v))) {
						$estado = 7;
						$estado_accion .= $PFN_conf->t('estado.correo', $estado);
					}
				}
			}
		}

		if ($estado == 1) {
			$estado = $nxs->send();
			$estado_accion .= $PFN_conf->t('estado.correo', $estado);
		}

		if ($estado == 1) {
			$PFN_accions->log_ancho_banda($tamano);
			$PFN_accions->log_accion('enviar_correo', $arquivo, $PFN_conf->g('raiz','path').implode(', ',$cada_correo));

			include ($PFN_paths['web'].'navega.inc.php');
		} else {
			include ($PFN_paths['plantillas'].'posicion.inc.php');
			include ($PFN_paths['plantillas'].'multiple_correo.inc.php');
		}
	} else {
		include ($PFN_paths['plantillas'].'posicion.inc.php');
		include ($PFN_paths['plantillas'].'multiple_correo.inc.php');
	}
} elseif ($PFN_conf->g('columnas','multiple') && count($multiple_escollidos) > 0) {
	foreach ($multiple_escollidos as $k => $v) {
		$v = $PFN_accions->nome_correcto($v);
		$arquivo = $PFN_conf->g('raiz','path').$PFN_accions->path_correcto($dir.'/').'/'.$v;

		if (empty($v) || ($v == '.') || ($v == './') || !file_exists($arquivo)) {
			$estado_accion .= $PFN_conf->t('estado.correo', 2).' '.$v.'<br />';

			unset($multiple_escollidos[$k]);
		} elseif (is_dir($arquivo)) {
			$estado_accion .= $PFN_conf->t('estado.correo', 11).' '.$v.'<br />';

			unset($multiple_escollidos[$k]);
		} else {
			$multiple_escollidos[$k] = $v;
		}
	}

	if (count($multiple_escollidos) > 0) {
		include ($PFN_paths['plantillas'].'posicion.inc.php');
		include ($PFN_paths['plantillas'].'multiple_correo.inc.php');
	} else {
		include ($PFN_paths['web'].'navega.inc.php');
	}
} else {
	include ($PFN_paths['web'].'navega.inc.php');
}

$PFN_tempo->rexistra('postcodigo');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
