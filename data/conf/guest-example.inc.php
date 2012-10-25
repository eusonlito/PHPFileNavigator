<?php
/*******************************************************************************
* data/conf/default.inc.php
*
* Contiene las variables de configuracion generales
*

PHPfileNavigator version 2.1.0

Copyright (C) 2004-2005 Lito <lito@eordes.com>

http://phpfilenavigator.litoweb.net/

Este programa es software libre. Puede redistribuirlo y/o modificarlo bajo los
terminos de la Licencia Publica General de GNU segun es publicada por la Free
Software Foundation, bien de la version 2 de dicha Licencia o bien (segun su
eleccion) de cualquier version posterior. 

Este programa se distribuye con la esperanza de que sea util, pero SIN NINGUNA
GARANTIA, incluso sin la garantia MERCANTIL implicita o sin garantizar la
CONVENIENCIA PARA UN PROPOSITO PARTICULAR. Vease la Licencia Publica General de
GNU para mas detalles. 

Deberia haber recibido una copia de la Licencia Publica General junto con este
programa. Si no ha sido asi, escriba a la Free Software Foundation, Inc., en
675 Mass Ave, Cambridge, MA 02139, EEUU. 
*******************************************************************************/

defined('OK') or die();

/* Carga la configuracion por defecto */
/* Charge the default configuration */
return array(
	// Protocolo | Protocol
	'protocolo' => 'http://',

	// Maximo uso de memoria (Se usara para acciones como descarga comprimida,
	// acciones multiples o redimension de imagenes) (sin limite = -1)
	// Max memory usage (Used in actions like compressed download, extract file,
	// multiple actions with files o thumbnail creation) (without limit = -1)
	'memoria_maxima' => -1,

	// Maximo tiempo de ejecucion de un script (Se usara para acciones como
	// descarga comprimida, acciones multiples o redimension de imagenes)
	// (sin limite = -1)
	// Max script execution time (Used in actions like compressed download, extract
	// file, multiple actions with files o thumbnail creation) (without limit = -1)
	'tempo_maximo' => 300,

	// Formato de fecha | Date format
	'data' => 'H:i d-m-Y',

	// Numero de directorios/ficheros por pagina
	// Number of directories/files by page
	'paxinar' => 50,

	// Direccion destino cando se pulsa en Salir
	// Where do you go when click in 'exit'?
	'saida' => 'index.php',

	// Permitir mantener sesion cuando se pulsa en salir
	// true = mantener, false = borrar
	// Allow to maintain the session when click in exit
	// true = maintain, false = delete
	'manter_sesion' => false,

	// Los ficheros y directorios que coincidan con las siguientes
	// expresiones no se listaran ni se podran crear o subir
	// Es case sensitive y debe ser un array
	// The directories and files that agree with this regular expressions
	// don't will appear and not be possible to be uploaded nor to be created
	// It's case sensitive and mus be an array
	'oculto' => array('^\.','\.php(s|[3-9])?$','\.phtml$','\.pl$','\.cgi$','\.inc$'),

	// Permite mostrar el peso real de los ficheros o el peso que ocupan en disco
	// teniendo en cuenta que el tamanho del bloque son 4 Kb, que seria lo minimo
	// que ocupa un fichero en disco
	// Allow list files with real weight or weight that occupies on hard disk
	// considering that the block size is 4 Kb, that would be the minimum that
	// occupies a file on disk
	// true = real size | false = disk size
	'peso_real' => false,

	// Permite ordenar los ficheros y directorios sin distinguir entre mayusculas
	// y minusculas y con orden natural: 1,2,11,21,100
	// orde natural = true, orden sistema = false
	// Allow sort files and folder with case insensitive and natural order:
	// 1,2,11,21,100
	// natural order = true, system order = false
	'orde_natural' => true,

	// Comprobacion de nombres de ficheros y directorios, en caso de que se
	// encuentre con errores, sustituye por alternativos:
	//	true: Fuerte comprobacion, no permite espacios, tildes,
	//				simbolos raros, ...
	//	false: Permite espacios, tildes, y algun que otro simbolo raro
	// Check the names of directories and files, in case that one is
	// with errors, it replaces by alternative chars:
	//	true: Strong check, don't allow spaces, accents, rare symbols, ...
	//	false: Allow spaces, accents and some rare symbols
	'nome_riguroso' => false,

	// confirmacion de eliminacion de ficheros y directorios
	// Confirm delete files and directories
	'confirmar_eliminar' => true,

	// Formatos permitidos para la descompresion de ficheros en caso de que en
	// el array de permisos "extraer" => true,
	// Debe ser un array
	// Valores posibles ('tar','bzip'), tar siempre es posible
	// Files that allow to extract in case that in array "extraer" => true
	// posibles values ('tar','bzip'), tar always is possible
	// Must be an array
	'valen_extraer' => array('tar','gzip'),

	// Opcion por defecto para cuando pulsas en un fichero de la lista.
	// Las posibilidades son:
	// descargar : Fuerza la descarga del fichero en el disco duro
	// enlace : Accede al fichero directamente igual que si escribe su url
	// ver : Intenta abrir el fichero en el navegador y sino puede, lo
	// abre con la aplicación por defecto para esa tipo de ficheros
	// Default option to download method when click in a file
	// descargar : Force download file to hard disk
	// enlace : Go directly to the URL's file
	// ver : Try to open the file with the browser or with the default
	// application to this file type
	'descarga_defecto' => 'ver',

	// En la visualización de los permisos de ficheros y directorios,
	// define si se enseña en formato numérico "775" = true
	// o texto "rwxrwxr-x" = false
	// In the file and folder permissions, define if show the numeric
	// value "775" = true or text value "rwxrwxr-x" = false
	'permisos_num' => true,

	// Permite previsualizar el contenido de un directorio en el
	// listado pulsando el enlace de "DIR". PRECAUCION: esto consume
	// más procesador, uso de disco y memoria
	// Allow preview the folder content in the list clicking the
	// "DIR" link. CAUTION: It's comsume more CPU, disk and memory usage
	'ver_subcontido' => true,

	// Límite de peso para los ficheros enviados por correo como adjuntos
	// Size limit to file sended in an email like attachment
	'limite_correo' => 1024*1024*5, // 5 Megas

	// Listado de extensiones que permiten modificacion del contenido
	// Debe ser un array
	// Extensions of files that allow edit
	// Must be an array
	'editables' => array('','txt','nfo','log','ini','html','htm'
		,'cfg','conf','sql','js','css','dat'),

	// Guardar registros de log para acciones y/o errores MySQL
	// Pon el nombre del fichero a crear o false para desactivar el registro
	// de log (false sin comillas). Se debe usar la extension .php para que
	// los ficheros de logs no puedan ser vistos desde web.
	// Save log with actions and/or MySQL errors, put name of log file to create
	// or false if disable log (false without inverted commas). You must use
	// .php extension to log files to not allow view from web.
	'logs' => array(
		'mysql' => 'mysql.php', // false
		'accions' => 'accions.php'
	),

	// Permite marcar si los usuarios de una raíz recibirán avisos al
	// realizarse alguna de las siguientes acciones
	// Allow decide if the users in a root will recive notify in the next acctions
	'avisos' => array(
		'subida' => true, // Cuando se sube un fichero / When a file is uploaded
	),

	// Tiempo durante el que se mantienen los registros estadísticos de usuarios
	// Time during is mantained the users stats
	'logs_usuarios' => 1, // En Meses / In Mounths

	// Columnas que se enseñaran en los listados
	// Columns to show in the list
	'columnas' => array (
		'multiple' => true, // Allow multiple actions with files and folders
		'tipo' => true, // Extension
		'tamano' => true, // Size
		'data' => true, // Data
		'permisos' => true, // Permissions
		'accions' => true // Actions
	),

	// Permisos para la realizacion de acciones, o visulazación de
	// las opciones del menú
	// Perms to do actions or view menu options
	'permisos' => array(
		'info' => true, // File/folder info
		'eliminar' => false, // Delete
		'mover' => false, // Move
		'copiar' => false, // Copy
		'enlazar' => false, // System Link (don't work)
		'descargar' => true, // Download
		'renomear' => false, // Rename
		'crear_dir' => true, // Create directory
		'subir_arq' => true, // Upload file
		'novo_arq' => true, // Edit
		'redimensionar' => false, // Create thumbnails
		'redimensionar_dir' => false, // Create thumbnails with all images in a folder
		'redimensionar_dir_accion' => false, // If redimensionar_dir is true this must be true
		'comprimir' => true, // Download Compressed
		'ver_comprimido' => true, // View Compressed content
		'ver_contido' => true, // View Content
		'editar' => false, // Edit text file
		'subir_url' => true, // Upload URL
		'extraer' => false, // Extract compressed file in server
		'permisos' => false, // Cambio de permisos / Chmod change
		'correo' => true, // Envío de ficheros por correo / Send a file in a mail
		'multiple_copiar' => false, // Multi copy
		'multiple_mover' => false, // Multi move
		'multiple_eliminar' => false, // Multi delete
		'multiple_permisos' => false, // Multi change perms
		'multiple_descargar' => true, // Multi download zip
		'buscador' => true, // Search
		'arbore' => true, // Directories tree // Árbol de directorios
		'ver_imaxes' => true, // Thumbnails preview // Previsualizar imágenes
		'axuda' => true, // Help option / Opción de ayuda
		'sair' => true, // Exit option / Opción de salir
	),

	// Configuracion de la ventana de informacion
	// Information window configuration
	'info' => array(
		// Datos a mostrar en la ventana de informacion extendida
		// descricion: informacion adicional
		// formulario: formulario para cambiar la informacion adicional
		// enlaces: listado de enlaces del archivo relacionado
		// protexer: permitem crear un fichero .htpasswd (solo administradores)
		//	 con usuario y contrasenha de acceso para acceder desde web
		// Debe ser un array
		// Data to show in the window of extended information
		// descricion: show the aditional information for files/directories
		// formulario: form to change the aditional information
		// enlaces: listing of links of the related file
		// protexer: allow create a .htpasswd (only admin) with user and password
		//	 to access from web
		// Must be an array
		'capas' => array('descricion','formulario','protexer'),
	),

	// Informacion a almacenar cuando se sube un fichero o crea un directorio
	// Information to save when upload a file or create a directory
	'inc' => array(
		// Sistema de informacion adicional para los dir/file activo/desactivo
		// Enable/Disable the additional information to files/directories
		'estado' => true,
		// Limite de ficheros a subir en un solo formulario
		// Limit list of files to upload
		'limite' => 5,
		// Limite de peso para cada fichero a subir en BYTES
		// Size limit by file in BYTES
		'peso' => 1024*1024*100,
		// Campo titulo para creacion de enlaces
		// Field title to links creation
		'tit_enlaces' => 'titulo',
		// Informacion comun que se pide para directorios y ficheros
		// Tipo de campo, Nombre del campo,
		// Ensenhar en listado de navegacion, Ancho en formulario, Alto en formulario
		// Information common that you can write to files and directories
		// Field kind, field name, shown in main list, width in form, height in form
		'comun' => array(
			0 => array(
				'tipo' => 'text',
				'nome' => 'titulo',
				'listado' => true,
				'ancho' => 300,
				'alto' => 0
			),
			1 => array(
				'tipo' => 'textarea',
				'nome' => 'descricion',
				'listado' => false,
				'ancho' => 300,
				'alto' => 65
			),
			2 => array(
				'tipo' => 'hidden',
				'nome' => 'usuario',
				'listado' => false
			),
		),
		// Informacion que se pide para directorios
		// Information specific to the directories
		'dir' => array(),
		// Informacion que se pide para ficheros
		// Information specific to the files
		'arq' => array(),
		// Informacion que se pide para las URL's
		// Information specific to the URL's
		'url' => array(),
		// Permitir indexar el contenido de los ficheros de informacion adicional
		// Allow indexed the additional information files data
		'indexar' => true,
		// Campos a indexar
		// Debe ser un array
		// Fields to indexed
		// Must be an array
		'campos_indexar' => array('titulo','descricion'),
	),

	// Preferencias para el tratamiento de imagenes,
	// Comprobar librerias GD
	// Customize the image treatment (check GD library)
	'imaxes' => array(
		// Ensenhar en el listado la previsualizacion para los
		// siguientes tipos de imagenes
		// Debe ser un array
		// Alow image preview to the files with extension
		// Must be an array
		'listado' => array('jpeg','jpg','gif','png'),
		// Alto e ancho del sello para la previsualizacion
		// de imagenes en el listado
		// Width and Height to the image preview in the main list
		'sello' => 60,
		// Creacion de copias reducidas
		// Allow create reduced copies (thumbnail's)
		'pequena' => true,
		// Compatiblidad con tratamiento de imagenes
		// Debe ser un array
		// Posibles valores: 1 = GIF, 2 = JPG, 3 = PNG, 4 = SWF, 
		// 5 = PSD, 6 = BMP, 7 = TIFF, 8 = TIFF, 9 = JPC, 10 = JP2, 
		// 11 = JPX, 12 = JB2, 13 = SWC, 14 = IFF
		// Alow create a thumbnail to extensions:
		// Must be an array
		'validas' => array(1,2,3),
		// Opcion por defecto para las copias reducidas (solo cuando los fichero
		// a subir son imagen, en caso contrario la aplicacion omite esta opcion)
		//	 false: no realizara ninguna accion sobre la imagen
		//	 reducir: realizara una copia pequenha sin preguntar
		//	 recortar: nos permitira seleccionar la zona de la imagen
		//		 que necesitamos para realizar la copia pequenha
		// Default option to the thumbnail (only when the file to upload is
		// a image, in opposite case the application omits this option)
		//	 false: don't do anything
		//	 reducir: create an auto thumbnail
		//	 recortar: allow create a custom thumbnail
		'defecto' => 'reducir',
		// Ancho maximo de la copia reducida
		// Max thumbnail width
		'ancho' => 150,
		// Alto maximo de la copia reducida
		// Max thumbnail height
		'alto' => 150,
		// Calidad de la copia en %
		// Thumbnail cuality in %
		'calidade' => 95,
	),
);
?>
