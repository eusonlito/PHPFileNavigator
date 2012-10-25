<?php
/****************************************************************************
* data/idiomas/br/axuda.inc.php
*
* Textos para el idioma Português(Brasil)
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
	'h1_quero_facer' => 'O que voce quer fazer?',
	'tit_crear_dir' => 'Criar diretório',
	'txt_crear_dir' => 'Para criar um diretório primeiro clicar na opção superior <strong><img src="[*$this->g("estilo")*]imx/crear_dir.png" alt="Criar diretório"/>Criar Diretório </strong>. Uma vez feito isto, você terá de preencher todos os campos necessários, embora, só o nome seja necessário.',
	'tit_subir_arq' => 'Enviar arquivo',
	'txt_subir_arq' => 'Para transferir um arquivo, primeiro clicar na opção superior <strong><img src="[*$this->g("estilo")*]imx/subir_arq.png" alt="Transferência de Arquivo"/> Transferência de Arquivo </strong>. Uma vez feito isto, você terá de preencher todos os campos necessários, então selecionar o arquivo que você transferirá.<br />Se é uma imagem que será transferia, haverá duas opções para criar uma cópia miniatura da imagem que está em <strong>Imagem Reduzida </strong>, se não, não utilize esta opção.',
	'tit_subir_url' => 'Escolher arquivo de outra web',
	'txt_subir_url' => 'Para transferir um arquivo que já existe em outra web, primeiro clique na opção <strong> <img src="[*$this->g("estilo")*]imx/subir_url.png"alt="Transferir de URL"/> Transferir de URL </strong>.<br />Uma vez feito isto, você terá de escrever <strong> Endereço URL </strong> que você quer fornecer, considerar que ele tem de ser um endereço completo, por exemplo, isto é melhor <i> http: // phpfilenavigator.litoweb.net/index.php </i> do que este <i> http: // phpfilenavigator.litoweb.net </i>, porque nesta opção última ele pode falhar, depois do URL o Endereço parece  <strong>Nome do arquivo para criar </strong> onde você tem a escrever um nome que permite que nós o identifiquemos depois, como <i> PHPfileNavigator Web </i>.',
	'tit_miniaturas' => 'Visualizar as imagens em uma versão em miniatura na lista de arquivo',
	'txt_miniaturas' => 'Você só tem de clicar na opção superior <strong><img src="[*$this->g("estilo")*]imx/ver_imaxes.png" alt="Thumbnails"/>Thumbnails</strong> para ser capaz de ver as imagens em uma versão em miniatura quando navegando na lista de arquivos.',
	'tit_arbore' => 'Ver todos os arquivos e diretórios em uma página',
	'txt_arbore' => 'Para examinar todo o conteúdo de uma raiz todos de uma vez, clique na opção superior <strong> <img src="[*$this->g("estilo")*]imx/arbore.png" alt="Visão de Árvore"/> Visão de Árvore </strong>, e lá parecerá todos os diretórios do raiz. Se você também quiser examinar todos os arquivos de cada pasta, clique na opção direita <strong> [Árvore Completa] </strong> e lá parecerá uma lista do conteúdo do raiz no qual você está.',
	'tit_buscar' => 'Procure um arquivo ou um texto no seu metas',
	'txt_buscar' => 'Você tem duas opções para procurar um arquivo, o primeiro é pelo menu superior a  <strong>Pesquisa </strong> e o segundo, escrevendo parte do nome no campo da  <strong>Pesquisa:</strong> e logo clicar na lupa.<br /><br />Nesta tela de forma de busca você só tem de escrever o texto que pertence ao arquivo ou a pasta que você tem de encontrar, escolher onde você quer procurar (nesta pasta ou raiz), nos campos onde você quer procurar o texto e pressionar o botão <strong> Aceitar </strong>. E você examinará embaixo todos os resultados encontradoss.',
	'tit_accions' => 'Um pouco de ação com só um arquivo ou pasta como cópia, mover, eliminar...',
	'txt_accions' => 'Você pode fazer qualquer ação que você quer com um arquivo ou pasta da coluna de <strong>Ações </strong> que está na linha última enumerada por arquivo ou pasta.<br />Esta coluna permite-lhe, em caso de ser capaz de usá-lo, as ações da <strong>Visualização de Informações </strong>,  <strong> Cópia</strong>, o  <strong> Movimento</strong>, <strong> Renomear </strong>, <strong> Eliminar </strong>,  <strong> Permissões de Modificação</strong> ou  <strong> Carregamento</strong>.',
	'tit_accions_multiple' => 'Um pouco de ação com muitos arquivos ou diretórios ao mesmo tempo',
	'txt_accions_multiple' => 'Se você tiver as permissões necessárias, você será capaz de fazer uma série de ações com múltiplos arquivos e diretórios, todos ao mesmo tempo. As ações que podem ser feitas são a <strong>Cópia </strong>,  <strong>Mover </strong>, <strong> Eliminar </strong>,  <strong> Permissões de Modificação</strong> e  <strong>Carregamento </strong>.',
	'h1_accions' => 'Que ações posso fazer em cada arquivo ou diretório listado?',
	'txt_info' => '<strong>Visualizar Informações: </strong> Esta opção permite que você examine a informação sobre detalhe como o tamanho, a data de criação, permissões ou dados relacionados à informação aditional como título e descrição, e uma forma para modificar esses dados.',
	'txt_copiar' => '<strong>Copiar: </strong> Permite fazer uma cópia de um arquivo ou pasta para um lugar de escolhido, se for uma pasta, ele copiará toda a informação no lugar desejado.',
	'txt_mover' => '<strong>Mover: </strong> Permite mover uma pasta a um lugar desejado no raiz. O arquivo selecionado ou a pasta serão copiados no lugar desejado e logo o original será eliminado.',
	'txt_renomear' => '<strong>Renomear: </strong>Permite trocar o nome do arquivo ou diretório.',
	'txt_eliminar' => '<strong>Deletar: </stong>Deleta um arquivo ou diretório e todo o seu conteúdo.',
	'txt_permisos' => '<strong>Permissões: </strong>Permite trocar as permissões de um arquivo ou diretório.',
	'txt_descargar' => '<strong>Baixar Arquivo: </strong> Força baixar um arquivo para o computador. Todos as descargas que foram feitas serão medidas pelo seu uso e também os tempos em que elas foram descarregadas.',
	'txt_comprimir' => '<strong> Comprima: </strong> Comprime um arquivo ou a pasta e todo o seu conteúdo para ser descarregado como um arquivo único para salvar bandwith, devido ao fato que o volume será menor do que em uma descarga regular.',
	'txt_redimensionar' => '<strong> Reduzir a Cópia de Imagem: </strong> Permite criar uma imagem com tamanho menor. A cópia reduzida será uma cópia exata do original mas em uma versão menor ou você pode selecionar uma parte da imagem original e criar uma cópia reduzida.',
	'txt_extraer' => '<strong>Descompressão: </strong> Permite tp dicomprimir um arquivo empacotado com TAR/GZ/TGZ/GZIP. Extraindo todo o conteúdo reconhecido que cria uma estrutura exata dos arquivos originais e diretórios. Um arquivo não pode ser extraído devido a um nome inválido, mas ele continuará com o resto da lista.',
	'txt_ver_contido' => '<strong>Visualizar Conteúdo: </strong> Permite examinar um arquivo de texto editável. Em caso de ser um arquivo usada na web (como PHP ou HTML) o código será colorido.',
	'txt_editar' => '<strong>Editar: </strong>Permite modificar o conteúdo de um arquivo texto.',
	'h1_accions_multiple' => 'Que ações posso refazer muitos sobre arquivos ou diretórios ao mesmo tempo?',
	'txt_multiple_copiar' => '<strong>Cópia: </strong> Permite copiar muitos arquivos e diretórios ao mesmo tempo. A cópia continuará embora um erro possa ocorrer e logo ele informará sobre o resultado.',
	'txt_multiple_mover' => '<strong>Mover: </strong> Permite mover muitos arquivos e diretórios ao mesmo tempo. Os selecionados serão movidos mesmo se um erro ocorrer movendo um deles e logo ele o informará sobre o resultado.',
	'txt_multiple_eliminar' => '<strong> Deletar: </strong> Permite eliminar muitos arquivos e diretórios ao mesmo tempo. O processo continuará mesmo se um erro ocorrer eliminando um deles e logo ele o informará sobre o resultado.',
	'txt_multiple_permisos' => '<strong>Modificação de Permissões: </strong> Permite modificar as permissões para muitos arquivos e diretórios ao mesmo tempo. O processo continuará mesmo se um erro puder ocorrer modificando um deles e logo ele o informará no resultado.',
	'txt_multiple_comprimir' => '<strong>Baixando pacote: </strong> Permite descarregar todos os arquivos  e diretórios selecionados em um arquivo comprimido para salvar bandwith. O arquivo criado estará no formato ZIP.',
	'h1_problemas' => 'Como posso concertar este problema?',
	'tit_problema_subir_arq' => 'Não posso transferir um arquivo ou uma URL',
	'txt_problema_subir_arq' => 'Se você não puder transferir  um arquivo e um URL você deve verificar se têm bastante espaço no disco para salvá-lo. A provar isto, no fundo da página lá deve aparecer algo como  <strong>Espaço livre: XX MB </strong> que indica o limite do espaço para salvar neste raiz. Omita esta informação em caso de que não aparecer.',
	'tit_problema_crear_dir' => 'Não posso criar um diretório',
	'txt_problema_crear_dir' => 'A causa mais freqüente de não permitir a criação de um diretório é porque o lugar onde você quer criar não tem permissões. Se isto acontecer um anúncio aparecerá mostrando a você o problema. Se este problema não puder ser fixado pelo usuário, por favor contate com o seu Administrador.',
	'tit_problema_buscador' => 'O pesquisador não encontra o que estou procurando',
	'txt_problema_buscador' => 'Se o pesquisador não puder encontrar o arquivo você está procurando e você sabe que existe na raiz você está, pessa ao Administrador para reindexar o seu conteúdo índice do raiz para atualizar os dados fornecidos relacionados.',
	'tit_problema_miniaturas' => 'Não posso visualizar as imágens em miniatura',
	'txt_problema_miniaturas' => 'Se você clicar <img src="[*$this->g("estilo")*]imx/ver_imaxes.png" alt="Visualizar Imagens"/><strong> Miniaturas </strong> as imagens em miniatura que vêm de grandes não aparecem na lista, isto significa que você não as criou. Para fazer isto clique em  <strong>Informação sobre Visualização </strong> na imagem selecionada e logo clicar na  <forte>Cópia Reduzida da Imagem </forte> onde você pode criar uma cópia personalizada ou um reduzido proporcional.',
	'tit_problema_paxinar' => 'Não posso visualizar o conteúdo do diretório',
	'txt_problema_paxinar' => 'Quando um diretório é demasiado grande (mais do que [*$this->g("paxinar")*] arquivos ou arquivo) o resultado é paginado. Se você quiser ir às páginas últimas ou seguintes você pode encontrar no fundo de uma lista onde você pode escolher qualquer página que você quer visitar.',
	'tit_problema_sesion' => 'Se eu passar algum tempo sem usar a página da Web o sistema me desconecta.',
	'txt_problema_sesion' => 'A razão disto é que o sistema tem um prazo de cada sessão para evitar o acesso ilegal depois que você deixa o seu computador sozinho. A sessão normalmente passa meia hora desde que você carrega a última página que você usa.',
);
?>