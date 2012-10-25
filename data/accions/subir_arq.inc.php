<?php
/****************************************************************************
* data/accions/subir_arq.inc.php
*
* Realiza la visualización o acción de subir un fichero al servidor
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

$cantos = $PFN_vars->get('cantos')?intval($PFN_vars->get('cantos')):1;

PFN_quita_url_SERVER('cantos');

$PFN_tempo->rexistra('precodigo');

include_once ($PFN_paths['include'].'class_inc.php');
$PFN_inc = new PFN_INC($PFN_conf);

if ($PFN_vars->post('executa')) {
	@set_time_limit($PFN_conf->g('tempo_maximo'));
	@ini_set('memory_limit', $PFN_conf->g('memoria_maxima'));

	$PFN_imaxes->arquivos($PFN_arquivos);
	$PFN_accions->arquivos($PFN_arquivos);

	if ($PFN_conf->g('inc','estado')) {
		$PFN_inc->arquivos($PFN_arquivos);
	}

	if ($PFN_conf->g('inc','indexar')) {
		include_once ($PFN_paths['include'].'class_indexador.php');
		$PFN_indexador = new PFN_Indexador($PFN_conf);
	}

	$upload_dir = $PFN_conf->g('raiz','path').$PFN_niveles->path_correcto($dir.'/');
	$files = $PFN_vars->files('');
	$files = $files['nome_arquivo'];
	$titulos = $PFN_vars->post('titulo');
	$descricions = $PFN_vars->post('descricion');
	$opc_imaxes = $PFN_vars->post('imaxe');
	$sobreescribir = $PFN_vars->post('sobreescribir');
	$aviso_subida = $PFN_vars->post('aviso_subida');
	$recortar = false;
	$i = 1;

	foreach ((array)$files['name'] as $k => $v) {
		if ((!empty($v) && ($files['size'][$k] == 0 || empty($files['tmp_name'][$k])))
		|| $files['size'][$k] > $PFN_conf->g('inc','peso')) {
			$estado_accion .= $v.': '.$PFN_conf->t('estado.subir_arq', 5).'<br />';
			continue;
		} elseif (empty($v)) {
			continue;
		} else {
			if ($PFN_conf->g('raiz','peso_maximo') > 0) {
				$peso_este = $files['size'][$k];

				if ($peso_este + $PFN_conf->g('raiz', 'peso_actual') > $PFN_conf->g('raiz','peso_maximo')) {
					$estado_accion .= $v.': '.$PFN_conf->t('estado.subir_arq', 6).'<br />';
					continue;
				}
			}

			$ancho_banda = $PFN_accions->log_ancho_banda($files['size'][$k]);

			if (!$ancho_banda) {
				$estado_accion .= $v.': '.$PFN_conf->t('estado.subir_arq', 7).'<br />';
				continue;
			}

			$imaxe = '';
			$v = $PFN_niveles->nome_correcto($v);

			if ($sobreescribir[$i] == 1 && is_file($upload_dir.'/'.$v)) {
				if (is_file($PFN_imaxes->nome_pequena($upload_dir.'/'.$v))) {
					@unlink($PFN_imaxes->nome_pequena($upload_dir.'/'.$v));
				}

				@unlink($upload_dir.'/'.$v);
			}

			$PFN_accions->upload($v, $files['tmp_name'][$k], $upload_dir);
			$estado = $PFN_accions->estado_num('subir_arq');

			if ($PFN_accions->estado('subir_arq')) {
				if ($PFN_conf->g('inc','estado')) {
					$PFN_inc->multiple($i);
					$PFN_inc->mais_datos('usuario', $PFN_conf->g('usuario','usuario'));
					$arq_inc = $PFN_inc->crea_inc($upload_dir.'/'.$v,'arq');
				}

				if ($PFN_conf->g('inc','indexar')) {
					$PFN_indexador->alta_modificacion("$dir/", $v, $arq_inc);
				}

				if ($PFN_conf->g('imaxes','pequena') && $opc_imaxes[$i] != '') {
					if (!is_array($imaxe)) {
						$imaxe = @getimagesize($upload_dir.'/'.$v);
					}

					if (in_array($imaxe[2],$PFN_conf->g('imaxes','validas'))) {
						if ($opc_imaxes[$i] == 'reducir') {
							$PFN_imaxes->reducir($upload_dir.'/'.$v);
						} elseif ($opc_imaxes[$i] == 'recortar') {
							$recortar[] = $v;
						}
					}
				}

				if ($PFN_conf->g('raiz','peso_maximo') > 0) {
					$peso_este += $PFN_conf->g('raiz', 'peso_actual');

					if ($PFN_conf->g('inc','estado')) {
						$peso_este += PFN_espacio_disco($arq_inc, true);
					}

					if ($PFN_conf->g('imaxes','pequena') && $opc_imaxes[$i] != 'reducir') {
						$peso_este += PFN_espacio_disco($PFN_imaxes->nome_pequena($upload_dir.'/'.$v), true);
					}

					$PFN_conf->p($peso_este, 'raiz', 'peso_actual');
					$PFN_usuarios->accion('peso', $peso_este, $PFN_conf->g('raiz','id'));
				}

				if ($aviso_subida[$i] && $PFN_conf->g('avisos','subida')) {
					$correo_emisor = 'pfn@'.getenv('SERVER_NAME');

					$tit_subida = PFN_quitaHtmlentities(strlen($titulos[$k])?$titulos[$k]:$PFN_conf->t('tit_aviso_subida'));
					$txt_subida = str_replace('{ARQUIVO}', "$dir/$v", $PFN_conf->t('txt_aviso_subida'));
					$txt_subida = PFN_quitaHtmlentities($descricions[$k]."\n\n".$txt_subida)
						."\n\n".$PFN_conf->g('protocolo')
						.$PFN_vars->server('SERVER_NAME')
						.dirname($PFN_vars->server('SCRIPT_NAME')).'/';

					$PFN_usuarios->init('w:usuarios_raiz', $PFN_conf->g('raiz','id'));

					for (; $PFN_usuarios->mais(); $PFN_usuarios->seguinte()) {
						if ($PFN_usuarios->get('id') == $PFN_conf->g('usuario','id')) {
							$correo_emisor = $PFN_usuarios->get('email');
							break;
						}
					}

					for ($PFN_usuarios->indice(0); $PFN_usuarios->mais(); $PFN_usuarios->seguinte()) {
						@mail($PFN_usuarios->get('email'), $tit_subida, $txt_subida, 'FROM: '.$correo_emisor);
					}
				}
			}

			$estado_accion .= $v.': '.$PFN_conf->t('estado.subir_arq',intval($estado)).'<br />';
		}

		if ($i++ && ($i > $PFN_conf->g('inc','limite'))) {
			break;
		}
	}

	$PFN_tempo->rexistra('preplantillas');

	if (is_array($recortar) && count($recortar)) {
		$cal = $arquivo = $recortar[0];
		$PFN_vars->get('cal', $cal);
		unset($recortar[0]);

		if (count($recortar)) {
			foreach ($recortar as $k => $v) {
				$PFN_vars->get("mais_$k", $v);
			}
		}

		include ($PFN_paths['accions'].'redimensionar.inc.php');
	} else {
		include ($PFN_paths['plantillas'].'cab.inc.php');

		$PFN_tempo->rexistra('precodigo');

		include ($PFN_paths['web'].'opcions.inc.php');
		include ($PFN_paths['web'].'navega.inc.php');

		$PFN_tempo->rexistra('postcodigo');

		include ($PFN_paths['plantillas'].'pe.inc.php');
	}
} else {
	include ($PFN_paths['plantillas'].'cab.inc.php');

	include ($PFN_paths['web'].'opcions.inc.php');
	include ($PFN_paths['plantillas'].'posicion.inc.php');

	if ($PFN_conf->g('progress_bar') == true) {
		include ($PFN_paths['plantillas'].'subir_arq_ajax.inc.php');
	} else {
		include ($PFN_paths['plantillas'].'subir_arq.inc.php');
	}

	$PFN_tempo->rexistra('postcodigo');

	include ($PFN_paths['plantillas'].'pe.inc.php');
}
?>
