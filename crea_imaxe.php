<?php
/****************************************************************************
* crea_imaxe.php
*
* Visualizar una imágen según los parámetros recibidos
*

PHPfileNavigator versión 2.0.0

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

include ('paths.php');
include_once ($PFN_paths['include'].'basicweb.php');

session_write_close();

include_once ($PFN_paths['include'].'class_arquivos.php');
include_once ($PFN_paths['include'].'class_imaxes.php');
include_once ($PFN_paths['include'].'class_accions.php');
include_once ($PFN_paths['include']."class_arquivos.php");

$PFN_arquivos = new PFN_Arquivos($PFN_conf);
$PFN_imaxes = new PFN_Imaxes($PFN_conf);
$PFN_accions = new PFN_Accions($PFN_conf);
$PFN_arquivos = new PFN_Arquivos($PFN_conf);

$PFN_imaxes->arquivos($PFN_arquivos);
$PFN_accions->arquivos($PFN_arquivos);

$imaxe = $PFN_conf->g('raiz','path').$PFN_niveles->path_correcto($dir.'/'.$PFN_vars->get('cal'));
$imaxe = ($PFN_vars->get('peq') == 1)?$PFN_imaxes->nome_pequena($imaxe):$imaxe;

$tamano = PFN_espacio_disco($imaxe, true);

if ($PFN_accions->log_ancho_banda($tamano)) {
	echo $PFN_imaxes->volcar_imaxe($imaxe, $PFN_vars->get('ancho'), $PFN_vars->get('alto'));
}

exit;
?>
