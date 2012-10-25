<?php
/*******************************************************************************
* data/include/class_easyzip.php
*
* Clase que permite la compresión de ficheros y directorios
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

/**
 * EasyZIP class version 1.0 stable 
 * replacement for class.filesplitter.php
 * 14 October 2004
 * zip & split on the fly 
 * Author: huda m elmatsani
 * Email : justhuda ## netscape ## net
 *
 *
 *	example
 *	create zip file
 *	$z = new PFN_EasyZIP;
 *	$z -> addFile("map.bmp");
 *	$z -> addFile("guide.pdf");
 *	$z -> addDir("files/test");
 *	$z -> zipFile("xyz.zip");
 *
 *	created splitted file
 *	$z = new PFN_EasyZIP;
 *	$z -> addFile("guide.pdf");
 *	$z -> splitFile("map.zip",1048576);
 * 
 *	pack and split
 *	$z = new PFN_EasyZIP;
 *	$z -> addFile("map.bmp");
 *	$z -> addFile("guide.pdf");
 *	$z -> splitFile("xyz.zip",1048576);
 *
 *
 */

/**
* Clase mejorada y adaptada para PHPfileNavigator
*
* - Permite compresion recursiva de directorios
* - Permite filtar nombres de ficheros ocultos
* - Permite indicar la raíz desde la que se desempaquetarán los ficheros contenidos
*
*/

class PFN_EasyZIP {
	var $filelist = array();
	var $data_segments = array();
	var $data_block;
	var $file_headers = array();
	var $filename;
	var $filedata;
	var $old_offset = 0;
	var $splitted = 0;
	var $split_signature = '';
	var $split_size = 1;
	var $split_offset = 0;
	var $disk_number = 1;
	var $conf;

	/**
	* function EasyZIP (object &$PFN_conf)
	*
	* Inicializa la clase y carga el objecto $PFN_conf de configuraciónes
	*/
	function PFN_EasyZIP (&$PFN_conf) {
		$this->conf = &$PFN_conf;
	}

	/**
	* function filtrar (string $cal)
	*
	* filtra por el nombre del fichero/directorio comparandolo
	* con las expresiones regulares de $this->conf->g("oculto")
	*
	* return boolean
	*/
	function filtrar ($cal) {
		foreach ($this->conf->g('oculto') as $v) {
			$v = str_replace('/', '\\/', $v);

			if (preg_match('/'.$v.'/i', $cal)) {
				return false;
			}
		}

		return true;
	}

	/**
	* function pon_dirbase (string $base)
	*
	* Sitúa la posicion de salida para el directorio inicial
	*/
	function pon_dirbase ($base) {
		$this->dirbase = strlen(dirname($base).'/');
	}

	/**
	* function comeza (string $base)
	*
	* Inicia la compresión a partir del directorio $base
	*/
	function comeza ($base) {
		$this->pon_dirbase($base);

		if (is_dir($base)) {
			$this->addDir($base);
		} else {
			$this->addFile($base);
		}
	}

	function addFile ($filename) {
		if (!$this->filtrar(basename($filename))) {
			return '';
		}

		$this->filelist[] = $filename;
	}

	function addDir ($dirname) {
		if (!$this->filtrar(basename($dirname))) {
			return '';
		}

		if ($handle = @opendir($dirname)) { 
			while (false !== ($filename = readdir($handle))) { 
				if ($filename != '.' && $filename != '..') {
					if (is_file($dirname.'/'.$filename)) {
						$this->addFile($dirname.'/'.$filename);
					} elseif (is_dir($dirname.'/'.$filename)) {
						$this->addDir($dirname.'/'.$filename);
					}
				} 
			}

			closedir($handle); 
		}
	}

	function zipFile ($zipfilename='') {
		if (empty($zipfilename)) {
			return $this->packFiles();
		} else {
			$zip = $this->packFiles();
			$fp = fopen($zipfilename, 'w');
			fwrite($fp, $zip, strlen($zip));
			fclose($fp);

			unset($zip);
		}
	} 

	function splitFile ($splitfilename, $chunk_size) {
		$this->chunk_size = $chunk_size;
		$this->splitted = 1;
		$this->split_offset = 4;
		$this->old_offset = $this->split_offset;
		$this->split_signature = "\x50\x4b\x07\x08";

		$zip = $this->packFiles();
		$out = $this->str_split($this->split_signature.$zip, $chunk_size);

		for ($i = 0; $i < sizeof($out); $i++) {
			if ($i < sizeof($out)-1) {
				$sfilename = basename ($splitfilename, '.zip'); 
				$sfilename = $sfilename.'.z'.sprintf('%02d',$i+1);
			} else {
				$sfilename = $splitfilename;
			}

			$fp = fopen($sfilename, 'w');
			fwrite($fp, $out[$i], strlen($out[$i]));
			fclose($fp);
		}
	}

