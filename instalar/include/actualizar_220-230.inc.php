<?php
/*******************************************************************************
* instalar/include/actualizar_220-230.inc.php
*
* Ejectula la acción de actualización desde la versión entre 2.2.0 y 2.3.0
*

PHPfileNavigator versión 2.3.0

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

if (count($erros) == 0) {
	$arq_mysql = $PFN_paths['instalar'].'mysql/actualizar_220-230.sql';
	$consultas = file_get_contents($arq_mysql);
	$consultas = str_replace('EXISTS ', 'EXISTS '.$basicas['db']['prefixo'], $consultas);
	$consultas = str_replace('ALTER IGNORE TABLE ', 'ALTER IGNORE TABLE '.$basicas['db']['prefixo'], $consultas);
	$consultas = explode(';', $consultas);

	foreach ((array)$consultas as $q) {
		$q = trim($q);

		if (empty($q)) {
			continue;
		}

		if (!@mysqli_query($con, $q)) {
			$erros['mysql_220-230'] = 17;
			$erros_q['mysql_220-230'][] = array(
				'consulta' => $q,
				'erro' => mysqli_error($con)
			);
		}
	}

	$consultas = include ($PFN_paths['instalar'].'mysql/actualizar_200-230.php');

	foreach ($consultas as $q) {
		$q = trim($q);

		if (empty($q)) {
			continue;
		}

		if (!@mysqli_query($con, $q)) {
			$erros['mysql_220-230'] = 17;
			$erros_q['mysql_220-230'][] = array(
				'consulta' => $q,
				'erro' => mysqli_error($con)
			);
		}
	}

	include_once ($PFN_paths['include'].'class_niveles.php');
	include_once ($PFN_paths['include'].'class_accions.php');

	$PFN_niveles = new PFN_Niveles($PFN_conf);
	$PFN_accions = new PFN_Accions($PFN_conf);

	// Movemos el directorio tmp/
	if (is_dir($PFN_paths['web'].'tmp')) {
		$PFN_accions->mover($PFN_paths['web'].'tmp', $PFN_paths['servidor'].'tmp/');
	} else {
		mkdir($PFN_paths['tmp']);
	}

	if (is_dir($PFN_paths['web'].'tmp')) {
		@rmdir($PFN_paths['web'].'tmp');
	}

	if (!is_file($PFN_paths['tmp'].'index.html')) {
		copy($PFN_paths['data'].'index.html', $PFN_paths['tmp'].'index.html');
	}

	chmod($PFN_paths['tmp'], 0700);

	// Movemos el directorio data/logs/
	if (is_dir($PFN_paths['data'].'logs')) {
		$PFN_accions->mover($PFN_paths['data'].'logs', $PFN_paths['servidor'].'logs/');
	} else {
		mkdir($PFN_paths['logs']);
	}

	if (is_dir($PFN_paths['data'].'logs')) {
		@rmdir($PFN_paths['data'].'logs');
	}

	if (!is_file($PFN_paths['logs'].'index.html')) {
		copy($PFN_paths['data'].'index.html', $PFN_paths['logs'].'index.html');
	}

	chmod($PFN_paths['logs'], 0700);

	// Movemos el directorio data/info/
	if (is_dir($PFN_paths['data'].'info')) {
		$PFN_accions->mover($PFN_paths['data'].'info', $PFN_paths['servidor'].'info/');
	} else {
		mkdir($PFN_paths['info']);
	}

	if (is_dir($PFN_paths['data'].'info')) {
		@rmdir($PFN_paths['data'].'info');
	}

	if (!is_file($PFN_paths['info'].'index.html')) {
		copy($PFN_paths['data'].'index.html', $PFN_paths['info'].'index.html');
	}

	chmod($PFN_paths['info'], 0700);

	// Creamos el directorio extra
	if (!is_dir($PFN_paths['extra'])) {
		if (mkdir($PFN_paths['extra'])) {
			copy($PFN_paths['data'].'index.html', $PFN_paths['extra'].'index.html');
		}
	}

	chmod($PFN_paths['extra'], 0700);

	$PFN_conf->inicial('basicas');

	include_once ($PFN_paths['include'].'mysql.php');
	include_once ($PFN_paths['include'].'clases.php');
	include_once ($PFN_paths['include'].'class_usuarios.php');

	include_once ($PFN_paths['instalar'].'include/funcions.inc.php');

	// Copiamos todos los ficheros de informacion adicional para un directorio
	// propio
	$PFN_usuarios->init('raices');

	for (; $PFN_usuarios->mais(); $PFN_usuarios->seguinte()) {
		PFN_mover_inc($PFN_usuarios->get('path'));
	}

	$paso_feito[] = '220-230';
	array_push($feito, 'mysql_220-230','dirs_220-230','inc_220-230');
}
?>
