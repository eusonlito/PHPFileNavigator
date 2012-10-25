<?php
/****************************************************************************
* data/idiomas/de/estado.inc.php
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
	'estado.crear_dir' => array(
		'0' => 'Fehler beim Erstellen eines Ordners.',
		'1' => 'Ordner erfolgreich erstellt.',
		'2' => 'Es existiert bereits ein Ordner mit diesem Namen.',
		'3' => 'Der angegebene Ordner hat keine Schreibrechte.',
		'4' => 'Der gew&auml;hlte Name beinhaltet nicht unterst&uuml;tzte Zeichen. Bitte w&auml;hlen Sie einen anderen.',
		'5' => 'Das Speicherplatzlimit f&uuml;r dieses Stammverzeichnis wurde bereits erreicht.',
	),
	'estado.subir_arq' => array(
		'0' => 'Fehler beim Datei-Upload.',
		'1' => 'Datei-Upload erfolgreich.',
		'2' => 'Der gew&auml;hlte Name beinhaltet nicht unterst&uuml;tzte Zeichen. Bitte &auml;ndern Sie den Namen.',
		'3' => 'Es existiert bereits eine Datei mit gleichem Namen.',
		'4' => 'Zielverzeichnis hat keine Schreibrechte.',
		'5' => 'Die Dateigr&ouml;sse &uuml;berschreitet das Limit f&uuml;r diese Konfiguration.',
		'6' => 'Die Dateigr&ouml;sse &uuml;berschreitet das maximale Limit f&uuml;r dieses Stammverzeichnis.',
		'7' => 'Die Datei &uuml;berschreitet die monatlich erlaubte Bandbreite.',
	),
	'estado.eliminar_dir' => array(
		'0' => 'Der Ordner oder ein Teil des Ordners wurden nicht vollst&auml;ndig gel&ouml;scht. Bitte wenden Sie sich an Ihren Administrator um den Ordner vollst&auml;ndig zu l&ouml;schen.',
		'1' => 'Ordner erfolgreich gel&ouml;scht.',
		'2' => 'Sind Sie sicher, dass Sie diesen leeren Ordner l&ouml;schen m&ouml;chten?',
		'3' => 'Dieser Ordner ist nicht leer. Sind Sie sicher, dass Sie diesen Ordner mit allen Inhalten l&ouml;schen m&ouml;chten?',
		'4' => 'Der Ordner, welchen Sie l&ouml;schen m&ouml;chten, existiert nicht.',
	),
	'estado.eliminar_arq' => array(
		'0' => 'Die Datei konnte nicht gel&ouml;scht werden. &Uuml;berpr&uuml;fen Sie dessen zugriffsrechte.',
		'1' => 'Datei erfolgreich gel&ouml;scht.',
		'2' => 'Sind Sie sicher, dass Sie die Datei l&ouml;schen m&ouml;chten?',
		'4' => 'Die Datei, welche Sie l&ouml;schen m&ouml;chten, existiert nicht.',
	),
	'estado.renomear' => array(
		'0' => 'Der Name konnte nicht ge&auml;ndert werden. &Uuml;berpr&uuml;fen Sie die Zugriffsrechte.',
		'1' => 'Name erfolgreich ge&auml;ndert.',
		'2' => 'Es existiert bereits ein Ordner mit gleichem Namen.',
		'3' => 'Es existiert bereits eine Datei mit gleichem Namen.',
		'4' => 'Der neue Name beinhaltet nicht unterst&uuml;tzte Zeichen.',
	),
	'estado.mover_dir' => array(
		'0' => 'Der Ordner oder ein Teil des Ordners konnte nicht verschoben werden. &Uuml;berpr&uuml;fen Sie die Zugriffsrechte und das Zielverzeichnis.',
		'1' => 'Ordner erfolgreich verschoben.',
		'2' => 'Dieser Ordner ist nicht leer. W&auml;hlen Sie ein Zielverzeichnis in welches der Ordner mit allen Inhalten verschoben werden soll.',
		'3' => 'W&auml;hlen Sie ein Zielverzeichnis in welches der leer Ordner verschoben werden soll.',
		'4' => 'Das Zielverzeichnis existiert nicht.',
		'5' => 'Das Zielverzeichnis hat keine Schreibrechte.',
		'6' => 'Das Zielverzeichnis beinhaltet bereits einen Ordner mit gleichem Namen.',
		'7' => 'Ein Ordner kann nicht in sich selbst kopiert werden.',
	),
	'estado.mover_arq' => array(
		'0' => 'Die Datei konnte nicht verschoben werden. &Uuml;berpr&uuml;fen Sie Zugriffsrecht des Quell- und Zielordners.',
		'1' => 'Datei erfolgreich verschoben.',
		'2' => 'W&auml;hlen Sie ein Zielverzeichnis f&uuml;r diese Datei.',
		'3' => 'Es existiert bereits eine DAtei mit gleichem Namen im Zielverzeichnis.',
		'4' => 'Zielverzeichnis fehlt.',
		'5' => 'Zielverzeichnis hat keine Rechte.',
		'6' => 'Ein Kopie wurde im Zielverzeichnis erstellt, die Quelldatei konnte jedoch nicht gel&ouml;scht werden.',
	),
	'estado.copiar_dir' => array(
		'0' => 'Der Ordner und ein Teil seines Inhalts konnte nicht kopiert werden. &Uuml;berpr&uuml;fen Sie die Zugriffsrechte des Quell- und Zielordners.',
		'1' => 'Ordner erfolgreich kopiert.',
		'2' => 'Dieser Ordner ist nicht leer.<br />W&auml;hlen Sie ein Zielverzeichnis in welches dieser Ordner mit seinem Inhalt kopiert werden soll.',
		'3' => 'W&auml;hlen Sie ein Zielverzeichnis in welches Sie diesen leeren Ordner kopieren m&ouml;chten.',
		'4' => 'Das Zielverzeichnis existiert nicht.',
		'5' => 'Das Zielverzeichnis verf&uuml;gt &uuml;ber keine Schreibrechte.',
		'6' => 'Es existiert bereits ein Ordner mit gleichem Namen im Zielordner.',
		'7' => 'Ein Ordner kann nicht in den gleich Ordner kopiert werden.',
		'8' => 'Der Ordner kann nicht kopiert werden, das dessen Gr&ouml;sse das Limit dieses Stammverzeichnisses &uuml;berschreitet.',
	),
	'estado.copiar_arq' => array(
		'0' => 'Die Datei konnte nicht kopiert werden. &Uuml;berpr&uuml;fen Sie die Zugriffsrecht des Quell- und Zielordners.',
		'1' => 'Datei erfolgreich kopiert.',
		'2' => 'W&auml;hlen Sie ein Zielverzeichnis f&uuml;r die Datei.',
		'3' => 'Es existiert bereits eine Datei mit gleichem Namen im Zielverzeichnis.',
		'4' => 'Das Zielverzeichnis existiert nicht.',
		'5' => 'Das Zielverzeichnis verf&uuml;gt &uuml;ber keine Schreibrechte.',
		'6' => 'Die Datei kann nicht kopiert werden, da dessen Gr&ouml;sse das Limit dieses Stammverzeichnisses &uuml;berschreitet.',
	),
	'estado.enlazar_dir' => array(
		'0' => 'Der Ordner oder ein Teil des Ordners konnte nicht gepackt werden. &Uuml;berpr&uuml;fen Sie die Zugriffsrechte des Quell- und Zielordners.',
		'1' => 'Ordner erfolgreich gepackt.',
		'2' => 'Der Ordner des Zielverzeichnisses existiert nicht.',
		'3' => 'Das Zielverzeichnis hat keine Schreibrechte.',
		'4' => 'Es existiert bereits ein Ordner mit gliechem Namen im Zielverzeichnis.',
	),
	'estado.enlazar_arq' => array(
		'0' => 'Die Datei konnte nicht gepackt werden. &Uuml;berpr&uuml;fen Sie die Zugriffsrechte im Quell- und Zielordner.',
		'1' => 'Datei erfolgreich gepackt.',
		'2' => 'W&auml;hlen Sie ein Zielverzeichnis f&uuml;r die Datei.',
		'3' => 'Es existiert bereits eine Datei mit gleichem Namen im Zielverzeichnis.',
		'4' => 'Das Zielverzeichnis existiert nicht.',
		'5' => 'Das Zielverzeichnis hat keine Schreibrechte.',
	),
	'estado.editar' => array(
		'0' => 'Fehler beim editieren der Datei',
		'1' => 'Datei erfolgreich ge&auml;ndert.',
		'2' => 'Die Datei hat keine Schreibrechte.',
		'3' => 'Die Datei existiert nicht.',
		'4' => 'Es ist nicht gestattet diese Datei zu &auml;ndern.',
	),
	'estado.subir_url' => array(
		'0' => 'Fehler mit dieser URL.',
		'1' => 'Die URL wurde korrekt gespeichert.',
		'2' => 'Eine Datei mit gleichem Namen existiert bereits.',
		'3' => 'Das Zielverzeichnis hat keine Schreibrechte.',
		'4' => 'Wenn Sie grosse Dateien w&auml;hlen kann die Wartezeit sehr lang sein. Es wird empfohlen Textdateien, wie zum Beispiel Internetseiten, zu w&auml;hlen.',
		'5' => 'Bitte warten Sie w&auml;hrend die angeforderte URL herungergeladen wird.<br /><br />Falls die angeforderte Datei sehr gross ist kann die Wartezeit sehr lang sein.',
		'6' => 'Der URL-Downloadprozess wurde erfolgreich abgebrochen.',
		'7' => 'Die angegebene Adresse konnte nicht heruntergeladen werden weil das G&ouml;ssenlimit f&uuml;r das gew&auml;hlte Stammverzeichnis zu gross ist.',
		'8' => 'Der gew&auml;hlte Dateiname beinhaltet nicht erlaubte Zeichen.',
		'9' => 'Mit dieser Datei wird das monatliche Transferlimit &uuml;berschritten.',
	),
	'estado.extraer' => array(
		'0' => 'Es ist nicht m&ouml;glich Dateien zu entpacken. Die komprimierte Datei ist anscheinendn besch&auml;digt oder weist das falsche Format auf.',
		'1' => 'Alle Dateien wurden erfolgreich entpackt.',
		'2' => 'Die Datei hat eine ung&uuml;ltige Erweiterung (tar, gz, gzip, tgz).',
		'3' => 'Diese Anwendung unterst&uuml;tzt keine Extraktionen dieses Dateityps.',
		'4' => 'Konnte nicht entpackt werden, Datei besch&auml;digt.',
		'5' => 'Einige Dateien konnte nicht entpackt werden, weil diese bereits existieren.',
		'6' => 'Einige Dateien konnten nicht f&uuml;r Schreibzugriff ge&ouml;ffnet werden.',
		'7' => 'Die Dekomprimierung konnte, aufgrund Speicherlimit&uuml;berschreitung diese Stammverzeichnissses, nicht fertiggestellt werden.',
		'8' => 'Einige Dateien haben unerlaubte Dateinamen oder sind leer und wurden daher nicht entpackt.',
		'9' => 'Einige Ordner, welche f&uuml;r die Dekomprimierung des Inhalts erforderlich sind, konnten nicht erstellt werden.',
	),
	'estado.multiple_copiar' => array(
		'0' => 'Der/Die Ordner/Datei konnte nicht kopiert werden. &Uuml;berpr&uuml;fen Sie die Zugriffsrechte des Quell- und Zielordners.',
		'1' => 'Alle Ordner oder Dateien wurden korrekt kopiert.',
		'2' => 'W&auml;hlen Sie ein Zielverzeichnis in welche die Ordner oder Dateien kopiert werden sollen.',
		'3' => 'Eine Datei oder ein Ordner mit gleichem Namen existiert bereits im Zielverzeichnis.',
		'4' => 'Das Zielverzeichnis existiert nicht f&uuml;r:',
		'5' => 'Das Zielverzeichnis besitzt keine Schreibrechte f&uuml;r:',
		'6' => 'Diese/r Ordner/Datei kann nicht kopiert werden, da dieser das Speicherlimit f&uuml;r diese Stammverzeichnis &uuml;berschreitet.',
		'7' => 'Einige von den gew&auml;hlten Ordnern oder Dateien existieren nicht oder sind nicht lesbar.',
		'8' => 'Der Rest der Ordner und Dateien wurden erfolgreich kopiert.',
		'9' => 'Der Ordner kann nicht in sich selbst kopiert werden.',
	),
	'estado.multiple_eliminar' => array(
		'0' => 'Die Datei oder der Ordner konnte nicht gel&ouml;scht werden. &Uuml;berpr&uuml;fen Sie die Zugriffsrechte des Zielordners.',
		'1' => 'Alle Dateien oder Ordner wurden erfolgreich gel&ouml;scht.',
		'2' => 'Sind Sie sicher, dass Sie alle gew&auml;hlten Dateien oder Ordner l&ouml;schen m&ouml;chten?',
		'3' => 'Der Rest der Dateien oder Ordner wurden erfolgreich gel&ouml;scht.',
		'4' => 'Die Datei, welche Sie l&ouml;schen m&ouml;chten existiert nicht.',
	),
	'estado.multiple_mover' => array(
		'0' => 'Die/Der Datei/Ordner konnte nicht verschoben werden. &Uuml;berpr&uuml;fen Sie die Zugriffsrechte des Quell- und Zielordners.',
		'1' => 'Alle Ordner oder Dateien wurden erfolgreich verschoben.',
		'2' => 'W&auml;hlen Sie ein Zielverzeichnis f&uuml;r die Ordner oder Dateien welche verschoben werden sollen.',
		'3' => 'Eine Datei oder ein Ordner mit gleichem Namen existiert bereits im Zielverzeichnis.',
		'4' => 'Das Zielverzeichnis existiert nicht f&uuml;r:',
		'5' => 'Das Zielverzeichnis besitzt eine Schreibrechte f&uuml;r:',
		'6' => 'Eine Kopie des Ziels wurde erstellt, die Quelle konnte jedoch nicht gel&ouml;scht werden.',
		'7' => 'Der Rest der Ordner und Dateien wurden erfolgreich verschoben.',
		'8' => 'Ein Ordner kann nicht in sich selbst verschoben werden.',
		'9' => 'Einige der gew&auml;hlten Ordner oder Dateien existieren nicht oder sind nicht lesbar.',
	),
	'estado.multiple_permisos' => array(
		'0' => 'Die Zugriffsrechte der Ordner/Dateien konnten nicht ge&auml;ndert werden.',
		'1' => 'Zugriffsrechte erfolgreich ge&auml;ndert.',
		'2' => 'Datei existiert nicht oder hat keine Zugriffsrechte:',
		'3' => 'Der Rest der Dateien oder Ordner wurden korrekt ge&auml;ndert.',
	),
	'estado.permisos' => array(
		'0' => 'Die Zugriffsrechte der Ordner/Dateien konnten nicht ge&auml;ndert werden.',
		'1' => 'Zugriffsrechte erfolgreich ge&auml;ndert.',
		'2' => 'Datei existiert nicht oder hat keine Zugriffsrechte.',
	),
	'estado.descargar' => array(
		'0' => 'Die gew&auml;hlte Datei existiert nicht oder ist nicht lesbar.',
		'2' => 'Das aktuelle Stammverzeichnis konnte nicht heruntergeladen werden, da der Vorgang das Transferlimit f&uuml;r diese Woche &uuml;berschreiten w&uuml;rde.',
		'3' => 'Die Registrierungsdatei konnte nicht, zum Speichern der heruntergeladenen Daten, ge&ouml;ffnet werden. Bitte &uuml;berpr&uuml;fen Sie das [*$this->paths["info"]*] Verzeichnis.',
	),
	'estado.redimensionar' => array(
		'0' => 'Das Erstellen des Vorschaubildes wurde abgebrochen.',
		'1' => 'Das Vorschaubild wurde erfolgreich erstellt.',
		'2' => 'Das Vorschaubild wurde erfolgreich gel&ouml;scht.',
	),
	'estado.ver_comprimido' => array(
		'1' => 'Die gew&auml;hlte Datei ist eine ung&uuml;ltige komprimierte Datei.',
	),
	'estado.novo_arq' => array(
		'0' => 'Die Datei konnte nicht erstellt werden. &Uuml;berpr&uuml;fen Sie die Schreibrechte im Ordner.',
		'1' => 'Die Datei wurde erfolgreich erstellt.',
		'2' => 'Eine Datei mit gleichem Namen existiert bereits.',
		'3' => 'Der Name der neuen Datei ist ung&uuml;ltig.',
		'4' => 'Der Ordner in welchem Sie die Datei speichern m&ouml;chten besitzt keine Schreibrechte.',
		'5' => 'Der Name der neuen Datei wurde nicht angegeben.',
		'6' => 'Mit dieser Datei wird das Speicherlimit f&uuml;r dieses Stammverzeichnis &uuml;berschritten.',
		'7' => 'Mit dieser Datei wird das montalich erlaubte Transferlimit &uuml;berschritten.',
	),
	'estado.preferencias' => array(
		'0' => 'Fehler beim &Auml;ndern der User-Einstellungen. Bitte versuchen Sie es nochmals. Falls der Fehler wieder auftritt kontaktieren Sie bitte den Administrator.',
		'1' => 'Die Einstellungen wurde korrekt ge&auml;ndert.',
		'2' => 'Das Feld "Name" muss ausgef&uuml;llt werden.',
		'3' => 'Die L&auml;nge des Passworts muss mindestens 8 Zeichen betragen. Zahlen und Buchstaben sind erlaubt.',
		'4' => 'Die Passw&ouml;rter stimmen nicht &uuml;berein.',
	),
	'estado.redimensionar_dir' => array(
		'0' => 'Der Ordner beinhaltet kein g&uuml;ltiges Bild.',
		'1' => 'Alle Bilder wurde erfolgreich bearbeitet.',
		'2' => 'Fehler bei einigen Bildern. Positionsindex ung&uuml;ltig.',
	),
	'estado.correo' => array(
		'0' => 'Das Mail konnte nicht gesendet werden. Das Problem kann in der Konfiguration von PHP liegen.',
		'1' => 'Das Mail wurde erfolgreich versendet.',
		'2' => 'Das Feld "Titel" darf nicht leer sein.',
		'3' => 'Das Feld "Nachricht" darf nicht leer sein.',
		'4' => 'Das Feld "F&uuml;r" darf nicht leer sein.',
		'5' => 'Einige Adressen im "F&uuml;r"-Feld sind nicht korrekt:',
		'6' => 'Alle E-Mailadressen sind fehlerhaft.',
		'7' => 'Es ist nicht m&ouml;glich die gew&auml;hlte Datei anzuh&auml;ngen. &Uuml;berpr&uuml;fen Sie die Existenz der Datei und ob diese Leserechte besitzt.',
		'8' => 'Problem beim erstellen der Nachricht. M&ouml;glicherweise konnt die Datei nicht als Anhang gesendet werden.',
		'9' => 'Es ist nicht erluabt die Datei zu versenden, da der Vorgang das monatlich erlaubte Transferlimit &uuml;berschreiten w&uuml;rde.',
		'10' => 'Es ist nicht erlaubt diese Datei zu versenden, da diese das Limit von [*PFN_peso($this->g("limite_correo"))*] &uuml;berschreiten w&uuml;rde.',
	),
);
?>