	function packFiles () {
		foreach ($this->filelist as $k => $filename) {
			$this->filename = $filename;
			$this->setFileData();
			$this->setLocalFileHeader();
			$this->setDataDescriptor();
			$this->setDataSegment();
			$this->setFileHeader();
		}

		return $this->getDataSegments().$this->getCentralDirectory();
	}

	function setFileData () {
		clearstatcache();

		if ($size = @filesize($this->filename)) {
			$fd = fopen ($this->filename, 'rb');
			$this->filedata = fread ($fd, $size);
			fclose ($fd);
		} else {
			$this->filedata = '';
		}

		$filetime = @filectime($this->filename);
		$this->DOSFileTime($filetime);
	}

	function setLocalFileHeader () {
		$local_file_header_signature = "\x50\x4b\x03\x04"; // 4 bytes (0x04034b50)
		$this->version_needed_to_extract = "\x14\x00"; // 2 bytes
		$this->general_purpose_bit_flag = "\x00\x00"; // 2 bytes
		$this->compression_method = "\x08\x00"; // 2 bytes
		$this->crc_32 = pack('V', crc32($this->filedata)); // 4 bytes
		//compressing data
		$c_data = gzcompress($this->filedata);
		$this->compressed_filedata = substr(substr($c_data, 0, strlen($c_data) - 4), 2); // fix crc bug
		$this->compressed_size = pack('V', strlen($this->compressed_filedata)); // 4 bytes
		$this->uncompressed_size = pack('V', strlen($this->filedata)); // 4 bytes
		$this->filename_length = pack('v', strlen(substr($this->filename, $this->dirbase))); // 2 bytes
		$this->extra_field_length = pack('v', 0); //2 bytes

		$this->local_file_header = $local_file_header_signature
			.$this->version_needed_to_extract
			.$this->general_purpose_bit_flag
			.$this->compression_method
			.$this->last_mod_file_time
			.$this->last_mod_file_date
			.$this->crc_32
			.$this->compressed_size
			.$this->uncompressed_size
			.$this->filename_length
			.$this->extra_field_length
			.substr($this->filename, $this->dirbase);
	}

	function setDataDescriptor () {
		$this->data_descriptor = $this->crc_32 // 4 bytes
			.$this->compressed_size // 4 bytes
			.$this->uncompressed_size; // 4 bytes
	}

	function setDataSegment () {
		$this->data_segments[] = $this->local_file_header.$this->compressed_filedata.$this->data_descriptor;
		$this->data_block = implode('', $this->data_segments);
	}

	function getDataSegments () {
		return $this->data_block;
	}

	function setFileHeader () {
		$new_offset = strlen($this->split_signature.$this->data_block);
		$central_file_header_signature = "\x50\x4b\x01\x02"; // 4 bytes (0x02014b50)
		$version_made_by = pack('v', 0); // 2 bytes
		$file_comment_length = pack('v', 0); // 2 bytes
		$disk_number_start = pack('v', $this->disk_number - 1); // 2 bytes
		$internal_file_attributes = pack('v', 0); // 2 bytes
		$external_file_attributes = pack('V', 32); // 4 bytes
		$relative_offset_local_header = pack('V', $this->old_offset); // 4 bytes

		if ($this->splitted) {
			$this->disk_number = ceil($new_offset/$this->chunk_size);
			$this->old_offset = $new_offset - ($this->chunk_size * ($this->disk_number-1));
		} else {
			$this->old_offset = $new_offset;
		}

		$this->file_headers[] = $central_file_header_signature
			.$version_made_by
			.$this->version_needed_to_extract
			.$this->general_purpose_bit_flag
			.$this->compression_method
			.$this->last_mod_file_time
			.$this->last_mod_file_date
			.$this->crc_32
			.$this->compressed_size
			.$this->uncompressed_size
			.$this->filename_length
			.$this->extra_field_length
			.$file_comment_length
			.$disk_number_start
			.$internal_file_attributes
			.$external_file_attributes
			.$relative_offset_local_header
			.substr($this->filename, $this->dirbase);
	}

	function getCentralDirectory () {
		$this->central_directory = implode('', $this->file_headers);		
		return $this->central_directory.$this->getEndCentralDirectory();
	}

