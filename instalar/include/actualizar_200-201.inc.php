<?php
/*******************************************************************************
* instalar/include/actualizar_200-201.inc.php
*
* Ejectula la acción de actualización desde la versión entre 2.0.0 y 2.0.1
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
	$arq_mysql = $PFN_paths['instalar'].'mysql/actualizar_200-201.sql';
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
			$erros['mysql_200-201'] = 17;
			$erros_q['mysql_200-201'][] = array(
				'consulta' => $q,
				'erro' => mysqli_error($con)
			);
		}
	}

	$paso_feito[] = '200-201';
	$feito[] = 'mysql_200-201';
}
?>
