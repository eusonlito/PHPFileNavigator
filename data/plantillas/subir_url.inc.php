<?php
/****************************************************************************
* data/plantillas/subir_url.inc.php
*
* plantilla para la visualización de la acción de subir una url remota
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
<script type="text/javascript"><!--

var imaxe = new Image(350,80);
imaxe.src = '<?php echo $PFN_conf->g('estilo'); ?>imx/subir_url.gif';

//--></script>
<div id="ver_info">
	<div class="bloque_info"><h1><?php echo $PFN_conf->t('accion').' &raquo; '.$PFN_conf->t('subir_url'); ?></h1></div>
	<div class="bloque_info">
		<form id="form_accion" action="accion.php?<?php echo PFN_get_url(false); ?>" method="post" onsubmit="return submitonce();">
		<fieldset>

		<div id="subida_espera" style="display: none;">
			<div class="aviso"><?php echo $PFN_conf->t('estado.subir_url',5); ?></div><br /><br />
			<input type="hidden" id="cancelar" name="cancelar" value="" />
			<input type="button" id="btn_cancelar" value=" <?php echo $PFN_conf->t('cancelar'); ?> " class="boton" onclick="anula_envio();" />
		</div>

		<div id="capa_formulario" style="display: '';">
			<div class="aviso_info"><?php echo $msx_adv; ?></div><br />
			<input type="hidden" name="accion" value="subir_url" />
			<input type="hidden" name="executa" value="true" />
			<table class="tabla_info" summary="">
				<tr>
					<th><label for="nome_url"><?php echo $PFN_conf->t('direccion_url'); ?>:</label></th>
					<td><input type="text" id="nome_url" name="nome_url" class="text" /></td>
				</tr>
				<tr>
					<th><label for="nome_arquivo"><?php echo $PFN_conf->t('nome_arquivo'); ?>:</label></th>
					<td><input type="text" id="nome_arquivo" name="nome_arquivo" class="text" /></td>
				</tr>
				<?php foreach ($PFN_inc->crea_formulario('url') as $v) { ?>
				<tr>
					<th><?php echo $v['campo']; ?></th>
					<td><?php echo $v['valor']; ?></td>
				</tr>
				<?php } ?>
				<tr>
					<th><label for="sobreescribir"><?php echo $PFN_conf->t("sobreescribir"); ?></label></th>
					<td><input type="checkbox" id="sobreescribir" name="sobreescribir" value="1" class="checkbox" /></td>
				</tr>
				<tr>
					<th>&nbsp;</th>
					<td>
						<input type="reset" value=" <?php echo $PFN_conf->t('cancelar'); ?> " class="boton" onclick="enlace('navega.php?<?php echo PFN_get_url(false); ?>');" />
						<input type="submit" name="btn_aceptar" value=" <?php echo $PFN_conf->t('aceptar'); ?> " class="boton" onclick="amosa_espera();" style="margin-left: 40px;" />
					</td>
				</tr>
			</table>
		</div>

		</fieldset>
		</form>
	</div>
</div>
<script type="text/javascript"><!--

function anula_envio (boton) {
	var obx_form = document.getElementById('form_accion');
	var obx_cancelar = document.getElementById('cancelar');
	var obx_btn_cancelar = document.getElementById('btn_cancelar');

	obx_cancelar.value = 'cancelar';
	obx_btn_cancelar.value = '<?php echo addslashes(PFN_quitaHtmlentities($PFN_conf->t('anulando'))); ?>';
	obx_btn_cancelar.disabled = true;

	obx_form.submit();
}

function amosa_espera () {
	document.getElementById('capa_formulario').style.display = 'none';
	document.getElementById('subida_espera').style.display = '';
}

document.getElementById('nome_url').focus();

//--></script>
