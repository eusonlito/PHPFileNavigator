<?php
/****************************************************************************
* data/idiomas/es/estado.inc.php
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
	'estado.crear_dir' => array(
		'0' => 'Ha ocurrido un error creando el directorio.',
		'1' => 'El directorio se ha creado correctamente.',
		'2' => 'Ya existe un directorio con ese nombre.',
		'3' => 'El directorio no tiene permisos de escritura.',
		'4' => 'El nombre tiene caracteres no permitidos, escoja otro nombre para el directorio.',
		'5' => 'Ya est&aacute; superado el l&iacute;mite m&aacute;ximo de tama&ntilde;o para esta ra&iacute;z.',
	),
	'estado.subir_arq' => array(
		'0' => 'Ha ocurrido un error subiendo alguno de los ficheros.',
		'1' => 'El fichero hs sido subido correctamente.',
		'2' => 'El nombre tiene caracteres no permitidos, c&aacute;mbiele el nombre a ese fichero.',
		'3' => 'Ya existe un fichero con ese nombre.',
		'4' => 'El directorio destino no tiene permisos de escritura.',
		'5' => 'El fichero excede el peso m&aacute;ximo permitido para esta configuraci&oacute;n.',
		'6' => 'Con este fichero se supera el l&iacute;mite m&aacute;ximo de tama&ntilde;o para esta ra&iacute;z.',
		'7' => 'Con este fichero se supera el l&iacute;mite de ancho de banda permitido para este mes.',
		'8' => 'Se est&aacute;n subiendo los ficheros seleccionados.<br /><br />Si estos ficheros son de gran tama&ntilde;o la espera puede ser prolongada.<br /><br />Por favor, espere...',
	),
	'estado.eliminar_dir' => array(
		'0' => 'No se pudo eliminar el directorio completo o parte de su contenido,<br />compruebe con el administrador los permisos sobre el mismo.',
		'1' => 'Directorio eliminado correctamente.',
		'2' => '¿Est&aacute; seguro de borrar este directorio vac&iacute;o?',
		'3' => 'Este directorio no est&aacute; vac&iacute;o,<br />¿Est&aacute; seguro de borrar este directorio y todo su contenido?',
		'4' => 'No existe el directorio que se intenta eliminar.',
	),
	'estado.eliminar_arq' => array(
		'0' => 'No se pudo borrar el fichero, compruebe los permisos sobre el mismo.',
		'1' => 'Fichero eliminado correctamente.',
		'2' => '¿Est&aacute; seguro de borrar este fichero?',
		'4' => 'No existe el fichero que se intenta eliminar.',
	),
	'estado.renomear' => array(
		'0' => 'No se pudo cambiarle el nombre, compruebe los permisos sobre el mismo.',
		'1' => 'Cambio de nombre realizado correctamente.',
		'2' => 'Ya existe un directorio con ese nombre.',
		'3' => 'Ya existe un fichero con ese nombre.',
		'4' => 'El nuevo nombre contiene alg&uacute;n texto no permitido.',
	),
	'estado.mover_dir' => array(
		'0' => 'No se pudo mover el directorio o parte de su contenido, compruebe los permisos sobre el origen y sobre el destino.',
		'1' => 'Directorio movido correctamente.',
		'2' => 'Este directorio no est&aacute; vac&iacute;o,<br />Selecciona el destino para mover este directorio y todo su contenido',
		'3' => 'Selecciona el destino para este mover directorio vac&iacute;o',
		'4' => 'No existe el directorio de destino.',
		'5' => 'El directorio destino no tiene permisos de escritura.',
		'6' => 'Ya existe un directorio con ese nombre en el destino.',
		'7' => 'No se puede copiar un directorio sobre si mismo.',
	),
	'estado.mover_arq' => array(
		'0' => 'No se pudo mover el fichero, compruebe los permisos sobre el origen y sobre el destino.',
		'1' => 'Fichero movido correctamente',
		'2' => 'Escoge el destino para este fichero.',
		'3' => 'Ya existe un fichero con el mismo nombre en el directorio de destino.',
		'4' => 'No existe el directorio de destino.',
		'5' => 'El directorio destino no tiene permisos de escritura.',
		'6' => 'Se ha podido crear una copia en el destino, pero el original no ha podido ser eliminado.',
	),
	'estado.copiar_dir' => array(
		'0' => 'No se pudo copiar el directorio o parte de su contenido, compruebe los permisos sobre el origen y sobre el destino.',
		'1' => 'Directorio copiado correctamente.',
		'2' => 'Este directorio no est&aacute; vac&iacute;o,<br />Selecciona el destino para copiar este directorio y todo su contenido',
		'3' => 'Selecciona el destino para este copiar directorio vac&iacute;o',
		'4' => 'No existe el directorio de destino.',
		'5' => 'El directorio destino no tiene permisos de escritura.',
		'6' => 'Ya existe un directorio con ese nombre en el destino.',
		'7' => 'No se pode copiar un directorio dentro de si mismo.',
		'8' => 'No se puede copiar este directorio por que se supera el l&iacute;mite para esta ra&iacute;z.',
	),
	'estado.copiar_arq' => array(
		'0' => 'No se pudo copiar el fichero, compruebe los permisos sobre el origen y sobre el destino.',
		'1' => 'Fichero copiado correctamente',
		'2' => 'Selecciona el destino para este fichero.',
		'3' => 'Ya existe un fichero con el mismo nombre en el directorio de destino.',
		'4' => 'No existe el directorio de destino.',
		'5' => 'El directorio destino no tiene permisos de escritura.',
		'6' => 'No se puede copiar este fichero por que supera el l&iacute;mite para esta ra&iacute;z.',
	),
	'estado.enlazar_dir' => array(
		'0' => 'No se pudo enlazar el directorio o parte de su contenido, compruebe los permisos sobre el origen y sobre el destino.',
		'1' => 'Directorio enlazado correctamente.',
		'2' => 'No existe el directorio de destino.',
		'3' => 'El directorio destino no tiene permisos de escritura.',
		'4' => 'Ya existe un directorio con ese nombre en el destino.',
	),
	'estado.enlazar_arq' => array(
		'0' => 'No se pudo enlazar el fichero, compruebe los permisos sobre el origen y sobre el destino.',
		'1' => 'Fichero enlazado correctamente',
		'2' => 'Selecciona el destino para este fichero.',
		'3' => 'Ya existe un fichero con el mismo nombre en el directorio de destino.',
		'4' => 'No existe el directorio de destino.',
		'5' => 'El directorio destino no tiene permisos de escritura.',
	),
	'estado.editar' => array(
		'0' => 'Ha ocurrido un error editando el fichero.',
		'1' => 'El fichero ha sido editado correctamente.',
		'2' => 'El fichero no tiene permisos de escritura.',
		'3' => 'No existe el fichero a editar.',
		'4' => 'No esta permitido editar este fichero.',
	),
	'estado.subir_url' => array(
		'0' => 'Ha ocurrido un error esa URL.',
		'1' => 'La URL pedida ha sido guardada correctamente.',
		'2' => 'Ya existe un fichero con ese nombre.',
		'3' => 'El directorio de destino no tiene permisos de escritura.',
		'4' => 'Tenga en cuenta que el tiempo de espera puede ser muy largo si escoge ficheros de mucho peso.<br />Se recomienda escoger solo documentos de tipo texto como p&aacute;ginas web.',
		'5' => 'Espere mientras se descarga la URL pedida.<br /><br />Tenga en cuenta que se el documento pedido es muy pesado, la espera pode ser muy prolongada.',
		'6' => 'Se ha anulado correctamente la descarga de esa URL.',
		'7' => 'No se puede descargar esta direcci&oacute;n por que supera el l&iacute;mite para esta ra&iacute;z.',
		'8' => 'El nombre escogido para el fichero contiene texto no permitido.',
		'9' => 'Con este fichero se supera el l&iacute;mite de ancho de banda permitido para este mes.',
	),
	'estado.extraer' => array(
		'0' => 'No fue posible extraer ning&uacute;n fichero, puede ser que el fichero comprimido no tenga el formato correcto o que est&eacute; da&ntilde;ado.',
		'1' => 'Todos los ficheros fueron extraidos correctamente.',
		'2' => 'El fichero no tiene una extensi&oacute;n v&aacute;lida (tar, gz, gzip, tgz).',
		'3' => 'Esta aplicaci&oacute;n no soporta extraer ese tipo de fichero.',
		'4' => 'No puede ser extraido, est&aacute; corrupto.',
		'5' => 'Algunos ficheros no fueron extraidos, ya existen.',
		'6' => 'Algunos ficheros non han podido ser abiertos para escritura.',
		'7' => 'No se pudo rematar con la extracci&oacute;n por que el contenido supera el peso m&aacute;ximo permitido para esta ra&iacute;z.',
		'8' => 'Algunos ficheros contienen nombres no permitidos o estaban vac&iacute;os y no fueron extraidos.',
		'9' => 'No se pudo crear algunos de los directorios necesarios para la extracci&oacute;n del contenido.',
	),
	'estado.multiple_copiar' => array(
		'0' => 'No se ha podido copiar el directorio/fichero, compruebe los permisos sobre el origen y sobre el destino:',
		'1' => 'Todos los directorios o ficheros fueron copiados correctamente.',
		'2' => 'Escoge el destino para los directorios o ficheros a copiar.',
		'3' => 'Ya existe un fichero o directorio con el mismo nombre en el destino:',
		'4' => 'No existe el directorio destino para:',
		'5' => 'El directorio destino no tiene permisos de escritura para:',
		'6' => 'No se puede copiar este directorio/fichero por que se supera el l&iacute;mite para esta ra&iacute;z:',
		'7' => 'Alguno de los directorios o ficheros seleccionados no existen o no son legibles:',
		'8' => 'El resto de los directorios y ficheros fueron copiados correctamente.',
		'9' => 'No se puede copiar el directorio dentro de si mismo.',
	),
	'estado.multiple_eliminar' => array(
		'0' => 'No se pudo eliminar el fichero o directorio, compruebe los permisos sobre el mismo:',
		'1' => 'Todos los ficheros o directorios fueron eliminados correctamente.',
		'2' => 'Est&aacute; seguro de eliminar todos estos ficheros o directorios?',
		'3' => 'El resto de los ficheros o directorios fueron eliminados correctamente.',
		'4' => 'No existe el fichero o directorio que intenta eliminar:',
	),
	'estado.multiple_mover' => array(
		'0' => 'No se ha podido mover el directorio/fichero, compruebe los permisos sobre el origen y sobre el destino:',
		'1' => 'Todos los directorios o ficheros fueron movidos correctamente.',
		'2' => 'Escoge el destino para los directorios o ficheros a mover.',
		'3' => 'Ya existe un fichero o directorio con el mismo nombre en el destino:',
		'4' => 'No existe el directorio destino para:',
		'5' => 'El directorio destino no tiene permisos de escritura para:',
		'6' => 'Se ha podido crear una copia en el destino, pero el original no se ha podido eliminar:',
		'7' => 'El resto de los directorios y ficheros fueron movidos correctamente.',
		'8' => 'No se puede mover un directorio dentro de s&iacute; mismo:',
		'9' => 'Alguno de los directorios o ficheros seleccionados no existen o no son legibles:',
	),
	'estado.multiple_permisos' => array(
		'0' => 'No se ha podido cambiar los permisos a este directorio/fichero:',
		'1' => 'El cambio de permisos fue realizado correctamente.',
		'2' => 'No existe el fichero o no se dispone de permisos sobre &eacute;l:',
		'3' => 'El resto de ficheros o directorios fueron cambiados correctamente.',
	),
	'estado.permisos' => array(
		'0' => 'No se ha podido cambiar los permisos a este directorio/fichero.',
		'1' => 'El cambio de permisos fue realizado correctamente.',
		'2' => 'No existe el fichero o no se dispone de permisos sobre &eacute;l.',
	),
	'estado.descargar' => array(
		'0' => 'No existe el fichero seleccionado o no es legible:',
		'2' => 'No se puede descargar el fichero actual ya que se superar&iacute;a el ancho de banda disponible para este mes.',
		'3' => 'No se ha podido abrir el fichero de registro para guardar los datos de la descarga. Por favor revisa el directorio %s',
	),
	'estado.redimensionar' => array(
		'0' => 'La copia reducida fue cancelada.',
		'1' => 'La copia reducida fue creada correctamente.',
		'2' => 'La copia reducida fue eliminada correctamente.',
	),
	'estado.ver_comprimido' => array(
		'1' => 'El fichero seleccionado no es un fichero comprimido v&aacute;lido.',
	),
	'estado.novo_arq' => array(
		'0' => 'Ha ocurrido un error creando el fichero, compruebe los permisos de escritura sobre el directorio..',
		'1' => 'El fichero ha sido creado correctamente.',
		'2' => 'Ya existe un fichero con ese nombre.',
		'3' => 'No est&aacute; permitido ese nombre para el nuevo fichero.',
		'4' => 'El directorio en el que desea guardar el fichero no tiene permisos de escritura.',
		'5' => 'No ha escrito un nombre para el nuevo fichero.',
		'6' => 'Con este fichero se supera el l&iacute;mite m&aacute;ximo de tama&ntilde;o para esta ra&iacute;z.',
		'7' => 'Con este fichero se supera el l&iacute;mite de ancho de banda permitido para este mes.',
	),
	'estado.preferencias' => array(
		'0' => 'Ha ocurrido un error cambiando las preferencias del usuario. Por favor vuelva a intentarlo y en caso de error avise al administrador.',
		'1' => 'Las preferencias fueron cambiadas correctamente.',
		'2' => 'Debe cubrir el campo de "Nombre".',
		'3' => 'La longitud de la contrase&ntilde;a debe ser de al menos 8 d&iacute;gitos. Se permiten n&uacute;meros y letras.',
		'4' => 'Las contrase&ntilde;as no coinciden.',
	),
	'estado.redimensionar_dir' => array(
		0 => 'El directorio no contiene ninguna imagen v&aacute;lida para ser redimensionada.',
		1 => 'Se ha creado correctamente la previsualizaci&oacute;n para: ',
		2 => 'Esta imagen no es v&aacute;lida: ',
		3 => 'No se han recibido todos los par&aacute;metros necesarios para esta acci&oacute;n',
		4 => 'Esta imagen ya dispone de previsualizaci&oacute;n: ',
	),
	'estado.correo' => array(
		0 => 'El correo no se ha podido enviar. El problema puede ser la configuraci&oacute;n para env&iacute;o de correos desde PHP.',
		1 => 'El correo ha sido enviado con &eacute;xito.',
		2 => 'El campo "T&iacute;tulo" no puede estar en blanco.',
		3 => 'El campo "Mensaje" no puede estar en blanco.',
		4 => 'El campo "Para" no puede estar en blanco.',
		5 => 'Alguna de las direcciones de correo en el campo "Para" no son correctas: ',
		6 => 'Todas las direcciones de correo conten&iacute;n alg&uacute;n error.',
		7 => 'No se ha podido adjuntar el fichero seleccionado. Compruebe que existe y que tiene permisos de lectura.',
		8 => 'Ha ocurrido alg&uacute;n problema creando el mensaje. Puede ser que no se pueda enviar este fichero como adjunto.',
		9 => 'No se permite enviar este fichero como adjunto ya que superar&iacute;a el ancho de banda disponible para este mes.',
		10 => 'No se permite enviar este fichero ya que supera el l&iacute;mite de %s para un adjunto.',
	),
);
?>
