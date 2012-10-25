<?php
/****************************************************************************
* data/plantillas/buscador_resultados.inc.php
*
* plantilla para la visualización de los resultados de una búsqueda
*

PHPfileNavigator versión 2.3.2

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
<table id="listado" summary="">
	<tr class="trcab">
		<th><?php echo $PFN_conf->t('nome'); ?></th>
		<?php if ($PFN_conf->g('columnas','tamano')) { ?>
		<th><?php echo $PFN_conf->t('tamano'); ?></th>
		<?php } if ($PFN_conf->g('columnas','data')) { ?>
		<th><?php echo $PFN_conf->t('data'); ?></th>
		<?php } if ($PFN_conf->g('columnas','accions')) { ?>
		<th><?php echo $PFN_conf->t('accions'); ?></th>
		<?php } ?>
	</tr>
	<tr class="trinfo">
		<td class="tdnome" colspan="5"><?php echo $PFN_conf->t('rexistros_atopados').": ".count($resultados); ?></td>
	</tr>
	<?php
	foreach ((array)$resultados as $k => $v) {
		$ext = '';
		$on = (($k % 2) == 0)?'1':'0';
		$tipo = preg_match('/\/$/',$v['arquivo'])?'dir':'arq';
		$v['directorio'] = substr($v['directorio'], 0, -1);
		$cada = $PFN_conf->g('raiz','path').$PFN_accions->path_correcto($v['directorio'])
			.'/'.$v['arquivo'];

		$cal = ($tipo == 'dir')?substr($v['arquivo'],0,-1):$v['arquivo'];

		$PFN_inc->carga_datos($cada);
	?>
	<tr class="tr<?php echo $tipo.$on; ?>">
		<td class="tdnome">
			<?php if ($tipo == 'dir') { ?>
			<img src="<?php echo $PFN_imaxes->icono('dir'); ?>" alt="<?php echo $PFN_conf->t('directorio'); ?>" />
			<?php } else { ?>
				<?php if ($ver_imaxes == true) { ?>
				<img src="<?php echo $PFN_imaxes->sello($v['directorio'].'/'.$v['arquivo'],true); ?>" alt="<?php echo $cal; ?>" />
				<?php
				} else {
					if (strstr($v['arquivo'], '.')) {
						$partes = explode('.', $v['arquivo']);
						$ext = array_pop($partes);
					}
				?>
				<img src="<?php echo $PFN_imaxes->icono($v['arquivo']); ?>" alt="<?php echo $cal; ?>" />
				<?php } ?>
			<?php } ?>
			<?php
			$acum = '';
			$partes = explode('/',$v['directorio']);
			$cnt = count($partes);

			foreach ($partes as $p) {
				if (!empty($p)) {
					$acum .= "$p/";
					echo ' <a href="navega.php?'.PFN_cambia_url("dir",substr($acum,0,-1),false).'">'.$p.'</a> /';
				}
			}
			?>
			<?php if ($tipo == 'dir') { ?>
			<a href="navega.php?<?php echo PFN_cambia_url('dir',$acum.$cal, false); ?>"><?php echo $cal; ?></a> /
			<?php } else { ?>
			<a href="accion.php?<?php echo PFN_cambia_url(array('dir','cal','accion'),array($acum,$cal,'descargar'),false); ?>" onclick="window.open(this.href); return false;"><?php echo $cal; ?></a>
			<?php } ?>
			<?php
			foreach ((array)$PFN_vars->post('campos_buscar') as $v2) {
				if (in_array($v2, $PFN_conf->g('inc','campos_indexar'))) {
					echo '<br /><strong>'.$PFN_conf->t($v2).'</strong>: ';
					$dato = $PFN_inc->valor($v2);

					foreach ((array)explode(' ',$PFN_vars->post('palabra_buscar')) as $v3) {
						$v3 = str_replace('/', '\\/', $v3);
						$dato = preg_replace('/'.$v3.'/i', "<strong>$v3</strong>", $dato);
					}

					echo $dato;
				}
			}
			?>
		</td>
		<?php if ($PFN_conf->g('columnas','tamano')) { ?>
		<td><?php echo ($tipo == 'dir')?'-':PFN_peso(PFN_espacio_disco($cada)); ?></td>
		<?php } if ($PFN_conf->g('columnas','data')) { ?>
		<td style="white-space: nowrap;"><?php echo date($PFN_conf->g('data'), @filemtime($cada)); ?></td>
		<?php } if ($PFN_conf->g('columnas','accions')) { ?>
		<td>
			<ul class="accions">
				<?php if ($PFN_conf->g('permisos','info')) { ?>
				<li class="info"><a href="accion.php?<?php echo PFN_cambia_url(array('dir','cal','accion'),array($acum,$cal,'info'),false); ?>" title="<?php echo $PFN_conf->t('info'); ?>"><span class="oculto"><?php echo $PFN_conf->t('info'); ?></span></a></li>
				<?php } if ($PFN_conf->g('permisos','copiar')) { ?>
				<li class="copiar"><a href="accion.php?<?php echo PFN_cambia_url(array('dir','cal','accion'),array($acum,$cal,'copiar'),false); ?>" title="<?php echo $PFN_conf->t('copiar'); ?>"><span class="oculto"><?php echo $PFN_conf->t('copiar'); ?></span></a></li>
				<?php } if ($PFN_conf->g('permisos','mover')) { ?>
				<li class="mover"><a href="accion.php?<?php echo PFN_cambia_url(array('dir','cal','accion'),array($acum,$cal,'mover'),false); ?>" title="<?php echo $PFN_conf->t('mover'); ?>"><span class="oculto"><?php echo $PFN_conf->t('mover'); ?></span></a></li>
				<?php } if ($PFN_conf->g('permisos','renomear')) { ?>
				<li class="renomear"><a href="accion.php?<?php echo PFN_cambia_url(array('dir','cal','accion'),array($acum,$cal,'renomear'),false); ?>" title="<?php echo $PFN_conf->t('renomear'); ?>"><span class="oculto"><?php echo $PFN_conf->t('renomear'); ?></span></a></li>
				<?php } if ($PFN_conf->g('permisos','eliminar')) { ?>
				<li class="eliminar"><a href="accion.php?<?php echo PFN_cambia_url(array('dir','cal','accion'),array($acum,$cal,'eliminar'),false); ?>" title="<?php echo $PFN_conf->t('eliminar'); ?>"><span class="oculto"><?php echo $PFN_conf->t('eliminar'); ?></span></a></li>
				<?php } if ($PFN_conf->g('permisos','permisos')) { ?>
				<li class="permisos"><a href="accion.php?<?php echo PFN_cambia_url(array('dir','cal','accion'),array($acum,$cal,'permisos'),false); ?>" title="<?php echo $PFN_conf->t('permisos'); ?>"><span class="oculto"><?php echo $PFN_conf->t('permisos'); ?></span></a></li>
				<?php } ?>
			</ul>
		</td>
		<?php } ?>
	</tr>
	<?php } ?>
</table>
