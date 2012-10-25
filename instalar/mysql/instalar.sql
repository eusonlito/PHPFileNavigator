DROP TABLE IF EXISTS accesos;
CREATE TABLE IF NOT EXISTS accesos (
	id integer(10) unsigned NOT NULL auto_increment,
	login varchar(50) NOT NULL default '',
	ip varchar(15) NOT NULL default '',
	estado tinyint(1) unsigned NOT NULL default '0',
	donde varchar(50) NOT NULL default '',
	session varchar(100) default NULL,
	data int(10) unsigned NOT NULL default '0',
	ultimo int(10) unsigned NOT NULL default '0',
	PRIMARY KEY (id)
) TYPE=MyISAM;

DROP TABLE IF EXISTS arquivos;
CREATE TABLE IF NOT EXISTS arquivos (
	id int(10) unsigned NOT NULL auto_increment,
	arquivo varchar(245) binary NOT NULL default '',
	id_directorio int(10) unsigned NOT NULL default '0',
	PRIMARY KEY (id),
	UNIQUE KEY arquivo (arquivo,id_directorio)
) TYPE=MyISAM;

DROP TABLE IF EXISTS arquivos_campos_palabras;
CREATE TABLE IF NOT EXISTS arquivos_campos_palabras (
	id_arquivo int(10) unsigned NOT NULL default '0',
	id_campo smallint(6) unsigned NOT NULL default '0',
	id_palabra int(10) unsigned NOT NULL default '0',
	PRIMARY KEY (id_arquivo,id_campo,id_palabra)
) TYPE=MyISAM;

DROP TABLE IF EXISTS bloqueo_ip;
CREATE TABLE IF NOT EXISTS bloqueo_ip (
	ip varchar(20) NOT NULL default '',
	PRIMARY KEY (ip)
) TYPE=MyISAM;

DROP TABLE IF EXISTS campos;
CREATE TABLE IF NOT EXISTS campos (
	id smallint(6) unsigned NOT NULL auto_increment,
	campo varchar(50) NOT NULL default '',
	PRIMARY KEY (id),
	UNIQUE KEY campo (campo)
) TYPE=MyISAM;

DROP TABLE IF EXISTS configuracions;
CREATE TABLE IF NOT EXISTS configuracions (
	id smallint(6) unsigned NOT NULL auto_increment,
	conf varchar(50) NOT NULL default '',
	vale tinyint(1) unsigned NOT NULL default '1',
	PRIMARY KEY (id)
) TYPE=MyISAM;

DROP TABLE IF EXISTS configuracions_datos;
CREATE TABLE IF NOT EXISTS configuracions_datos (
	campo varchar(50) NOT NULL default '',
	valor varchar(50) NOT NULL default '',
	id_conf smallint(6) unsigned NOT NULL default '0',
	PRIMARY KEY (id_conf,campo)
) TYPE=MyISAM;

DROP TABLE IF EXISTS directorios;
CREATE TABLE IF NOT EXISTS directorios (
	id int(10) unsigned NOT NULL auto_increment,
	directorio varchar(245) binary NOT NULL default '',
	id_raiz smallint(6) unsigned NOT NULL default '0',
	PRIMARY KEY (id),
	UNIQUE KEY directorio (directorio,id_raiz)
) TYPE=MyISAM;

DROP TABLE IF EXISTS grupos;
CREATE TABLE IF NOT EXISTS grupos (
	id smallint(6) unsigned NOT NULL auto_increment,
	nome varchar(50) NOT NULL default '',
	id_conf smallint(6) unsigned NOT NULL default '0',
	estado tinyint(1) unsigned NOT NULL default '0',
	PRIMARY KEY (id)
) TYPE=MyISAM;

DROP TABLE IF EXISTS palabras;
CREATE TABLE IF NOT EXISTS palabras (
	id int(10) unsigned NOT NULL auto_increment,
	palabra varchar(100) NOT NULL default '',
	PRIMARY KEY (id),
	UNIQUE KEY palabra (palabra)
) TYPE=MyISAM;

DROP TABLE IF EXISTS raices;
CREATE TABLE IF NOT EXISTS raices (
	id smallint(6) unsigned NOT NULL auto_increment,
	nome varchar(50) NOT NULL default '',
	path varchar(255) NOT NULL default '',
	web varchar(255) NOT NULL default '',
	host varchar(255) NOT NULL default '',
	estado tinyint(1) unsigned NOT NULL default '0',
	mantemento date NOT NULL default '0000-00-00',
	peso_maximo bigint(20) unsigned NOT NULL default '0',
	peso_actual bigint(20) unsigned NOT NULL default '0',
	PRIMARY KEY (id)
) TYPE=MyISAM;

DROP TABLE IF EXISTS raices_grupos_configuracions;
CREATE TABLE IF NOT EXISTS raices_grupos_configuracions (
	id_raiz smallint(6) unsigned NOT NULL default '0',
	id_grupo smallint(6) unsigned NOT NULL default '0',
	id_conf smallint(6) unsigned NOT NULL default '0',
	PRIMARY KEY (id_raiz,id_grupo)
) TYPE=MyISAM;

DROP TABLE IF EXISTS raices_usuarios;
CREATE TABLE IF NOT EXISTS raices_usuarios (
	id_raiz smallint(6) unsigned NOT NULL default '0',
	id_usuario smallint(6) unsigned NOT NULL default '0',
	PRIMARY KEY (id_raiz,id_usuario)
) TYPE=MyISAM;

DROP TABLE IF EXISTS sesions;
CREATE TABLE IF NOT EXISTS sesions (
	id varchar(45) NOT NULL default '',
	tempo int(10) unsigned NOT NULL default '0',
	contido text NOT NULL,
	ip varchar(20) NOT NULL default '',
	PRIMARY KEY (id)
) TYPE=MyISAM;

DROP TABLE IF EXISTS usuarios;
CREATE TABLE IF NOT EXISTS usuarios (
	id smallint(6) unsigned NOT NULL auto_increment,
	nome varchar(50) NOT NULL default '',
	usuario varchar(50) NOT NULL default '',
	contrasinal varchar(50) NOT NULL default '',
	contrasinal_tmp varchar(50) NOT NULL default '',
	email varchar(50) NOT NULL default '',
	estado tinyint(1) unsigned NOT NULL default '0',
	admin tinyint(1) unsigned NOT NULL default '0',
	id_grupo smallint(6) unsigned NOT NULL default '0',
	mantemento date NOT NULL default '0000-00-00',
	descargas_maximo bigint(20) unsigned NOT NULL default '0',
	cambiar_datos tinyint(1) unsigned NOT NULL default '1',
	PRIMARY KEY (id),
	UNIQUE KEY usuario (usuario)
) TYPE=MyISAM;

