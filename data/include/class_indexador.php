<?php
/*******************************************************************************
* data/include/class_indexador.inc.php
*
* Indexa y busca según datos recibidos de los nombres de fichero o de los
* ficheros de información adicional
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
* class PFN_Indexador
*
* clase que indexa y realiza búsquedas en ficheros y directorios o en los
* ficheros de información adicional
*/
class PFN_Indexador extends PFN_Clases {
	var $conf;
	var $tablas;
	var $id_raiz;
	var $path_raiz;
	var $cnt_index = array('dir','arq');
	var $niveles;
	var $PFN_inc;
	var $FILE = __FILE__;
	var $LINE;
	var $slock = false;
	var $txt;

	/**
	* function PFN_Indexador (object $PFN_conf)
	*
	* recibe el objecto $PFN_conf con los parametros de configuración
	* y carga el nombre para las tablas
	*/
	function PFN_Indexador (&$PFN_conf) {
		$this->conf = &$PFN_conf;
		$this->id_raiz = intval($this->conf->g('raiz','id'));

		$this->pon_correxir(array(0 => true));

		$pre = $this->conf->g('db','prefixo');
		$this->tablas['directorios'] = $pre.'directorios';
		$this->tablas['arquivos'] = $pre.'arquivos';
		$this->tablas['campos'] = $pre.'campos';
		$this->tablas['palabras'] = $pre.'palabras';
		$this->tablas['arquivos_campos_palabras'] = $pre.'arquivos_campos_palabras';
	}

	/**
	* function niveles (object &$PFN_niveles)
	*
	* recibe el objecto con las acciones concretas para niveles
	*/
	function niveles (&$PFN_niveles) {
		$this->niveles = &$PFN_niveles;
	}

	/**
	* function inc (object &$PFN_inc)
	*
	* recibe el objecto con las acciones concretas para los ficheros de
	* información adicional
	*/
	function inc (&$PFN_inc) {
		$this->inc = &$PFN_inc;
	}

	/**
	* function id_raiz (integer $id)
	*
	* Asigna un identificador de raíz
	*/
	function id_raiz ($id) {
		$this->id_raiz = intval($id);
	}

	/**
	* function parte_palabras (string $txt)
	*
	* divide una frase en un array de palabras
	*
	* return string
	*/
	function parte_palabras ($txt) {
		$riguroso = $this->conf->g('nome_riguroso');
		$this->conf->p('true','nome_riguroso');

		preg_match_all('/[a-z0-9]{3,}/i',PFN_check_nome($txt), $palabras);

		$this->conf->p($riguroso,'nome_riguroso');
		
		return $palabras[0];
	}

