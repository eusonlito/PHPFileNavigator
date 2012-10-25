<?php
/****************************************************************************
* data/plantillas/novo_arq.inc.php
*
* plantilla para la creación de un fichero
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
<div id="ver_info">
	<div class="bloque_info"><h1><?php echo $PFN_conf->t('accion').' &raquo; '.$PFN_conf->t('novo_arq'); ?></h1></div>
	<div class="bloque_info" style="text-align: center;">
		<?php if ($estado_accion) { ?>
		<div class="aviso"><?php echo $estado_accion; ?></div>
		<?php } ?>

		<form id="form_tamano" action="accion.php?<?php echo PFN_cambia_url(array('accion','cal'),array('novo_arq',$cal),false); ?>" method="post" onsubmit="return cubre_texto2();">
		<fieldset>
		<label for="ancho"><?php echo $PFN_conf->t('tamano'); ?>:</label>
		<input type="text" id="ancho" name="ancho" value="<?php echo $editar_ancho; ?>" style="width: 50px;" />
		&nbsp;x&nbsp;
		<input type="text" id="alto" name="alto" value="<?php echo $editar_alto; ?>" style="width: 50px;" />
		<input type="hidden" id="texto2" name="texto2" value="" />
		&nbsp;&nbsp;
		<input type="submit" name="cambiar_tamano" value="<?php echo $PFN_conf->t('cambiar'); ?>" />
		</fieldset>
		</form>
		<form id="form_datos" action="accion.php?<?php echo PFN_cambia_url('accion','novo_arq',false); ?>" method="post" onsubmit="return submitonce();">
		<fieldset>
		<input type="hidden" name="executa" value="true" />
		<input type="hidden" name="cal" value="<?php echo $cal; ?>" />
		<br />
		<textarea id="texto" name="texto" style="width: <?php echo $editar_ancho; ?>px; height: <?php echo $editar_alto; ?>px"><?php echo htmlentities($PFN_vars->post('texto2'), ENT_NOQUOTES, $PFN_conf->g('charset')); ?></textarea>
		<br /><br />
		<table class="tabla_info" summary="">
			<tr>
				<th><label for="nome_arq"><?php echo $PFN_conf->t('nome_arq'); ?></label>:</th>
				<td><input type="text" name="cal" id="nome_arq" value="" class="text" /></td>
			</tr>
			<?php foreach ($PFN_inc->crea_formulario('arq') as $v) { ?>
			<tr>
				<th><?php echo $v['campo']; ?></th>
				<td><?php echo $v['valor']; ?></td>
			</tr>
			<?php } ?>
			<tr>
				<th><label for="sobreescribir"><?php echo $PFN_conf->t('sobreescribir'); ?></label>:</th>
				<td><input type="checkbox" name="sobreescribir" id="sobreescribir" value="true" class="checkbox" /></td>
			</tr>
		</table>
		<p><br />
		<input type="reset" value=" <?php echo $PFN_conf->t('cancelar'); ?> " class="boton" onclick="enlace('navega.php?<?php echo PFN_get_url(false); ?>');" />
		<input type="submit" value=" <?php echo $PFN_conf->t('aceptar'); ?> " class="boton" style="margin-left: 40px;" />
		</p>
		</fieldset>
		</form>
		<script type="text/javascript"><!--

		function cubre_texto2 () {
			document.getElementById('texto2').value = document.getElementById('texto').value;
			return submitonce();
		}

		document.getElementById('texto').focus();

		//--></script>
	</div>
</div>
