<?php
/****************************************************************************
* data/plantillas/Xgrupos.inc.php
*
* plantilla para la visualización de la pantalla de modificación de un grupo
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
<script type="text/javascript"><!--

function eliminar (cantos) {
	<?php if ($id_grupo == $sPFN['usuario']['id_grupo']) { ?>
	alert(HtmlDecode('<?php echo addslashes($PFN_conf->t('Xerros', 16)); ?>'));
	<?php } else { ?>
	if (cantos > 0) {
		alert(HtmlDecode('<?php echo addslashes($PFN_conf->t('Xerros', 17)); ?>'));
	} else {
		if (confirm(HtmlDecode('<?php echo addslashes($PFN_conf->t('Xeliminar_grupo')); ?>'))) {
			enlace('eliminar.php?id_grupo=<?php echo $id_grupo; ?>&amp;<?php echo PFN_get_url(false); ?>');
		}
	}
	<?php } ?>
}

//--></script>

<div id="ver_info">
	<div class="bloque_info"><h1><?php echo $PFN_conf->t('xestion').' &raquo; '.$PFN_conf->t('Xmodi_grupo'); ?></h1></div>
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
		<input type="hidden" name="id_grupo" value="<?php echo $PFN_usuarios->get('id'); ?>" />

		<table class="tabla_info" summary="">
			<tr>
				<th><a href="#" onclick="Xamosa_axuda(1); return false;">(?)</a> <?php echo $PFN_conf->t('Xnome'); ?>*</th>
				<td><input type="text" name="nome" value="<?php echo $PFN_usuarios->get('nome'); ?>" class="text" tabindex="10" /></td>
			</tr>
			<tr id="tr_axuda1" style="display: none;">
				<th colspan="2"><?php echo $PFN_conf->t('Xaxuda','grupo_nome'); ?></th>
			</tr>
			<tr>
				<th><a href="#" onclick="Xamosa_axuda(2); return false;">(?)</a> <?php echo $PFN_conf->t('Xconf_defecto'); ?>*</th>
				<td>
					<select name="id_conf" tabindex="20">
						<?php foreach ($Fconfs as $k => $v) { ?>
						<option value="<?php echo $k; ?>" <?php echo $PFN_usuarios->get('id_conf')==$k?'selected="selected"':''; ?>><?php echo $v; ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr id="tr_axuda2" style="display: none;">
				<th colspan="2"><?php echo $PFN_conf->t('Xaxuda','grupo_conf'); ?></th>
			</tr>
			<tr>
				<th><a href="#" onclick="Xamosa_axuda(3); return false;">(?)</a> <?php echo $PFN_conf->t('Xestado'); ?></th>
				<td>
					<select name="estado" tabindex="30">
						<option value="1" <?php echo $PFN_usuarios->get('estado')==1?'selected="selected"':''; ?>>ON</option>
						<option value="0" <?php echo $PFN_usuarios->get('estado')==0?'selected="selected"':''; ?>>OFF</option>
					</select>
				</td>
			</tr>
			<tr id="tr_axuda3" style="display: none;">
				<th colspan="2"><?php echo $PFN_conf->t('Xaxuda','grupo_estado'); ?></th>
			</tr>
			<tr>
				<th><a href="#" onclick="Xamosa_axuda(4); return false;">(?)</a> <label for="revisar_relacions_raices"><?php echo $PFN_conf->t('Xrevisar_relacions_raices'); ?></label></th>
				<td><input type="checkbox" id="revisar_relacions_raices" name="revisar_relacions_raices" value="true" tabindex="70" class="checkbox" /></td>
			</tr>
			<tr id="tr_axuda4" style="display: none;">
				<td colspan="2"><?php echo $PFN_conf->t('Xaxuda','revisar_relacions_raices'); ?></td>
			</tr>
		</table>

		<br />
		<?php if (!empty($id_grupo)) { ?>
		<table class="tabla_info" summary=""><tr><th><strong><?php echo $PFN_conf->t('Xusuarios_relacionados'); ?></strong></th></tr></table>

		<table class="tabla_normal" summary="">
		<?php
			$cnt_usuarios = $PFN_usuarios->init('usuarios_grupo', $id_grupo);
		
			for ($cont = 3; $PFN_usuarios->mais() || ($cont%3 != 0); $PFN_usuarios->seguinte()) {
				if ($cont == 3) {
					echo '<tr>';
					$cont = 0;
				}

				echo '<td align="left" valign="middle">';

				if ($PFN_usuarios->get('nome') == '') {
					echo '&nbsp;';
				} else {
					echo '<a href="../usuarios/index.php?'.PFN_cambia_url('id_usuario', $PFN_usuarios->get('id'), false).'" class="ao12">'.$PFN_usuarios->get('nome').'</a>';
				}

				echo '</td>';
				$cont++;

				if ($cont == 3) {
					echo '</tr>';
				}
			}
		?>
		</table>
		<br />
		<?php } ?>

		<div style="width: 100%; text-align: center;">
			<?php if (!empty($id_grupo)) { ?>
			<input type="reset" value=" <?php echo $PFN_conf->t('eliminar'); ?> " class="boton" style="margin-right: 40px;" onclick="eliminar(<?php echo $cnt_usuarios; ?>);" tabindex="40" />
			<?php } ?>
			<input type="reset" value=" <?php echo $PFN_conf->t('voltar'); ?> " class="boton" style="margin-right: 40px;" onclick="enlace('../index.php?<?php echo PFN_cambia_url('opc', 3, false); ?>');" tabindex="50" />
			<input type="submit" value="<?php echo $PFN_conf->t('Xcambiar'); ?>" class="boton" tabindex="60" />
		</div>
		</fieldset>
		</form>
	</div>
</div>
