<?php
/*******************************************************************************
* instalar/idiomas/idiomas.inc.php
*
* Devuelve un array con los idiomas disponibles
*

PHPfileNavigator versión 1.6.3

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

$idiomas = array();

is_dir($PFN_paths['idiomas'].'gl')?($idiomas['gl'] = 'Galego'):false;
is_dir($PFN_paths['idiomas'].'es')?($idiomas['es'] = 'Castellano'):false;
is_dir($PFN_paths['idiomas'].'en')?($idiomas['en'] = 'English'):false;
is_dir($PFN_paths['idiomas'].'it')?($idiomas['it'] = 'Italiano'):false;
is_dir($PFN_paths['idiomas'].'nl')?($idiomas['nl'] = 'Dutch'):false;
is_dir($PFN_paths['idiomas'].'fr')?($idiomas['fr'] = 'Français'):false;
is_dir($PFN_paths['idiomas'].'de')?($idiomas['de'] = 'Deutsch'):false;

return $idiomas;
?>
