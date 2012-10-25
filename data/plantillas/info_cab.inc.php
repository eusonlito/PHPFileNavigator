<?php
/****************************************************************************
* data/plantillas/info_cab.inc.php
*
* plantilla de cabecera para la información detallada de ficheros y directorios
*

PHPfileNavigator versión 2.3.3

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
	<ul id="accions_info">
		<?php if ($PFN_conf->g('permisos','info')) { ?>
		<li class="info"><a href="accion.php?<?php echo PFN_cambia_url(array('dir','cal','accion'),array($dir,$cal,'info'),false); ?>"<?php echo (($accion == 'info')?' class="active"':''); ?> title="<?php echo $PFN_conf->t('info'); ?>"><span class="oculto"><?php echo $PFN_conf->t('info'); ?></span></a></li>
		<?php } if ($redimensionar_dir) { ?>
		<li class="redimensionar"><a href="accion.php?<?php echo PFN_cambia_url(array('dir','cal','accion'),array($dir,$cal,'redimensionar_dir'),false); ?>"<?php echo (($accion == 'redimensionar_dir')?' class="active"':''); ?> title="<?php echo $PFN_conf->t('redimensionar'); ?>"><span class="oculto"><?php echo $PFN_conf->t('redimensionar'); ?></span></a></li>
		<?php } if ($cal != '.' && $cal != './' && !empty($cal)) { ?>
		<?php if ($PFN_conf->g('permisos','copiar')) { ?>
		<li class="copiar"><a href="accion.php?<?php echo PFN_cambia_url(array('dir','cal','accion'),array($dir,$cal,'copiar'),false); ?>"<?php echo (($accion == 'copiar')?' class="active"':''); ?> title="<?php echo $PFN_conf->t('copiar'); ?>"><span class="oculto"><?php echo $PFN_conf->t('copiar'); ?></span></a></li>
		<?php } if ($PFN_conf->g('permisos','mover')) { ?>
		<li class="mover"><a href="accion.php?<?php echo PFN_cambia_url(array('dir','cal','accion'),array($dir,$cal,'mover'),false); ?>"<?php echo (($accion == 'mover')?' class="active"':''); ?> title="<?php echo $PFN_conf->t('mover'); ?>"><span class="oculto"><?php echo $PFN_conf->t('mover'); ?></span></a></li>
		<?php } if ($PFN_conf->g('permisos','renomear')) { ?>
		<li class="renomear"><a href="accion.php?<?php echo PFN_cambia_url(array('dir','cal','accion'),array($dir,$cal,'renomear'),false); ?>"<?php echo (($accion == 'renomear')?' class="active"':''); ?> title="<?php echo $PFN_conf->t('renomear'); ?>"><span class="oculto"><?php echo $PFN_conf->t('renomear'); ?></span></a></li>
		<?php } if ($PFN_conf->g('permisos','eliminar')) { ?>
		<li class="eliminar"><a href="accion.php?<?php echo PFN_cambia_url(array('dir','cal','accion'),array($dir,$cal,'eliminar'),false); ?>"<?php echo (($accion == 'eliminar')?' class="active"':''); ?> title="<?php echo $PFN_conf->t('eliminar'); ?>"><span class="oculto"><?php echo $PFN_conf->t('eliminar'); ?></span></a></li>
		<?php } if ($PFN_conf->g('permisos','permisos')) { ?>
		<li class="permisos"><a href="accion.php?<?php echo PFN_cambia_url(array('dir','cal','accion'),array($dir,$cal,'permisos'),false); ?>"<?php echo (($accion == 'permisos')?' class="active"':''); ?> title="<?php echo $PFN_conf->t('permisos'); ?>"><span class="oculto"><?php echo $PFN_conf->t('permisos'); ?></span></a></li>
		<?php } if ($redimensionar) { ?>
		<li class="redimensionar"><a href="accion.php?<?php echo PFN_cambia_url(array('dir','cal','accion'),array($dir,$cal,'redimensionar'),false); ?>"<?php echo (($accion == 'redimensionar')?' class="active"':''); ?> title="<?php echo $PFN_conf->t('redimensionar'); ?>"><span class="oculto"><?php echo $PFN_conf->t('redimensionar'); ?></span></a></li>
		<?php } if ($PFN_extraer) { ?>
		<li class="extraer"><a href="accion.php?<?php echo PFN_cambia_url(array('dir','cal','accion'),array($dir,$cal,'extraer'),false); ?>"<?php echo (($accion == 'extraer')?' class="active"':''); ?> title="<?php echo $PFN_conf->t('extraer'); ?>"><span class="oculto"><?php echo $PFN_conf->t('extraer'); ?></span></a></li>
		<?php } if ($ver_comprimido) { ?>
		<li class="ver_comprimido"><a href="accion.php?<?php echo PFN_cambia_url(array('dir','cal','accion'),array($dir,$cal,'ver_comprimido'),false); ?>"<?php echo (($accion == 'ver_comprimido')?' class="active"':''); ?> title="<?php echo $PFN_conf->t('ver_comprimido'); ?>"><span class="oculto"><?php echo $PFN_conf->t('ver_comprimido'); ?></span></a></li>
		<?php } if ($ver_contido) { ?>
		<li class="ver_contido"><a href="accion.php?<?php echo PFN_cambia_url(array('dir','cal','accion'),array($dir,$cal,'ver_contido'),false); ?>"<?php echo (($accion == 'ver_contido')?' class="active"':''); ?> title="<?php echo $PFN_conf->t('ver_contido'); ?>"><span class="oculto"><?php echo $PFN_conf->t('ver_contido'); ?></span></a></li>
		<?php } if ($editar) { ?>
		<li class="editar"><a href="accion.php?<?php echo PFN_cambia_url(array('dir','cal','accion'),array($dir,$cal,'editar'),false); ?>"<?php echo (($accion == 'editar')?' class="active"':''); ?> title="<?php echo $PFN_conf->t('editar'); ?>"><span class="oculto"><?php echo $PFN_conf->t('editar'); ?></span></a></li>
		<?php } if ($correo) { ?>
		<li class="correo"><a href="accion.php?<?php echo PFN_cambia_url(array('dir','cal','accion'),array($dir,$cal,'correo'),false); ?>"<?php echo (($accion == 'correo')?' class="active"':''); ?> title="<?php echo $PFN_conf->t('enviar_correo'); ?>"><span class="oculto"><?php echo $PFN_conf->t('enviar_correo'); ?></span></a></li>
		<?php } if ($descargar) { ?>
		<li class="descargar"><a href="accion.php?<?php echo PFN_cambia_url(array('dir','cal','accion','modo'),array($dir,$cal,'descargar','descargar'),false); ?>"<?php echo (($accion == 'descargar')?' class="active"':''); ?> title="<?php echo $PFN_conf->t('descargar'); ?>"><span class="oculto"><?php echo $PFN_conf->t('descargar'); ?></span></a></li>
		<?php } if ($PFN_conf->g('permisos','comprimir')) { ?>
		<li class="comprimir"><a href="accion.php?<?php echo PFN_cambia_url(array('dir','cal','accion','zlib'),array($dir,$cal,'descargar',true),false); ?>"<?php echo (($accion == 'descargar') && ($PFN_vars->g('zlib') == true))?' class="active"':''; ?> title="<?php echo $PFN_conf->t('comprimir'); ?>"><span class="oculto"><?php echo $PFN_conf->t('comprimir'); ?></span></a></li>
		<?php } } ?>
	</ul>

	<br class="nada" />

	<div id="detalle_info">
		<div id="arquivo_info">
			<div style="float: left; margin-right: 15px;">
				<?php if ($tipo == 'dir') { ?>
				<img src="<?php echo $PFN_conf->g('estilo'); ?>ico/dir.png" alt="<?php echo $PFN_conf->t('dir'); ?>" />
				<?php } else { ?>
				<img src="<?php echo $PFN_imaxes->sello($dir.'/'.$cal, false, false); ?>" alt="<?php echo $PFN_conf->t('arq'); ?>" />
				<?php } ?>
			</div>
			<?php if ($tipo == 'dir') { ?>
			<a href="navega.php?<?php echo PFN_cambia_url('dir',((($dir.'/'.$cal) == './.')?'.':($dir.'/'.$cal)),false); ?>"><?php echo $cal; ?></a>
			<?php } else { ?>
			<?php echo $cal; ?>
			<?php if ($PFN_conf->g('permisos','descargar')) { ?>
			<br />
			<a href="accion.php?<?php echo PFN_cambia_url(array('dir','cal','accion','modo'),array($dir,$cal,'descargar','descargar'),false); ?>"><?php echo $PFN_conf->t('descargar'); ?></a>
			- <a href="accion.php?<?php echo PFN_cambia_url(array('dir','cal','accion','modo'),array($dir,$cal,'descargar','ver'),false); ?>" onclick="window.open(this.href); return false;"><?php echo $PFN_conf->t('ver'); ?></a>
			<?php if (in_array('enlaces',$PFN_conf->g('info','capas'))) { ?>- <a href="accion.php?<?php echo PFN_cambia_url(array('dir','cal','accion','modo'),array($dir,$cal,'descargar','enlace'),false); ?>" onclick="window.open(this.href); return false;"><?php echo $PFN_conf->t('enlace'); ?></a><?php } ?>
			<?php } ?>
			<?php } ?>
			<br />
			<br class="nada" />
		</div>
