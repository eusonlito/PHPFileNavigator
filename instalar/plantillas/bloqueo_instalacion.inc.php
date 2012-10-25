<?php
/*******************************************************************************
* instalar/plantillas/bloqueo_instalacion.inc.php
*
* Plantilla que enseña la pantalla de bloqueo en caso de que otra persona
* acceda al PHPfileNavigator en el momento de la instalación
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
<h2><?php echo $PFN_conf->t('i:tit_bloqueo_instalacion'); ?></h2>

<br /><?php echo $PFN_conf->t('i:txt_bloqueo_instalacion'); ?>
