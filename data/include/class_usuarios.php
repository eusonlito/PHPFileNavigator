<?php
/*******************************************************************************
* data/include/class_usuarios.php
*
* Realiza el control de acceso de los usuarios
*

PHPfileNavigator versión 2.3.3

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
* class PFN_Usuarios extends Clases
*
* clase de control de acceso de usuarios
*/
class PFN_Usuarios extends PFN_Clases {
	var $usuario;
	var $contrasinal;
	var $vars;
	var $conf;
	var $tablas;
	var $sesion;
	var $FILE = __FILE__;
	var $sesion_iniciada = false;
	var $correxir = array(true,true,true);
	var $intentos_errados = 3; // Máximo número de intentos de acceso cada 10 segundos

	/**
	* function PFN_Usuarios (void)
	*
	* carga el objecto $PFN_vars para obtener variables externas
	* y carga el nombre de las tablas
	*/
	function PFN_Usuarios (&$PFN_conf) {
		global $PFN_vars, $PFN_sesion;

		$this->conf = &$PFN_conf;
		$this->vars = &$PFN_vars;
		$this->sesion = &$PFN_sesion;

		$this->tablas['usuarios'] = $PFN_conf->g('db','prefixo').'usuarios';
		$this->tablas['raices'] = $PFN_conf->g('db','prefixo').'raices';
		$this->tablas['accesos'] = $PFN_conf->g('db','prefixo').'accesos';
		$this->tablas['sesions'] = $PFN_conf->g('db','prefixo').'sesions';
		$this->tablas['bloqueo'] = $PFN_conf->g('db','prefixo').'bloqueo_ip';
		$this->tablas['grupos'] = $PFN_conf->g('db','prefixo').'grupos';
		$this->tablas['confs'] = $PFN_conf->g('db','prefixo').'configuracions';
		$this->tablas['r_u'] = $PFN_conf->g('db','prefixo').'raices_usuarios';
		$this->tablas['r_g_c'] = $PFN_conf->g('db','prefixo').'raices_grupos_configuracions';
	}

	/**
	* function vars (object &$PFN_vars)
	*
	* Carga el objeto manejador de variables
	*/
	function vars (&$PFN_vars) {
		$this->vars = &$PFN_vars;
	}

