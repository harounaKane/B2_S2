<h2>Ajouter Article</h2>

<form action="" method="post">
    <input type="hidden" name="id" value="<?= !empty($articleUpdate) ? $articleUpdate->getId() : ''; ?>">
    <div>
        <label for="">Libellé</label>
        <input type="text" name="libelle" value="<?= !empty($articleUpdate) ? $articleUpdate->getLibelle() : ''; ?>">
    </div>
    <div>
        <label for="">Prix</label>
        <input type="number" name="prix" value="<?= !empty($articleUpdate) ? $articleUpdate->getPrix() : ''; ?>">
    </div>
    <div>
        <textarea name="description" id="" cols="30" rows="10"><?= !empty($articleUpdate) ? $articleUpdate->getDescription() : ''; ?></textarea>
    </div>

    <div>
        <select name="categorie" id="">
            <?php foreach($categories as $cat): ?>
                <option value="<?= $cat->getId() ?>"> <?= $cat->getNom() ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <input type="submit">
</form>