<?php

class Database
{
    private $bdd;
    public function __construct()
    {
        try {
            $this->bdd = new PDO(PDO_DSN, DB_PASSWORD, DB_PASSWORD);
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Message error' . $e->getMessage());
        }
    }


    public function showPost($id)
    {
        $reponse = $this->bdd->prepare('SELECT * FROM jeux_video WHERE Id = :id ');
        $reponse->execute(array('id' => $id));
        return $reponse->fetch(PDO::FETCH_ASSOC);
    }
    public function showCategory($show)
    {

        $reponse = $this->bdd->prepare('SELECT * FROM proprietaire WHERE id = :id ');
        $reponse->execute(array('id' => $show['id_proprietaire']));
        return $reponse->fetch(PDO::FETCH_ASSOC);
    }


    public function addPost($post)
    {

        $reponse = $this->bdd->prepare('INSERT INTO jeux_video (image, id_proprietaire,nom,console,prix_nbr,joueur_max,commentaires) VALUES(:image,:id_proprietaire,:nom,:console,:prix_nbr,:joueur_max,:commentaires)');
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
    public function editPost(array $post)
    {
        try {

            $reponse = $this->bdd->prepare('UPDATE jeux_video SET nom = :nom, id_proprietaire = :category, console = :console, prix_nbr = :prix, joueur_max = :joueur_max, commentaires = :commentaires, image=:image WHERE id = :id');
            $reponse->execute(array(
                'nom'           => $post['nom'],
                'category'      => $post['category'],
                'console'       => $post['console'],
                'prix'          => $post['prix_nbr'],
                'joueur_max'    => $post['joueur_max'],
                'commentaires'  => $post['commentaires'],
                'image'         => $post['image'],
                'id'            => $post['id']
            ));
        } catch (Exception $e) {
            die('Erreur :' . $e->getMessage());
        }
    }

    public function getPost()
    {

        $req = $this->bdd->query(
            "SELECT jeux_video.id , jeux_video.image, jeux_video.nom, jeux_video.console, jeux_video.prix_nbr,jeux_video.joueur_max,jeux_video.commentaires,proprietaire.prenom 
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

    public function getCategory()
    {

        $req = $this->bdd->query('SELECT * FROM proprietaire');
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

    public function deletePost(int $id_delete)
    {
        try {

                $req = $this->bdd->prepare('DELETE FROM jeux_video WHERE Id = :id');
                $req->execute(array(
                    'id' => $id_delete
                ));
        } catch (Exception $e) {
            die('Erreur :' . $e->getMessage());
        }
    }

    public function auth(array $datas){

            $req = $this->bdd->prepare('SELECT * FROM users WHERE pass = :pass AND mail = :mail');
            $req->execute(array(
                'pass' => $datas['pass'],
                'mail' => $datas['mail']
            ));
            if ($req->rowCount() > 0) {
                $_SESSION['Auth'] = $req->fetch();
                // setFlash('Vous étés maintenant connecté');
                return true;
            }
            return false;
    }
}
