<div class="container-fluid py-4"> 
    <div class="row">
        
        <form method="post" class="col-12 col-lg-5 p-3" enctype="multipart/form-data">
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="display-6 fw-bold m-0">Créer un Post</h1>
                <a href="?page=logout" role="button" class="btn btn-danger btn-sm">Déconnexion</a>
            </div>

            <div class="mb-3">
                <label for="nom" class="form-label visually-hidden">Nom du Jeu</label>
                <input type="text" name="nom" placeholder="Nom du Jeu / Titre" class="form-control form-control-lg border-0 border-bottom">
            </div>
            
            <div class="mb-3">
                <label for="category" class="form-label visually-hidden">Propriétaire</label>
                <select name="category" class="form-select form-select-lg">
                    <option selected disabled>Choisissez le Propriétaire</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['id'] ?>"><?= htmlspecialchars($category['prenom']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label for="console" class="form-label visually-hidden">Console</label>
                    <input type="text" name="console" placeholder="Console" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="joueur_max" class="form-label visually-hidden">Joueurs Max</label>
                    <input type="number" name="joueur_max" placeholder="Nombre de joueurs max" class="form-control">
                </div>
            </div>

            <div class="mb-3">
                <label for="prix" class="form-label visually-hidden">Prix</label>
                <input type="number" name="prix" placeholder="Prix du jeu (en €)" class="form-control">
            </div>

            <div class="mb-3">
                <label for="commentaires" class="form-label visually-hidden">Commentaires</label>
                <textarea name="commentaires" placeholder="Description / Commentaires" class="form-control" rows="3"></textarea>
            </div>

            <div class="mb-4">
                <label for="image_file" class="form-label">Image de couverture (Miniature) :</label>
                <input type="file" name="image_file" id="image_file" class="form-control" required>
            </div>
            
            <input type="submit" name="valide" class="btn btn-primary btn-lg w-100" value="Soumettre le Post">
        </form>

        <div class="col-12 col-lg-7 p-3 border-start">
            <h2 class="h4 mb-4 text-secondary">Liste des Posts Récents</h2>
            
            <?php
            foreach ($posts as $post) { ?>
                <div class="d-flex gap-3 mb-4 p-2 rounded hover-bg-light"> 
                    
                    <div class="flex-shrink-0">
                        <?php 
                        $image_src = $post['image'] ? 'uploads/' . htmlspecialchars($post['image']) : 'https://placehold.co/168x94?text=Miniature';
                        ?>
                        <img src="<?= $image_src ?>" alt="Miniature" class="rounded" style="width: 168px; height: 94px; object-fit: cover;">
                    </div>
                    
                    <div class="flex-grow-1">
                        <h3 class="h6 fw-semibold m-0 mb-1 text-truncate" title="<?= htmlspecialchars($post['nom']) ?>">
                            <?= htmlspecialchars($post['nom']) ?>
                        </h3>
                        
                        <div class="text-secondary small mb-1">
                            <span class="text-danger fw-medium"><?= htmlspecialchars($post['console']) ?></span> &middot; 
                            Prix: <span class="text-success"><?= htmlspecialchars($post['prix_nbr']) ?> €</span> &middot; 
                            Propriétaire: <?= htmlspecialchars($post['prenom']) ?>
                        </div>

                        <p class="text-muted small mb-1 text-truncate" style="max-height: 2.5em;">
                            <?= htmlspecialchars(mb_substr($post['commentaires'], 0,60)),'...' ?>
                        </p>
                        
                        <div class="d-flex gap-3 mt-2">
                             <div class="d-flex align-items-center">
                                <?php 
                                // Simuler une image de profil pour l'auteur (style YouTube)
                                $icon_src = $post['image'] ? 'uploads/' . htmlspecialchars($post['image']) : 'https://placehold.co/24x24/CCCCCC/FFFFFF?text=A';
                                ?>
                                <img src="<?= $icon_src ?>" alt="icon" style="width: 24px; height: 24px" class="rounded-circle me-2">
                            </div>
                            
                            <a href="?page=edit/id/<?php echo $post['id']; ?>" class="text-primary text-decoration-none small">
                                Éditer
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                </svg>
                            </a>
                            <a href="?page=delete/id/<?= $post['id'] ?>" class="text-danger text-decoration-none small">
                                Supprimer
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <hr>
            <?php
            } ?>
        </div>
    </div>
</div>