	/**
	* function alta_modificacion (string $dir, string $arquivo, string $arq_inc)
	*
	* da de alta o modifica las palabras indexadas relacionadas con
	* un fichero. Recibe el nombre del fichero de información adicional
	* ($arq_inc) y lo carga, obteniendo un array con los campos guardados
	* despues indexa estos campos con relación al fichero ($arquivo) del
	* directorio $dir
	*/
	function alta_modificacion ($dir, $arquivo, $arq_inc) {
		if (!empty($arq_inc) && @is_file($arq_inc)) {
			$datos = @include ($arq_inc);
		}

		$this->slock?'':$this->lock($this->tablas);

		$this->LINE = __LINE__+1;
		$query = 'SELECT id FROM '.$this->tablas['directorios']
			.' WHERE directorio = BINARY("'.$this->corrixe($dir,0).'")'
			.' AND id_raiz = "'.$this->id_raiz.'"'
			.' LIMIT 1;';

		if ($this->put_query($query) > 0) {
			$id_directorio = $this->get('id');
		} else {
			$this->LINE = __LINE__+1;
			$query = 'INSERT INTO '.$this->tablas['directorios']
				.' SET directorio = "'.$this->corrixe($dir,0).'"'
				.', id_raiz = "'.$this->id_raiz.'";';

			$this->actualizar($query);
			$id_directorio = $this->id_ultimo();
		}

		$this->LINE = __LINE__+1;
		$query = 'SELECT id FROM '.$this->tablas['arquivos']
			.' WHERE arquivo = BINARY("'.$this->corrixe($arquivo,0).'")'
			.' AND id_directorio = "'.$id_directorio.'"'
			.' LIMIT 1;';

		if ($this->put_query($query) > 0) {
			$id_arquivo = $this->get('id');

			$sep = '';
			$this->LINE = __LINE__+1;
			$query = 'SELECT '.$this->tablas['arquivos_campos_palabras'].'.*'
				.' FROM '.$this->tablas['arquivos_campos_palabras'].', '.$this->tablas['campos']
				.' WHERE (';

			foreach ((array)$this->conf->g('inc','campos_indexar') as $v) {
					$query .= $sep.' '.$this->tablas['campos'].'.campo = "'.$v.'"';
					$sep = ' OR';
			}

			$query .= ') AND '.$this->tablas['arquivos_campos_palabras'].'.id_campo='.$this->tablas['campos'].'.id'
				.' AND '.$this->tablas['arquivos_campos_palabras'].'.id_arquivo = "'.$id_arquivo.'";';

			for ($this->put_query($query); $this->mais(); $this->seguinte()) {
				$this->LINE = __LINE__+1;
				$query = 'DELETE FROM '.$this->tablas['arquivos_campos_palabras']
					.' WHERE id_arquivo = "'.$this->get('id_arquivo').'"'
					.' AND id_campo = "'.$this->get('id_campo').'"'
					.' AND id_palabra = "'.$this->get('id_palabra').'";';
				$this->actualizar($query);
			}
		} else {
			$this->LINE = __LINE__+1;
			$query = 'INSERT IGNORE INTO '.$this->tablas['arquivos']
				.' SET arquivo = "'.$this->corrixe($arquivo,0).'"'
				.', id_directorio = "'.$id_directorio.'";';
			$this->actualizar($query);
			$id_arquivo = $this->id_ultimo();

			if (preg_match('/\/$/', $arquivo)) {
				$this->LINE = __LINE__+1;
				$query = 'INSERT IGNORE INTO '.$this->tablas['directorios']
					.' SET directorio = "'.$this->corrixe("$dir$arquivo",0).'"'
					.', id_raiz = "'.$this->id_raiz.'";';
				$this->actualizar($query);
			}
		}

		if (empty($id_arquivo)) {
			$this->slock?'':$this->unlock();
			return;
		}

		foreach ((array)$this->conf->g('inc','campos_indexar') as $v) {
			$this->LINE = __LINE__+1;
			$query = 'SELECT id FROM '.$this->tablas['campos']
				.' WHERE campo = "'.$v.'";';

			if ($this->put_query($query) > 0) {
				$id_campo = $this->get('id');
			} else {
				$this->LINE = __LINE__+1;
				$query = 'INSERT IGNORE INTO '.$this->tablas['campos']
					.' SET campo = "'.$v.'";';
				$this->actualizar($query);
				$id_campo = $this->id_ultimo();
			}

			$palabras = $this->parte_palabras($datos[$v]);

			foreach ((array)$palabras as $p) {
				$this->LINE = __LINE__+1;
				$query = 'SELECT id FROM '.$this->tablas['palabras']
					.' WHERE palabra = "'.$this->corrixe($p,0).'"'
					.' LIMIT 1;';

				if ($this->put_query($query) > 0) {
					$id_palabra = $this->get('id');
				} else {
					$this->LINE = __LINE__+1;
					$query = 'INSERT IGNORE INTO '.$this->tablas['palabras']
						.' SET palabra = "'.$this->corrixe($p,0).'";';
					$this->actualizar($query);
					$id_palabra = $this->id_ultimo();
				}

				$this->LINE = __LINE__+1;
				$query = 'REPLACE INTO '.$this->tablas['arquivos_campos_palabras']
					.' SET id_arquivo = "'.$id_arquivo.'"'
					.', id_campo = "'.$id_campo.'"'
					.', id_palabra = "'.$id_palabra.'";';
				$this->actualizar($query);
			}
		}

		$this->slock?'':$this->unlock();
	}

