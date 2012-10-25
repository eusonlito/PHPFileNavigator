<?php
return array(
	10 => 'INSERT INTO '.$form['db_prefixo'].'raices'
		.' (id,nome,path,web,host,estado) VALUES'
		.' (1,"'.$form['ra_nome'].'","'.$form['ra_path'].'","'.$form['ra_web'].'","'.$form['ra_dominio'].'",1);',
	20 => 'INSERT INTO '.$form['db_prefixo'].'grupos'
		.' (id,nome,id_conf,estado) VALUES'
		.' (1,"'.$PFN_conf->t('admins').'",3,1);',
	30 => 'INSERT INTO '.$form['db_prefixo'].'usuarios'
		.' (id,nome,usuario,contrasinal,email,estado,admin,id_grupo,cambiar_datos) VALUES'
		.' (1,"'.$form['ad_nome'].'","'.$form['ad_usuario'].'","'.md5($form['ad_contrasinal']).'","'.$form['ad_correo'].'",1,1,1,1);',
	40 => 'INSERT INTO '.$form['db_prefixo'].'configuracions'
		.' (id,conf,vale) VALUES'
		.' (1,"basicas",0), (2,"login",0), (3,"default",1);',
	50 => 'INSERT INTO '.$form['db_prefixo'].'raices_usuarios'
		.' (id_raiz,id_usuario) VALUES'
 		.' (1,1);',
	60 => 'INSERT INTO '.$form['db_prefixo'].'raices_grupos_configuracions'
		.' (id_raiz,id_grupo,id_conf) VALUES'
		.' (1,1,3);',
	70 => 'REPLACE INTO '.$form['db_prefixo'].'bloqueo_ip'
		.' SET ip = "0.0.0.0";',
);
?>
