<?php
include "Livre.php";
include "Bibliotheque.php";

$pdo = new PDO("mysql:host=localhost;dbname=B2_biblio", "root", "");

if(isset($_POST['envoyer'])){
    
    if(!empty($_POST['nom']))
    {
        $b = new Bibliotheque($_POST['nom']);

      //  $sql = "INSERT INTO bibliotheque(nom) VALUES(:nom)";
        $sql = "INSERT INTO bibliotheque VALUES(NULL, :nom)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["nom" => $b->getNom()]);

        header("location: biblio.php");
        exit;

    }
}

$sql = "SELECT * FROM bibliotheque";

$stat = $pdo->prepare($sql);
$stat->execute();

$biblios = [];

while($res = $stat->fetch()){
    $b = new Bibliotheque($res['nom']);
    $b->setId($res["id"]);
    $biblios[] = $b;
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

    <a href="biblio.php">Biblio</a>
    <a href=".">Livre</a>

    <h1>Bibliothèque</h1>

    <form action="" method="post">
        <label for="nom">nom de la bilbio</label>
        <input type="text" name="nom">
        <button name="envoyer">envoyer</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach($biblios as $b): ?>
                <tr>
                    <td><?= $b->getId()?></td>
                    <td><?= $b->getNom()?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</body>
</html>