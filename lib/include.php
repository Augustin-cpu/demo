<?php
session_start();


require_once('lib/config.php');
include('model/fonction.php');
require_once('controllers/index.php');
require_once('controllers/login.php');
require_once('controllers/logout.php');
require_once('controllers/edit.php');
require_once('controllers/delete.php');
require_once('lib/session.php');