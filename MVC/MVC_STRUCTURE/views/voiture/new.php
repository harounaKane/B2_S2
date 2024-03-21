
<h2>Ajjouter un véhicule</h2>

<form action="" method="post">
    <input type="hidden" name="id" value="<?= isset($user) ? $user->getid() : '' ?>">
    <div>
        <label for="">Marque</label>
        <input type="text" name="marque" value="<?= isset($user) ? $user->getLogin() : '' ?>">
    </div>
    <div>
        <label for="">Prix</label>
        <input type="number" name="prix" value="">
    </div>

    <div>
        <label for="">Proprio</label>
        <select name="user" id="">
            <?php foreach($proprios as $proprio): ?>
                <option value="<?= $proprio->getId(); ?>"><?= $proprio->getlogin(); ?></option>
            <?php endforeach; ?>

        </select>
    </div>
    <input type="submit">
</form>
