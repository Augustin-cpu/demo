<?php
// Fichier : logout.php

function logout()
{
    // Suppression des variables de session
    $_SESSION = array();

    session_destroy();
    // Redirection vers l'accueil ou la page de connexion
    header('Location: ?page=login');
    exit;
}
