<?php
/****************************************************************************
* data/plantillas/Xconfiguracions_ver.inc.php
*
* plantilla para la visualización del contenido de un fichero de configuración
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
<script type="text/javascript"><!--

function eliminar () {
	if (confirm(HtmlDecode('<?php echo addslashes($PFN_conf->t('Xeliminar_conf')); ?>'))) {
		enlace('eliminar.php?<?php echo PFN_cambia_url('id_conf', $id_conf, false); ?>');
	}
}

//--></script>

<div id="ver_info">
	<div class="bloque_info"><h1><?php echo $PFN_conf->t('xestion').' &raquo; '.$PFN_conf->t('Xconf_ver'); ?></h1></div>
	<div class="bloque_info">
		<input type="reset" value=" <?php echo $PFN_conf->t('voltar'); ?> " class="boton" onclick="enlace('index.php?<?php echo PFN_cambia_url('id_conf', $id_conf, false); ?>');" />
		<?php if ($editar) { ?>
		<input type="button" value=" <?php echo $PFN_conf->t('editar'); ?> " class="boton" style="margin-left: 40px;" onclick="enlace('modi.php?<?php echo PFN_cambia_url('id_conf', $id_conf, false); ?>');" />
		<?php if ($PFN_usuarios->get('vale')) { ?>
		<input type="button" value=" <?php echo $PFN_conf->t('eliminar'); ?> " class="boton" style="margin-left: 40px;" onclick="eliminar();" />
		<?php } ?>
		<?php } ?>
		<br /><br />

		<div>
			<?php
			if (count($erros) > 0) {
				echo '<div class="aviso">'.$PFN_conf->t('Xerros', $erros[0]).'</div>';
			} else {
				echo '<pre>'.PFN_textoArquivo2pantalla($PFN_arquivos->get_contido($nome_arq), true).'</pre>';
			}
			?>
		</div>
		<br /><input type="reset" value=" <?php echo $PFN_conf->t('voltar'); ?> " class="boton" onclick="enlace('index.php?<?php echo PFN_cambia_url('id_conf', $id_conf, false); ?>');" />
		<?php if ($editar) { ?>
		<input type="button" value=" <?php echo $PFN_conf->t('editar'); ?> " class="boton" style="margin-left: 40px;" onclick="enlace('modi.php?<?php echo PFN_cambia_url('id_conf', $id_conf, false); ?>');" />
		<?php if ($PFN_usuarios->get('vale')) { ?>
		<input type="button" value=" <?php echo $PFN_conf->t('eliminar'); ?> " class="boton" style="margin-left: 40px;" onclick="eliminar();" />
		<?php } ?>
		<?php } ?>
	</div>
</div>
