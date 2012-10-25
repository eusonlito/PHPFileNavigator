<?php
/****************************************************************************
* data/idiomas/gl/estado.inc.php
*
* Textos para el idioma Galego
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

defined('OK') or die();

return array(
	'estado.crear_dir' => array(
		'0' => 'Ocorreu un erro creando o directorio.',
		'1' => 'O directorio creouse correctamente.',
		'2' => 'Xa existe un directorio con ese nome.',
		'3' => 'O directorio non ten permisos de escritura.',
		'4' => 'O nome ten caracteres non permitidos, escolla outro nome para o directorio.',
		'5' => 'Xa est&aacute; superado o l&iacute;mite m&aacute;ximo de tama&ntilde;o para esta ra&iacute;z.',
	),
	'estado.subir_arq' => array(
		'0' => 'Ocorreu un erro subindo alg&uacute;n dos arquivos.',
		'1' => 'O arquivo foi subido correctamente.',
		'2' => 'O nome ten caracteres non permitidos, c&aacute;mbielle o nome a ese arquivo.',
		'3' => 'Xa existe un arquivo con ese nome.',
		'4' => 'O directorio destino non ten permisos de escritura.',
		'5' => 'O arquivo excede o peso m&aacute;ximo permitido para esta configuraci&oacute;n.',
		'6' => 'Con este arquivo sup&eacute;rase o l&iacute;mite m&aacute;ximo de tama&ntilde;o para esta ra&iacute;z.',
		'7' => 'Con este arquivo superase o l&iacute;mite de ancho de banda usado durante este mes.',
		'8' => 'Estanse a subir os arquivos escollidos.<br /><br />Se estos arquivos son de gran tama&ntilde;o a espera pode ser prolongada.<br /><br />Por favor, espere...',
	),
	'estado.eliminar_dir' => array(
		'0' => 'Non se puido eliminar o directorio completo ou parte do seu contido,<br />comprobe co administrador os permisos sobre o mesmo.',
		'1' => 'Directorio eliminado correctamente.',
		'2' => '&iquest;Est&aacute; seguro de borrar este directorio baldeiro?',
		'3' => 'Este directorio non est&aacute; baldeiro,<br />&iquest;Est&aacute; seguro de borrar este directorio e todo o seu contido?',
		'4' => 'Non existe o directorio que se intenta eliminar.',
	),
	'estado.eliminar_arq' => array(
		'0' => 'Non se puido borrar o arquivo, comprobe os permisos sobre o mesmo.',
		'1' => 'Arquivo eliminado correctamente.',
		'2' => '&iquest;Est&aacute; seguro de borrar este arquivo?',
		'4' => 'Non existe o arquivo que se intenta eliminar.',
	),
	'estado.renomear' => array(
		'0' => 'Non se puido cambiarlle o nome, comprobe os permisos sobre o mesmo.',
		'1' => 'Cambio de nome realizado correctamente.',
		'2' => 'Xa existe un directorio con ese nome.',
		'3' => 'Xa existe un arquivo con ese nome.',
		'4' => 'O novo nome cont&eacute;n texto non permitido.',
	),
	'estado.mover_dir' => array(
		'0' => 'Non se puido mover o directorio ou parte do seu contido, comprobe os permisos sobre o orixen e sobre o destino.',
		'1' => 'Directorio movido correctamente.',
		'2' => 'Este directorio non est&aacute; baldeiro,<br />Escolle o destino para mover este directorio e todo o seu contido',
		'3' => 'Escolle o destino para este mover directorio baldeiro',
		'4' => 'Non existe o directorio de destino.',
		'5' => 'O directorio destino non ten permisos de escritura.',
		'6' => 'Xa existe un directorio con ese nome no destino.',
		'7' => 'Non se pode copiar un directorio dentro de si mesmo.',
	),
	'estado.mover_arq' => array(
		'0' => 'Non se puido mover o arquivo, comprobe os permisos sobre o orixen e sobre o destino.',
		'1' => 'Arquivo movido correctamente',
		'2' => 'Escolle o destino para este arquivo.',
		'3' => 'Xa existe un arquivo co mesmo nome do directorio de destino.',
		'4' => 'Non existe o directorio de destino.',
		'5' => 'O directorio destino non ten permisos de escritura.',
		'6' => 'P&uacute;idose crear unha copia no destino, pero o arquivo orixinal non se puido eliminar.',
	),
	'estado.copiar_dir' => array(
		'0' => 'Non se puido copiar o directorio ou parte do seu contido, comprobe os permisos sobre o orixen e sobre o destino.',
		'1' => 'Directorio copiado correctamente.',
		'2' => 'Este directorio non est&aacute; baldeiro,<br />Escolle o destino para copiar este directorio e todo o seu contido',
		'3' => 'Escolle o destino para este copiar directorio baldeiro',
		'4' => 'Non existe o directorio de destino.',
		'5' => 'O directorio destino non ten permisos de escritura.',
		'6' => 'Xa existe un directorio con ese nome no destino.',
		'7' => 'Non se pode copiar un directorio dentro de si mesmo.',
		'8' => 'Non se pode copiar este directorio por que se supera o l&iacute;mite para esta ra&iacute;z.',
	),
	'estado.copiar_arq' => array(
		'0' => 'Non se puido copiar o arquivo, comprobe os permisos sobre o orixen e sobre o destino.',
		'1' => 'Arquivo copiado correctamente',
		'2' => 'Escolle o destino para este arquivo.',
		'3' => 'Xa existe un arquivo co mesmo nome do directorio de destino.',
		'4' => 'Non existe o directorio de destino.',
		'5' => 'O directorio destino non ten permisos de escritura.',
		'6' => 'Non se pode copiar este arquivo por que supera o l&iacute;mite para esta ra&iacute;z.',
	),
	'estado.enlazar_dir' => array(
		'0' => 'Non se puido enlazar o directorio ou parte do seu contido, comprobe os permisos sobre o orixen e sobre o destino.',
		'1' => 'Directorio enlazado correctamente.',
		'2' => 'Non existe o directorio de destino.',
		'3' => 'O directorio destino non ten permisos de escritura.',
		'4' => 'Xa existe un directorio con ese nome no destino.',
	),
	'estado.enlazar_arq' => array(
		'0' => 'Non se puido enlazar o arquivo, comprobe os permisos sobre o orixen e sobre o destino.',
		'1' => 'Arquivo enlazado correctamente',
		'2' => 'Escolle o destino para este arquivo.',
		'3' => 'Xa existe un arquivo co mesmo nome do directorio de destino.',
		'4' => 'Non existe o directorio de destino.',
		'5' => 'O directorio destino non ten permisos de escritura.',
	),
	'estado.editar' => array(
		'0' => 'Ocorreu un erro editando o arquivo.',
		'1' => 'O arquivo editouse correctamente.',
		'2' => 'O arquivo non ten permisos de escritura.',
		'3' => 'Non existe o arquivo a editar',
		'4' => 'Non est&aacute; permitido editar este arquivo',
	),
	'estado.subir_url' => array(
		'0' => 'Ocorreu un erro obtendo esa URL.',
		'1' => 'A URL pedida gardouse correctamente.',
		'2' => 'Xa existe un arquivo con ese nome.',
		'3' => 'O directorio destino non ten permisos de escritura.',
		'4' => 'Te&ntilde;a en conta que o tempo de espera pode ser moi longo se escolle arquivos de moito peso.<br />Recom&eacute;ndase escoller s&oacute; documentos de tipo texto como p&aacute;xinas web.',
		'5' => 'Espera mentras se descarga a url pedida.<br /><br />Te&ntilde;a en conta que se o documento pedido &eacute; moi pesado, a espera pode ser moi prolongada.',
		'6' => 'Anulouse correctamente a descarga de esa URL.',
		'7' => 'Non se pode descargar esa direcci&oacute;n por que supera o l&iacute;mite para esta ra&iacute;z.',
		'8' => 'O nome escollido para o arquivo cont&eacute;n texto non permitido.',
		'9' => 'Con este arquivo superase o l&iacute;mite de ancho de banda usado durante este mes.',
	),
	'estado.extraer' => array(
		'0' => 'Non foi posible extraer ning&uacute;n arquivo, pode ser que o arquivo comprimido non te&ntilde;a o formato correcto ou que estea danado.',
		'1' => 'Todos os arquivos foron extraidos correctamente.',
		'2' => 'O arquivo non ten unha extensi&oacute;n v&aacute;lida (tar, gz, gzip, tgz, bzip, bzip2, bz, bz2.',
		'3' => 'Esta aplicaci&oacute;n non soporta a extraci&oacute;n de este tipo de arquivo tar.',
		'4' => 'Non pode ser extra&iacute;do, est&aacute; corrupto.',
		'5' => 'Alg&uacute;ns arquivos foron extraidos xa que x&aacute; existen.',
		'6' => 'Alg&uacute;ns arquivos non poideron ser abertos para escritura.',
		'7' => 'Non se puido rematar coa extracci&oacute;n por que o contido supera o peso m&aacute;ximo permitido para esta ra&iacute;z.',
		'8' => 'Alg&uacute;ns arquivos conti&ntilde;an nomes non permitidos ou estaban baleiros e non foron extraidos.',
		'9' => 'Non se puido crear alg&uacute;ns dos directorios necesarios para a extracci&oacute;n do contido.',
	),
	'estado.multiple_copiar' => array(
		'0' => 'Non se puido copiar o directorio/arquivo, comprobe os permisos sobre o orixen e sobre o destino:',
		'1' => 'Todos os directorios ou arquivos escollidos foron copiados correctamente.',
		'2' => 'Escolle o destino para os directorios ou arquivos a copiar.',
		'3' => 'Xa existe un arquivo ou directorio co mesmo nome no destino:',
		'4' => 'Non existe o directorio de destino para:',
		'5' => 'O directorio destino non ten permisos de escritura para:',
		'6' => 'Non se pode copiar este directorio/arquivo por que supera o l&iacute;mite para esta ra&iacute;z:',
		'7' => 'Alg&uacute;ns dos directorios ou arquivos escollidos non existen ou non son lexibles:',
		'8' => 'O resto dos directorios e arquivos foron copiados correctamente.',
		'9' => 'Non se pode copiar o directorio dentro de s&iacute; mesmo:',
	),
	'estado.multiple_eliminar' => array(
		'0' => 'Non se puido eliminar o arquivo, comprobe os permisos sobre o mesmo.',
		'1' => 'Todos os arquivos escollidos foron eliminados correctamente.',
		'2' => '&iquest;Est&aacute; seguro de eliminar todos estes arquivos?',
		'3' => 'O resto dos arquivos foron eliminados correctamente.',
		'4' => 'Non existe o arquivo que se intenta eliminar:',
	),
	'estado.multiple_mover' => array(
		'0' => 'Non se puido mover o directorio/arquivo, comprobe os permisos sobre o orixen e sobre o destino:',
		'1' => 'Todos os directorios e arquivos escollidos foron movidos correctamente.',
		'2' => 'Escolle o destino para os directorios ou arquivos a mover.',
		'3' => 'Xa existe un arquivo ou directorio co mesmo nome no destino:',
		'4' => 'Non existe o directorio de destino para:',
		'5' => 'O directorio destino non ten permisos de escritura para:',
		'6' => 'P&uacute;idose crear unha copia no destino, pero o arquivo orixinal non se puido eliminar.',
		'7' => 'O resto dos arquivos e directorios foron movidos correctamente.',
		'8' => 'Non se pode mover un directorio dentro de si mesmo:',
		'9' => 'Alg&uacute;ns dos arquivos ou directorios escollidos non existen ou non son lexibles:',
	),
	'estado.multiple_permisos' => array(
		'0' => 'Non se puido cambiar os permisos a este directorio/arquivo:',
		'1' => 'O cambio de permisos foi realizado correctamente.',
		'2' => 'Non existe o arquivo ou non se ten permisos sobre el:',
		'3' => 'O resto dos arquivos e directorios foron cambiados correctamente.',
	),
	'estado.permisos' => array(
		'0' => 'Non se puido cambiar os permisos a este directorio/arquivo.',
		'1' => 'O cambio de permisos foi realizado correctamente.',
		'2' => 'Non existe o arquivo ou non se ten permisos sobre el.',
	),
	'estado.descargar' => array(
		'0' => 'O arquivo ou directorio escollido non existe ou non &eacute; lexible:',
		'2' => 'Non se pode descargar o arquivo actual xa que se super&iacute;a o ancho de banda dispo&ntilde;ible para este mes.',
		'3' => 'Non se puido abrir o arquivo de rexistro para gardar os datos da descarga. Por favor, revisa o directorio %s',
	),
	'estado.redimensionar' => array(
		'0' => 'A copia reducida foi cancelada.',
		'1' => 'A copia reducida foi creada correctamente.',
		'2' => 'A copia reducida foi eliminada correctamente.',
	),
	'estado.ver_comprimido' => array(
		'1' => 'O arquivo seleccionado non &eacute; un arquivo comprimido v&aacute;lido.',
	),
	'estado.novo_arq' => array(
		'0' => 'Ocorreu un erro creando o arquivo, comprobe os permisos de escritura sobre o directorio.',
		'1' => 'O arquivo foi creado correctamente.',
		'2' => 'Xa existe un arquivo con ese nome.',
		'3' => 'Non esta permitido ese nome para o novo arquivo.',
		'4' => 'O directorio no que desexa gardar o arquivo non ten permisos de escritura.',
		'5' => 'Non escribiu un nome para o novo arquivo.',
		'6' => 'Con este arquivo superase o l&iacute;mite m&aacute;ximo de tama&ntilde;o para esta ra&iacute;z.',
		'7' => 'Con este arquivo superase o l&iacute;mite de ancho de banda permitido para este mes.',
	),
	'estado.preferencias' => array(
		'0' => 'Ocorreu un erro cambiando as preferencias do usuario. Por favor volva a intentalo e en caso de erro avise ao administrador.',
		'1' => 'As preferencias foron cambiadas correctamente.',
		'2' => 'Debe cubrir o campo de "Nome".',
		'3' => 'A lonxitude do contrasinal debe ter polo menos 8 d&iacute;xitos. Perm&iacute;tense n&uacute;meros e letras.',
		'4' => 'Os contrasinais non coinciden.',
	),
	'estado.redimensionar_dir' => array(
		'0' => 'O directorio non cont&eacute;n ningunha imaxe v&aacute;lida para ser redimensionada.',
		'1' => 'Todas as imaxes foron procesadas correctamente.',
		'2' => 'Ocorreu un erro con algunha imaxe, o &iacute;ndice de posici&oacute;n non &eacute; o correcto.',
		'3' => 'Non se recibiron todos os par&aacute;metros necesarios para esta acci&oacute;n.',
		'4' => 'Esta imaxe xa disp&oacute;n de previsualizaci&oacute;n.',
	),
	'estado.correo' => array(
		'0' => 'O correo non se puido enviar. O problema pode ser a configuraci&oacute;n para env&iacute;o de correos dende PHP.',
		'1' => 'O correo foi enviado con &eacute;xito.',
		'2' => 'O campo "T&iacute;tulo" non pode estar en branco.',
		'3' => 'O campo "Mensaxe" non pode estar en branco.',
		'4' => 'O campo "Para" non pode estar en branco.',
		'5' => 'Alg&uacute;n dos enderezos de correo no campo "Para" non son correctas:',
		'6' => 'Todas os enderezos de correo conti&ntilde;an alg&uacute;n erro.',
		'7' => 'Non se puido adxuntar o arquivo escollido. Comprobe que existe e que ten permisos de lectura.',
		'8' => 'Ocorreu un erro creando a mensaxe. Pode ser que non poida enviar este arquivo como adxunto.',
		'9' => 'Non se permite enviar este arquivo como adxunto xa que superar&iacute;a o ancho de banda dispo&ntilde;ible para este mes.',
		'10' => 'Non se permite enviar este arquivo xa que supera o l&iacute;mite de %s para un adxunto.',
	),
);
?>