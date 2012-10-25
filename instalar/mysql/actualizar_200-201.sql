ALTER IGNORE TABLE accesos MODIFY data integer(10) unsigned NOT NULL default '0';
ALTER IGNORE TABLE accesos MODIFY ultimo integer(10) unsigned NOT NULL default '0';

ALTER IGNORE TABLE arquivos MODIFY id int(10) unsigned NOT NULL auto_increment;
ALTER IGNORE TABLE arquivos MODIFY id_directorio int(10) unsigned NOT NULL default '0';

ALTER IGNORE TABLE arquivos_campos_palabras MODIFY id_arquivo int(10) unsigned NOT NULL default '0';
ALTER IGNORE TABLE arquivos_campos_palabras MODIFY id_palabra int(10) unsigned NOT NULL default '0';

ALTER IGNORE TABLE configuracions_datos MODIFY id_conf smallint(6) unsigned NOT NULL default '0';

ALTER IGNORE TABLE directorios MODIFY id int(10) unsigned NOT NULL auto_increment;
ALTER IGNORE TABLE directorios MODIFY directorio varchar(245) binary NOT NULL default '';
ALTER IGNORE TABLE directorios CHANGE id_path id_raiz smallint(6) unsigned NOT NULL default '0';

ALTER IGNORE TABLE grupos MODIFY id_conf smallint(6) unsigned NOT NULL default '0';

ALTER IGNORE TABLE palabras MODIFY id int(10) unsigned NOT NULL auto_increment;

ALTER IGNORE TABLE raices_grupos_configuracions MODIFY id_conf smallint(6) unsigned NOT NULL default '0';

ALTER IGNORE TABLE usuarios MODIFY email varchar(100) NOT NULL default '';
ALTER IGNORE TABLE usuarios MODIFY id_grupo smallint(6) unsigned NOT NULL default '0';
