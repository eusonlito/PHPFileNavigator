<?php
/****************************************************************************
* data/idiomas/en/estado.inc.php
*
* Textos para el idioma English
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
	'estado.crear_dir' => array(
		'0' => 'An error has occurred when creating the folder.',
		'1' => 'Folder succesfully created.',
		'2' => 'There is already a folder with that name.',
		'3' => 'The folder specified does not have write permission.',
		'4' => 'The name you chose includes unsupported characters. Please choose another name.',
		'5' => 'The size limit for this root has already been reached.',
	),
	'estado.subir_arq' => array(
		'0' => 'An error occurred when uploading the file.',
		'1' => 'File successfully uploaded.',
		'2' => 'The name you have chosen includes unsupported characters. Please change the file name.',
		'3' => 'There is already a file with that name.',
		'4' => 'Destination folder does not have write permission.',
		'5' => 'The file size exceeds the limit for this configuration.',
		'6' => 'The file size exceeds the maximum size limit for this root folder.',
		'7' => 'The file exceeds the bandwidth limit allowed for this month.',
		'8' => 'The selected files are being uploaded.<br /><br />If these files are large in size, the delay can be prolonged.<br /><br />Please, wait...',
	),
	'estado.eliminar_dir' => array(
		'0' => 'The folder or part of this folder has not been totally deleted. Please contact the administrator to completely remove it.',
		'1' => 'Folder succesfully deleted.',
		'2' => 'Are you sure you want to delete this empty folder?',
		'3' => 'This folder is not empty. Are you sure you want to delete this folder and all its contents?',
		'4' => 'The folder you want to delete doesn\'t exist.',
	),
	'estado.eliminar_arq' => array(
		'0' => 'The file couldn\'t be deleted. Check its permissions.',
		'1' => 'File succesfully deleted.',
		'2' => 'Are you sure you want to delete this file?',
		'4' => 'The file you want to delete doesn\'t exist.',
	),
	'estado.renomear' => array(
		'0' => 'The name couldn\'t be changed. Check permissions.',
		'1' => 'Name successfully changed.',
		'2' => 'There is already a folder with that name.',
		'3' => 'There is already a file with that name.',
		'4' => 'The new name contains unsupported characters.',
	),
	'estado.mover_dir' => array(
		'0' => 'All or part of the folder could not be moved. Check permissions and the destination.',
		'1' => 'Folder successfully moved.',
		'2' => 'This folder is not empty. Select a destination to move this folder and all its content.',
		'3' => 'Select the destination to which to move this empty folder.',
		'4' => 'The destination folder doesn\'t exist.',
		'5' => 'Destination folder does not have write permission.',
		'6' => 'There is already a folder in the destination that contains this name.',
		'7' => 'You can\'t copy a directory into itself.',
	),
	'estado.mover_arq' => array(
		'0' => 'The file couldn\'t be moved. Check the origin and destination permissions.',
		'1' => 'File was successfully moved.',
		'2' => 'Choose a destination for this file.',
		'3' => 'There is already a file in the destination folder with this name.',
		'4' => 'There isn\'t a destination folder.',
		'5' => 'Destination folder doesn\'t have write permission.',
		'6' => 'A copy was created in the destination, but the original couldn\'t be deleted.',
	),
	'estado.copiar_dir' => array(
		'0' => 'The folder and part of its content couldn\'t be copied, check for origin and destination permissions.',
		'1' => 'Folder succesfully copied.',
		'2' => 'This folder is not empty.<br />Select a destination to copy this folder and its content.',
		'3' => 'Select a destination to copy this empty folder.',
		'4' => 'The destination folder doesn\'t exist.',
		'5' => 'Destination folder doesn\'t have write permission.',
		'6' => 'There is already a folder in the destination with that name.',
		'7' => 'A folder can\'t be copied to the same folder.',
		'8' => 'You can\'t copy this folder bacause it surpasses the limit of this root.',
	),
	'estado.copiar_arq' => array(
		'0' => 'The file couldn\'t be copied, check for origin and destination permissions.',
		'1' => 'File succesfully copied.',
		'2' => 'Select a destination for this file.',
		'3' => 'There is already a file in the destination folder with the same name.',
		'4' => 'The destination folder doesn\'t exist.',
		'5' => 'Destination folder doesn\'t have write permission.',
		'6' => 'You can\'t copy this file because it surpasses the limit for this root.',
	),
	'estado.enlazar_dir' => array(
		'0' => 'The folder or part of it couldn\'t be linked, check for origin and destination permissions.',
		'1' => 'Folder succesfully linked.',
		'2' => 'The destination folder doesn\'t exist.',
		'3' => 'Destination folder doesn\'t have write permission.',
		'4' => 'There is already a folder in the destination with this name.',
	),
	'estado.enlazar_arq' => array(
		'0' => 'The file couldn\'t be linked, check for origin and destination permissions.',
		'1' => 'File succesfully linked.',
		'2' => 'Select a destination for this file.',
		'3' => 'There is already a file in the destination folder with this name.',
		'4' => 'The destination folder doesn\'t exist.',
		'5' => 'Destination folder doesn\'t have write permission.',
	),
	'estado.editar' => array(
		'0' => 'An error occurred while editing this file.',
		'1' => 'File succesfully edited.',
		'2' => 'File doesn\'t have write permission.',
		'3' => 'The file you want to edit doesn\'t exist.',
		'4' => 'You don\'t have permission to edit this file.',
	),
	'estado.subir_url' => array(
		'0' => 'An error has ocurred with that URL.',
		'1' => 'The requested URL has been saved successfully.',
		'2' => 'A file with that name already exists.',
		'3' => 'The destination directory doesn\'t have write permission.',
		'4' => 'Take into account that the waiting time may be long if you choose large files. It is recommended that you choose text files, such as web pages.',
		'5' => 'Please wait while the requested URL is being downloaded.<br /><br />Take into account that if the requested document is very large the waiting time might be very long.',
		'6' => 'The URL downloading process has been canceled correctly.',
		'7' => 'The given address cannot be downloaded because it exceeds the size limits of the chosen root.',
		'8' => 'The name chosen for this file has characters that are not allowed.',
		'9' => 'With that file, the bandwidth limit for this month will be exceeded.',
	),
	'estado.extraer' => array(
		'0' => 'It is not possible to extract any of the files, the compressed file might be defective or might be in an incorrect format.',
		'1' => 'All the files have been extracted correctly.',
		'2' => 'The file doesn\'t have a valid extension (tar,gz,gzip,tgz).',
		'3' => 'This application doesn\'t support extractions of that file type.',
		'4' => 'Couldn\'t be extracted, it may be corrupted.',
		'5' => 'Some of the files were not extracted, they already exist.',
		'6' => 'Some of the files could not be opened for writing.',
		'7' => 'The extraction could not be finished because the content exceedes the maximum file size for this root.',
		'8' => 'Some of the files have names that not allowed or were empty, so they were not extracted.',
		'9' => 'Some of the compressed directories could not be created during the extraction process.',
	),
	'estado.multiple_copiar' => array(
		'0' => 'The directory/file could not be copied, check the permissions in both origin and destination.',
		'1' => 'All the directories or files were copied correctly.',
		'2' => 'Choose the destination of the directories or files to be copied.',
		'3' => 'A file or directory with the given name already exists in the destination:',
		'4' => 'The destination directory doesn\'t exist for:',
		'5' => 'The destination directory doesn\'t have writing permissions for:',
		'6' => 'This directory/file cannot be copied because it exceedes the size limit for this root:',
		'7' => 'Some of the chosen directories or files do not exist or are not readable.',
		'8' => 'The rest of directories and files were copied succesfully.',
		'9' => 'The directory cannot be copied inside its self.',
	),
	'estado.multiple_eliminar' => array(
		'0' => 'The file or directory could not be removed.  Check the permissions of the target.',
		'1' => 'All the files or directories were removed correctly.',
		'2' => 'Are you sure that you want to remove all these files or directories?',
		'3' => 'The rest of the files or directories were removed correctly.',
		'4' => 'The file you are trying to remove doesn\'t exist.',
	),
	'estado.multiple_mover' => array(
		'0' => 'The file/directory could not have been moved, please check the permissions in the origin and the destination.',
		'1' => 'All the directories or files were moved succesfully.',
		'2' => 'Choose the destination for the directories or files to be moved.',
		'3' => 'A file or directory with the given name already exists on the destination.',
		'4' => 'The destination directory doesn\'t exist for:',
		'5' => 'The destination directory does not have write permission for:',
		'6' => 'A copy was successfully created at the destination, but the original could not be removed:',
		'7' => 'The rest of the directories and files were moved correctly.',
		'8' => 'A directory cannot be moved inside its self:',
		'9' => 'Some of the chosen directories or files don\'t exist or aren\'t readable:',
	),
	'estado.multiple_permisos' => array(
		'0' => 'The permissions of the directory/file could not be changed:',
		'1' => 'Permissions changed correctly.',
		'2' => 'File does not exist or the permissions regarding it are not available:',
		'3' => 'The rest of the files or directories were changed correctly.',
	),
	'estado.permisos' => array(
		'0' => 'The permissions of the directory/file could not be changed:',
		'1' => 'Permissions changed correctly.',
		'2' => 'File does not exist or the permissions regarding it are not available.',
	),
	'estado.descargar' => array(
		'0' => 'The selected file does not exist or is not readable.',
		'2' => 'The actual root cannot be downloaded because it would exceed the bandwidth limit available for this week.',
		'3' => 'The registration file could not be opened for saving to the download data. Please check the %s directory.',
	),
	'estado.redimensionar' => array(
		'0' => 'The thumbnail was canceled.',
		'1' => 'The thumbnail was created correctly.',
		'2' => 'The thumbnail was deleted successfully',
	),
	'estado.ver_comprimido' => array(
		'1' => 'File selected isn\'t a valid compressed file.',
	),
	'estado.novo_arq' => array(
		'0' => 'The file could not be created, verify the writing permissions on the directory.',
		'1' => 'The file was created successfully.',
		'2' => 'A file with that same name already exists.',
		'3' => 'That name for the new file is not allowed.',
		'4' => 'The directory you wish to store the file in does not have write permission.',
		'5' => 'You haven\'t written a name for the new file.',
		'6' => 'With this file the maximum size limit for this root will be surpassed.',
		'7' => 'With this file the bandwidth limit allowed will be surpassed for this month.',
	),
	'estado.preferencias' => array(
		'0' => 'An error has occurred in changing the preferences of the user. Please try again and in case of a repeated error contact the administrator.',
		'1' => 'The preferences were changed correctly.',
		'2' => 'The field "Name" must be completed.',
		'3' => 'The password length must be at least 8 digits. Numbers and letters are allowed.',
		'4' => 'The passwords do not match.',
	),
	'estado.redimensionar_dir' => array(
		'0' => 'This folder doesn\'t contain a valid image.',
		'1' => 'All the images were processed correctly.',
		'2' => 'This image is not valid:',
		'3' => 'All the necessary parameters for this action haven\'t been received.',
		'4' => 'This image already has previsualization:',
	),
	'estado.correo' => array(
		'0' => 'The mail could not be sent. The problem could be the configuration of the post office  in PHP.',
		'1' => 'The mail has been sent successfully.',
		'2' => 'The field "Title" cannot be left blank.',
		'3' => 'The field "Message" cannot be left blank.',
		'4' => 'The field "for" cannot be left blank.',
		'5' => 'Some of the addresses in the "For" field are not correct:',
		'6' => 'All the email addresses contain errors.',
		'7' => 'It has not been possible to attach the selected file. Verify that it exists and that it has read permission.',
		'8' => 'A problem has occured creating the message. It is possible that the file cannot be sent as an attachment.',
		'9' => 'Sending this file is not allowed since it would surpass the bandwidth limit available for this month.',
		'10' => 'Sending this file is not allowed as it surpasses the size limit of %s for an attachment.',
	),
);
?>