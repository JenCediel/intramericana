<?php
/*Configurar */
define('host','localhost');
define('user','postgres');
define('pass','admin');
define('dbname','salvo');

/*MySQL*/
# define('connstring','mysql:host='.host.';dbname='.dbname.';charset=utf8');
/*pgSQL*/
define('connstring','pgsql:host='.host.';port=5432;dbname='.dbname);
?>