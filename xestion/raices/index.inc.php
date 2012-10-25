<?php
/****************************************************************************
* xestion/raices/index.inc.php
*
* Comprobaciones antes de modificar o añadir una raiz
*

PHPfileNavigator versión 2.1.0

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

$Dgrupos = $Dconfs = array();

if (!is_writable($PFN_paths['info'])) {
	$erro[] = 'Xinfonon_writable';
}

if (empty($id_raiz)) {
	$PFN_usuarios->init('grupos_configuracions_usuarios');
} else {
	$PFN_usuarios->init('grupos_configuracions_usuarios_raiz', $id_raiz);
}

for (; $PFN_usuarios->mais(); $PFN_usuarios->seguinte()) {
	$Dgrupos[$PFN_usuarios->get('id_grupo')]['nome'] = $PFN_usuarios->get('grupo');
	$Dgrupos[$PFN_usuarios->get('id_grupo')]['id_conf'] = $PFN_usuarios->get('id_conf');
	$Dgrupos[$PFN_usuarios->get('id_grupo')]['usuarios'][$PFN_usuarios->get('id_usuario')] = array($PFN_usuarios->get('usuario'), $PFN_usuarios->get('relacion'));
}

$PFN_usuarios->init('configuracions_valen');

for (; $PFN_usuarios->mais(); $PFN_usuarios->seguinte()) {
	$Dconfs[$PFN_usuarios->get('id')] = $PFN_usuarios->get('conf');
}

$PFN_usuarios->init('raiz', $id_raiz);

$peso_maximo = $PFN_usuarios->get('peso_maximo');
$peso_actual = $PFN_usuarios->get('peso_actual');
?>
