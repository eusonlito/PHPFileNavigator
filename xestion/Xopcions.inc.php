<?php
/****************************************************************************
* data/xestion/Xopcions.inc.php
*
* Carga lo necesario para la visualización del menú superior de opciones en la
* administración
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

$quita_url = PFN_quita_url(array('id_raiz','id_usuario','id_grupo','id_conf'),false);

$Xopcions = array(
	'm_comezo' => $relativo.'navega.php?'.PFN_cambia_url('dir','./',false),
	'm_admin' => $relativo.'xestion/index.php?'.session_name().'='.session_id(),
	'm_actualizar' => PFN_get_url(),
	'Xm_crear_raiz' => $relativo.'xestion/raices/index.php?'.$quita_url,
	'Xm_crear_usuario' => $relativo.'xestion/usuarios/index.php?'.$quita_url,
	'Xm_crear_grupo' => $relativo.'xestion/grupos/index.php?'.$quita_url,
	'Xm_varios' => $relativo.'xestion/varios/index.php?'.$quita_url,
	'Xm_informes' => $relativo.'xestion/informes/index.php?'.$quita_url,
	'Xm_traduccion' => $relativo.'xestion/traduccion/index.php?'.$quita_url,
	'Xm_doazon' => $relativo.'xestion/doazon.php?'.$quita_url,
	'm_sair' => $relativo.'sair.php?'.$quita_url,
);

include ($PFN_paths['plantillas'].'Xopcions.inc.php');
?>
