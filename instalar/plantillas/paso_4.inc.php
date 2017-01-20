<?php
/*******************************************************************************
* instalar/plantillas/paso_4.inc.php
*
* Plantilla para el cuarto paso de la instalación
*

PHPfileNavigator versión 2.3.2

Copyright (C) 2004-2006 Lito <litoeordes.com>

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
<script type="text/javascript" src="<?php echo $relativo; ?>js/html_decoder.js"></script>
<script type="text/javascript"><!--

function comproba_datos (obx_form) {
	var erro = '';
	var campo = '';

	if (obx_form.charset.value == '') {
		erro = '<?php echo addslashes($PFN_conf->t('i:erros',1)); ?>';
		campo = 'charset';
	} else if (obx_form.db_servidor.value == '') {
		erro = '<?php echo addslashes($PFN_conf->t('i:erros',2)); ?>';
		campo = 'db_servidor';
	} else if (obx_form.db_nome.value == '') {
		erro = '<?php echo addslashes($PFN_conf->t('i:erros',3)); ?>';
		campo = 'db_nome';
	} else if (obx_form.db_usuario.value == '') {
		erro = '<?php echo addslashes($PFN_conf->t('i:erros',4)); ?>';
		campo = 'db_usuario';
	} else if (obx_form.ad_nome.value == '') {
		erro = '<?php echo addslashes($PFN_conf->t('i:erros',5)); ?>';
		campo = 'ad_nome';
	} else if (obx_form.ad_usuario.value == '') {
		erro = '<?php echo addslashes($PFN_conf->t('i:erros',6)); ?>';
		campo = 'ad_usuario';
	} else if (obx_form.ad_contrasinal.value == '') {
		erro = '<?php echo addslashes($PFN_conf->t('i:erros',7)); ?>';
		campo = 'ad_contrasinal';
	} else if (obx_form.ad_contrasinal.value != obx_form.ad_rep_contrasinal.value) {
		erro = '<?php echo addslashes($PFN_conf->t('i:erros',8)); ?>';
		campo = 'ad_rep_contrasinal';
	} else if (obx_form.ad_correo.value == '') {
		erro = '<?php echo addslashes($PFN_conf->t('i:erros',9)); ?>';
		campo = 'ad_correo';
	} else if (obx_form.ra_nome.value == '') {
		erro = '<?php echo addslashes($PFN_conf->t('i:erros',10)); ?>';
		campo = 'ra_nome';
	} else if (obx_form.ra_path.value == '') {
		erro = '<?php echo addslashes($PFN_conf->t('i:erros',11)); ?>';
		campo = 'ra_path';
	} else if (obx_form.ra_web.value == '') {
		erro = '<?php echo addslashes($PFN_conf->t('i:erros',12)); ?>';
		campo = 'ra_web';
	} else if (obx_form.ra_dominio.value == '') {
		erro = '<?php echo addslashes($PFN_conf->t('i:erros',13)); ?>';
		campo = 'ra_dominio';
	}

	if (erro == '') {
		return true;
	}

	alert(HtmlDecode(erro));

	eval('obx_form.'+campo+'.focus();');

	return false;
}

//--></script>
<form action="index.php" method="post" onsubmit="return comproba_datos(this);">
<fieldset>
<input type="hidden" name="paso" value="5" />
<input type="hidden" name="idioma" value="<?php echo $form['idioma']; ?>" />
<input type="hidden" name="aviso_instalacion" value="<?php echo $form['aviso_instalacion']; ?>" />
<input type="hidden" name="tipo" value="<?php echo $form['tipo']; ?>" />
<input type="hidden" name="gd2" value="<?php echo $form['gd2']; ?>" />
<input type="hidden" name="zlib" value="<?php echo $form['zlib']; ?>" />
<h2><?php echo $PFN_conf->t('i:datos'); ?></h2>

<br /><?php echo $PFN_conf->t('i:intro_datos'); ?><br />

<?php if (count($erros) > 0) { ?>
<ul class="aviso">
	<?php foreach ($erros as $v) { ?>
	<li>- <?php echo is_numeric($v) ? $PFN_conf->t('i:erros', $v) : $v; ?></li>
	<?php } ?>
</ul>
<?php } ?>

<br />

<table class="tabla_info" summary="">
	<tr>
		<th><a href="#" onclick="Xamosa_axuda(1); return false;">(?)</a> <label for="form_charset"><?php echo $PFN_conf->t('i:charset'); ?></label>:</th>
		<td>
			<select name="charset" id="form_charset" size="1" tabindex="50">
				<option value="UTF-8" <?php echo ($form['charset'] == 'UTF-8')?'selected="selected"':''; ?>>UTF-8 Unicode</option>
				<option value="US-ASCII" <?php echo ($form['charset'] == 'US-ASCII')?'selected="selected"':''; ?>>US-ASCII United States</option>
				<option value="ISO-8859-1" <?php echo ($form['charset'] == 'ISO-8859-1')?'selected="selected"':''; ?>>ISO-8859-1 Westerm European</option>
				<option value="ISO-8859-2" <?php echo ($form['charset'] == 'ISO-8859-2')?'selected="selected"':''; ?>>ISO-8859-2 East European</option>
				<option value="ISO-8859-3" <?php echo ($form['charset'] == 'ISO-8859-3')?'selected="selected"':''; ?>>ISO-8859-3 South European</option>
				<option value="ISO-8859-4" <?php echo ($form['charset'] == 'ISO-8859-4')?'selected="selected"':''; ?>>ISO-8859-4 North European</option>
				<option value="ISO-8859-5" <?php echo ($form['charset'] == 'ISO-8859-5')?'selected="selected"':''; ?>>ISO-8859-5 Cyrillic</option>
				<option value="ISO-8859-6" <?php echo ($form['charset'] == 'ISO-8859-6')?'selected="selected"':''; ?>>ISO-8859-6 Arabic</option>
				<option value="ISO-8859-7" <?php echo ($form['charset'] == 'ISO-8859-7')?'selected="selected"':''; ?>>ISO-8859-7 Greek</option>
				<option value="ISO-8859-8" <?php echo ($form['charset'] == 'ISO-8859-8')?'selected="selected"':''; ?>>ISO-8859-8 Hebrew</option>
				<option value="ISO-8859-9" <?php echo ($form['charset'] == 'ISO-8859-9')?'selected="selected"':''; ?>>ISO-8859-9 Turkish</option>
				<option value="ISO-8859-10" <?php echo ($form['charset'] == 'ISO-8859-10')?'selected="selected"':''; ?>>ISO-8859-10 Nordic</option>
				<option value="ISO-8859-11" <?php echo ($form['charset'] == 'ISO-8859-11')?'selected="selected"':''; ?>>ISO-8859-11 Thai</option>
				<option value="ISO-8859-14" <?php echo ($form['charset'] == 'ISO-8859-14')?'selected="selected"':''; ?>>ISO-8859-14 Celtic</option>
				<option value="ISO-8859-15" <?php echo ($form['charset'] == 'ISO-8859-15')?'selected="selected"':''; ?>>ISO-8859-15 Latin-9</option>
				<option value="ISO-8859-16" <?php echo ($form['charset'] == 'ISO-8859-16')?'selected="selected"':''; ?>>ISO-8859-16 South-Eastern European</option>
				<option value="Big5" <?php echo ($form['charset'] == 'Big5')?'selected="selected"':''; ?>>Big5 Chinese Traditional (Taiwan, HongKong)</option>
				<option value="EUC-TW" <?php echo ($form['charset'] == 'EUC-TW')?'selected="selected"':''; ?>>EUC-TW Chinese Traditional</option>
				<option value="GB2312" <?php echo ($form['charset'] == 'GB2312')?'selected="selected"':''; ?>>GB2312 Chinese Simplified</option>
				<option value="GB" <?php echo ($form['charset'] == 'GB')?'selected="selected"':''; ?>>GB (GuoBiao) Chinese Simplified</option>
				<option value="GBK" <?php echo ($form['charset'] == 'GBK')?'selected="selected"':''; ?>>GBK Chinese Simplified</option>
				<option value="HZ" <?php echo ($form['charset'] == 'HZ')?'selected="selected"':''; ?>>HZ Chinese Simplified</option>
				<option value="ISO-2022-GB" <?php echo ($form['charset'] == 'ISO-2022-GB')?'selected="selected"':''; ?>>ISO-2022-GB New Chinese standard</option>
				<option value="EUC-JP" <?php echo ($form['charset'] == 'EUC-JP')?'selected="selected"':''; ?>>EUC-JP Japanese</option>
				<option value="EUC-JIS" <?php echo ($form['charset'] == 'EUC-JIS')?'selected="selected"':''; ?>>EUC-JIS Japanese</option>
				<option value="ISO-2022-JP" <?php echo ($form['charset'] == 'ISO-2022-JP')?'selected="selected"':''; ?>>ISO-2022-JP Japanese</option>
				<option value="ISO-2022-KR" <?php echo ($form['charset'] == 'ISO-2022-KR')?'selected="selected"':''; ?>>ISO-2022-KR Korean</option>
				<option value="EUC-KR" <?php echo ($form['charset'] == 'EUC-KR')?'selected="selected"':''; ?>>EUC-KR Korean</option>
				<option value="KO18-R" <?php echo ($form['charset'] == 'KO18-R')?'selected="selected"':''; ?>>KO18-R Cyrillic</option>
				<option value="KO18-U" <?php echo ($form['charset'] == 'KO18-U')?'selected="selected"':''; ?>>KO18-U Cyrillic</option>
			</select>
		</td>
	</tr>
	<tr id="tr_axuda1" style="display: none;">
		<td colspan="2"><?php echo $PFN_conf->t('i:axuda','charset'); ?></td>
	</tr>
	<tr>
		<td colspan="2"><br /><h1><?php echo $PFN_conf->t('i:base_datos'); ?></h1></td>
	</tr>
	<tr>
		<th><a href="#" onclick="Xamosa_axuda(2); return false;">(?)</a> <label for="form_db_servidor"><?php echo $PFN_conf->t('i:db_servidor'); ?></label>:</th>
		<td><input type="text" name="db_servidor" id="form_db_servidor" value="<?php echo $form['db_servidor']; ?>" size="40" class="formulario" tabindex="60" /></td>
	</tr>
	<tr id="tr_axuda2" style="display: none;">
		<td colspan="2"><?php echo $PFN_conf->t('i:axuda','db_servidor'); ?></td>
	</tr>
	<tr>
		<th><a href="#" onclick="Xamosa_axuda(3); return false;">(?)</a> <label for="form_db_nome"><?php echo $PFN_conf->t('i:db_nome'); ?></label>:</th>
		<td><input type="text" name="db_nome" id="form_db_nome" value="<?php echo $form['db_nome']; ?>" size="40" class="formulario" tabindex="70" /></td>
	</tr>
	<tr id="tr_axuda3" style="display: none;">
		<td colspan="2"><?php echo $PFN_conf->t('i:axuda','db_nome'); ?></td>
	</tr>
	<tr>
		<th><a href="#" onclick="Xamosa_axuda(4); return false;">(?)</a> <label for="form_db_usuario"><?php echo $PFN_conf->t('i:db_usuario'); ?></label>:</th>
		<td><input type="text" name="db_usuario" id="form_db_usuario" value="<?php echo $form['db_usuario']; ?>" size="40" class="formulario" tabindex="80" /></td>
	</tr>
	<tr id="tr_axuda4" style="display: none;">
		<td colspan="2"><?php echo $PFN_conf->t('i:axuda','db_usuario'); ?></td>
	</tr>
	<tr>
		<th><a href="#" onclick="Xamosa_axuda(5); return false;">(?)</a> <label for="form_db_contrasinal"><?php echo $PFN_conf->t('i:db_contrasinal'); ?></label>:</th>
		<td><input type="password" name="db_contrasinal" id="form_db_contrasinal" value="" size="40" class="formulario" tabindex="90" /></td>
	</tr>
	<tr id="tr_axuda5" style="display: none;">
		<td colspan="2"><?php echo $PFN_conf->t('i:axuda','db_contrasinal'); ?></td>
	</tr>
	<tr>
		<th><a href="#" onclick="Xamosa_axuda(6); return false;">(?)</a> <label for="form_db_prefixo"><?php echo $PFN_conf->t('i:db_prefixo'); ?></label>:</th>
		<td><input type="text" name="db_prefixo" id="form_db_prefixo" value="<?php echo $form['db_prefixo']; ?>" size="40" class="formulario" tabindex="100" /></td>
	</tr>
	<tr id="tr_axuda6" style="display: none;">
		<td colspan="2"><?php echo $PFN_conf->t('i:axuda','db_prefixo'); ?></td>
	</tr>
	<tr>
		<td colspan="2"><br /><h1><?php echo $PFN_conf->t('i:administrador'); ?></h1></td>
	</tr>
	<tr>
		<th><a href="#" onclick="Xamosa_axuda(7); return false;">(?)</a> <label for="form_ad_nome"><?php echo $PFN_conf->t('i:ad_nome'); ?></label>:</th>
		<td><input type="text" name="ad_nome" id="form_ad_nome" value="<?php echo $form['ad_nome']; ?>" size="40" class="formulario" tabindex="110" /></td>
	</tr>
	<tr id="tr_axuda7" style="display: none;">
		<td colspan="2"><?php echo $PFN_conf->t('i:axuda','ad_nome'); ?></td>
	</tr>
	<tr>
		<th><a href="#" onclick="Xamosa_axuda(8); return false;">(?)</a> <label for="form_ad_usuario"><?php echo $PFN_conf->t('i:ad_usuario'); ?></label>:</th>
		<td><input type="text" name="ad_usuario" id="form_ad_usuario" value="<?php echo $form['ad_usuario']; ?>" size="40" class="formulario" tabindex="120" /></td>
	</tr>
	<tr id="tr_axuda8" style="display: none;">
		<td colspan="2"><?php echo $PFN_conf->t('i:axuda','ad_usuario'); ?></td>
	</tr>
	<tr>
		<th><a href="#" onclick="Xamosa_axuda(9); return false;">(?)</a> <label for="form_ad_contrasinal"><?php echo $PFN_conf->t('i:ad_contrasinal'); ?></label>:</th>
		<td><input type="password" name="ad_contrasinal" id="form_ad_contrasinal" size="40" value="" class="formulario" tabindex="130" /></td>
	</tr>
	<tr id="tr_axuda9" style="display: none;">
		<td colspan="2"><?php echo $PFN_conf->t('i:axuda','ad_contrasinal'); ?></td>
	</tr>
	<tr>
		<th><a href="#" onclick="Xamosa_axuda(10); return false;">(?)</a> <label for="form_ad_rep_contrasinal"><?php echo $PFN_conf->t('i:ad_rep_contrasinal'); ?></label>:</th>
		<td><input type="password" name="ad_rep_contrasinal" id="form_ad_rep_contrasinal" value="" size="40" class="formulario" tabindex="140" /></td>
	</tr>
	<tr id="tr_axuda10" style="display: none;">
		<td colspan="2"><?php echo $PFN_conf->t('i:axuda','ad_rep_contrasinal'); ?></td>
	</tr>
	<tr>
		<th><a href="#" onclick="Xamosa_axuda(11); return false;">(?)</a> <label for="form_ad_correo"><?php echo $PFN_conf->t('i:ad_correo'); ?></label>:</th>
		<td><input type="text" name="ad_correo" id="form_ad_correo" value="<?php echo $form['ad_correo']; ?>" size="40" class="formulario" tabindex="150" /></td>
	</tr>
	<tr id="tr_axuda11" style="display: none;">
		<td colspan="2"><?php echo $PFN_conf->t('i:axuda','ad_correo'); ?></td>
	</tr>
	<tr>
		<td colspan="2"><br /><h1><?php echo $PFN_conf->t('i:raiz'); ?></h1></td>
	</tr>
	<tr>
		<th><a href="#" onclick="Xamosa_axuda(12); return false;">(?)</a> <label for="form_ra_nome"><?php echo $PFN_conf->t('i:ra_nome'); ?></label>:</th>
		<td><input type="text" name="ra_nome" id="form_ra_nome" value="<?php echo $form['ra_nome']; ?>" size="40" class="formulario" tabindex="160" /></td>
	</tr>
	<tr id="tr_axuda12" style="display: none;">
		<td colspan="2"><?php echo $PFN_conf->t('i:axuda','ra_nome'); ?></td>
	</tr>
	<tr>
		<th><a href="#" onclick="Xamosa_axuda(13); return false;">(?)</a> <label for="form_ra_path"><?php echo $PFN_conf->t('i:ra_path'); ?></label>:</th>
		<td><input type="text" name="ra_path" id="form_ra_path" value="<?php echo $form['ra_path']; ?>" size="40" class="formulario" tabindex="170" /></td>
	</tr>
	<tr id="tr_axuda13" style="display: none;">
		<td colspan="2"><?php echo $PFN_conf->t('i:axuda','ra_path'); ?></td>
	</tr>
	<tr>
		<th><a href="#" onclick="Xamosa_axuda(14); return false;">(?)</a> <label for="form_ra_web"><?php echo $PFN_conf->t('i:ra_web'); ?></label>:</th>
		<td><input type="text" name="ra_web" id="form_ra_web" value="<?php echo $form['ra_web']; ?>" size="40" class="formulario" tabindex="180" /></td>
	</tr>
	<tr id="tr_axuda14" style="display: none;">
		<td colspan="2"><?php echo $PFN_conf->t('i:axuda','ra_web'); ?></td>
	</tr>
	<tr>
		<th><a href="#" onclick="Xamosa_axuda(15); return false;">(?)</a> <label for="form_ra_dominio"><?php echo $PFN_conf->t('i:ra_dominio'); ?></label>:</th>
		<td><input type="text" name="ra_dominio" id="form_ra_dominio" value="<?php echo $form['ra_dominio']; ?>" size="40" class="formulario" tabindex="190" /></td>
	</tr>
	<tr id="tr_axuda15" style="display: none;">
		<td colspan="2"><?php echo $PFN_conf->t('i:axuda','ra_dominio'); ?></td>
	</tr>
</table>

<br />

<input type="submit" value="<?php echo $PFN_conf->t('continuar_paso_5'); ?>" class="dereita" />
</fieldset>
</form>

<form action="index.php" method="post">
<fieldset>
<input type="hidden" name="paso" value="3" />
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
<input type="submit" value="<?php echo $PFN_conf->t('voltar_paso_3'); ?>" class="esquerda" />
</fieldset>
</form>

<br class="nada" />
