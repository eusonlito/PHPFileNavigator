<?php
/****************************************************************************
* data/idiomas/de/instalar.inc.php
*
* Textos para el idioma German
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
	'benvido' => 'Willkommen zur PHPfileNavigator Installation',
	'idioma' => 'Sprache',
	'email' => 'Administrator E-Mail',
	'gd2' => 'GD2 library Unterst&uuml;tzung',
	'zlib' => 'ZLIB library Unterst&uuml;tzung',
	'si' => 'Ja',
	'non' => 'Nein',
	'enviar' => 'Senden',
	'base_datos' => 'Datenbank Information',
	'host' => 'Host',
	'db_nome' => 'Datenbank',
	'nome' => 'Name',
	'usuario' => 'User',
	'contrasinal' => 'Passwort',
	'db_prefixo' => 'Tabellenprefix',
	'administrador' => 'Administrator Daten',
	'rep_contrasinal' => 'Passwort wiederholen',
	'raiz' => 'Hauptstammverzeichnisdaten',
	'ra_path' => 'Absoluter Pfad',
	'ra_web' => 'Internetpfad',
	'ra_conf' => 'Konfigurationsdatei',
	'avisos_instalacion' => 'Installationswarnung',
	'erros' => array(
		'1' => 'Datenbank: Hostname fehlt',
		'2' => 'Datenbank: Datenbankname fehlt',
		'3' => 'Datenbank: User fehlt',
		'4' => 'Administrator: Name fehlt',
		'5' => 'Administrator: User fehlt',
		'6' => 'Administrator: Passwort fehlt',
		'7' => 'Administrator: Passw&ouml;rter sind unterschiedlich',
		'8' => 'Hauptstammverzeichnis: Name fehlt',
		'9' => 'Hauptstammverzeichnis: Absoluter Pfad fehlt',
		'10' => 'Hauptstammverzeichnis: Internetpfad fehlt',
		'11' => 'Hauptstammverzeichnis: Hostname fehlt',
		'12' => 'Hauptstammverzeichnis: Konfigurationsdatei fehlt',
		'13' => 'E-mailadresse fehlt',
		'14' => 'Hauptstammverzeichnis: Absoluter Pfad existiert nicht',
		'15' => 'Hauptstammverzeichnis: Absoluter Pfad besitzt keine Schreibrechte',
		'16' => 'Hauptstammverzeichnis: Konfigurationsdatei existiert nicht',
		'17' => 'Datenbank: Hostname, Name oder Passwort sind nicht korrekt',
		'18' => 'Datenbank: Datenbank nicht gefunden',
		'19' => 'Der Ordner data/conf/ ben&ouml;tigt Schreibrechte',
		'20' => 'Diese Anwendung wurde bereits installiert, falls Sie nochmals installieren m&ouml;chten, werden alle Daten in den MySQL-Tabellen gel&ouml;scht. (Akzeptieren um die Daten zu aktualisieren)<br /><br />Wenn Sie nicht erneut installieren m&ouml;chten, l&ouml;schen Sie den Ordner <i>instalar/</i>.',
		'21' => 'Der Ordner tmp/ ben&ouml;tigt Schreibrechte',
		'22' => 'Der Ordner data/logs/ ben&ouml;tigt Schreibrechte',
		'23' => 'Der Ordner data/info/ ben&ouml;tigt Schreibrechte',
		'24' => 'Keine fr&uuml;here Version gefunden um Update auszuf&uuml;hren oder die Datei data/conf/basicas.inc.php ben&ouml;tigt Schreibrechte.',
		'25' => 'Durch ein Update von einer Version zwischen 1.5.7 bis 2.0.0, werden &Auml;nderungen in der Datenbankstruktur durchgef&uuml;hrt ohne den Inhalt zu ver&auml;ndern. Auch nicht das logische Update und die Verbesserungen in den Programmdateien.<br /><br />Um eine korrekte Installation zu erstellen, &uuml;berschreiben Sie einfach die Vorg&auml;ngerversion mit dieser. Achten Sie beim &Uuml;berschreiben auf die Datei data/conf/defaults.inc.php um richtig zu installieren.<br /><br />&Uuml;berpr&uuml;fen Sie vor dem &Uuml;berschreiben die Datei data/conf/defaults.inc.php auf etwaige Einstellungs&auml;nderungen, welche vorgenommen wurden.',
		'26' => 'Keine Aktion ausgef&uuml;hrt.<br /><br />Falls Sie die Version 2.2.0 installiert haben muss nur die Installation &uuml;berschrieben werden. Achten Sie beim &Uuml;berschreiben auf die Datei data/conf/defaults.inc.php um richtig zu installieren.<br /><br />&Uuml;berpr&uuml;fen Sie vor dem &Uuml;berschreiben die Datei data/conf/defaults.inc.php auf etwaige Einstellungs&auml;nderungen, welche vorgenommen wurden.',
		'27' => 'Die Datei data/conf/basicas.inc.php ben&ouml;tigt Schreibrechte.',
		'28' => 'W&auml;hlen Sie einen Zeichensatz',
		'29' => 'Einige Fehler bei Pr&uuml;fung. Starten Sie die Installation erneut.',
		'30' => 'Mit einer gleichen oder h&ouml;heren Version kann nicht aktualisiert werden. Bitte &uuml;berpr&uuml;fen Sie die installierte Version ob diese nicht die gleiche ist.',
		'31' => 'Diese Anwendung wird von Version >2.0.0 und <2.2.0 aktualisiert<br /><br />&Uuml;berpr&uuml;fen Sie vor dem &Uuml;berschreiben die Datei data/conf/defaults.inc.php auf etwaige Einstellungs&auml;nderungen, welche vorgenommen wurden.',
	),
	'axuda' => array(
		'accion' => 'W&auml;hlen Sie eine Installationsoption:<br /><br /><strong>Installation: </strong>Erstellt eine neue Installation, l&ouml;scht Tabellen in der Datenbank falls diese existieren und &uuml;berschreibt Konfigurationsdateien.<br /><strong>Update von Version >1.5.7 und <2.0.0:</strong><br /><strong>Update von Version < 2.2.0: </strong> Update einer Vorg&auml;ngerversion auf 2.2.0 und neuer als 2.0.0<br /><strong>Nichts unternehmen: </strong>Keine &Auml;nderungen an der Datenbank und Konfigurationsdateien.',
		'idioma' => 'W&auml;hlen Sie die Sprache welche PHPfileNavigator benutzen soll.',
		'gd2' => 'GD2 libraries, um Bilder zu verwalten und Vorschaubilder guter Qualit&auml;t zu erstellen, sind installiert.',
		'zlib' => 'ZLIB libraries, um Dateien zu De-/Komrimieren, sind installiert.',
		'charset' => 'Server-Zeichensatz. Normalerweise wird der des Servers verwendet.',
		'db_host' => 'MySQL-Server. <strong>z.B.: localhost</strong>',
		'db_nome' => 'Datenbankname f&uuml;r die Installation. <strong>Muss vor der Installations existieren.</strong>',
		'db_usuario' => 'MySQL User mit Zurgiff auf die Datenbank. Dieser muss Zugriffsrechte, um Tabellen zu erstellen und zu ver&auml;ndern, haben.',
		'db_contrasinal' => 'Passwort diesen User f&uuml;r Zugriff.',
		'db_rep_contrasinal' => 'Wiederholung des Passworts.',
		'db_prefixo' => 'Tabellenprefix. Dadurch wird vermieden andere, gleichnamige Tabellen zu &uuml;berschreiben.',
		'ad_nome' => 'Administrator Name.',
		'ad_usuario' => 'Username f&uuml;r Anmeldung.',
		'ad_contrasinal' => 'Passwort f&uuml;r Administrator.',
		'ad_rep_contrasinal' => 'Wiederholung Passwort.',
		'ad_email' => 'Administrator Em-Mail. Zugriffsprobleme und Sicherheitswarnungen werden an diese Adresse gesendet.',
		'ra_nome' => 'Gew&auml;hlter Name f&uuml;r dieses Stammverzeichnis. Erm&ouml;glicht die Identifizierung in einer Liste anderer Stammverzeichnisse falls Sie Zugriff auf mehrere haben. <strong>z.B.: Main Root</strong>',
		'ra_path' => 'Absoluter Pfad vom Server Stammverzeichnis. Bevor Stammverzeichnisse erstellt werden k&ouml;nnen. Es muss ein Slash ( / ) anstatt eines Backslash (  ) verwendet werden. <strong>z.B.: /var/www/html/docs/</strong>',
		'ra_web' => 'Internet Pfad vom Domain-Stammverzeichnis. <strong>z.B.: /docs/</strong>',
		'ra_host' => 'Domainname. Ohne http <strong>z.B.: www.mydomain.com</strong>',
		'raices_atopadas' => 'Folgende Stammverzeichnisse werden konfiguriert.',
		'usuarios_atopados' => 'Verbindung mit einer Gruppe. Bei einem Update kann nur aus dieser Liste gew&auml;hlt werden, wobei alle gruppen und user verwaltet werden k&ouml;nnen.',
		'configuracions_atopadas' => 'Konfigurationsdatei erstellt. Im neuen Administratorbereich k&ouml;nnen Konfigurationsdateien erstellt, ge&auml;ndert oder gel&ouml;scht werden und Gruppen und Stammverzeichnisse zugewiesen werden.',
		'aviso_instalacion' => 'Bei Wahl dieser Option wird ein E-Mail an die Entwickler von PHPfileNavigator, mit Installationshinweisen, geschickt. Es wird nur die Administrator E-Mailadresse und der Hostname versendet. <strong>Senden Sie keine</strong> pers&ouml;nlichen Informationen, wie Pfadangaben, Userdaten oder Passw&ouml;rter! Dies erm&ouml;glicht Ihnen &uuml;ber neuer Informationen oder Sicherheitsratschl&auml;ge auf dem laufenden gehalten zu werden.<br /><br />Der Mail-Quelltext kann in der Datei instalar/index.php, zwischen den Zeilen 84 und 100, nachgelesen werden.',
	),
	'instalacion_correcta' => 'PHPfileNavigator wurde korrekt installiert.<br /><br />Der Ordner instalar/ muss nun gel&ouml;scht werden um die Installation abzuschlie&szlig;en.',
	'accion' => 'Aktion',
	'a:instalar' => 'Installieren',
	'a:actualizar_168' => 'Update von Version > 1.5.7 und < 2.0.0',
	'a:actualizar_211' => 'Update von Version < 2.2.0',
	'a:nada' => 'Nichts unternehmen',
	'usuarios' => 'User',
	'charset' => 'Zeichensatz',
	'datos_xerais' => 'Gew&auml;hlte Daten',
	'raices_atopadas' => 'Erstellte Stammverzeichnisse',
	'usuarios_atopados' => 'Erstellte User',
	'admins' => 'Administratoren',
	'configuracions_atopadas' => 'Erstellte Konfigurationsdateien',
	'doazon' => 'Wenn Ihnen diese Anwendung gef&auml;llt oder in einem Unternehmen eingesetzt wird oder in einem kommerziellen Projekt eingesetzt wird, machen Sie bitte eine Spende, DANKE!!!!!',
	'aviso_instalacion' => 'Installationshinweis',
);
?>