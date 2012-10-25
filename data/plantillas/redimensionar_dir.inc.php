<?php
/****************************************************************************
* data/plantillas/redimensionar_dir.inc.php
*
* plantilla para la visualización de la acción de redimensionar todas las
* imágenes de un directorio
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

defined('OK') && defined('ACCION') or die();
?>
		<div class="bloque_info"><h1><?php echo $PFN_conf->t('accion').' &raquo; '.$PFN_conf->t('redimensionar'); ?></h1></div>
		<div class="aviso">
			<?php if ($vale) { ?>

			<script type="text/javascript" src="<?php echo $relativo; ?>js/prototype.lite.js"></script>
			<script type="text/javascript" src="<?php echo $relativo; ?>js/ajax.js"></script>
			<script type="text/javascript"><!--

			function activa_botons () {
				document.getElementById('btn_submit').disabled = false;
				document.getElementById('btn_reset').disabled = false;
			}

			function procesa_imaxes () {
				submitonce();

				document.getElementById('resultado_ajax').innerHTML = '';

				AJAX_url = 'accion.php?<?php
					echo PFN_cambia_url(
						array('accion','dir','cal'),
						array('redimensionar_dir_accion',$dir,$cal)
						,false,true);
					?>&executa=true'
					+'&sobreescribir='+(document.getElementById('sobreescribir').checked?1:'')
					+'&previsualizar='+(document.getElementById('previsualizar').checked?1:'')
					+'&pos=';

				new ajax(0, {update: $('resultado_ajax')});

				document.getElementById('resultado_ajax').innerHTML += '<br class="nada" />';

				return false;
			}

			//--></script>

			<p><?php echo $PFN_conf->t('redimensionar_dir_txt'); ?></p>
			<form id="formulario" action="accion.php?<?php echo PFN_cambia_url('accion','redimensionar_dir',false); ?>" method="post" onsubmit="return procesa_imaxes();">
			<fieldset>

			<br /><input type="checkbox" name="sobreescribir" id="sobreescribir" value="si" />
			&nbsp;&nbsp;<label for="sobreescribir"><?php echo $PFN_conf->t('sobreescribir_reducidas'); ?></label>

			<br /><input type="checkbox" name="previsualizar" id="previsualizar" value="si" />
			&nbsp;&nbsp;<label for="previsualizar"><?php echo $PFN_conf->t('amosar_previsualizacions'); ?></label>

			<br /><br />

			<input type="reset" value=" <?php echo $PFN_conf->t('cancelar'); ?> " class="boton" id="btn_reset" onclick="enlace('navega.php?<?php echo PFN_get_url(false); ?>');" />
			<input type="submit" value=" <?php echo $PFN_conf->t('aceptar'); ?> " class="boton" id="btn_submit" style="margin-left: 40px;" />
			</fieldset>
			</form>
			<?php } else { ?>
			<?php echo $PFN_conf->t('estado.redimensionar_dir',0); ?>
			<?php } ?>
		</div>

		<div id="resultado_ajax"><br class="nada" /></div>
	</div>
</div>
