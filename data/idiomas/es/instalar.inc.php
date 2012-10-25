<?php
/****************************************************************************
* data/idiomas/es/instalar.inc.php
*
* Textos para el idioma Spanish
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

return array(
	'benvido' => 'Bienvenido al instalador de PHPfileNavigator',
	'i:presentacion' => 'Presentaci&oacute;n',
	'i:directorios' => 'Permisos de directorios',
	'i:comprobacion' => 'Comprobaci&oacute;n del sistema',
	'i:datos' => 'Datos de configuraci&oacute;n',
	'i:instalar' => 'Instalar',
	'i:remate' => 'Completado',
	'i:intro_presentacion' => '<p>Bienvenido al PHPfileNavigator.</p><br /><p>Este instalador te guiar&aacute; a trav&eacute;s de los pasos necesarios para llevar a cabo una instalaci&oacute;n correcta de la aplicaci&oacute;n.</p><br /><p>Como bien sabes, este es un potente, funcional y seguro administrador de ficheros en linea con una gran cantidad de posibilidades adicionales que puedes consultar en la web oficial <a href="http://pfn.sourceforge.net/">http://pfn.sourceforge.net/</a>.</p>',
	'i:intro_escolle_idioma' => '<p>Primero debes seleccionar el <strong>idioma</strong> en el que deseas realizar la instalaci&oacute;n. En caso de que el idioma que necesitas no se encuentra en este listado, puedes acceder a la secci&oacute;n de descargas en la web oficial para comprobar si existe una traducci&oacute;n. La traducci&oacute;n que te descargues puedes instalarla cuando quieras, no tiene por que ser ahora.</p>',
	'idioma' => 'Idioma',
	'i:intro_tipo_instalacion' => '<p>Ahora esoge el tipo de instalaci&oacute;n que deseas realizar. Si el PHPfileNavigator no ha sido instalado con anterioridad selecciona la opci&oacute;n de <strong>instalar</strong>, en caso contrario selecciona la opci&oacute;n de <strong>actualizar</strong>.</p><br /><p>Ten en cuenta que si seleccionas instalar desde cero y ya existe una instalaci&oacute;n previa, eliminar&aacute; todo el contenido de las tablas MySQL de la instalaci&oacute;n anterior.</p>',
	'tipo_instalacion' => 'Tipo de instalaci&oacute;n',
	'instalar_cero' => 'Instalaci&oacute;n desde cero o reinstalaci&oacute;n de esta versi&oacute;n',
	'i:actualizar' => 'Actualizar deste una versi&oacute;n anterior',
	'i:intro_actualizar' => 'Se va a proceder con la actualizaci&oacute;n de su instalaci&oacute;n actual. Si detecta alg&uacute;n problema en este proceso, por favor deje un mensaje en el foro oficial <a href="http://pfn.sourceforge.net/phpBB2/" onclick="window.open(this.href); return false;">http://pfn.sourceforge.net/phpBB2/</a> para que pueda ser corregido lo antes posible.',
	'continuar_paso_2' => 'Continuar al paso 2 &raquo;',
	'continuar_paso_3' => 'Continuar al paso 3 &raquo;',
	'continuar_paso_4' => 'Continuar al paso 4 &raquo;',
	'continuar_paso_5' => 'Instalar &raquo;',
	'continuar_paso_6' => 'Finalizar &raquo;',
	'voltar_paso_1' => '&laquo; Regresar al paso 1',
	'voltar_paso_2' => '&laquo; Regresar al paso 2',
	'voltar_paso_3' => '&laquo; Regresar al paso 3',
	'i:intro_directorios' => '<p>En este paso se realizar&aacute;n una serie de comprobaciones para verificar que los directorios tienen los permisos correctos.</p><br /><p>Lo ideal para los permisos de los directorios ser&iacute;a que solo el servidor web tenga permisos de lectura, escritura y ejecuci&oacute;n (700 apache:nobody), aunque esto no ser&aacute; posible en un alojamiento compartido por lo que tendr&aacute;s que usar 777.',
	'i:path_ok' => 'El directorio tiene los permisos correctos.',
	'i:path_erro' => 'El directorio no tiene los permisos correctos. El usuario del servidor web debe tener permisos de escritura.',
	'i:arq_ok' => 'El fichero tiene los permisos correctos.',
	'i:arq_erro' => 'El fichero no tiene los permisos correctos. El usuario del servidor web debe tener permisos de escritura.',
	'i:intro_comprobacion' => '<p>En este paso se verifica que el servidor cumple con todos los requisitos necesarios para la instalaci&oacute;n.</p><br /><p>En las comprobaciones se revisa la versi&oacute;n de PHP (> 4.0.6), MySQL (>= 4.0.0), GD, l&iacute;mite de memoria y capacidad para subida de ficheros.</p>',
	'i:instalado_ok' => 'La versi&oacute;n instalada es correcta: ',
	'i:instalado_erro' => 'La versi&oacute;n instalada es inferior a la necesaria para un correcto uso de la aplicaci&oacute;n, por lo que no se puede continuar con la instalaci&oacute;n: ',
	'i:instalado_aviso' => 'La versi&oacute;n instalada es inferior a la necesaria para un perfecto uso de la aplicaci&oacute;n, pero no impide su correcto funcionamiento: ',
	'i:mysql_erro' => 'Esta instalaci&oacute;n de PHP no incluye soporte para MySQL. Debes instalar los m&oacute;dulos necesarios o recompilar el PHP para a&ntilde;adirle el soporte.',
	'i:gd_erro' => 'Esta instalaci&oacute;n de PHP no incluye soporte para las librer&iacute;as gr&aacute;ficas GD. Debes instalar los m&oacute;dulos necesarios o recompilar el PHP para a&ntilde;adirle el soporte.',
	'i:safe_mode_erro' => 'Este servidor est&aacute; configurado como safe_mode = On con lo que tendr&aacute;s problemas a la hora de realizar acciones con ficheros o directorios ya que los permisos no ser&aacute;n los adecuados. Consulta a tu proveedor de hosting para solictar el cambio a safe_mode = Off.',
	'i:safe_mode_ok' => 'La configuraci&oacute;n del servidor es correcta para safe_mode = Off.',
	'i:upload_ok' => 'La configuraci&oacute;n del servidor permite una buena capacidad de subida (m&aacute;s de 10 Megas por fichero): ',
	'i:upload_erro' => 'La configuraci&oacute;n del servidor no permite una una buena capacidad de subida (menos de 10 Megas por fichero): ',
	'i:memory_ok' => 'La configuraci&oacute;n del servidor permite hacer uso de gran cantidad de memoria lo que acelerar&aacute; procesos como la copia reducida de im&aacute;genes o la compresi&oacute;n de ficheros y directorios: ',
	'i:memory_erro' => 'La configuraci&oacute;n del servidor no permite hacer uso de gran cantidad de memoria lo que relentizar&aacute; procesos como la copia reducida de im&aacute;genes o la compresi&oacute;n de ficheros y directorios: ',
	'i:zlib_erro' => 'Esta versi&oacute;n de PHP no dispone de soporte para Zlib por lo que dar&aacute; errores a la hora de extraer, ver contenido o comprimir ficheros. Para evitar estos errores desactiva la extracci&oacute;n, compresi&oacute;n y visualizaci&oacute;n de ficheros comprimidos.',
	'i:intro_datos' => '<p>Esta es la &uacute;ltima pantalla antes de realizar la instalaci&oacute;n.</p><br /><p><strong>Todos los campos son obligatorios.</strong></p><br /><p>Si tienes dudas sobre como debes cubrir alg&uacute;n campo, pulsa el <a href="#">(?)</a> que se encuentra a su izquierda.</p>',
	'i:axuda' => array(
		'charset' => 'Normalmente cada idioma tiene su propio juego de caracteres para visualizar correctamente todos los s&iacute;mbolos y letras en pantalla. Lo correcto es que coincida con el servidor web y con el sistema.',
		'db_servidor' => 'El servidor en el que est&aacute; instalado el MySQL. Casi siempre <strong>localhost</strong>',
		'db_nome' => 'El nombre de la base de datos en donde ser&aacute; instalado. <strong>Debe existir en el momento de la instalaci&oacute;n.</strong>',
		'db_usuario' => 'El usuario mediante el cual se acceder&aacute; a la base de datos. Debe tener permisos de creaci&oacute;n, modificaci&oacute;n y borrado de tablas en la base de datos escogida.',
		'db_contrasinal' => 'Contrase&ntilde;a de acceso del usuario a la base de datos escogida.',
		'db_rep_contrasinal' => 'Repetir la contrase&ntilde;a anterior.',
		'db_prefixo' => 'Prefijo para las tablas. As&iacute; evitar&aacute;s que se pueda sobreescribir otras ya existentes con el mismo nombre.',
		'ad_nome' => 'Nombre com&uacute;n del usuario administrador. <strong>No ser&aacute; el usuario de acceso</strong>.',
		'ad_usuario' => 'Usuario con el que acceder&aacute; a la aplicaci&oacute;n.',
		'ad_contrasinal' => 'Contrase&ntilde;a de acceso del usuario administrador al PHPfileNavigator.',
		'ad_rep_contrasinal' => 'Repetir la contrase&ntilde;a anterior.',
		'ad_correo' => 'Correo electr&oacute;nico del administrador. A este correo llegar&aacute;n las alertas de seguridad por intentos de instrusi&oacute;n o problemas de acceso.',
		'ra_nome' => 'Nombre gen&eacute;rico para esta ra&iacute;z. Sirve para identificarla en listado de ra&iacute;ces y en caso de que tengas acceso a m&aacute;s de una. <strong>p.e.: Ra&iacute;z Principal</strong> o <strong>Directorio de documentos</strong>',
		'ra_path' => 'La ruta del directorio que se va a gestionar. Debe ser la absoluta desde la ra&iacute;z del servidor. Despu&eacute;s podr&aacute;s crear m&aacute;s raices de acceso.<br /><br />Recuerda que debes usar / en vez de la barra invertida tanto en sistemas Linux/Unix como en Windows que esta ruta debe acabar con una /.<br /><br />No se recomienda poner como ruta el propio directorio de instalaci&oacute;n del PHPfileNavigator ni nig&uacute;n subdirectorio suyo. <strong>p.e.: /var/www/html/docs/</strong> o <strong>c:/phpdev/www/docs/</strong>',
		'ra_web' => 'La ruta de acceso por web desde la ra&iacute;z del dominio al directorio que se va a administrar.<br /><br />Por ejemplo, si voy a administrar un directorio llamado docs y en ese directorio existe un documento como logo.png. Si yo quiero acceder a ese documento por web, escribir&iacute;a http://www.midominio.com/docs/logo.png, entonces la ra&iacute;z web ser&iacute;a <strong>/docs/</strong>.',
		'ra_dominio' => 'Nombre del dominio que se va a gestionar. Sin http. <strong>p.e.: www.midominio.com</strong>',
		'raices_atopadas' => 'Se encontraron las siguientes ra&iacute;ces que ser&aacute;n configuradas.',
		'aviso' => '<p>Esta aplicaci&oacute;n est&aacute; en continuo desarrollo. Si habilitas la casilla de <strong>Aviso de instalaci&oacute;n</strong> se enviar&aacute; al desarrollador del PHPfileNavigator un correo de aviso de nueva instalaci&oacute;n o actualizaci&oacute;n en el que se remitir&aacute; &uacute;nicamente el correo electr&oacute;nico del administrador y el host en el que fue instalado.</p><br /><p><strong>No se enviar&aacute; ning&uacute;n tipo de informaci&oacute;n personal</strong> como rutas, datos de usuario o contrase&ntilde;as. Esto te permitir&aacute; estar informado de las nuevas versiones o avisos de seguridad.</p><br /><p>No se enviar&aacute; en ning&uacute;n caso correo no deseado ni informaci&oacute;n que no sea importante.</p><br /><p>Puedes revisar el c&oacute;digo de env&iacute;o del correo en el fichero instalar/include/paso_5.inc.php entre las l&iacute;neas 45 y 63.</p>',
	),
	'i:aviso' => 'Aviso de instalaci&oacute;n',
	'i:charset' => 'Juego de caracteres',
	'i:base_datos' => 'Base de datos',
	'i:db_servidor' => 'Servidor',
	'i:db_nome' => 'Base de datos',
	'i:db_usuario' => 'Usuario',
	'i:db_contrasinal' => 'Contrase&ntilde;a',
	'i:db_prefixo' => 'Prefijo',
	'i:administrador' => 'Usuario administrador',
	'i:ad_nome' => 'Nombre Com&uacute;n',
	'i:ad_usuario' => 'Usuario',
	'i:ad_contrasinal' => 'Contrase&ntilde;a',
	'i:ad_rep_contrasinal' => 'Repetir contrase&ntilde;a',
	'i:ad_correo' => 'Email',
	'i:raiz' => 'Ra&iacute;z principal',
	'i:ra_nome' => 'Nombre',
	'i:ra_path' => 'Ruta absoluta',
	'i:ra_web' => 'Ruta web',
	'i:ra_dominio' => 'Dominio',
	'i:erros' => array(
		1 => 'Debes seleccionar un Juego de caract&eacute;res correcto.',
		2 => 'Debes cubrir el campo de Servidor para la Base de datos.',
		3 => 'Debes cubrir el Nombre de la Base de datos a usar.',
		4 => 'Debes cubrir el campo de Usuario de acceso a la Base de datos.',
		5 => 'Debes cubrir el campo de Nombre Com&uacute;n para el Usuario administrador.',
		6 => 'Debes cubrir el campo de Usuario para Usuario administrador.',
		7 => 'Debes asignarle una contrase&ntilde;a al Usuario administrador.',
		8 => 'Los campos de Contrase&ntilde;a y Repetir contrase&ntilde;a deben ser iguales.',
		9 => 'El Usuario administrador debe disponer de un correo electr&oacute;nico.',
		10 => 'La Ra&iacute;z principal debe de disponer de nombre.',
		11 => 'La Ra&iacute;z principar debe de disponer de una Ruta absoluta.',
		12 => 'La Ra&iacute;z principar debe de disponer de una Ruta web.',
		13 => 'La Ra&iacute;z principar debe de disponer de un dominio de localizaci&oacute;n.',
		14 => 'El directorio de Ruta absoluta en Ra&iacute;z principal no existe.',
		15 => 'El usuario indicado para Base de datos no tiene permiso de acceso.',
		16 => 'No se ha podido usar la base de datos seleccionada.',
		17 => 'La siguiente consulta ha dado un error: ',
		18 => 'No existe el fichero de configuraci&oacute;n que indica que existe una versi&oacute;n ya instalada.<br />Pruebe con una instalaci&oacute;n completa en vez de una actualizaci&oacute;n.',
	),	
	'i:intro_instalar' => 'En esta pantalla ver&aacute;s reflejadas las acciones que se realizaron para la instalaci&oacute;n del PHPfileNavigator.',
	'i:conexion_mysql' => 'Conexi&oacute;n a MySQL',
	'i:mysql_ok' => 'La conexi&oacute;n al servidor MySQL y la selecci&oacute;n de la base de datos ha sido correcta.',
	'i:consultas_mysql' => 'Instalaci&oacute;n de tablas',
	'i:consultas_ok' => 'Todas las tablas han sido creadas con &eacute;xito y los datos inicializados correctamente.',
	'i:consultas_erro' => 'Ha ocurrido un error cuando se ejecutaba la actualizaci&oacute;n de la base de datos. Revisa la lista de errores y por favor contacta con el desarrollador del PHPfileNavigator para comunicarlo.',
	'i:creacion_directorios' => 'Creaci&oacute;n de directorios',
	'i:crear_directorios_ok' => 'Todos los directorios necesarios fueron creados correctamente.<br /><br />Si esta es una actualizaci&oacute;n desde una versión anterior, puede ser que necesite eliminar ciertas carpetas. Las carpetas que debes eliminar son <strong>tmp/, <strong>data/logs/</strong> y <strong>data/info/</strong> pero solo si est&aacute;n fuera de la carpeta <strong>data/servidor/</strong>.',
	'i:arq_configuracion' => 'Fichero de configuraci&oacute;n',
	'i:arq_configuracion_ok' => 'El fichero de configuraci&oacute;n ha sido generado correctamente. Puede ver su contenido en data/conf/basicas.inc.php',
	'i:arq_inc' => 'Ficheros de informaci&oacute;n adicional',
	'i:arq_inc_ok' => 'Los ficheros usados para almacenar los datos de informaci&oacute;n adicional como el t&iacute;tulo y descrici&oacute;n has sido movidos para un directorio propio del PHPfileNavigator con lo que se limpian y mantienen intactas las ra&iacute;ces existentes sin alterar su contenido con ficheros adicionales. Tambi&eacute;n se han movido las im&aacute;genes en miniatura.',
	'i:intro_remate' => '<p>Enhorabuena, el PHPfileNavigator ha sido instalado con &eacute;xito.</p><br /><p>Para comenzar a usar la aplicaci&oacute;n <strong>debes eliminar o renombrar el directorio "instalar"</strong> o volver&aacute;s a ver la pantalla de instalaci&oacute;n. Despu&eacute;s de eso vuelve a escribir la URL de t&uacute; instalaci&oacute;n de PHPfileNavigator.</p><br /><p>Para cualquier duda o sugerencia, puedes acceder al foro oficial en <a href="http://pfn.sourceforge.net/phpBB2/" onclick="window.open(this.href); return false;">http://pfn.sourceforge.net/phpBB2/</a>, e intentar&eacute; responderte lo antes posible.</p><br /><p>Recuerda que este es una aplicaci&oacute;n gratuita y de libre distribuci&oacute;n y modificaci&oacute;n (GPL). Si deseas que este proyecto dure por tiempo ilimitado y se continue con la correcci&oacute;n de errores, nuevas funcionalidades y soporte en los foros, puedes colaborar con una donaci&oacute;n que ayudar&aacute; a sostener todo el trabajo realizado y por realizar.</p><br /><p>Las donaciones se pueden realizar a trav&eacute;s de PayPal en los siguientes botones:</p>',
	'i:doar' => 'Donar',
	'i:doar_paypal' => 'Donar con PayPal',
	'i:doar_tarxeta' => 'Donar con tarjeta de cr&eacute;dito/d&eacute;bito',
	'i:recargar' => 'Recargar',
	'i:tit_bloqueo_instalacion' => 'Instalaci&oacute;n bloqueada',
	'i:txt_bloqueo_instalacion' => '<p>Esta instalaci&oacute;n ha sido bloqueada para evitar que dos personas al mismo tiempo puedan ejecutar el instalador.</p><br /><p>Si t&uacute; eres el administrador y por lo tanto la persona que realmente realizar&aacute; la instalaci&oacute;n, debes borrar el fichero de bloqueo que se encuentra en <strong>tmp/instalar.lock</strong> para las versiones anteriores a 2.3.0 del PHPfileNavigator y en <strong>data/servidor/tmp/instalar.lock</strong> para las versiones iguales o posteriores.</p><br /><p>Una vez que hayas borrado ese fichero debes ser r&aacute;pido en actualizar la p&aacute;gina y volver a acceder al instalador, para as&iacute; obtener los permisos necesarios para continuar.</p><br /><p>Ante cualquier duda o incidencia en este proceso o en el uso de PHPfileNavigator puedes visitar la p&aacute;gina oficial <a href="http://pfn.sourceforge.net/">http://pfn.sourceforge.net/</a> y en los foros podr&aacute;s encontrar soluciones a tus problemas.</p><br /><strong>Lito</strong>.',
	'i:actualizar_200-201' => 'Actualizar a versi&oacute;n 2.0.1',
	'i:actualizar_201-220' => 'Actualizar a versi&oacute;n 2.2.0',
	'i:actualizar_220-230' => 'Actualizar a versi&oacute;n 2.3.0',
	'i:consulta' => 'Consulta',
	'i:erro' => 'Error',
	'i:reintentar' => 'Volver a intentarlo',
	'i:omitir' => 'Mi configuraci&oacute;n es correcta, quiero omitir esta comprobaci&oacute;n.<br />El PHPfileNavigator no funionar&aacute; correctamente si no se cumplen estos requisitos.',
	'admins' => 'Administradores',
	'i:aviso_default' => '<strong>AVISO:</strong> En el directorio data/conf/ existe un fichero llamado default-example.inc.php que debe ser renombrado a default.inc.php antes de continuar con la instalaci&oacute;n.<br /><br />Si ya existe una instalaci&oacute;n previa, comprueba las diferencias entre los dos ficheros y a&ntilde;ade aquellas l&iacute;neas que no existan en la instalaci&oacute;n anterior.',
);
?>
