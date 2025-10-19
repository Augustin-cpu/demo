<?php

if (isset($_POST) && !empty($_POST['login']) && !empty($_POST['pass'])) {
    extract($_POST);
    $pass = sha1($pass);
    $bdd = database();
    $req = $bdd->prepare('SELECT * FROM users WHERE pass = :pass AND login = :login');
    $req->execute(array(
        'pass' => $pass,
        'login' => $login
    ));
    if ($req->rowCount() > 0) {
        $_SESSION['Auth'] = $req->fetch();
        // setFlash('Vous étés maintenant connecté');
        header('Location: index.php');
    }
}

// Le reste de login.php affiche le formulaire et l'éventuel $error_message
require_once('template/login.php');