	/**
	* function init (string $modo, string $a1, string $a2)
	*
	* genera y ejecuta las consulta para la comprobación de usuarios:
	*		'login': comprueba los permisos de usuario para acceder desde
	*				la pantalla inicial de login
	*		'session': verifica si el usuario ha accedido correctamente desde
	*				la pantalla de login y tiene una sesion iniciada
	*
	* return integer
	*/
	function init ($modo, $a1='', $a2='') {
		$a1 = $this->corrixe($a1);
		$a2 = $this->corrixe($a2);

		if ($modo == 'login') {
			$this->usuario = $a1;
			$this->contrasinal = $a2;
		} else {
			$sPFN = $this->vars->session('sPFN');
			$this->id_usuario = intval($sPFN['usuario']['id']);
			$this->usuario = addslashes($sPFN['usuario']['usuario']);
			$this->contrasinal = addslashes($sPFN['usuario']['contrasinal']);
			$this->admin = intval($sPFN['usuario']['admin']);
			$this->raiz = intval($a1?$a1:$sPFN['raiz']['id']);
		}

		switch ($modo) {
			case 'intentos':
				$this->LINE = __LINE__+1;
				$this->query = 'SELECT COUNT(*) as intentos'
					.' FROM '.$this->tablas['accesos']
					.' WHERE ip = "'.$this->vars->ip().'"'
					.' AND ultimo >= "'.(time() - 10).'"'
					.' AND estado = 0;';
				break;
			case 'login':
				$this->LINE = __LINE__+1;
				$this->query = 'SELECT '.$this->tablas['usuarios'].'.id'
					.', '.$this->tablas['usuarios'].'.admin'
					.', '.$this->tablas['usuarios'].'.id_grupo'
					.', '.$this->tablas['usuarios'].'.mantemento'
					.', '.$this->tablas['usuarios'].'.descargas_maximo'
					.', '.$this->tablas['usuarios'].'.cambiar_datos'
					.', '.$this->tablas['confs'].'.conf as conf_defecto'
					.' FROM '.$this->tablas['usuarios'].', '.$this->tablas['raices']
					.', '.$this->tablas['r_u'].', '.$this->tablas['grupos']
					.', '.$this->tablas['confs'].', '.$this->tablas['bloqueo']
					.' WHERE '.$this->tablas['bloqueo'].'.ip NOT IN ("'.$this->vars->ip().'")'
					.' AND '.$this->tablas['usuarios'].'.usuario = BINARY("'.$this->usuario.'")'
					.' AND '.$this->tablas['usuarios'].'.contrasinal = BINARY("'.$this->contrasinal.'")'
					.' AND '.$this->tablas['usuarios'].'.estado = 1'
					.' AND '.$this->tablas['grupos'].'.id = '.$this->tablas['usuarios'].'.id_grupo'
					.' AND '.$this->tablas['grupos'].'.estado = 1'
					.' AND '.$this->tablas['confs'].'.id = '.$this->tablas['grupos'].'.id_conf'
					.' AND '.$this->tablas['r_u'].'.id_usuario = '.$this->tablas['usuarios'].'.id'
					.' AND '.$this->tablas['raices'].'.id = '.$this->tablas['r_u'].'.id_raiz'
					.' AND '.$this->tablas['raices'].'.estado = 1'
					.' LIMIT 1;';
				break;
			case 'session':
				$this->LINE = __LINE__+1;
				$this->query = 'SELECT '.$this->tablas['raices'].'.*'
					.', '.$this->tablas['confs'].'.conf'
					.', '.$this->tablas['accesos'].'.id as id_acceso'
					.' FROM '.$this->tablas['usuarios'].', '.$this->tablas['raices']
					.', '.$this->tablas['r_u'].', '.$this->tablas['accesos']
					.', '.$this->tablas['grupos'].', '.$this->tablas['confs']
					.', '.$this->tablas['bloqueo'].($this->sesion->activa?(', '.$this->tablas['sesions']):'')
					.($this->raiz?(', '.$this->tablas['r_g_c']):'')
					.' WHERE '.$this->tablas['bloqueo'].'.ip NOT IN ("'.$this->vars->ip().'")'
					.' AND '.$this->tablas['usuarios'].'.usuario = BINARY("'.$this->usuario.'")'
					.' AND '.$this->tablas['usuarios'].'.contrasinal = BINARY("'.$this->contrasinal.'")'
					.' AND '.$this->tablas['usuarios'].'.admin = "'.$this->admin.'"'
					.' AND '.$this->tablas['usuarios'].'.estado = 1'
					.' AND '.$this->tablas['grupos'].'.id = '.$this->tablas['usuarios'].'.id_grupo'
					.' AND '.$this->tablas['grupos'].'.estado = 1'
					.' AND '.$this->tablas['r_u'].'.id_usuario = '.$this->tablas['usuarios'].'.id'
					.($this->raiz?(' AND '.$this->tablas['r_g_c'].'.id_raiz = '.$this->raiz
						.' AND '.$this->tablas['r_g_c'].'.id_grupo = '.$this->tablas['usuarios'].'.id_grupo'
						.' AND '.$this->tablas['confs'].'.id = '.$this->tablas['r_g_c'].'.id_conf'
						.' AND '.$this->tablas['r_u'].'.id_raiz = "'.$this->raiz.'"')
						:(' AND '.$this->tablas['confs'].'.id = '.$this->tablas['grupos'].'.id_conf'))
					.' AND '.$this->tablas['raices'].'.id = '.$this->tablas['r_u'].'.id_raiz'
					.' AND '.$this->tablas['raices'].'.estado = 1'
					.' AND '.$this->tablas['accesos'].'.login = "'.$this->usuario.'"'
					.' AND '.$this->tablas['accesos'].'.session = "'.addslashes(session_id()).'"'
					.' AND '.$this->tablas['accesos'].'.ip = "'.$this->vars->ip().'"'
					.' AND '.$this->tablas['accesos'].'.estado = 1'
					.($this->sesion->activa?(' AND '.$this->tablas['sesions'].'.id = "'.addslashes(session_id()).'"'
						.' AND '.$this->tablas['sesions'].'.ip = "'.$this->vars->ip().'"'
						.' AND '.$this->tablas['sesions'].'.contido != ""'
						.' AND '.$this->tablas['sesions'].'.tempo >= "'.(time() - $this->sesion->tempo).'"')
						:'')
					.' ORDER BY '.$this->tablas['accesos'].'.id DESC'
					.' LIMIT 1;';
				break;
			case 'menu_raices':
				$this->LINE = __LINE__+1;
				$this->query = 'SELECT '.$this->tablas['raices'].'.id, '.$this->tablas['raices'].'.nome'
					.' FROM '.$this->tablas['usuarios'].', '.$this->tablas['raices']
					.', '.$this->tablas['r_u']
					.' WHERE '.$this->tablas['usuarios'].'.id = "'.intval($a1).'"'
					.' AND '.$this->tablas['usuarios'].'.estado = 1'
					.' AND '.$this->tablas['r_u'].'.id_usuario = '.$this->tablas['usuarios'].'.id'
					.' AND '.$this->tablas['raices'].'.id = '.$this->tablas['r_u'].'.id_raiz'
					.' AND '.$this->tablas['raices'].'.estado = 1'
					.' ORDER BY '.$this->tablas['raices'].'.nome ASC;';
				break;
			case 'raices':
				$this->LINE = __LINE__+1;
				$this->query = 'SELECT * FROM '.$this->tablas['raices']
					.' ORDER BY nome ASC;';
				break;
			case 'raices_total':
				$this->LINE = __LINE__+1;
				$this->query = 'SELECT COUNT(*) as total'
					.' FROM '.$this->tablas['raices'].';';
				break;
			case 'raices_pax':
				$this->LINE = __LINE__+1;
				$this->query = 'SELECT * FROM '.$this->tablas['raices']
					.' ORDER BY nome ASC'
					.' LIMIT '.intval($a1).', '.intval($a2).';';
				break;
			case 'raiz':
				$this->LINE = __LINE__+1;
				$this->query = 'SELECT * FROM '.$this->tablas['raices']
					.' WHERE id = "'.intval($a1).'"'
					.' LIMIT 1;';
				break;
			case 'usuarios_raiz':
				$this->LINE = __LINE__+1;
				$this->query = 'SELECT '.$this->tablas['usuarios'].'.id, '.$this->tablas['usuarios'].'.nome'
					.', '.$this->tablas['r_u'].'.id_raiz as relacion'
					.' FROM ('.$this->tablas['usuarios'].', '.$this->tablas['raices'].')'
					.' LEFT JOIN '.$this->tablas['r_u']
						.' ON ('.$this->tablas['r_u'].'.id_raiz = '.$this->tablas['raices'].'.id'
						.' AND '.$this->tablas['r_u'].'.id_usuario = '.$this->tablas['usuarios'].'.id)'
					.' WHERE '.$this->tablas['raices'].'.id = "'.intval($a1).'"'
					.' ORDER BY '.$this->tablas['usuarios'].'.nome ASC;';
				break;
			case 'usuarios':
				$this->LINE = __LINE__+1;
				$this->query = 'SELECT * FROM '.$this->tablas['usuarios']
					.' ORDER BY nome ASC;';
				break;
			case 'usuarios_total':
				$this->LINE = __LINE__+1;
				$this->query = 'SELECT COUNT(*) as total'
					.' FROM '.$this->tablas['usuarios'].';';
				break;
			case 'usuarios_pax':
				$this->LINE = __LINE__+1;
				$this->query = 'SELECT * FROM '.$this->tablas['usuarios']
					.' ORDER BY nome ASC'
					.' LIMIT '.intval($a1).', '.intval($a2).';';
				break;
			case 'usuario':
				$this->query = 'SELECT * FROM '.$this->tablas['usuarios']
					.' WHERE id = "'.intval($a1).'"'
					.' LIMIT 1;';
				break;
			case 'raices_usuario':
				$this->LINE = __LINE__+1;
				$this->query = 'SELECT '.$this->tablas['raices'].'.id, '.$this->tablas['raices'].'.nome'
					.', '.$this->tablas['r_u'].'.id_usuario as relacion'
					.' FROM ('.$this->tablas['usuarios'].', '.$this->tablas['raices'].')'
					.' LEFT JOIN '.$this->tablas['r_u']
						.' ON ('.$this->tablas['r_u'].'.id_raiz = '.$this->tablas['raices'].'.id'
						.' AND '.$this->tablas['r_u'].'.id_usuario = '.$this->tablas['usuarios'].'.id)'
					.' WHERE '.$this->tablas['usuarios'].'.id = "'.intval($a1).'"'
					.' ORDER BY '.$this->tablas['raices'].'.nome ASC;';
				break;
			case 'existe_usuario':
				$this->LINE = __LINE__+1;
				$this->query = 'SELECT id FROM '.$this->tablas['usuarios']
					.' WHERE usuario LIKE "'.$a1.'"'
					.(empty($a2)?'':' AND id != "'.intval($a2).'"')
					.' LIMIT 1;';
				break;
			case 'existe_grupo':
				$this->LINE = __LINE__+1;
				$this->query = 'SELECT id FROM '.$this->tablas['grupos']
					.' WHERE nome LIKE "'.$a1.'"'
					.(empty($a2)?'':' AND id != "'.intval($a2).'"')
					.' LIMIT 1;';
				break;
			case 'grupos':
				$this->LINE = __LINE__+1;
				$this->query = 'SELECT * FROM '.$this->tablas['grupos']
					.' ORDER BY nome ASC;';
				break;
			case 'grupos_total':
				$this->LINE = __LINE__+1;
				$this->query = 'SELECT COUNT(*) as total'
					.' FROM '.$this->tablas['grupos'].';';
				break;
			case 'grupos_pax':
				$this->LINE = __LINE__+1;
				$this->query = 'SELECT * FROM '.$this->tablas['grupos']
					.' ORDER BY nome ASC'
					.' LIMIT '.intval($a1).', '.intval($a2).';';
				break;
			case 'grupo':
				$this->LINE = __LINE__+1;
				$this->query = 'SELECT * FROM '.$this->tablas['grupos']
					.' WHERE id = "'.intval($a1).'"'
					.' LIMIT 1;';
				break;
			case 'usuarios_grupo':
				$this->LINE = __LINE__+1;
				$this->query = 'SELECT id, nome'
			 		.' FROM '.$this->tablas['usuarios']
					.' WHERE id_grupo = "'.intval($a1).'"'
					.' ORDER BY nome ASC;';
				break;
			case 'configuracions':
				$this->LINE = __LINE__+1;
				$this->query = 'SELECT * FROM '.$this->tablas['confs']
					.' ORDER BY conf ASC;';
				break;
			case 'configuracions_valen':
				$this->LINE = __LINE__+1;
				$this->query = 'SELECT * FROM '.$this->tablas['confs']
					.' WHERE vale = "1"'
					.' ORDER BY conf ASC;';
				break;
			case 'configuracion':
				$this->LINE = __LINE__+1;
				$this->query = 'SELECT * FROM '.$this->tablas['confs']
					.' WHERE id = "'.intval($a1).'"'
					.' LIMIT 1;';
				break;
			case 'configuracion_raices':
				$this->LINE = __LINE__+1;
				$this->query = 'SELECT '.$this->tablas['raices'].'.id as id_raiz'
					.', '.$this->tablas['raices'].'.nome as raiz'
					.', '.$this->tablas['grupos'].'.id as id_grupo'
					.', '.$this->tablas['grupos'].'.nome as grupo'
			 		.' FROM '.$this->tablas['r_g_c'].', '.$this->tablas['raices']
					.', '.$this->tablas['grupos']
					.' WHERE '.$this->tablas['r_g_c'].'.id_conf = "'.intval($a1).'"'
					.' AND '.$this->tablas['raices'].'.id = '.$this->tablas['r_g_c'].'.id_raiz'
					.' AND '.$this->tablas['grupos'].'.id = '.$this->tablas['r_g_c'].'.id_grupo'
					.' ORDER BY '.$this->tablas['raices'].'.nome ASC;';
				break;
			case 'configuracion_grupos':
				$this->LINE = __LINE__+1;
				$this->query = 'SELECT id, nome'
					.' FROM '.$this->tablas['grupos']
					.' WHERE id_conf = "'.intval($a1).'"'
					.' ORDER BY nome ASC;';
				break;
			case 'configuracion_nome':
				$this->LINE = __LINE__+1;
				$this->query = 'SELECT *'
					.' FROM '.$this->tablas['confs']
					.' WHERE conf = "'.$a1.'"'
					.' LIMIT 1;';
				break;
			case 'grupos_configuracions_usuarios':
				$this->LINE = __LINE__+1;
				$this->query = 'SELECT '.$this->tablas['grupos'].'.id as id_grupo'
					.', '.$this->tablas['grupos'].'.nome as grupo'
					.', '.$this->tablas['confs'].'.id as id_conf'
					.', '.$this->tablas['confs'].'.conf as conf'
					.', '.$this->tablas['usuarios'].'.id as id_usuario'
					.', '.$this->tablas['usuarios'].'.nome as usuario'
					.' FROM '.$this->tablas['grupos'].', '.$this->tablas['confs']
					.', '.$this->tablas['usuarios']
					.' WHERE '.$this->tablas['usuarios'].'.id_grupo = '.$this->tablas['grupos'].'.id'
					.' AND '.$this->tablas['confs'].'.id = '.$this->tablas['grupos'].'.id_conf'
					.' ORDER BY '.$this->tablas['grupos'].'.id'
					.', '.$this->tablas['usuarios'].'.id_grupo'
					.', '.$this->tablas['usuarios'].'.nome;';
				break;
			case 'grupos_configuracions_usuarios_raiz':
				$this->LINE = __LINE__+1;
				$this->query = 'SELECT '.$this->tablas['grupos'].'.id as id_grupo'
					.', '.$this->tablas['grupos'].'.nome as grupo'
					.', '.$this->tablas['confs'].'.id as id_conf'
					.', '.$this->tablas['confs'].'.conf as conf'
					.', '.$this->tablas['usuarios'].'.id as id_usuario'
					.', '.$this->tablas['usuarios'].'.nome as usuario'
					.', '.$this->tablas['r_u'].'.id_raiz as relacion'
					.' FROM ('.$this->tablas['grupos'].', '.$this->tablas['confs']
					.', '.$this->tablas['usuarios'].', '.$this->tablas['r_g_c'].')'
					.' LEFT JOIN '.$this->tablas['r_u']
						.' ON ('.$this->tablas['r_u'].'.id_raiz = "'.intval($a1).'"'
						.' AND '.$this->tablas['r_u'].'.id_usuario = '.$this->tablas['usuarios'].'.id)'
					.' WHERE '.$this->tablas['r_g_c'].'.id_raiz = "'.intval($a1).'"'
					.' AND '.$this->tablas['grupos'].'.id = '.$this->tablas['r_g_c'].'.id_grupo'
					.' AND '.$this->tablas['confs'].'.id = '.$this->tablas['r_g_c'].'.id_conf'
					.' AND '.$this->tablas['usuarios'].'.id_grupo = '.$this->tablas['grupos'].'.id'
					.' ORDER BY '.$this->tablas['grupos'].'.id'
					.', '.$this->tablas['usuarios'].'.id_grupo'
					.', '.$this->tablas['usuarios'].'.nome;';
				break;
			case 'w:usuario':
				$this->query = 'SELECT * FROM '.$this->tablas['usuarios']
					.' WHERE '.$this->tablas['usuarios'].'.id = "'.$this->id_usuario.'"'
					.' AND '.$this->tablas['usuarios'].'.usuario = BINARY("'.$this->usuario.'")'
					.' AND '.$this->tablas['usuarios'].'.contrasinal = BINARY("'.$this->contrasinal.'")'
					.' AND '.$this->tablas['usuarios'].'.estado = 1'
					.' LIMIT 1;';
				break;
			case 'w:usuarios_raiz':
				$this->LINE = __LINE__+1;
				$this->query = 'SELECT '.$this->tablas['usuarios'].'.id, '.$this->tablas['usuarios'].'.email'
					.' FROM '.$this->tablas['usuarios'].', '.$this->tablas['r_u']
					.' WHERE '.$this->tablas['r_u'].'.id_raiz = "'.intval($a1).'"'
					.' AND '.$this->tablas['usuarios'].'.id = '.$this->tablas['r_u'].'.id_usuario'
					.' AND '.$this->tablas['usuarios'].'.estado = 1'
					.' AND '.$this->tablas['usuarios'].'.email != "";';
				break;
			default:
				$this->query = '';
				return 0;
				break;
		}

		$this->lock($this->tablas, 'READ');
		$this->serializa();
		$this->unlock();

		return $this->filas();
	}

