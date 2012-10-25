<?php
/****************************************************************************
* data/plantillas/Xraices.inc.php
*
* plantilla para la visualización de la pantalla de modificación de una raíz
* y su relación con los usuarios
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

defined('OK') && defined('XESTION') or die();
?>
<div id="ver_info">
	<div class="bloque_info"><h1><?php echo $PFN_conf->t('xestion').' &raquo; '.$PFN_conf->t('Xmodi_raiz'); ?></h1></div>
	<div class="bloque_info">
		<?php if (count($erros) || $ok > 0) { ?>
		<div class="aviso">
			<?php
			if (count($erros)) {
				foreach ($erros as $v) {
					echo $PFN_conf->t('Xerros', intval($v)).'<br />';
				}
			} else {
				echo $PFN_conf->t('Xok', intval($ok)).'<br />';
			}
			?>
		</div>
		<?php } ?>

		<form action="gdar.php?<?php echo PFN_get_url(false); ?>" method="post" onsubmit="return submitonce();">
		<fieldset>
		<input type="hidden" name="id_raiz" value="<?php echo $PFN_usuarios->get('id'); ?>" />

		<table class="tabla_info" summary="">
			<tr>
				<th><a href="#" onclick="Xamosa_axuda(1); return false;">(?)</a> <label for="nome"><?php echo $PFN_conf->t('Xnome'); ?>*</label></th>
				<td><input type="text" id="nome" name="nome" value="<?php echo $PFN_usuarios->get('nome'); ?>" class="text" tabindex="10" /></td>
			</tr>
			<tr id="tr_axuda1" style="display: none;">
				<td colspan="2"><?php echo $PFN_conf->t('Xaxuda','raiz_nome'); ?></td>
			</tr>
			<tr>
				<th><a href="#" onclick="Xamosa_axuda(2); return false;">(?)</a> <label for="path"><?php echo $PFN_conf->t('Xpath'); ?>*</label></th>
				<td><input type="text" id="path" name="path" value="<?php echo $PFN_usuarios->get('path'); ?>" class="text" tabindex="20" /></td>
			</tr>
			<tr id="tr_axuda2" style="display: none;">
				<td colspan="2"><?php echo $PFN_conf->t('Xaxuda','raiz_path'); ?></td>
			</tr>
			<tr>
				<th><a href="#" onclick="Xamosa_axuda(3); return false;">(?)</a> <label for="web"><?php echo $PFN_conf->t('Xraiz_web'); ?>*</label></th>
				<td><input type="text" id="web" name="web" value="<?php echo $PFN_usuarios->get('web'); ?>" class="text" tabindex="30" /></td>
			</tr>
			<tr id="tr_axuda3" style="display: none;">
				<td colspan="2"><?php echo $PFN_conf->t('Xaxuda','raiz_web'); ?></td>
			</tr>
			<tr>
				<th><a href="#" onclick="Xamosa_axuda(4); return false;">(?)</a> <label for="host"><?php echo $PFN_conf->t('Xhost'); ?>*</label></th>
				<td><input type="text" id="host" name="host" value="<?php echo $PFN_usuarios->get('host'); ?>" class="text" tabindex="40" /></td>
			</tr>
			<tr id="tr_axuda4" style="display: none;">
				<td colspan="2"><?php echo $PFN_conf->t('Xaxuda','raiz_host'); ?></td>
			</tr>
			<tr>
				<th><a href="#" onclick="Xamosa_axuda(5); return false;">(?)</a> <label for="peso_maximo"><?php echo $PFN_conf->t('Xpeso_max'); ?></label></th>
				<td>
					<input type="text" id="peso_maximo" name="peso_maximo" value="<?php echo $peso_maximo; ?>" class="text" tabindex="50" />
					<select id="unidades" name="unidades" onchange="return cambia_peso(this.value);" tabindex="60">
						<option value="MB">MBytes</option>
						<option value="GB">GBytes</option>
					</select>
				</td>
			</tr>
			<tr id="tr_axuda5" style="display: none;">
				<td colspan="2"><?php echo $PFN_conf->t('Xaxuda','raiz_peso_max'); ?></td>
			</tr>
			<tr>
				<th><a href="#" onclick="Xamosa_axuda(7); return false;">(?)</a> <?php echo $PFN_conf->t('Xpeso_actual'); ?></th>
				<td><input type="text" id="peso_actual" value="<?php echo ($peso_maximo > 0)?PFN_peso($peso_actual):$PFN_conf->t('Xpeso_actual_off'); ?>" class="text" readonly="readonly" /></td>
			</tr>
			<tr id="tr_axuda7" style="display: none;">
				<td colspan="2"><?php echo $PFN_conf->t('Xaxuda','raiz_peso_actual'); ?></td>
			</tr>
			<?php if (($id_raiz > 0) && ($peso_maximo > 0)) { ?>
			<tr>
				<th><a href="#" onclick="Xamosa_axuda(10); return false;">(?)</a> <label for="revisar_peso_actual"><?php echo $PFN_conf->t('Xrevisar_peso_actual'); ?></label></th>
				<td><input type="checkbox" id="revisar_peso_actual" name="revisar_peso_actual" value="true" tabindex="65" class="checkbox" /></td>
			</tr>
			<tr id="tr_axuda10" style="display: none;">
				<td colspan="2"><?php echo $PFN_conf->t('Xaxuda','revisar_peso_actual'); ?></td>
			</tr>
			<?php } ?>
			<tr>
				<th><a href="#" onclick="Xamosa_axuda(6); return false;">(?)</a> <label for="estado"><?php echo $PFN_conf->t('Xestado'); ?></label></th>
				<td>
					<select id="estado" name="estado" tabindex="70">
						<option value="1" <?php echo $PFN_usuarios->get('estado')==1?'selected="selected"':''; ?>>ON</option>
						<option value="0" <?php echo $PFN_usuarios->get('estado')==0?'selected="selected"':''; ?>>OFF</option>
					</select>
				</td>
			</tr>
			<tr id="tr_axuda6" style="display: none;">
				<td colspan="2"><?php echo $PFN_conf->t('Xaxuda','raiz_estado'); ?></td>
			</tr>
			<?php if ($id_raiz > 0) { ?>
			<tr>
				<th><a href="#" onclick="Xamosa_axuda(8); return false;">(?)</a> <label for="borrar_inc"><?php echo $PFN_conf->t('Xborrar_inc'); ?></label></th>
				<td><input type="checkbox" id="borrar_inc" name="borrar_inc" value="true" tabindex="73" class="checkbox" /></td>
			</tr>
			<tr id="tr_axuda8" style="display: none;">
				<td colspan="2"><?php echo $PFN_conf->t('Xaxuda','borrar_inc'); ?></td>
			</tr>
			<tr>
				<th><a href="#" onclick="Xamosa_axuda(9); return false;">(?)</a> <label for="borrar_imx"><?php echo $PFN_conf->t('Xborrar_imx'); ?></label></th>
				<td><input type="checkbox" id="borrar_imx" name="borrar_imx" value="true" tabindex="73" class="checkbox" /></td>
			</tr>
			<tr id="tr_axuda9" style="display: none;">
				<td colspan="2"><?php echo $PFN_conf->t('Xaxuda','borrar_imx'); ?></td>
			</tr>
			<?php } ?>
		</table>

		<br />

		<?php foreach ($Dgrupos as $kg => $vg) { ?>
		<table class="tabla_info" summary="">
			<tr>
				<th>
					<input type="hidden" name="Fgrupos[]" value="<?php echo $kg; ?>" />
					<strong><?php echo $PFN_conf->t('Xgrupo'); ?>:</strong> <?php echo $vg['nome']; ?>
					&nbsp;&nbsp;|&nbsp;&nbsp;
					<strong><label for="Fconfs_<?php echo $kg; ?>"><?php echo $PFN_conf->t('Xconfiguracion'); ?>:</label></strong>
					<select id="Fconfs_<?php echo $kg; ?>" name="Fconfs[]">
						<?php foreach ($Dconfs as $kc => $vc) { ?>
						<option value="<?php echo $kc; ?>" <?php echo ($kc == $vg['id_conf'])?'selected="selected"':''; ?>><?php echo $vc; ?></option>
						<?php } ?>
					</select>
					&nbsp;&nbsp;|&nbsp;&nbsp;
					<input type="checkbox" id="marca_desmarca_<?php echo $kg; ?>" name="marca_desmarca_<?php echo $kg; ?>" onclick="marca_desmarca('<?php echo $kg; ?>');" class="checkbox" />
					<strong><label for="marca_desmarca_<?php echo $kg; ?>"><?php echo $PFN_conf->t('Xmarca_desmarca'); ?></label></strong>
				</th>
			</tr>
		</table>
		<table class="tabla_normal" summary="">
			<?php
			$cont = 3;

			foreach ((array)$vg['usuarios'] as $ku => $vu) {
				if ($cont == 3) {
					echo '<tr>';
					$cont = 0;
				}

				echo '<td>';

				if (!empty($ku)) {
					echo '<input type="checkbox" id="Fusuarios_'.$kg.'_'.$ku.'" name="Fusuarios['.$kg.']['.$ku.']" value="'.$ku.'" '.($vu[1]?'checked="checked"':'').' class="checkbox" /> <label for="Fusuarios_'.$kg.'_'.$ku.'">'.$vu[0].'</label>';
				} else {
					echo '&nbsp;';
				}

				echo '</td>';
				$cont++;

				if ($cont == 3) {
					echo '</tr>';
				}
			}

			if ($cont != 3) {
				for ($i = $cont; $i < 3; $i++) {
					echo '<td>&nbsp;</td>';
				}

				echo '</tr>';
			}
			?>
		</table>

		<br />
		<?php } ?>

		<div style="width: 100%; text-align: center;">
			<?php if (!empty($id_raiz)) { ?>
			<input type="reset" value=" <?php echo $PFN_conf->t('eliminar'); ?> " class="boton" style="margin-right: 40px;" onclick="eliminar();" tabindex="80" />
			<?php } ?>
			<input type="reset" value=" <?php echo $PFN_conf->t('voltar'); ?> " class="boton" style="margin-right: 40px;" onclick="enlace('../index.php?<?php echo PFN_cambia_url('opc', 1, false); ?>');" tabindex="90" />
			<input type="submit" value="<?php echo $PFN_conf->t('aceptar'); ?>" class="boton" tabindex="100" /><br />
		</div>
		</fieldset>
		</form>
	</div>
</div>

<script type="text/javascript"><!--

function eliminar () {
	<?php if ($id_raiz == $sPFN['raiz']['id']) { ?>
	alert(HtmlDecode('<?php echo addslashes($PFN_conf->t('Xerros', 5)); ?>'));
	<?php } else { ?>
	if (confirm(HtmlDecode('<?php echo addslashes($PFN_conf->t('Xeliminar_raiz')); ?>'))) {
		enlace('eliminar.php?id_raiz=<?php echo $id_raiz; ?>&amp;<?php echo PFN_get_url(false); ?>');
	}
	<?php } ?>
}

v_peso = '<?php echo $peso_maximo; ?>';

function cambia_peso (opc) {
	if (opc == "MB") {
		document.getElementById('peso_maximo').value = Math.round(parseFloat(v_peso/1024/1024)*100)/100;
	} else if (opc == "GB") {
		document.getElementById('peso_maximo').value = Math.round(parseFloat(v_peso/1024/1024/1024)*100)/100;
	}
}

function marca_desmarca (id) {
	ahora = document.getElementById('marca_desmarca_'+id);

	for (i=0; i<document.forms.length; i++) {
		for (b=0; b<document.forms[i].length; b++) {
			tmpobj = document.forms[i].elements[b];

			if (tmpobj.name && tmpobj.name.indexOf('Fusuarios['+id+']') == 0) {;
				tmpobj.checked = ahora.checked;
			}
		}
	}
}

cambia_peso('MB');

//--></script>

