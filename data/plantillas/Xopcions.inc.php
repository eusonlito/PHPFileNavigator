<?php
/****************************************************************************
* data/plantillas/Xopcions.inc.php
*
* plantilla para la visualización del menú superior de opciones en la
* zona de administrador
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

defined('OK') && defined('XESTION') or die();
?>
<div id="menu_principal">
	<div id="escolle_ancho"><a href="#" onclick="return marca_ancho_corpo(true);" title="<?php echo $PFN_conf->t('maximizar_corpo'); ?>"><img src="<?php echo $relativo.$PFN_conf->g('estilo'); ?>imx/ancho_corpo.png" alt="<?php echo $PFN_conf->t('maximizar_corpo'); ?>" /></a></div>

	<h1 id="logo"><a href="<?php echo $relativo; ?>navega.php?<?php echo PFN_quita_url('dir',false); ?>"><span>&nbsp;</span><?php echo $PFN_conf->t('PFN'); ?></a></h1>

	<ul id="menu1">
		<li class="admin"><a href="<?php echo $Xopcions['m_comezo']; ?>"><?php echo $PFN_conf->t('comezo'); ?></a></li>
		<li><a href="<?php echo $Xopcions['m_admin']; ?>"><?php echo $PFN_conf->t('zona_admin'); ?></a></li>
		<li><a href="<?php echo $Xopcions['m_sair']; ?>"><?php echo $PFN_conf->t('sair'); ?></a></li>
	</ul>

	<br class="nada" />

	<ul id="menu2">
		<li><a href="<?php echo $Xopcions['Xm_crear_raiz']; ?>" onmouseover="amosa('menu_txt_crear_raiz');" onmouseout="oculta('menu_txt_crear_raiz');"><img src="<?php echo $relativo.$PFN_conf->g('estilo'); ?>imx/crear_raiz.png" alt="<?php echo $PFN_conf->t('Xm_crear_raiz'); ?>" /></a></li>
		<li><a href="<?php echo $Xopcions['Xm_crear_usuario']; ?>" onmouseover="amosa('menu_txt_crear_usuario');" onmouseout="oculta('menu_txt_crear_usuario');"><img src="<?php echo $relativo.$PFN_conf->g('estilo'); ?>imx/crear_usuario.png" alt="<?php echo $PFN_conf->t('Xm_crear_usuario'); ?>" /></a></li>
		<li><a href="<?php echo $Xopcions['Xm_crear_grupo']; ?>" onmouseover="amosa('menu_txt_crear_grupo');" onmouseout="oculta('menu_txt_crear_grupo');"><img src="<?php echo $relativo.$PFN_conf->g('estilo'); ?>imx/crear_grupo.png" alt="<?php echo $PFN_conf->t('Xm_crear_grupo'); ?>" /></a></li>
		<li><a href="<?php echo $Xopcions['Xm_informes']; ?>" onmouseover="amosa('menu_txt_informes');" onmouseout="oculta('menu_txt_informes');"><img src="<?php echo $relativo.$PFN_conf->g('estilo'); ?>imx/informes.png" alt="<?php echo $PFN_conf->t('Xm_informes'); ?>" /></a></li>
		<li><a href="<?php echo $Xopcions['Xm_varios']; ?>" onmouseover="amosa('menu_txt_varios');" onmouseout="oculta('menu_txt_varios');"><img src="<?php echo $relativo.$PFN_conf->g('estilo'); ?>imx/varios.png" alt="<?php echo $PFN_conf->t('Xm_varios'); ?>" /></a></li>
		<li><a href="<?php echo $Xopcions['Xm_traduccion']; ?>" onmouseover="amosa('menu_txt_traduccion');" onmouseout="oculta('menu_txt_traduccion');"><img src="<?php echo $relativo.$PFN_conf->g('estilo'); ?>imx/traduccion.png" alt="<?php echo $PFN_conf->t('Xm_traduccion'); ?>" /></a></li>
		<li><a href="<?php echo $Xopcions['Xm_doazon']; ?>" onmouseover="amosa('menu_txt_doazon');" onmouseout="oculta('menu_txt_doazon');"><img src="<?php echo $relativo.$PFN_conf->g('estilo'); ?>imx/doazon.png" alt="<?php echo $PFN_conf->t('Xm_doazon'); ?>" /></a></li>
		<li id="menu_texto">
			<span id="menu_txt_crear_raiz" style="display: none;"><?php echo $PFN_conf->t('Xm_crear_raiz'); ?></span>
			<span id="menu_txt_crear_usuario" style="display: none;"><?php echo $PFN_conf->t('Xm_crear_usuario'); ?></span>
			<span id="menu_txt_crear_grupo" style="display: none;"><?php echo $PFN_conf->t('Xm_crear_grupo'); ?></span>
			<span id="menu_txt_informes" style="display: none;"><?php echo $PFN_conf->t('Xm_informes'); ?></span>
			<span id="menu_txt_varios" style="display: none;"><?php echo $PFN_conf->t('Xm_varios'); ?></span>
			<span id="menu_txt_traduccion" style="display: none;"><?php echo $PFN_conf->t('Xm_traduccion'); ?></span>
			<span id="menu_txt_doazon" style="display: none;"><?php echo $PFN_conf->t('Xm_doazon'); ?></span>
		</li>
	</ul>
</div>

<br class="nada" />