	/**
	* function accion (string $modo, mixed $a1, mixed $a2, mixed $a3)
	*
	* Realiza una accion predefinida
	*/
	function accion ($modo, $a1='', $a2='', $a3='') {
		$a1 = $this->corrixe($a1);
		$a2 = $this->corrixe($a2);
		$a3 = $this->corrixe($a3);

		switch ($modo) {
			case 'conf_eliminar':
				$this->LINE = __LINE__+1;
				$this->query = 'DELETE FROM '.$this->tablas['confs']
					.' WHERE id = "'.$a1.'"'
					.' LIMIT 1;';
				$this->actualizar($this->query);

				$this->LINE = __LINE__+1;
				$this->query = 'DELETE FROM '.$this->tablas['r_g_c']
					.' WHERE id_conf = "'.$a1.'";';
				break;
			case 'conf_crear':
				$this->LINE = __LINE__+1;
				$this->query = 'INSERT INTO '.$this->tablas['confs']
					.' SET conf = "'.$a1.'"'
					.', vale = "1";';
				$this->actualizar($this->query);

				return $this->id_ultimo();
				break;
			case 'mantemento_raiz':
				$this->LINE = __LINE__+1;
				$this->query = 'UPDATE '.$this->tablas['raices']
					.' SET mantemento = "'.date('Y-m-d').'"'
					.' WHERE id = "'.intval($a1).'"'
					.' LIMIT 1;';
				break;
			case 'mantemento_usuario':
				$this->LINE = __LINE__+1;
				$this->query = 'UPDATE '.$this->tablas['usuarios']
					.' SET mantemento = "'.date('Y-m-d').'"'
					.' WHERE id = "'.intval($a1).'"'
					.' LIMIT 1;';
				break;
			case 'estado':
				$this->LINE = __LINE__+1;
				$this->query = 'UPDATE '.$this->tabla($a1)
					.' SET estado = "'.intval($a2).'"'
					.' WHERE id = "'.$a3.'"'
					.' LIMIT 1;';
				break;
			case 'peso':
				$this->LINE = __LINE__+1;
				$this->query = 'UPDATE '.$this->tablas['raices']
					.' SET peso_actual = "'.$a1.'"'
					.' WHERE id = "'.intval($a2).'"'
					.' LIMIT 1;';
				break;
			default:
				return;
		}

		$this->actualizar($this->query);
	}

