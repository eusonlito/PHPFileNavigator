<?php
/****************************************************************************
* data/plantillas/cab.inc.php
*
* plantilla para la visualización de la cabecera
*

PHPfileNavigator versión 2.1.0

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
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $PFN_conf->g('charset'); ?>" />
<meta name="keywords" content="<?php echo $PFN_conf->t('PFN'); ?>" />
<meta name="description" content="PHPfileNavigator: Administrador de ficheros y directorios via web." />
<meta name="author" content="Lito, phpfilenavigator@litoweb.net" />
<meta name="version" content="<?php echo $PFN_version; ?>" />
<link rel="SHORTCUT ICON" href="<?php echo $relativo; ?>favicon.ico" />
<link rel="stylesheet" href="<?php echo $relativo.$PFN_conf->g('estilo'); ?>estilos.css" type="text/css" />
<?php if (strstr($PFN_vars->server('PHP_SELF'), 'xestion')) { ?>
<link rel="stylesheet" href="<?php echo $relativo.$PFN_conf->g('estilo'); ?>xestion.css" type="text/css" />
<?php } ?>
<script type="text/javascript" src="<?php echo $relativo; ?>js/scripts.js"></script>
<script type="text/javascript" src="<?php echo $relativo; ?>js/html_decoder.js"></script>
<script type="text/javascript"><!--

imaxes = new Array();
imaxes[1] = imaxes[2] = imaxes[3] = imaxes[4] = imaxes[5] = imaxes[6] = new Image();
imaxes[7] = imaxes[8] = imaxes[9] = new Image();

imaxes[1].src = "<?php echo $relativo.$PFN_conf->g('estilo'); ?>imx/fondo.png";
imaxes[2].src = "<?php echo $relativo.$PFN_conf->g('estilo'); ?>imx/info.png";
imaxes[3].src = "<?php echo $relativo.$PFN_conf->g('estilo'); ?>imx/copiar.png";
imaxes[4].src = "<?php echo $relativo.$PFN_conf->g('estilo'); ?>imx/mover.png";
imaxes[5].src = "<?php echo $relativo.$PFN_conf->g('estilo'); ?>imx/eliminar.png";
imaxes[6].src = "<?php echo $relativo.$PFN_conf->g('estilo'); ?>imx/renomear.png";
imaxes[7].src = "<?php echo $relativo.$PFN_conf->g('estilo'); ?>imx/permisos.png";
imaxes[8].src = "<?php echo $relativo.$PFN_conf->g('estilo'); ?>imx/descargar.png";
imaxes[9].src = "<?php echo $relativo.$PFN_conf->g('estilo'); ?>imx/comprimir.png";

marca_ancho_corpo();

//--></script>
</head>
<body>
<div id="corpo"><br class="nada" />
