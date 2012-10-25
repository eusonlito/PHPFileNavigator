<?php
/****************************************************************************
* data/plantillas/Xconfiguracions_sintaxis.inc.php
*
* plantilla para la visualización del checkeo de un fichero de configuración
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

document.write("<style>");
document.write("\n#corpo { width: 90%; }");
document.write("\n#pe { width: 90%; }");
document.write("<\/style>");

//--></script>
<div id="ver_info">
	<div class="bloque_info"><h1><?php echo $PFN_conf->t('xestion').' &raquo; '.$PFN_conf->t('Xcomprobar_sintaxis'); ?></h1></div>
	<div class="bloque_info">
		<input type="button" value=" <?php echo $PFN_conf->t('pechar'); ?> " class="boton" onclick="window.close();" />
		<br /><br />
		<div class="aviso" style="width: 400px;">
			<?php echo $PFN_conf->t('Xintro_sintaxis'); ?>
			<hr style="border: 1px solid #F00; margin: 5px 0 5px 0;" />
			<?php
			if (count($erros) > 0) {
				foreach ($erros as $v) {
					echo $PFN_conf->t('Xerros', $v);
				}
			} else {
				$alertas = $PFN_arquivos->comprobar_sintaxis($nome_arq, true);

				if (strlen($alertas)) { ?>
					<?php echo $PFN_conf->t('Xcol_erro'); ?>:
					<br /><?php echo $alertas['erro']; ?>
					<hr style="border: 1px solid #F00; margin: 5px 0 5px 0;" />
					<?php echo $PFN_conf->t('Xcol_linha'); ?>:
					<p style="color: #999;"><?php echo $alertas['linha-1']; ?></p>
					<h3 style="color: #333;"><?php echo $alertas['linha']; ?></h3>
					<p style="color: #999;"><?php echo $alertas['linha+1']; ?></p>
				<?php
				} else {
					echo $PFN_conf->t('Xsintaxis_ok');
				}
			}
			?>
		</div>

		<br /><input type="button" value=" <?php echo $PFN_conf->t('pechar'); ?> " class="boton" onclick="window.close();" />
	</div>
</div>