	/**
	* function tabla (string $cal)
	*
	* devuelve el nombre de una tabla asociada con el indice $tabla
	*
	* return string
	*/
	function tabla ($cal) {
		return $this->tablas[$cal];
	}

	/**
	* function garda_rexistro (string $donde, boolean $estado)
	*
	* guarda registro de los usuarios que acceden para crear
	* la comprobación de sesion y guarda registro también de
	* los intentos fallidos y en donde fallaron
	*
	* return boolean
	*/
	function garda_rexistro ($donde, $estado) {
		$this->LINE = __LINE__+1;
		$this->query = 'SELECT COUNT(id) as cnt'
			.' FROM '.$this->tablas['accesos'].';';

		$this->lock($this->tablas, 'READ');
		$this->serializa();
		$this->unlock();

		if (intval($this->get('cnt')) >= 1000) {
			$this->LINE = __LINE__+1;
			$this->query = 'DELETE FROM '.$this->tablas['accesos']
				.' ORDER BY id ASC'
				.' LIMIT 500;';

			$this->lock($this->tablas['accesos']);
			$this->actualizar($this->query);
			$this->unlock();
		}

		$this->LINE = __LINE__+1;
		$query = 'INSERT INTO '.$this->tablas['accesos'].' SET'
			.' login = "'.$this->usuario.'"'
			.', ip = "'.$this->vars->ip().'"'
			.', donde = "'.$donde.'"'
			.', estado = "'.$estado.'"'
			.', session = "'.addslashes(session_id()).'"'
			.', data = "'.time().'"'
			.', ultimo = "'.time().'";';

		$this->lock($this->tablas['accesos']);
		$ok = $this->actualizar($query);
		$this->unlock();

		return $ok;
	}

