<?php
/****************************************************************************
* xestion/index.php
*
* Carga la pantalla menú de administración de usuarios y raices
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

$relativo = '../';

include ($relativo.'paths.php');
include_once ($PFN_paths['include'].'basicweb.php');
include_once ($PFN_paths['include'].'Xusuarios.php');

session_write_close();

PFN_quita_url_SERVER(array('id_raiz','id_usuario','id_grupo','id_conf','opc','erros','ok','lista_usuarios','lista_raices','lista_grupos'));

$PFN_tempo->rexistra('precarga');

include ($PFN_paths['plantillas'].'cab.inc.php');
include ($PFN_paths['xestion'].'Xopcions.inc.php');

$PFN_tempo->rexistra('precodigo');

$erros = $PFN_vars->get('erros');
$ok = $PFN_vars->get('ok');

$paxinar = 50;

$lista_raices = intval($PFN_vars->get('lista_raices'));
$lista_usuarios = intval($PFN_vars->get('lista_usuarios'));
$lista_grupos = intval($PFN_vars->get('lista_grupos'));

include ($PFN_paths['plantillas'].'Xmenu.inc.php');

$PFN_tempo->rexistra('postcodigo');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
