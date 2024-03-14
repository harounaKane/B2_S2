<?php ob_start();  $title = "liste article"; ?>

<h2>Article liste</h2>

<a href="?action=articleAdd">Ajouter</a>

<table class="table table-striped table-hover">
    <tr class="table-dark">
        <th>Id</th>
        <th>Libellé</th>
        <th>Prix</th>
        <th>Description</th>
        <th>Action</th>
    </tr>

    <tr>
        <?php foreach($articles as $art): ?>
            <tr>
                <td> <?= $art->getId(); ?> </td>
                <td> <?= $art->getLibelle(); ?> </td>
                <td> <?= $art->getPrix(); ?> </td>
                <td> <?= $art->getDescription(); ?> </td>
                <td>
                    <a href="?action=deleteArticle&id=<?= $art->getId(); ?>">Delete</a>
                    <a href="?action=updateArticle&id=<?= $art->getId(); ?>">Update</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tr>
</table>

<?php 
$content = ob_get_clean();
include "views/template.php";