	/**
	* function login (string $campo)
	*
	* función que devuelve el valor de los campos de login según
	* se defina en los ficheros de configuración
	*/
	function login ($nome) {
		$metodo = $this->conf->g('login:metodo');
		$campo = $this->conf->g('login:'.$nome);

		if ($metodo && $campo) {
			if ($metodo == 'session' && !$this->sesion_iniciada) {
				$this->sesion_iniciada = true;
				@session_start();
			}

			if ($nome == 'contrasinal' && !$this->conf->g('login:encriptada')) {
				if (strstr($campo, '[')) {
					$datos = $this->vars->{$metodo}('');
					eval('$datos = $datos'.$campo.';');
					return md5($datos);
				} else {
					return md5($this->vars->{$metodo}($campo));
				}
			} else {
				if (strstr($campo, '[')) {
					$datos = $this->vars->{$metodo}('');
					eval('$datos = $datos'.$campo.';');
					return $datos;
				} else {
					return $this->vars->{$metodo}($campo);
				}
			}
		}
	}

	/**
	* function informe (string $where)
	*
	* Consulta sobre accesos de usuarios
	*/
	function informe ($where) {
		$this->LINE = __LINE__+1;
		$this->query = 'SELECT * FROM '.$this->tablas['accesos'].' '.$where;

		$this->lock($this->tablas['accesos'], 'READ');
		$this->serializa();
		$this->unlock();
	}

