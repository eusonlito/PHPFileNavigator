<?php
/****************************************************************************
* data/idiomas/en/axuda.inc.php
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
	'h1_quero_facer' => 'What do I want to do?',
	'tit_crear_dir' => 'Create New Folder',
	'txt_crear_dir' => 'To create a folder first click on the option above <strong><img src="%simx/crear_dir.png" alt="Create directory" /> Create Directory</strong>. Once this is done, you can fill in fields, only the name field is required.',
	'tit_subir_arq' => 'Upload File',
	'txt_subir_arq' => 'To upload a file first click on the option above <strong><img src="%simx/subir_arq.png" alt="File Upload" /> File Upload</strong>. Once this is done, you can then fill in the required fields, the file you will upload is the only required.<br /><br />If an image is to be Uploaded, there will be two options to create a miniature copy of the image that is in <strong>Reduced Image</strong> (ignore this option unless uploading an image).',
	'tit_subir_url' => 'Grab a file from another web site',
	'txt_subir_url' => 'To upload a file that already exists on another web site, first click on the option <strong><img src="%simx/subir_url.png" alt="Upload URL" /> Upload URL</strong>.<br /><br />Once done this, you will have to write the <strong>URL Adress</strong> that you want to store, take into account that it has to be a complete address.  For example,this is better <i>http://phpfilenavigator.litoweb.net/index.php</i> than this <i>http://phpfilenavigator.litoweb.net</i>, because in the latter example it could fail.  After the URL address appears <strong>Name of the file to create</strong> you have to a write a name that allows us to identify it later, as <i>PHPfileNavigator Web</i>.',
	'tit_miniaturas' => 'View thumbnail images in file list',
	'txt_miniaturas' => 'You only have to click on option above <strong><img src="%simx/ver_imaxes.png" alt="Thumbnails" /> Thumbnails</strong> to see a miniature version of an image file when navigating the file list.',
	'tit_arbore' => 'View all files and folders in one page',
	'txt_arbore' => 'To view content of root directory, click on <strong><img src="%simx/arbore.png" alt="Tree View" /> Tree View</strong>, to display the folder structure of the root file system. If you also want to view all the files in each folder, click on the option to the right <strong>[Complete Tree]</strong> to display a list of the root content for the folder where you are currently located.',
	'tit_buscar' => 'Search for name of a file or associated meta text',
	'txt_buscar' => 'You have two options to search for a file, the first one is to use the menu above <strong>Search</strong> and the second one, by writing part of the name in the field of <strong>Search:</strong> and then click in magnifying glass.<br /><br />In this search form text box, you only have to enter text associated with the file or the folder you are trying to find. Choose where you want to search (in this folder or at the root level). Choose the fields where you want to search for the text and then click on <strong>Accept</strong>. The search results will be displayed at the bottom of the form.',
	'tit_accions' => 'Perform action with <strong>only one file or folder</strong> like copy, move, delete...',
	'txt_accions' => 'You can take any action you want with a file or folder from the row of <strong>Actions</strong> that are listed at the end of line.<br />This row allows you (if authorised), to perform the following actions: <strong>View Information</strong>, <strong>Copy</strong>, <strong>Move</strong>, <strong>Rename</strong>, <strong>Delete</strong>, <strong>Change Permissions</strong> or <strong>Download</strong>.',
	'tit_accions_multiple' => 'Perform an action on <strong>many files or folders</strong> at same time',
	'txt_accions_multiple' => 'If you have sufficient permission, you will be able to take several actions on multiple files and folders all at the same time. The following actions can be performed: <strong>Copy</strong>, <strong>Move</strong>, <strong>Delete</strong>, <strong>Change Permissions</strong> and <strong>Download</strong>.',
	'h1_accions' => 'Which actions can I perform on each file or folder listed?',
	'txt_info' => '<strong>View Information: </strong>This option allows you to view detailed information as to the size, date of creation, permissions and data related to additional information, such as title and description, and a form to modify th1s data.',
	'txt_copiar' => '<strong>Copy: </strong>Allows you to copy a file or folder to a new location of your choice. If copying a folder, <strong>all</strong> information will be copied to the destination location.',
	'txt_mover' => '<strong>Move: </strong>Allows you to move a file or folder to a desired location in the current root. The selected file or folder will be copied to the desired destination and the original one will be deleted.',
	'txt_renomear' => '<strong>Rename: </strong>Allows you to change the name of a file or folder.',
	'txt_eliminar' => '<strong>Delete: </strong>Allows you to delete a file or folder and all its content.',
	'txt_permisos' => '<strong>Permissions: </strong>Allows you to change the real permissions (attributes) of a file or folder.',
	'txt_descargar' => '<strong>File Download: </strong>Forces the download of a file to the hard drive on your own computer. All completed downloads will be logged - including file size and download time(s).',
	'txt_comprimir' => '<strong>Compress: </strong>Compresses a file or folder and all its content to be downloaded into a single file. This saves bandwidth and reduces download time, due to the fact that the file size is reduced compared with normal download.',
	'txt_redimensionar' => '<strong>Reduce Image Copy: </strong>Allows you to create a smaller size image (thumbnail) from the current (full sized) image. The thumbnail will be an exact copy of the original image but in a smaller version. You can (optionally) select a part of the original image and create a reduced copy of the selected part only.',
	'txt_extraer' => '<strong>Decompress: </strong>Allows you to uncompress a packed file with TAR/GZ/TGZ/GZIP. It extracts all the recognized content creating an exact structure of the original files and folders. If a file can not be extracted, due to an invalid name, it will be skipped and the program will continue with the rest of the list.',
	'txt_ver_contido' => '<strong>View Content: </strong>Allows you to view an editable text file. If the text being viewed is a web file (such as PHP or HTML), the code will be colored.',
	'txt_editar' => '<strong>Edit: </strong>Allows you to modify the content of a text file.',
	'h1_accions_multiple' => 'What actions can I do to a lot of files or folders at the same time?',
	'txt_multiple_copiar' => '<strong>Copy: </strong>Allows you to copy many files and folders at the same time. The copy process will continue, even if an error occurs.  The program will inform you of the results at the end of the process.',
	'txt_multiple_mover' => '<strong>Move: </strong>Allows you to move many files and folders at the same time. If an error occurs when moving one of the items, the program will inform you of the results at the end of the process.',
	'txt_multiple_eliminar' => '<strong>Delete: </strong>Allows you to delete many files and folders at the same time. The process will continue even if an error occurs when deleting an item.  The program will inform you of the results at the end of the process.',
	'txt_multiple_permisos' => '<strong>Permissions Change: </strong>Allows you to change the permissions of many files and folders at the same time. The process will continue even if an error occurs when changing one of them. The program will inform you of the results at the end of the process.',
	'txt_multiple_comprimir' => '<strong>Packed Download: </strong>Allows you to archive all the selected files and folders into one compressed file (in order to save bandwidth). The created file will be in ZIP format.',
	'h1_problemas' => 'How can I fix this problem?',
	'tit_problema_subir_arq' => 'I can\'t upload a file or a URL.',
	'txt_problema_subir_arq' => 'If you can\'t upload a file and a URL you must check that you have enough space available to save it on the destination disc. To check available disk space, you should see something like <strong> free space: XX MB</strong> displayed at the bottom of the page indicating the size limit that the adminsitrator has applied to this root storage area.',
	'tit_problema_crear_dir' => 'I can\'t create a folder',
	'txt_problema_crear_dir' => 'The most frequent cause for denying permission to create a folder is that the destination folder has not been configured with the necessary permissions. If this happens a warning will appear to show the problem. If the problem can\'t be fixed by the user, contact your Administrator.',
	'tit_problema_buscador' => 'The searcher doesn\'t find what they\'re looking for',
	'txt_problema_buscador' => 'If the searcher can\'t find the file that you are looking for and you know that it exists in the root you are in, ask the Administrator to <strong>reindex</strong> your root content to update the related stored data.',
	'tit_problema_miniaturas' => 'I can\'t view the miniature images.',
	'txt_problema_miniaturas' => 'If you click <img src="%simx/ver_imaxes.png" alt="View Images" /> Miniatures</strong> and the miniature images derived from the full-size image files (auto-generated thumbnails) don\'t appear in the list, this means that you have not created the thumbnails yet. To create the missing thumbnails, click on <strong>View Information</strong>in the selected image and then click on <strong>Reduced Copy of the Image</strong> where you can create a personalized copy or a proportional reduced one.',
	'tit_problema_paxinar' => 'I can\'t view all of a folders contents.',
	'txt_problema_paxinar' => 'When a folder contains too many files (more than %s files or folders), the results are paginated. If you want to go to \'previous\' or \'next\' page, click on the navigation links at the bottom of the page.',
	'tit_problema_sesion' => 'If you don\'t use the webpage for a while, your session will expire and the system will log you out.',
	'txt_problema_sesion' => 'The reason of this is that the system has a time limit for each session to prevent illegal access after you leave your computer unattended. The session lasts half an hour from the last screen reload that you performed.<br />If you don\'t want your session to expire, you have to refresh the page from time to time.',
);
?>