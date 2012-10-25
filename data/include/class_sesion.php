<?php
/*******************************************************************************
* data/include/class_sesion.php
*
* Almacena, devuelve y mantiene el control de sesion
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

defined('OK') or die();

/**
* class PFN_Sesion
*
* Clase que maneja los ficheros de sesion para permitir encriptado de datos
*/
class PFN_Sesion {
	var $activa = true;
	var $clave;
	var $id_sesion;
	var $encriptar = array('r' => true, 'w' => true);
	var $vars;
	var $tabla;
	var $tempo = 3600;

	/**
	* function PFN_Sesion (object &$PFN_conf)
	*
	* Inicializa la clase de sesión, carga la clave privada y el tiempo máximo
	* de sesión, cargando la clave privada del fichero de configuración
	*/
	function PFN_Sesion (&$PFN_conf) {
		global $PFN_vars;

		$this->vars = &$PFN_vars;
		$this->clave = $PFN_conf->g('clave');
		$this->tabla = $PFN_conf->g('db','prefixo').'sesions';

		if ($this->activa && function_exists('ini_set')) {
			@ini_set('session.use_trans_sid', '0');
			@ini_set('session.cache_limiter', 'nocache');
			@ini_set('session.cache_expire', '180');
			@ini_set('session.use_cookies', '1');
			@ini_set('session.use_only_cookies', '1');
			@ini_set('session.gc_maxlifetime', $this->tempo);
			@ini_set('session.save_handler', 'user');
			@ini_set('session.gc_probability', '1');
		}
	}

	/**
	* function inicia (void)
	* 
	* Inicializa la función manejadora de sesiones
	*/
	function inicia () {
		if ($this->activa) {
			session_set_save_handler(
				array(&$this, 'abrir'),
				array(&$this, 'pechar'),
				array(&$this, 'ler'),
				array(&$this, 'escribir'),
				array(&$this, 'destruir'),
				array(&$this, 'caducar')
			);
		}

		register_shutdown_function('session_write_close');

		session_start();
	}

	/**
	* function encriptar (boolean $r, boolean $w)
	*
	* Permite indicar si se va a encriptar o no los datos de sesion
	*/
	function encriptar ($r, $w) {
		$this->encriptar = array('r' => $r, 'w' => $w);
	}

	/**
	* function abrir (string $save_path, string $session_name)
	*
	* Carga o id de sesion e mais a clave privada
	*
	* return boolean
	*/
	function abrir ($save_path, $session_name) {
		$session_id = session_id();

		if (empty($session_id)) {
			list($sec, $usec) = explode(' ', microtime());
			mt_srand((float) $sec + ((float) $usec * 100000));
			$session_id = md5(uniqid(mt_rand(), true));
			session_id($session_id);
		}

		$this->id_sesion = $session_id;

		return true;
	}

	/**
	* function pechar (void)
	*
	* Devolve true
	*
	* return boolean
	*/
	function pechar () {
		return true;
	}

	/**
	* function ler (void)
	*
	* Abre para lectura y bloquea el fichero de sesion, desencriptando su
	* contenido y devolviendo la cadena resultante
	*
	* return string
	*/
	// Original: function ler ($id) {
	function ler () {
		global $PFN_clases;

		$PFN_clases->FILE = __FILE__;
		$PFN_clases->LINE = __LINE__+1;
		$query = 'SELECT contido'
			.' FROM '.$this->tabla
			.' WHERE id = "'.$this->id_sesion.'"'
			.' AND ip = "'.$this->vars->ip().'"'
			.' AND tempo >= '.(time() - $this->tempo)
			.' LIMIT 1;';

		$PFN_clases->lock($this->tabla, 'READ');
		$ok = $PFN_clases->put_query($query);
		$PFN_clases->unlock();

		if ($ok > 0) {
			$contido = $PFN_clases->get('contido');

			if ($this->encriptar['r'] && strlen($contido)) {
				$contido = $this->desencripta($contido);
			}

			return $contido;
		} else {
			return '';
		}
	}

