<?php
/****************************************************************************
* data/include/class_vars.php
*
* Procesa y devuelve los datos de las variables
* GET, POST, SESSION, FILES, SERVER
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
* class PFN_Vars
*
* clase carga, modifica y obtiene los valores de las variables de
* GET, POST, SESSION, FILES, SERVER
*/
class PFN_Vars {
	var $get = array();
	var $post = array();
	var $session = array();
	var $files = array();
	var $server = array();
	var $env = array();
	var $paths = array();
	var $trace = true;

	/**
	* function PFN_Vars (void)
	*
	* carga las variables predefinidas de PHP necesarias
	* realiza la comprobacion para _SERVER y HTTP_SERVER_VARS
	*/
	function PFN_Vars () {
		global $PFN_paths;

		if (is_array($_SERVER)) {
			$this->get = &$_GET;
			$this->post = &$_POST;
			$this->session = &$_SESSION;
			$this->files = &$_FILES;
			$this->server = &$_SERVER;
			$this->env = &$_ENV;
		} else {
			$this->get = &$GLOBALS['HTTP_GET_VARS'];
			$this->post = &$GLOBALS['HTTP_POST_VARS'];
			$this->session = &$GLOBALS['HTTP_SESSION_VARS'];
			$this->files = &$GLOBALS['HTTP_POST_FILES'];
			$this->server = &$GLOBALS['HTTP_SERVER_VARS'];
			$this->env = &$GLOBALS['HTTP_ENV_VARS'];
		}

		$this->get = PFN_stripslashes($this->get);
		$this->post = PFN_stripslashes($this->post);
		$this->paths = &$PFN_paths;
	}

	/**
	* function get (string $k, string $v)
	*
	* en caso de que $v no tenga valor, devuelve el
	* valor de la variable $k de $_GET,
	* si $v tiene valor se asociará su valor con la
	* variable de $_GET[$k]
	*
	* return mixed
	*/
	function get ($k, $v='-*-') {
		if (empty($k)) {
			return $this->get;
		}

		if ($v == '-*-') {
			if (empty($this->get[$k])) {
				return false;
			} else {
				return urldecode($this->get[$k]);
			}
		} else {
			$this->get[$k] = urlencode($v);
		}
	}

	/**
	* function post (string $k, string $v)
	*
	* en caso de que $v no tenga valor, devuelve el
	* valor de la variable $k de $_POST,
	* si $v tiene valor se asociará su valor con la
	* variable de $_POST[$k]
	*
	* return mixed
	*/
	function post ($k, $v='-*-') {
		if (empty($k)) {
			return $this->post;
		}

		if ($v == '-*-') {
			if (empty($this->post[$k])) {
				return false;
			} else {
				return $this->post[$k];
			}
		} else {
			$this->post[$k] = $v;
		}
	}

	/**
	* function session (mixed $k, string $v)
	*
	* en caso de que al pedir el primer valor de sesion
	* la variable $_SESSION este vacía, volverá a ser
	* cargada.
	* en caso de que $v no tenga valor, devuelve el
	* valor de la variable $k de $_SESSION,
	* si $v tiene valor se asociará su valor con la
	* variable de $_SESSION[$k]
	*
	* return mixed
	*/
	function session ($k, $v='-*-') {
		if (empty($this->session) || !count($this->session)) {
			if (is_array($_SESSION)) {
				$this->session = &$_SESSION;
			} else {
				$this->session = &$GLOBALS['HTTP_SESSION_VARS'];
			}
		}

		if (empty($k)) {
			return $this->session;
		}

		if ($v == '-*-') {
			if (is_array($k)) {
				return $this->session[$k[0]][$k[1]];
			} else {
				return $this->session[$k];
			}
		} else {
			if (is_array($k)) {
				$this->session[$k[0]][$k[1]] = $v;
			} else {
				$this->session[$k] = $v;
			}
		}
	}

