<?php
/****************************************************************************
* data/idiomas/en/instalar.inc.php
*
* Textos para el idioma Ingl&eacute;s
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
	'benvido' => 'Welcome to PHPfileNavigator installer',
	'i:presentacion' => 'Introduction',
	'i:directorios' => 'Directory permissions',
	'i:comprobacion' => 'System check',
	'i:datos' => 'Configuration data',
	'i:instalar' => 'Install',
	'i:remate' => 'Completed',
	'i:intro_presentacion' => '<p>Welcome to the PHPfileNavigator.</p><br /><p>This installer will guide you through the steps necessary to carry out an installation of the application.</p><br /><p>As you well know, this is a powerful, functional and secure file administrator.  It provides a wide range of additional features which you can find described further at the official PFN website <a href="http://pfn.sourceforge.net/">http://pfn.sourceforge.net/</a>.</p>',
	'i:intro_escolle_idioma' => '<p>First of all, you need to select the <strong>language</strong> you would like to use for the installation. If the required language is not listed, you can visit the official website to see if there is a translation available. The selected translation can be installed at any time and need not necessarily be picked at this time.</p>',
	'idioma' => 'Language',
	'i:intro_tipo_instalacion' => '<p>Now select the type of installation that you wish to make. If the PHPfileNavigator has not been installed previously select <strong>install</strong>, otherwise select <strong>upgrade</strong>.</p><br /><p>Remember that if you select to a fresh install and previous installation exists, all the content of the MySQL tables of the previous installation will be erased.</p>',
	'tipo_instalacion' => 'Type of installation',
	'instalar_cero' => 'A fresh installation or a reinstallation of this version',
	'i:actualizar' => 'Update from previous version',
	'i:intro_actualizar' => 'Proceeding with the update of a previous installation. If some problems are detected in this process, please leads to a message in the official forum <a href="http://pfn.sourceforge.net/phpBB2/" onclick="window.open(this.href); return false;">http://pfn.sourceforge.net/phpBB2/</a> so that it can be corrected as soon as possible.',
	'continuar_paso_2' => 'Continue to step 2 &Acirc;&raquo;',
	'continuar_paso_3' => 'Continue to step 3 &Acirc;&raquo;',
	'continuar_paso_4' => 'Continue to step 4 &Acirc;&raquo;',
	'continuar_paso_5' => 'Install &Acirc;&raquo;',
	'continuar_paso_6' => 'Finish &Acirc;&raquo;',
	'voltar_paso_1' => '&Acirc;&laquo; Back to step 1',
	'voltar_paso_2' => '&Acirc;&laquo; Back to step 2',
	'voltar_paso_3' => '&Acirc;&laquo; Back to step 3',
	'i:intro_directorios' => '<p>In this step a series of verifications will be made to confirm that the required  directories have the correct permissions.</p>   <br /><p>The ideal for the permissions of the directories would be that the Web server has permission for reading, writing and execution (700 apache: nobody), although this will not be possible in a shared system this is the reason why you will have to use 777.',
	'i:path_ok' => 'The directory has the correct permissions.',
	'i:path_erro' => 'The directory does not have the correct permissions. The user of the Web server must have write permissions',
	'i:arq_ok' => 'The file has the correct permissions.',
	'i:arq_erro' => 'The file does not have the correct permissions. The user of the Web server must have write permissions.',
	'i:intro_comprobacion' => '<p>In this step all the necessary requirements of the server for the installation are verified.</p><br /><p>During checking, PHP version (> 4.0.6), MySQL version (>= 4.0.0), GD, memory limit and upload file capacity are revised.</p>',
	'i:instalado_ok' => 'The installed version is correct:',
	'i:instalado_erro' => 'The installed version is inadequate for the correct use of the application, therefore you cannot continue with the installation:',
	'i:instalado_aviso' => 'The installed version is not adequate for full use of the application, although it will still function correctly:',
	'i:mysql_erro' => 'This installation of PHP does not include MySQL support. The necessary modules should be installed or the PHP should be recompiled to add the required support.',
	'i:gd_erro' => 'This installation of PHP does not include support for graphical libraries GD. You must install the modules necessary or recompile the PHP to add the support.',
	'i:safe_mode_erro' => 'This server is configured in safe_mode = On, which you will have problems in managing files or directories since the permissions will not be the correct ones. Contact your supplier of hosting to ask for the change to safe_mode = Off',
	'i:safe_mode_ok' => 'The server&Acirc;&acute;s configuration is correct for safe_mode = Off.',
	'i:upload_ok' => 'The server configuration allows a good upload capacity (more than 10 Mb per file):',
	'i:upload_erro' => 'The server configuration does not allow a good upload capacity (less than 10 Mb per file):',
	'i:memory_ok' => 'The configuration of the server allows for the use of a great amount of memory which will accelerate processes like the reduced copy of images or the compression of files and directories:',
	'i:memory_erro' => 'The configuration of the sever does not allow the use of great amount of memory which will slow processes like the reduced copy of images or the compression of files and directories:',
	'i:zlib_erro' => 'This version of PHP does not have support for Zlib.  This it will give errors at the time of extracting or trying to seeing the content of compress files. In order to avoid these extraction errors , compression and visualization of compressed files must be disabled.',
	'i:intro_datos' => '<p>This is the last screen before making the installation.</p><br /><p><strong>All the fields are obligatory.</strong></p><br /><p>If you have doubts on some fields, press <a href="#">(?)</a> on the left.</p>',
	'i:axuda' => array(
		'charset' => 'Normally each language has its own character set to correctly visualize all the symbols and letters in screen. The correct thing to do is that match with what the server and the system have.',
		'db_servidor' => 'The server where MySQL is installed, almost always has <strong>localhost</strong>',
		'db_nome' => 'The name of the database where it will be installed. <strong>Must exist prior to installation.</strong>',
		'db_usuario' => 'The user having access to the database. He must have permission for creation, modification and erasing of tables in the database chosen',
		'db_contrasinal' => 'User password for access to the database chosen.',
		'db_rep_contrasinal' => 'Repeat the previous password.',
		'db_prefixo' => 'Prefix for the tables. This avoid having existing tables overwitten by tables with the same name.',
		'ad_nome' => 'Common name of the user-administrator. <strong> It will not be the login name</strong>.',
		'ad_usuario' => 'User name for login of the application.',
		'ad_contrasinal' => 'Password for access to the user-administrator of the PHPfileNavigator.',
		'ad_rep_contrasinal' => 'Repeat the previous password.',
		'ad_correo' => 'E-mail of the administrator. This mail will recieve security alerts like attempts of instrusion or problems of access.',
		'ra_nome' => 'Generic name for this root. This is needed to identify it in the root list and in case that you have access to more than one root. <strong>i.e.: Main</strong> root or <strong>Documents</strong>',
		'ra_path' => 'Folder path that will be managed. It shall be the absolute path from the root server. Then you will be able to create more access roots.<br /><br />Remember that you shall use / instead of  in Linux/Unix and Windows. This path shall end with /<br /><br />Setting the PHPfileNavigator installation folder or any other subfolder as a path is not recommended.<br /><strong>p.e.: /var/www/html/docs/</strong> o <strong>c:/phpdev/www/docs/</strong>',
		'ra_web' => '<p>The Web path from the server document root to the directory you wish to to maintain.</p><br /><p>For example, if I am going to maintain a directory called <strong>docs</strong> and a document like <strong>logo.png</strong> exists in that directory . If I want to access that document by Web, http://www.midominio.com/docs/logo.png, then would write the root Web would be <strong>/docs/</strong>.</p>',
		'ra_dominio' => 'Managed domain name. without http. <strong>p.e.: www.mydomain.com</strong>',
		'raices_atopadas' => 'The following roots have been found and will be managed.',
		'aviso' => '<p>This application is in continuous development. If you check the box <strong>Installation notify</strong> it will send a notification email of new installation or update which will include the email address of the administrator and the hostname in which it was installed.</p><br /><p>Any additional information like routes, data of user, passwords, etc <strong>will not be sent</strong>. Providing this (optional) information, you will be kept informed about new versions and security warnings. It will not be sent in any case mail nonwished nor information that is not important.</p><br /><p>You can review the source code of the email notification in the file instalar/include/paso_5.inc.php between lines 45 and 63.</p>',
	),
	'i:aviso' => 'Installation notify',
	'i:charset' => 'Charset',
	'i:base_datos' => 'Database',
	'i:db_servidor' => 'Server',
	'i:db_nome' => 'Database name',
	'i:db_usuario' => 'User',
	'i:db_contrasinal' => 'Password',
	'i:db_prefixo' => 'Prefix',
	'i:administrador' => 'Admin-user',
	'i:ad_nome' => 'Common name',
	'i:ad_usuario' => 'User',
	'i:ad_contrasinal' => 'Password',
	'i:ad_rep_contrasinal' => 'Repeat password',
	'i:ad_correo' => 'Email',
	'i:raiz' => 'Main root',
	'i:ra_nome' => 'Name',
	'i:ra_path' => 'Absolute path',
	'i:ra_web' => 'Web path',
	'i:ra_dominio' => 'Domain',
	'i:erros' => array(
		'1' => 'You must select a correct character set.',
		'2' => 'You must enter the database server field.',
		'3' => 'You must enter the data base name to use.',
		'4' => 'You must enter the database user field.',
		'5' => 'You must fill in the Common name field for the Admin-user.',
		'6' => 'You must fill the User field for the Admin-user.',
		'7' => 'You must assign a Password for the Admin-User.',
		'8' => 'Password and prepeat password fields must match.',
		'9' => 'The Admin-user must have a email.',
		'10' => 'The main root must have Name.',
		'11' => 'The main root shall have an absolute path.',
		'12' => 'The main root shall have a web path.',
		'13' => 'The main root must have a domain.',
		'14' => 'The absolute path don\'t exists to main root.',
		'15' => 'The indicated user hasn&Acirc;&acute;t got access to the database',
		'16' => 'It has not been possible to use the selected database',
		'17' => 'The query has generated an error:',
		'18' => 'The configuration file for indicating whether an existing version is installed does not exist. Try a complete re-install rather than an update.',
	),
	'i:intro_instalar' => 'This screen displays the actions that were made for this installation of PHPfileNavigator.',
	'i:conexion_mysql' => 'MySQL connection',
	'i:mysql_ok' => 'The connection to the MySQL server and the selection of the database have been succesfully estabilished.',
	'i:consultas_mysql' => 'Table installation',
	'i:consultas_ok' => 'All the tables have been created and the data has been initialized correctly.',
	'i:consultas_erro' => 'An error occurred during update of the database. Please review logs and error messages before sending information to the developer of PHPfileNavigator.',
	'i:creacion_directorios' => 'Folder creation',
	'i:crear_directorios_ok' => 'All the necessary directories were created correctly.<br /><br />If this is a update from a previous version, can be that you needs to delete certain folders. The folders that you must delete are <strong>tmp/, <strong>data/logs/</strong> and <strong>data/info/</strong> but only if they are out of <strong>data/servidor/</strong>.',
	'i:arq_configuracion' => 'Configuration file',
	'i:arq_configuracion_ok' => 'The configuration file has been created successfully. The data can be seen in data/conf/basicas.inc.php',
	'i:arq_inc' => 'Additional information files',
	'i:arq_inc_ok' => '<p>The files used to store additional data (meta data - such as the file title and description) have been moved into their own separate directory. PHPfileNavigator will clean and maintain the existing roots without altering their content and while keeping additional files intact.</p><br /><p>The miniatuture images (thumbnails) have similarly been moved.</p>',
	'i:intro_remate' => '<p>Congratulations, PHPfileNavigator has been installed successfully.</p><br /><p>In order to begin to use the application you must <strong>delete or rename the "instalar" directrory</strong> or you will be will returned to the installation screen. After that you can go to the PHPfileNavigator URL.</p><br /><p>For any problems or suggestion, you can access the official forum at <a href="http://pfn.sourceforge.net/phpBB2/" onclick="window.open(this.href); return false;">http://pfn.sourceforge.net/phpBB2/</a>, and I will try to respond as rapidly as possible.</p><br /><p>Please remember that this it is a no-cost application and free to distribute and modify (GPL). If you wish that this project lasts forever and continues to provide correction of errors, new functionalities and support in the forums, you can assist by making a donation that will help to maintain this project.</p><br /><p>The donations can be made through PayPal here:</p>',
	'i:doar' => 'Donate',
	'i:doar_paypal' => 'Donate with PayPal',
	'i:doar_tarxeta' => 'Donate with credit card',
	'i:recargar' => 'Reload',
	'i:tit_bloqueo_instalacion' => 'Installation locked',
	'i:txt_bloqueo_instalacion' => '<p>This installation has been blocked to prevent two people executing the installer at the same time.</p><br /><p>If you are the administrator and therefore the person who really will make the installation, you must erase the lock file: <strong>tmp/instalar.lock</strong> (for  PHPFileNavigator versions earlier than 2.3.0) and in <strong>data/servidor/tmp/instalar.lock</strong> for 2.3.0 or later versions.</p><br /><p>Once you have erased the lock file you must quickly update the page to unlock the the installer, and thus to obtain the permissions necessary to continue.</p><br /><p> To clarify any confusion about this process or the use of PHPfileNavigator, please first visit the official page http://pfn.sourceforge.net/ and you will be able to find solutions to your problems in the forums.</p><br /><strong>Lito</strong>.',
	'i:actualizar_200-201' => 'Update to version 2.0.1',
	'i:actualizar_201-220' => 'Update to version 2.2.0',
	'i:actualizar_220-230' => 'Update to version 2.3.0',
	'i:consulta' => 'Query',
	'i:erro' => 'Error',
	'i:reintentar' => 'Try again',
	'i:omitir' => 'My configuration is correct, I want to omit this verification.<br />The PHPfileNavigator will not function correctly if these requirements are not fulfilled.',
	'admins' => 'Administrators',
	'i:aviso_default' => '<strong>WARNING:</strong> If this is a new installation, you must move the file "default-example.inc.php" to "default.inc.php" in data/conf/ folder.<br /><br />If this is a upgrade, check the "default-example.inc.php" and "default.inc.php" diferences and add to "default.inc.php" the new config values added in the last version.',
);
?>
