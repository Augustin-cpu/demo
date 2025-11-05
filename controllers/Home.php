<?php

class Home
{
    public function showHome($params)
    {
        // // Vérifie si l'identifiant (user_id) EST DANS la session.
        if (!isset($_SESSION['Auth']['id'])) {
            // Redirection immédiate vers la page de connexion
            // setFlash('Vous été maintenant deconnecté', 'danger');
            header('Location: ?page=login');
            exit;
        }

        // Si le script arrive ici, l'utilisateur est connecté.
        // $current_user_id = $_SESSION['Auth']['id'];
        $bdd = new Database();
        if (isset($_POST['valide'])) {
            if ((isset($_POST['nom']) && isset($_POST['category'])) && (isset($_POST['console']) && isset($_POST['prix'])) && (isset($_POST['joueur_max']) && isset($_POST['commentaires']))) {

               $files = new Image($_FILES['image_file']);
               $new_filename = $files->validateFile();

                $post_data = array(
                    'nom' => $_POST['nom'],
                    'console' => $_POST['console'],
                    'prix_nbr' => $_POST['prix'],
                    'joueur_max' => $_POST['joueur_max'],
                    'commentaires' => $_POST['commentaires'],
                    'category' => $_POST['category'],
                    'image'     => $new_filename
                );
                
                $bdd->addPost($post_data);
            }
        }
        $post = $bdd->getPost();
        $category = $bdd->getCategory();
        $myView = new View('home');
        $myView->render([
            'posts'      => $post,
            'categories' => $category]);
    }

    public function showEdit($params)
    {
        extract($params);
        $bdd = new Database();
        $url = new HttpHelpers('home');
        if (!isset($id) || !ctype_digit($id)) {
            die("Erreur critique : ID non spécifié ou invalide dans l'URL.");
        }

        $id = (int)$id;
        $show = $bdd->showPost($id);
        
        if (isset($_POST['valide'])) {
            if (isset($_POST)) {
                if(!isset($_POST['new_image'])){
                    $post_data = array(
                    'nom'           => $_POST['nom'],
                    'category'      => $_POST['category'],
                    'console'       => $_POST['console'],
                    'prix_nbr'      => $_POST['prix'],
                    'joueur_max'    => $_POST['joueur_max'],
                    'commentaires'  => $_POST['commentaires'],
                    'id'            => $_POST['id']
                );
                $bdd->editPost($post_data);
                $url->redirect();

                }
                $post_data = array(
                    'nom'           => $_POST['nom'],
                    'image'         => $_POST['new_image'],
                    'category'      => $_POST['category'],
                    'console'       => $_POST['console'],
                    'prix_nbr'      => $_POST['prix'],
                    'joueur_max'    => $_POST['joueur_max'],
                    'commentaires'  => $_POST['commentaires'],
                    'id'            => $_POST['id']
                );
                $bdd->editPost($post_data);
                $url->redirect();
            }
        }
        $showCategory = $bdd->showCategory($show);
        $categories = $bdd->getCategory();

        $myView = new View('edit');
        $myView->render([
            'show'       => $show,
            'showCategory'   => $showCategory,
            'categories' => $categories
        ]);
    }
    public function Delete($params)
    {  
        extract($params);
        $url = new HttpHelpers('home');
        $manager = new Database(); 
        if (!isset($id) || !ctype_digit($id)) {
                die("Erreur critique : ID non spécifié ou invalide dans l'URL.");
            } else {
                $id = (int)$id;
                $manager->deletePost($id);
                $url->redirect();
            }
    }
    
}
