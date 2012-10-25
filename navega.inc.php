<?php
/****************************************************************************
* nagega.inc.php
*
* Carga lo necesario para la visualización de la navegación principal
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

$PFN_tempo->rexistra('i:navega');

$lista = $PFN_vars->get('lista');
$orde = $PFN_vars->get('orde');
$pos = $PFN_vars->get('pos');

$PFN_niveles->posicion($lista);
$cada = $PFN_niveles->get_contido($PFN_conf->g('raiz','path').$dir,$orde,$pos);

$cnt_dir = $PFN_niveles->cnt('dir');
$cnt_arq = $PFN_niveles->cnt('arq');
$cnt_peso = PFN_peso($PFN_niveles->cnt('peso'));

if ($PFN_conf->g('inc','estado')) {
	include_once ($PFN_paths['include'].'class_inc.php');
	$PFN_inc = new PFN_INC($PFN_conf);

	$PFN_inc->carga_datos($PFN_conf->g('raiz','path').$dir.'/');
}

$PFN_tempo->rexistra('f:navega');

include ($PFN_paths['plantillas'].'posicion.inc.php');

$PFN_tempo->rexistra('posicion');

include ($PFN_paths['plantillas'].'navega.inc.php');
?>
