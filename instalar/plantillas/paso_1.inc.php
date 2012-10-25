<?php
/*******************************************************************************
* instalar/plantillas/paso_1.inc.php
*
* Plantilla para el primer paso de la instalación
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

defined('OK') or die();
?>
<form action="index.php" method="post">
<fieldset>
<input type="hidden" id="paso" name="paso" value="2" />
<input type="hidden" name="zlib" value="<?php echo $form['zlib']; ?>" />
<input type="hidden" name="gd2" value="<?php echo $form['gd2']; ?>" />
<input type="hidden" name="charset" value="<?php echo $form['charset']; ?>" />
<input type="hidden" name="db_servidor" value="<?php echo $form['db_servidor']; ?>" />
<input type="hidden" name="db_nome" value="<?php echo $form['db_nome']; ?>" />
<input type="hidden" name="db_usuario" value="<?php echo $form['db_usuario']; ?>" />
<input type="hidden" name="db_prefixo" value="<?php echo $form['db_prefixo']; ?>" />
<input type="hidden" name="ad_nome" value="<?php echo addslashes($form['ad_nome']); ?>" />
<input type="hidden" name="ad_usuario" value="<?php echo $form['ad_usuario']; ?>" />
<input type="hidden" name="ad_correo" value="<?php echo $form['ad_correo']; ?>" />
<input type="hidden" name="ra_nome" value="<?php echo addslashes($form['ra_nome']); ?>" />
<input type="hidden" name="ra_path" value="<?php echo $form['ra_path']; ?>" />
<input type="hidden" name="ra_web" value="<?php echo $form['ra_web']; ?>" />
<input type="hidden" name="ra_dominio" value="<?php echo $form['ra_dominio']; ?>" />

<h2><?php echo $PFN_conf->t('i:presentacion'); ?></h2>

<br /><?php echo $PFN_conf->t('i:intro_presentacion'); ?>

<br /><?php echo $PFN_conf->t('i:intro_escolle_idioma'); ?><br />

<div class="fondo_gris">
<label for="form_idioma" class="separa_10d"><strong><?php echo $PFN_conf->t('idioma'); ?>:</strong></label>
<select name="idioma" id="form_idioma" onchange="return enlace('?paso=1&amp;idioma='+this.value);">
	<?php
	foreach ($idiomas_valen as $k => $v) {
		echo '<option value="'.$k.'"'.(($k == $form['idioma'])?' selected="selected"':'').'>'.$PFN_conf->t('lista_idiomas', $k).'</option>';
	}
	?>
</select>
</div>

<br /><?php echo $PFN_conf->t('i:intro_tipo_instalacion'); ?><br />

<div class="fondo_gris">
<strong><?php echo $PFN_conf->t('tipo_instalacion'); ?>:</strong><br /><br />
<input type="radio" name="tipo" id="tipo_1" value="instalar" class="separa_10d" <?php echo ($form['tipo'] == 'instalar')?'checked="checked"':''; ?> />
<label for="tipo_1"><?php echo $PFN_conf->t('instalar_cero'); ?></label><br />

<?php if (($basicas['version'] > 0) && ($basicas['version'] >= 200) && ($basicas['version'] < $PFN_version)) { ?>
<input type="radio" name="tipo" id="tipo_2" value="actualizar" class="separa_10d" <?php echo ($form['tipo'] == 'actualizar')?'checked="checked"':''; ?> />
<label for="tipo_2"><?php echo $PFN_conf->t('i:actualizar'); ?></label><br />
<?php } ?>
</div>

<br /><?php echo $PFN_conf->t('i:axuda','aviso'); ?><br />

<div class="fondo_gris">
<input type="checkbox" name="aviso_instalacion" id="aviso_instalacion" value="true" class="checkbox separa_10d" tabindex="15" <?php echo ($form['aviso_instalacion'] == 'true')?'checked="checked"':''; ?> />
<label for="aviso_instalacion"><strong><?php echo $PFN_conf->t('i:aviso'); ?></strong></label>
</div>

<br /><div class="aviso"><?php echo $PFN_conf->t('i:aviso_default'); ?></div>

<?php if ($erros) { ?>
<script type="text/javascript"><!--

document.getElementById('paso').value = 1;

//--></script>
<br /><input type="submit" value="<?php echo $PFN_conf->t('i:recargar'); ?>" class="dereita" />
<?php } else { ?>
<br /><input type="submit" value="<?php echo $PFN_conf->t('continuar_paso_2'); ?>" class="dereita" />
<?php } ?>
</fieldset>
</form>
