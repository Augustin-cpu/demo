<?php

class Auth
{
    public function AuthUsers()
    {
        $bdd = new Database();
        if (isset($_POST) && !empty($_POST)) {
            extract($_POST);
            $pass = sha1($pass);
            $datas = [
                'pass' => $pass,
                'mail' => $mail
            ];

            $toggle = $bdd->auth($datas);
            if (isset($toggle)) {
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
    public function ShowRegister()
    {

        $bdd = new Database();
        if (isset($_POST) && !empty($_POST)) {
            $pass = $_POST['pass'];
            $email = $_POST['email'];
            $confirmPass = $_POST['confirm_pass'];

            $datas = [
                'mail'   => $email,
                'pass'   => sha1($pass),
            ];
            if ($confirmPass == $pass) {
                $bdd->AddUser($datas);
            }
            $result = $bdd->auth($datas);
            if ($result) {
                header('Location: ?page=home');
                exit;
            }
        }else{
            echo 'Pas information valide';
        }
        $myView = new View('register');
        $myView->render();
    }
}