	/**
	* function files (string $k, string $v)
	*
	* en caso de que $v no tenga valor, devuelve el
	* valor de la variable $k de $_FILES,
	* si $v tiene valor se asociará su valor con la
	* variable de $_FILES[$k]
	*
	* return mixed
	*/
	function files ($k, $v='-*-') {
		if (empty($k)) {
			return $this->files;
		}

		if ($v == '-*-') {
			return $this->files[$k];
		} else {
			$this->files[$k] = $v;
		}
	}

	/**
	* function server (string $k, string $v)
	*
	* en caso de que $v no tenga valor, devuelve el
	* valor de la variable $k de $_SERVER,
	* si $v tiene valor se asociará su valor con la
	* variable de $_SERVER[$k]
	*
	* return mixed
	*/
	function server ($k, $v='-*-') {
		if (empty($k)) {
			return $this->server;
		}

		if ($v == '-*-') {
			return $this->server[$k];
		} else {
			$this->server[$k] = $v;
		}
	}

	/**
	* function env (string $k, string $v)
	*
	* en caso de que $v no tenga valor, devuelve el
	* valor de la variable $k de $_ENV,
	* si $v tiene valor se asociará su valor con la
	* variable de $_ENV[$k]
	*
	* return mixed
	*/
	function env ($k, $v='-*-') {
		if (empty($k)) {
			return $this->env;
		}

		if ($v == '-*-') {
			return $this->env[$k];
		} else {
			$this->env[$k] = $v;
		}
	}

	/**
	* function ip (void)
	*
	* devolve a IP de un usuario remoto
	*
	* return stirng
	*/
	function ip () {
		$s_hxff = $this->server('HTTP_X_FORWARDED_FOR');
		$s_ra = $this->server('REMOTE_ADDR');
		$e_ra = $this->env('REMOTE_ADDR');
		$client_ip = empty($s_ra)?(empty($e_ra)?'unknown':$e_ra):$s_ra;

		if ($s_hxff) {
			// los proxys van añadiendo al final de esta cabecera
			// las direcciones ip que van "ocultando". Para localizar la ip real
			// del usuario se comienza a mirar por el principio hasta encontrar
			// una dirección ip que no sea del rango privado. En caso de no
			// encontrarse ninguna se toma como valor el REMOTE_ADDR

			$entries = split('[, ]', $s_hxff);

			reset($entries);

			while (list(, $entry) = each($entries)) {
				$entry = trim($entry);

				if (preg_match('/^([0-9]+.[0-9]+.[0-9]+.[0-9]+)/', $entry, $client_ip)) {
					// http://www.faqs.org/rfcs/rfc1918.html
					$private_ip = array(
						'/^0./',
						'/^127.0.0.1/',
						'/^192.168..*/',
						'/^172.((1[6-9])|(2[0-9])|(3[0-1]))..*/',
						'/^10..*/'
					);

					$found_ip = preg_replace($private_ip, $client_ip, $ip_list[1]);

					if ($client_ip != $found_ip) {
						$client_ip = $found_ip;
						break;
					}
				}
			}
		}
	 
		return addslashes($client_ip);
	}

	/**
	* function trace (void)
	*
	* Realiza un registro de todos os lugares en los que está situado
	* este traceador
	*/
	function trace () {
		if ($this->trace === false) {
			return true;
		}

		$args = func_get_args();

		$arquivo = array_shift($args);
		$linea = array_shift($args);
		$txt = '';

		foreach ($args as $v) {
			if (is_array($v) || is_object($v)) {
				ob_start();
				var_dump($v);
				$txt .= "\n".ob_get_contents()."\n";
				ob_end_clean();
			} else {
				$txt .= "\n".$v."\n";
			}
		}

		$fp = fopen($this->paths['logs'].'trace.php', 'a+');
		fwrite($fp, $arquivo.' ['.$linea.']'.$txt);
		fclose($fp);
	}
}

$PFN_vars = new PFN_Vars();
?>
