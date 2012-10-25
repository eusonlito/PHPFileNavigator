<?php
/****************************************************************************
* instalar/plantillas/pe.inc.php
*
* plantilla para la visualización del pie de página del instalador
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
	</div>
	<br class="nada" />
</div>
<!--

Tempos de execucion:

<?php echo $PFN_tempo->dump(); ?>

//-->
<div id="pe_i">
	<div id="pe_texto"><a href="http://pfn.sourceforge.net/" onclick="window.open(this.href, '_blank'); return false"><?php echo $PFN_conf->t('PFN').'</a> - '.$PFN_conf->t('tempo_execucion').': '.$PFN_tempo->total().' '.$PFN_conf->t('segundos'); ?></div>
</div>
</body>
</html>
