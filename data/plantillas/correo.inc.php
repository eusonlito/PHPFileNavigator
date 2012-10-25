<?php
/****************************************************************************
* data/plantillas/correo.inc.php
*
* plantilla para la visualización de la acción de enviar un fichero por
* correo
*

PHPfileNavigator versión 2.3.0

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
		<div class="bloque_info"><h1><?php echo $PFN_conf->t('accion').' &raquo; '.$PFN_conf->t('enviar_correo'); ?></h1></div>
		<?php if (strlen($estado_accion)) { ?>
		<div class="aviso"><?php echo $estado_accion; ?></div>
		<?php } if ($estado === true) { ?>
		<form id="formulario" action="accion.php?<?php echo PFN_cambia_url('accion','correo',false); ?>" method="post" onsubmit="return submitonce();">
		<fieldset>
		<input type="hidden" name="executa" value="true" />
		<input type="hidden" name="cal" value="<?php echo $cal; ?>" />

		<table class="tabla_info" summary="">
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
	<?php } ?>
	</div>
</div>