	/**
	* function eliminar (string $dir, string $nome)
	*
	* elimina un fichero o directorio de la tabla de indexados
	* si es un directorio, elimina recursivamente el contenido
	*/
	function eliminar ($dir, $nome) {
		$this->lock($this->tablas);

		$this->LINE = __LINE__+1;
		$query = 'SELECT id FROM '.$this->tablas['directorios']
			.' WHERE directorio = BINARY("'.$this->corrixe($dir,0).'")'
			.' AND id_raiz = "'.$this->id_raiz.'"'
			.' LIMIT 1;';

		if ($this->put_query($query) < 1) {
			$this->unlock();
			return;
		} else {
			$id_directorio = $this->get('id');
		}

		$this->LINE = __LINE__+1;
		$query = 'SELECT id FROM '.$this->tablas['arquivos']
			.' WHERE arquivo = BINARY("'.$this->corrixe($nome,0).'")'
			.' AND id_directorio = "'.$id_directorio.'"'
			.' LIMIT 1;';

		if ($this->put_query($query) < 1) {
			$this->unlock();
			return;
		} else {
			$id_arquivo = $this->get('id');
		}

		$this->LINE = __LINE__+1;
		$query = 'DELETE FROM '.$this->tablas['arquivos']
			.' WHERE id = "'.$id_arquivo.'";';
		$this->actualizar($query);

		$this->LINE = __LINE__+1;
		$query = 'DELETE FROM '.$this->tablas['arquivos_campos_palabras']
			.' WHERE id_arquivo = "'.$id_arquivo.'";';
		$this->actualizar($query);

		if (preg_match('/\/$/', $nome)) {
			$this->LINE = __LINE__+1;
			$query = 'DELETE '.$this->tablas['directorios']
				.', '.$this->tablas['arquivos']
				.' FROM '.$this->tablas['directorios']
				.' LEFT JOIN '.$this->tablas['arquivos']
					.' ON '.$this->tablas['arquivos'].'.id_directorio = '.$this->tablas['directorios'].'.id'
				.' WHERE directorio LIKE BINARY("'.$this->corrixe("$dir$nome",0).'%");';
			$this->actualizar($query);
		}

		$this->unlock();
	}

	/**
	* function renomear (string $dir , string $n_antes, string $n_agora)
	*
	* renombra el fichero indexado $n_antes con el nuevo nombre $n_agora,
	* en caso de ser un directorio renombra tambien el nombre en la tabla
	* de directorios, para acciones como mover o renombrar
	*/
	function renomear ($dir, $n_antes, $n_agora) {
		$this->lock($this->tablas);

		$this->LINE = __LINE__+1;
		$query = 'SELECT id FROM '.$this->tablas['directorios']
			.' WHERE directorio = BINARY("'.$this->corrixe($dir,0).'")'
			.' AND id_raiz = "'.$this->id_raiz.'"'
			.' LIMIT 1;';

		if ($this->put_query($query) > 0) {
			$id_directorio = $this->get('id');
		} else {
			$this->unlock();
			return;
		}

		$this->LINE = __LINE__+1;
		$query = 'UPDATE IGNORE '.$this->tablas['arquivos']
			.' SET arquivo = "'.$this->corrixe($n_agora,0).'"'
			.' WHERE arquivo = BINARY("'.$this->corrixe($n_antes,0).'")'
			.' AND id_directorio = "'.$this->get('id').'";';
		$this->actualizar($query);

		if (preg_match('/\/$/', $n_agora)) {
			$this->LINE = __LINE__+1;
			$query = 'UPDATE '.$this->tablas['directorios']
				.' SET directorio=REPLACE(directorio'
					.', "'.$this->corrixe("$dir$n_antes",0).'"'
					.', "'.$this->corrixe("$dir$n_agora",0).'")'
				.' WHERE directorio LIKE BINARY("'.$this->corrixe("$dir$n_antes",0).'%");';
			$this->actualizar($query);
		}

		$this->unlock();
	}

