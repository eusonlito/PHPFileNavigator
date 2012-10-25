<?php
/****************************************************************************
* data/plantillas/subir_arq_ajax.inc.php
*
* plantilla para la visualización de la accíon de subir un fichero
* con barra de progreso en AJAX
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
	<div class="bloque_info"><h1><?php echo $PFN_conf->t('accion').' &raquo; '.$PFN_conf->t('subir_arq'); ?></h1></div>
	<div class="bloque_info">
		<div id="capa_ajax" style="display: none"></div>

		<div id="capa_form" style="display: ;">
			<form id="form_accion" action="#" method="post" enctype="multipart/form-data">
			<fieldset>

			<div id="capa_formulario" style="overflow: visible; display: block;">
				<div style="text-align: center;">
					<?php echo $PFN_conf->t('numero_arquivos'); ?>:&nbsp;&nbsp;&nbsp;
					<select id="cantos" name="cantos" onchange="cambia_cantos(this.value);">
						<?php
						for ($i=1; $i <= $PFN_conf->g('inc','limite'); $i++) {
							echo '<option value="'.$i.'" '.(($i==$cantos)?'selected="selected"':'').'> '.$i.' </option>';
						}
						?>
					</select>
				</div><br />

				<input type="hidden" name="accion" value="subir_arq" />
				<input type="hidden" name="executa" value="true" />
				<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $PFN_conf->g('inc','peso'); ?>" />
				<?php for ($i=1; $i <= $PFN_conf->g('inc','limite'); $i++) {?>
				<div id="cantos<?php echo $i; ?>">
					<table class="tabla_info" summary="">
						<tr>
							<th><label for="nome_arquivo_<?php echo $i; ?>"><?php echo $PFN_conf->t('arq'); ?>:</label></th>
							<td><input type="file" id="nome_arquivo_<?php echo $i; ?>" name="nome_arquivo[<?php echo $i; ?>]" class="file" /></td>
						</tr>
						<?php
						$PFN_inc->multiple($i);

						foreach ($PFN_inc->crea_formulario('arq') as $v) {
						?>
						<tr>
							<th><?php echo $v['campo']; ?></th>
							<td><?php echo $v['valor']; ?></td>
						</tr>
						<?php } ?>
						<?php if ($PFN_conf->g('imaxes','pequena')) { ?>
						<tr>
							<th><label for="imaxe_<?php echo $i; ?>"><?php echo $PFN_conf->t('imaxe_reducida'); ?></label></th>
							<td>
								<select id="imaxe_<?php echo $i; ?>" name="imaxe[<?php echo $i; ?>]">
									<option value="" <?php echo ($PFN_conf->g('imaxes','defecto')=='false' || !$PFN_conf->g('imaxes','defecto'))?'selected="selected"':''; ?>><?php echo $PFN_conf->t('non_crear'); ?></option>
									<option value="reducir" <?php echo $PFN_conf->g('imaxes','defecto')=='reducir'?'selected="selected"':''; ?>><?php echo $PFN_conf->t('reducir'); ?></option>
								</select>
							</td>
						</tr>
						<?php } ?>
						<tr>
							<th><label for="sobreescribir_<?php echo $i; ?>"><?php echo $PFN_conf->t('sobreescribir'); ?></label></th>
							<td><input type="checkbox" id="sobreescribir_<?php echo $i; ?>" name="sobreescribir[<?php echo $i; ?>]" value="1" class="checkbox" /></td>
						</tr>
						<?php if ($PFN_conf->g('avisos','subida') == true) { ?>
						<tr>
							<th><label for="aviso_subida_<?php echo $i; ?>"><?php echo $PFN_conf->t('avisar_subida'); ?></label></th>
							<td><input type="checkbox" id="aviso_subida_<?php echo $i; ?>" name="aviso_subida[<?php echo $i; ?>]" value="1" class="checkbox" /></td>
						</tr>
						<?php } ?>
					</table><br />
				</div>
				<?php } ?>
				<div class="centro">
					<input type="reset" value=" <?php echo $PFN_conf->t('cancelar'); ?> " class="boton" onclick="location.href='navega.php?<?php echo PFN_get_url(false); ?>'" />
					<input type="submit" name="btn_aceptar" value=" <?php echo $PFN_conf->t('aceptar'); ?> " class="boton" onclick="envia_form();" style="margin-left: 40px;" />
				</div>
			</div>

			</fieldset>
			</form>
		</div>

		<iframe id="destino_vacio" name="destino_vacio" style="display: none"></iframe>
	</div>
</div>

<script type="text/javascript"><!--

function cambia_cantos (val) {
	for (var i = 1; i <= <?php echo $PFN_conf->g('inc','limite'); ?>; i++) {
		if (i <= val) {
			amosa('cantos'+i);
		} else {
			oculta('cantos'+i);
		}
	}
}

cambia_cantos(1);

function envia_form () {
	submitonce();

	var obx_form = document.getElementById('form_accion');
	var obx_capa_ajax = document.getElementById('capa_ajax');
	var obx_capa_form = document.getElementById('capa_form');

	obx_form.action = '/cgi-bin/subir_imaxes.cgi?sid=<?php echo session_id(); ?>';
	obx_form.target = 'destino_vacio';

	obx_capa_form.style.display = 'none';

	obx_capa_ajax.innerHTML += '<div class="capa_agardando">Waiting...</div>';
	obx_capa_ajax.style.display = '';

	obx_form.submit();
}

//--></script>
