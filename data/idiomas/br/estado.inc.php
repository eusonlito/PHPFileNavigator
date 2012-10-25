<?php
/****************************************************************************
* data/idiomas/br/estado.inc.php
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
	'estado.crear_dir' => array(
		'0' => 'Ocorreu um erro enquanto criava um diretório.',
		'1' => 'Diretório criado com sucesso.',
		'2' => 'Já existe um diretório com esse nome.',
		'3' => 'Diretório sem permissões.',
		'4' => 'O nome contém caracteres não permitidos, escolha um outro nome para o dirotório.',
		'5' => 'O tamanho limite para esse raiz foi ultrapassado.',
	),
	'estado.subir_arq' => array(
		'0' => 'ocorreu um erro quando enviava um dos arquivos.',
		'1' => 'Arquivo enviado com sucesso.',
		'2' => 'O nome não contém caracteres permitidos, troque o nome do arquivo.',
		'3' => 'Existe um arquivo com esse nome.',
		'4' => 'Diretório destino sem permissão de escrita.',
		'5' => 'O tamanho do arquivo é maior que o tamanho permitido por essa configuração.',
		'6' => 'O arquivo ultrapassa o tamanho máximo permitido para esse raiz.',
		'7' => 'O arquivo ultrapassa o limite de bandwidth permitida para esse mês.',
	),
	'estado.eliminar_dir' => array(
		'0' => 'O diretório ou parte dele não foi totalmente deletado, voce tem que provar permissões com o admonistrador.',
		'1' => 'Diretório deletado com sucesso.',
		'2' => 'Voce tem certeza que deseja deletar esse diretório vazio?',
		'3' => 'Este diretório não está vazio,<br />Vove tem certeza que deseja deletar esse diretório e todo o seu conteudo?',
		'4' => 'O diretório que voce deseja deletar não existe.',
	),
	'estado.eliminar_arq' => array(
		'0' => 'O arquivo não pode ser deletado, verificar permissões.',
		'1' => 'Arquivo deletado com sucesso.',
		'2' => 'Voce tem certeza que deseja deletar esse arquivo?',
		'4' => 'O arquivo que voce deseja deletar não existe.',
	),
	'estado.renomear' => array(
		'0' => 'O nome não pode ser trocado, verificar permissões.',
		'1' => 'Nome trocado com sucesso.',
		'2' => 'Já existe um diretório com esse nome.',
		'3' => 'Já existe um arquivo com esse nome.',
		'4' => 'O novo nome cotém um texto não permitido.',
	),
	'estado.mover_dir' => array(
		'0' => 'O diretório ou parte dele não pode ser movido, verificar permissões para o diretório e para o diretório destino.',
		'1' => 'Diretório movido com sucesso.',
		'2' => 'Esse diretório não está vazio,<br />Selecione o destino para mover esse diretório e todo o seu conteúdo.',
		'3' => 'Selecione o destino para mover esse diretório vazio.',
		'4' => 'O diretório destino não existe.',
		'5' => 'Diretório destino sem permissão para escrita.',
		'6' => 'Já existe diretório no diretório destino com esse nome.',
		'7' => 'Voce não pode copiar por cima dele mesmo.',
	),
	'estado.mover_arq' => array(
		'0' => 'O arquivo não pode ser movido, verificar por permissão na origem e destino.',
		'1' => 'Arquivo movido com sucesso.',
		'2' => 'Escolha um destino para esse arquivo.',
		'3' => 'Já existe um arquivo com esse nome no diretório destino.',
		'4' => 'Não existe o diretório destino.',
		'5' => 'Diretorio destino sem permissão para escrita.',
		'6' => 'Uma cópia foi criada no destino, mas o original não pode ser deletado.',
	),
	'estado.copiar_dir' => array(
		'0' => 'O diretório e parte de seu conteúdo não pode ser copiados, verificar por permissões na origem e destino.',
		'1' => 'Diretório copiado com sucesso.',
		'2' => 'Este diretório não está vazio,<br />Selecione o destino para copiar esse diretório e seu conteúdo.',
		'3' => 'Selecione um destino para copiar esse dirtório vazio.',
		'4' => 'O diretório destino não existe.',
		'5' => 'Diretório destino sem permissão para escrita.',
		'6' => 'Já existe um diretório no destino com esse nome.',
		'7' => 'Um diretório não pode ser copiado no mesmo diretório.',
		'8' => 'Voce não pode copiar esse diretório porque ultrapassa o limite desse raiz.',
	),
	'estado.copiar_arq' => array(
		'0' => 'O arquivo não pode ser copiado, verificar permissões na origem e destino.',
		'1' => 'Arquivo copiado com sucesso.',
		'2' => 'Selecione um destino para esse arquivo.',
		'3' => 'Já existe um arquivo no diretório destino com mesmo nome.',
		'4' => 'O diretório destino não existe.',
		'5' => 'Diretório destino sem permissão de escrita.',
		'6' => 'Voce não pode copiar esse arquivo ele supera o limite para esse raiz.',
	),
	'estado.enlazar_dir' => array(
		'0' => 'O diretório ou parte dele não pode ser laçado, verificar permissões na origem e destino.',
		'1' => 'Diretório laçado com sucesso.',
		'2' => 'O diretório destino não existe.',
		'3' => 'Diretório destino sem permissão de escrita.',
		'4' => 'Já existe diretório com esse nome no destino.',
	),
	'estado.enlazar_arq' => array(
		'0' => 'O arquivo não pode ser laçado, verificar por permissão na origem e destino.',
		'1' => 'Arquivo laçado com sucesso.',
		'2' => 'Selecionar local de destino para esse arquivo.',
		'3' => 'Já existe um arquivo no diretório destino com esse nome.',
		'4' => 'O diretório destino não existe.',
		'5' => 'Diretório destino sem permissão de escrita.',
	),
	'estado.editar' => array(
		'0' => 'Um erro ocorreu editando o arquivo.',
		'1' => 'Arquivo editado com sucesso.',
		'2' => 'Arquivo sem permissão de escrita.',
		'3' => 'O arquivo para editar não existe.',
		'4' => 'Não é permitido editar esse arquivo.',
	),
	'estado.subir_url' => array(
		'0' => 'Um erro ocorreu com a URL.',
		'1' => 'A URL solicitada foi salva corretamente.',
		'2' => 'Um arquivo com esse nome já existe.',
		'3' => 'O diretório destino não tem permissão de escrita.',
		'4' => 'Considere que o tempo de espera pode ser muito longo se você escolher arquivos ponderados. É recomendado escolher arquivos de texto, como páginas da Web.',
		'5' => 'Por favor espere enquanto  URL escolhida vem sendo carregada.<br /><br />Considere que se o documento edcolhido é muito pesado o tempo de espera podera ser muito longo.',
		'6' => 'A URL de baixar arquivo foi cancelada com sucesso.',
		'7' => 'Não podem carregar do endereço dado porque ele excede o limite do raiz escolhido.',
		'8' => 'O nome escolhido para o arquivo possui caracteres não permitidos.',
		'9' => 'Com aquele arquivo o limite de largura de banda durante este mês será excedido.',
	),
	'estado.extraer' => array(
		'0' => 'Foi impossível extrair qualquer um dos arquivos, o arquivo comprimido pode estar defeituoso ou ter um formato incorreto.',
		'1' => 'Todos os arquivos foram extraídos corretamente.',
		'2' => 'O arquivo não tem uma extensão válida (tar, gz, gzip, tgz).',
		'3' => 'Esta aplicação não suporta extrações deste tipo de arquivo.',
		'4' => 'Não pode ser extraído, está corrompido.',
		'5' => 'Alguns arquivos não foram extraídos, eles já existem.',
		'6' => 'Alguns arquivos não podem ser abertos para a escrita.',
		'7' => 'A extração não pode ser terminada porque o conteúdo excede o máximo volume permitido para este raiz.',
		'8' => 'Alguns arquivos com nomes não permitidos ou estão vazios, portanto eles não foram extraídos.',
		'9' => 'Alguns diretórios necessários à extração do conteúdo não podem ser criados.',
	),
	'estado.multiple_copiar' => array(
		'0' => 'O diretório/arquivo não pode ser copiado, verificar as permissões tanto em origem como em destino.',
		'1' => 'Todos os diretórios ou os arquivos foram copiados corretamente.',
		'2' => 'Escolha o destino dos diretórios ou arquivos a serem copiados.',
		'3' => 'Um arquivo ou o diretório com o nome dado já existem no destino:',
		'4' => 'O diretório de destino não existe para :',
		'5' => 'O diretório de destino não tem permissões de escrita para :',
		'6' => 'Este diretório/arquivo não pode ser copiado porque ele excede o limite deste raiz:',
		'7' => 'Alguns diretórios escolhidos ou arquivos não existem ou não são legíveis.',
		'8' => 'O resto de diretórios e arquivos foram copiados com sucesso.',
		'9' => 'O diretório não pode ser copiado dentro dele próprio.',
	),
	'estado.multiple_eliminar' => array(
		'0' => 'O arquivo ou o diretório não podem ser retirados, verificar as permissões do destino.',
		'1' => 'Todos os arquivos ou os diretórios foram retirados corretamente.',
		'2' => 'Você está seguro que você quer retirar todos esses arquivos ou diretórios?',
		'3' => 'O resto de arquivos e diretórios foram removidos corretamente.',
		'4' => 'O arquivo que voce está desejando remover não existe.',
	),
	'estado.multiple_mover' => array(
		'0' => 'O arquivo/diretório não podem ser movidos, favor verificar permissões na origem e destino.',
		'1' => 'Todos os diretórios ou arquivos foram movidos com sucesso.',
		'2' => 'Escolha o destino para os arquivos ou diretórios serem movidos.',
		'3' => 'Um arquivo ou diretório com o nome escolhido já existe no destino.',
		'4' => 'O diretório destino não existe para:',
		'5' => 'O diretório de destino não tem permissões de escrita para :',
		'6' => 'Uma cópia do destino foi criada, mas o original não pode ser retirado:',
		'7' => 'O resto dos diretórios e arquivos foi movido corretamente.',
		'8' => 'Um diretório não pode ser movido dentro dele mesmo.',
		'9' => 'Alguns dos diretórios ou arquivos escolhidos não existem ou não podem ser lidos.',
	),
	'estado.multiple_permisos' => array(
		'0' => 'As permissões dos diretórios/arquivos não puderam ser trovados.',
		'1' => 'Permissões trocadas com sucesso.',
		'2' => 'Arquivo não existe ou permissão não disponível.',
		'3' => 'O resto dos diretórios ou arquivos foram trocados com sucesso.',
	),
	'estado.permisos' => array(
		'0' => 'As permissões dos diretórios/arquivos não poderam ser trocados',
		'1' => 'Permissões trocadas com sucesso.',
		'2' => 'O arquivo não existe ou os permissões sobre ele não estão disponíveis.',
	),
	'estado.descargar' => array(
		'0' => 'O arquivo selecionado não existe ou não pode ser lido.',
		'2' => 'Não pode baixar esse raiz porque ele excederia a largura de banda disponível durante esta semana.',
		'3' => 'O arquivo de registro não pode ser aberto para salvar os dados baixados. Por favor verifique o [*$this->paths["info"]*] diretório.',
	),
	'estado.redimensionar' => array(
		'0' => 'O thumbnail foi cancelado.',
		'1' => 'O thumbnail foi criado com sucesso.',
		'2' => 'O thumbnail foi deletado com sucesso.',
	),
	'estado.ver_comprimido' => array(
		'1' => 'O arquivo selecionado não é um arquivo comprimido válido.',
	),
);
?>