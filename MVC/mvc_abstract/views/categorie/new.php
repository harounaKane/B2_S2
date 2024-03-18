<?php ob_start(); ?>
<h2>Ajouter Catégorie</h2>

<form action="" method="post">
    <input type="hidden" name="id" value="<?= !empty($categorieToUp) ? $categorieToUp->getId() : ''; ?>">
    <div>
        <label for="">Nom</label>
        <input type="text" name="nom" value="<?= !empty($categorieToUp) ? $categorieToUp->getnom() : ''; ?>">
    </div>

    <input type="submit">
</form>

<?php 
$content = ob_get_clean();
include "views/template.php";