	/**
	* function mover (string $d_antes, string $d_agora, $nome)
	*
	* mueve el fichero o directorio indexado $nome desde el destino $d_antes
	* para el destino $d_agora
	*/
	function mover ($d_antes, $d_agora, $nome) {
		$this->lock($this->tablas);

		$this->LINE = __LINE__+1;
		$query = 'SELECT id FROM '.$this->tablas['directorios']
			.' WHERE directorio = BINARY("'.$this->corrixe($d_antes,0).'")'
			.' AND id_raiz = "'.$this->id_raiz.'"'
			.' LIMIT 1;';

		if ($this->put_query($query) < 1) {
			$this->unlock();
			return;
		} else {
			$dir_antes = $this->get('id');
		}

		$this->LINE = __LINE__+1;
		$query = 'SELECT id FROM '.$this->tablas['directorios']
			.' WHERE directorio = BINARY("'.$this->corrixe($d_agora,0).'")'
			.' AND id_raiz = "'.$this->id_raiz.'"'
			.' LIMIT 1;';

		if ($this->put_query($query) < 1) {
			$this->unlock();
			return;
		} else {
			$dir_agora = $this->get('id');
		}

		$this->LINE = __LINE__+1;
		$query = 'UPDATE '.$this->tablas['arquivos']
			.' SET id_directorio = "'.$dir_agora.'"'
			.' WHERE arquivo = BINARY("'.$this->corrixe($nome,0).'")'
			.' AND id_directorio = "'.$dir_antes.'";';
		$this->actualizar($query);

		if (preg_match('/\/$/', $nome)) {
			$this->LINE = __LINE__+1;
			$query = 'UPDATE '.$this->tablas['directorios']
				.' SET directorio=REPLACE(directorio'
					.', "'.$this->corrixe("$d_antes$nome",0).'"'
					.', "'.$this->corrixe("$d_agora$nome",0).'")'
				.' WHERE directorio LIKE BINARY("'.$this->corrixe("$d_antes$nome",0).'%");';
			$this->actualizar($query);
		}

		$this->unlock();
	}