	/**
	* function nova_contrasinal (void)
	*
	* Comproba que o usuairo pode cambiar o contrasinal
	*
	* return boolean
	*/
	function nova_contrasinal () {
		$usuario = $this->corrixe($this->vars->post('recuperar_usuario'));

		$this->LINE = __LINE__+1;
		$this->query = 'SELECT email, estado, cambiar_datos'
			.' FROM '.$this->tablas['usuarios']
			.' WHERE usuario = "'.$usuario.'"'
			.' LIMIT 1;';

		$this->lock($this->tablas['usuarios'], 'READ');
		$this->serializa();
		$this->unlock();

		if ($this->filas() != 1) {
			return 2;
		}

		if ($this->get('cambiar_datos') != 1) {
			return 5;
		}

		if ($this->get('email') == '') {
			return 3;
		}

		if ($this->get('estado') != 1) {
			return 4;
		}

		if ($this->get('email') != $this->vars->post('recuperar_email')) {
			return 2;
		}

		return 1;
	}

	/**
	* function contrasinal_temporal (void)
	*
	* Genera una contraseña temporal para su futura activación
	*/
	function contrasinal_temporal () {
		$salt = 'ACDEFGHKLMNPQRSTUVWXYZabchefghkmnpqrstuvwxyz2345679';
		$novo = '';
		$i = 0;

		srand((double)microtime()*1000000);

		while ($i <= 7) {
			$num = rand(0, strlen($salt)-1);
			$tmp = substr($salt, $num, 1);
			$novo = $novo.$tmp;
			$i++;
		}

		$usuario = $this->corrixe($this->vars->post('recuperar_usuario'));
		$email = $this->corrixe($this->vars->post('recuperar_email'));

		$this->LINE = __LINE__+1;
		$this->query = 'UPDATE '.$this->tablas['usuarios']
			.' SET contrasinal_tmp = "'.md5($novo).'"'
			.' WHERE usuario = "'.$usuario.'"'
			.' LIMIT 1;';

		$this->lock($this->tablas['usuarios']);
		$this->actualizar($this->query);
		$this->unlock();

		$url = parse_url($this->vars->server('HTTP_REFERER'));
		$url['scheme'] = empty($url['scheme'])?'http':$url['scheme'];

		mail($email,
			PFN_quitaHtmlentities($this->conf->t('novo_contrasinal_correo_asunto')),
			PFN_quitaHtmlentities($this->conf->t('novo_contrasinal_correo_texto'))
				.' '.$novo
				."\n\n".$url['scheme'].'://'.getenv('SERVER_NAME').dirname(getenv('SCRIPT_NAME'))
				.'/activar_contrasinal.php',
			'FROM: '.$this->conf->g('email'));
	}

