<?php
/****************************************************************************
* data/plantillas/Xconfiguracions_eliminar.inc.php
*
* plantilla para la visualización del resultado de la eliminación de un fichero
* de configuración
*

PHPfileNavigator versión 2.0.0

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
<table border="0" cellpadding="0" cellspacing="5" width="95%" summary="">
	<tr>
		<td>
			<b><span class="n14"><?php echo $PFN_conf->t('xestion'); ?> &raquo; </span>
			<span class="r14"><?php echo $PFN_conf->t('Xconf_eliminar'); ?></span></b>
		</td>
	</tr>
</table>

<br />
<?php if (count($erros) > 0) { ?>
<input type="button" value=" <?php echo $PFN_conf->t('voltar'); ?> " class="boton" onclick="enlace('index.php?<?php echo PFN_cambia_url('id_conf', $id_conf, false); ?>');">
<?php } else { ?>
<input type="button" value=" <?php echo $PFN_conf->t('voltar'); ?> " class="boton" onclick="enlace('../index.php?<?php echo PFN_cambia_url(array('id_conf','opc'), array('', 4), false); ?>');">
<?php } ?>
<br /><br />

<div id="aviso">
	<span class="ao12"><strong><?php echo $PFN_conf->t('Xintro_eliminar'); ?></strong></span>
	<hr noshade="noshade">
	<?php
	if (count($erros) > 0) {
		foreach ($erros as $v) {
			echo $PFN_conf->t('Xerros', intval($v)).'<br />';
		}
	} else {
		echo $PFN_conf->t('Xok', intval($ok)).'<br />';
	}
	?>
</div>

<br />
<?php if (count($erros) > 0) { ?>
<input type="button" value=" <?php echo $PFN_conf->t('voltar'); ?> " class="boton" onclick="enlace('index.php?<?php echo PFN_cambia_url('id_conf', $id_conf, false); ?>');">
<?php } else { ?>
<input type="button" value=" <?php echo $PFN_conf->t('voltar'); ?> " class="boton" onclick="enlace('../index.php?<?php echo PFN_cambia_url(array('id_conf','opc'), array('',4), false); ?>');">
<?php } ?>
<br />
