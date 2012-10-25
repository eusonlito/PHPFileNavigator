<?php
/****************************************************************************
* data/idiomas/ct/instalar.inc.php
*
* Textos para el idioma Català
*

PHPfileNavigator versi�n 2.1.0

Copyright (C) 2004-2005 Lito <lito@eordes.com>

http://phpfilenavigator.litoweb.net/

Este programa es software libre. Puede redistribuirlo y/o modificarlo bajo los
t�rminos de la Licencia P�blica General de GNU seg�n es publicada por la Free
Software Foundation, bien de la versi�n 2 de dicha Licencia o bien (seg�n su
elecci�n) de cualquier versi�n posterior.

Este programa se distribuye con la esperanza de que sea �til, pero SIN NINGUNA
GARANT�A, incluso sin la garant�a MERCANTIL impl�cita o sin garantizar la
CONVENIENCIA PARA UN PROP�SITO PARTICULAR. V�ase la Licencia P�blica General de
GNU para m�s detalles.

Deber�a haber recibido una copia de la Licencia P�blica General junto con este
programa. Si no ha sido as�, escriba a la Free Software Foundation, Inc., en
675 Mass Ave, Cambridge, MA 02139, EEUU.
*******************************************************************************/

defined('OK') or die();

return array(
	'benvido' => 'Benvingut a l\\\'instal&Acirc;�lador de PHPfileNavigator',
	'idioma' => 'Idioma',
	'email' => 'Email de l\\\'Administrador',
	'gd2' => 'Suport de llibreries GD2',
	'zlib' => 'Suport de llibreries Zlib',
	'si' => 'Si',
	'non' => 'No',
	'enviar' => 'Enviar',
	'base_datos' => 'Dades de la Base de Dades',
	'host' => 'Host',
	'db_nome' => 'Base de Dades',
	'nome' => 'Nom',
	'usuario' => 'Usuari',
	'contrasinal' => 'Contrasenya',
	'db_prefixo' => 'Prefixe de les Taules',
	'administrador' => 'Dades de l\\\'Administrador',
	'rep_contrasinal' => 'Repetir Contrasenya',
	'raiz' => 'Dades de l\\\'Arrel Inicial',
	'ra_path' => 'Ruta absoluta',
	'ra_web' => 'Ruta des de la Web',
	'ra_conf' => 'Fitxer de Configuració',
	'avisos_instalacion' => 'Avisos de la Instal&Acirc;�lació',
	'erros' => array(
		'1' => 'Base de Dades: Falta el HOST',
		'2' => 'Base de Dades: Falta el NOM de la base de dades',
		'3' => 'Base de Dades: Falta l\\\' USUARI',
		'4' => 'Administrador: Falta el NOM',
		'5' => 'Administrador: Falta l\\\' USUARI',
		'6' => 'Administrador: Falta la CONTRASENYA',
		'7' => 'Administrador: Les contrasenyes són diferents',
		'8' => 'Arrel Inicial: Falta el Nom',
		'9' => 'Arrel Inicial: Falta la RUTA ABSOLUTA',
		'10' => 'Arrel Inicial: Falta la RUTA WEB',
		'11' => 'Arrel Inicial: Falta el HOST',
		'12' => 'Arrel Inicial: Falta el FITXER DE CONFIGURACIÓ',
		'13' => 'Falta EMAIL',
		'14' => 'Arrel Inicial: No existeix el directori RUTA ABSOLUTA',
		'15' => 'Arrel Inicial: El directori RUTA ABSOLUTA no té permisos d\\\' escriptura',
		'16' => 'Arrel Inicial: No existeix el FITXER DE CONFIGURACIÓ',
		'17' => 'Base de DaDES: Les dades de connexió HOST, NOM o CONTRASENYA no són correctes',
		'18' => 'Base de Dades: No existeix la base de dades NOM',
		'19' => 'El directori data/conf/ ha de tenir permisos d\\\'escriptura',
		'20' => 'Aquesta aplicació ja va ser instal&Acirc;�lada amb anterioritat, si torna a executar la instal&Acirc;�lació, eliminarà tots les dades emmagatzemades en les taules de Mysql.<br /> <br /> Si no vol tornar a instal&Acirc;�lar aquesta aplicació, per favor esborri el directori <i>instal&Acirc;�lar/</i>',
		'21' => 'El directori tmp/ ha de tenir permisos d\\\'escriptura.',
		'22' => 'El directori data/logs/ ha de tenir permisos d\\\'escriptura.',
		'23' => 'El directori data/info ha de tenir permisos d\\\'escriptura.',
		'24' => 'No existeix una instal&Acirc;�lació anterior que actualitzar el fitxer data/conf/basicas.inc.php no té permisos d\\\'escriptura.',
		'25' => 'Amb l\\\'actualització des d\\\'una versió anterior a 2.0.0 i posterior a 1.5.7, es faran canvis a la base de dades que no afectaran al contingut, a més de la lògica actualització i millores  en els fitxers que componen aquesta aplicació.<br /> <br /> Per dur a terme una correcta instal&Acirc;�lació, només ha de sobreescriure la instal&Acirc;�lació anterior amb aquesta, tenint cura de mantenir les configuracions de data/conf/defaults.inc.php, i tot serà instal&Acirc;�lat correctament.<br /> <br /> Tingui en compte que el fitxer de configuracions data/conf/defaults.inc.php pot contenir variables de configuració més recentes que les que disposa la versió instal&Acirc;�lada actualment, revisi aquests canvis i sobreescrigui el fitxer anterior amb el nou inclòs en aquesta versió.',
		'26' => 'No es realitzarà cap operació per a la instal&Acirc;�lació.<br /> <br /> Si disposa d\\\'una versió igual a 2.0.0 sol ha de sobreescriure la instal&Acirc;�lació anterior amb aquesta, tenint cura de mantenir les configuracions de data/conf/defaults.inc.php, i tot serà instal&Acirc;�lat correctament.<br /> <br /> Tingui en compte que el fitxer de configuracions data/conf/defaults.inc.php pot contenir variables de configuració més recents que les que disposa la versió instal&Acirc;�lada actualment, revisi aquest canvis i sobreescrigui el fitxer anterior amb el nou inclòs en aquesta versió.',
		'27' => 'El fitxer data/conf/basicas.inc.php no té permisos d\\\'escriptura',
		'28' => 'Cal seleccionar un joc de caràcters',
		'29' => 'Alguna de les consultes ha tornat un error. Intenti llançar de nou la instal&Acirc;�lació.',
		'30' => 'No es pot actualitzar des d\\\'una versió igual o superior a la d\\\'aquest paquet. Per favor revisi que la versió ja instal&Acirc;�lada no és la mateixa que la que està intentant instal&Acirc;�lar.',
	),
	'axuda' => array(
		'accion' => 'Pots seleccionar la manera d\\\'instal&Acirc;�lació.<br /> <br /> <strong>Instal&Acirc;�lació: </strong>permet realitzar una instal&Acirc;�lació des de zero, buidant les taules en cas que ja existissin i reescrivint els fitxers de configuració.<br /> <strong>Actualitzar des de versió > 1.5.7 i < 2.0.0: </strong>permit la instal&Acirc;�lació de la aplicació sense perdre les dades emmagatzemades en la base de dades ni els fitxers de configuració.  A més modificarà automàticament l\\\'estructura de les taules que varien i completarà les configuracions noves.<br />  <strong>No fer res: </strong>no modifica la base de dades ni varia les dades de configuració existents.',
		'idioma' => 'Pots seleccionar l\\\'idimoa que desitges per a la instal&Acirc;�lació i ús del PHPfileNavigator.',
		'gd2' => 'Si el servidor disposa de les llibreries de tractament gràfic GD2, per permetre crear còpies d\\\'imatges reduïdes de bona qualitat.',
		'zlib' => 'Si el servidor disposa de les llibreries per a compressió i descompressió de fitxers.',
		'charset' => 'El joc de caràcters que desitges usar. El normal és que coincideixi amb el servidor.',
		'db_host' => 'El servidor en què està instal&Acirc;�lat el Mysql. <strong>p.e..: localhost</strong>',
		'db_nome' => 'El nom de la base de dades on serà instal&Acirc;�lat. <strong>Ha d\\\'existir en el moment de la instal&Acirc;�lació.</strong>',
		'db_usuario' => 'L\\\'usuari mitjançant el qual s\\\'accedirà a la base de dades. Ha de tenir permisos de creació i modificació de taules.',
		'db_contrasinal' => 'Contrasenya d\\\'accés de l\\\'usuari a la base de dades.',
		'db_rep_contrasinal' => 'Repetir la contrasenya anterior.',
		'db_prefixo' => 'Prefix per a les taules. Així evitaràs que es puguin sobreescriure d\\\'altres ja existents amb el mateix nom.',
		'ad_nome' => 'Nom comú de l\\\'usuari administrador.',
		'ad_usuario' => 'Usuari amb què accedirà a l\\\'aplicació.',
		'ad_contrasinal' => 'Contrasenya d\\\'accés de l\\\'usuari al PHPfileNavigator.',
		'ad_rep_contrasinal' => 'Repetir la contrasenya anterior.',
		'ad_email' => 'Correu electrònic de l\\\'administrador. A aquest correu arribaran les alertes de seguretat per intents d\\\'instrusió o problemes d\\\'accés.',
		'ra_nome' => 'Nom genèric per a aquesta arrel. Serveix per a identificar-la en llistat d\\\'arrels i en cas que tinguis accés a més d\\\'una. <strong>p.e.: Arrel Principal</strong>',
		'ra_path' => 'La ruta del directori que es va a gestionar. Ha de ser l\\\'absoluta des de l\\\'arrel del servidor. Després podràs crear més arrels d\\\'accés.<br /> Recorda que has d\\\'usar / en comptes del sistema windows. <strong>p.e.: /var/www/html/docs/</strong>',
		'ra_web' => 'La ruta d\\\'accés per web des de l\\\'arrel del domini. <strong>p.e.: /docs/</strong>',
		'ra_host' => 'Nom del domini que es va a gestionar. Sense http. <strong>p.e.: www.midominio.com</strong>',
		'raices_atopadas' => 'S\\\'han trobat les següents arrels que seran configurades.',
		'usuarios_atopados' => 'Aquesta és la relació d\\\'usuari amb un determinat grup. En l\\\'actualització podràs seleccionar només entre aquesta llista, però una vegada acabada podràs gestionar tots els usuaris i grups de manera més completa.',
		'configuracions_atopadas' => 'Fitxers de configuració trobats. En la nova zona d\\\'administrador et permetrà duplicar, modificar o eliminar configuracions així com assignar-les per grups i arrels.',
		'aviso_instalacion' => 'Si es marca aquesta opció s\\\'enviarà al desenvolupador del PHPfileNavigator un correu d\\\'avís de nova instal&Acirc;�lació en el qual es remetrà únicament el correu electrònic de l\\\'administrador i el host en què va ser instal&Acirc;�lat. <strong>No s\\\'enviarà</strong> cap tipus d\\\'informació personal com rutes, dades d\\\'usuari o contrasenyes. Això et permet estar informat de les noves versions o avisos de seguretat.<br />Pots revisar el codi d\\\'enviament del correu en el fitxer instal&Acirc;�lar/index.php entre les línies 84 i 100.',
	),
	'instalacion_correcta' => 'El PHPfileNavigator s\\\'ha instal&Acirc;�lat de manera correcta.<br /> <br />Per iniciar el seu ús ha d\\\'esborrar el directori instalar/ o es tornarà a carregar la pantalla d\\\'instal&Acirc;�lació.<br /> <br />Moltes gràcies per usar aquesta aplicació.',
	'accion' => 'Acció',
	'a:instalar' => 'Instal.lar',
	'a:actualizar_168' => 'Actualitzar des de versió > 1.5.7 i < 2.0.0',
	'a:nada' => 'No fer res',
	'usuarios' => 'Usuaris',
	'charset' => 'Joc de caràcters',
	'datos_xerais' => 'Dades Genèriques',
	'raices_atopadas' => 'Arrels Trobades',
	'usuarios_atopados' => 'Usuaris Trobats',
	'admins' => 'Administradors',
	'configuracions_atopadas' => 'Configuracions Trobades',
	'doazon' => 'Si t\\\'agrada aquesta aplicació o serà usada en una empresa o integrada en un projecte no gratuït, per favor realitza una donació. Gràcies!!!!!',
	'aviso_instalacion' => 'Avís d\\\'instal.lació',
);
?>