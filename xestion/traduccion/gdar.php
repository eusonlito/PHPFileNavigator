<?php
/****************************************************************************
* xestion/traduccion/gdar.inc.php
*
* Garda el resultado de la traduccion en el idioma seleccionado
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

$relativo = '../../';

include ($relativo.'paths.php');
include_once ($PFN_paths['include'].'basicweb.php');
include_once ($PFN_paths['include'].'Xusuarios.php');

session_write_close();

$PFN_conf->textos('idiomas');

$tr_charset = $PFN_vars->post('tr_charset');
$tr_orixe = $PFN_vars->post('tr_orixe');
$tr_destino = $PFN_vars->post('tr_destino');
$tr_arquivo = $PFN_vars->post('tr_arquivo');
$tr_listar = $PFN_vars->post('tr_listar');
$executa = $PFN_vars->post('executa');
$erros = array();
$ok = false;

$lista_idiomas = $PFN_conf->t('lista_idiomas');
asort($lista_idiomas);

foreach ($lista_idiomas as $k => $v) {
	if (is_dir($PFN_paths['idiomas'].$k)) {
		$idiomas_valen[$k] = $v;
	}
}

if ($executa == 'gardar') {
	$idioma_orixe = $PFN_paths['idiomas'].$PFN_niveles->path_correcto($tr_orixe).'/'.$PFN_niveles->nome_correcto($tr_arquivo).'.inc.php';

	if (is_file($idioma_orixe)) {
		$path_destino = $PFN_paths['idiomas'].$PFN_niveles->path_correcto($tr_destino);
		$idioma_destino = $path_destino.'/'.$PFN_niveles->nome_correcto($tr_arquivo).'.inc.php';

		if (is_file($idioma_destino) && !is_writable($idioma_destino)) {
			$erro[] = 33;
		} elseif (is_writable($PFN_paths['idiomas']) && (is_dir($path_destino)?is_writable($path_destino):true)) {
			include_once ($PFN_paths['include'].'class_arquivos.php');
			$PFN_arquivos = new PFN_Arquivos($PFN_conf);

			if (!is_dir($path_destino)) {
				mkdir($path_destino);
				$PFN_arquivos->abre_escribe($path_destino.'/index.html', '');
			}

			$datos_orixe = include ($idioma_orixe);
			$datos_destino = $PFN_vars->post('idioma_i');
			$txt = '';
			$cambia['mal'] = array('&lt;','&gt;','&quot;');
			$cambia['ben'] = array('<','>','"');

			foreach ($datos_orixe as $k => $v) {
				if (is_array($v)) {
					$txt .= "\n\t".'\''.$k.'\' => array(';

					foreach ($v as $k2 => $v2) {
						unset($v2);

						$cad = PFN_textoForm2interno($datos_destino[$k][$k2]);
						$cad = htmlentities($cad, ENT_NOQUOTES, $PFN_conf->g('charset'));
						$cad = str_replace($cambia['mal'],$cambia['ben'],$cad);

						$txt .= "\n\t\t".'\''.$k2.'\' => \''.$cad.'\',';
					}

					$txt .= "\n\t".'),';
				} else {
					$cad = PFN_textoForm2interno($datos_destino[$k]);
					$cad = htmlentities($cad, ENT_NOQUOTES, $PFN_conf->g('charset'));
					$cad = str_replace($cambia['mal'],$cambia['ben'],$cad);

					$txt .= "\n\t".'\''.$k.'\' => \''.$cad.'\',';
				}
			}

			$licencia['script'] = 'data/idiomas/'.$tr_destino.'/'.$tr_arquivo.'.inc.php';
			$licencia['descricion'] = 'Textos para el idioma '.$PFN_conf->t('lista_idiomas',$tr_destino);

			$txt_licencia = include ($PFN_paths['include'].'licencia.php');
			$txt = '<?php'
				."\n".$txt_licencia
				."\n\n".'defined(\'OK\') or die();'
				."\n\n".'return array('
				.$txt
				."\n".');'
				."\n".'?>';

			$ok = $PFN_arquivos->abre_escribe($idioma_destino, $txt);

			if ($ok) {
				$datos_destino = include ($idioma_destino);

				foreach ($datos_orixe as $k => $v) {
					if (is_array($v)) {
						foreach ($v as $k2 => $v2) {
							$datos_orixe[$k][$k2] = str_replace('\\','',$v2);
							$datos_destino[$k][$k2] = str_replace('\\','',$datos_destino[$k][$k2]);
						}
					} else {
						$datos_orixe[$k] = str_replace('\\','',$v);
						$datos_destino[$k] = str_replace('\\','',$datos_destino[$k]);
					}
				}
			} else {
				$erros[] = 34;
			}
		} else {
			$erros[] = 33;
		}
	} else {
		$erros[] = 32;
	}
}

$PFN_tempo->rexistra('precarga');

$tr_charset = empty($tr_charset)?$PFN_conf->g('charset'):$tr_charset;

$PFN_conf->p($tr_charset,'charset');

include ($PFN_paths['plantillas'].'cab.inc.php');
include ($PFN_paths['xestion'].'Xopcions.inc.php');

$PFN_tempo->rexistra('precodigo');

include ($PFN_paths['plantillas'].'Xtraduccion.inc.php');

$PFN_tempo->rexistra('postcodigo');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
