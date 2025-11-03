<?php

class Auth
{
    public function AuthUsers()
    {
        $bdd = new Database();
        if (isset($_POST) && !empty($_POST)) {
            extract($_POST);
            // $pass = sha1($pass);
            $datas = [
                'pass' => $pass,
                'mail' => $mail
            ];

            $toggle = $bdd->auth($datas);
            if(isset($toggle)){
                header('Location: ?page=home');
            }
        }

        $myView = new View('login');
        $myView->render();
        // Le reste de login.php affiche le formulaire et l'éventuel $error_message
        // require_once('template/login.php');
    }
    public function LogoutUsers()
    {
        // Suppression des variables de session
        $_SESSION = array();

        session_destroy();
        // Redirection vers l'accueil ou la page de connexion
        header('Location: ?page=login');
        exit;
    }
    public function ShowRegister(){
        $myView = new View('register');
        $myView->render();
    }
}
