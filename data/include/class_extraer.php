<?php
/****************************************************************************
* data/include/class_extraer.php
*
* Extrae el contenido de los ficheros TAR, GZIP y BZIP
*

PHPfileNavigator versión 2.0.0

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

/*--------------------------------------------------
 | TAR/GZIP/BZIP2/ZIP ARCHIVE CLASSES 2.0
 | By Devin Doucette
 | Copyright (c) 2004 Devin Doucette
 | Email: darksnoopy@shaw.ca
 +--------------------------------------------------
 | Email bugs/suggestions to darksnoopy@shaw.ca
 +--------------------------------------------------
 | This script has been created and released under
 | the GNU GPL and is free to use and redistribute
 | only if this copyright statement is not removed
 +--------------------------------------------------*/

class PFN_tar_file {
	var $options = array();
	var $error = array();
	var $peso_actual = 0;
	var $peso_maximo = 0;
	var $niveles;
	var $filtrado = array();
	var $PFN_inc;
	var $indexar = false;
	var $dir;

	function PFN_tar_file ($name) {
		$this->error = array();
		$this->options = array(
			'route' => dirname($name).'/'.basename($name),
			'basedir' => dirname($name),
			'name' => basename($name),
			'overwrite' => 0,
			'type' => 'tar',
		);
	}

	function pon_opcion ($opcion,$valor) {
		$this->options[$opcion] = $valor;
	}

	function niveles (&$PFN_niveles) {
		$this->niveles = &$PFN_niveles;
	}

	function indexador (&$PFN_indexador, $dir) {
		$this->indexar = true;
		$this->indexador = &$PFN_indexador;
		$this->dir = $dir;
	}

	function limite_peso ($actual, $maximo) {
		$this->peso_actual = $actual;
		$this->peso_maximo = $maximo;
	}

	function get_actual () {
		return $this->peso_actual;
	}

	/**
	* function listar_contido (void)
	*
	* Lee un fichero comprimido y obtiene los nombres de los
	* ficheros y directorios incluidos, devolviendolos en
	* un array
	*
	* return array
	*/
	function listar_contido () {
		$i = 0;
		$lista = array();
		$lista['nome'] = $lista['permisos'] = $lista['propietario'] =
		$lista['grupo'] = $lista['tamano'] = $lista['data'] = array();

		if ($fp = $this->open_archive()) {
			while ($block = fread($fp,512)) {
				$temp = unpack("a100name/a8mode/a8uid/a8gid/a12size/a12mtime"
					."/a8checksum/a1type/a100temp/a6magic/a2temp/a32temp"
					."/a32temp/a8temp/a8temp/a155prefix/a12temp",$block);
				$lista['nome'][$i] = $temp['prefix'].$temp['name'];
				$lista['permisos'][$i] = octdec($temp['mode']);
				$lista['propietario'][$i] = octdec($temp['uid']);
				$lista['grupo'][$i] = octdec($temp['gid']);
				$lista['tamano'][$i] = octdec($temp['size']);
				$lista['data'][$i] = octdec($temp['mtime']);

				if ($lista['tamano'][$i] > 0) {
					fread($fp,$lista['tamano'][$i]);
				}

				if ((512 - $lista['tamano'][$i] % 512) != 512) {
					fread($fp,(512 - $lista['tamano'][$i] % 512));
				}

				if (empty($lista['nome'][$i])) {
					unset($lista['nome'][$i]);
					unset($lista['permisos'][$i]);
					unset($lista['propietario'][$i]);
					unset($lista['grupo'][$i]);
					unset($lista['tamano'][$i]);
					unset($lista['data'][$i]);
				} else {
					$i++;
				}
			}

			fclose($fp);

			return $lista;
		}
	}

