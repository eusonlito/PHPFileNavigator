<?php
/****************************************************************************
* xestion/informes/uso_disco.inc.php
*
* Prepara los datos para mostrar el informe de uso de disco para las raíces
* que tengan limitado el espacio en disco
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

$ud_ordenar = trim($PFN_vars->get('ud_ordenar'));
$ud_modo = trim($PFN_vars->get('ud_modo'));

$ud_ordenar = empty($ud_ordenar)?'nome':$ud_ordenar;
$ud_modo = ($ud_modo == 'DESC')?'DESC':'ASC';

$listado['id'] = $listado['nome'] = $listado['actual'] = $listado['limite'] = $listado['libre'] = array();

$PFN_usuarios->init('raices');

for (; $PFN_usuarios->mais(); $PFN_usuarios->seguinte()) {
	$listado['id'][] = $PFN_usuarios->get('id');
	$listado['nome'][] = $PFN_usuarios->get('nome');

	if ($PFN_usuarios->get('peso_maximo') > 0) {
		$actual = $PFN_usuarios->get('peso_actual');
		$limite = $PFN_usuarios->get('peso_maximo');

		$listado['actual'][] = $actual;
		$listado['limite'][] = $limite;
		$listado['libre'][] = intval((($limite - $actual) / $limite) * 100);
	} else {
		$listado['actual'][] = $listado['limite'][] = $listado['libre'][] = false;
	}
}

if ($ud_modo == 'ASC') {
	asort($listado[$ud_ordenar]);
} else {
	arsort($listado[$ud_ordenar]);
}

$b = 1;
$txt = '<table class="tabla_informes" summary="">'
	.'<tr><th style="text-align: left;">'
		.'<a href="'.PFN_cambia_url(array('ud_ordenar','ud_modo','executa'), array('id',($ud_modo == 'ASC'?'DESC':'ASC'),'uso_disco'))
		.'">'.$PFN_conf->t('Xcol_id').'</a></th>'
	.'<th style="text-align: left;">'
		.'<a href="'.PFN_cambia_url(array('ud_ordenar','ud_modo','executa'), array('nome',($ud_modo == 'ASC'?'DESC':'ASC'),'uso_disco'))
		.'">'.$PFN_conf->t('Xcol_nome').'</a></th>'
	.'<th style="text-align: left;">'
		.'<a href="'.PFN_cambia_url(array('ud_ordenar','ud_modo','executa'), array('limite',($ud_modo == 'ASC'?'DESC':'ASC'),'uso_disco'))
		.'">'.$PFN_conf->t('Xcol_peso_limite').'</a></th>'
	.'<th style="text-align: left;">'
		.'<a href="'.PFN_cambia_url(array('ud_ordenar','ud_modo','executa'), array('actual',($ud_modo == 'ASC'?'DESC':'ASC'),'uso_disco'))
		.'">'.$PFN_conf->t('Xcol_peso_actual').'</a></th>'
	.'<th style="text-align: left;">'
		.'<a href="'.PFN_cambia_url(array('ud_ordenar','ud_modo','executa'), array('libre',($ud_modo == 'ASC'?'DESC':'ASC'),'uso_disco'))
		.'">'.$PFN_conf->t('Xcol_porcent_libre').'</a></th></tr>';

foreach ((array)$listado[$ud_ordenar] as $k => $v) {
	$b++;

	$txt .= '<tr'.((($b % 2) == 0)?' class="tr_par"':'').'><td>'.$listado['id'][$k].'</td>'
		.'<td><a href="../raices/index.php?'
			.PFN_cambia_url('id_raiz', $listado['id'][$k], false).'">'.$listado['nome'][$k].'</a></td>';

	if ($listado['limite'][$k]) {
		$libre = $listado['libre'][$k];
		$cor_libre = ($libre > 50)?'0C0':(($libre > 25)?'FC6':(($libre > 10)?'F60':'F00'));
		$txt .= '<td>'.PFN_peso($listado['limite'][$k]).'</td>'
			.'<td>'.PFN_peso($listado['actual'][$k]).'</td>'
			.'<td style="border: 1px solid #000;"><span style="display: block; border: 1px solid #CCC; width: '.$libre.'%; height: 15px; background-color: #'.$cor_libre.'; font-weight: bold;">'.$libre.'%</span></td></tr>';
	} else {
		$txt .= '<td colspan="3">'.$PFN_conf->t('sen_limite').'</td></tr>';
	}
}

$txt .= '</table>';
?>
