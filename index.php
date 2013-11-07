<?php
/****************************************************************************
* index.php
*
* Carga lo necesario para la visualización de la pantalla de login
*

PHPfileNavigator versión 2.3.0

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

include ('paths.php');
include_once ($PFN_paths['include'].'class_tempo.php');
include_once ($PFN_paths['include'].'funcions.php');
include_once ($PFN_paths['include'].'class_conf.php');
include_once ($PFN_paths['include'].'class_vars.php');

if (is_dir($PFN_paths['web'].'instalar/')) {
	header('Location: instalar/index.php');
	exit;
}

$PFN_conf->textos('web');

$PFN_tempo->rexistra('preplantillas');

$txt_erro = '';

include ($PFN_paths['plantillas'].'cab.inc.php');
include ($PFN_paths['plantillas'].'login.inc.php');
include ($PFN_paths['plantillas'].'pe.inc.php');
?>
