<?php

    include "classes/Personne.php";
    include "classes/Voiture.php";


    $bd = new PDO("mysql:host=127.0.0.1;dbname=b2_user", "root", "");

    function getUser($id){
        global $bd;
        $stmt = $bd->prepare("SELECT * FROM personne WHERE id = ?");
        $stmt->execute([$id]);

        extract($stmt->fetch());

        return new Personne($id, $sexe, $prenom, $nom, $age);
    }

    if(isset($_POST['marque'])){

        extract($_POST);

        $v = new Voiture($marque, $prix, $annee, getUser($proprietaire));
        $v->generateMatricule();

        $query = "INSERT INTO voiture VALUES(:mat, :marc, :prix, :annee, :proprio)";
        $stmt = $bd->prepare($query);
        $stmt->execute([
            "mat"       => $v->getMatricule(),
            "marc"      => $v->getMarque(),
            "prix"      => $v->getPrix(),
            "annee"     => $v->getAnnee(),
            "proprio"   => $v->getProprietaire()->getId()
        ]);

       header("location: formV.php");
      exit;
    }

    $stmt = $bd->prepare("SELECT * FROM voiture");
    $stmt->execute();

    $voitures = [];

    while($res = $stmt->fetch()){
        extract($res); // => $id, $sexe, $prenom, $nom, $age
        $v = new Voiture($marque, $prix, $annee, getUser($proprietaire));
        $v->setMatricule($matricule);
        $voitures[] = $v;
    }
    
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
        <a href="formV.php">Ajouter Voiture</a>
    </nav>  

    <table>
        <tr>
            <th>Matricule</th>
            <th>Marque</th>
            <th>Prix</th>
            <th>Année</th>
            <th>Proprio</th>
            <th>Action</th>
        </tr>

        <?php foreach($voitures as $v): ?>
            <tr>
                <td> <?= $v->getMatricule();?> </td>
                <td> <?= $v->getMarque(); ?> </td>
                <td> <?= $v->getPrix(); ?> </td>
                <td> <?= $v->getAnnee(); ?> </td>
                <td> <?= $v->getProprietaire()->getPrenom(); ?> </td>
                <td>
                    <a href="formV.php?action=up&id=<?= $v->getMatricule();?>">UP</a>
                    - 
                    <a href="formV.php?action=del&id=<?= $v->getMatricule();?>">X</a>
                </td>
            </tr>
        <?php endforeach; ?>


    </table>

    <form action="" method="post">

        <label for="">Marque</label>
        <input type="text" name="marque">

        <br>
        
        <label for="">Prix</label>
        <input type="text" name="prix">
        <br>
        
        <label for="">Année</label>
        <input type="number" name="annee">
        <br>

        <select name="proprietaire" id="">
            <option value=""> -- Choix propriétaire --</option>
            <?php foreach($personnes as $u): ?>
                <option value="<?= $u->getId(); ?>"><?= $u->getPrenom(); ?></option>
            <?php endforeach; ?>

        </select>

        <button>Envoyer</button>
    </form>

</body>
</html>