	/**
	* function activar_contrasinal (string $usuario, string $contrasinal)
	*
	* Comprueba si los datos actuales son correctos y si esta permitido el cambio
	*	en caso afirmativo, actualiza la contraseña.
	*
	* return boolean
	*/
	function activar_contrasinal ($usuario, $contrasinal) {
		$usuario = $this->corrixe($usuario);
		$contrasinal = $this->corrixe($contrasinal);

		$this->LINE = __LINE__+1;
		$this->query = 'SELECT id'
			.' FROM '.$this->tablas['usuarios']
			.' WHERE usuario = "'.$usuario.'"'
			.' AND cambiar_datos = 1'
			.' AND contrasinal_tmp = "'.$contrasinal.'"'
			.' AND estado = 1'
			.' AND email != ""'
			.' LIMIT 1;';

		$this->lock($this->tablas['usuarios'], 'READ');
		$this->serializa();
		$this->unlock();

		if ($this->filas() != 1) {
			return false;
		}

		$this->LINE = __LINE__+1;
		$this->query = 'UPDATE '.$this->tablas['usuarios']
			.' SET contrasinal = contrasinal_tmp'
			.', contrasinal_tmp = ""'
			.' WHERE id = "'.$this->get('id').'"'
			.' LIMIT 1;';

		$this->lock($this->tablas['usuarios']);
		$this->actualizar($this->query);
		$this->unlock();

		return true;
	}

	/**
	* function cambiar_preferencias (array $datos)
	*
	* Lanza la consulta para el cambio de preferencias de un usuario
	*
	* return boolean
	*/
	function cambiar_preferencias ($datos) {
		$nome = $this->corrixe($datos['nome']);
		$contrasinal = $this->corrixe($datos['contrasinal']);
		$email = $this->corrixe($datos['email']);

		$this->LINE = __LINE__+1;
		$this->query = 'UPDATE '.$this->tablas['usuarios']
			.' SET nome = "'.$nome.'"'
			.', email = "'.$email.'"'
			.(empty($contrasinal)?'':(', contrasinal = "'.$contrasinal.'"'))
			.' WHERE id = "'.$this->id_usuario.'"'
			.' AND usuario = "'.$this->usuario.'"'
			.' AND contrasinal = "'.$this->contrasinal.'"'
			.' LIMIT 1;';

		$this->lock($this->tablas['usuarios']);
		$this->actualizar($this->query);
		$this->unlock();
	}
}

$PFN_usuarios = new PFN_Usuarios($PFN_conf);
?>
