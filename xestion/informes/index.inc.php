<?php
/****************************************************************************
* xestion/informes/index.inc.php
*
* Prepara los datos para ser mostrador en el informe
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

defined('OK') && defined('XESTION') or die();

$executa = $PFN_vars->post('executa').$PFN_vars->get('executa');
$erros = array();
$log = array();
$lineas = 0;
$txt = '';
$i = 1;

if ($executa == 'mysql') {
	include_once ($PFN_paths['xestion'].'informes/mysql.inc.php');
} elseif ($executa == 'accions') {
	include_once ($PFN_paths['xestion'].'informes/accions.inc.php');
} elseif ($executa == 'accesos') {
	include_once ($PFN_paths['xestion'].'informes/accesos.inc.php');
} elseif ($executa == 'uso_disco') {
	include_once ($PFN_paths['xestion'].'informes/uso_disco.inc.php');
} elseif ($executa == 'ancho_banda') {
	include_once ($PFN_paths['xestion'].'informes/ancho_banda.inc.php');
}
?>
