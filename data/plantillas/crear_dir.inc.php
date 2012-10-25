<?php
/****************************************************************************
* data/plantillas/crear_dir.inc.php
*
* plantilla para la visualización de la acción de crear un directorio
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

defined('OK') && defined('ACCION') or die();
?>

<div id="ver_info">
	<div class="bloque_info"><h1><?php echo $PFN_conf->t('accion').' &raquo; '.$PFN_conf->t('crear_dir'); ?></h1></div>
	<div class="bloque_info">
		<form action="accion.php?<?php echo PFN_get_url(false); ?>" method="post" id="formulario" onsubmit="return submitonce();">
		<fieldset>
		<input type="hidden" name="accion" value="crear_dir" />
		<input type="hidden" name="executa" value="true" />

		<table class="tabla_info" summary="">
			<tr>
				<th><label for="nome_directorio"><?php echo $PFN_conf->t('nome'); ?>:</label></th>
				<td><input type="text" name="nome_directorio" id="nome_directorio" class="text" /></td>
			</tr>
			<?php foreach ($PFN_inc->crea_formulario('dir') as $v) { ?>
			<tr>
				<th><?php echo $v['campo']; ?></th>
				<td><?php echo $v['valor']; ?></td>
			</tr>
			<?php } ?>
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

		document.getElementById('nome_directorio').focus();

		//--></script>
	</div>
</div>
