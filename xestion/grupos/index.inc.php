<?php
/****************************************************************************
* xestion/grupos/index.inc.php
*
* Comprobaciones antes de modificar o añadir un grupo
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

$Fconfs = array();
$cnt_usuarios = 0;

$PFN_usuarios->init('configuracions');

for (; $PFN_usuarios->mais(); $PFN_usuarios->seguinte()) {
	if ($PFN_usuarios->get('vale') == 1) {
		$Fconfs[$PFN_usuarios->get('id')] = $PFN_usuarios->get('conf');
	}
}

$PFN_usuarios->init('grupo', $id_grupo);
?>
