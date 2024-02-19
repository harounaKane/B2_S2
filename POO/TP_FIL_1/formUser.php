<?php

    include "classes/Personne.php";

    if(isset($_POST['prenom'])){

        $bd = new PDO("mysql:host=127.0.0.1;dbname=b2_user", "root", "");

        $p = new Personne(0, $_POST['sexe'], $_POST['prenom'], $_POST['nom'], $_POST['age']);

        $query = "INSERT INTO personne VALUES(NULL, ?, ?, ?, ?)";
        $stmt = $bd->prepare($query);

        $stmt->execute([$p->getSexe(), $p->getPrenom(), $p->getNom(), $p->getAge()]);

        header("location: .");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav>
        <a href="formUser.php">Ajouter Personne</a>
    </nav>  

    <form action="" method="post">

        <input type="radio" name="sexe" value="femme">
        <label for="">Femme</label>
        <input type="radio" name="sexe" value="homme">
        <label for="">Homme</label>
        <br>
        <label for="">Prénom</label>
        <input type="text" name="prenom">

        <br>
        
        <label for="">Nom</label>
        <input type="text" name="nom">
        <br>
        
        <label for="">Age</label>
        <input type="number" name="age">
        <br>
        <button>Envoyer</button>
    </form>

</body>
</html>