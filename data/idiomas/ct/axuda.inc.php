<?php
/****************************************************************************
* data/idiomas/ct/axuda.inc.php
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
	'h1_quero_facer' => 'Què vull fer?',
	'tit_crear_dir' => 'Crear un directori',
	'txt_crear_dir' => 'Per crear un directori has de clicar en primer lloc en l\\\'opció de <strong><img src="[*$this->g("estilo")*]imx/crear_dir.png" alt="Crear un Directori" /> Crear un Directori</strong>.<br />Una vegada fet això, has de cobrir els camps requerits, encara que obligatori només és el nom.',
	'tit_subir_arq' => 'Pujar un fitxer',
	'txt_subir_arq' => 'Per pujar un fitxer has de clicar en primer lloc en l\\\'opció superior de <strong><img src="[*$this->g("estilo")*]imx/subir_arq.png" alt="Pujar Fitxer" /> Pujar Fitxer</strong>.<br />Una vegada fet això, has de cobrir els camps requerits, [aúnque] obligatori sol és la selecció del propi fitxer a pujar.<br /><br />Si el que volem pujar és una imatge, ens dóna dues opcions per crear una còpia en miniatura de la imatge al camp de <strong>Imatge reduïda</strong>, en cas contrari fem cas omís d\\\'aquesta opció.',
	'tit_subir_url' => 'Agafar un document d\\\'una web',
	'txt_subir_url' => 'Per pujar un document ja existent en una altra web, has de clicar en primer lloc en l\\\'opció de <strong><img src="[*$this->g("estilo")*]imx/subir_url.png" alt="Pujar URL" /> Pujar URL</strong>.<br />Una vegada fet això ens demanarà que escriguem la <strong>Direcció URL</strong> que volem emmagatzemar, tingueu en compte que ha de ser una direcció completa, per exemple millor <i>http://phpfilenavigator.litoweb.net/index.php</i> que <i>http://phpfilenavigator.litoweb.net</i>, ja que pot fallar]en aquest últim cas, després de la Direcció URL ens demana <strong>Nom del fitxer a crear</strong> on hem de posar un nom que ens permeti identificar-lo clarament més endavant, com <i>Web del PHPfileNavigator</i>.',
	'tit_miniaturas' => 'Veure les imatges en petit en el llistat de fitxers',
	'txt_miniaturas' => 'Només has de clicar en l\\\'opció superior de <strong><img src="[*$this->g("estilo")*]imx/ver_imaxes.png" alt="Ver Imágenes" /> Miniatures</strong> per poder veure les imatges en miniatura quan navegues pels llistats de fitxers.',
	'tit_arbore' => 'Veure tots els fitxers i directoris en una sola pàgina',
	'txt_arbore' => 'Per poder veure tot el contingut d\\\'una arrel d\\\'una sola vegada, deus clicar en l\\\'opció superior de <strong><img src="[*$this->g("estilo")*]imx/arbore.png" alt="Árbol" /> Arbre de Directoris</strong>, amb el que s\\\'ensenyarà tots els directoris de l\\\'arrel. Si a més desitges veure els fitxers de cada directori, sol has de clicar en l\\\'opció de la dreta <strong>Arbre Complert</strong>  amb el que es llistarà el contingut íntegre de l\\\'arrel en la qual et trobes.',
	'tit_buscar' => 'Buscar un fitxer o un text en les seves metes',
	'txt_buscar' => 'Tens dues opcions per buscar un fitxer, la primera és mitjançant l\\\'opció del menú superior de <strong>Cercador</strong> i la segona, més ràpida, escrivint part del nom al camp de <strong>Busca:</strong> i clicant després en la lupa.<br /><br />En aquesta pantalla del formulari de recerca sol has d\\\'escriure el text pertanyent al fitxer o directori que desitges trobar, escollir on ho desitges buscar (en aquest directori o en tota l\\\'arrel), en els camps on desitges buscar el text i polsar el botó de <strong>Acceptar</strong>. Llavors veuràs sota del formulari tots els resultats trobats.',
	'tit_accions' => 'Alguna acció amb molts fitxers o directoris a la vegada',
	'txt_accions' => 'Si disposes dels permisos necessaris, podràs realitzar una sèrie d\\\'accions amb múltiples fitxers i directoris alhora. Les accions que es poden realitzar són <strong>Copiar</strong>, <strong>Moure</strong>, <strong>Eliminar</strong>, <strong>Canviar permisos</strong> i <strong>Descarregar</strong>. Per a això sol necessites marcar els camps de revisió "<input type="checkbox" class="checkbox" />" de la primera columna i després escollir una acció de les quals apareixen en el peu del llistat.',
	'tit_accions_multiple' => 'Alguna acció amb molts fitxers o directoris a la vegada',
	'txt_accions_multiple' => 'Si disposes dels permisos necessaris, podràs realitzar una sèrie d\\\'accions amb múltiples fitxers i directoris alhora. Les accions que es poden realitzar són <strong>Copiar</strong>, <strong>Moure</strong>, <strong>Eliminar</strong>, <strong>Canviar permisos</strong> i <strong>Descarregar</strong>. Per a això sol necessites marcar els camps de revisió "<input type="checkbox" class="checkbox" />" de la primera columna i després escollir una acció de les quals apareixen en el peu del llistat.',
	'h1_accions' => 'Quines accions puc realitzar sobre cada fitxer o directori llistat?',
	'txt_info' => '<strong>Veure Informació: </strong>Aquesta opció permet conèixer dades de detall com la mida, data de creació, permisos o dades referents a informació addicional com títol i descripció, a més d\\\'un formulari per poder modificar aquestes dades.',
	'txt_copiar' => '<strong>Copiar: </strong>Permet realitzar la còpia d\\\'un fitxer o directori en el destí escollit, en cas de ser un directori, copiarà tot el contingut en el destí.',
	'txt_mover' => '<strong>Moure: </strong>Permet moure una carpeta o directori per a un destí escollit dins de l\\\'arrel actual. El fitxer o directori seleccionat es copiarà primer per al destí i després s\\\'eliminarà l\\\'original.',
	'txt_renomear' => '<strong>Reanomenar: </strong>Permet canviar-li el nom a un fitxer o directori.',
	'txt_eliminar' => '<strong>Eliminar: </strong>Elimina completament un fitxer o un directori i tot el seu contingut.',
	'txt_permisos' => '<strong>Permisos: </strong>Permet el canvi de permisos reals d\\\'un fitxer o directori.',
	'txt_descargar' => '<strong>Descarregar Fitxer: </strong>Força la descàrrega d\\\'un fitxer per al nostre ordinador. Totes les descàrregues realitzades són computades en ample de banda usat i també el quantitat de vegades descarregat.',
	'txt_comprimir' => '<strong>Comrpimir: </strong>Comprimeix un fitxer o un directori i tot el seu contingut per ser descarregat com fitxer únic estalviant així ample de banda, a causa que el pes serà inferior que en una descàrrega normal.',
	'txt_redimensionar' => '<strong>Còpia Reduïda d\\\'Imatge: </strong>Permet crear una imatge en petit a partir de l\\\'altra. La còpia reduïda resultant podrà ser, sen es decideixi, una còpia exacta proporcional però en petit de la imatge original o [bin] es podrà seleccionar una part de la imatge original per crear la còpia reduïda.',
	'txt_extraer' => '<strong>Descomprimir: </strong>Permet descomprir un fitxer empaquetat amb TAR/[GZ]/[TGZ]/[GZIP]. Extreu tot el contingut reconegut creant una estructura exacta a l\\\'original de fitxers i directoris. Pot ser que algun dels fitxers no sigui extret perquè el seu nom no és vàlid, però continuarà amb la resta de la llista.',
	'txt_ver_contido' => '<strong>Veure Contingut: </strong>Permet veure el contingut d\\\'un fitxer de text [editable]. En cas de ser un format de fitxer usat per a web (com PHP o HTML) acolorirà el codi.',
	'txt_editar' => '<strong>Editar: </strong>Permet modificar el contingut d\\\'un fitxer de text.',
	'h1_accions_multiple' => 'Quines accions puc realitzar sobre molts fitxers o directoris a la vegada?',
	'txt_multiple_copiar' => '<strong>Copiar: </strong>Permet la còpia de múltiples fitxers i directoris d\\\'una sola vegada. Continuarà la còpia encara que es produeixi un error copiant algun d\\\'ells i després informarà del resultat.',
	'txt_multiple_mover' => '<strong>Moure: </strong>Permet moure múltiples fitxers i directoris d\\\'una sola vegada. Mourà els seleccionats encara que es produeixi un error movent algun d\\\'ells i després informarà del resultat.',
	'txt_multiple_eliminar' => '<strong>Eliminar: </strong>Permet esborrar múltiples fitxers i directoris d\\\'una sola vegada. Continuarà el procés encara que es produeixi un error esborrant algun d\\\'ells i després informarà del resultat.',
	'txt_multiple_permisos' => '<strong>Canvi de Permisos: </strong>Permet canviar els permisos a múltiples fitxers i directoris d\\\'una sola vegada. Continuarà el procés encara que es produeixi un error canviant algun d\\\'ells i després informarà del resultat.',
	'txt_multiple_comprimir' => '<strong>Descarregar empaquetat: </strong>Permet la descàrrega de tots els fitxers i directoris seleccionats en un sol paquet comprimit per estalviar ample de banda. El fitxer creat serà en format ZIP.',
	'h1_problemas' => 'Com soluciono aquest problema?',
	'tit_problema_subir_arq' => 'No puc pujar un fitxer o una URL',
	'txt_problema_subir_arq' => 'Si no pots pujar un fitxer ni una URL cal que miris en primer lloc si disposes de suficient espai en disc per a guardar-ho. Per comprovar això, en el peu de la pàgina ha d\\\'aparèixer alguna cosa com <strong>Espai lliure: XX MB</strong> que indica el límit de pes per guardar en aquesta arrel. En cas de no aparèixer aquest indicador, omet aquest avís.<br /><br />Una altra possible causa és que aquest directori no tingui permisos d\\\'escriptura per al usuari servidor web, en aquest cas deus posar-te en contacte amb l\\\'administrador web per a indicar-l\\\'hi. En qualsevol cas, quan ocorre un error pujant un fitxer o [URL], es visualitzarà un avís amb la possible causa.',
	'tit_problema_crear_dir' => 'No puc crear un directori',
	'txt_problema_crear_dir' => 'La causa més freqüent per no permetre crear un directori és que el lloc on ho volem crear no té permisos d\\\'escriptura. Quan això ocorre ensenyarà una advertència amb el possible problema. Si aquest problema no pot ser solucionat per l\\\'usuari, per favor contacta amb l\\\'Administrador.',
	'tit_problema_buscador' => 'El cercador no em troba el que busco',
	'txt_problema_buscador' => 'Si el cercador no troba el fitxer que busques i que saps que sí que existeix en l\\\'arrel en la qual et trobes, demana-li a l\\\'Administrador que torni a indexar el contingut de tu arrel per actualitzar les dades de relacions emmagatzemats.',
	'tit_problema_miniaturas' => 'No veig les imatges en miniatura',
	'txt_problema_miniaturas' => 'Si quan polses en <strong><img src="[*$this->g("estilo")*]imx/ver_imaxes.png" alt="Ver Imágenes" /> Miniatures</strong>  en el llistat no apareixen les imatges en miniatura d\\\'altres grans, això significa que encara no les has creat. Per a això deus clicar en el botó de <strong>Veure Informació</strong> de la imatge seleccionada i després [pulsamos] en <strong>Còpia Reduïda de la Imatge</strong> on podem crear una còpia personalitzada o una proporcional reduïda.',
	'tit_problema_paxinar' => 'No veig tot el contingut d\\\'un directori',
	'txt_problema_paxinar' => 'Quan un directori és molt extens (més de [*$this->g("paxinar")*]  fitxers o directoris) el resultat és paginat. Per poder navegar en les pàgines següents o anteriors, en el peu del llistat tenim una llista desplegable per poder escollir la pàgina en la qual volem situar-nos.',
	'tit_problema_sesion' => 'Quan porto un cert temps sense realitzar cap moviment en la pàgina, acaba expulsant-me',
	'txt_problema_sesion' => 'Això és a causa que la durada de la sessió té una caducitat per evitar accessos d\\\'altres persones molt després que hagis abandonat el teu lloc. El fet normal és que la sessió duri sobre mitja hora des de l\\\'última pàgina carregada.',
);
?>