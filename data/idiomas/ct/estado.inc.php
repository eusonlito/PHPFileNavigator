<?php
/****************************************************************************
* data/idiomas/ct/estado.inc.php
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
	'estado.crear_dir' => array(
		'0' => 'Hi ha hagut un error creant el directori.',
		'1' => 'El directori s\\\'ha creat correctament.',
		'2' => 'Ja existeix un directori amb aquest nom.',
		'3' => 'El directori no té permisos d\\\'escriptura.',
		'4' => 'El nom té caràcters no permesos, esculli un altre nom per al directori.',
		'5' => 'Ja està superat el límit màxim de mida per a aquesta arrel.',
	),
	'estado.subir_arq' => array(
		'0' => 'Hi ha hagut un error pujant algun dels fitxers.',
		'1' => 'El fitxer ha estat pujat correctament.',
		'2' => 'El nom té caràcters no permesos, canvia el nom d\\\'aquest fitxer.',
		'3' => 'Ja existeix un fitxer amb aquest nom.',
		'4' => 'El directori destí no té permisos d\\\'escriptura.',
		'5' => 'El fitxer excedeix el pes màxim permès per a aquesta configuració.',
		'6' => 'Amb aquest fitxer se supera el límit màxim de mida per a aquesta arrel.',
		'7' => 'Amb aquest fitxer se supera el límit d\\\'ample de banda permès per a aquest mes.',
	),
	'estado.eliminar_dir' => array(
		'0' => 'No es va poder eliminar el directori complet o part del seu contingut,<br />comprovi amb l\\\'administrador els permisos sobre el mateix.',
		'1' => 'Directori eliminat correctament.',
		'2' => 'Està segur d\\\'esborrar aquest directori buit?',
		'3' => 'Aquest directori no està buit,<br />Està segur d\\\'esborrar aquest directori i tot el seu contingut?',
		'4' => 'No existeix el directori que s\\\'intenta eliminar.',
	),
	'estado.eliminar_arq' => array(
		'0' => 'No es va poder esborrar el fitxer, comprovi els permisos sobre el mateix.',
		'1' => 'Fitxer eliminat correctament.',
		'2' => 'Està segur d\\\'esborrar aquest fitxer?',
		'4' => 'No existeix el fitxer que s\\\'intenta eliminar.',
	),
	'estado.renomear' => array(
		'0' => 'No es va poder canviar el nom, comprovi els permisos sobre el fitxer.',
		'1' => 'Canvi de nom realitzat correctament.',
		'2' => 'Ja existeix un directori amb aquest nom.',
		'3' => 'Ja existeix un fitxer amb aquest nom.',
		'4' => 'El nou nom conté algun text no permès.',
	),
	'estado.mover_dir' => array(
		'0' => 'No es va poder moure el directori o part del seu contingut, comprovi els permisos sobre l\\\'origen i sobre el destí.',
		'1' => 'Directori mogut correctament.',
		'2' => 'Aquest directori no està buit,<br />Selecciona el destí per moure aquest directori i tot el seu contingut',
		'3' => 'Selecciona el destí per a aquest moure directori buit',
		'4' => 'No existeix el directori de destí.',
		'5' => 'El directori destí no té permisos d\\\'escriptura.',
		'6' => 'Ja existeix un directori amb aquest nom en el destí.',
		'7' => 'No es pot copiar un directori sobre si mateix.',
	),
	'estado.mover_arq' => array(
		'0' => 'No es va poder moure el fitxer, comprovi els permisos sobre l\\\'origen i sobre el destí.',
		'1' => 'Fitxer mogut correctament',
		'2' => 'Escull el destí per a aquest fitxer.',
		'3' => 'Ja existeix un fitxer amb el mateix nom en el directori de destí.',
		'4' => 'No existeix el directori de destí.',
		'5' => 'El directori destí no té permisos d\\\'escriptura.',
		'6' => 'S\\\'ha pogut crear una còpia en el destí, però l\\\'original no ha pogut ser eliminat.',
	),
	'estado.copiar_dir' => array(
		'0' => 'No es va poder copiar el directori o part del seu contingut, comprovi els permisos sobre l\\\'origen i sobre el destí.',
		'1' => 'Directori copiat correctament.',
		'2' => 'Aquest directori no està buit,<br />Selecciona el destí per copiar aquest directori i tot el seu contingut',
		'3' => 'Selecciona el destí per a aquest copiar directori buit',
		'4' => 'No existeix el directori de destí.',
		'5' => 'El directori destí no té permisos d\\\'escriptura.',
		'6' => 'Ja existeix un directori amb aquest nom en el destí.',
		'7' => 'No es pot copiar un directori dins de si mateix.',
		'8' => 'No es pot copiar aquest directori perquè se supera el límit per a aquesta arrel.',
	),
	'estado.copiar_arq' => array(
		'0' => 'No es va poder copiar el fitxer, comprovi els permisos sobre l\\\'origen i sobre el destí.',
		'1' => 'Fitxer copiat correctament',
		'2' => 'Selecciona el destí per a aquest fitxer.',
		'3' => 'Ja existeix un fitxer amb el mateix nom en el directori de destí.',
		'4' => 'No existeix el directori de destí.',
		'5' => 'El directori destí no té permisos d\\\'escriptura.',
		'6' => 'No es pot copiar aquest fitxer perquè supera el límit per a aquesta arrel.',
	),
	'estado.enlazar_dir' => array(
		'0' => 'No es va poder enllaçar el directori o part del seu contingut, comprovi els permisos sobre l\\\'origen i sobre el destí.',
		'1' => 'Directori enllaçat correctament.',
		'2' => 'No existeix el directori de destí.',
		'3' => 'El directori destí no té permisos d\\\'escriptura.',
		'4' => 'Ja existeix un directori amb aquest nom en el destí.',
	),
	'estado.enlazar_arq' => array(
		'0' => 'No es va poder enllaçar el fitxer, comprovi els permisos sobre l\\\'origen i sobre el destí.',
		'1' => 'Fitxer enllaçat correctament',
		'2' => 'Selecciona el destí per a aquest fitxer.',
		'3' => 'Ja existeix un fitxer amb el mateix nom en el directori de destí.',
		'4' => 'No existeix el directori de destí.',
		'5' => 'El directori destí no té permisos d\\\'escriptura.',
	),
	'estado.editar' => array(
		'0' => 'Hi ha hagut  una errada editant el fitxer.',
		'1' => 'El fitxer ha estat editat correctament.',
		'2' => 'El fitxer no té permisos d\\\'escriptura.',
		'3' => 'No existeix el fitxer a editar.',
		'4' => 'No està permès editar aquest fitxer.',
	),
	'estado.subir_url' => array(
		'0' => 'Hi ha hagut una errada amb aquesta URL',
		'1' => 'La URL demanada ha estat guardada correctament.',
		'2' => 'Ja existeix un fitxer amb aquest nom.',
		'3' => 'El directori de destí no té permisos d\\\'escriptura.',
		'4' => 'Tingui en compte que el temps d\\\'espera pot ser molt llarg si escull fitxers de molt pes.<br />Es recomana escollir sol documents de tipus text com pàgines web.',
		'5' => 'Esperi mentre es descàrrega la [URL] demanada.<br /><br />Tingui en compte que es el document demanat és molt pesat, l\\\'espera pot ser molt prolongada.',
		'6' => 'S\\\'ha anul&Acirc;�lat correctament la descàrrega d\\\'aquesta URL.',
		'7' => 'No es pot descarregar aquesta direcció perquè supera el límit per a aquesta arrel.',
		'8' => 'El nom escollit per al fitxer conté text no permès.',
		'9' => 'Amb aquest fitxer se supera el límit d\\\'ample de banda permès per a aquest mes.',
	),
	'estado.extraer' => array(
		'0' => 'No va ser possible extreure cap fitxer, pot ser que el fitxer comprimit no tingui el format correcte o que estigui danyat.',
		'1' => 'Tots els fitxers van ser extrets correctament.',
		'2' => 'El fitxer no té una extensió vàlida (tar, [gz], [gzip], [tgz]).',
		'3' => 'questa aplicació no suporta extreure aquest tipus de fitxer.',
		'4' => 'No pot ser extret, està corrupte.',
		'5' => 'Alguns fitxers no van ser extrets, ja existeixen.',
		'6' => 'Alguns fitxers no han pogut ser oberts per a escriptura.',
		'7' => 'No es va poder rematar amb l\\\'extracció perquè el contingut supera el pes màxim permès per a aquesta arrel.',
		'8' => 'Alguns fitxers contenen noms no permesos o estaven buits i no van ser extrets.',
		'9' => 'No es van poder crear alguns dels directoris necessaris per a l\\\'extracció del contingut.',
	),
	'estado.multiple_copiar' => array(
		'0' => 'No s\\\'ha pogut copiar el directori/fitxer, comprovi els permisos sobre l\\\'origen i sobre el destí:',
		'1' => 'Tots els directoris o fitxers van ser copiats correctament.',
		'2' => 'Escull el destí per als directoris o fitxers a copiar.',
		'3' => 'Ja existeix un fitxer o directori amb el mateix nom en el destí:',
		'4' => 'No existeix el directori destí per a:',
		'5' => 'El directori destí no té permisos d\\\'escriptura per a:',
		'6' => 'No es pot copiar aquest directori/fitxer perquè se supera el límit per a aquesta arrel:',
		'7' => 'Algun dels directoris o fitxers seleccionats no existeixen o no són llegibles:',
		'8' => 'La resta dels directoris i fitxers van ser copiats correctament.',
		'9' => 'No es pot copiar el directori dins de si mateix.',
	),
	'estado.multiple_eliminar' => array(
		'0' => 'No es va poder eliminar el fitxer o directori, comprovi els permisos sobre el mateix:',
		'1' => 'Tots els fitxers o directoris van ser eliminats correctament.',
		'2' => 'Està segur d\\\'eliminar tots aquests fitxers o directoris?',
		'3' => 'La resta dels fitxers o directoris van ser eliminats correctament.',
		'4' => 'No existeix el fitxer o directori que intenta eliminar:',
	),
	'estado.multiple_mover' => array(
		'0' => 'No s\\\'ha pogut moure el directori/fitxer, comprovi els permisos sobre l\\\'origen i sobre el destí:',
		'1' => 'Tots els directoris o fitxers van ser moguts correctament.',
		'2' => 'Escull el destí per als directoris o fitxers a moure.',
		'3' => 'Ja existeix un fitxer o directori amb el mateix nom en el destí:',
		'4' => 'No existeix el directori destí per a:',
		'5' => 'El directori destí no té permisos d\\\'escriptura per a:',
		'6' => 'S\\\'ha pogut crear una còpia en el destí, però l\\\'original no s\\\'ha pogut eliminar:',
		'7' => 'La resta dels directoris i fitxers van ser moguts correctament.',
		'8' => 'No es pot moure un directori dins de si mateix:',
		'9' => 'Algun dels directoris o fitxers seleccionats no existeixen o no són llegibles:',
	),
	'estado.multiple_permisos' => array(
		'0' => 'No s\\\'han pogut canviar els permisos a aquest directori/fitxer:',
		'1' => 'El canvi de permisos s\\\'ha realitzat correctament.',
		'2' => 'No existeix el fitxer o no es disposa de permisos sobre ell:',
		'3' => 'La resta de fitxers o directoris van ser canviats correctament.',
	),
	'estado.permisos' => array(
		'0' => 'No s\\\'ha pogut canviar els permisos a aquest directori/fitxer.',
		'1' => 'El canvi de permisos va ser realitzat correctament.',
		'2' => 'No existeix el fitxer o no es disposa de permisos sobre ell.',
	),
	'estado.descargar' => array(
		'0' => 'No existeix el fitxer seleccionat o no és llegible:',
		'2' => 'No es pot descarregar el fitxer actual ja que se superaria l\\\'ample de banda disponible per a aquest mes.',
		'3' => 'No s\\\'ha pogut obrir el fitxer de registre per guardar les dades de la descàrrega. Per favor revisa el directori [*$this->paths["info"]*]',
	),
	'estado.redimensionar' => array(
		'0' => 'La còpia reduïda va ser cancel&Acirc;�lada.',
		'1' => 'La còpia reduïda va ser creada correctament',
		'2' => 'La còpia reduïda va ser eliminada correctament.',
	),
	'estado.ver_comprimido' => array(
		'1' => 'El fitxer seleccionat no és un fitxer comprimit vàlid.',
	),
);
?>