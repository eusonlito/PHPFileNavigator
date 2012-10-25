<?php
/*******************************************************************************
* instalar/include/nada.inc.php
*
* Ejecuta la pantalla de fin de instalación o de error
*

PHPfileNavigator versión 2.0.0

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

if (is_array($actual) && is_writable($PFN_paths['conf'].'basicas.inc.php')) {
	if ($con = @mysql_connect($actual['db']['host'], $actual['db']['usuario'], $actual['db']['contrasinal'])) {
		if (!@mysql_select_db($actual['db']['base_datos'], $con)) $erro[] = 18;
	} else $erro[] = 17;	
}
if (!is_writable($PFN_paths['conf'])) $erro[] = 19;
if (!is_writable($PFN_paths['tmp'])) $erro[] = 21;
if (!is_writable($PFN_paths['logs'])) $erro[] = 22;
if (!is_writable($PFN_paths['info'])) $erro[] = 23;

$accion = 'nada';

if (is_array($erro)) {
	include ($PFN_paths['instalar'].'plantillas/cab_instalar.inc.php');
} else {
	include ($PFN_paths['instalar'].'plantillas/ok.inc.php');
}

@mysql_close($con);
?>
