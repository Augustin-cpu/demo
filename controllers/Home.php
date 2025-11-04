<?php

class Home
{
    public function showHome()
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

                $target_dir = "uploads/";
                // S'assurer que le dossier 'uploads' existe et est accessible en écriture
                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }

                // Le tableau $_FILES contient les informations du fichier
                $file_info = $_FILES["image_file"];

                // Chemin du fichier temporaire sur le serveur
                $tmp_file = $file_info["tmp_name"];

                // -----------------------------------------------------------
                // 2. Mesures de SÉCURITÉ et de VALIDATION
                // -----------------------------------------------------------

                // A. Vérifier les erreurs de téléchargement
                if ($file_info["error"] !== UPLOAD_ERR_OK) {
                    $message = "Erreur lors du téléchargement. Code : " . $file_info["error"];
                }

                // B. Vérifier la taille du fichier (ex: max 5 Mo)
                if ($file_info["size"] > 5000000) {
                    $message = "Désolé, votre fichier est trop volumineux (max 5 Mo).";
                }

                // C. Vérifier le type de fichier (mime type)
                $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
                $file_type = mime_content_type($tmp_file); // Méthode plus fiable que $file_info["type"]

                if (!in_array($file_type, $allowed_types)) {
                    $message = "Seuls les fichiers JPG, PNG et GIF sont autorisés.";
                }

                // -----------------------------------------------------------
                // 3. Déplacement du Fichier et Enregistrement
                // -----------------------------------------------------------

                if (!isset($message)) {
                    // Générer un nom de fichier unique et sécurisé pour éviter les collisions
                    $file_extension = pathinfo($file_info["name"], PATHINFO_EXTENSION);
                    $new_filename = uniqid('img_', true) . '.' . $file_extension;
                    $target_file = $target_dir . $new_filename;

                    // Déplacer le fichier du répertoire temporaire vers le répertoire permanent
                    if (move_uploaded_file($tmp_file, $target_file)) {
                        $message = "Le fichier " . htmlspecialchars($file_info["name"]) . " a été téléchargé avec succès.";
                    }
                }

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

    public function showEdit()
    {
        $bdd = new Database();
        if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Erreur critique : ID non spécifié ou invalide dans l'URL.");
        }

        $id_a_modifier = (int)$_GET['id'];
        $show = $bdd->showPost($id_a_modifier);
        
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
            }
            header('Location: ?page=home');
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
    public function Delete()
    {

        
        $manager = new Database(); 
        if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
                die("Erreur critique : ID non spécifié ou invalide dans l'URL.");
            } else {
                $id_delete = (int)$_GET['id'];
                $manager->deletePost($id_delete);
                header('Location: ?page=home');
            }
    }
    
}
