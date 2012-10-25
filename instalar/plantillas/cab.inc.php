<?php
/****************************************************************************
* instalar/plantillas/cab.inc.php
*
* Plantilla madre para la instalacion
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $PFN_conf->g('idioma'); ?>">
<head>
<title><?php echo $PFN_conf->t('PFN'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $basicas['charset']; ?>" />
<meta name="keywords" content="<?php echo $PFN_conf->t('PFN'); ?>" />
<meta name="description" content="PHPfileNavigator: Administrador de ficheros y directorios via web." />
<meta name="author" content="Lito, phpfilenavigator@litoweb.net" />
<meta name="version" content="<?php echo $PFN_version; ?>" />
<link rel="SHORTCUT ICON" href="<?php echo $relativo; ?>favicon.ico" />
<link rel="stylesheet" href="<?php echo $relativo.$PFN_conf->g('estilo'); ?>estilos.css" type="text/css" />
<link rel="stylesheet" href="instalar.css" type="text/css" />
<script type="text/javascript" src="<?php echo $relativo; ?>js/scripts.js"></script>
</head>
<body>
<div id="corpo">
	<h1 id="logo_i"><img src="imx/logo.png" alt="PHPfileNavigator Logo" /></h1>

	<div id="menu_esquerda">
		<ul>
			<li<?php echo ($paso > 0)?' class="menu_marcado"':''; ?>>1. <span><?php echo $PFN_conf->t('i:presentacion'); ?></span></li>
			<li<?php echo ($paso > 1)?' class="menu_marcado"':''; ?>>2. <span><?php echo $PFN_conf->t('i:directorios'); ?></span></li>
			<li<?php echo ($paso > 2)?' class="menu_marcado"':''; ?>>3. <span><?php echo $PFN_conf->t('i:comprobacion'); ?></span></li>
			<?php if (empty($form['tipo']) || ($form['tipo'] == 'instalar')) { ?>
			<li<?php echo ($paso > 3)?' class="menu_marcado"':''; ?>>4. <span><?php echo $PFN_conf->t('i:datos'); ?></span></li>
			<?php } else { ?>
			<li class="tachado">4. <span><?php echo $PFN_conf->t('i:datos'); ?></span></li>
			<?php } ?>
			<li<?php echo ($paso > 4)?' class="menu_marcado"':''; ?>>5. <span><?php echo $PFN_conf->t('i:instalar'); ?></span></li>
			<li<?php echo ($paso > 5)?' class="menu_marcado"':''; ?>>6. <span><?php echo $PFN_conf->t('i:remate'); ?></span></li>
		</ul>
	</div>

	<div id="contido">
