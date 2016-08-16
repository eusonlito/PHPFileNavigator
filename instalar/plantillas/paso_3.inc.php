<?php
/*******************************************************************************
* instalar/plantillas/paso_3.inc.php
*
* Plantilla para el tercer paso de la instalación
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

defined('OK') or die();
?>
<form action="index.php" method="post">
<fieldset>
<input type="hidden" id="paso" name="paso" value="<?php echo ($form['tipo'] == 'instalar')?4:5; ?>" />
<input type="hidden" name="idioma" value="<?php echo $form['idioma']; ?>" />
<input type="hidden" name="aviso_instalacion" value="<?php echo $form['aviso_instalacion']; ?>" />
<input type="hidden" name="tipo" value="<?php echo $form['tipo']; ?>" />
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

<h2><?php echo $PFN_conf->t('i:comprobacion'); ?></h2>

<br /><?php echo $PFN_conf->t('i:intro_comprobacion'); ?><br /><br />

<div class="capa_<?php echo $comprobar[0]; ?>">
	<strong>PHP > 4.0.6</strong><br />
	<?php echo $PFN_conf->t(($comprobar[0] == 'ok')?'i:instalado_ok':'i:instalado_erro').'<strong> '.phpversion(); ?></strong>
</div>

<div class="capa_<?php echo $comprobar[1]; ?>">
	<strong>MySQL >= 4.0.0</strong><br />
	<?php if ($erro_mysql) { ?>
		<?php echo $PFN_conf->t('i:mysql_erro'); ?>
	<?php } else { ?>
		<?php echo $PFN_conf->t(($comprobar[1] == 'ok')?'i:instalado_ok':'i:instalado_erro').'<strong>'; ?></strong>
	<?php } ?>
</div>

<div class="capa_<?php echo $comprobar[2]; ?>">
	<strong>GD >= 1.0.0</strong><br />
	<?php if ($erro_gd) { ?>
		<?php echo $PFN_conf->t('i:gd_erro'); ?>
	<?php } else { ?>
		<?php if ($comprobar[2] == 'ok') { ?>
			<input type="hidden" name="gd2" value="true" />
		<?php } ?>
		<?php echo $PFN_conf->t(($comprobar[2] == 'ok')?'i:instalado_ok':'i:instalado_aviso').'<strong> '.$gd_version[1]; ?></strong>
	<?php } ?>
</div>

<div class="capa_<?php echo $comprobar[3]; ?>">
	<strong>ZLib</strong><br />
	<?php if ($comprobar[3] == 'ok') { ?>
		<input type="hidden" name="zlib" value="true" />
		<?php echo $PFN_conf->t('i:instalado_ok').'<strong> '.$zlib_version[1]; ?></strong>
	<?php } else { ?>
		<?php echo $PFN_conf->t('i:zlib_erro'); ?>
	<?php } ?>
</div>

<div class="capa_<?php echo $comprobar[4]; ?>">
	<strong>safe_mode = Off</strong><br />
	<?php echo $PFN_conf->t(($comprobar[4] == 'ok')?'i:safe_mode_ok':'i:safe_mode_erro'); ?>
</div>

<div class="capa_<?php echo $comprobar[5]; ?>">
	<strong>upload_max_filesize</strong><br />
	<?php echo $PFN_conf->t(($comprobar[5] == 'ok')?'i:upload_ok':'i:upload_erro').'<strong> '.$upload_max_filesize[0]; ?></strong>
</div>

<div class="capa_<?php echo $comprobar[6]; ?>">
	<strong>memory_limit</strong><br />
	<?php echo $PFN_conf->t(($comprobar[6] == 'ok')?'i:memory_ok':'i:memory_erro').'<strong> '.$memory_limit[0]; ?></strong>
</div>

<br />

<?php if ($erros) { ?>
<div style="text-align: right">
	<input type="submit" id="btn_enviar" value="<?php echo $PFN_conf->t('i:recargar'); ?>" />
	<br /><br /><div class="fondo_gris">
		<label for="omitir_paso"><?php echo $PFN_conf->t('i:omitir'); ?></label>
		<input type="checkbox" id="omitir_paso" name="omitir_paso" value="true" onchange="activa_paso();" />
	</div>
</div>
<br /><br />
<script type="text/javascript"><!--

function activa_paso () {
	if (document.getElementById('omitir_paso').checked == true) {
		document.getElementById('paso').value = <?php echo ($form['tipo'] == 'instalar')?4:5; ?>;
		document.getElementById('btn_enviar').value = '<?php echo PFN_quitaHtmlentities($PFN_conf->t('continuar_paso_'.(($form['tipo'] == 'instalar')?4:5))); ?>';
	} else {
		document.getElementById('paso').value = 3;
		document.getElementById('btn_enviar').value = '<?php echo PFN_quitaHtmlentities($PFN_conf->t('i:recargar')); ?>';
	}
}

activa_paso(false);

//--></script>
<?php } else { ?>
<input type="submit" value="<?php echo $PFN_conf->t('continuar_paso_'.(($form['tipo'] == 'instalar')?4:5)); ?>" class="dereita" />
<?php } ?>
</fieldset>
</form>

<form action="index.php" method="post">
<fieldset>
<input type="hidden" name="paso" value="2" />
<input type="hidden" name="idioma" value="<?php echo $form['idioma']; ?>" />
<input type="hidden" name="aviso_instalacion" value="<?php echo $form['aviso_instalacion']; ?>" />
<input type="hidden" name="tipo" value="<?php echo $form['tipo']; ?>" />
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
<input type="submit" value="<?php echo $PFN_conf->t('voltar_paso_2'); ?>" class="esquerda" />
</fieldset>
</form>
