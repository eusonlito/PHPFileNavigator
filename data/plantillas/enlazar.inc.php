<?php
/****************************************************************************
* data/plantillas/enlazar.inc.php
*
* plantilla para la visualización de la acción de enlazar
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

defined('OK') && defined('ACCION') or die();
?>
<table border="0" cellpadding="0" cellspacing="5" width="95%" summary="">
	<tr>
		<td align="left">
			<b><span class="n14"><?php echo $PFN_conf->t('accion'); ?> &raquo; </span>
			<span class="r14"><?php echo $PFN_conf->t("link_$que"); ?></span></b>
		</td>
	</tr>
</table>

<form action="accion.php?<?php echo PFN_cambia_url('accion','link',false); ?>" method="post" onsubmit="return submitonce();">
<input type="hidden" name="executa" value="true">
<input type="hidden" name="cal" value="<?php echo $cal; ?>">
<b><span class="r14"><?php echo $PFN_conf->t($msx); ?></span><br /><br />
<span class="ao14"><?php echo $a_web; ?></span></b><br /><br />
<table border="0" cellpadding="0" cellspacing="0" summary="">
	<tr>
		<td class="n12"><?php echo $PFN_arbore->arbore_txt; ?></td>
	</tr>
</table>
<br /><input type="reset" value=" <?php echo $PFN_conf->t('cancelar'); ?> " class="boton" onclick="enlace('navega.php?<?php echo PFN_get_url(false); ?>');">
<img src="<?php echo $PFN_conf->g('estilo'); ?>imx/0.png" border="0" alt=" " height="1" width="40">
<input type="submit" value=" <?php echo $PFN_conf->t('aceptar'); ?> " class="boton">
</form>
