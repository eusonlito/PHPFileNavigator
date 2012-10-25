<?php
/****************************************************************************
* xestion/traduccion/estado.inc.php
*
* Carga los datos de comprobación del estado de las traducciones
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

defined('OK') && defined('XESTION') or die();

$tr_idioma_base = $PFN_vars->post('tr_idioma_base');
$executa = $PFN_vars->post('executa');
$idiomas_valen = array();
$txt_informe = '';
$idiomas_arquivos = array('axuda','estado','idiomas','instalar','web','xestion');

$lista_idiomas = $PFN_conf->t('lista_idiomas');
asort($lista_idiomas);

foreach ($lista_idiomas as $k => $v) {
	if (is_dir($PFN_paths['idiomas'].$k)) {
		$idiomas_valen[$k] = $v;
	}
}

if ($executa == 'comprobar'
&& !empty($tr_idioma_base)
&& preg_match('/^[a-z]+$/', $tr_idioma_base)
&& is_dir($PFN_paths['idiomas'].$PFN_niveles->path_correcto($tr_idioma_base))) {
	$path_base = $PFN_paths['idiomas'].$PFN_niveles->path_correcto($tr_idioma_base);

	$txt_informe = '<table class="tabla_informes" summary="">'
		."\n".'<tr><th>'.$PFN_conf->t('idioma').'</th>';

	foreach ($idiomas_arquivos as $v) {
		$txt_informe .= '<th>'.ucfirst($v).'</th>';
		$cnt_base[$v] = 0;

		if (is_file($path_base.'/'.$v.'.inc.php')) {
			$datos = include ($path_base.'/'.$v.'.inc.php');

			foreach ($datos as $v2) {
				if (is_array($v2)) {
					foreach ($v2 as $v3) {
						$cnt_base[$v] += empty($v3)?0:1;
					}
				} else {
					$cnt_base[$v] += empty($v2)?0:1;
				}
			}

			unset($datos);
		}
	}

	$txt_informe .= '<th>'.$PFN_conf->t('descargar').'</th>'
		.'</tr>'."\n".'<tr style="text-align: right;"><td>'
		.$PFN_conf->t('lista_idiomas',$tr_idioma_base).'</td>';

	foreach ($idiomas_arquivos as $v) {
		$txt_informe .= '<td style="background: #'
			.(($cnt_base[$v] > 0)?'6C6':'000; color: #FFF').';">'.$cnt_base[$v].'</td>';
	}

	$txt_informe .= '<td><ul class="accions"><li class="descargar"><a href="descargar.php?'
		.PFN_cambia_url('idioma',$tr_idioma_base,false).'" title="'.$PFN_conf->t('descargar')
		.'"><span class="oculto">'.$PFN_conf->t('descargar').'</span></a></li></ul></td></tr>';

	foreach ($idiomas_valen as $k => $v) {
		if ($k == $tr_idioma_base) {
			continue;
		}

		$txt_informe .= "\n".'<tr style="text-align: right;"><td>'
			.$PFN_conf->t('lista_idiomas',$k).'</td>';

		foreach ($idiomas_arquivos as $v2) {
			$cnt_este = 0;

			if (is_file($PFN_paths['idiomas'].$k.'/'.$v2.'.inc.php')) {
				$datos_este = include ($PFN_paths['idiomas'].$k.'/'.$v2.'.inc.php');

				foreach ($datos_este as $tmp_v1) {
					if (is_array($tmp_v1)) {
						foreach ($tmp_v1 as $tmp_v2) {
							$cnt_este += empty($tmp_v2)?0:1;
						}
					} else {
						$cnt_este += empty($tmp_v1)?0:1;
					}
				}

				$txt_informe .= '<td style="background: #'
					.(($cnt_este > $cnt_base[$v2])?'69E':(($cnt_este < $cnt_base[$v2])?'E66':'6C6'))
					.';"> '.$cnt_este.' </td>';
			} else {
				$txt_informe .= '<td style="background: #000; color: #FFF"> 0 </td>';
			}
		}

		$txt_informe .= '<td><ul class="accions"><li class="descargar"><a href="descargar.php?'
			.PFN_cambia_url('idioma',$k,false).'" title="'.$PFN_conf->t('descargar')
			.'"><span class="oculto">'.$PFN_conf->t('descargar').'</span></a></li></ul></td></tr>';
	}

	$txt_informe .= '</table>';
}
?>
