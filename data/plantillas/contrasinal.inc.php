<?php
/****************************************************************************
* data/plantillas/contrasinal.inc.php
*
* plantilla para la visualización de la pantalla de recuperación de
* contraseña
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

<h1 id="benvido"><?php echo $PFN_conf->t('novo_contrasinal'); ?></h1>
<div class="aviso" style="width: 230px; text-align: center; margin-left: 250px;"><?php echo $txt_erro; ?></div>
<?php if ($ok !== 1) { ?>
<div id="login">
	<form action="contrasinal.php" method="post" id="formulario">
	<fieldset>
	<input type="hidden" name="executa" value="true" />
	<p><label for="recuperar_usuario"><?php echo $PFN_conf->t('usuario'); ?>:</label>
	<br /><input type="text" id="recuperar_usuario" name="recuperar_usuario" class="formulario" /></p>
	<p><label for="recuperar_email"><?php echo $PFN_conf->t('correo'); ?>:</label>
	<br /><input type="text" id="recuperar_email" name="recuperar_email" class="formulario" /></p>
	<p><input type="submit" name="Submit" value=" <?php echo $PFN_conf->t('enviar'); ?> " class="boton" /></p>
	</fieldset>
	</form>
	<script type="text/javascript"><!--

	document.getElementById('recuperar_usuario').focus();

	//--></script>
</div>
<?php } ?>
<p id="login_olvido_contrasinal"><a href="index.php"><?php echo $PFN_conf->t('voltar'); ?></a></p>
