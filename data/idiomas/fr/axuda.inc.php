<?php
/****************************************************************************
* data/idiomas/fr/axuda.inc.php
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
	'h1_quero_facer' => 'Qu\\\'est-ce que je veux faire?',
	'tit_crear_dir' => 'Cr&eacute;er un nouveau dossier',
	'txt_crear_dir' => 'Pour cr&eacute;er un dossier, cliquer sur le bouton du haut <strong><img src="[*$this->g("estilo")*]imx/crear_dir.png" alt="Cr&eacute;er un dossier" /> Cr&eacute;er un dossier</strong>. Vous pourrez alors renseigner diff&eacute;rents champs d\\\'information; seul le champ nom est obligatoire.',
	'tit_subir_arq' => 'Charger un fichier',
	'txt_subir_arq' => 'Pour charger un fichier, cliquer sur le bouton du haut <strong><img src="[*$this->g("estilo")*]imx/subir_arq.png" alt="Charger un fichier" /> Charger un fichier</strong>. Vous pourrez alors renseigner diff&eacute;rents champs d\\\'information; seul le champ indiquant le fichier que vous chargez est obligatoire.<br /><br />S\\\'il s\\\'agit d\\\'une image, il y a deux options pour cr&eacute;er une copie miniature de cette image via le champ <strong>Miniature</strong>. Si ce n\\\'est pas le cas, ne tenez pas compte de cette option.',
	'tit_subir_url' => 'Charger un fichier depuis un autre site Web.',
	'txt_subir_url' => 'Pour charger un fichier depuis un autre site Web, cliquez sur le bouton <strong><img src="[*$this->g("estilo")*]imx/subir_url.png" alt="T&eacute;l&eacute;charger depuis une URL" /> T&eacute;l&eacute;charger depuis une URL</strong>.<br /><br />Vous aurez alors &agrave; pr&eacute;ciser l\\\'<strong>URL</strong> que vous voulez stocker. Faites attention &agrave; bien rentrer une adresse compl&egrave;te: par exemple, <i>http://phpfilenavigator.litoweb.net/index.php</i> est mieux que <i>http://phpfilenavigator.litoweb.net</i> car dans ce dernier cas, l\\\'op&eacute;ration peut &eacute;chouer. Apr&egrave;s l\\\'URL vient le <strong>Nom de fichier &agrave; cr&eacute;er</strong> o&ugrave; vous pouvez mettre un nom qui permettra une identification ult&eacute;rieure, comme <i>PHPfileNavigator Web</i>.',
	'tit_miniaturas' => 'Voir les miniatures des images dans la liste des fichiers.',
	'txt_miniaturas' => 'Vous avez seulement &agrave; cliquer sur l\\\'option <strong><img src="[*$this->g("estilo")*]imx/ver_imaxes.png" alt="Miniatures" /> Miniatures</strong> pour faire appara&icirc;tre les miniatures quand vous naviguez dans la liste des fichiers.',
	'tit_arbore' => 'Voir tous les fichiers et les dossiers sur une seule page',
	'txt_arbore' => 'Pour voir le contenu d\\\'un dossier racine, cliquez sur <strong><img src="[*$this->g("estilo")*]imx/arbore.png" alt="Arborescence des dossiers" /> Arborescence des dossiers</strong>, et tous les dossiers de la racine appara&icirc;tront. Si vous voulez &eacute;galement voir les fichiers dans l\\\'arborescence, cliquez sur l\\\'option &agrave; droite <strong>[Arborescence compl&egrave;te]</strong>.',
	'tit_buscar' => 'Rechercher un fichier, ou un texte dans les metas (infos compl&eacute;mentaires).',
	'txt_buscar' => 'Vous avez deux options pour chercher un fichier. La premi&egrave;re est de passer par le menu g&eacute;n&eacute;ral <strong>Recherche</strong>, la seconde est d\\\'&eacute;crire une partie du nom dans le champ <strong>Recherche:</strong> et de cliquer sur la loupe.<br /><br />Dans la zone de saisie qui appara&icirc;t, vous avez seulement &agrave; &eacute;crire le texte relatif au fichier ou au dossier que vous recherchez, de pr&eacute;ciser o&ugrave; vous voulez effectuer cette recherche (ce dossier ou tous les dossiers de la racine), et le champ o&ugrave; doit se trouver le texte (nom, ou meta). En cliquant sur <strong>Accepter</strong>, vous lancez alors la recherche. Les r&eacute;sultats s\\\'afficheront sous cette zone.',
	'tit_accions' => 'Des actions sur un fichier ou un dossier, comme copier, d&eacute;placer, supprimer...',
	'txt_accions' => 'Vous pouvez effectuer toutes les actions que vous voulez avec un fichier ou un dossier depuis la colonne <strong>Actions</strong> qui est la derni&egrave;re &agrave; droite dans la liste des fichiers/dossiers.<br />Cette colonne vous permet, dans la mesure o&ugrave; vous y &ecirc;tes autoris&eacute;s, de <strong>Voir les informations</strong>, <strong>Copier</strong>, <strong>D&eacute;placer</strong>, <strong>Renommer</strong>, <strong>Supprimer</strong>, <strong>Changer les droits</strong> ou <strong>T&eacute;l&eacute;charger</strong>.',
	'tit_accions_multiple' => 'Des actions sur plusieurs fichiers ou dossiers en m&ecirc;me temps.',
	'txt_accions_multiple' => 'Si vous avez les autorisations n&eacute;cessaires, vous &ecirc;tes en mesure de r&eacute;aliser des actions simultan&eacute;es sur des fichiers ou des dossiers, &agrave; savoir <strong>Copier</strong>, <strong>D&eacute;placer</strong>, <strong>Supprimer</strong>, <strong>Changer les droits</strong> et <strong>T&eacute;l&eacute;charger</strong>.',
	'h1_accions' => 'Quelles actions puis-je r&eacute;aliser sur chaque fichier ou dossier list&eacute;?',
	'txt_info' => '<strong>Voir les Informations: </strong> Cette option vous permet d\\\'afficher les informations d&eacute;taill&eacute;es comme la taille, la date de cr&eacute;ation, les droits ou les donn&eacute;es relatives aux informations compl&eacute;mentaires (metas) comme le titre et la description; un formulaire vous permet de modifier ces derni&egrave;res informations.',
	'txt_copiar' => '<strong>Copier: </strong> Permet de r&eacute;aliser une copie d\\\'un fichier ou d\\\'un dossier dans un emplacement choisi. Si c\\\'est un dossier, toutes les informations seront copi&eacute;es &agrave; l\\\'endroit souhait&eacute;.',
	'txt_mover' => '<strong>Move: </strong> Permet de d&eacute;placer un fichier/dossier &agrave; l\\\'emplacement choisi dans le dossier racine actuel. Le fichier/dossier s&eacute;lectionn&eacute; est tout d\\\'abord copi&eacute; puis l\\\'original est supprim&eacute;.',
	'txt_renomear' => '<strong>Renommer: </strong> Permet de changer le nom d\\\'un fichier ou d\\\'un dossier.',
	'txt_eliminar' => '<strong>Supprimer: </strong> Supprime un fichier, ou un dossier et tout son contenu.',
	'txt_permisos' => '<strong>Droits: </strong> Permet de changer les droits sur un fichier ou un dossier.',
	'txt_descargar' => '<strong>T&eacute;l&eacute;charger: </strong> Force le t&eacute;l&eacute;chargement d\\\'un fichier sur l\\\'ordinateur client. La bande passante utilis&eacute;e par les t&eacute;l&eacute;chargements est mesur&eacute;e, ainsi que le nombre de t&eacute;l&eacute;chargements r&eacute;alis&eacute;s.',
	'txt_comprimir' => '<strong>Compresser: </strong> Compresse un fichier ou un dossier et tout son contenu en un seul fichier archive avant son t&eacute;l&eacute;chargement. Cela permet de gagner en utilisation de bande passante puisque le fichier ainsi compress&eacute; est de taille r&eacute;duite par rapport &agrave; la taille du/des fichier(s) initial(aux).',
	'txt_redimensionar' => '<strong>Copie Miniature: </strong> Permet de cr&eacute;er une image r&eacute;duite &agrave; partir d\\\'une image sur le serveur. Cette miniature peut &ecirc;tre une copie exacte de l\\\'original en version r&eacute;duite, ou bien vous pouvez s&eacute;lectionner une zone de l\\\'image originale pour g&eacute;n&eacute;rer cette miniature.',
	'txt_extraer' => '<strong>Decompresser: </strong> Permet de d&eacute;compresser une archive avec TAR/GZ/TGZ/GZIP en conservant la structure de cette archive (fichiers/dossiers). Il se peut qu\\\'un fichier ne soit pas extrait du fait d\\\'un nom invalide, mais cela n\\\'emp&ecirc;che pas l\\\'extraction du reste de l\\\'archive.',
	'txt_ver_contido' => '<strong>Voir le contenu: </strong> Permet d\\\'afficher un fichier texte &eacute;ditable. Dans le cas o&ugrave; il s\\\'agit d\\\'un fichier web utilis&eacute; (comme un fichier PHP ou HTML), le code est mis en &eacute;vidence par des couleurs.',
	'txt_editar' => '<strong>Editer: </strong> Permet de modifier le contenu d\\\'un fichier texte.',
	'h1_accions_multiple' => 'Quelles actions puis-je r&eacute;aliser sur plusieurs fichiers ou dossiers simultan&eacute;ment?',
	'txt_multiple_copiar' => '<strong>Copier: </strong> Permet de copier plusieurs fichiers et dossiers en m&ecirc;me temps. Le processus continuera bien qu\\\'une erreur puisse se produire, et vous serez inform&eacute;s du r&eacute;sultat final de la copie.',
	'txt_multiple_mover' => '<strong>D&eacute;placer: </strong> Permet de d&eacute;placer plusieurs fichiers et dossiers en m&ecirc;me temps. Les objets s&eacute;lectionn&eacute;s seront d&eacute;plac&eacute;s m&ecirc;me si une erreur se produit, et vous serez inform&eacute;s du r&eacute;sultat final du processus.',
	'txt_multiple_eliminar' => '<strong>Supprimer: </strong> Permet de supprimer plusieurs fichiers et dossiers en m&ecirc;me temps. Le processus continuera bien qu\\\'une erreur puisse se produire, et vous serez inform&eacute;s du r&eacute;sultat final de la suppression.',
	'txt_multiple_permisos' => '<strong>Modifier les Droits: </strong> Permet de Modifier les droits de plusieurs fichiers et dossiers en m&ecirc;me temps. Le processus continuera bien qu\\\'une erreur puisse se produire, et vous serez inform&eacute;s du r&eacute;sultat final.',
	'txt_multiple_comprimir' => '<strong>T&eacute;l&eacute;charger en Archive: </strong> Permet de t&eacute;l&eacute;charger tous les fichiers et les dossiers s&eacute;lectionn&eacute;s en une seule archive, ce qui permet d\\\'&eacute;conomiser la bande passante. Cette archive sera au format ZIP.',
	'h1_problemas' => 'Comment puis-je r&eacute;soudre ce probl&egrave;me?',
	'tit_problema_subir_arq' => 'Je ne peux pas charger un fichier ou une URL',
	'txt_problema_subir_arq' => 'Si vous ne pouvez pas charger un fichier ou une URL, vous devez v&eacute;rifier si vous avez suffisamment d\\\'espace libre sur le disque o&ugrave; vous souhaitez faire votre chargement. Pour cela, il doit y avoir une indication du type <strong> Espace libre: XX MB</strong> dans le bas de la page vous pr&eacute;cisant la taille de l\\\'espace libre sur le disque. Si ce n\\\'est pas le cas, alors il n\\\'y a pas de limite th&eacute;orique de taille et vous pouvez prendre contact avec l\\\'administrateur si le probl&egrave;me persiste.',
	'tit_problema_crear_dir' => 'Je ne peux pas cr&eacute;er un dossier',
	'txt_problema_crear_dir' => 'La cause la plus fr&eacute;quente de ce probl&egrave;me est qu\\\'&agrave; l\\\'endroit o&ugrave; vous souhaiter cr&eacute;er votre dossier, les autorisations ne sont pas suffisantes pour que cela soit possible. Dans ce cas, un message doit vous pr&eacute;ciser le probl&egrave;me. Si vous n\\\'arriver pas &agrave; le r&eacute;soudre, veuillez prendre contact avec l\\\'administrateur.',
	'tit_problema_buscador' => 'Je n\\\'arrive pas &agrave; trouver ce que je souhaite par le moteur de recherche',
	'txt_problema_buscador' => 'Si vous &ecirc;tes s&ucirc;r que ce que vous chercher se trouve sur la racine sur laquelle vous avez effectu&eacute;e votre recherche, vous pouvez demander &agrave; l\\\'administrateur de r&eacute;indexer cette racine afin de mettre &agrave; jour la base de donn&eacute;es utilis&eacute;e pour la recherche.',
	'tit_problema_miniaturas' => 'Je ne peux pas voir la miniature des images',
	'txt_problema_miniaturas' => 'Si vous cliquer sur <strong><img src="[*$this->g("estilo")*]imx/ver_imaxes.png" alt="View Images" /> Miniatures</strong> et que ces miniatures n\\\'apparaissent pas dans la liste des fichiers/dossiers, cela signifie qu\\\'elles n\\\'ont pas &eacute;t&eacute; cr&eacute;es. Pour g&eacute;n&eacute;rer ces miniatures, cliquer sur <strong>Voir les Informations</strong> pour l\\\'image s&eacute;lectionn&eacute;e. Cliquez alors sur <strong>Copie Miniature</strong>, ce qui vous permet de cr&eacute;er cette miniature au format souhait&eacute;.',
	'tit_problema_paxinar' => 'Je ne peux pas voir tout le contenu d\\\'un dossier',
	'txt_problema_paxinar' => 'Quand un dossier est trop "gros" (plus de [*$this->g("paxinar")*] fichiers ou dossiers), son affichage est pagin&eacute;. Pour voir les pages suivantes ou pr&eacute;c&eacute;dentes, un  menu d&eacute;roulant en bas de la liste des fichiers/dossiers vous permet d\\\'aller &agrave; la page que vous voulez.',
	'tit_problema_sesion' => 'Si je reste trop longtemps sans utiliser l\\\'application, le syst&egrave;me me d&eacute;connecte',
	'txt_problema_sesion' => 'Afin d\\\'&eacute;viter les acc&egrave;s ill&eacute;gaux, le syst&egrave;me attribue une limite de temps pour chaque session. Cette limite est g&eacute;n&eacute;ralement fix&eacute;e &agrave; une demi heure &agrave; partir du moment o&ugrave; vous n\\\'utiliser plus l\\\'application.<br />Pour contourner cette limite, vous pouvez par exemple actualiser de temps en temps votre page PHPFileNavigator.',
);
?>