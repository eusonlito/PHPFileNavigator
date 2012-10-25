<?php
/****************************************************************************
* navega.php
*
* Precarga de los includes para la ejecución de navega.inc.php
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

include ('paths.php');
include_once ($PFN_paths['include'].'basicweb.php');

session_write_close();

$PFN_tempo->rexistra('precarga');

include ($PFN_paths['plantillas'].'cab.inc.php');

$PFN_tempo->rexistra('cabeceira');

include ($PFN_paths['web'].'opcions.inc.php');

$PFN_tempo->rexistra('opcions');

include_once ($PFN_paths['include'].'class_imaxes.php');
$PFN_imaxes = new PFN_Imaxes($PFN_conf);

include ($PFN_paths['web'].'navega.inc.php');

$PFN_tempo->rexistra('navega');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
