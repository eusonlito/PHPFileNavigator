<?php
/****************************************************************************
* xestion/traduccion/index.inc.php
*
* Carga los textos para ser traducidos
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

$tr_orixe = $PFN_vars->post('tr_orixe');
$tr_destino = $PFN_vars->post('tr_destino');
$tr_arquivo = $PFN_vars->post('tr_arquivo');
$tr_listar = $PFN_vars->post('tr_listar');
$executa = $PFN_vars->post('executa');
$erros = array();
$ok = false;
$datos_orixe = array();
$datos_destino = array();

$lista_idiomas = $PFN_conf->t('lista_idiomas');
asort($lista_idiomas);

foreach ($lista_idiomas as $k => $v) {
	if (is_dir($PFN_paths['idiomas'].$k)) {
		$idiomas_valen[$k] = $v;
	}
}

if ($executa == 'escoller') {
	$idioma_orixe = $PFN_paths['idiomas'].$PFN_niveles->path_correcto($tr_orixe).'/'.$PFN_niveles->nome_correcto($tr_arquivo).'.inc.php';
	$path_destino = $PFN_paths['idiomas'].$PFN_niveles->path_correcto($tr_destino);
	$idioma_destino = $path_destino.'/'.$PFN_niveles->nome_correcto($tr_arquivo).'.inc.php';

	if (is_file($idioma_destino) && !is_writable($idioma_destino)) {
		$erros[] = 33;
	} elseif (is_writable($PFN_paths['idiomas']) && (is_dir($path_destino)?is_writable($path_destino):true)) {
		if (is_file($idioma_orixe)) {
			$datos_orixe = include ($idioma_orixe);
			$idioma_destino = $PFN_paths['idiomas'].$PFN_niveles->path_correcto($tr_destino).'/'.$PFN_niveles->nome_correcto($tr_arquivo).'.inc.php';

			if (is_file($idioma_destino)) {
				$datos_destino = include ($idioma_destino);
			}

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
			$erros[] = 32;
		}
	} else {
		$erros[] = 33;
	}
}
?>
