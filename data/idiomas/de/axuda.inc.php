<?php
/****************************************************************************
* data/idiomas/de/axuda.inc.php
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
	'h1_quero_facer' => 'Was m&ouml;chten Sie tun?',
	'tit_crear_dir' => 'Neuer Ordner',
	'txt_crear_dir' => 'Um einen Ordner zu erstellen, klicken Sie auf die Option <strong><img src="[*$this->g("estilo")*]imx/crear_dir.png" alt="Neuer Ordner" /> Neuer Ordner</strong>. Danach f&uuml;llen Sie die gew&uuml;nschten Felder aus. Name ist ein Pflichtfeld.',
	'tit_subir_arq' => 'Dateiupload',
	'txt_subir_arq' => 'Um eine Datei auf den Server zu laden klicken Sie die Option <strong><img src="[*$this->g("estilo")*]imx/subir_arq.png" alt="Dateiupload" /> Dateiupload</strong>. Danach f&uuml;llen Sie die gew&uuml;nschten Felder aus. Name ist ein Pflichtfeld.<br /><br />Falls Sie ein Bild auf den Server laden m&ouml;chten, stehen Ihnen zwei Optionen zur Verf&uuml;gung um ein Vorschaubild zu erstellen. <strong>Vorschaubild</strong',
	'tit_subir_url' => 'Dateitransfer von anderem Server',
	'txt_subir_url' => 'Um eine, auf einem anderen Server existente, Datei zu transferieren, klicken Sie zuerst auf die Option <strong><img src="[*$this->g("estilo")*]imx/subir_url.png" alt="Dateitransfer" /> Dateitransfer</strong>.<br /><br />Anschlie&szlig;end schreiben Sie die <strong>URL-Adresse</strong> von der zu transferierenden Datei (vollst&auml;ndige Adresse - z.B.: <i>http://phpfilenavigator.litoweb.net/index.php</i> )',
	'tit_miniaturas' => 'Vorschaubilder in Dateiliste anzeigen',
	'txt_miniaturas' => 'Sie m&uuml;ssen nur die obere Option <strong><img src="[*$this->g("estilo")*]imx/ver_imaxes.png" alt="Vorschau" /> Vorschau</strong> w&auml;hlen um die Bilder als Vorschaubild, in der Dateiliste, angezeigt zu bekommen.',
	'tit_arbore' => 'Betrachten aller Dateien und Ordner auf einer Seite',
	'txt_arbore' => 'Um den Inhalt des Stammordners aufzurufen, klicken Sie auf <strong><img src="[*$this->g("estilo")*]imx/arbore.png" alt="Baumansicht" /> Baumansicht</strong>. Falls Sie zus&auml;tzlich alle Dateien jedes Ordners betrachten m&ouml;chten, klicken Sie auf die rechte Option <strong>[Kompletten Baum]</strong>.',
	'tit_buscar' => 'Suchen einer Datei oder eines Texts in den Beschreibungen',
	'txt_buscar' => 'Es gibt zwei M&ouml;glichkeiten nach Dateien zu suchen. Die Erste ist die <strong>Suche</strong> im oberen Men&uuml;, bei der zweiten schreiben Sie einen Teil des Dateinamens in das Suchfeld <strong>Suche:</strong> und klicken auf das Lupensymbol.<br /><br />Bei diesem Suchfeld m&uuml;ssen Sie nur einen Text, welcher in zu suchenden/m Datei oder Ordner vorkommt, oder in einer Beschreibung, eingeben. Anschlie&szlig;end w&auml;hlen Sie wo gesucht werden soll (im aktuellen Ordner oder im Stammverzeichnis) und klicken danach auf <strong>Akzeptieren</strong>. Unterhalb wird, nach erfolgter Suche, das Ergebnis angezeigt.',
	'tit_accions' => 'Aktionen mit nur einer Datei oder Ordner ausf&uuml;hren, wie zum Beispiel: kopieren, verschieben, l&ouml;schen,...',
	'txt_accions' => 'Aus der Spalte <strong>Aktionen</strong>, welche am Ende jeder Zeile angezeigt wird, k&ouml;nnen Sie eine Aktion Ihrer Wahl, &uuml;ber jede Datei oder &uuml;ber jeden Ordner  ausf&uuml;hren.<br /><br />Die Spalte erm&ouml;glicht es, falls Sie Zugriffsrechte besitzen, Aktionen wie: <strong>Information anzeigen</strong>, <strong>Kopieren</strong>, <strong>Verschieben</strong>, <strong>Umbenennen</strong>, <strong>L&ouml;schen</strong>, <strong>Zugriffsrechte &auml;ndern</strong> or <strong>Download</strong>.',
	'tit_accions_multiple' => 'Aktionen mit mehreren Dateien und Ordnern',
	'txt_accions_multiple' => 'Wenn Sie &uuml;ber die n&ouml;tigen Rechte verf&uuml;gen, d&uuml;rfen Sie spezielle Aktionen mit mehreren gew&auml;hlten Dateien und Verzeichnissen gleichzeitig ausf&uuml;hren. Aktionen welche Sie ausf&uuml;hren k&ouml;nnen sind: <strong>Kopieren</strong>, <strong>Verschieben</strong>, <strong>L&ouml;schen</strong>, <strong>Zugriffsrechte &Auml;ndern</strong> und <strong>Download</strong>.',
	'h1_accions' => 'Welche Aktionen k&ouml;nnen mit den aufgelisteten Dateien oder Ordnern ausgef&uuml;hrt werden?',
	'txt_info' => '<strong>Informationen anzeigen: </strong>Diese Option erm&ouml;glicht es detaillierte Informationen, wie Dateigr&ouml;sse, Erstellungsdatum, Zugriffsrechte und zus&auml;tzliche Informationen wie Titel und Beschreibung, abzurufen und diese mit Hilfe von Eingabefeldern zu &auml;ndern.',
	'txt_copiar' => '<strong>Kopieren:</strong> Kopiert eine Datei oder einen Ordner an eine gew&auml;hlte Stelle. Im Falle eines Ordners wird der gesamte Inhalt kopiert.',
	'txt_mover' => '<strong>Verschieben: </strong>Verschieben eine Datei oder einen Ordner an eine gew&auml;hlte Stelle. Im Falle eines Ordners wird der gesamte Inhalt verschoben.',
	'txt_renomear' => '<strong>Umbenennen: </strong>Umbenennen einer Datei oder eines Ordners.',
	'txt_eliminar' => '<strong>L&ouml;schen: </strong>L&ouml;scht eine Datei oder einen Ordner mitsamt Inhalt.',
	'txt_permisos' => '<strong>Rechte: </strong>&Auml;ndert die Rechte einer Datei oder eines Ordners',
	'txt_descargar' => '<strong>Dateidownload: </strong> Ladet eine Datei auf einen Computer. Alle Zugriffe gez&auml;hlt und gespeichert.',
	'txt_comprimir' => '<strong>Packen: </strong>Packt eine Datei oder einen Ordner und dessen Inhalte um beim herunterladen Bandbreite einzusparen.',
	'txt_redimensionar' => '<strong>Gr&ouml;&szlig;en&auml;nderung von Bildern: </strong> Erstellt von einem gew&auml;hlten Bild ein weiteres Bild mit kleineren Abmessungen.',
	'txt_extraer' => '<strong>Entpacken: </strong> Entpackt komprimierte Dateien folgender Typen: TAR/GZ/TGZ/GZIP. Es wird der gesamte Inhalt mit der Ordnerstruktur entpackt. Dateien mit ung&uuml;ltigem Namen k&ouml;nnen nicht verarbeitet werden der Vorgang wird jedoch abgeschlossen.',
	'txt_ver_contido' => '<strong>Inhalt anzeigen: </strong>Zeigt den Inhalt von editierbaren Textdateien an. Falls es sich bei der Datei um eine \\\'Internetdatei\\\' (z.B.: PHP oder HTML) handelt, wird der Quelltext farbig hervorgehoben.',
	'txt_editar' => '<strong>&Auml;ndern: </strong>&Auml;ndern von Inhalten von Textdateien',
	'h1_accions_multiple' => 'Welche Aktionen k&ouml;nnen, bei Auswahl von mehreren Dateien und/oder Ordnern, gleichzeitig ausgef&uuml;hrt werden?',
	'txt_multiple_copiar' => '<strong>Kopieren: </strong>Kopiert mehrere Dateien und Verzeichnisse gleichzeitig. Im Falle eines Fehlers wird der Kopiervorganng fortgesetzt und anschlie&szlig;end eine Zusammenfassung angezeigt.',
	'txt_multiple_mover' => '<strong>Verschieben: </strong>Verschiebt mehrere Dateien und Verzeichnisse gleichzeitig. Im Falle eines Fehlers wird der Verschiebevorganng fortgesetzt und anschlie&szlig;end eine Zusammenfassung angezeigt.',
	'txt_multiple_eliminar' => '<strong>L&ouml;schen: </strong>L&ouml;scht mehrere Dateien und Verzeichnisse gleichzeitig. Im Falle eines Fehlers wird der L&ouml;schvorganng fortgesetzt und anschlie&szlig;end eine Zusammenfassung angezeigt.',
	'txt_multiple_permisos' => '<strong>Rechte &auml;ndern: </strong>&Auml;ndert Zugriffsrechte mehrere Dateien und Verzeichnisse gleichzeitig. Im Falle eines Fehlers wird der &Auml;nderungsvorganng fortgesetzt und anschlie&szlig;end eine Zusammenfassung angezeigt.',
	'txt_multiple_comprimir' => '<strong>Paket Download: </strong>Erlaubt alle selektierten Dateien und Ordner in ein komprimiertes ZIP-Paket zu speichern um Bandbreite zu sparen.',
	'h1_problemas' => 'Wie kann das Problem gel&ouml;st werden?',
	'tit_problema_subir_arq' => 'Kein Datei-Upload oder URL-Upload m&ouml;glich',
	'txt_problema_subir_arq' => 'Falls es Ihnen nicht m&ouml;glich ist oder eine URL hochzuladen, &uuml;berpr&uuml;fen Sie ob gen&uuml;gend Speicherplatz zur Verf&uuml;gung steht. In diesem Fall erscheint unten auf der Seite zum Beispiel folgende Meldung: <strong>Freier Speicher: XX MB</strong>, welche den freien Speicherplatz im aktuellen Stammverzeichnis anzeigt.',
	'tit_problema_crear_dir' => 'Es k&ouml;nnen keine Ordner erstellt werden',
	'txt_problema_crear_dir' => 'Die h&auml;ufigste Ursache f&uuml;r die Verweigerung des Rechtes einen Ordner zu erstellen, ist das fehlende Zugriffsrecht im aktuellen Verezeichnis. Aus diesem Grund wird eine Warnmeldung ausgegeben um das Problem zu verdeutlichen. Bitte kontaktieren Sie Ihren Administrator.',
	'tit_problema_buscador' => 'Die Suche konnte nicht finden',
	'txt_problema_buscador' => 'Falls die Suchfunktion die Datei, welche Sie suchen, nicht finden kann und Sie wissen, dass diese existiert, wenden Sie sich an Ihren Administrator um alle INhalte neu zu indizieren.',
	'tit_problema_miniaturas' => 'Miniaturbilder werden nicht angezeigt',
	'txt_problema_miniaturas' => 'Wenn Sie auf <img src="[*$this->g("estilo")*]imx/ver_imaxes.png" alt="Bilder betrachten" /> Miniaturbilder</strong> klicken werden die Miniaturbilder, welche von den gr&ouml;&szlig;eren Versionen stammen, nicht angezeigt, weil Sie diese noch nicht erstellt haben. Um dies vorzunehmen klicken Sie auf <strong>Informationen anzeigen</strong> beim gew&auml;hlten Bild und klicken Sie dann auf <strong>Miniaturbild erstellen</strong>. Dies erstellt eine Kopie des gew&auml;hlten Bildes.',
	'tit_problema_paxinar' => 'Der Ordnerinhalt wird nicht vollst&auml;ndig angezeigt',
	'txt_problema_paxinar' => 'Wenn ein Verzeichnis zu viele Eintr&auml;ge hat (mehr als [*$this->g("paxinar")*] Dateien oder Unterordner) wird das Ergebnis abgeschnitten. Am unteren Ende der Liste wird eine zus&auml;tzliche Navigation angezeigt welche es erm&ouml;glicht die restlichen Resultate anzuzeigen.',
	'tit_problema_sesion' => 'Nach einiger Zeit, in der Dateimanager nicht verwendet wird, werde ich automatisch ausgeloggt.',
	'txt_problema_sesion' => 'Der Grund f&uuml;r dieses Verhalten ist ein Zeitlimit f&uuml;r jede Sitzung um unerlaubten Zugriff zu vermeiden. Normalerweise dauert eine Sitzung im Leerlauf eine halbe Stunde. Falls Sie nicht m&ouml;chten, dass Ihre Sitzung abl&auml;uft, so m&uuml;ssen Sie von Zeit zu Zeit die Seite neu laden (F5).',
);
?>