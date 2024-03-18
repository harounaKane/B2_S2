<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title> <?= $title ?? 'Intro MVC' ?> </title>
</head>
<body>

    <header class="bg-light p-4">
        <a href="?action=article" class="btn btn-outline-success">Article</a>
        <a href="?action=categorie" class="btn btn-outline-success">Catégorie</a>
        <a href="?action=client" class="btn btn-outline-success">Client</a>
        <a href="?action=client" class="btn btn-outline-success">Facture</a>
    </header>

    <main class="container-fluid">
        <?= $content ?? 'Veuillez nommer "$content" votre variable' ?>
    </main>

    <footer class="bg-light p-4 mt-5 text-center">
        &copy; Intro MVC
    </footer>
</body>
</html>