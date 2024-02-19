<?php

include "classes/Personne.php";
include "classes/Voiture.php";

$bd = new PDO("mysql:host=127.0.0.1;dbname=b2_user", "root", "");

$stmt = $bd->prepare("SELECT * FROM personne");
$stmt->execute();

$personnes = [];

while($res = $stmt->fetch()){
    extract($res); // => $id, $sexe, $prenom, $nom, $age
    $personnes[] = new Personne($id, $sexe, $prenom, $nom, $age);
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

    <table>
        <tr>
            <th>ID</th>
            <th>Sexe</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Âge</th>
            <th>Action</th>
        </tr>

        <?php foreach($personnes as $personne): ?>
            <tr>
                <td> <?= $personne->getId();?> </td>
                <td> <?= $personne->getSexe(); ?> </td>
                <td> <?= $personne->getPrenom(); ?> </td>
                <td> <?= $personne->getNom(); ?> </td>
                <td> <?= $personne->getAge(); ?> </td>
                <td>
                    <a href="formUserUp.php?action=up&id=<?= $personne->getId();?>">UP</a>
                    - 
                    <a href="formUserUp.php?action=del&id=<?= $personne->getId();?>">X</a>
                </td>
            </tr>
        <?php endforeach; ?>


    </table>

</body>
</html>
