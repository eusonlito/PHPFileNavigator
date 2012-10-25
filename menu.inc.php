<?php
/****************************************************************************
* menu.inc.php
*
* Carga lo necesario para la visualización del menú de selección de Raíz
*

PHPfileNavigator versión 2.2.0

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

unset($sPFN['raiz']);

$PFN_vars->session(array('sPFN','raiz'),'');

$PFN_usuarios->init('menu_raices', $sPFN['usuario']['id']);

if ($PFN_usuarios->filas() == 1) {
	$sPFN['raiz']['unica'] = true;	

	session_register('sPFN');
	$PFN_vars->session('sPFN', $sPFN);

	session_write_close();

	Header ('Location: navega.php?id='.$PFN_usuarios->get('id').'&'.session_name().'='.session_id());
	exit;
} else {
	session_register('sPFN');
	session_write_close();
}
?>
