<?php

$root =  $_SERVER['DOCUMENT_ROOT'];
$host = $_SERVER['HTTP_HOST'];

define('ROOT', $root.'demo/');
define('HOST', 'http://'.$host.'demo/');
define('CONTROLLERS', ROOT.'controllers/');
define('MODEL', ROOT.'model/');
define('TEMPLATE', ROOT.'controllers/');
define('LIBRAIRY', ROOT.'lib/');
define('UPLOADS', ROOT.'uploads/');
