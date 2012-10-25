<?php
/*******************************************************************************
* instalar/include/actualizar.inc.php
*
* Ejectula la acción de actualización desde la versión 2.0.0 o posterior
*

PHPfileNavigator versión 2.3.3

Copyright (C) 2004-2006 Lito <lito@eordes.com>

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

defined('OK') or die();

$erros = $erros_q = $paso_feito = $feito = array();

$existe = implode('',$basicas['db']);

if (strlen($existe) == 0) {
	$erros[] = 18;
} else {
	if ($con = @mysql_connect($basicas['db']['host'], $basicas['db']['usuario'], $basicas['db']['contrasinal'])) {
		if (!@mysql_select_db($basicas['db']['base_datos'], $con)) {
			$erros[] = 15;
		}
	} else {
		$erros[] = 16;
	}
}

if (count($erros) == 0) {
	if ($basicas['version'] < 201) {
		include_once ($PFN_paths['instalar'].'include/actualizar_200-201.inc.php');
	}

	if ($PFN_vars->post('ignorar') == 'true') {
		$erros = array();
	}

	if ($basicas['version'] < 220) {
		include_once ($PFN_paths['instalar'].'include/actualizar_201-220.inc.php');
	}

	if ($PFN_vars->post('ignorar') == 'true') {
		$erros = array();
	}

	if ($basicas['version'] < 230) {
		include_once ($PFN_paths['instalar'].'include/actualizar_220-230.inc.php');
	}

	if ($PFN_vars->post('ignorar') == 'true') {
		$erros = array();
	}

	if ($basicas['version'] < 233) {
		include_once ($PFN_paths['instalar'].'include/actualizar_230-233.inc.php');
	}

	if ($PFN_vars->post('ignorar') == 'true') {
		$erros = array();
	}

	$PFN_conf->inicial('default');

	if (count($erros) == 0) {
		include ($PFN_paths['instalar'].'include/basicas.inc.php');

		basicas(array(
			'version' => $PFN_version,
			'idioma' => $form['idioma'],
			'estilo' => 'estilos/pfn/',
			'email' => $basicas['email'],
			'gd2' => $form['gd2'],
			'zlib' => $form['zlib'],
			'charset' => $form['charset'],
			'envio_alertas' => $basicas['envio_alertas'],
			'db:host' => $basicas['db']['host'],
			'db:base_datos' => $basicas['db']['base_datos'],
			'db:usuario' => $basicas['db']['usuario'],
			'db:contrasinal' => $basicas['db']['contrasinal'],
			'db:prefixo' => $basicas['db']['prefixo']
		));

		$PFN_conf->inicial('basicas');

		$feito[] = 'conf';
	}
}

if ($con) {
	@mysql_close($con);
}

include ($PFN_paths['instalar'].'plantillas/actualizar.inc.php');
?>
