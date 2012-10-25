<?php
/****************************************************************************
* data/plantillas/menu.inc.php
*
* plantilla para la visualización del menu de selección de raíz
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

defined('OK') or die();
?>
<h1 id="cab_menu"> <?php echo $PFN_conf->t('PFN'); ?> </h1>
<div id="menu_raices">
	<?php echo $PFN_conf->t('listado_menu'); ?>
	<ul>
	<?php
	for (; $PFN_usuarios->mais(); $PFN_usuarios->seguinte()) {
		$ultima = $PFN_usuarios->get('id');
		echo '<li><a href="navega.php?'.PFN_cambia_url('id', $PFN_usuarios->get('id'),	false).'">'.$PFN_usuarios->get('nome').'</a></li>';
	}
	?>
	</ul>
</div>
<div id="pe_menu"><a href="sair.php?id=<?php echo $ultima; ?>&amp;<?php echo PFN_get_url(false); ?>"><?php echo $PFN_conf->t('sair'); ?></a></div>
