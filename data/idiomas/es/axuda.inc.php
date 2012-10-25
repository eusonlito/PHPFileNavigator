<?php
/****************************************************************************
* data/idiomas/es/axuda.inc.php
*
* Textos para el idioma Castellano
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

defined('OK') or die();

return array(
	'h1_quero_facer' => 'Qu&eacute; quiero hacer?',
	'tit_crear_dir' => 'Crear un directorio',
	'txt_crear_dir' => 'Para crear un directorio tienes que clicar en primer lugar en la opci&oacute;n de <strong><img src="%simx/crear_dir.png" alt="Crear Directorio" /> Crear Directorio</strong>.<br />Una vez hecho esto, debes cubrir los campos requeridos, a&uacute;nque obligatorio solo es el nombre.',
	'tit_subir_arq' => 'Subir un fichero',
	'txt_subir_arq' => 'Para subir un fichero tienes que clicar en primer lugar en la opci&oacute;n supeior de <strong><img src="%simx/subir_arq.png" alt="Subir Fichero" /> Subir Fichero</strong>.<br />Una vez hecho esto, debes cubrir los campos requeridos, a&uacute;nque obligatorio solo es la seleccion del propio fichero a subir.<br /><br />Si lo que estamos a subir es unha imagen, nos da dos opciones para crear una copia en miniatura de la imagen en el campo de <strong>Imagen reducida</strong>, en caso contrario hacemos caso omiso de esta opci&oacute;n.',
	'tit_subir_url' => 'Coger un documento de outra web',
	'txt_subir_url' => 'Para subir un documento ya existente en otra web, tienes que clicar en primer lugar en la opci&oacute;n de <strong><img src="%simx/subir_url.png" alt="Subir URL" /> Subir URL</strong>.<br />Una vez hecho esto nos pedir&aacute; que escribamos la <strong>Direcci&oacute;n URL</strong> que deseamos almacenar, ten en cuenta que debe ser una direcci&oacute;n completa, por ejemplo mejor <i>http://phpfilenavigator.litoweb.net/index.php</i> que <i>http://phpfilenavigator.litoweb.net</i>, ya que puede fallar en este &uacute;ltimo caso, despu&eacute;s de la Direcci&oacute;n URL nos pide <strong>Nombre del fichero a crear</strong> en donde debemos poner un nombre que nos permita identificarlo claramente m&aacute;s adelante, como <i>Web del PHPfileNavigator</i>.',
	'tit_miniaturas' => 'Ver la im&aacute;genes en peque&ntilde;o en el listado de ficheros',
	'txt_miniaturas' => 'Solo tienes que clicar en la opci&oacute;n superior de <strong><img src="%simx/ver_imaxes.png" alt="Ver Im&aacute;genes" /> Miniaturas</strong> para poder ver las im&aacute;genes en miniatura cuando navegas por los listados de ficheros.',
	'tit_arbore' => 'Ver todos los ficheros y directorios en una sola p&aacute;gina',
	'txt_arbore' => 'Para poder ver todo el contenido de una ra&iacute;z de una sola vez, debes clicar en la opci&oacute;n superior de <strong><img src="%simx/arbore.png" alt="&Aacute;rbol" /> &Aacute;rbol de Directorios</strong>, con lo que se ense&ntilde;ar&aacute; todos los directorios de la ra&iacute;z. Si adem&aacute;s deseas ver los ficheros de cada directorio, solo tienes que clicar en la opci&oacute;n de la derecha <strong>[&Aacute;rbol Completo]</strong> con lo que se listar&aacute; el contenido &iacute;ntegro de la ra&iacute;z en la que te encuentras.',
	'tit_buscar' => 'Buscar un fichero o un texto en sus metas',
	'txt_buscar' => 'Tienes dos opciones para buscar un fichero, la primera es mediante la opci&oacute;n del men&uacute; superior de <strong>Buscador</strong> y la segunda, m&aacute;s r&aacute;pida, escribiendo parte del nombre en el campo de <strong>Busca:</strong> y clicando despu&eacute;s en la lupa.<br /><br />En esta pantalla del formulario de b&uacute;squeda solo tienes que escribir el texto perteneciente al fichero o directorio que deseas encontrar, escoger en donde lo deseas buscar (en este directorio o en toda la ra&iacute;z), en los campos en donde deseas buscar el texto y pulsar el bot&oacute;n de <strong>Aceptar</strong>. Entonces ver&aacute;s debajo del formulario todos los resultados encontrados.',
	'tit_accions' => 'Alguna acci&oacute;n con un solo fichero o directorio como copiar, mover, borrar...',
	'txt_accions' => 'Puedes realizar la acci&oacute;n que desees con un fichero o directorio desde la columna de <strong>Acciones</strong> que se encuentra al final de cada l&iacute;nea listada por fichero o directorio.<br />Esta columna te permite, en caso de estar habilitada, las acciones de <strong>Ver informaci&oacute;n</strong>, <strong>Copiar</strong>, <strong>Mover</strong>, <strong>Renombrar</strong>, <strong>Eliminar</strong>, <strong>Cambiar permisos</strong> o <strong>Descargar</strong>.',
	'tit_accions_multiple' => 'Alguna acci&oacute;n con muchos ficheros o directorios a la vez',
	'txt_accions_multiple' => 'Si dispones de los permisos necesarios, podr&aacute;s realizar na serie de acciones con m&uacute;ltiples ficheros y directorios al mismo tiempo. Las acciones que se pueden realizar son <strong>Copiar</strong>, <strong>Mover</strong>, <strong>Eliminar</strong>, <strong>Cambiar permisos</strong> y <strong>Descargar</strong>. Para esto solo necesitas marcar los campos de chequeo "<input type="checkbox" class="checkbox" />" de la primera columna y despu&eacute;s escoger una acci&oacute;n de las que aparecen en el pi&eacute; del listado.',
	'h1_accions' => 'Qu&eacute; acciones puedo realizar sobre cada fichero o directorio listado?',
	'txt_info' => '<strong>Ver Informaci&oacute;n: </strong>Esta opci&oacute;n permite conocer datos de detalle como el tama&ntilde;o, fecha de creaci&oacute;n, permisos o datos referentes a informaci&oacute;n adicional como t&iacute;tulo y descripci&oacute;n, adem&aacute;s de un formulario para poder modificar estos datos.',
	'txt_copiar' => '<strong>Copiar: </strong>Permite realizar la copia de un fichero o directorio en el destino escogido, en caso de ser un directorio, copiar&aacute; todo el contenido en el destino.',
	'txt_mover' => '<strong>Mover: </strong>Permite mover una carpeta o directorio para un destino escogido dentro de la ra&iacute;z actual. El fichero o directorio seleccionado se copiar&aacute; primero para el destino y despu&eacute;s se eliminar&aacute; el original.',
	'txt_renomear' => '<strong>Renombrar: </strong>Permite cambiarle el nombre a un fichero o directorio.',
	'txt_eliminar' => '<strong>Eliminar: </strong>Elimina por completo un fichero o un directorio y todo su contenido.',
	'txt_permisos' => '<strong>Permisos: </strong>Permite el cambio de permisos reales de un fichero o directorio.',
	'txt_descargar' => '<strong>Descargar Fichero: </strong>Fuerza la descarga de un fichero para nuestro ordenador. Todas las descargas realizadas son computadas en ancho de banda usado y tambi&eacute;n el cantidad de veces descargado.',
	'txt_comprimir' => '<strong>Comrpimir: </strong>Comprime un fichero o un directorio y todo su contenido para ser descargado como fichero &uacute;nico ahorrando as&iacute; ancho de banda, debido a que el peso ser&aacute; inferior que en una descarga normal.',
	'txt_redimensionar' => '<strong>Copia Reducida de Imagen: </strong>Permite crear una imagen en peque&ntilde;o a partir de otra. La copia reducida resultante podr&aacute; ser, sen se decida, una copia exacta proporcional pero en peque&ntilde;o de la imagen original o bin se podr&aacute; seleccionar una parte de la imagen original para crear la copia reducida.',
	'txt_extraer' => '<strong>Descomprimir: </strong>Permite descomprir un fichero empaquetado con TAR/GZ/TGZ/GZIP. Extrae todo el contenido reconocido creando una estructura exacta a la original de ficheros y directorios. Puede ser que alg&uacute;n de los ficheros no sea extra&iacute;do por que su nombre no es v&aacute;lido, pero continuar&aacute; con el resto de la lista.',
	'txt_ver_contido' => '<strong>Ver Contenido: </strong>Permite ver el contenido de un fichero de texto editable. En caso de ser un formato de fichero usado para web (como PHP o HTML) colorear&aacute; el c&oacute;digo.',
	'txt_editar' => '<strong>Editar: </strong>Permite modificar el contenido de un fichero de texto.',
	'h1_accions_multiple' => 'Que acciones puedo realizar sobre muchos ficheros o directorios a la vez?',
	'txt_multiple_copiar' => '<strong>Copiar: </strong>Permite la copia de m&uacute;ltiples ficheros y directorios de una sola vez. Continuar&aacute; la copia aunque se produzca un error copiando alguno de ellos y despu&eacute;s informar&aacute; del resultado.',
	'txt_multiple_mover' => '<strong>Mover: </strong>Permite mover m&uacute;ltiples ficheros y directorios de una sola vez. Mover&aacute; los seleccionados aunque se produzca un error moviendo alguno de ellos y despu&eacute;s informar&aacute; del resultado.',
	'txt_multiple_eliminar' => '<strong>Eliminar: </strong>Permite borrar m&uacute;ltiples ficheros y directorios de una sola vez. Continuar&aacute; el proceso aunque se produzca un error borrando alguno de ellos y despu&eacute;s informar&aacute; del resultado.',
	'txt_multiple_permisos' => '<strong>Cambio de Permisos: </strong>Permite cambiar los permisos a m&uacute;ltiples ficheros y directorios de una sola vez. Continuar&aacute; el proceso aunque se produzca un error cambiando alguno de ellos y despu&eacute;s informar&aacute; del resultado.',
	'txt_multiple_comprimir' => '<strong>Descargar empaquetado: </strong>Permite la descarga de todos los ficheros y directorios seleccionados en un solo paquete comprimido para ahorrar ancho de banda. El fichero creado ser&aacute; en formato ZIP.',
	'h1_problemas' => 'C&oacute;mo soluciono este problema?',
	'tit_problema_subir_arq' => 'No puedo subir un fichero o una URL',
	'txt_problema_subir_arq' => 'Si no puedes subir un fichero ni una URL debes revusar en primer lugar que dispones de suficiente espacio en disco para guardarlo. Para comprobar esto, en el pi&eacute; de la p&aacute;gina debe aperecer algo como <strong>Espacio libre: XX MB</strong> que indica el l&iacute;mite de peso para guardar en esta ra&iacute;z. En caso de no aparecer este indicador, omite este aviso.<br /><br />Otra posible causa es que ese directorio no tenga permisos de escritura para el usuario servidor web, en este caso debes ponerte en contacto con el administrador web para indic&aacute;rselo. En cualquier caso, cuando ocurre un error subiendo un fichero o URL, se visualizar&aacute; un aviso con la posible causa.',
	'tit_problema_crear_dir' => 'No puedo crear un directorio',
	'txt_problema_crear_dir' => 'La causa m&aacute;s frecuente para no permitir crear un directorio es que el sitio en donde lo queremos crear no tiene permisos de escritura. Cuando esto ocurre ense&ntilde;ar&aacute; una advertencia con el posible problema. Si este problema no puede ser solventado por el usuario, por favor contacta con el Administrador.',
	'tit_problema_buscador' => 'El buscador no me encuentra lo que busco',
	'txt_problema_buscador' => 'Si el buscador no encuentra el fichero que buscas y que sabes que s&iacute; existe en la ra&iacute;z en la que te encuentras, p&iacute;dele al Administrador que reindexe el contenido de t&uacute; ra&iacute;z para actualizar los datos de relaciones almacenados.',
	'tit_problema_miniaturas' => 'No veo las im&aacute;genes en miniatura',
	'txt_problema_miniaturas' => 'Si cuando pulsas en <strong><img src="%simx/ver_imaxes.png" alt="Ver Im&aacute;genes" /> Miniaturas</strong> en el listado no aparecen las im&aacute;genes en miniatura de otras grandes, esto significa que a&uacute;n no las has creado. Para esto debes clicar en el bot&oacute;n de <strong>Ver Informaci&oacute;n</strong> de la imagen seleccionada y despu&eacute;s pulsamos en <strong>Copia Reducida de la Imagen</strong> en donde podemos crear una copia personalizada o una proporcional reducida.',
	'tit_problema_paxinar' => 'No veo todo el contenido de un directorio',
	'txt_problema_paxinar' => 'Cuando un directorio es muy extenso (m&aacute;s de %s ficheros o directorios) el resultado es paginado. Para poder navegar en las p&aacute;ginas siguientes o anteriores, en el pie del listado tenemos una lista desplegable para poder escoger la p&aacute;gina en la que deseamos situarnos.',
	'tit_problema_sesion' => 'Cuando llevo un cierto tiempo sin realizar ning&uacute;n movimiento en la p&aacute;gina, acaba expuls&aacute;ndome',
	'txt_problema_sesion' => 'Eso es debido a que la duraci&oacute;n de la sesi&oacute;n tiene una caducidad para evitar accesos de otras personas mucho despu&eacute;s de que hayas abandonado tu puesto. Lo normal es que la sesi&oacute;n dure sobre media hora desde la &uacute;ltima p&aacute;gina cargada.',
);
?>
