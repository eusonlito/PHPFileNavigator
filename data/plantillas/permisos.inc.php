<?php
/****************************************************************************
* data/plantillas/permisos.inc.php
*
* plantilla para la visualización de la acción de cambio de permisos a ficheros
* y directorios
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

defined('OK') && defined('ACCION') or die();
?>

		<div class="bloque_info"><h1><?php echo $PFN_conf->t('accion').' &raquo; '.$PFN_conf->t('permisos'); ?></h1></div>
		<form action="accion.php?<?php echo PFN_cambia_url('accion','permisos',false); ?>" method="post" onsubmit="return submitonce();">
		<fieldset>
		<input type="hidden" name="executa" value="true" />
		<input type="hidden" name="cal" value="<?php echo $cal; ?>" />

		<table class="tabla_info" summary="" style="text-align: center;">
			<tr>
				<th><?php echo $PFN_conf->t('escritura'); ?></th>
				<th><?php echo $PFN_conf->t('execucion'); ?></th>
				<th><?php echo $PFN_conf->t('lectura'); ?></th>
				<th>&nbsp;</th>
			</tr>
			<tr>
				<td><input type="checkbox" name="p200" value="200" <?php echo ($actuales & 0x0080)?'checked="checked"':''; ?> class="checkbox" /></td>
				<td><input type="checkbox" name="p100" value="100" <?php echo ($actuales & 0x0040)?'checked="checked"':''; ?> class="checkbox" /></td>
				<td><input type="checkbox" name="p400" value="400" <?php echo ($actuales & 0x0100)?'checked="checked"':''; ?> class="checkbox" /></td>
				<th><?php echo $PFN_conf->t('propietario'); ?></th>
			</tr>
			<tr>
				<td><input type="checkbox" name="p020" value="20" <?php echo ($actuales & 0x0010)?'checked="checked"':''; ?> class="checkbox" /></td>
				<td><input type="checkbox" name="p010" value="10" <?php echo ($actuales & 0x0008)?'checked="checked"':''; ?> class="checkbox" /></td>
				<td><input type="checkbox" name="p040" value="40" <?php echo ($actuales & 0x0020)?'checked="checked"':''; ?> class="checkbox" /></td>
				<th><?php echo $PFN_conf->t('grupo'); ?></th>
			</tr>
			<tr>
				<td><input type="checkbox" name="p002" value="2" <?php echo ($actuales & 0x0002)?(($perms & 0x0400)?'':'checked="checked"'):''; ?> class="checkbox" /></td>
				<td><input type="checkbox" name="p001" value="1" <?php echo ($actuales & 0x0001)?(($perms & 0x0200)?'':'checked="checked"'):''; ?> class="checkbox" /></td>
				<td><input type="checkbox" name="p004" value="4" <?php echo ($actuales & 0x0004)?(($perms & 0x0800)?'':'checked="checked"'):''; ?> class="checkbox" /></td>
				<th><?php echo $PFN_conf->t('todos'); ?></th>
			</tr>
		</table>
		<div style="text-align: center; margin-top: 10px;">
			<input type="reset" value=" <?php echo $PFN_conf->t('cancelar'); ?> " class="boton" onclick="enlace('navega.php?<?php echo PFN_get_url(false); ?>');" />
			<input type="submit" value=" <?php echo $PFN_conf->t('aceptar'); ?> " class="boton" style="margin-left: 40px;" />
		</div>
		</fieldset>
		</form>
	</div>
</div>
