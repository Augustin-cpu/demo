<?php
function showPost($id)
{
    $bdd = database();
    $reponse = $bdd->prepare('SELECT * FROM jeux_video WHERE Id = :id ');
    $reponse->execute(array('id' => $id));
    return $reponse->fetch(PDO::FETCH_ASSOC);
}
function showCategory($show)
{   
    $bdd = database();
    $reponse = $bdd->prepare('SELECT * FROM proprietaire WHERE id = :id ');
    $reponse->execute(array('id' => $show['id_proprietaire']));
    return $reponse->fetch(PDO::FETCH_ASSOC);
}


function addPost($post)
{
    $bdd = database();
    $reponse = $bdd->prepare('INSERT INTO jeux_video (image, id_proprietaire,nom,console,prix_nbr,joueur_max,commentaires) VALUES(:image,:id_proprietaire,:nom,:console,:prix_nbr,:joueur_max,:commentaires)');
    $reponse->execute(array(
        'image' => $post['image'],
        'id_proprietaire' => $post['category'],
        'nom' => $post['nom'],
        'console' => $post['console'],
        'prix_nbr' => $post['prix_nbr'],
        'joueur_max' => $post['joueur_max'],
        'commentaires' => $post['commentaires'],
    ));
}
function editPost(array $post)
{
    try {
        $bdd = database();
        $reponse = $bdd->prepare('UPDATE jeux_video SET nom = :nom, id_proprietaire = :category, console = :console, prix_nbr = :prix, joueur_max = :joueur_max, commentaires = :commentaires, image=:image WHERE id = :id');
        $reponse->execute(array(
            'nom'           => $post['nom'],
            'category'           => $post['category'],
            'console'       => $post['console'],
            'prix'      => $post['prix_nbr'],
            'joueur_max'    => $post['joueur_max'],
            'commentaires'  => $post['commentaires'],
            'image'  => $post['image'],
            'id'            => $post['id']
        ));
    } catch (Exception $e) {
        die('Erreur :' . $e->getMessage());
    }
}

function getPost()
{
    $bdd = database();
    $req = $bdd->query("
        SELECT jeux_video.id,jeux_video.image, jeux_video.nom, jeux_video.console, jeux_video.prix_nbr,jeux_video.joueur_max,jeux_video.commentaires,proprietaire.prenom 
        FROM proprietaire 
        INNER JOIN jeux_video
        ON jeux_video.id_proprietaire = proprietaire.id 
        ");
    $posts = [];
    while ($row = $req->fetch()) {
        $post = [
            'id' => $row['id'],
            'image' => $row['image'],
            'nom' => $row['nom'],
            'prenom' => $row['prenom'],
            'console' => $row['console'],
            'prix_nbr' => $row['prix_nbr'],
            'joueur_max' => $row['joueur_max'],
            'commentaires' => $row['commentaires'],
        ];
        $posts[] = $post;
    }
    return $posts;
}

function getCategory()
{
    $bdd = database();
    $req = $bdd->query('SELECT * FROM proprietaire');
    $posts = [];
    while ($row = $req->fetch()) {
        $post = [
            'id' => $row['id'],
            'prenom' => $row['prenom'],
        ];
        $posts[] = $post;
    }
    return $posts;
}

function deletePost(int $id_delete)
{
    try {
        $bdd = database();
        if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Erreur critique : ID non spécifié ou invalide dans l'URL.");
        } else {
            $req = $bdd->prepare('DELETE FROM jeux_video WHERE Id = :id');
            $req->execute(array(
                'id' => $id_delete
            ));
            header('Location: index.php');
        }
    } catch (Exception $e) {
        die('Erreur :' . $e->getMessage());
    }
}

