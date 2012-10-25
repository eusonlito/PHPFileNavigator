<?php
/****************************************************************************
* data/conf/login.inc.php
*
* Contiene las variables de configuración para el acceso al PHPfileNavigator
*

PHPfileNavigator versión 1.6.4

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

/* Carga la configuracion para acceso */
/* Load default login configuration */
return array(
	// Nombre del campo usuario / User field name
	'login:usuario' => 'login_usuario',

	// Nombre del campo de contraseña / Password field name
	'login:contrasinal' => 'login_contrasinal',

	// Si la contraseña se recibe ya encriptada o si debemos encriptarla antes
	// de realizar la comprobación de login
	// If the password it's encripted or if pfn must crypted after check user
	// true = it's encripted | false = pfn must crypt
	'login:encriptada' => false,

	// Metodo para obtener los datos / Method to obtain data
	// post | get | session | server
	'login:metodo' => 'post'
);
?>
