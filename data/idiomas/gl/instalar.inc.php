<?php
/****************************************************************************
* data/idiomas/gl/instalar.inc.php
*
* Textos para el idioma Galego
*

PHPfileNavigator versión 2.3.2

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
	'benvido' => 'Benvido o instalador do PHPfileNavigator',
	'i:presentacion' => 'Presentaci&oacute;n',
	'i:directorios' => 'Permisos de directorios',
	'i:comprobacion' => 'Comprobaci&oacute;n do sistema',
	'i:datos' => 'Datos de configuraci&oacute;n',
	'i:instalar' => 'Instalar',
	'i:remate' => 'Completado',
	'i:intro_presentacion' => '<p>Benvido o PHPfileNavigator</p><br /><p>Este instalador guiarate a trav&eacute;s dos pasos necesarios para levar a cabo unha instalaci&oacute;n correcta da aplicaci&oacute;n.</p><br /><p>Como ben sabes, este &eacute; un potente, funcional e seguro administrador de arquivos en li&ntilde;a con unha gran cantidade de posibilidades adicionais que podes consultar na web oficial <a href="http://pfn.sourceforge.net/">http://pfn.sourceforge.net/</a>.</p>',
	'i:intro_escolle_idioma' => '<p>Primeiro debes escoller o <strong>idioma</strong> no que desexas realizar a instalaci&oacute;n. En caso de que o idioma que precisas non se atope en este listado, podes acceder a secci&oacute;n de descargas da web oficial para comprobar se existe unha traducci&oacute;n. A traducci&oacute;n que te descargues podes instalala cando queiras, non ten por que ser agora</p>',
	'idioma' => 'Idioma',
	'i:intro_tipo_instalacion' => '<p>Agora escolle o tipo de instalaci&oacute;n que desexas realizar. Si o PHPfileNavigator non foi instalado con anterioridade selecciona a opci&oacute;n de <strong>instalar</strong>, en caso contrario escolle a opci&oacute;n de <strong>actualizar</strong>.</p><br /><p>Ten en conta que si escolles instalar dende cero e xa existe unha instalaci&oacute;n previa, eliminar&aacute; todo o contido das tablas de MySQL da instalaci&oacute;n anterior.</p>',
	'tipo_instalacion' => 'Tipo de instalaci&oacute;n',
	'instalar_cero' => 'Instalaci&oacute;n dende cero ou reinstalaci&oacute;n de esta versi&oacute;n',
	'i:actualizar' => 'Actualizar dende unha versi&oacute;n anterior',
	'i:intro_actualizar' => 'Vaise a proceder ao actualizaci&oacute;n da s&uacute;a instalaci&oacute;n actual. Se detecta alg&uacute;n problema en este proceso, por favor deixe unha mensaxe no foro oficial <a href="http://pfn.sourceforge.net/phpBB2/" onclick="window.open(this.href); return false;">http://pfn.sourceforge.net/phpBB2/</a> para que poida ser correxido o antes posible.',
	'continuar_paso_2' => 'Continuar co paso 2 &raquo;',
	'continuar_paso_3' => 'Continuar co paso 3 &raquo;',
	'continuar_paso_4' => 'Continuar co paso 4 &raquo;',
	'continuar_paso_5' => 'Instalar &raquo;',
	'continuar_paso_6' => 'Rematar &raquo;',
	'voltar_paso_1' => '&laquo; Voltar o paso 1',
	'voltar_paso_2' => '&laquo; Voltar o paso 2',
	'voltar_paso_3' => '&laquo; Voltar o paso 3',
	'i:intro_directorios' => '<p>En este paso realizaranse unha serie de comprobaci&oacute;ns para verificar que os directorios te&ntilde;en os permisos correctos.</p><br /><p>O ideal para os permisos dos directorios ser&iacute;a que s&oacute; o servidor te&ntilde;a permisos de lectura, escritura e execuci&oacute;n (700 apache:nobody), a&iacute;nda que isto non ser&aacute; posible en un aloxamento compartido polo que ter&aacute;s que usar 777.</p>',
	'i:path_ok' => 'O directorio ten os permisos correctos.',
	'i:path_erro' => 'O directorio non ten os permisos correctos. O usuario do servidor debe ter permisos de escritura.',
	'i:arq_ok' => 'O arquivo ten os permisos correctos.',
	'i:arq_erro' => 'O arquivo non ten os permisos correctos. O usuario do servidor debe ter permisos de escritura.',
	'i:intro_comprobacion' => '<p>Neste paso se verif&iacute;case que o servidor cumpre con todos os requisitos precisos para a instalaci&oacute;n.</p><br /><p>Nas comprobaci&oacute;ns rev&iacute;sase a versi&oacute;n do PHP (> 4.0.6), MySQL (>= 4.0.0), GD, o l&iacute;mite de memoria e a capacidade de subida de arquivos.</p>',
	'i:instalado_ok' => 'A versi&oacute;n instalada &eacute; correcta:',
	'i:instalado_erro' => 'A versi&oacute;n instalada &eacute; inferior a precisada para un correcto uso da aplicaci&oacute;n, polo que non se pode continuar coa instalaci&oacute;n:',
	'i:instalado_aviso' => 'A versi&oacute;n instalada &eacute; inferior a precisada para un perfecto uso da aplicaci&oacute;n, pero non impide o seu correcto funcionamento:',
	'i:mysql_erro' => 'Esta instalaci&oacute;n de PHP non incl&uacute;e soporte para MySQL. Debes instalar os m&oacute;dulos precisos ou recompilar o PHP para engadirlle o soporte.',
	'i:gd_erro' => 'Esta instalaci&oacute;n de PHP non incl&uacute;e soporte para as librer&iacute;as GD. Debes instalar os m&oacute;dulos precisos ou recompilar o PHP para engadirlle o soporte.',
	'i:safe_mode_erro' => 'O servidor est&aacute; configurado como safe_mode = On co que ter&aacute;s problemas a hora de realizar acci&oacute;ns con arquivos ou directorios xa que os permisos non ser&aacute;n os adecuados. Consulta o teu proveedor de aloxamento para solicitarlle o cambio a safe_mode = Off.',
	'i:safe_mode_ok' => 'A configuraci&oacute;n do servidor &eacute; correcta para safe_mode = Off.',
	'i:upload_ok' => 'A configuraci&oacute;n do servidor permite unha boa capacidade de subida (m&aacute;is de 10 megas por arquivo):',
	'i:upload_erro' => 'A configuraci&oacute;n do servidor non permite unha capacidade de subida axeitada (menos de 10 Megas por arquivo):',
	'i:memory_ok' => 'A configuraci&oacute;n do servidor permite facer uso dunha grande cantidade de memoria, o cal acelerar&aacute; procesos como a copia reducida de imaxes ou a compresi&oacute;n de arquivos e directorios:',
	'i:memory_erro' => 'A configuraci&oacute;n do servidor non permite facer uso dunha grande cantidade de memoria, o cal aminorar&aacute; procesos como a copia reducida de imaxes ou a compresi&oacute;n de arquivos e directorios:',
	'i:zlib_erro' => 'Esta versi&oacute;n do PHP non disp&oacute;n de soporte para o Zlib polo que dar&aacute; erros no intre de extraer, ver contido ou comprimir arquivos. Para evitar estes erros desactiva a extracci&oacute;n, compresi&oacute;n e visualizaci&oacute;n de arquivos comprimidos.',
	'i:intro_datos' => '<p>Esta &eacute; a &uacute;ltima pantalla antes de levar a cabo a instalaci&oacute;n.</p><br /><p><strong>Todos os campos son obrigatorios.</strong></p><br /><p>Se tes d&uacute;bidas sobor de como debes cubrir alg&uacute;n dos campos, preme no <a href="#">(?)</a> que se atopa &aacute; s&uacute;a esquerda.</p>',
	'i:axuda' => array(
		'charset' => 'Cada idioma adoita ter o seu propio xogo de caracteres para a visualizaci&oacute;n correcta de todos os s&iacute;mbolos e letras na pantalla. O correcto &eacute; que coincida co do servidor web e co do sistema.',
		'db_servidor' => 'O servidor no que est&aacute; instalado o MySQL. Casi sempre <strong>localhost</strong>',
		'db_nome' => 'O nome do banco de datos no que ser&aacute; instalado. <strong>Debe existir no intre da instalaci&oacute;n.</strong>',
		'db_usuario' => 'O usuario a traverso do cal se acceder&aacute; ao banco de datos. Debe ter permisos de creaci&oacute;n, modificaci&oacute;n e borrado de t&aacute;boas no banco de datos escollido.',
		'db_contrasinal' => 'Contrasinal de acceso do usuario a base de datos escollida.',
		'db_rep_contrasinal' => 'Repetiro o contrasinal anterior.',
		'db_prefixo' => 'Prefixo para as t&aacute;boas. As&iacute; evitar&aacute;s a posibilidade de sobreescribir outras xa existentes co mesmo nome.',
		'ad_nome' => 'Nome com&uacute;n do usuario administrador. <strong>Non ser&aacute; o usuario de acceso</strong>.',
		'ad_usuario' => 'Usuario co que acceder&aacute; a aplicaci&oacute;n como administrador.',
		'ad_contrasinal' => 'Contrasinal de acceso do usuario administrador o PHPfileNavigator.',
		'ad_rep_contrasinal' => 'Repetir o contrasinal anterior.',
		'ad_correo' => 'Correo electr&oacute;nico do administrador. A este correo chegar&aacute;n as alertas de seguridade por tentativas de intrusi&oacute;n ou problemas de acceso.',
		'ra_nome' => 'Nome xen&eacute;rico para esta raiga&ntilde;a. Serve para identificala no listado de raiga&ntilde;as e no caso de que te&ntilde;as acceso a m&aacute;is dunha. <strong>p.e.: Raiga&ntilde;a Principal</strong> ou <strong>Directorio de documentos</strong>',
		'ra_path' => 'A ruta do directorio que se vai xestionar. Debe ser a absoluta dende a raiga&ntilde;a do servidor. Logo poder&aacute;s crear m&aacute;s raiga&ntilde;as de acceso.<br /><br />Lembra que debes usar / no canto da barra invertida tanto en sistemas Linux/Unix coma en Windows, e que esta ruta debe rematar con /.<br /><br />Non &eacute; recomendable po&ntilde;er como ruta o propio directorio de instalaci&oacute;n do PHPfileNavigator nin subdirectorio seu ning&uacute;n. <strong>p.e.: /var/www/html/docs/</strong> ou <strong>c:/phpdev/www/docs/</strong>',
		'ra_web' => 'A ruta de acceso por web dende a raiga&ntilde;a do dominio ao directorio que se vai administrar.<br /><br />Por exemplo, se vamos administrar un directorio chamado docs e nese directorio existe un documento como logo.png, no caso de querer acceder ao mesmo dende o web, escribir&iacute;amos http://www.omeudominio.com/docs/logo.png, polo que a raiga&ntilde;a web ser&iacute;a <strong>/docs/</strong> neste caso.',
		'ra_dominio' => 'Nome do dominio que se vai xestionar. Sen http. <strong>p.e.: www.omeudominio.com</strong>',
		'raices_atopadas' => 'Atop&aacute;ronse as seguintes ra&iacute;ces que ser&aacute;n configuradas.',
		'aviso' => '<p>Esta aplicaci&oacute;n est&aacute; en continuo desenvolvemento. Se habilitas a caixa de <strong>Aviso de instalaci&oacute;n</strong> enviar&aacute;selle ao desenvolvedor do PHPfileNavigator un correo de aviso de nova instalaci&oacute;n ou actualizaci&oacute;n no que se remitir&aacute; &uacute;nicamente o correo electr&oacute;nico do administrador e o host no que foi instalado.</p><br /><p><strong>Non se enviar&aacute; informaci&oacute;n personal de ningunha caste</strong> coma rutas, datos de usuario ou contrasinais. Isto permitirache estar informado das novas versi&oacute;ns ou avisos de seguridade.</p><br /><p>Non se enviar&aacute; en caso ning&uacute;n correo non desexado nin informaci&oacute;n que non sexa importante.</p><br /><p>Podes revisar o c&oacute;digo de env&iacute;o do correo no arquivo instalar/include/paso_5.inc.php entre as li&ntilde;as 45 e 63.</p>',
	),
	'i:aviso' => 'Aviso de instalaci&oacute;n',
	'i:charset' => 'Xogo de caracteres',
	'i:base_datos' => 'Base de datos',
	'i:db_servidor' => 'Servidor',
	'i:db_nome' => 'Nome da base de datos',
	'i:db_usuario' => 'Usuario',
	'i:db_contrasinal' => 'Contrasinal',
	'i:db_prefixo' => 'Prefixo',
	'i:administrador' => 'Usuario administrador',
	'i:ad_nome' => 'Nome com&uacute;n',
	'i:ad_usuario' => 'Usuario',
	'i:ad_contrasinal' => 'Contrasinal',
	'i:ad_rep_contrasinal' => 'Repetir contrasinal',
	'i:ad_correo' => 'Email',
	'i:raiz' => 'Ra&iacute;z principal',
	'i:ra_nome' => 'Nome',
	'i:ra_path' => 'Ruta absoluta',
	'i:ra_web' => 'Ruta web',
	'i:ra_dominio' => 'Dominio',
	'i:erros' => array(
		'1' => 'Tes que seleccionar un xogo de caracteres correcto.',
		'2' => 'Tes que cubrir o campo do Servidor para o Banco de Datos.',
		'3' => 'Tes que cubrir o Nome do Banco de Datos a usar.',
		'4' => 'Tes que cubrir o campo do Usuario de acceso ao Banco de Datos.',
		'5' => 'Tes que cubrir o campo de Nome Com&uacute;n para o Usuario administrador.',
		'6' => 'Tes que cubrir o campo de Usuario para o Usuario administrador.',
		'7' => 'Tes que asignarlle un contrasinal ao Usuario administrador.',
		'8' => 'Os campos de Contrasinal e Repatir Contrasinal te&ntilde;en que coincidir.',
		'9' => 'O Usuario administrador ten que dispo&ntilde;er dun correo electr&oacute;nico.',
		'10' => 'A Raiga&ntilde;a principal ten que dispo&ntilde;er dun nome.',
		'11' => 'A raiga&ntilde;a principal ten que dispo&ntilde;er dunha Ruta absoluta.',
		'12' => 'A Raiga&ntilde;a principal ten que dispo&ntilde;er dunha Ruta web.',
		'13' => 'A Raiga&ntilde;a principal ten que dispo&ntilde;er dun dominio de localizaci&oacute;n.',
		'14' => 'O directorio de Ruta absoluta na Raiga&ntilde;a principal non existe.',
		'15' => 'O usuario indicado para o Banco de Datos non ten permisos de acceso.',
		'16' => 'Non se puido usar o Banco de Datos seleccionado.',
		'17' => 'A seguinte consulta deu un erro:',
		'18' => 'Non se atopou o arquivo de configuraci&oacute;n que indica a existencia dunha versi&oacute;n xa instalada. Proba cunha instalaci&oacute;n completa en troques dunha actualizaci&oacute;n.',
	),
	'i:intro_instalar' => 'Nesta pantalla ver&aacute;s reflectidas as acci&oacute;ns efectuadas para a instalaci&oacute;n do PHPfileNavigator.',
	'i:conexion_mysql' => 'Conexi&oacute;n a MySQL',
	'i:mysql_ok' => 'A conexi&oacute;n ao servidor MySQL e a selecci&oacute;n do banco de datos foi correcta.',
	'i:consultas_mysql' => 'Instalaci&oacute;n das t&aacute;boas',
	'i:consultas_ok' => 'Todas as t&aacute;boas foron creadas e os datos inicializados de xeito correcto.',
	'i:consultas_erro' => 'Houbo un erro ao executar a actualizaci&oacute;n do banco de datos. Revisa a lista de erros e contacta con desenvolvedor do PHPfileNavigator para comunicarllo.',
	'i:creacion_directorios' => 'Creaci&oacute;n de directorios',
	'i:crear_directorios_ok' => 'Todos os directorios precisos foron creados de xeito correcto.<br /><br />Si esta &eacute; unha actualizaci&oacute;n dende unha versi&oacute;n anterior, pode que precise eliminar certos cartafois. Os cartafois que debes eliminar son <strong>tmp/, <strong>data/logs/</strong> e <strong>data/info/</strong> pero s&oacute; se est&aacute;n fora do cartafol <strong>data/servidor/</strong>.',
	'i:arq_configuracion' => 'Arquivo de configuraci&oacute;n',
	'i:arq_configuracion_ok' => 'O arquivo de configuraci&oacute;n foi xerado de xeito correcto. Podes ver o seu contido en data/conf/basicas.inc.php',
	'i:arq_inc' => 'Arquivos de informaci&oacute;n adicional',
	'i:arq_inc_ok' => 'Os arquivo usados para gardar os datos de informaci&oacute;n adicional coma o t&iacute;tulo e descrici&oacute;n foron movidos a un directorio propio do PHPfileNavigator co que se limpan e mante&ntilde;en intactas as raiga&ntilde;as dadas de alta sen alterar o seu contido con arquivos adicionais. Tam&eacute;n se moveron as imaxes en miniatura existentes.',
	'i:intro_remate' => '<p>Noraboa, o PHPfileNavigator foi instalado con &eacute;xito.</p><br /><p>Para comezar usar a aplicaci&oacute;n <strong>tes que eliminar ou renomear o directorio "instalar"</strong> ou volver&aacute;s ver a pantalla de instalaci&oacute;n.</p><br /><p>Para calquera d&uacute;bida ou suxesti&oacute;n, podes acceder ao foro oficial en <a href="http://pfn.sourceforge.net/phpBB2/" onclick="window.open(this.href); return false;">http://pfn.sourceforge.net/phpBB2/</a>, e tentarei respostarche o m&aacute;is axi&ntilde;a posible.</p><br /><p>Lembra que esta &eacute; unha aplicaci&oacute;n de balde e de distribuci&oacute;n e modificaci&oacute;n ceibes (GPL). Se desexas que este proxecto dure por tempo ilimitado e siga a traballar na correcci&oacute;n de erros, novas funcionalidades e soporte nos foros, podes colaborar cunha doaci&oacute;n que axudar&aacute; a soster todo o traballo realizado e por realizar.</p><br /><p>As doaci&oacute;ns p&oacute;dense realizar a trav&eacute;s do PayPal nos seguintes bot&oacute;ns:</p>',
	'i:doar' => 'Doar',
	'i:doar_paypal' => 'Doar con PayPal',
	'i:doar_tarxeta' => 'Doar con tarxeta de cr&eacute;dito/d&eacute;bito',
	'i:recargar' => 'Recargar',
	'i:tit_bloqueo_instalacion' => 'Instalaci&oacute;n bloqueada',
	'i:txt_bloqueo_instalacion' => '<p>Esta instalaci&oacute;n foi bloqueada para evitar que d&uacute;as persoas poidan executar o instalador ao mesmo tempo.</p><br /><p>Se ti &eacute;s o administrador e polo tanto a persoa que realmente realizar&aacute; a instalaci&oacute;n, tes que eliminar o arquivo de bloqueo que se atopa en <strong>tmp/instalar.lock</strong> para as versi&oacute;ns anteriores a 2.3.0 do PHPfileNavigator e en <strong>data/servidor/tmp/instalar.lock</strong> para as versi&oacute;ns iguais ou posteriores.</p><br /><p>Unha vez que te&ntilde;as eliminado ese arquivo tes que ser r&aacute;pido en actualizar a p&aacute;xina e volver acceder ao instalador, para as&iacute; obter os permisos precisos para poder continuar.</p><br /><p>Diante de calquera d&uacute;bida ou incidencia neste proceso ou no uso do PHPfileNavigator podes visitar a p&aacute;xina oficial <a href="http://pfn.sourceforge.net/">http://pfn.sourceforge.net/</a> e nos foros poder&aacute;s atopar soluci&oacute;ns aos teus problemas.</p><br /><strong>Lito</strong>.',
	'i:actualizar_200-201' => 'Actualizar a versi&oacute;n 2.0.1',
	'i:actualizar_201-220' => 'Actualizar a versi&oacute;n 2.2.0',
	'i:actualizar_220-230' => 'Actualizar a versi&oacute;n 2.3.0',
	'i:consulta' => 'Consulta',
	'i:erro' => 'Erro',
	'i:reintentar' => 'Volver a intentalo',
	'i:omitir' => 'A mi&ntilde;a configuraci&oacute;n &eacute; correcta, quero omitir esta comprobaci&oacute;n.<br />O PHPfileNavigator non funcionar&aacute; correctamente se non se cumpren estos requisitos.',
	'admins' => 'Administradores',
	'i:aviso_default' => '<strong>AVISO:</strong> No directorio data/conf/ hai un arquivo chamado default-example.inc.php que debe ser renomeado a default.inc.php antes de continuar coa instalaci&oacute;n.<br /><br />Se xa disp&oacute;s de unha instalaci&oacute;n previa, comproba as diferencias entre os dous arquivos e engade aquelas li&ntilde;as que non existan na instalaci&oacute;n anterior.',
);
?>
