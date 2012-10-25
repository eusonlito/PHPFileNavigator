<?php
/****************************************************************************
* data/accions/novo_arq.inc.php
*
* Carga lo necesario para la visualización de la pantalla de creación de
* un fichero fichero nuevo
*

PHPfileNavigator versión 2.3.0

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

defined('OK') && defined('ACCION') or die();

$PFN_tempo->rexistra('preplantillas');

include ($PFN_paths['plantillas'].'cab.inc.php');
include ($PFN_paths['web'].'opcions.inc.php');

$PFN_tempo->rexistra('precodigo');

include_once ($PFN_paths['include'].'class_inc.php');
$PFN_inc = new PFN_INC($PFN_conf);

$erro = true;

if ($PFN_vars->post('executa')) {
	$PFN_accions->arquivos($PFN_arquivos);

	$cal = $PFN_accions->nome_correcto($PFN_vars->post('cal'));
	$destino = $PFN_conf->g('raiz','path').$PFN_accions->path_correcto($dir.'/');

	$PFN_accions->novo_arq($cal, $destino, $PFN_vars->post('texto'), $PFN_vars->post('sobreescribir'));
	$estado = $PFN_accions->estado_num('novo_arq');
	$estado_accion = $PFN_conf->t('estado.novo_arq',intval($estado));

	if ($PFN_accions->estado('novo_arq')) {
		$erro = false;

		if ($PFN_conf->g('raiz','peso_maximo') > 0) {
			$peso_este = PFN_espacio_disco($destino.'/'.$cal, true);

			if (($peso_este + $PFN_conf->g('raiz', 'peso_actual')) > $PFN_conf->g('raiz','peso_maximo')) {
				@unlink($destino.'/'.$cal);
				$estado_accion = $PFN_conf->t('estado.novo_arq', 6);
				$erro = true;
			}
		}

		$ancho_banda = $PFN_accions->log_ancho_banda($peso_este);

		if (!$ancho_banda) {
			@unlink($destino.'/'.$cal);
			$estado_accion = $PFN_conf->t('estado.novo_arq', 7);
			$erro = true;
		}

		if (!$erro && $PFN_conf->g('inc','estado')) {
			include_once ($PFN_paths['include'].'class_arquivos.php');

			$PFN_arquivos = new PFN_Arquivos($PFN_conf);
			$PFN_inc->arquivos($PFN_arquivos);
			$arq_inc = $PFN_inc->crea_inc($destino.'/'.$cal,'arq');
		}

		if (!$erro && $PFN_conf->g('inc','indexar')) {
			include_once ($PFN_paths['include'].'class_indexador.php');

			$PFN_indexador = new PFN_Indexador($PFN_conf);
			$PFN_indexador->alta_modificacion("$dir/", $cal, $arq_inc);
		}

		if (!$erro && ($PFN_conf->g('raiz','peso_maximo') > 0)) {
			$peso_este += $PFN_conf->g('raiz', 'peso_actual');

			if ($PFN_conf->g('inc','estado')) {
				$peso_este += PFN_espacio_disco($arq_inc, true);
			}

			$PFN_conf->p($peso_este, 'raiz', 'peso_actual');
			$PFN_usuarios->init('peso', $peso_este, $PFN_conf->g('raiz','id'));
		}
	}
}

if ($erro) {
	$PFN_accions->arquivos($PFN_arquivos);

	$editar_ancho = intval($PFN_vars->post('ancho'));
	$editar_alto = intval($PFN_vars->post('alto'));

	$editar_ancho = ($editar_ancho == 0)?650:$editar_ancho;
	$editar_alto = ($editar_alto == 0)?400:$editar_alto;

	$PFN_vars->post('texto2',$PFN_vars->post('texto'));

	include ($PFN_paths['plantillas'].'posicion.inc.php');
	include ($PFN_paths['plantillas'].'novo_arq.inc.php');
} else {
	include ($PFN_paths['web'].'navega.inc.php');
}

$PFN_tempo->rexistra('postcodigo');

include ($PFN_paths['plantillas'].'pe.inc.php');
?>
