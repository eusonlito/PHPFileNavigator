<?php
/****************************************************************************
* data/idiomas/br/instalar.inc.php
*
* Textos para el idioma Portuguese (Brazil)
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
	'benvido' => 'Bem-vindos à instalação PHPfileNavigator',
	'idioma' => 'Idioma',
	'email' => 'E-mail do Administrador',
	'gd2' => 'Suporte de biblioteca de GD2',
	'zlib' => 'Suporte a biblioteca ZLIB',
	'si' => 'Sim',
	'non' => 'Não',
	'enviar' => 'Enviar',
	'base_datos' => 'Informação do Banco de Dados',
	'host' => 'Host',
	'db_nome' => 'Banco de Dados',
	'nome' => 'Nome',
	'usuario' => 'Usuário',
	'contrasinal' => 'Senha',
	'db_prefixo' => 'Prefixo de Tabelas',
	'administrador' => 'Dados de Administrador',
	'rep_contrasinal' => 'Repetir Senha',
	'raiz' => 'Dados do Raiz Principal',
	'ra_path' => 'Caninho Absoluto',
	'ra_web' => 'Caminho da Web',
	'ra_conf' => 'Arquivo de Configuração',
	'avisos_instalacion' => 'Alertas de Instalação',
	'erros' => array(
		'1' => 'Base de Dados: o HOST está falhando',
		'2' => 'Base de Dados: o NOME da base de dados está falhando',
		'3' => 'Base de Dados: o USUÁRIO está falhando',
		'4' => 'Administrador: o NOME está falhando',
		'5' => 'Administrador: o USUÁRIO está falhando',
		'6' => 'Administrador: a SENHA está falhando',
		'7' => 'Administrador: as senhas são diferentes',
		'8' => 'Raiz Inicial: o NOME está falhando',
		'9' => 'Raiz Inicial: o RUTE ABSOLUTO está falhando',
		'10' => 'Raiz Inicial: a WEB RUTE está falhando',
		'11' => 'Raiz Inicial: o HOST está falhando',
		'12' => 'Raiz Inicial: o ARQUIVO DE CONFIGURAÇÃO está falhando',
		'13' => 'O CORREIO ELETRÔNICO está falhando',
		'14' => 'Raiz Inicial: o diretório ABSOLUTO RUTE não existe',
		'15' => 'Raiz Inicial: a pasta RUTE ABSOLUTA não tem permissões de escrita',
		'16' => 'Raiz Inicial: o ARQUIVO DE CONFIGURAÇÃO não existe',
		'17' => 'Base de Dados: o HOST, NOME ou SENHA  não são corretos',
		'18' => 'Base de Dados: o NOME da base de dados não existe',
		'19' => 'A pasta data/conf/ deve ter permissões de escrita',
		'20' => 'Esta aplicação já foi instalada antes, se você tentar instalá-lo novamente, todos os dados salvados nas tabelas MySQL serão eliminados (Exceto para realizá-lo).<br /><br />Se você não quiser instalar este aplicação, por favor elimine a pasta <i> instalar / </i>.',
		'21' => 'A pasta tmp/ deve ter permissões de escrita',
		'22' => 'A pasta data/logs/ deve ter permissões de escrita',
		'23' => 'A pasta data/info/ deve ter permissões de escrita',
		'24' => 'Não existe uma versão prévia para atualizar ou o arquivo data/conf/basicas.inc.php não tem permissões de escrita.',
		'25' => 'Com uma atualização de uma versão antes de 2.0.0 e depois do que 1.5.7, Haverá modificações na estrutura de banco de dados sem afetar o conteúdo, também a atualização lógica e melhoras nos arquivos de aplicação.<br /><br />Para fazer uma instalação correta, sobrescreva a versão prévia com isto, cuidar quando sobrescrever o arquivo data/conf/defaults.inc.php e todos serão instalados corretamente.<br /><br />Você tem em mente que o arquivo config data/conf/defaults.inc.php pode conter config vars mais recêntes que sua versão, por favor, antes de sobregravar este arquivo verificar as diferenças e use o novo arquivo.',
		'26' => 'Isto não faz um pouco de ação.<br /><br />Se você tiver uma versão igual do que 2.0.0, só precisa sobregravar sua instalação com isto, cuidando quando sobregravam do data/conf/defaults.inc.php e todos serão instalados corretamente.<br /><br />Tenha em mente que o arquivo config data/conf/defaults.inc.php pode conter config vars mais recêntes que sua versão, por favor, antes sobregrava este arquivo verificam as diferenças e use o novo arquivo.',
		'27' => 'O arquivo data/conf/basicas.inc.php não tem permissões de escrita.',
		'28' => 'Você tem escolher um Charset',
		'29' => 'Algum requisição executada deu um erro. Tente fazer a instalação novamente.',
		'30' => 'Não posso atualizar de uma versão igual ou superior do que este pacote. Por favor reveja isto a versão instalada não é a mesma que você está  tentando instalar.',
	),
	'axuda' => array(
		'accion' => 'Você pode escolher um modo de instalação:<br /><br /><strong>Instalação: </strong> permitem fazem uma nova instalação deletando as tabelas, se existir, e sobregrendo os arquivos config.<br /> <strong>Atualização de versão> 1.5.7 e <2.0.0:  não Fazem nada: </strong> ele não modifica o banco de dados nem modifica os dados config.',
		'idioma' => 'Você pode escolher a língua PHPfileNavigator e o uso.',
		'gd2' => 'Se o servidor tiver instalado bibliotecas GD2 para arranjar-se as imagens e permitir criam boas thumbnails de imagem de qualidade.',
		'zlib' => 'Se o servidor tem bibliotecas ZLIB para comprimir e extrair arquivos.',
		'charset' => 'O seu servidor charset.',
		'db_host' => 'O seu servidor MySQL. f.e . <strong>: localhost </strong>',
		'db_nome' => 'Nome de banco de dados a ser instalado. <strong> Ele deve existir antes da instalação. </strong>',
		'db_usuario' => 'Usuário de MySQL para acessar ao banco de dados. Ele deve ter permissões de criar e modificar tabelas.',
		'db_contrasinal' => 'Senha para acessar com este usuário.',
		'db_rep_contrasinal' => 'Repita a senha prévia.',
		'db_prefixo' => 'Prefixo de tabela. Evitar que você sobregrave outras tabelas com o mesmo nome.',
		'ad_nome' => 'Usuário Admin nome comum.',
		'ad_usuario' => 'Apelido de usuário de entrada.',
		'ad_contrasinal' => 'Senha do usuário admin.',
		'ad_rep_contrasinal' => 'Repita a senha prévia.',
		'ad_email' => 'Correio eletrónico do Admin. A este correio será enviado alertas de segurança ou problemas de acesso.',
		'ra_nome' => 'Nome genérico para esta raiz. Permita identificar na lista de raiz se você tiver o acesso a mais de um. f.e . <strong>: Raiz Principal </strong>',
		'ra_path' => 'Via absoluta de raiz de servidor. Antes de que você possa criar mais raízes acessíveis.<br />Lembre-se de que você deva usar / barra em vez da invertida. f.e . <strong>:/var/www/html/docs / </strong>',
		'ra_web' => 'Caminho de acesso do raiz do domínio. f.e . <strong>:/docs / </strong>',
		'ra_host' => 'Nome de domínio para gerenciar. Sem http f.e . <strong>: www.mydomain.com </strong>',
		'raices_atopadas' => 'Isso',
		'usuarios_atopados' => 'Isto é a relação com um grupo. Quando atualizado você pode escolher só nesta lista, mas então você pode criar e dirigir todos os usuários e grupos.',
		'configuracions_atopadas' => 'Arquivo de Config encontrado. Na nova zona de admin você pode criar, modificar ou eliminar arquivos config e designar para grupos ou raízes.',
		'aviso_instalacion' => 'Se você marcar esta opção, a instalação irá enviar ao desenvolvedor PHPfileNavigator uma nova mensagem de advertência de instalação. Só faz envio ao admin da mensagem e host. <strong> Não enviam </strong> nenhuma informação pessoal como caminhos, dados de usuário ou senhas. Isto permite-lhe ser informado sobre novas versões ou conselhos de segurança.',
	),
	'instalacion_correcta' => 'O PHPfileNavigator foi instalado corretamente.<br /><br />Você tem de eliminar a pasta instalar/ para terminar a instalação.<br /><br />Agradeço o uso esta aplicação.',
	'accion' => 'Ação',
	'a:instalar' => 'Instalar',
	'a:actualizar_168' => 'Atualizar da versão >1.5.7 e <2.0.0',
	'a:nada' => 'Não fazer nada',
	'usuarios' => 'Usuários',
	'charset' => 'Charset',
	'datos_xerais' => 'Dados genéricos',
	'raices_atopadas' => 'Raizes Encontrados',
	'usuarios_atopados' => 'Usuários Encontrados',
	'admins' => 'Admins',
	'configuracions_atopadas' => 'Confs Encontrados',
	'doazon' => 'Se você gostar desta aplicação ou foi usado em uma companhia ou integrado em um projecto não-gratuito, por favor faça uma doação, Agradecimentos!!!!',
	'aviso_instalacion' => 'Conselho de Intalação',
);
?>