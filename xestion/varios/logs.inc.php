<?php
/****************************************************************************
* xestion/varios/logs.inc.php
*
* Elimina los ficheros de registros seleccionados
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

$ok = false;
$log_mysql = $PFN_vars->post('log_mysql');
$logs_accions = $PFN_vars->post('logs_accions');

if ($log_mysql && is_file($PFN_paths['logs'].$PFN_conf->g('logs','mysql'))) {
	@unlink($PFN_paths['logs'].$PFN_conf->g('logs','mysql'));
	$ok = true;
}

if ($logs_accions) {
	foreach ($logs_accions as $v) {
		if (is_file($PFN_paths['info'].'raiz'.intval($v).'/'.$PFN_conf->g('logs','accions'))) {
			@unlink($PFN_paths['info'].'raiz'.intval($v).'/'.$PFN_conf->g('logs','accions'));
			$ok = true;
		}
	}
}
?>
