<?php
define('ROOT_PATH', dirname(__DIR__));
define('CONTROLLERS',ROOT_PATH.'/controllers/');
define('MODEL',ROOT_PATH.'/model/');
define('TEMPLATE',ROOT_PATH.'/template/');
define('CLASSES',ROOT_PATH.'/classes/');
define('HELPERS',ROOT_PATH.'/helpers/');
define('LIB',ROOT_PATH.'/lib/');
define('ASSETS',ROOT_PATH.'/assets/');

// Definition de la connectivite a la base de donnees
define('DB_SERVER', 'localhost');
define('DB_PASSWORD','root');
define('DB_USERNAME','root');
define('DB_NAME','demo');
define('PDO_DSN','mysql:host='.DB_SERVER.';dbname='.DB_NAME);