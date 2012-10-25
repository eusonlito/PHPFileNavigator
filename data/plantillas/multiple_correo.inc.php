<?php
/****************************************************************************
* data/plantillas/multiple_copiar.inc.php
*
* plantilla para la visualización de la acción de enviar multiples ficheros
*

PHPfileNavigator versión 2.3.2

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
<div id="ver_info">
	<div class="bloque_info"><h1><?php echo $PFN_conf->t('accion').' &raquo; '.$PFN_conf->t($accion); ?></h1></div>
	<div class="bloque_info">
		<form action="accion.php?<?php echo PFN_cambia_url('accion',$accion,false); ?>" method="post" onsubmit="return submitonce();">
		<fieldset>
		<input type="hidden" name="executa" value="true" />
		<?php foreach ($multiple_escollidos as $v) { ?>
		<input type="hidden" name="multiple_escollidos[]" value="<?php echo $v; ?>" />
		<?php } ?>

		<?php if (strlen($estado_accion)) { ?>
		<div class="aviso_info"><?php echo $estado_accion; ?></div>
		<?php } ?>

		<br /><table class="tabla_info" summary="">
			<tr>
				<th><label for="para"><?php echo $PFN_conf->t('para'); ?>:</label></th>
				<td><input type="text" id="para" name="para" value="<?php echo htmlentities($para, ENT_NOQUOTES, $PFN_conf->g('charset')); ?>" class="text" /></td>
			</tr>
			<tr>
				<th><label for="titulo"><?php echo $PFN_conf->t('titulo'); ?>:</label></th>
				<td><input type="text" id="titulo" name="titulo" value="<?php echo htmlentities($titulo, ENT_NOQUOTES, $PFN_conf->g('charset')); ?>" class="text" /></td>
			</tr>
			<tr>
				<th><label for="mensaxe"><?php echo $PFN_conf->t('mensaxe'); ?>:</label></th>
				<td><textarea id="mensaxe" name="mensaxe" style="height: 200px;"><?php echo htmlentities($mensaxe, ENT_NOQUOTES, $PFN_conf->g('charset')); ?></textarea></td>
			</tr>
			<tr>
				<th><label for="so_lista"><?php echo $PFN_conf->t('so_lista'); ?></label></th>
				<td><input type="checkbox" id="so_lista" name="so_lista" value="true" <?php echo ($so_lista == 'true')?'checked="checked"':''; ?> /> <?php echo $PFN_conf->t('so_lista_txt'); ?></td>
			</tr>
			<tr>
				<th>&nbsp;</th>
				<td>
					<input type="reset" value=" <?php echo $PFN_conf->t('cancelar'); ?> " class="boton" onclick="enlace('navega.php?<?php echo PFN_get_url(false); ?>');" />
					<input type="submit" value=" <?php echo $PFN_conf->t('aceptar'); ?> " class="boton" style="margin-left: 40px;" />
				</td>
			</tr>
		</table>

		</fieldset>
		</form>

		<script type="text/javascript"><!--

		document.getElementById('para').focus();

		//--></script>

		<br /><table id="listado" summary="">
		<?php foreach ($multiple_escollidos as $k => $v) { ?>
			<tr class="trarq<?php echo !($k % 2); ?>">
				<td class="tdnome">
					<?php if (is_dir($PFN_conf->g('raiz','path').$PFN_niveles->path_correcto($dir.'/').'/'.$v)) { ?>
					<img src="<?php echo $PFN_imaxes->icono('dir'); ?>" alt="<?php echo $PFN_conf->t('dir'); ?>" class="icono" />
					<?php } else { ?>
					<img src="<?php echo $PFN_imaxes->icono($v); ?>" alt="<?php echo $PFN_conf->t('arq'); ?>" class="icono" />
					<?php } ?> 
					<?php echo $v; ?>
				</td>
			</tr>
		<?php } ?>
		</table>

	</div>
</div>
