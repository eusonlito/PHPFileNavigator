<?php
/****************************************************************************
* data/accions/extraer.inc.php
*
* Descomprime un fichero tar/gzip/bzip2 en el servidor
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

defined('OK') && defined('ACCION') or die();

$erro = 0;

if ($PFN_arquivos->vale_extraer($arquivo)) {
	include_once ($PFN_paths['include'].'class_extraer.php');

	$ext = explode('.', $cal);
	$ext = strtolower(end($ext));

	switch ($ext) {
		case 'tar':
			$PFN_extraer = new PFN_tar_file($arquivo);
			break;
		case 'gz':
		case 'tgz':
		case 'gzip':
			$PFN_extraer = new PFN_gzip_file($arquivo);
			break;
		case 'bzip':
		case 'bzip2':
		case 'bz':
		case 'bz2':
//			$PFN_extraer = new PFN_bzip_file($arquivo);
//			break;
		default:
			$erro = 1;
			break;
	}

	if ($erro) {
		$estado_accion = $PFN_conf->t('estado.extraer', 2);
	} else {
		@set_time_limit($PFN_conf->g('tempo_maximo'));
		@ini_set('memory_limit', $PFN_conf->g('memoria_maxima'));

		$visto = array();
		$estado_accion = '';

		if ($PFN_conf->g('inc','indexar')) {
			include_once ($PFN_paths['include'].'class_indexador.php');

			$PFN_indexador = new PFN_Indexador($PFN_conf);
			$PFN_extraer->indexador($PFN_indexador, "$dir/");
		}

		$PFN_extraer->pon_opcion('overwrite', intval($PFN_vars->get('sobreescribir')));
		$PFN_extraer->niveles($PFN_niveles);
		$PFN_extraer->limite_peso($PFN_conf->g('raiz','peso_actual'), $PFN_conf->g('raiz','peso_maximo'));

		$erro = $PFN_extraer->extract_files();

		$PFN_accions->log_accion('extraer', $arquivo);

		if ($PFN_conf->g('raiz','peso_maximo') > 0) {
			$peso_este = $PFN_extraer->get_actual();

			$PFN_conf->p($peso_este, 'raiz', 'peso_actual');
			$PFN_usuarios->accion('peso', $peso_este, $PFN_conf->g('raiz','id'));
		}

		if (count($erro)) {
			foreach ($erro as $v) {
				if (!in_array($v, $visto)) {
					$visto[] = $v;
					$estado_accion .= '<br />'.$PFN_conf->t('estado.extraer', $v);
				}
			}
		} else {
			$estado_accion = $PFN_conf->t('estado.extraer', 1);
		}
	}
}

$PFN_tempo->rexistra('preplantillas');
	
include ($PFN_paths['plantillas'].'cab.inc.php');
include ($PFN_paths['web'].'opcions.inc.php');
	
$PFN_tempo->rexistra('precodigo');
	
include ($PFN_paths['web'].'navega.inc.php');
	
$PFN_tempo->rexistra('postcodigo');
	
include ($PFN_paths['plantillas'].'pe.inc.php');
?>
