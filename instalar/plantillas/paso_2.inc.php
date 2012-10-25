<?php
/*******************************************************************************
* instalar/plantillas/paso_2.inc.php
*
* Plantilla para el segundo paso de la instalación
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
<input type="hidden" id="paso" name="paso" value="3" />
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

<h2><?php echo $PFN_conf->t('i:directorios'); ?></h2>

<br /><?php echo $PFN_conf->t('i:intro_directorios'); ?><br /><br />

<div class="capa_<?php echo ($comprobar[0] == 1)?'ok':'erro'; ?>">
	<strong>data/servidor/</strong><br />
	<?php echo $PFN_conf->t(($comprobar[0] == 1)?'i:path_ok':'i:path_erro'); ?>
</div>

<div class="capa_<?php echo ($comprobar[1] == 1)?'ok':'erro'; ?>">
	<strong>data/conf/</strong><br />
	<?php echo $PFN_conf->t(($comprobar[1] == 1)?'i:path_ok':'i:path_erro'); ?>
</div>

<?php if ($basicas['version'] > 0) { ?>
<div class="capa_<?php echo ($comprobar[2] == 1)?'ok':'erro'; ?>">
	<strong>data/conf/basicas.inc.php</strong><br />
	<?php echo $PFN_conf->t(($comprobar[2] == 1)?'i:arq_ok':'i:arq_erro'); ?>
</div>
<?php } ?>

<br />

<?php if ($erros) { ?>
<script type="text/javascript"><!--

document.getElementById('paso').value = 2;

//--></script>
<input type="submit" value="<?php echo $PFN_conf->t('i:recargar'); ?>" class="dereita" />
<?php } else { ?>
<input type="submit" value="<?php echo $PFN_conf->t('continuar_paso_3'); ?>" class="dereita" />
<?php } ?>
</fieldset>
</form>

<form action="index.php" method="post">
<fieldset>
<input type="hidden" name="paso" value="1" />
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
<input type="submit" value="<?php echo $PFN_conf->t('voltar_paso_1'); ?>" class="esquerda" />
</fieldset>
</form>
