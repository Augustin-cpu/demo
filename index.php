<?php
session_start();

require_once('classes/MyAutoload.php');
require_once('lib/config.php');
MyAutoload::start();

$request = $_GET['page'];
$routeur = new Routeur($request);
$routeur->renderController();

