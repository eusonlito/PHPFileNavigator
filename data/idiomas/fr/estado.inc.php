<?php
/****************************************************************************
* data/idiomas/fr/estado.inc.php
*
* Textos para el idioma Fran&ccedil;ais
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
		'0' => 'Une erreur est survenue lors de la cr&eacute;ation du dossier.',
		'1' => 'Le dossier a &eacute;t&eacute; cr&eacute;&eacute; avec succ&egrave;s.',
		'2' => 'Un dossier du m&ecirc;me nom existe d&eacute;j&agrave;.',
		'3' => 'Le dossier parent n\\\'a pas les droits en &eacute;criture.',
		'4' => 'Le nom du dossier contient des caract&egrave;res non permis, choisissez un autre nom.',
		'5' => 'La taille maximale permise pour cette racine a &eacute;t&eacute; atteinte.',
	),
	'estado.subir_arq' => array(
		'0' => 'Une erreur est survenue lors du chargement des fichiers.',
		'1' => 'Le fichier a &eacute;t&eacute; charg&eacute; avec succ&egrave;s.',
		'2' => 'Le nom du fichier contient un caract&egrave;re non permis, choisissez un autre nom.',
		'3' => 'Un fichier avec le m&ecirc;me nom existe d&eacute;j&agrave;.',
		'4' => 'Le dossier de destination n\\\'a pas les droits en &eacute;criture.',
		'5' => 'La taille du fichier est plus importante que ce que permet cette configuration.',
		'6' => 'La taille maximale permise pour cette racine a &eacute;t&eacute; atteinte.',
		'7' => 'Le fichier d&eacute;passe la limite de bande passante autoris&eacute;e pour ce mois.',
	),
	'estado.eliminar_dir' => array(
		'0' => 'Le dossier ou une partie de ce dossier n\\\'a pas &eacute;t&eacute; totalement supprim&eacute;. Veuillez contacter l\\\'administrateur pour finaliser cette suppression.',
		'1' => 'Le dossier a &eacute;t&eacute; supprim&eacute; avec succ&egrave;s.',
		'2' => 'Etes-vous s&ucirc;r de vouloir supprimer ce dossier vide?',
		'3' => 'Ce dossier n\\\'est pas vide. Etes-vous s&ucirc;r de vouloir supprimer ce dossier et tout son contenu?',
		'4' => 'Le dossier que vous voulez effacer n\\\'existe pas.',
	),
	'estado.eliminar_arq' => array(
		'0' => 'Le fichier ne peut pas &ecirc;tre supprim&eacute;. V&eacute;rifiez ses droits.',
		'1' => 'Le fichier a &eacute;t&eacute; supprim&eacute; avec succ&egrave;s.',
		'2' => 'Etes-vous s&ucirc;r de vouloir supprimer ce fichier?',
		'4' => 'Le fichier que vous voulez effacer n\\\'existe pas.',
	),
	'estado.renomear' => array(
		'0' => 'Le nom ne peut pas &ecirc;tre modifi&eacute;. V&eacute;rifiez ses droits.',
		'1' => 'Le nom a &eacute;t&eacute; modifi&eacute; avec succ&egrave;s.',
		'2' => 'Un dossier du m&ecirc;me nom existe d&eacute;j&agrave;.',
		'3' => 'Un fichier du m&ecirc;me nom existe d&eacute;j&agrave;.',
		'4' => 'Le nouveau nom contient des caract&egrave;res incorrects.',
	),
	'estado.mover_dir' => array(
		'0' => 'Le dossier ou une partie de son contenu ne peut pas &ecirc;tre d&eacute;plac&eacute;. V&eacute;rifiez les droits et l\\\'emplacement de destination.',
		'1' => 'Le dossier a &eacute;t&eacute; d&eacute;plac&eacute; avec succ&egrave;s.',
		'2' => 'Ce dossier n\\\'est pas vide. Choisissez l\\\'endroit o&ugrave; d&eacute;placer ce dossier et son contenu.',
		'3' => 'Choisissez l\\\'endroit o&ugrave; d&eacute;placer ce dossier vide.',
		'4' => 'L\\\'emplacement de destination n\\\'existe pas.',
		'5' => 'Le dossier de destination n\\\'a pas de droits en &eacute;criture.',
		'6' => 'L\\\'emplacement de destination contient d&eacute;j&agrave; un dossier du m&ecirc;me nom.',
		'7' => 'Vous ne pouvez pas copier un dossier dans lui-m&ecirc;me.',
	),
	'estado.mover_arq' => array(
		'0' => 'Le fichier ne peut pas &ecirc;tre d&eacute;plac&eacute;. V&eacute;rifiez les droits de l\\\'emplacement d\\\'origine et de destination.',
		'1' => 'Le fichier a &eacute;t&eacute; d&eacute;plac&eacute; avec succ&egrave;s.',
		'2' => 'Choisissez l\\\'emplacement de destination de ce fichier.',
		'3' => 'L\\\'emplacement de destination contient d&eacute;j&agrave; un fichier du m&ecirc;me nom.',
		'4' => 'Il n\\\'y a pas de dossier de destination.',
		'5' => 'Le dossier de destination ne poss&egrave;de pas de droits en &eacute;criture.',
		'6' => 'Une copie a &eacute;t&eacute; cr&eacute;&eacute;e dans l\\\'emplacement de destination, mais l\\\'original n\\\'a pas pu &ecirc;tre effac&eacute;.',
	),
	'estado.copiar_dir' => array(
		'0' => 'Le dossier ou une partie de son contenu ne peut pas &ecirc;tre copi&eacute;. V&eacute;rifiez les droits de l\\\'emplacement d\\\'origine et de destination.',
		'1' => 'Le dossier a &eacute;t&eacute; copi&eacute; avec succ&egrave;s.',
		'2' => 'Ce dossier n\\\'est pas vide,<br />Choisissez un emplacement de destination pour copier ce dossier et son contenu.',
		'3' => 'Choisissez un emplacement de destination pour copier ce dossier vide.',
		'4' => 'Le dossier de destination n\\\'existe pas.',
		'5' => 'Le dossier de destination ne poss&egrave;de pas les droits en &eacute;criture.',
		'6' => 'L\\\'emplacement de destination contient d&eacute;j&agrave; un dossier du m&ecirc;me nom.',
		'7' => 'Un dossier ne peut pas &ecirc;tre copi&eacute; dans lui-m&ecirc;me.',
		'8' => 'Vous ne pouvez pas copier ce dossier car il d&eacute;passe la limite de cette racine.',
	),
	'estado.copiar_arq' => array(
		'0' => 'Le fichier ne peut pas &ecirc;tre copi&eacute;, v&eacute;rifiez les droits de l\\\'emplacement d\\\'origine et de destination.',
		'1' => 'Le fichier a &eacute;t&eacute; copi&eacute; avec succ&egrave;s.',
		'2' => 'Choisissez un emplacement de destination pour ce fichier.',
		'3' => 'Le dossier de destination contient d&eacute;j&agrave; un fichier du m&ecirc;me nom.',
		'4' => 'Le dossier de destination n\\\'existe pas.',
		'5' => 'Le dossier de destination ne poss&egrave;de pas les droits en &eacute;criture.',
		'6' => 'Vous ne pouvez pas copier ce fichier car il d&eacute;passe la limite de cette racine.',
	),
	'estado.enlazar_dir' => array(
		'0' => 'Le dossier ou une partie de son contenu ne peut pas &ecirc;tre attach&eacute;. V&eacute;rifiez les droits de l\\\'emplacement d\\\'origine et de destination.',
		'1' => 'Le dossier a &eacute;t&eacute; attach&eacute; avec succ&egrave;s.',
		'2' => 'Le dossier de destination n\\\'existe pas.',
		'3' => 'Le dossier de destination ne poss&egrave;de pas les droits en &eacute;criture.',
		'4' => 'L\\\'emplacement de destination contient d&eacute;j&agrave; un dossier du m&ecirc;me nom.',
	),
	'estado.enlazar_arq' => array(
		'0' => 'Le fichier ne peut pas &ecirc;tre attach&eacute;. V&eacute;rifiez les droits de l\\\'emplacement d\\\'origine et de destination.',
		'1' => 'Le fichier a &eacute;t&eacute; attach&eacute; avec succ&egrave;s.',
		'2' => 'Choisissez un emplacement de destination pour ce fichier.',
		'3' => 'L\\\'emplacement de destination contient d&eacute;j&agrave; un fichier du m&ecirc;me nom.',
		'4' => 'Le dossier de destination n\\\'existe pas.',
		'5' => 'Le dossier de destination ne poss&egrave;de pas les droits en &eacute;criture.',
	),
	'estado.editar' => array(
		'0' => 'Une erreur est survenue dans l\\\'&eacute;dition de ce fichier.',
		'1' => 'Le fichier a &eacute;t&eacute; &eacute;dit&eacute; avec succ&egrave;s.',
		'2' => 'Le fichier ne poss&egrave;de pas les droits en &eacute;criture.',
		'3' => 'Le fichier a &eacute;dit&eacute; n\\\'existe pas.',
		'4' => 'Il n\\\'est pas permis d\\\'&eacute;dite ce fichier',
	),
	'estado.subir_url' => array(
		'0' => 'Une erreur est survenue avec cette URL.',
		'1' => 'L\\\'URL demand&eacute;e a &eacute;t&eacute; sauvegard&eacute;e avec succ&egrave;s.',
		'2' => 'Un fichier du m&ecirc;me nom existe d&eacute;j&agrave;.',
		'3' => 'Le dossier de destination ne poss&egrave;de pas les droits en &eacute;criture.',
		'4' => 'Gardez &agrave; l\\\'esprit que le temps d\\\'attente peut &ecirc;tre long si vous choisissez des fichiers volumineux. Il est recommand&eacute; de privil&eacute;gier des fichiers textes, comme des pages web.',
		'5' => 'Veuillez patientez le temps que l\\\'URL demand&eacute;e soit t&eacute;l&eacute;charg&eacute;e.<br /><br />Si les documents sont volumineux, ce temps d\\\'attente peut &ecirc;tre long.',
		'6' => 'Le processus de t&eacute;l&eacute;chargement de l\\\'URL a &eacute;t&eacute; annul&eacute; avec succ&egrave;s.',
		'7' => 'L\\\'adresse soumise n\\\'a pas pu &ecirc;tre t&eacute;l&eacute;charg&eacute;e car elle d&eacute;passe la limite de la racine choisie.',
		'8' => 'Le nom choisi pour le fichier contient des caract&egrave;res invalides.',
		'9' => 'Avec ce fichier, la limite mensuelle de bande passante sera d&eacute;pass&eacute;e.',
	),
	'estado.extraer' => array(
		'0' => 'Aucun fichier n\\\'a pu &ecirc;tre extrait. L\\\'archive est peut &ecirc;tre corrompue ou de format incorrect.',
		'1' => 'Tous les fichiers ont &eacute;t&eacute; extraits avec succ&egrave;s.',
		'2' => 'Le fichier n\\\'a pas une extension valide (tar,gz,gzip,tgz).',
		'3' => 'L\\\'application ne supporte pas l\\\'extraction de ce type de fichier',
		'4' => 'Extraction impossible, archive corrompue.',
		'5' => 'Certains fichiers n\\\'ont pas pu &ecirc;tre extraits, ils existent d&eacute;j&agrave;.',
		'6' => 'Certains fichiers n\\\'ont pas pu &ecirc;tre ouverts en &eacute;criture.',
		'7' => 'L\\\'extraction n\\\'a pu se terminer car le contenu d&eacute;passe la taille limite de cette racine.',
		'8' => 'Certains fichiers ont des noms non autoris&eacute;s ou sont vides. Ils n\\\'ont pas &eacute;t&eacute; extraits.',
		'9' => 'Certains dossiers n&eacute;cessaires au processus d\\\'extraction n\\\'ont pas pu &ecirc;tre cr&eacute;&eacute;s.',
	),
	'estado.multiple_copiar' => array(
		'0' => 'Les dossiers/fichiers ne peuvent pas &ecirc;tre copi&eacute;s. V&eacute;rifiez les doits de l\\\'emplacement d\\\'origine et de destination.',
		'1' => 'Tous les dossiers ou les fichiers ont &eacute;t&eacute; copi&eacute;s avec succ&egrave;s.',
		'2' => 'Choisissez un emplacement de destination pour copier les fichiers ou les dossiers.',
		'3' => 'L\\\'emplacement de destination contient d&eacute;j&agrave; un fichier ou un dossier du m&ecirc;me nom:',
		'4' => 'Le dossier de destination n\\\'existe pas pour:',
		'5' => 'Le dossier de destination n\\\'a pas les droits d\\\'&eacute;criture pour:',
		'6' => 'Ce dossier/fichier ne peut pas &ecirc;tre copi&eacute; car il d&eacute;passe la taille limite pour cette racine:',
		'7' => 'Certains dossiers ou fichiers s&eacute;lectionn&eacute;es n\\\'existe pas ou ne sont pas lisible.',
		'8' => 'Le reste des dossiers et des fichiers ont &eacute;t&eacute; copi&eacute;s avec succ&egrave;s',
		'9' => 'Le dossier ne peut pas &ecirc;tre copi&eacute; &agrave; l\\\'int&eacute;rieur de lui-m&ecirc;me.',
	),
	'estado.multiple_eliminar' => array(
		'0' => 'Le dossier/fichier ne peut pas &ecirc;tre supprim&eacute;. V&eacute;rifiez les doits de la cible.',
		'1' => 'Tous les dossiers ou les fichiers ont &eacute;t&eacute; supprim&eacute;s avec succ&egrave;s.',
		'2' => 'Etes-vous s&ucirc;r de vouloir supprimer tous ces fichiers ou dossiers?',
		'3' => 'Le reste des fichiers ou des dossiers ont &eacute;t&eacute; supprim&eacute;s avec succ&egrave;s.',
		'4' => 'Le fichier que vous essayez de supprimer n\\\'existe pas.',
	),
	'estado.multiple_mover' => array(
		'0' => 'Le fichier/dossier ne peut pas &ecirc;tre d&eacute;plac&eacute;. V&eacute;rifiez les doits de l\\\'emplacement d\\\'origine et de destination.',
		'1' => 'Tous les fichiers ou dossiers ont &eacute;t&eacute; d&eacute;plac&eacute;s avec succ&egrave;s.',
		'2' => 'Choisissez l\\\'emplacement de destination o&ugrave; d&eacute;placer le dossier ou le fichier.',
		'3' => 'L\\\'emplacement de destination contient d&eacute;j&agrave; un fichier ou un dossier du m&ecirc;me nom.',
		'4' => 'Le dossier de destination n\\\'existe pas.',
		'5' => 'Le dossier de destination ne poss&egrave;de pas de droit en &eacute;criture.',
		'6' => 'Une copie des fichiers/dossiers a &eacute;t&eacute; cr&eacute;&eacute;e, mais les originaux n\\\'ont pu &ecirc;tre supprim&eacute;s.',
		'7' => 'Le reste des dossiers et fichiers ont &eacute;t&eacute; d&eacute;plac&eacute;s avec succ&egrave;s.',
		'8' => 'Un dossier ne peut pas &ecirc;tre d&eacute;plac&eacute; &agrave; l\\\'int&eacute;rieur de lui-m&ecirc;me.',
		'9' => 'Certains des dossiers ou fichiers s&eacute;lectionn&eacute;s n\\\'existent pas ou ne sont pas lisibles.',
	),
	'estado.multiple_permisos' => array(
		'0' => 'Les droits attribu&eacute;s au dossier/fichier ne peuvent pas &ecirc;tre modifi&eacute;s:',
		'1' => 'Les droits ont &eacute;t&eacute; modifi&eacute;s avec succ&egrave;s.',
		'2' => 'Le fichier n\\\'existe pas ou les droits qui lui sont attribu&eacute;s ne sont pas accessibles:',
		'3' => 'Le reste des fichiers ou des dossiers ont &eacute;t&eacute; modifi&eacute;s avec succ&egrave;s.',
	),
	'estado.permisos' => array(
		'0' => 'Les droits attribu&eacute;s au dossier/fichier ne peuvent pas &ecirc;tre modifi&eacute;s:',
		'1' => 'Les droits ont &eacute;t&eacute; modifi&eacute;s avec succ&egrave;s.',
		'2' => 'Le fichier n\\\'existe pas ou les droits qui lui sont attribu&eacute;s ne sont pas accessibles.',
	),
	'estado.descargar' => array(
		'0' => 'Le fichier s&eacute;lectionn&eacute; n\\\'existe pas ou n\\\'est pas lisible.',
		'2' => 'La racine actuelle ne peut pas &ecirc;tre t&eacute;l&eacute;charg&eacute;e, car la bande passante hebdomadaire serait alors d&eacute;pass&eacute;e.',
		'3' => 'Le fichier d\\\'enregistrement ne peut pas &ecirc;tre ouvert pour sauvegarder les donn&eacute;es t&eacute;l&eacute;charg&eacute;es. V&eacute;rifiez le dossier [*$this->paths["info"]*].',
	),
	'estado.redimensionar' => array(
		'0' => 'La miniature a &eacute;t&eacute; annul&eacute;e.',
		'1' => 'La miniature a &eacute;t&eacute; cr&eacute;&eacute;e avec succ&egrave;s.',
		'2' => 'La miniature a &eacute;t&eacute; supprim&eacute;e avec succ&egrave;s.',
	),
	'estado.ver_comprimido' => array(
		'1' => 'Le fichier s&eacute;lectionn&eacute; n\\\'est pas une archive valide.',
	),
	'estado.novo_arq' => array(
		'0' => 'Le fichier n\\\'a pas pu &ecirc;tre cr&eacute;e, v&eacute;rifiez les droits en &eacute;criture du dossier.',
		'1' => 'Le fichier a &eacute;t&eacute; cr&eacute;e avec succ&egrave;s.',
		'2' => 'Un fichier du m&ecirc;me nom existe d&eacute;j&agrave;.',
		'3' => 'Le nom du nouveau fichier n\\\'est pas permis.',
		'4' => 'Le dossier que vous souhaitez stocker n\\\'a pas de droit en &eacute;criture.',
		'5' => 'Le nom du nouveau fichier n\\\'a pas &eacute;t&eacute; &eacute;crit.',
		'6' => 'La taille limite pour cette racine est d&eacute;pass&eacute;e avec ce fichier.',
		'7' => 'La limite mensuelle de bande passante est d&eacute;pass&eacute;e avec ce fichier.',
	),
	'estado.preferencias' => array(
		'0' => 'Une erreur est survenue durant le changement des pr&eacute;f&eacute;rences utilisateur. Veuillez r&eacute;essayer svp. En cas de probl&egrave;me r&eacute;current, contacter l\\\'administrateur.',
		'1' => 'Les pr&eacute;f&eacute;rences ont &eacute;t&eacute; modifi&eacute;es avec succ&egrave;s.',
		'2' => 'Le champ "Nom" doit &ecirc;tre rempli.',
		'3' => 'Le mot de passe doit comporter 8 caract&egrave;res au minimum. Les nombres et les lettres sont autoris&eacute;s.',
		'4' => 'Les mots de passe ne correspondent pas.',
	),
	'estado.redimensionar_dir' => array(
		'0' => 'Ce dossier ne contient pas d\\\'image valide.',
		'1' => 'Toutes les images ont &eacute;t&eacute; trait&eacute;es avec succ&egrave;s.',
		'2' => 'Une erreur est survenue avec une image, la position de l\\\'index n\\\'est pas valide.',
	),
	'estado.correo' => array(
		'0' => 'Le message n\\\'a pas pu &ecirc;tre envoy&eacute;. Le probl&egrave;me vient peut-&ecirc;tre du module d\\\'envoi dans PHP.',
		'1' => 'Le message a &eacute;t&eacute; envoy&eacute; avec succ&egrave;s.',
		'2' => 'Le champ "Titre" doit &ecirc;tre rempli.',
		'3' => 'Le champ "Message" doit &ecirc;tre rempli.',
		'4' => 'Le champ "pour" doit &ecirc;tre rempli.',
		'5' => 'Certaines des adresses dans le champ "pour" sont incorrectes.',
		'6' => 'Toutes les adresses mail contiennent une erreur.',
		'7' => 'Il n\\\'a pas &eacute;t&eacute; possible d\\\'attach&eacute; le fichier s&eacute;lectionn&eacute;. V&eacute;rifiez qu\\\'il existe bien et qu\\\'il a les droits en &eacute;criture.',
		'8' => 'Un probl&egrave;me est apparu dans la cr&eacute;ation du message. Il est possible que le fichier ne puisse pas &ecirc;tre envoy&eacute; en tant que pi&egrave;ce jointe.',
		'9' => 'Il n\\\'est pas possible d\\\'envoyer ce message car la bande passante mensuelle serait d&eacute;pass&eacute;e.',
		'10' => 'Il n\\\'est pas permis d\\\'envoyer ce fichier car il d&eacute;passe la limite de [*PFN_peso($this->g("limite_correo"))*] pour une pi&egrave;ce jointe.',
	),
);
?>