	function getEndCentralDirectory () {
		$zipfile_comment = '';

		if ($this->splitted) {
			$data_len = strlen($this->split_signature.$this->data_block.$this->central_directory);
			$last_chunk_len = $data_len - floor($data_len / $this->chunk_size) * $this->chunk_size;
			$this->old_offset = $last_chunk_len - strlen($this->central_directory);
		}

		$end_central_dir_signature = "\x50\x4b\x05\x06"; // 4 bytes (0x06054b50)
		$number_this_disk = pack('v', $this->disk_number - 1); // 2 bytes
		$number_disk_start = pack('v', $this->disk_number - 1); // 2 bytes
		$total_number_entries = pack('v', sizeof($this->file_headers)); // 2 bytes
		$total_number_entries_central = pack('v', sizeof($this->file_headers)); // 2 bytes
		$size_central_directory = pack('V', strlen($this->central_directory)); // 4 bytes
		$offset_start_central = pack('V', $this->old_offset); // 4 bytes
		$zipfile_comment_length = pack('v', strlen($zipfile_comment)); // 2 bytes

		return $end_central_dir_signature
			.$number_this_disk
			.$number_disk_start
			.$total_number_entries
			.$total_number_entries_central
			.$size_central_directory
			.$offset_start_central
			.$zipfile_comment_length
			.$zipfile_comment;
	}

	function DOSFileTime ($unixtime = 0) {
		$timearray = ($unixtime == 0) ? getdate() : getdate($unixtime);

		if ($timearray['year'] < 1980) {
			$timearray['year'] = 1980;
			$timearray['mon'] = 1;
			$timearray['mday'] = 1;
			$timearray['hours'] = 0;
			$timearray['minutes'] = 0;
			$timearray['seconds'] = 0;
		} 

		$dostime = (($timearray['year'] - 1980) << 25) | 
			($timearray['mon'] << 21) | ($timearray['mday'] << 16) |
			($timearray['hours'] << 11) | ($timearray['minutes'] << 5) | 
			($timearray['seconds'] >> 1);

		$dtime = dechex($dostime);
		$hexdtime = '\x'.$dtime[6].$dtime[7].'\x'.$dtime[4].$dtime[5];
		$hexddate = '\x'.$dtime[2].$dtime[3].'\x'.$dtime[0].$dtime[1];

		eval('$hexdtime = "'.$hexdtime.'";');
		eval('$hexddate = "'.$hexddate.'";');

		$this->last_mod_file_time = $hexdtime;
		$this->last_mod_file_date = $hexddate;
	} 	

	function str_split($string, $length) {
		for ($i = 0; $i < strlen($string); $i += $length) {
			$array[] = substr($string, $i, $length);
		}

		return $array;
	}
}

$EasyZIP = new PFN_EasyZIP($PFN_conf);

##############################################################
# Class dUnzip2 v2.2
#
#  Author: Alexandre Tedeschi (d)
#  E-Mail: alexandrebr at gmail dot com
#  Londrina - PR / Brazil
#
#  Objective:
#    This class allows programmer to easily unzip files on the fly.
#
#  Requirements:
#    This class requires extension ZLibEnabled. These are default
#    for most site hosts around the world, and for the PHP Win32 dist.
#
#  To do:
#   * Error handling
#   * Write a PHP-Side gzinflate, to completely avoid any external extensions
#   * Write other decompress algorithms
#
#  If you modify this class, or have any ideas to improve it, please contact me!
#  You are allowed to redistribute this class, if you keep my name and contact e-mail on it.
##############################################################

class dUnzip2 {
	// Public
	var $fileName;
	var $compressedList; // You will problably use only this one!

	// Private
	var $zipSignature = "\x50\x4b\x03\x04"; // local file header signature
	var $dirSignature = "\x50\x4b\x01\x02"; // central dir header signature
	var $dirSignatureE = "\x50\x4b\x05\x06"; // end of central dir signature

	// Public
	Function dUnzip2 ($fileName) {
		$this->fileName = $fileName;
		$this->compressedList = array();
		$this->compressedList['nome'] = $this->compressedList['permisos'] = $this->compressedList['propietario'] =
		$this->compressedList['grupo'] = $this->compressedList['tamano'] = $this->compressedList['data'] = array();
	}

