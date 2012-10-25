<?php
/****************************************************************************
* data/plantillas/Xinformes_mysql.inc.php
*
* plantilla para la visualización del informe de errores de MySQL
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
?>
				<strong><?php echo $PFN_conf->t('Xdesc_mysql'); ?></strong><br /><br />
				<label for="my_lineas"><?php echo $PFN_conf->t('Xamosar_lineas'); ?>:</label>
				<input type="text" name="my_lineas" id="my_lineas" value="<?php echo $my_lineas; ?>" size="5" /><br /><br />
				<label for="my_buscar"><?php echo $PFN_conf->t('Xbuscar_texto'); ?>:</label>
				<input type="text" name="my_buscar" id="my_buscar" value="<?php echo $PFN_vars->post('my_buscar'); ?>" size="20" />
