<?php ob_start(); ?>
<h2>Article liste</h2>

<a href="?action=categorieAdd">Ajouter</a>

<table class="table table-striped table-hover">
    <tr class="table-dark">
        <th>Id</th>
        <th>Nom</th>
        <th>Action</th>
    </tr>

    <tr>
        <?php foreach($categories as $cat): ?>
            <tr>
                <td> <?= $cat->getId(); ?> </td>
                <td> <?= $cat->getNom(); ?> </td>
                <td>
                    <a href="?action=deleteCategorie&id=<?= $cat->getId(); ?>">Delete</a>
                    <a href="?action=updateCategorie&id=<?= $cat->getId(); ?>">Update</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tr>
</table>

<?php 
$content = ob_get_clean();
include "views/template.php";