	/**
	* function copiar (string $d_antes, string $d_agora, string $nome) {
	*
	* crea una copia de las relaciones del fichero indexado $nome con directorio
	* origen $d_antes en el directorio destino $d_agora
	*/
	function copiar ($d_antes, $d_agora, $nome) {
		if (!$this->slock) {
			$this->slock = true;
			$this->lock($this->tablas);
		}

		if (preg_match('/\/$/', $nome)) {
			$this->LINE = __LINE__+1;
			$query = 'SELECT id FROM '.$this->tablas['directorios']
				.' WHERE directorio = BINARY("'.$this->corrixe($d_agora,0).'")'
				.' AND id_raiz = "'.$this->id_raiz.'"'
				.' LIMIT 1;';

			$this->put_query($query);

			$this->LINE = __LINE__+1;
			$query = 'INSERT IGNORE INTO '.$this->tablas['arquivos']
				.' SET arquivo = "'.$this->corrixe($nome,0).'"'
				.', id_directorio = "'.$this->get('id').'";';

			$this->actualizar($query);
			$ultimo = $this->id_ultimo();

			$this->LINE = __LINE__+1;
			$query = 'SELECT '.$this->tablas['arquivos'].'.id'
				.' FROM '.$this->tablas['directorios'].', '.$this->tablas['arquivos']
				.' WHERE '.$this->tablas['directorios'].'.directorio = BINARY("'.$this->corrixe($d_antes,0).'")'
				.' AND '.$this->tablas['arquivos'].'.id_directorio='.$this->tablas['directorios'].'.id'
				.' AND '.$this->tablas['arquivos'].'.arquivo = BINARY("'.$this->corrixe($nome,0).'")'
				.' LIMIT 1;';

			$this->put_query($query);

			$this->LINE = __LINE__+1;
			$query = 'SELECT id_campo, id_palabra'
				.' FROM '.$this->tablas['arquivos_campos_palabras']
				.' WHERE id_arquivo = "'.$this->get('id').'"';

			$palabras = $this->recuperar($query);

			if (count($palabras) > 0) {
				$this->LINE = __LINE__+1;
				$query = 'INSERT IGNORE INTO '.$this->tablas['arquivos_campos_palabras']
					.' (id_arquivo, id_palabra, id_campo) VALUES';
	
				foreach ($palabras as $v) {
					$query .= ' ("'.$ultimo.'","'.$v['id_palabra'].'","'.$v['id_campo'].'"),';
				}
	
				$this->actualizar(substr($query,0,-1).';');
			}

			$this->LINE = __LINE__+1;
			$query = 'REPLACE INTO '.$this->tablas['directorios']
				.' SET id=id'
				.', directorio = "'.$this->corrixe("$d_agora$nome",0).'"'
				.', id_raiz = "'.$this->id_raiz.'";';

			$this->actualizar($query);
			$id_agora = $this->id_ultimo();

			$this->LINE = __LINE__+1;
			$query = 'SELECT '.$this->tablas['arquivos'].'.*'
				.' FROM '.$this->tablas['directorios'].', '.$this->tablas['arquivos']
				.' WHERE directorio = BINARY("'.$this->corrixe("$d_antes$nome",0).'")'
				.' AND '.$this->tablas['arquivos'].'.id_directorio='.$this->tablas['directorios'].'.id'
				.' AND id_raiz = "'.$this->id_raiz.'";';

			$PFN_arquivos = $this->recuperar($query);
		} else {
			$this->LINE = __LINE__+1;
			$query = 'SELECT id FROM '.$this->tablas['directorios']
				.' WHERE directorio = BINARY("'.$this->corrixe($d_agora,0).'")'
				.' AND id_raiz = "'.$this->id_raiz.'"'
				.' LIMIT 1;';

			$this->put_query($query);
			$id_agora = $this->get('id');

			$this->LINE = __LINE__+1;
			$query = 'SELECT '.$this->tablas['arquivos'].'.*'
				.' FROM '.$this->tablas['directorios'].', '.$this->tablas['arquivos']
				.' WHERE directorio = BINARY("'.$this->corrixe($d_antes,0).'")'
				.' AND '.$this->tablas['arquivos'].'.id_directorio='.$this->tablas['directorios'].'.id'
				.' AND '.$this->tablas['arquivos'].'.arquivo = BINARY("'.$this->corrixe($nome,0).'")'
				.' AND id_raiz = "'.$this->id_raiz.'";';

			$PFN_arquivos = $this->recuperar($query);
		}

		foreach ($PFN_arquivos as $v) {
			$this->LINE = __LINE__+1;
			$query = "SELECT id_palabra, id_campo"
				.' FROM '.$this->tablas['arquivos_campos_palabras']
				.' WHERE id_arquivo = "'.$v['id'].'";';

			$palabras = $this->recuperar($query);

			$this->LINE = __LINE__+1;
			$query = 'INSERT IGNORE INTO '.$this->tablas['arquivos']
				.' SET arquivo = "'.$this->corrixe($v['arquivo'],0).'"'
				.', id_directorio = "'.$id_agora.'";';

			$this->actualizar($query);

			$ultimo = $this->id_ultimo();

			if (count($palabras) > 0) {
				$this->LINE = __LINE__+1;
				$query = 'INSERT IGNORE INTO '.$this->tablas['arquivos_campos_palabras']
					.' (id_arquivo, id_palabra, id_campo) VALUES';
	
				foreach ($palabras as $x) {
					$query .= ' ("'.$ultimo.'","'.$x['id_palabra'].'","'.$x['id_campo'].'"),';
				}
	
				$this->actualizar(substr($query,0,-1).';');
			}

			if (preg_match('/\/$/', $v['arquivo'])) {
				$this->copiar("$d_antes$nome", "$d_agora$nome", $v['arquivo']);
			}
		}

		$this->unlock();
		$this->slock = false;
	}