	function extract_files () {
		if ($fp = $this->open_archive()) {
			while ($block = fread($fp,512)) {
				$temp = unpack("a100name/a8mode/a8uid/a8gid/a12size/a12mtime"
					."/a8checksum/a1type/a100temp/a6magic/a2temp/a32temp"
					."/a32temp/a8temp/a8temp/a155prefix/a12temp",$block);
				$dir = $this->niveles->path_correcto($temp['prefix'].dirname($temp['name']));
				$arq = $this->niveles->nome_correcto(basename($temp['name']));
				$file = array(
					'name' => substr($this->niveles->path_correcto('/'.$dir.'/'.$arq), 1),
					'stat' => array(
						2 => $temp['mode'],
						4 => octdec($temp['uid']),
						5 => octdec($temp['gid']),
						7 => octdec($temp['size']),
						9 => octdec($temp['mtime']),
					),
					'checksum' => octdec($temp['checksum']),
					'type' => $temp['type'],
					'magic' => $temp['magic'],
				);

				$arquivo = $this->options['basedir'].'/'.$file['name'];

				if ($file['checksum'] == 0x00000000) {
					break;
				} else if (substr($file['magic'], 0, 5) != 'ustar') {
					$this->error[] = 3; // This script does not support extracting this type of tar file.
					break;
				}

				$block = substr_replace($block,'        ',148,8);
				$checksum = 0;

				for ($i = 0; $i < 512; $i++) {
					$checksum += ord(substr($block,$i,1));
				}

				if ($file['checksum'] != $checksum) {
					$this->error[] = 4; // Could not extract, it is corrupt.
					break;
				}

				if ($file['type'] == 5) {
					if ($this->niveles->filtrar(basename($file['name']))
					&& !in_array(dirname($file['name']), $this->filtrado)) {
						if (!is_dir($arquivo)) {
							if (@mkdir($arquivo,0755)) {
								if ($this->indexar) {
									$dir = dirname($this->dir.'/'.$file['name'].'/');
									$this->indexador->alta_modificacion("$dir/", basename($file['name']).'/', '');
								}
							} else {
								$this->filtrado[] = $file['name'];
								$this->error[] = 9; // Algúns arquivos contiñan nomes non permitidos ou estaban baleiros e non foron extraidos.
							}
						}
					} else {
						$this->filtrado[] = $file['name'];
						$this->error[] = 8; // Non se puido crear algúns dos directorios necesarios para a extracción do contido.
					}
				} else if ($this->options['overwrite'] == 0 && is_file($arquivo)) {
					$this->error[] = 5; // Some files hadn't be extracted, allready exists.
				} else if ($this->niveles->filtrar(basename($file['name']))
				&& !in_array(dirname($file['name']), $this->filtrado)) {
					if ($this->peso_maximo > 0) {
						$this->peso_actual += $file['stat'][7];

						if ($this->peso_actual > $this->peso_maximo) {
							$this->peso_actual -= $file['stat'][7];
							$this->error[] = 7; // Non se puido rematar coa extracción por que o contido supera o peso máximo permitido para esta raíz.

							break;
						}
					}

					$ok = true;

					if (!is_dir(dirname($arquivo))) {
						if (!@mkdir(dirname($arquivo))) {
							$ok = false;
							$this->filtrado[] = $file['name'];
							$this->error[] = 9; // Non se puido crear algúns dos directorios necesarios para a extracción do contido.
						} elseif ($this->indexar) {
							$dir = dirname($this->dir.'/'.dirname($file['name']).'/');
							$this->indexador->alta_modificacion("$dir/", basename(dirname($file['name'])).'/', '');
						}
					}

					if ($file['stat'][7] > 0) {
						$contido = @fread($fp, $file['stat'][7]);
					} else {
						$contido = '';
					}

					if ($ok && $new = @fopen($arquivo, 'wb')) {
						if ($file['stat'][7] > 0) {
							@fwrite($new, $contido);
						} else {
							@fwrite($new, 0);
						}

						fclose($new);
						@chmod($arquivo, 0644);

						if ($this->indexar) {
							$dir = dirname($this->dir.$file['name']);
							$this->indexador->alta_modificacion("$dir/", basename($file['name']), '');
						}
					} else {
						$this->error[] = 6; // Some files could not opened for writing.
					}

					if ((512 - $file['stat'][7] % 512) != 512) {
						@fread($fp,(512 - $file['stat'][7] % 512) == 512? 0 : (512 - $file['stat'][7] % 512));
					}
				} else {
					if ($file['stat'][7] > 0) {
						@fread($fp,$file['stat'][7]);
					}

					if ((512 - $file['stat'][7] % 512) != 512) {
						@fread($fp,(512 - $file['stat'][7] % 512));
					}

					$this->error[] = 8; // Algúns arquivos contiñan nomes non permitidos ou estaban baleiros e non foron extraidos.
				}
			}

			unset($contido);
			unset($file);
			@fclose($fp);
		} else {
			$this->error[] = 0; // I can't extract any file, the file can be damaged, have an invalid format or haven't read permissions.
		}

		return $this->error;
	}

	function open_archive () {
		return fopen($this->options['route'], 'rb');
	}
}

class PFN_gzip_file extends PFN_tar_file {
	function PFN_gzip_file ($name) {
		$this->PFN_tar_file($name);
		$this->options['type'] = 'gzip';
	}

	function open_archive () {
		return gzopen($this->options['route'], 'rb');
	}
}

class PFN_bzip_file extends PFN_tar_file {
	function PFN_bzip_file ($name) {
		$this->PFN_tar_file($name);
		$this->options['type'] = 'bzip';
	}

	function open_archive () {
		return bzopen($this->options['route'], 'rb');
	}
}
?>
