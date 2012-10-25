ALTER IGNORE TABLE accesos MODIFY estado tinyint(1) unsigned NOT NULL default '0';

ALTER IGNORE TABLE arquivos MODIFY id smallint(9) unsigned NOT NULL auto_increment;
ALTER IGNORE TABLE arquivos MODIFY arquivo varchar(245) NOT NULL default '';
ALTER IGNORE TABLE arquivos MODIFY id_directorio smallint(6) unsigned NOT NULL default '0';

ALTER IGNORE TABLE arquivos_campos_palabras MODIFY id_arquivo smallint(9) unsigned NOT NULL default '0';
ALTER IGNORE TABLE arquivos_campos_palabras MODIFY id_palabra smallint(9) unsigned NOT NULL default '0';

ALTER IGNORE TABLE configuracions MODIFY vale tinyint(1) unsigned NOT NULL default '1';

ALTER IGNORE TABLE directorios MODIFY id smallint(9) unsigned NOT NULL auto_increment;
ALTER IGNORE TABLE directorios MODIFY directorio varchar(245) binary NOT NULL default '';
ALTER IGNORE TABLE directorios MODIFY id_raiz integer(10) unsigned NOT NULL default '0';

ALTER IGNORE TABLE grupos MODIFY estado tinyint(1) unsigned NOT NULL default '0';

ALTER IGNORE TABLE palabras MODIFY id smallint(9) unsigned NOT NULL auto_increment;

ALTER IGNORE TABLE raices MODIFY estado tinyint(1) unsigned NOT NULL default '0';

ALTER IGNORE TABLE usuarios MODIFY email varchar(50) NOT NULL default '';
ALTER IGNORE TABLE usuarios MODIFY estado tinyint(1) unsigned NOT NULL default '0';
ALTER IGNORE TABLE usuarios ADD contrasinal_tmp varchar(50) NOT NULL default '';
ALTER IGNORE TABLE usuarios ADD cambiar_datos tinyint(1) unsigned NOT NULL default '1';
