<?php
/****************************************************************************
* data/idiomas/fr/instalar.inc.php
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
	'benvido' => 'Bienvenue sur l\\\'installeur de PHPfileNavigator',
	'idioma' => 'Langue',
	'email' => 'Email de l\\\'administrateur',
	'gd2' => 'Support de la librairie GD2',
	'zlib' => 'Support de la librairie ZLIB',
	'si' => 'Oui',
	'non' => 'Non',
	'enviar' => 'Envoyer',
	'base_datos' => 'Information Base de Donn&eacute;es',
	'host' => 'H&ocirc;te',
	'db_nome' => 'Base de donn&eacute;es',
	'nome' => 'Nom',
	'usuario' => 'Utilisateur',
	'contrasinal' => 'Mot de passe',
	'db_prefixo' => 'Pr&eacute;fixe des Tables',
	'administrador' => 'Administrateur',
	'rep_contrasinal' => 'R&eacute;p&eacute;tez le mot de passe',
	'raiz' => 'Racine initiale',
	'ra_path' => 'Chemin absolu',
	'ra_web' => 'Chemin depuis le Web',
	'ra_conf' => 'Fichier de configuration',
	'avisos_instalacion' => 'Alertes de l\\\'installation',
	'erros' => array(
		'1' => 'BDD : l\\\'HOTE est manquant',
		'2' => 'BDD : Le NOM de la Base de Donn&eacute;es est manquant',
		'3' => 'BDD : l\\\'UTILISATEUR est manquant',
		'4' => 'Administrateur : le NOM est manquant',
		'5' => 'Administrateur : l\\\'UTILISATEUR est manquant',
		'6' => 'Administrateur : le MOT DE PASSE est manquant',
		'7' => 'Administrateur : les Mots de passe sont diff&eacute;rents',
		'8' => 'Racine Initiale : Le NOM est manquant',
		'9' => 'Racine Initiale : Le CHEMIN ABSOLU est manquant',
		'10' => 'Racine Initiale : Le CHEMIN DEPUIS LE WEB est manquant',
		'11' => 'Racine Initiale : L\\\'HOTE est manquant',
		'12' => 'Racine Initiale : Le FICHIER DE CONFIGURATION est manquant',
		'13' => 'L\\\'EMAIL est manquant',
		'14' => 'Racine Initiale : Le dossier du CHEMIN ABSOLU n\\\'existe pas',
		'15' => 'Racine Initiale : Le dossier du CHEMIN ABSOLU n\\\'a pas de droits en &eacute;criture',
		'16' => 'Racine Initiale : Le FICHIER DE CONFIGURATION n\\\'existe pas',
		'17' => 'BDD : l\\\'HOTE, NOM ou MOT DE PASSE de connexion aux donn&eacute;es est incorrect',
		'18' => 'BDD : Le NOM de la base de donn&eacute;es n\\\'existe pas',
		'19' => 'Le dossier data/conf/ doit avoir des droits en &eacute;criture.',
		'20' => 'Cette application a d&eacute;j&agrave; &eacute;t&eacute; install&eacute;e auparavant. Si vous essayez de l\\\'installer &agrave; nouveau, toutes les donn&eacute;es sauvegard&eacute;es dans les tables MySQL seront supprim&eacute;es (hormis dans le cas d\\\'une actualisation)<br /><br />Si vous voulez installer cette application, veuillez supprimer le dossier <i>instalar/</i>.',
		'21' => 'Le dossier tmp/ doit avoir les droits en &eacute;criture.',
		'22' => 'Le dossier data/logs/ doit avoir les droits en &eacute;criture.',
		'23' => 'Le dossier data/info/ doit avoir les droits en &eacute;criture.',
		'24' => 'Il n\\\'existe pas de version pr&eacute;c&eacute;dente &agrave; mettre &agrave; jour, ou le fichier data/conf/basicas.inc.php n\\\'a pas de droit en &eacute;criture.',
		'25' => 'Avec une mise &agrave; jour depuis une version ant&eacute;rieure &agrave; la 2.0.0 et post&eacute;rieure &agrave; la 1.5.7, les modifications apport&eacute;es &agrave; la structure de la base de donn&eacute;es n\\\'affecteront pas le contenu pr&eacute;existant; les fichiers de l\\\'application seront eux  mis &agrave; jour avec les am&eacute;liorations.<br /><br />Pour effectuer une installation correcte, vous devez simplement copier les nouveaux fichiers sur ceux de votre pr&eacute;c&eacute;dente version.<br /><br />Neanmoins, vous devez faire attention avant de remplacer le fichier de configuration data/conf/defaults.inc.php. Le nouveau fichier peut contenir de nouvelles variables de configuration. Il vous faut donc comparer les deux fichiers avant d\\\'utiliser le plus r&eacute;cent.',
		'26' => 'Aucune op&eacute;ration ne sera effectu&eacute;e au cours de cette installation.<br /><br />Si vous avez une version 2.2.0, vous devez simplement copier les nouveaux fichiers sur les anciens.<br /><br />N&eacute;anmoins, vous devez faire attention avant de remplacer le fichier de configuration data/conf/defaults.inc.php. Le nouveau fichier peut contenir de nouvelles variables de configuration. Il vous faut donc comparer les deux fichiers avant d\\\'utiliser le plus r&eacute;cent.',
		'27' => 'Le fichier data/conf/basicas.inc.php n\\\'a pas les droits en &eacute;criture.',
		'28' => 'Vous devez choisir un encodage des caract&egrave;res (chartset).',
		'29' => 'Certaines requ&ecirc;tes engendrent des erreurs. Essayez de relancer l\\\'installation.',
		'30' => 'La mise &agrave; jour ne peut se faire sur une m&ecirc;me version ou sur une version plus r&eacute;cente. V&eacute;rifiez svp que la version d&eacute;j&agrave; mise en place n\\\'est pas la m&ecirc;me que celle que vous essayer d\\\'installer.',
		'31' => 'Cette application va &ecirc;tre mise &agrave; jour depuis une version >2.0.0 et <2.2.0.<br /><br />Vous devez faire attention avant de remplacer le fichier de configuration data/conf/defaults.inc.php. Le nouveau fichier peut contenir de nouvelles variables de configuration. Il vous faut donc comparer les deux fichiers avant d\\\'utiliser le plus r&eacute;cent.',
	),
	'axuda' => array(
		'accion' => 'Vous pouvez choisir un mode d\\\'installation:<br /><strong>Installer: </strong> permet d\\\'effectuer une nouvelle installation en supprimant les tables(si existantes), et en r&eacute;&eacute;crivant les fichiers de configuration.<br /><strong>Mise &agrave; jour depuis une version >1.5.7 et <2.0.0:</strong> permet l\\\'installation de l\\\'application sans perdre les donn&eacute;es pr&eacute;existantes de la base de donn&eacute;es et les fichiers de configuration. La structure de la base est mise &agrave; jour, et la configuration est compl&eacute;t&eacute;e par les nouveaux &eacute;l&eacute;ments.<br /><strong>Mise &agrave; jour depuis une version <2.2.0:</strong>Permet la mise &agrave; jour d\\\'une version > 2.0.0 et <2.2.0<br /><strong>Ne rien faire: </strong> aucune modification sur la base de donn&eacute;es et sur les fichiers de config.',
		'idioma' => 'Vous pouvez choisir la langue que vous d&eacute;sirez pour l\\\'installation et pour l\\\'utilisation de PHPfileNavigator.',
		'gd2' => 'Indiquez si le serveur dispose des librairies graphiques GD2 (permet la cr&eacute;ation de miniatures d\\\'image de qualit&eacute;).',
		'zlib' => 'Indiquez si le serveur dispose des librairies ZLIB de compression/d&eacute;compression de fichier.',
		'charset' => 'L\\\'encodage des caract&egrave;res que vous souhaitez utiliser. Normalement, c\\\'est le m&ecirc;me que celui du serveur.',
		'db_host' => 'Le serveur sur lequel est install&eacute; MySQL. <strong>ex.: localhost</strong>',
		'db_nome' => 'Le nom de la base o&ugrave; seront cr&eacute;&eacute;es les tables. <strong>Elle doit exister avant l\\\'installation.</strong>',
		'db_usuario' => 'Le nom de l\\\'utilisateur pour l\\\'acc&egrave;s &agrave; la base donn&eacute;e. Il doit avoir les droits suffisants pour cr&eacute;er et modifier les tables.',
		'db_contrasinal' => 'Mot de passe pour acc&eacute;der &agrave; la base de donn&eacute;es.',
		'db_rep_contrasinal' => 'R&eacute;p&eacute;tez le pr&eacute;c&eacute;dent mot de passe.',
		'db_prefixo' => 'Pr&eacute;fixe des tables. Pour &eacute;viter d\\\'&eacute;crire sur des tables d&eacute;j&agrave; existantes.',
		'ad_nome' => 'Nom de l\\\'administrateur de PHPfileNavigator.',
		'ad_usuario' => 'Nom d\\\'utilisateur avec lequel il se connectera.',
		'ad_contrasinal' => 'Mot de passe pour l\\\'administrateur de PHPfileNavigator.',
		'ad_rep_contrasinal' => 'R&eacute;p&eacute;tez le pr&eacute;c&eacute;dent mot de passe.',
		'ad_email' => 'Email de l\\\'administrateur. Cet email sera utilis&eacute; pour l\\\'envoi d\\\'alertes de s&eacute;curit&eacute; li&eacute;es &agrave; des tentatives d\\\'intrusion, ou &agrave; des probl&egrave;mes d\\\'acc&egrave;s.',
		'ra_nome' => 'Nom g&eacute;n&eacute;rique de cette racine. Il s\\\'agit du dossier racine initial qui sera affich&eacute; dans PHPFileNavigator. Ce nom permettra son identification dans la liste des racines si vous param&eacute;trez par la suite l\\\'acc&egrave;s &agrave; plusieurs d\\\'entre elles. <strong>ex: Racine Principale</strong>',
		'ra_path' => 'Chemin absolu depuis la racine du serveur. D\\\'autres racines pourront ensuite &ecirc;tre cr&eacute;&eacute;es.<br />Rappel: vous devez utiliser slash (/) &agrave; la place de l\\\'antislash du syst&egrave;me Windows. <strong>ex: /var/www/html/docs/</strong>',
		'ra_web' => 'Le chemin d\\\'acc&egrave;s web depuis le nom de domaine. <strong>ex: /docs/</strong>',
		'ra_host' => 'Nom du domaine &agrave; g&eacute;rer. Sans http. <strong>ex: www.mydomain.com</strong>',
		'raices_atopadas' => 'Les racines suivantes, qui vont &ecirc;tre configur&eacute;es, ont &eacute;t&eacute; trouv&eacute;es.',
		'usuarios_atopados' => 'Voici la relation entre un utilisateur et un groupe. Durant la mise &agrave; jour, votre choix se limite &agrave; cette liste. Par la suite, vous pourrez g&eacute;rer de mani&egrave;re plus compl&egrave;te les utilisateurs et les groupes.',
		'configuracions_atopadas' => 'Un fichier de configuration a &eacute;t&eacute; trouv&eacute;. Dans la nouvelle zone d\\\'administration, vous avez la possibilit&eacute; de cr&eacute;er, modifier ou supprimer des fichiers de configurations, et de les assigner &agrave; des groupes ou &agrave; des racines.',
		'aviso_instalacion' => 'Si vous cochez cette option, le processus enverra un message au d&eacute;veloppeur de PHPfileNavigator lui signalant une nouvelle installation. Seuls le mail de l\\\'administrateur et l\\\'h&ocirc;te seront transmis dans ce mail. <strong>Aucune autre information personnelle n\\\'est envoy&eacute;e</strong> comme les dossiers, les donn&eacute;es utilisateur ou les mots de passe. Cela vous permettra d\\\'&ecirc;tre inform&eacute;s sur les nouvelles versions et de recevoir les avis de s&eacute;curit&eacute;.<br />Vous pouvez v&eacute;rifier le code d\\\'envoi du courriel dans le fichier instalar/index.php entre la ligne 84 et 100.',
	),
	'instalacion_correcta' => 'PHPfileNavigator a &eacute;t&eacute; install&eacute; avec succ&egrave;s.<br /><br />Vous devez supprimer le dossier instalar/ pour finaliser l\\\'installation.<br /><br />Merci d\\\'avoir choisi cette application.',
	'accion' => 'Action',
	'a:instalar' => 'Installer',
	'a:actualizar_168' => 'Mise &agrave; jour depuis une version > 1.5.7 et < 2.0.0',
	'a:actualizar_211' => 'Mise &agrave; jour depuis une version < 2.2.0',
	'a:nada' => 'Ne rien faire',
	'usuarios' => 'Utilisateurs',
	'charset' => 'Encodage des caract&egrave;res',
	'datos_xerais' => 'Donn&eacute;es G&eacute;n&eacute;riques',
	'raices_atopadas' => 'Racines Trouv&eacute;es',
	'usuarios_atopados' => 'Utilisateurs Trouv&eacute;s',
	'admins' => 'Administrateurs',
	'configuracions_atopadas' => 'Fichiers de Configuration Trouv&eacute;s',
	'doazon' => 'Si vous aimez cette application, ou si elle est destin&eacute;e &agrave; &ecirc;tre utilis&eacute;e au sein d\\\'une entreprise ou dans le cadre d\\\'un projet commercial, merci de faire un don !!!!',
	'aviso_instalacion' => 'Notification d\\\'installation',
);
?>