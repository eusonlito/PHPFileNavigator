DROP TABLE IF EXISTS bloqueo_ip;
CREATE TABLE IF NOT EXISTS bloqueo_ip (
	ip varchar(20) NOT NULL default '',
	PRIMARY KEY (ip)
) TYPE=MyISAM;

DROP TABLE IF EXISTS sesions;
CREATE TABLE IF NOT EXISTS sesions (
	id varchar(45) NOT NULL default '',
	tempo int(10) unsigned NOT NULL default '0',
	contido text NOT NULL,
	ip varchar(20) NOT NULL default '',
	PRIMARY KEY (id)
) TYPE=MyISAM;

ALTER IGNORE TABLE arquivos MODIFY id int(10) unsigned NOT NULL auto_increment;
ALTER IGNORE TABLE arquivos MODIFY id_directorio int(10) unsigned NOT NULL default '0';

ALTER IGNORE TABLE arquivos_campos_palabras MODIFY id_arquivo int(10) unsigned NOT NULL default '0';
ALTER IGNORE TABLE arquivos_campos_palabras MODIFY id_palabra int(10) unsigned NOT NULL default '0';

ALTER IGNORE TABLE directorios MODIFY id int(10) unsigned NOT NULL auto_increment;
ALTER IGNORE TABLE directorios MODIFY id_raiz smallint(6) unsigned NOT NULL default '0';

ALTER IGNORE TABLE palabras MODIFY id int(10) unsigned NOT NULL auto_increment;
