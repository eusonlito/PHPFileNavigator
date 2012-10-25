PHPfileNavigator version 2.3.2

Copyright (C) 2005 Lito : http://phpfilenavigator.litoweb.net

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

If you would like to colaborate on this proyect either translating it or finding bugs,
please contact me by email (phpfilenavigator@litoweb.net) or posting in the
web forum (http://phpfilenavigator.litoweb.net/phpBB2/)

Thaaaaaaaaaaaanks, Lito.

REQUERIMENTS

This application was tested on Windows XP and several Linux
distributions with PHP versions from 4.0.6 to 4.3.8, conditions which I would like to recomend
for setting it up. Besides from that, it has been also tested (only tested) with PHP 5.0.3.

The web server enviroment recommended are the Apache servers from 1.3.31 to 2.0 (and some older versions).
Some tests have been made with IIS servers.

In addition, a MySQL 4.0.* database is required for proper work with file and directory
indexation.

In order to get a full functionality, you should have the GD &gt;= 2.0.1 and the ZLIB libraries
installed in order to modify images and manage compressed files.

DOWNLOAD

You can always get a compressed file with the application on the download area of the web-site,
where you will also find translations and new utilities for the application as soon as they are done.

The newest version will always be in the PHPfileNavigator.zip file. In order to get it, you might want to try

wget http://phpfilenavigator.litoweb.net/PHPfileNavigator.zip

from a unix console.

INSTALATION

Before we proceed with the instalation, we must be sure that
the"data/conf/",
"data/logs/", "data/info/" and "tmp/" directories have writing
permissions for the useron which the web server depends on (it is
usually apache). Apart from that, when upgrading
from previous versions, the "data/conf/basicas.inc.php" file has to
have writing permissions.

By default, since the 1.5.8 version, english and spanish will be the available languages,
but the downloaded package also includes galician, dutch, italian, french and german in some zip files
inside the data/idiomas/ directory, which you will have to extract if you will to
use them.

The applications has different ways of installation and upgrading.

For a clean installation, you must fill the needed data for its execution:

Generic Data

Language: Language to use during the installation and when using PHPfileNavigator
GD2: If the GD2 libraries are available for the image treatment
ZLIB: If the ZLIB libraries are available for file compression
Charset: Depending on location, choose the correct one for proper visualization of the text characters

MySQL Connection Data

Host: The name of the server of the database(usually localhost)
Name: The name of the database(you need to create it)
User: A user with accces to that database(must have rights to create and modify tables)
Password: The password for that user
Prefix: A prefix to add to the tables to avoid rewriting previous ones

Administrator Data

Name: Full name of the administrator user
User: User name with which the access to the application will be made
Password: The password for the administrator
Repeat the Password: Repeat the password to avoid errors
E-mail: E-mail of the administrator for sending wrong access alerts

Main Root Data

Name: The name of the directory that wil be used as main root. It can be 
something like "Main Root", "Web Documents", ...
Absolute Path: The absolute path of the main root directory.
You must use "/" instead of "\"", and add a final "/". For example:
/var/www/html/documents/
Web Path: The absolute path of the web access. For example:
/documents/
Host: The associated domain to that path. If we are on a server which manages different domains,
it will allow us to associate each path to a different domain.

In the case that we already have a previous instalation of PHPfileNavigator, we will also
be able to choose between "Upgrading from a &lt;= 1.5.7 version" or
"Upgrading from a &gt; 2.0.0 version", where we will see the relation of roots, users and groups
to associate for installing the application without removing the content of the existing tables.

In future versions, upgrade will not be able if important modifications of the MySQL tables are made.

If we already have an installed version and we choose the "Install" option again, the data of the tables will be
removed.

The basic information for the installation (database access parameters, language, GD2, ZLIB, ...)
is saved on the data/conf/basicas.inc.php file that we might change if it is needed.

For a proper upgrade, the new instalation files must be extracted on top of the previous instalation files,
keeping a backup of the data/conf/default.inc.php file, on which the default preferences are saved. This
preferences might differ from one version to the other, so it is recommended to compare them both and
rewrite the new one adding the previous configuration parameters.

The most recommened thing to do is to create a second configuration file, once the application is installed,
and not to use the default one in any of the roots so we can avoid rewriting it in future versions.

Once the installer is executed, the "instalar/" directory must be removed. Otherwise the installer will appear
once again if we try to open the index page.

STRUCTURE

PHPfileNavigator is formed by the next structure:

PHPfileNavigator
|-- data
|   |-- accions
|   |-- conf
|   |-- idiomas
|   |   |-- en
|   |   `-- es
|   |-- include
|   |-- info
|   |-- logs
|   `-- plantillas
|-- estilos
|   `-- pfn
|       |-- ico
|       `-- imx
|-- instalar
|   |-- include
|   |-- mysql
|   `-- plantillas
|-- js
|-- tmp
`-- xestion
    |-- configuracions
    |-- grupos
    |-- indexador
    |-- informes
    |-- raices
    |-- traductor
    `-- usuarios

All the languages available (some compressed in zip) are located at "data/idiomas/".
In order to use them you will just need to extract them and change the main language in
"data/conf/basicas.inc.php".

The "data/conf/" directory contains the configuration files of each root. Just two of them
are included by default, the "basicas.inc.php" created after the installation and the 
"default.inc.php" which contains the behaviour configuration of each root. More than one root
might be related to just one configuration file, and you might create as many configuration files
as you will.

In order to modify the configuration files, you might use the administration area or you might
as well edit them from console or from any text editor.

The log files selected on every root configuration are located at"data/logs/".

Two log files are available by default: the MySQL error log , which is enabled by default
and stored at "data/logs/mysql.php", and the registry log for file and directory actions which
is disable by default.

The "instalar/" directory contains the installer and must be removed after proceeding with the
installation.

The administration of roots, users, groups, indexer, logs and the configuration editor are 
located at "xestion/".

FUNCTIONALITY

Basically PHPfileNavigator allows the remote navigation and administration of files and directories,
but it also has some extra utilities. Some of them are:

Aditional Information Files
PHPfileNavigator allows the creation of aditional information files for each
file or directory created. This possibility is activated by default, though you might
change this in the configuration file associated with the root by setting the "estado"
key under the "inc" position to false.

The search tool uses this functionality to search among the aditional information files
for certain fields.

Safe Enviroment
An strict control of the connected users is made by comparing each session data with the data
stored on the database.

The session data is encrypted. Even if we disable it, the stored data won't 
give any delicate or important information to a possible intruder in case of an 
attack.

The session data encryption is made with a unique key generated on each installation.

Indexation
It allows to  search files by its name, directory or the contained data from the aditional
information files.

The indexation is configurable for each root.

Web Access Control
If the directory or directories we are managing have web access, it will
allow us to control the access to them from the .htpasswd files, on which an 
user name and a password will be stored.

In order to activate this protection, we just need to click on the icon of
the directory that we want to protect and then choose the "Protect" option where
we will be asked to write the user name and password needed to access to the directory
via web. If we wish to remove this protection, we will just need to leave the fields 
with empty values.

This possibility is only available for the administrator user.

Tree View
PHPfileNavigator lets us see the content of a whole root in tree format. 
It also allows us to choose between just visualizing the directories or all
the content, showing information such as the tota size of the root and the
number of directories and files contained on it.

Download of Compressed Files and Directories
You have the possibility of downloading compressed versions of the files
or the directories in zip format.

File Extractions on the Server
Appart from the download of compressed files and directories, you have the possibility
of uploading tar,gz or bz files and extract them inside a remote directory. This
option is very useful when uploading a large number of files.

Size Control
A useful tool when the directory has public access is the limitation of the
weight of a root directory. This option will allow us to establish a limit that will not
be exceeded (neither by the administrator).

To configure this option, we have to access, logged in as the administrator, to the
root management and set the desired maximum weight, choosing the used unit.

Once this is done, the management will get the actual weight of the root and will
create a directoy at "data/info/" with the root id and two files, one of them with
the weight limit and the other with the actual weight, that will be updated as new
actions take place.

This control will be made for every action related with files or directories,
including the control on the files extracted on the server.

File Type Restrictions
PHPfileNavigator can limit the file types to be uploaded to the server.

For example, you can avoid uploading files with php, pl or any other extension 
that you think that might be used for non desired actions.

This control can be done for any kind of actions, from uploading files or
remote addresses, to renaming or extraction of a different file.

For example, if you are about to extract a tar.gz file and if it contains a
document with a non-allowed extension, it will avoid extracting it continuing
with the next files and showing a message saying that some files could not be
extracted because of the server restrictions.

Full Administration
PHPfileNavigator offers a complete administration for almost every possible
aspects.

The administrator(s) will have the possibility of creating roots, users, groups
or configuration files and establish the relation between them all.

Each root, user, group or configuration will be available for removal or desactivation
depending on the requirements.

Activity and Error Logs
From the administration area you will be able to visualize the logs for MYSQL errors,
file and directory actions and the user activities.

In addition, you will be able to see just a partial log from the full one. For example,
 to show all the files that have been removed, to find the actions made by an specific 
user or to show all the data of access attempts made by intruders.

Image Management
An strong point of the applications is the management and operation with images, that
will let us create personalized thumbnails of bigger images.

Appart from this, it will let us preview the thumbnails on the file listing, on the
tree view or on the image detail page.

In order to make this functionality to work, the GD2 option had have to be enabled 
durig the instalation.

Web Page or Document Upload
PHPfileNavigator let us upload any file available on the Internet to our server. In
order to do this, we will use the "Upload URL" option in the upper menu which will let us
save the content of an URL on the disk.

File Edition
Appart from the normal actions of every file manager(copy, move,
remove,...) PHPfileNavigator let us edit files online.
The editable file type is configurable by an extension array.
In adition, we will be able to just visualize its content.

Compressed File Content Visualization
With PHPfileNavigator you can list the content of the files compressed with ZIP/TAR/GZ,
showing details such as the name, weight, date, owner, group and persmissions.

These are just some of the multiple functions offered by this applications distributed under
the GPL License.

RECOMENDATIONS

ATENTION:
It is not recommended to use multiple roots over the same path or subpath because it might cause
problems with file indexing and with the size control.

Clearly, if we set two roots (one in /var/www/html/ and the other one in
/var/www/html/directory/) and then limit the weight on one of them (or both), while working on 
one of the roots the other one will not be notified when the data is modified, so the 
indexer will return wrong information and the size control will fail for not beeing able to
recognize correctly all the changes made.

DONATIONS

If you think that this tool might be useful for you and you wish its development to be continued,
please make a donation by clicking on the PAYPAL bottom on the top of this page.

THANKS to all of you who have collaborated on this project.
