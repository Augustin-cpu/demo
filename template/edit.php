<?php
$title = "Modification des jeux";
ob_start();
?>
<div class="container p-2">
    <form method="post" class="col-lg-8">
        <input type="hidden" name="id" value='<?= $show['id'] ?>'>
        <input type="hidden" name="old_image_name" value="<?=$show['image']?>">


        <h1 class="display-6">Modification des <?= $showCategory['prenom'] ?></h1>
        <div class="form-group mt-2">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" value="<?= $show['nom'] ?>" class="form-control">
        </div>
        <div class="form-group mt-2">
            <label for="possesseur" class="form-label">Possesseur</label>
            <select name="category" class="form-select" id="possesseur">
                <option selected="selected">Choisissez le proprietaire</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['id'] ?>"><?= $category['prenom'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group mt-2">
            <label for="nom" class="form-label">Console</label>
            <input type="text" name="console" value="<?= $show['console'] ?>" class="form-control">
        </div>
        <div class="form-group mt-2">
            <label for="nom" class="form-label">Prix</label>
            <input type="text" name="prix" value="<?= $show['prix_nbr'] ?>" class="form-control">
        </div>
        <div class="form-group mt-2">
            <label for="nom" class="form-label">Nombre des joueurs</label>
            <input type="text" name="joueur_max" value="<?= $show['joueur_max'] ?>" class="form-control">
        </div>
        <div class="form-group mt-2">
            <label for="nom" class="form-label">Commentaires</label>
            <textarea name="commentaires" class="form-control"><?= $show['commentaires'] ?></textarea>
        </div>
        <div class="form-group mt-2">
            <label for="new_image" class="form-label">Nouvelle Image (optionnel) :</label>
            <input type="file" name="new_image" id="new_image" class="form-control">
        </div>
        <button type="submit" name="valide" class="btn btn-primary mt-2">Soumettre le formulaire</button>
        <a href="home.html" role="button" class="text-decoration-none btn btn-dark mt-2">Revenir</a>
    </form>
</div>
<?php $content = ob_get_clean();
require('layout.php');
?>