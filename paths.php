<?php
/****************************************************************************
* paths.php
*
* Carga las rutas necesarias para la realización de los includes y requires
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

define('OK', true);

error_reporting(E_ERROR | E_WARNING | E_PARSE);

$PFN_version = '233';
$borra_cache = true;
$b = dirname(__FILE__);

$PFN_paths = array(
	'web' => $b.'/',
	'tmp' => $b.'/data/servidor/tmp/',
	'xestion' => $b.'/xestion/',
	'data' => $b.'/data/',
	'conf' => $b.'/data/conf/',
	'plantillas' => $b.'/data/plantillas/',
	'logs' => $b.'/data/servidor/logs/',
	'idiomas' => $b.'/data/idiomas/',
	'include' => $b.'/data/include/',
	'accions' => $b.'/data/accions/',
	'info' => $b.'/data/servidor/info/',
	'extra' => $b.'/data/servidor/extra/',
	'servidor' => $b.'/data/servidor/'
);
?>
