<?php
require('lib/config.php');
MyAutoload::start();

$request = $_GET['page'];
$routeur = new Routeur($request);
$routeur->renderController();

