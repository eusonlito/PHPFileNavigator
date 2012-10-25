<?php
/****************************************************************************
* data/include/prepara.php
*
* Precarga y controla el valor de ciertas variables
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

PFN_quita_url_SERVER(array('id','accion','cal','lista','completo','executa','posX','posY','modo','ancho','alto','sobreescribir'));

$PFN_conf->carga();

$PFN_niveles = new PFN_Niveles($PFN_conf);

$dir = $PFN_niveles->path_correcto($PFN_vars->get('dir'));
$PFN_vars->get('dir',$dir);

$ver_imaxes = $PFN_vars->get('ver_imaxes');
$estado_accion = '';

$info_raiz = $PFN_niveles->path_correcto($PFN_paths['info'].'raiz'.$PFN_conf->g('raiz','id'));
$info_usuario = $PFN_niveles->path_correcto($PFN_paths['info'].'usuario'.$sPFN['usuario']['id']);

$PFN_conf->p($info_usuario, 'info_usuario');
$PFN_conf->p($info_raiz, 'info_raiz');

if (defined('MENU')) {
	$PFN_conf->p(0, 'raiz', 'peso_maximo');
	$PFN_conf->p(0, 'raiz', 'peso_actual');
}

if (is_file($info_usuario.'/descargas.'.(date('Ym')).'.php')) {
	$PFN_conf->p(include ($info_usuario.'/descargas.'.(date('Ym')).'.php'), 'usuario', 'descargas_actual');
}
?>
