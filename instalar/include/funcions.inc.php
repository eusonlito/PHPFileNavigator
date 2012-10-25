<?php
/*******************************************************************************
* instalar/include/funcions.inc.php
*
* Funciones básicas y comunes para la instalación
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

defined('OK') or die();

function PFN_mover_inc ($dir) {
	global $PFN_paths;

	$od = @opendir($dir);

	while ($cada = @readdir($od)) {
		if ($cada == '.' || $cada == '..') {
			continue;
		}

		if (is_dir($dir.$cada)) {
			PFN_mover_inc($dir.$cada.'/');
		} elseif (preg_match('/^\..*(jpg|png|gif|jpeg)$/i', $cada)
		|| preg_match('/^\..*\.INC$/', $cada)) {
			PFN_crea_directorio_recursivo($PFN_paths['extra'].$dir);

			if (preg_match('/^\..*(jpg|png|gif|jpeg)$/i', $cada)) {
				$destino = $PFN_paths['extra'].$dir.'/'.substr($cada, 1);
			} elseif (preg_match('/^\..*\.INC$/', $cada)) {
				$destino = $PFN_paths['extra'].$dir.'/'.substr($cada, 1, -4).'.php';
			} else {
				$destino = $PFN_paths['extra'].$dir.'/'.$cada;
			}

			if (@copy($dir.$cada, $destino)) {
				@unlink($dir.$cada);
			}
		}
	}

	@closedir($od);
}
?>
