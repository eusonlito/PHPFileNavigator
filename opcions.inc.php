<?php
/****************************************************************************
* opcions.inc.php
*
* Carga lo necesario para la visualización del menú superior de opciones
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

$menu_opc = array();
$menu_opc['escoller_raiz'] = 'menu.php?'.PFN_quita_url('dir',false);
$menu_opc['actualizar'] = PFN_get_url();

if ($PFN_conf->g('usuario','admin') == true) {
	$menu_opc['zona_admin'] = 'xestion/index.php?'.PFN_get_url(false);
} if ($PFN_conf->g('permisos','buscador')) {
	$menu_opc['buscador'] = 'accion.php?'.PFN_cambia_url(array('dir','accion'),array($dir,'buscador'),false);;
} if ($PFN_conf->g('permisos','axuda')) {
	$menu_opc['axuda'] = 'axuda.php?'.PFN_get_url(false);
} if ($PFN_conf->g('permisos','crear_dir')) {
	$menu_opc['crear_dir'] = 'accion.php?'.PFN_cambia_url(array('dir','accion'),array($dir,'crear_dir'),false);
} if ($PFN_conf->g('permisos','novo_arq')) {
	$menu_opc['novo_arq'] = 'accion.php?'.PFN_cambia_url(array('dir','accion'),array($dir,'novo_arq'),false);
} if ($PFN_conf->g('permisos','subir_arq')) {
	$menu_opc['subir_arq'] = 'accion.php?'.PFN_cambia_url(array('dir','accion'),array($dir,'subir_arq'),false);
} if ($PFN_conf->g('permisos','subir_url')) {
	$menu_opc['subir_url'] = 'accion.php?'.PFN_cambia_url(array('dir','accion'),array($dir,'subir_url'),false);
} if ($PFN_conf->g('permisos','ver_imaxes')) {
	$menu_opc['ver_imaxes'] = PFN_cambia_url(array('dir','ver_imaxes','completo'),array($dir,($ver_imaxes?'':'true'),$PFN_vars->get('completo')));
} if ($PFN_conf->g('usuario','cambiar_datos')) {
	$menu_opc['preferencias'] = 'preferencias.php?'.PFN_get_url(false);
} if ($PFN_conf->g('permisos','arbore')) {
	$menu_opc['arbore'] = 'arbore.php?'.PFN_get_url(false);
} if ($PFN_conf->g('permisos','sair')) {
	$menu_opc['sair'] = 'sair.php?'.PFN_get_url(false);
}

include ($PFN_paths['plantillas'].'opcions.inc.php');
?>
