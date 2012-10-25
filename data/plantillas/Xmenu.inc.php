<?php
/****************************************************************************
* data/plantillas/Xmenu.inc.php
*
* plantilla para la visualización de la pantalla inicial de administración
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

defined('OK') && defined('XESTION') or die();
?>
<div id="ver_info">
	<div class="bloque_info"><h1><?php echo $PFN_conf->t('xestion').' &raquo; '.$PFN_conf->t('Xmenu_principal'); ?></h1></div>
	<div class="bloque_info">

<?php if (strlen($erros) || ($ok > 0)) { ?>
	<div class="aviso">
	<?php
	if (strlen($erros)) {
		foreach (explode(',', $erros) as $v) {
			echo $PFN_conf->t('Xerros', intval($v)).'<br />';
		}
	} else {
		echo $PFN_conf->t('Xok', intval($ok));
	}
	?>
	</div>
<?php } ?>

		<ul id="XLIopcions">
			<li id="XLIopcion1"><a href="#" id="Xenlace1" onclick="Xcambia_opcion(1);" onkeypress="Xcambia_opcion(1);"><?php echo $PFN_conf->t('Xraices'); ?></a></li>
			<li id="XLIopcion2"><a href="#" id="Xenlace2" onclick="Xcambia_opcion(2);" onkeypress="Xcambia_opcion(2);"><?php echo $PFN_conf->t('Xusuarios'); ?></a></li>
			<li id="XLIopcion3"><a href="#" id="Xenlace3" onclick="Xcambia_opcion(3);" onkeypress="Xcambia_opcion(3);"><?php echo $PFN_conf->t('Xgrupos'); ?></a></li>
			<li id="XLIopcion4"><a href="#" id="Xenlace4" onclick="Xcambia_opcion(4);" onkeypress="Xcambia_opcion(4);"><?php echo $PFN_conf->t('Xconfiguracions'); ?></a></li>
		</ul>

		<div id="XidOpcion1" class="XCapaOpcion"> 
			<form action="gdar.php?<?php echo PFN_get_url(false); ?>" method="post" onsubmit="return submitonce();">
			<fieldset>
			<input type="hidden" name="accion" value="raices" />
			<input type="hidden" name="opc" value="1" />

			<br /><div class="con_borde">
				<select name="lista_raices1" id="lista_raices1" onchange="enlace('<?php echo PFN_get_url(); ?>&amp;opc=1&amp;lista_raices='+this.value);">
					<?php
					$PFN_usuarios->init('raices_total');

					$total = $PFN_usuarios->get('total');

					for ($i = 0; $i < $total; $i += $paxinar) {
						$selected = ($i == $lista_raices)?'selected="selected"':'';
						$fin = (($i + $paxinar) >= $total)?$total:($i + $paxinar);
					?>
					<option value="<?php echo $i; ?>" <?php echo $selected; ?>><?php echo ($i + 1).' - '.$fin; ?></option>
					<?php } ?>
				</select>
			</div>

			<table class="Xmenu" summary="">
				<tr>
					<th><?php echo $PFN_conf->t('Xnome'); ?></th>
					<th><?php echo $PFN_conf->t('Xpath'); ?></th>
					<th class="centro"><?php echo $PFN_conf->t('Xestado'); ?></th>
				</tr>
				<?php
				$PFN_usuarios->init('raices_pax', $lista_raices, $paxinar);

				for ($i = 0; $PFN_usuarios->mais(); $PFN_usuarios->seguinte(), $i++) {
					$on = (($i % 2) == 0)?'1':'0';
					$id = $PFN_usuarios->get('id');
				?>
				<tr class="trarq<?php echo $on; ?>">
					<td>
						<input type="hidden" name="antes[<?php echo $id; ?>]" value="<?php echo $PFN_usuarios->get('estado'); ?>" />
						<a href="raices/index.php?<?php echo PFN_cambia_url('id_raiz',$id,false); ?>"><?php echo $PFN_usuarios->get('nome'); ?></a>
					</td>
					<td><?php echo $PFN_usuarios->get('path'); ?></td>
					<td class="centro">
						<select id="estado_1_<?php echo $id; ?>" name="estado[<?php echo $id; ?>]">
							<option value="1" <?php echo $PFN_usuarios->get('estado')==1?'selected="selected"':''; ?>>ON</option>
							<option value="0" <?php echo $PFN_usuarios->get('estado')==0?'selected="selected"':''; ?>>OFF</option>
						</select>
					</td>
				</tr>
				<?php } ?>
				<tr>
					<td colspan="2">&nbsp;</td>
					<td class="centro"><br /><input type="submit" value="<?php echo $PFN_conf->t('Xcambiar'); ?>" class="boton" /></td>
				</tr>
			</table>

			<br /><div class="con_borde">
				<select name="lista_raices2" id="lista_raices2" onchange="enlace('<?php echo PFN_get_url(); ?>&amp;opc=1&amp;lista_raices='+this.value);">
					<?php
					for ($i = 0; $i < $total; $i += $paxinar) {
						$selected = ($i == $lista_raices)?'selected="selected"':'';
						$fin = (($i + $paxinar) >= $total)?$total:($i + $paxinar);
					?>
					<option value="<?php echo $i; ?>" <?php echo $selected; ?>><?php echo ($i + 1).' - '.$fin; ?></option>
					<?php } ?>
				</select>
			</div><br />

			</fieldset>
			</form>
		</div>

		<div id="XidOpcion2" class="XCapaOpcion"> 
			<form action="gdar.php?<?php echo PFN_get_url(false); ?>" method="post" onsubmit="return submitonce();">
			<fieldset>
			<input type="hidden" name="accion" value="usuarios" />
			<input type="hidden" name="opc" value="2" />

			<br /><div class="con_borde">
				<select name="lista_usuarios1" id="lista_usuarios1" onchange="enlace('<?php echo PFN_get_url(); ?>&amp;opc=2&amp;lista_usuarios='+this.value);">
					<?php
					$PFN_usuarios->init('usuarios_total');

					$total = $PFN_usuarios->get('total');

					for ($i = 0; $i < $total; $i += $paxinar) {
						$selected = ($i == $lista_usuarios)?'selected="selected"':'';
						$fin = (($i + $paxinar) >= $total)?$total:($i + $paxinar);
					?>
					<option value="<?php echo $i; ?>" <?php echo $selected; ?>><?php echo ($i + 1).' - '.$fin; ?></option>
					<?php } ?>
				</select>
			</div>

			<table class="Xmenu" summary="">
				<tr>
					<th><?php echo $PFN_conf->t('usuario'); ?></th>
					<th><?php echo $PFN_conf->t('Xnome'); ?></th>
					<th><?php echo $PFN_conf->t('correo'); ?></th>
					<th class="centro"><?php echo $PFN_conf->t('Xestado'); ?></th>
				</tr>
				<?php
				$PFN_usuarios->init('usuarios_pax', $lista_usuarios, $paxinar);

				for ($i = 0; $PFN_usuarios->mais(); $PFN_usuarios->seguinte(), $i++) {
					$on = (($i % 2) == 0)?'1':'0';
					$id = $PFN_usuarios->get('id');
				?>
				<tr class="trarq<?php echo $on; ?>">
					<td>
						<input type="hidden" name="antes[<?php echo $id; ?>]" value="<?php echo $PFN_usuarios->get('estado'); ?>" />
						<a href="usuarios/index.php?<?php echo PFN_cambia_url('id_usuario',$id,false); ?>"><?php echo $PFN_usuarios->get('usuario'); ?></a>
					</td>
					<td><?php echo $PFN_usuarios->get('nome'); ?></td>
					<td><?php echo $PFN_usuarios->get('email'); ?></td>
					<td class="centro">
						<select id="estado_2_<?php echo $id; ?>" name="estado[<?php echo $id; ?>]">
							<option value="1" <?php echo $PFN_usuarios->get('estado')==1?'selected="selected"':''; ?>>ON</option>
							<option value="0" <?php echo $PFN_usuarios->get('estado')==0?'selected="selected"':''; ?>>OFF</option>
						</select>
					</td>
				</tr>
				<?php } ?>
				<tr>
					<td colspan="3">&nbsp;</td>
					<td class="centro"><br /><input type="submit" value="<?php echo $PFN_conf->t('Xcambiar'); ?>" class="boton" /></td>
				</tr>
			</table>

			<div class="con_borde">
				<select name="lista_usuarios2" id="lista_usuarios2" onchange="enlace('<?php echo PFN_get_url(); ?>&amp;opc=2&amp;lista_usuarios='+this.value);">
					<?php
					for ($i = 0; $i < $total; $i += $paxinar) {
						$selected = ($i == $lista_usuarios)?'selected="selected"':'';
						$fin = (($i + $paxinar) >= $total)?$total:($i + $paxinar);
					?>
					<option value="<?php echo $i; ?>" <?php echo $selected; ?>><?php echo ($i + 1).' - '.$fin; ?></option>
					<?php } ?>
				</select>
			</div><br />

			</fieldset>
			</form>
		</div>

		<div id="XidOpcion3" class="XCapaOpcion"> 
			<form action="gdar.php?<?php echo PFN_get_url(false); ?>" method="post" onsubmit="return submitonce();">
			<fieldset>
			<input type="hidden" name="accion" value="grupos" />
			<input type="hidden" name="opc" value="3" />

			<br /><div class="con_borde">
				<select name="lista_grupos1" id="lista_grupos1" onchange="enlace('<?php echo PFN_get_url(); ?>&amp;opc=3&amp;lista_grupos='+this.value);">
					<?php
					$PFN_usuarios->init('grupos_total');

					$total = $PFN_usuarios->get('total');

					for ($i = 0; $i < $total; $i += $paxinar) {
						$selected = ($i == $lista_grupos)?'selected="selected"':'';
						$fin = (($i + $paxinar) >= $total)?$total:($i + $paxinar);
					?>
					<option value="<?php echo $i; ?>" <?php echo $selected; ?>><?php echo ($i + 1).' - '.$fin; ?></option>
					<?php } ?>
				</select>
			</div>

			<table class="Xmenu" summary="">
				<tr>
					<th><?php echo $PFN_conf->t('Xnome'); ?></th>
					<th class="centro"><?php echo $PFN_conf->t('Xestado'); ?></th>
				</tr>
				<?php
				$PFN_usuarios->init('grupos_pax', $lista_grupos, $paxinar);

				for ($i = 0; $PFN_usuarios->mais(); $PFN_usuarios->seguinte(), $i++) {
					$on = (($i % 2) == 0)?'1':'0';
					$id = $PFN_usuarios->get('id');
				?>
				<tr class="trarq<?php echo $on; ?>">
					<td>
						<input type="hidden" name="antes[<?php echo $id; ?>]" value="<?php echo $PFN_usuarios->get('estado'); ?>" />
						<a href="grupos/index.php?<?php echo PFN_cambia_url('id_grupo',$id,false); ?>"><?php echo $PFN_usuarios->get('nome'); ?></a>
					</td>
					<td class="centro">
						<select id="estado_3_<?php echo $id; ?>" name="estado[<?php echo $id; ?>]">
							<option value="1" <?php echo $PFN_usuarios->get('estado')==1?'selected="selected"':''; ?>>ON</option>
							<option value="0" <?php echo $PFN_usuarios->get('estado')==0?'selected="selected"':''; ?>>OFF</option>
						</select>
					</td>
				</tr>
				<?php } ?>
				<tr>
					<td>&nbsp;</td>
					<td class="centro"><br /><input type="submit" value="<?php echo $PFN_conf->t('Xcambiar'); ?>" class="boton" /></td>
				</tr>
			</table>

			<div class="con_borde">
				<select name="lista_grupos2" id="lista_grupos2" onchange="enlace('<?php echo PFN_get_url(); ?>&amp;opc=3&amp;lista_grupos='+this.value);">
					<?php
					for ($i = 0; $i < $total; $i += $paxinar) {
						$selected = ($i == $lista_grupos)?'selected="selected"':'';
						$fin = (($i + $paxinar) >= $total)?$total:($i + $paxinar);
					?>
					<option value="<?php echo $i; ?>" <?php echo $selected; ?>><?php echo ($i + 1).' - '.$fin; ?></option>
					<?php } ?>
				</select>
			</div><br />

			</fieldset>
			</form>
		</div>

		<div id="XidOpcion4" class="XCapaOpcion"> 
			<table class="Xmenu" summary="">
				<tr>
					<th><?php echo $PFN_conf->t('Xconf'); ?></th>
					<th><?php echo $PFN_conf->t('Xdetalle'); ?></th>
					<th><?php echo $PFN_conf->t('editar'); ?></th>
				</tr>
				<?php
				$PFN_usuarios->init('configuracions');

				for ($i = 0; $PFN_usuarios->mais(); $PFN_usuarios->seguinte(), $i++) {
					$on = (($i % 2) == 0)?'1':'0';
				?>
				<tr class="trarq<?php echo $on; ?>">
					<td>
						<a href="configuracions/index.php?<?php echo PFN_cambia_url('id_conf', $PFN_usuarios->get('id'), false); ?>"><?php echo $PFN_usuarios->get('conf'); ?></a>
					</td>
					<td>
						<a href="configuracions/ver.php?<?php echo PFN_cambia_url('id_conf', $PFN_usuarios->get('id'), false); ?>"><?php echo $PFN_conf->t('Xdetalle'); ?></a>
					</td>
					<td>
						<?php if (is_writable($PFN_paths['conf'].$PFN_usuarios->get('conf').'.inc.php')) { ?>
						<a href="configuracions/modi.php?<?php echo PFN_cambia_url('id_conf', $PFN_usuarios->get('id'), false); ?>"><?php echo $PFN_conf->t('editar'); ?></a>
						<?php } else { ?>
						&nbsp;
						<?php } ?>
					</td>
				</tr>
				<?php } ?>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript"><!--

Xcambia_opcion(<?php echo intval($PFN_vars->get('opc'))?intval($PFN_vars->get('opc')):1; ?>);

//--></script>
