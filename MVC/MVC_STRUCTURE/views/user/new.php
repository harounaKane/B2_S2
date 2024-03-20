
<h2>inscription</h2>

<form action="" method="post">
    <input type="hidden" name="id" value="<?= isset($user) ? $user->getid() : '' ?>">
    <div>
        <label for="">Login</label>
        <input type="text" name="login" value="<?= isset($user) ? $user->getLogin() : '' ?>">
    </div>
    <div>
        <label for="">password</label>
        <input type="password" name="mdp" value="">
    </div>

    <input type="submit">
</form>
