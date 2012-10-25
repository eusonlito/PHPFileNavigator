<?php
/****************************************************************************
* data/plantillas/posicion.inc.php
*
* plantilla para la visualización de la posición actual en la navegación
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
<div id="utilidades_superior">
	<div id="navegacion">
<?php
echo $PFN_conf->t('estasen').'&nbsp;';

$acum = '';
$partes = explode('/', $dir);

foreach ($partes as $k => $v) {
	if (!empty($v)) {
		$acum .= "$v/";

		if ($v == '.') {
			echo ' <a href="navega.php?'.PFN_cambia_url('dir','.',false).'">'.$PFN_conf->t('comezo').'</a> /';
		} else {
			echo ' <a href="navega.php?'.PFN_cambia_url('dir',substr($acum,0,-1),false).'">'.$v.'</a> /';
		}
	}
}
?>
	</div>
	<?php if (!empty($menu_opc['buscador'])) { ?>
	<script type="text/javascript"><!--

	function envia_busca (obx_form) {
		obx_palabra = obx_form.palabra_buscar.value;

		if (obx_palabra == "" || obx_palabra == "<?php echo $PFN_conf->t('busca'); ?>") {
			return false;
		}

		return true;
	}

	//--></script>
	<div id="buscador">
		<form id="busca_simple" action="<?php echo $menu_opc['buscador']; ?>" method="post" onsubmit="return envia_busca(this);">
		<fieldset>
		<input type="hidden" name="executa" value="true" />
		<input type="hidden" name="campos_buscar[]" value="nome" />
		<input type="hidden" name="donde_buscar" value="2" />
		<input type="text" name="palabra_buscar" id="palabra_buscar" value="<?php echo $PFN_conf->t('busca'); ?>" onfocus="this.value='';" />
		<input type="image" name="submit" src="<?php echo $PFN_conf->g('estilo'); ?>imx/buscar.png" style="border: 0;" />
		</fieldset>
		</form>
	</div>
	<?php } ?>
</div>
<br class="nada" />
