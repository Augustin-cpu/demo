<div class="container py-5 d-flex justify-content-center">
    <form method="post" class="col-12 col-md-8 col-lg-6 p-4 bg-white rounded shadow-sm" enctype="multipart/form-data">
        
        <input type="hidden" name="id" value='<?= $show['id'] ?>'>
        <input type="hidden" name="old_image_name" value="<?=$show['image']?>">

        <h1 class="h4 fw-bold mb-4 border-bottom pb-2">
            Modification du post : **<?= htmlspecialchars($show['nom']) ?>**
        </h1>
        
        <div class="mb-4">
            <label class="form-label d-block fw-medium">Image Actuelle :</label>
            <?php if (!empty($show['image'])): ?>
                <img src="uploads/<?= htmlspecialchars($show['image']) ?>" alt="Image Actuelle" class="img-fluid rounded" style="max-height: 150px; object-fit: cover;">
            <?php else: ?>
                <p class="text-muted small">Aucune image n'a été trouvée.</p>
            <?php endif; ?>
        </div>
        
        <hr class="mb-4">

        <div class="mb-4">
            <label for="nom" class="form-label small fw-medium text-muted">Titre du Post</label>
            <input 
                type="text" 
                name="nom" 
                value="<?= htmlspecialchars($show['nom']) ?>" 
                class="form-control form-control-lg border-0 border-bottom rounded-0"
            >
        </div>
        
        <div class="mb-4">
            <label for="possesseur" class="form-label small fw-medium text-muted">Possesseur</label>
            <select name="category" class="form-select form-select-lg border-0 border-bottom rounded-0" id="possesseur">
                <option value="" disabled>Choisissez le Propriétaire</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['id'] ?>" <?= ($category['id'] == $show['id_proprietaire']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($showCategory['prenom']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="row g-3">
            <div class="col-md-6 mb-4">
                <label for="console" class="form-label small fw-medium text-muted">Console</label>
                <input 
                    type="text" 
                    name="console" 
                    value="<?= htmlspecialchars($show['console']) ?>" 
                    class="form-control border-0 border-bottom rounded-0"
                >
            </div>
            <div class="col-md-6 mb-4">
                <label for="joueur_max" class="form-label small fw-medium text-muted">Nombre de joueurs max</label>
                <input 
                    type="number" 
                    name="joueur_max" 
                    value="<?= htmlspecialchars($show['joueur_max']) ?>" 
                    class="form-control border-0 border-bottom rounded-0"
                >
            </div>
        </div>
        
        <div class="mb-4">
            <label for="prix" class="form-label small fw-medium text-muted">Prix</label>
            <input 
                type="number" 
                name="prix" 
                value="<?= htmlspecialchars($show['prix_nbr']) ?>" 
                class="form-control border-0 border-bottom rounded-0"
            >
        </div>
        
        <div class="mb-4">
            <label for="commentaires" class="form-label small fw-medium text-muted">Description / Commentaires</label>
            <textarea name="commentaires" rows="4" class="form-control border-0 border-bottom rounded-0"><?= htmlspecialchars($show['commentaires']) ?></textarea>
        </div>
        
        <div class="mb-4">
            <label for="new_image" class="form-label fw-medium">Nouvelle Image de Couverture (Optionnel)</label>
            <input type="file" name="new_image" id="new_image" class="form-control">
        </div>

        <hr>

        <div class="d-flex justify-content-end gap-3 mt-4">
            <a href="?page=home" role="button" class="btn btn-outline-secondary">
                Annuler
            </a>
            <button type="submit" name="valide" class="btn btn-primary">
                Enregistrer les modifications
            </button>
        </div>
    </form>
</div>