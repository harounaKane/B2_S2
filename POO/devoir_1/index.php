<?php
include "Livre.php";
include "Bibliotheque.php";

function getBiblio($id){
    global $pdo;
    $stat2 = $pdo->prepare("SELECT * FROM bibliotheque WHERE id = ?");
    $stat2->execute([$id]);

    extract($stat2->fetch(PDO::FETCH_ASSOC));

    $b = new Bibliotheque($nom);
    $b->setId($id);

    return $b;
}

$pdo = new PDO("mysql:host=localhost;dbname=B2_biblio", "root", "");

if(isset($_POST['envoyer']))
{
    
    if(!empty($_POST['titre']))
    {
        $titre = $_POST['titre'];
        $auteur = $_POST['auteur'];
        $prix = $_POST['prix'];
        $année = $_POST['annee'];
        $editeur = $_POST['editeur'];
        $id_b = $_POST['id_biblio'];
        
        $b = getBiblio($id_b);

        $livre = new Livre($titre, $prix,$auteur ,$année, $editeur, $b);

        $sql = "insert into livre values(:titre, :prix, :auteur, :annee, :editeur, :biblio)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            "titre" => $livre->getTitre(),
            "auteur" => $livre->getAuteur(),
            "prix" => $livre->getPrix(),
            "annee" => $livre->getAnnee(),
            "editeur" => $livre->getEditeur(),
            "biblio" => $livre->getId_biblio()->getId()
        ]);

        header("location: .");
        exit;

    }
}

$sql = "SELECT * FROM livre";

$stat = $pdo->prepare($sql);
$stat->execute();

$livres = [];

while($res = $stat->fetch(PDO::FETCH_ASSOC)){

    extract($res);
    $b = getBiblio($id_biblio);


    $l = new Livre($titre, $prix, $auteur, $annee, $editeur, $b);
    $livres[] = $l;
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

    <h1>Livre</h1>

    <form action="" method="post">
        <label for="titre">titre</label>
        <input type="text" id="titre" name="titre">
        <label for="prix">prix</label>
        <input type="text" id="prix" name="prix">
        <label for="auteur">auteur</label>
        <input type="text" id="auteur" name="auteur">
        <label for="annee">année</label>
        <input type="text" id="annee" name="annee">
        <label for="editeur">éditeur</label>
        <input type="text" id="editeur" name="editeur">


        <select name="id_biblio" id="">
            <option value="">Sélectionner une biblio</option>
            <?php foreach($biblios as $biblio): ?>
                <option value="<?= $biblio->getId(); ?>"> <?= $biblio->getNom(); ?> </option>
            <?php endforeach; ?>
            </select>

        <button name="envoyer">envoyer</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>prix</th>
                <th>Auteur</th>
                <th>année</th>
                <th>editeur</th>
                <th>Bibliothèque</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach($livres as $livre): ?>
                <tr>
                    <td><?= $livre->getTitre()?></td>
                    <td><?= $livre->getPrix()?></td>
                    <td><?= $livre->getAuteur()?></td>
                    <td><?= $livre->getAnnee()?></td>
                    <td><?= $livre->getEditeur()?></td>
                    <td><?= $livre->getId_biblio()->getNom() ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</body>
</html>