	/**
	* function escribir (string $id, string $sess_data)
	*
	* Abre en modo escritura y bloquea el fichero de sesión, encriptando
	* y escribiendo la cadena resultante
	*
	* return boolean
	*/
	function escribir ($id, $sess_data) {
		global $PFN_clases;

		if (empty($sess_data)) {
			return true;
		}

		if ($this->encriptar['w']) {
			$contido = $this->encripta($sess_data);
		} else {
			$contido = $sess_data;
		}

		$PFN_clases->FILE = __FILE__;
		$PFN_clases->LINE = __LINE__+1;
		$query = 'REPLACE INTO '.$this->tabla
			.' SET id = "'.$this->id_sesion.'"'
			.', ip = "'.$this->vars->ip().'"'
			.', tempo = "'.time().'"'
			.', contido = "'.addslashes($contido).'";';

		$PFN_clases->lock($this->tabla, 'WRITE');
		$PFN_clases->actualizar($query);
		$PFN_clases->unlock();

		return true;
	}

	/**
	* function destruir (void)
	*
	* Elimina el fichero de sesión
	*
	* return boolean
	*/
	// Original: function destruir ($id) {
	function destruir () {
		global $PFN_clases;

		$PFN_clases->FILE = __FILE__;
		$PFN_clases->LINE = __LINE__+1;
		$query = 'DELETE FROM '.$this->tabla
			.' WHERE id = "'.$this->id_sesion.'";';

		$PFN_clases->lock($this->tabla, 'WRITE');
		$PFN_clases->query($query);
		$PFN_clases->unlock();

		return true;
	}

	/**
	* function caducar (void)
	*
	* Elimina todas las sesiones con un tiempo de acceso mayor al definido
	* en la varibale $this->tempo
	*
	* return boolean
	*/
	// Original: function caducar ($maxlifetime) {
	function caducar () {
		global $PFN_clases;

		$PFN_clases->FILE = __FILE__;
		$PFN_clases->LINE = __LINE__+1;
		$query = 'DELETE FROM '.$this->tabla
			.' WHERE tempo < "'.(time() - $this->tempo).'"'
			.' OR contido = "";';

		$PFN_clases->lock($this->tabla, 'WRITE');
		$PFN_clases->query($query);
		$PFN_clases->unlock();

		return true;
	}

	/**
	* function keyED (string $cad)
	*
	* Genera una clave para la cadena recibida 
	*
	* return string
	*/
	function keyED ($cad) {
		$lonx_clave = strlen($this->clave);
		$lonx_cad = strlen($cad);
		$cnt = 0;
		$resultado = '';

		for ($i=0; $i < $lonx_cad; $i++) {
			$cnt = ($cnt == $lonx_clave)?0:$cnt;
			$resultado .= substr($cad, $i, 1) ^ substr($this->clave, $cnt, 1);
			$cnt++;
		} 

		return $resultado;
	} 

	/**
	* function encripta (string $cad)
	*
	* Encripta una cadena de texto $cad y devuelve el resultado
	*
	* return string
	*/
	function encripta ($cad) {
		srand((double)microtime()*1000000);
		$aleatorio = md5(rand(0,32000));
		$lonx_clave = strlen($this->clave);
		$lonx_cad = strlen($cad);
		$cnt = 0;
		$resultado = '';

		for ($i=0; $i < $lonx_cad; $i++){
			$cnt = ($cnt == $lonx_clave)?0:$cnt;
			$resultado .= substr($aleatorio, $cnt, 1).(substr($cad, $i, 1) ^ substr($aleatorio, $cnt, 1));
			$cnt++;
		} 

		return base64_encode($this->keyED($resultado));
	} 
	
	/**
	* function desencripta (string $cad)
	*
	* Desencripta una cadena de texto $cad y devuelve el resultado
	*
	* return string
	*/
	function desencripta ($cad) {
		$cad = $this->keyED(base64_decode($cad));
		$lonx_cad = strlen($cad);
		$resultado = '';

		for ($i=0; $i < $lonx_cad; $i++){
			$md5 = substr($cad ,$i, 1);
			$i++;
			$resultado .= (substr($cad, $i, 1) ^ $md5);
		}

		return $resultado;
	}
}

$PFN_sesion = &new PFN_Sesion($PFN_conf);
$PFN_sesion->inicia();
?>
