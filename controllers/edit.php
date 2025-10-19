<?php

function edit()
{
    if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
        die("Erreur critique : ID non spécifié ou invalide dans l'URL.");
    }

    $id_a_modifier = (int)$_GET['id'];
    $show = showPost($id_a_modifier);
    $showCategory = showCategory($show);
    $categories = getCategory();
    
    if (isset($_POST['valide'])) {
        if ((isset($_POST['nom']) && isset($_POST['category'])) && (isset($_POST['console']) && isset($_POST['prix'])) && (isset($_POST['joueur_max']) && isset($_POST['commentaires']))) {
            $post_data = array(
                'nom'           => $_POST['nom'],
                'category'      => $_POST['category'],
                'console'       => $_POST['console'],
                'prix_nbr'      => $_POST['prix'],
                'joueur_max'    => $_POST['joueur_max'],
                'commentaires'  => $_POST['commentaires'],
                'id'            => $_POST['id']
            );
            editPost($post_data);
        }
        header('Location: index.php');
    }

    require('template/edit.php');
}
