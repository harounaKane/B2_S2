
<h2>liste User</h2>

<a href="?action=create" class="m-3">Ajouter</a>

<table class="table table-striped table-hover">
    <tr class="table-dark">
        <th>Id</th>
        <th>Login</th>
        <th>Password</th>
        <th>Action</th>
    </tr>

    <tr>
        <?php foreach($utilisateurs as $user): ?>
            <tr>
                <td> <?= $user->getId(); ?> </td>
                <td> <?= $user->getLogin(); ?> </td>
                <td> <?= $user->getMdp(); ?> </td>
                <td>
                    <a href="?action=deleteUser&id=<?= $user->getId(); ?>">Delete</a>
                    <a href="?action=updateUser&id=<?= $user->getId(); ?>">Update</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tr>
</table>