	Function listar_contido () {
		if (count($this->compressedList['nome']) > 0) {
			return $this->compressedList;
		}

		// Open file, and set file handler
		$fh = fopen($this->fileName, 'r');
		$i = 0;

		if (!$fh) {
			return array();
		}

		// Loop the file, looking for files and folders
		fseek($fh, 0);

		while (true) {
			// Check if the signature is valid...
			$signature = fread($fh, 4);

			if ($signature == 'PK00') {
				$signature = fread($fh, 4);
			}

			if (feof($fh)) {
				break;
			}

			if ($signature == $this->zipSignature) {
				// If signature of a 'Local File Header'
				// Get information about the zipped file
				$file['version_needed'] = unpack('v', fread($fh, 2)); // version needed to extract
				$file['general_bit_flag'] = unpack('v', fread($fh, 2)); // general purpose bit flag
				$file['compression_method'] = unpack('v', fread($fh, 2)); // compression method
				$file['lastmod_time'] = unpack('v', fread($fh, 2)); // last mod file time
				$file['lastmod_date'] = unpack('v', fread($fh, 2)); // last mod file date
				$file['crc-32'] = fread($fh, 4); // crc-32
				$file['compressed_size'] = unpack('V', fread($fh, 4)); // compressed size
				$file['uncompressed_size'] = unpack('V', fread($fh, 4)); // uncompressed size
				$fileNameLength = unpack('v', fread($fh, 2)); // filename length
				$PFN_extraFieldLength = unpack('v', fread($fh, 2)); // extra field length
				$file['file_name'] = fread($fh, $fileNameLength[1]); // filename
				$file['extra_field'] = $PFN_extraFieldLength[1]?fread($fh, $PFN_extraFieldLength[1]):''; // extra field
				$file['contents-startOffset'] = ftell($fh);

				// Bypass the whole compressed contents, and look for the next file
				fseek($fh, $file['compressed_size'][1], SEEK_CUR);

				// Convert the date and time, from MS-DOS format to UNIX Timestamp
				$BINlastmod_date = str_pad(decbin($file['lastmod_date'][1]), 16, '0', STR_PAD_LEFT);
				$BINlastmod_time = str_pad(decbin($file['lastmod_time'][1]), 16, '0', STR_PAD_LEFT);
				$lastmod_dateY = bindec(substr($BINlastmod_date, 0, 7))+1980;
				$lastmod_dateM = bindec(substr($BINlastmod_date, 7, 4));
				$lastmod_dateD = bindec(substr($BINlastmod_date, 11, 5));
				$lastmod_timeH = bindec(substr($BINlastmod_time, 0, 5));
				$lastmod_timeM = bindec(substr($BINlastmod_time, 5, 6));
				$lastmod_timeS = bindec(substr($BINlastmod_time, 11, 5));

				// Mount file table
				$this->compressedList['nome'][$i] = $file['file_name'];
				$this->compressedList['permisos'][$i] = '-';
				$this->compressedList['propietario'][$i] = '-';
				$this->compressedList['grupo'][$i] = '-';
				$this->compressedList['tamano'][$i] = $file['uncompressed_size'][1];
				$this->compressedList['data'][$i] = mktime($lastmod_timeH, $lastmod_timeM, $lastmod_timeS, $lastmod_dateM, $lastmod_dateD, $lastmod_dateY);
			} elseif ($signature == $this->dirSignature) {
				// If signature of a 'Central Directory Structure'
				fread($fh, 24);
				$fileNameLength = unpack('v', fread($fh, 2));
				$PFN_extraFieldLength = unpack('v', fread($fh, 2));
				$fileCommentLength = unpack('v', fread($fh, 2));
				fread($fh, 12);
				fread($fh, $fileNameLength[1]);
				$PFN_extraFieldLength[1]?fread($fh, $PFN_extraFieldLength[1]):'';
				$fileCommentLength[1]?fread($fh, $fileCommentLength[1]):'';
			} elseif ($signature == $this->dirSignatureE) {
				fread($fh, 16);
				$zipFileCommentLenght = unpack('v', fread($fh, 2));
				$zipFileCommentLenght[1]?fread($fh, $zipFileCommentLenght[1]):'';
			} else {
				break;
			}

			if (empty($this->compressedList['nome'][$i])) {
				unset($this->compressedList['nome'][$i]);
				unset($this->compressedList['permisos'][$i]);
				unset($this->compressedList['propietario'][$i]);
				unset($this->compressedList['grupo'][$i]);
				unset($this->compressedList['tamano'][$i]);
				unset($this->compressedList['data'][$i]);
			} else {
				$i++;
			}
		}

		if ($fh) {
			fclose($fh);
		}

		return $this->compressedList;
	}
}