	/**
	*	function buscar (string $dir, string $palabras, string $ecampos, boolean $recursivo)
	*
	* realiza una busqueda de las palabras pedidas en los campos indexados
	* de forma recursiva o no dependiendo del valor recibido de $recursivo
	*/
	function buscar ($dir, $palabras, $ecampos, $recursivo) {
		if (count($palabras) < 1) {
			return;
		}

		foreach ((array)$ecampos as $v) {
			if (in_array($v, $this->conf->g('inc','campos_indexar'))) {
				$campos[] = $v;
			}
		}

		if (!is_array($campos) && !in_array('nome', $ecampos)) {
			return;
		}

		$sep = '';
		$this->lock($this->tablas, 'READ');

		if (in_array('nome', $ecampos)) {
			$palabras = $this->corrixe($palabras,0);

			$this->LINE = __LINE__+1;
			$query = 'SELECT '.$this->tablas['directorios'].".directorio, ".$this->tablas['arquivos'].'.arquivo'
				.' FROM '.$this->tablas['directorios'].', '.$this->tablas['arquivos']
				.' WHERE '.$this->tablas['directorios'].'.id_raiz = "'.$this->id_raiz.'" AND ';

			if ($recursivo == 1) {
				$query .= $this->tablas['directorios'].'.directorio = BINARY("'.$this->corrixe($dir,0).'")'
					.' AND '.$this->tablas['directorios'].'.id = '.$this->tablas['arquivos'].'.id_directorio AND ';
			} elseif ($recursivo == 2) {
				$query .= $this->tablas['directorios'].'.directorio LIKE BINARY("'.$this->corrixe($dir,0).'%")'
					.' AND '.$this->tablas['directorios'].'.id = '.$this->tablas['arquivos'].'.id_directorio AND ';
			}

			$query .= 'UPPER('.$this->tablas['arquivos'].'.arquivo) LIKE UPPER("%'.str_replace(' ','%',$palabras).'%")';
		} else {
			$palabras = $this->parte_palabras($palabras);

			$this->LINE = __LINE__+1;
			$query = 'SELECT '.$this->tablas['directorios'].'.directorio, '.$this->tablas['arquivos'].'.arquivo'
				.' FROM '.$this->tablas['directorios'].', '.$this->tablas['arquivos']
					.', '.$this->tablas['arquivos_campos_palabras'].', '.$this->tablas['palabras']
					.', '.$this->tablas['campos']
				.' WHERE '.$this->tablas['directorios'].'.id_raiz = "'.$this->id_raiz.'" AND ';

			if ($recursivo == 1) {
				$query .= $this->tablas['directorios'].'.directorio = BINARY("'.$this->corrixe($dir,0).'")'
					.'AND '.$this->tablas['directorios'].'.id = '.$this->tablas['arquivos'].'.id_directorio AND ';
			} elseif ($recursivo == 2) {
				$query .= $this->tablas['directorios'].'.directorio LIKE BINARY("'.$this->corrixe($dir,0).'%")'
					.'AND '.$this->tablas['directorios'].'.id = '.$this->tablas['arquivos'].'.id_directorio AND ';
			}

			if (count($palabras) == 1) {
				$query .= $this->tablas['palabras'].'.palabra = "'.$palabras[0].'"';
			} else {
				$query .= 'MATCH ('.$this->tablas['palabras'].'.palabra) AGAINST ("'.implode(' ',$palabras).'" IN BOOLEAN MODE)';
			}

			$query .= ' AND '.$this->tablas['arquivos_campos_palabras'].'.id_palabra = '.$this->tablas['palabras'].'.id'
				.' AND '.$this->tablas['campos'].'.id = '.$this->tablas['arquivos_campos_palabras'].'.id_campo AND (';

			foreach ($campos as $v) {
				$query .= $sep.' '.$this->tablas['campos'].'.campo = "'.$this->corrixe($v,0).'"';
				$sep = ' OR';
			}

			$query .= ') AND '.$this->tablas['arquivos_campos_palabras'].'.id_palabra='.$this->tablas['palabras'].'.id'
				.' AND '.$this->tablas['arquivos'].'.id = '.$this->tablas['arquivos_campos_palabras'].'.id_arquivo';
		}

		if ($recursivo > 1) {
			$query .= ' AND '.$this->tablas['directorios'].'.id = '.$this->tablas['arquivos'].'.id_directorio';
		}

		$query .= ' GROUP BY '.$this->tablas['arquivos'].'.id'
			.' ORDER BY '.$this->tablas['directorios'].'.directorio ASC, '.$this->tablas['arquivos'].'.arquivo ASC;';

		$resultado = $this->recuperar($query);

		$this->unlock();

		return $resultado;
	}

