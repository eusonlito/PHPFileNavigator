<?php
/*******************************************************************************
* instalar/include/paso_4.inc.php
*
* Cuarto paso de la instalación
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

$erros = array();

$form['db_servidor'] = empty($form['db_servidor'])?'localhost':$form['db_servidor'];
$form['db_prefixo'] = empty($form['db_prefixo'])?'pfn_':$form['db_prefixo'];

$form['ra_path'] = empty($form['ra_path'])?($PFN_vars->server('DOCUMENT_ROOT').'/'):$form['ra_path'];
$form['ra_web'] = empty($form['ra_web'])?'/':$form['ra_web'];
$form['ra_dominio'] = empty($form['ra_dominio'])?$PFN_vars->server('SERVER_NAME'):$form['ra_dominio'];

include ($PFN_paths['instalar'].'plantillas/paso_4.inc.php');
?>
