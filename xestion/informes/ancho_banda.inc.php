<?php
/****************************************************************************
* xestion/informes/ancho_banda.inc.php
*
* Prepara los datos para mostrar el informe de uso de ancho de banda de
* los usuarios
*

PHPfileNavigator versión 2.1.0

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

$ab_mes = trim($PFN_vars->post('ab_mes'));
$ab_ano = trim($PFN_vars->post('ab_ano'));
$ab_ordenar = trim($PFN_vars->get('ab_ordenar'));
$ab_modo = trim($PFN_vars->get('ab_modo'));

$ab_ordenar = empty($ab_ordenar)?'nome':$ab_ordenar;
$ab_modo = ($ab_modo == 'DESC')?'DESC':'ASC';
$ab_mes = empty($ab_mes)?date('m'):$ab_mes;
$ab_ano = empty($ab_ano)?date('Y'):$ab_ano;

$PFN_vars->get('ab_mes', $ab_mes);
$PFN_vars->get('ab_ano', $ab_ano);

$listado['id'] = $listado['nome'] = $listado['actual'] = $listado['limite'] = $listado['libre'] = array();

$PFN_usuarios->init('usuarios');

for (; $PFN_usuarios->mais(); $PFN_usuarios->seguinte()) {
	$listado['id'][] = $PFN_usuarios->get('id');
	$listado['nome'][] = $PFN_usuarios->get('nome');

	if ($PFN_usuarios->get('descargas_maximo') > 0) {
		$limite = $PFN_usuarios->get('descargas_maximo');
	} else {
		$limite = -1;
	}

	if (is_file($PFN_paths['info'].'usuario'.$PFN_usuarios->get('id').'/descargas.'.$ab_ano.$ab_mes.'.php')) {
		$actual = include ($PFN_paths['info'].'usuario'.$PFN_usuarios->get('id').'/descargas.'.$ab_ano.$ab_mes.'.php');

		$listado['actual'][] = $actual;
		$listado['limite'][] = $limite;

		if ($limite === -1) {
			$listado['libre'][] = 100;
		} else {
			$listado['libre'][] = intval((($limite - $actual) / $limite) * 100);
		}
	} else {
		$listado['actual'][] = $listado['limite'][] = $listado['libre'][] = false;
	}
}

if ($ab_modo == 'ASC') {
	asort($listado[$ab_ordenar]);
} else {
	arsort($listado[$ab_ordenar]);
}

$b = 1;
$txt = '<table class="tabla_informes" summary="">'
	.'<tr><th style="text-align: left;">'
		.'<a href="'.PFN_cambia_url(array('ab_ordenar','ab_modo','ab_mes','ab_ano','executa'), array('id',($ab_modo == 'ASC'?'DESC':'ASC'),$ab_mes,$ab_ano,'ancho_banda'))
		.'">'.$PFN_conf->t('Xcol_id').'</a></th>'
	.'<th style="text-align: left;">'
		.'<a href="'.PFN_cambia_url(array('ab_ordenar','ab_modo','ab_mes','ab_ano','executa'), array('nome',($ab_modo == 'ASC'?'DESC':'ASC'),$ab_mes,$ab_ano,'ancho_banda'))
		.'">'.$PFN_conf->t('Xcol_nome').'</a></th>'
	.'<th style="text-align: left;">'
		.'<a href="'.PFN_cambia_url(array('ab_ordenar','ab_modo','ab_mes','ab_ano','executa'), array('limite',($ab_modo == 'ASC'?'DESC':'ASC'),$ab_mes,$ab_ano,'ancho_banda'))
		.'">'.$PFN_conf->t('Xcol_ancho_banda_limite').'</a></th>'
	.'<th style="text-align: left;">'
		.'<a href="'.PFN_cambia_url(array('ab_ordenar','ab_modo','ab_mes','ab_ano','executa'), array('actual',($ab_modo == 'ASC'?'DESC':'ASC'),$ab_mes,$ab_ano,'ancho_banda'))
		.'">'.$PFN_conf->t('Xcol_ancho_banda_actual').'</a></th>'
	.'<th style="text-align: left;">'
		.'<a href="'.PFN_cambia_url(array('ab_ordenar','ab_modo','ab_mes','ab_ano','executa'), array('libre',($ab_modo == 'ASC'?'DESC':'ASC'),$ab_mes,$ab_ano,'ancho_banda'))
		.'">'.$PFN_conf->t('Xcol_porcent_libre').'</a></th></tr>';

foreach ((array)$listado[$ab_ordenar] as $k => $v) {
	$b++;

	$txt .= '<tr'.((($b % 2) == 0)?' class="tr_par"':'').'><td>'.$listado['id'][$k].'</td>'
		.'<td><a href="../usuarios/index.php?'
			.PFN_cambia_url('id_usuario', $listado['id'][$k], false).'">'.$listado['nome'][$k].'</a></td>';

	if ($listado['limite'][$k]) {
		$libre = $listado['libre'][$k];
		$cor_libre = ($libre > 50)?'0C0':(($libre > 25)?'FC6':(($libre > 10)?'F60':'F00'));
		$txt .= '<td>'.(($listado['limite'][$k] === -1)?$PFN_conf->t('sen_limite'):PFN_peso($listado['limite'][$k])).'</td>'
			.'<td>'.PFN_peso($listado['actual'][$k]).'</td>'
			.'<td style="border: 1px solid #000;"><span style="display: block; border: 1px solid #CCC; width: '.$libre.'%; height: 15px; background-color: #'.$cor_libre.'; font-weight: bold;">'.$libre.'%</span></td></tr>';
	} else {
		$txt .= '<td colspan="3">'.$PFN_conf->t('sen_datos').'</td></tr>';
	}
}

$txt .= '</table>';
?>
