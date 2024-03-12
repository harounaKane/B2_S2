<?php include "views/header.php" ?>

<h2>Article liste</h2>

<table>
    <tr>
        <th>Id</th>
        <th>Libellé</th>
        <th>Prix</th>
        <th>Action</th>
    </tr>

    <tr>
        <?php foreach($articles as $art): ?>
            <tr>
            <td> <?= $art->getId(); ?> </td>
            <td> <?= $art->getLibelle(); ?> </td>
            <td> <?= $art->getPrix(); ?> </td>
            <td>
                <a href="?action=article&type=delete&id=<?= $art->getId(); ?>">Delete</a>
                <a href="?action=article&type=update&id=<?= $art->getId(); ?>">Delete</a>
            </td>
            </tr>
        <?php endforeach; ?>
    </tr>
</table>