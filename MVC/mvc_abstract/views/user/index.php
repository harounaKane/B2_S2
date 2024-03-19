<?php ob_start(); 

$title = "la liste des utilisateur"; ?>

<table class="table table-striped table-hover">
    <tr class="table-dark">
        <th>Id</th>
        <th>username</th>
        <th>role</th>
        <th>Action</th>
    </tr>

    <tr>
        <?php foreach($utilisateurs as $user): ?>
            <tr>
                <td> <?= $user->getId(); ?> </td>
                <td> <?= $user->getUsername(); ?> </td>
                <td> <?= $user->getIsAdmin(); ?> </td>
                <td>
                    <a href="?action=deleteUser&id=<?= $user->getId(); ?>">Delete</a>
                    <a href="?action=updateUser&id=<?= $user->getId(); ?>">Update</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tr>
</table>



<?php
$content = ob_get_clean();
include "views/template.php"; 