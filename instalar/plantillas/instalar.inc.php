<?php
/*******************************************************************************
* instalar/plantillas/instalar.inc.php
*
* Plantilla para el quinto paso de la instalación
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
<h2><?php echo $PFN_conf->t('i:instalar'); ?></h2>

<br /><?php echo $PFN_conf->t('i:intro_instalar'); ?><br /><br />

<form action="index.php" method="post">
<fieldset>
<input type="hidden" name="paso" value="6" />

<div class="capa_ok">
	<strong><?php echo $PFN_conf->t('i:conexion_mysql'); ?></strong><br />
	<?php echo $PFN_conf->t('i:mysql_ok'); ?>
</div>

<div class="capa_ok">
	<strong><?php echo $PFN_conf->t('i:consultas_mysql'); ?></strong><br />
	<?php echo $PFN_conf->t('i:consultas_ok'); ?>
</div>

<div class="capa_ok">
	<strong><?php echo $PFN_conf->t('i:creacion_directorios'); ?></strong><br />
	<?php echo $PFN_conf->t('i:crear_directorios_ok'); ?>
</div>

<div class="capa_ok">
	<strong><?php echo $PFN_conf->t('i:arq_configuracion'); ?></strong><br />
	<?php echo $PFN_conf->t('i:arq_configuracion_ok'); ?>
</div>

<br />

<input type="submit" value="<?php echo $PFN_conf->t('continuar_paso_6'); ?>" class="dereita" />
</fieldset>
</form>
