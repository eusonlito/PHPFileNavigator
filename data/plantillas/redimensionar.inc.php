<?php
/****************************************************************************
* data/plantillas/redimensionar.inc.php
*
* plantilla para la visualización de la acción de recortar una imagen
*

PHPfileNavigator versión 2.2.0

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
	<div style="text-align: center;">
		<form action="navega.php?<?php echo PFN_get_url(false); ?>" method="post" onsubmit="return submitonce();">
		<fieldset>
		<input type="submit" name="cancelar" value=" <?php echo $PFN_conf->t('cancelar'); ?> " class="boton" />

		<br /><br />

		<div class="bloque_info" style="text-align: left;"><h1><?php echo $PFN_conf->t('accion').' &raquo; '.$PFN_conf->t('recortar'); ?></h1></div>
		<div class="aviso_info"><?php echo $PFN_conf->t('como_recortar'); ?></div>

		<script type="text/javascript"><!--

		var spacer = '<?php echo $PFN_conf->g('estilo'); ?>imx/semitrans.png';

		//--></script>

		<script type="text/javascript" src="js/wz_dragdrop.js"></script>

		<br />

		<div id="theCrop"></div>
		<img src="crea_imaxe.php?cal=<?php echo $ucal; ?>&amp;dir=<?php echo $dir; ?>&amp;<?php echo session_name().'='.session_id(); ?>" width="<?php echo $datos[0]; ?>" height="<?php echo $datos[1]; ?>" alt="<?php echo $cal; ?>" id="theImage" />

		<br /><br />
		<input type="submit" value="<?php echo $PFN_conf->t('aceptar'); ?>" class="boton" id="submit" onclick="return my_Submit('recortar');" />
		<br /><br />

		<div class="aviso_info"><?php echo $PFN_conf->t('escoller_reducida'); ?></div>
		<br />
		<a href="#"><img src="crea_imaxe.php?cal=<?php echo $ucal; ?>&amp;dir=<?php echo $dir; ?>&amp;ancho=<?php echo $PFN_conf->g('imaxes','ancho'); ?>&amp;alto=<?php echo $PFN_conf->g('imaxes','alto'); ?>&amp;<?php echo session_name().'='.session_id(); ?>" alt="<?php echo $PFN_vars->get('cal'); ?>" onclick="my_Submit('reducir');" /></a>

		<br /><br />

		<input type="submit" name="cancelar2" value=" <?php echo $PFN_conf->t('cancelar'); ?> " class="boton" />
		</fieldset>
		</form>
		<?php if ($hai_pequena) { ?>
		<br />

		<div class="aviso_info"><?php echo $PFN_conf->t('eliminar_reducida'); ?></div>
		<br />

		<form action="accion.php?<?php echo PFN_cambia_url(array('cal','accion'),array($cal,'redimensionar'),false); ?>" method="post" onsubmit="return submitonce();">
			<input type="hidden" name="eliminar_peq" value="true" />
			<input type="submit" value="<?php echo $PFN_conf->t('eliminar'); ?>" class="boton" />
		</form>
		<?php } ?>
		<br /><br />
	</div>

<script type="text/javascript"><!--

<?php if ($datos[0] > 750) { ?>
document.write('<style type="text/css">');
document.write("\n#corpo, #pe, #pe_texto { width: <?php echo $datos[0]+10; ?>px; }");
document.write('</style>');
<?php } ?>

SET_DHTML("theCrop"+MAXOFFLEFT+0+MAXOFFRIGHT+<?php echo $datos[0]; ?>+MAXOFFTOP+0+MAXOFFBOTTOM+<?php echo $datos[1]; ?>+SCALABLE+MAXWIDTH+<?php echo $datos[0]; ?>+MAXHEIGHT+<?php echo $datos[1]; ?>+MINHEIGHT+50+MINWIDTH+50,"theImage"+NO_DRAG);

dd.elements.theCrop.moveTo(dd.elements.theImage.x, dd.elements.theImage.y);
dd.elements.theCrop.setZ(dd.elements.theImage.z+1);
dd.elements.theImage.addChild('theCrop');
dd.elements.theCrop.defx = dd.elements.theImage.x;

function my_DragFunc () {
	dd.elements.theCrop.maxoffr = dd.elements.theImage.w - dd.elements.theCrop.w;
	dd.elements.theCrop.maxoffb = dd.elements.theImage.h - dd.elements.theCrop.h;
	dd.elements.theCrop.maxw = <?php echo $datos[0]; ?>;
	dd.elements.theCrop.maxh = <?php echo $datos[1]; ?>;
}

function my_ResizeFunc () {
	dd.elements.theCrop.maxw = (dd.elements.theImage.w + dd.elements.theImage.x) - dd.elements.theCrop.x;
	dd.elements.theCrop.maxh = (dd.elements.theImage.h + dd.elements.theImage.y) - dd.elements.theCrop.y;
}

function my_Submit (modo) {
	destino = 'accion.php?modo='+modo+'&accion=redimensionar&executa=true' +
		'&cal=<?php echo $ucal; ?>' +
		'&dir=<?php echo urlencode($dir); ?>&ver_imaxes=<?php echo $PFN_vars->get('ver_imaxes'); ?>' +
		'&<?php echo session_name().'='.session_id(); ?>' +
		'<?php
			for ($i = 0, $cnt = 0; $i < $PFN_conf->g('inc','limite'); $i++) {
				if ($PFN_vars->get("mais_$i") != '') {
					echo "&mais_$cnt=".urlencode($PFN_vars->get("mais_$i"));
					$cnt++;
				}
			}
		?>';

	if (modo == "recortar") {
		destino = destino + '&posX=' + (dd.elements.theCrop.x - dd.elements.theImage.x) +
		'&posY=' + (dd.elements.theCrop.y - dd.elements.theImage.y) +
		'&ancho=' + (dd.elements.theCrop.w) +
		'&alto=' + (dd.elements.theCrop.h);
	}

	return enlace(destino);
}
	
dd.elements.theCrop.scalable = 1;
dd.elements.theCrop.resizable = 0;

//--></script>
