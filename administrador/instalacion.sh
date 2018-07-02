#!/bin/sh
cd `dirname $0`
BASE_DIR=`pwd`

read -p "Ingrese el alias del proyecto para el apache. (Por Ejemplo alias=proyecto se ingresa http://localhost/proyecto) : " apache_alias

#creo el .conf
echo "#Proyecto: web
Alias /$apache_alias \"$BASE_DIR/web\"
<Directory \"$BASE_DIR/web/\">
	SetEnv PATH_BASE \"$BASE_DIR\"
	SetEnv SUFIX_CONTROLLER 		\"Controller\"
	SetEnv DIRECTORY_CONTROLLER  	\"Controllers\"
	SetEnv DIRECTORY_VIEW 			\"views\"
	SetEnv DIRECTORY_VIEW_LAYOUTS  	\"Views/layouts\"
	DirectoryIndex application.php

	AllowOverride None
	<IfModule !mod_authz_core.c>
		Order allow,deny
		Allow from all
	</IfModule>
	<IfModule mod_authz_core.c>
		Require all granted
	</IfModule>
</Directory>" > app.conf
echo "\n----------------------------------------------------------\n"
echo "Se crea el archivo $BASE_DIR/app.conf"

echo "\n----------------------------------------------------------\n"
echo "Correr :\n\t sudo ln -s $BASE_DIR/app.conf /etc/apache2/sites-enabled/$apache_alias.conf"
echo "Fin"