	/**
	*	function reindexar (integer $id_raiz, string $path_raiz)
	*
	* elimina los indices de una raiz concreta y llama a la función de
	* reindexación recursiva
	* Devuelve la cadena resultante de la actualización
	*
	* return string
	*/
	function reindexar ($id_raiz, $path_raiz) {
		$this->lock($this->tablas);
		$this->slock = true;
		$this->id_raiz = $id_raiz;
		$this->path_raiz = $path_raiz;

		$this->txt = "\n".'Vaciando ./ <br />';

		$this->LINE = __LINE__+1;
		$query = 'DELETE '.$this->tablas['directorios']
			.', '.$this->tablas['arquivos']
			.', '.$this->tablas['arquivos_campos_palabras']
			.' FROM '.$this->tablas['directorios']
			.' LEFT JOIN '.$this->tablas['arquivos']
				.' ON '.$this->tablas['arquivos'].'.id_directorio = '.$this->tablas['directorios'].'.id'
			.' LEFT JOIN '.$this->tablas['arquivos_campos_palabras']
				.' ON '.$this->tablas['arquivos_campos_palabras'].'.id_arquivo = '.$this->tablas['arquivos'].'.id'
			.' WHERE '.$this->tablas['directorios'].'.id_raiz = "'.$this->id_raiz.'";';
		$this->actualizar($query);

		$this->LINE = __LINE__+1;
		$query = 'SELECT id'
			.' FROM '.$this->tablas['arquivos']
			.' LIMIT 1;';

		if ($this->put_query($query) == 0) {
			$this->unlock();

			$this->LINE = __LINE__+1;
			$query = 'TRUNCATE TABLE '.$this->tablas['arquivos_campos_palabras'].';';
			$this->actualizar($query);

			$this->LINE = __LINE__+1;
			$query = 'TRUNCATE TABLE '.$this->tablas['arquivos'].';';
			$this->actualizar($query);

			$this->LINE = __LINE__+1;
			$query = 'TRUNCATE TABLE '.$this->tablas['directorios'].';';
			$this->actualizar($query);

			$this->lock($this->tablas);
		}

		$this->reindexar_recursivo('./');
		$this->unlock();
		$this->slock = false;

		return $this->txt;
	}

	/**
	*	function reindexar_recursivo (string $dende)
	*
	* reindexa todo un directorio y subdirectorios recursivamente
	*/
	function reindexar_recursivo ($dende) {
		$dir = $this->niveles->path_correcto($this->path_raiz.$dende);

		$lista = &$this->niveles->carga_contido($dir, true, true);
		$datos = &$this->niveles->ordena($lista, 'nome', 'ASC');

		foreach ($datos['arq']['nome'] as $v) {
			$this->cnt_index['arq']++;

			$this->txt .= "\n".'Indexando '.$dende.$v;
			$arq_inc = $this->inc->nome_inc("$dir/$v");
			$this->alta_modificacion($dende, $v, $arq_inc);
		}

		foreach ($datos['dir']['nome'] as $v) {
			$this->cnt_index['dir']++;

			$this->txt .= "\n".'Indexando '.$dende.$v.'/';
			$arq_inc = $this->inc->nome_inc("$dir/$v/");
			$this->alta_modificacion($dende, "$v/", $arq_inc);
			$this->reindexar_recursivo("$dende$v/");
		}
	}

	/**
	* function cnt (string $que)
	*
	* devuelve el número de fichero o directorios indexados o encontrados
	*
	* return integer
	*/
	function cnt ($que) {
		return $this->cnt_index[$que];
	}

	/**
	* function eliminar_raiz (intval $id)
	*
	* Elimina todo lo indexado en una raíz concreta
	*/
	function eliminar_raiz ($id) {
		$dirs = array();
		$arqs = array();

		$this->LINE = __LINE__+1;
		$query = 'SELECT id FROM '.$this->tablas['directorios']
			.' WHERE id_raiz = "'.intval($id).'";';

		for ($this->put_query($query); $this->mais(); $this->seguinte()) {
			$dirs[] = $this->get('id');
		}

		if (count($dirs) > 0) {
			$this->LINE = __LINE__+1;
			$query = 'SELECT id FROM '.$this->tablas['arquivos']
				.' WHERE id_directorio IN ('.implode(',', $dirs).');';

			for ($this->put_query($query); $this->mais(); $this->seguinte()) {
				$arqs[] = $this->get('id');
			}

			if (count($arqs) > 0) {
				$query = 'DELETE FROM '.$this->tablas['arquivos_campos_palabras']
					.' WHERE id_arquivo IN ('.implode(',', $arqs).');';
				$this->put_query($query);

				$query = 'DELETE FROM '.$this->tablas['arquivos']
					.' WHERE id IN ('.implode(',', $arqs).');';
				$this->put_query($query);
			}

			$query = 'DELETE FROM '.$this->tablas['directorios']
				.' WHERE id IN ('.implode(',', $dirs).');';
			$this->put_query($query);
		}
	}
}
?>
