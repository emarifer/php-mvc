<?php

require_once '../config/database.php';

require_once '../autoload.php';

require_once '../routes/web.php';

/*
https://www.w3schools.com/php/keyword_callable.asp
https://www.php.net/manual/es/reserved.variables.server.php
https://www.php.net/manual/en/language.types.callable.php
https://www.youtube.com/watch?v=de_7k4SHEO0
https://www.php.net/manual/es/function.ob-start.php
https://www.php.net/manual/es/function.ob-get-clean.php
https://www.php.net/manual/es/function.extract.php

===========================================================

https://blog.ahierro.es/como-configurar-virtual-hosts-en-apache-y-ubuntu/

https://beamtic.com/rewrite-everything-to-php

https://stackoverflow.com/questions/8595964/redirect-all-traffic-to-index-php-using-mod-rewrite

https://serverfault.com/questions/1094447/htaccess-mod-rewrite-not-catching-all-rewriterules

https://www.google.com/search?q=php+apache+rewrite+to+index.php+whatever+the+url+is&oq=php&aqs=chrome.0.69i59l3j69i57j69i59j69i60l3.42546j0j7&sourceid=chrome&ie=UTF-8
https://www.google.com/search?q=php+apache+redirect+to+index.php+whatever+the+url+is&oq=php&aqs=chrome.1.69i59l3j69i57j69i59j69i60l3.4421j0j7&sourceid=chrome&ie=UTF-8
*/

/* 
10 PASOS PARA LA CONFIGURACIÓN DE UN ÚNICO PUNTO DE ACCESO/HOST VIRTUAL/DOMINIO LOCAL EN LINUX-UBUNTU/APACHE2:

-1. En /etc/apache2/sites-available crear una copia del fichero 000-default.conf:

sudo cp 000-default.conf mvc.test.conf

-2. Con el editor vim modicar el fichero recien creado:

vim mvc.test.conf

-3. Copiar el siguiente código:

<VirtualHost *:80>
	# The ServerName directive sets the request scheme, hostname and port that
	# the server uses to identify itself. This is used when creating
	# redirection URLs. In the context of virtual hosts, the ServerName
	# specifies what hostname must appear in the request's Host: header to
	# match this virtual host. For the default virtual host (this file) this
	# value is not decisive as it is used as a last resort host regardless.
	# However, you must set it for any further virtual host explicitly.
	ServerName mvc.test

	ServerAdmin webmaster@localhost
	DocumentRoot /var/www/html/php-dev/mvc.test/public/

	# Available loglevels: trace8, ..., trace1, debug, info, notice, warn,
	# error, crit, alert, emerg.
	# It is also possible to configure the loglevel for particular
	# modules, e.g.
	#LogLevel info ssl:warn

	ErrorLog ${APACHE_LOG_DIR}/error.log
	CustomLog ${APACHE_LOG_DIR}/access.log combined

	# For most configuration files from conf-available/, which are
	# enabled or disabled at a global level, it is possible to
	# include a line for only one particular virtual host. For example the
	# following line enables the CGI configuration for this host only
	# after it has been globally disabled with "a2disconf".
	#Include conf-available/serve-cgi-bin.conf 

    <Directory /var/www/html/php-dev/mvc.test/public>
    #     Options FollowSymLinks -MultiViews
         AllowOverride All
    #     Order allow,deny
    #     allow from all
    </Directory>
</VirtualHost>

-4. Guardar los cambios pasando el password de superusuario:

:w !sudo tee %
(VER: https://www.cyberciti.biz/faq/vim-vi-text-editor-save-file-without-root-permission/)

-5. Crear el enlace simbólico en la carpeta sites-enabled/ con el comando:

sudo a2ensite mvc.test.conf

-6. Crear un dominio local en el fichero /etc/hosts con el editor vim:

127.0.0.1	localhost
127.0.1.1	enrique-LMint
127.0.0.1	mvc.test <== <==



# The following lines are desirable for IPv6 capable hosts
::1     ip6-localhost ip6-loopback
fe00::0 ip6-localnet
ff00::0 ip6-mcastprefix
ff02::1 ip6-allnodes
ff02::2 ip6-allrouters

-7. Guardar con :w !sudo tee % pasando el password de superusuario. VER:

(https://www.cyberciti.biz/faq/vim-vi-text-editor-save-file-without-root-permission/)

-8. Si en php info vemos que no está habilitado el mod_rewrite en PHP/Apache,
habilitarlo con el comando:

sudo a2enmod rewrite

-9. Crear en la carpeta public/ del proyecto un fichero .htaccess con este contenido:

<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Send Requests To Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>

## Copiado de la carpeta public/ de una aplicación laravel ##

-10. Reiniciar Apache:

sudo systemctl restart apache2
*/
