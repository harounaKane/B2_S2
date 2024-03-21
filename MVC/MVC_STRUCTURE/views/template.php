<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>MVC STRUCTURE</title>
</head>
<body>

    <header class="p-4 mb-3 bg-light">
        <nav>
            <?php if(isset($_SESSION['user'])) : ?>
            <a href="?action=lireUsers" class="btn btn-outline-success">User</a>
            <a href="?action=voitures" class="btn btn-outline-success">Voiture</a>
            <a href="?action=logout" class="btn btn-outline-danger">Logout</a>

            <?php else : ?>
            <a href="?action=create" class="btn btn-outline-success">Logon</a>
            <a href="?action=login" class="btn btn-outline-success">Login</a>
            <?php endif; ?>
            
        </nav>
        <?php if(isset($_SESSION['SUCCESS']) ): ?>   
            <div class="alert alert-success"><?= $_SESSION['SUCCESS']; ?>  </div> 
        <?php endif; ?>   

    </header>

    <main class="container-fluid">
        <?= $content ?? "" ?>
    </main>

    <footer class="text-center p-3 bg-light mt-5">
        &copy; - ILCI
    </footer>
    <?php unset($_SESSION['SUCCESS']); ?>  
</body>
</html>