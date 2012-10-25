<?php
/****************************************************************************
* data/accions/subir_url.inc.php
*
* Realiza la visualización o acción de subir un una url remota al servidor
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
include ($PFN_paths['web'].'opcions.inc.php');

$PFN_tempo->rexistra('precodigo');

include_once ($PFN_paths['include'].'class_inc.php');
$PFN_inc = new PFN_INC($PFN_conf);

$erro = false;

if ($PFN_vars->post('executa')) {
	$donde = $PFN_conf->g('raiz','path').$PFN_niveles->path_correcto($dir.'/');
	$cal = $PFN_niveles->nome_correcto($PFN_vars->post('nome_arquivo'));
	$nome_url = stripslashes($PFN_vars->post('nome_url'));
	$nome_url = preg_match('/^http/im',$nome_url)?$nome_url:'http://'.$nome_url;

	if (!strstr($cal, '.')) {
		if (preg_match('/\/$/', $nome_url)) {
			$cal .= '.html';
		} elseif (preg_match('/^http[s]*:\/\/.+\/.+$/', $nome_url)) {
			if (strstr($nome_url,'?')) {
				$docu = explode('?', $nome_url);
				$docu = $docu[0];
			} else {
				$docu = $nome_url;
			}

			$docu = explode('.', $docu);
			$ext = end($docu);

			if (strlen($ext) > 1 && strlen($ext) < 5) {
				$cal .= ".$ext";
			} else {
				$cal .= '.html';
			}
		} else {
			$cal .= '.html';
		}
	}

	if ($PFN_vars->post('cancelar') != '') {
		if (is_file($donde.'/'.$cal)) {
			if ($PFN_conf->g('raiz','peso_maximo') > 0) {
				$peso_este = PFN_espacio_disco($donde.'/'.$cal, true);
				$peso_este = $PFN_conf->g('raiz', 'peso_actual') - $peso_este;

				$PFN_usuarios->accion('peso', $peso_este, $PFN_conf->g('raiz','id'));
			}

			unlink($donde.'/'.$cal);
		}

		$estado_accion = $PFN_conf->t('estado.subir_url',6);
	} elseif (($nome_url != '') && ($PFN_vars->post('nome_arquivo') != '')) {
		$PFN_accions->arquivos($PFN_arquivos);

		if (($PFN_vars->post('sobreescribir') == 1) && is_file($donde.'/'.$cal)) {
			if (is_file($PFN_imaxes->nome_pequena($donde.'/'.$cal))) {
				@unlink($PFN_imaxes->nome_pequena($donde.'/'.$cal));
			}

			@unlink($donde.'/'.$cal);
		}

		$PFN_accions->subir_url($nome_url, $donde, $cal);
		$estado = $PFN_accions->estado_num('subir_url');
		$estado_accion = $PFN_conf->t('estado.subir_url',intval($estado));

		if ($PFN_accions->estado('subir_url')) {
			if ($PFN_conf->g('raiz','peso_maximo') > 0) {
				$peso_este = PFN_espacio_disco($donde.'/'.$cal, true);

				if (($peso_este + $PFN_conf->g('raiz', 'peso_actual')) > $PFN_conf->g('raiz','peso_maximo')) {
					@unlink($donde.'/'.$cal);
					$estado_accion = $PFN_conf->t('estado.subir_url', 7).'<br />';
					$erro = true;
				}
			}

			$ancho_banda = $PFN_accions->log_ancho_banda($peso_este);

			if (!$ancho_banda) {
				@unlink($donde.'/'.$cal);
				$estado_accion = $PFN_conf->t('estado.subir_url', 9).'<br />';
				$erro = true;
			}

			if (!$erro && $PFN_conf->g('inc','estado')) {
				$PFN_inc->arquivos($PFN_arquivos);
				$PFN_inc->mais_datos('usuario', $PFN_conf->g('usuario','usuario'));
				$arq_inc = $PFN_inc->crea_inc($donde.'/'.$cal,'url');
			}

			if (!$erro && $PFN_conf->g('inc','indexar')) {
				include_once ($PFN_paths['include'].'class_indexador.php');

				$PFN_indexador = new PFN_Indexador($PFN_conf);
				$PFN_indexador->alta_modificacion("$dir/", $cal, $arq_inc);
			}

			if (!$erro && ($PFN_conf->g('raiz','peso_maximo') > 0)) {
				$peso_este += $PFN_conf->g('raiz', 'peso_actual');

				if ($PFN_conf->g('inc','estado')) {
					$peso_este += PFN_espacio_disco($arq_inc, true);
				}

				$PFN_conf->p($peso_este, 'raiz', 'peso_actual');
				$PFN_usuarios->accion('peso', $peso_este, $PFN_conf->g('raiz','id'));
			}
		}
	}

	include ($PFN_paths['web'].'navega.inc.php');
} else {
	$msx_adv = $PFN_conf->t('estado.subir_url',4);

	include ($PFN_paths['plantillas'].'posicion.inc.php');
	include ($PFN_paths['plantillas'].'subir_url.inc.php');
}

$PFN_tempo->rexistra('postcodigo');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
