<?php
$title = "Affichage ajoute des jeux";
ob_start();
?>
<div class="row">
    <?= Flash() ?>
    <form method="post" class="col-lg-8" enctype="multipart/form-data">
        <a href="?page=logout" role="button" class="text-decoration-none btn btn-primary">Deconnexion</a>
        <h1 class="display-4">formulaire</h1>

        <div class="form-group mt-2">
            <input type="text" name="nom" placeholder="nom" class="form-control">
        </div>
        <div class="form-group mt-2">
            <select name="category" class="form-select">
                <option selected="selected">Choisissez le proprietaire</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['id'] ?>"><?= $category['prenom'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group mt-2">
            <input type="text" name="console" placeholder="console" class="form-control">
        </div>
        <div class="form-group mt-2">
            <input type="number" name="prix" placeholder="prix de jeux" class="form-control">
        </div>
        <div class="form-group mt-2">
            <input type="number" name="joueur_max" placeholder="Nombre des joueurs" class="form-control">
        </div>
        <div class="form-group mt-2">
            <textarea name="commentaires" placeholder="Commentaires" class="form-control"></textarea>
        </div>
        <div class="form-group mt-2">
            <label for="image_file">Sélectionner une image :</label>
            <input type="file" name="image_file" id="image_file" class="form-control" required>
        </div>
        <input type="submit" name="valide" class="btn btn-primary mt-2" value="Soumettre le formulaire">
    </form>
    <div class="container col-lg-4 p-2">

        <?php
        foreach ($posts as $post) { ?>
            <div class="d-flex gap-3">
                <div class="d-flex">
                    <?php if(!$post['image']):?>
                    <img src="https://placehold.co/400" alt="icon" style="width: 25px; height: 25px" class="rounded-circle mt-1">
                    <?php else:?>
                    <img src="uploads/<?=$post['image']?>" alt="icon" style="width: 25px; height: 25px" class="rounded-circle mt-1">
                    <?php endif;?>
                    <h5 class="display-6 fs-4 p-0 m-0"><?= $post['nom'] ?></h5>
                </div>
                <a href="?page=edit&id=<?php echo $post['id']; ?>" class="text-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                    </svg>
                </a>
                <a href="?page=delete&id=<?= $post['id'] ?>" class="text-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                    </svg>
                </a>
            </div>
            <div class="d-flex gap-2 p-0 ms-4">
                <p class="text-danger p-0 m-0"><?= $post['console'] ?></p>
                <p class="text-success p-0 m-0">Prix :<?= $post['prix_nbr'] ?></p>
            </div>
            <p class="text-secondary p-0 ms-4"><?= $post['prenom'] ?></p>
            <p class="lead p-0 ms-4"><?= $post['commentaires'] ?></p>
        <?php
        } ?>
    </div>
</div>
<?php $content = ob_get_clean();
require('layout.php');
?>