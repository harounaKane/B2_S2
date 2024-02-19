<?php
include "classes/Personne.php";

$bd = new PDO("mysql:host=127.0.0.1;dbname=b2_user", "root", "");

if( isset($_GET['action']) && ctype_digit($_GET['id']) ){
    $id = $_GET['id'];
    $p = getUser($id);

    // if( $_GET['action'] == "up" && $p != null ){
        
    // }else
    if( $_GET['action'] == "del" ){

        if( $p != null ){

            $stmt = $bd->prepare("DELETE FROM personne WHERE id = ?");
            $stmt->execute([$p->getId()]);

            header("location: .");
            exit;
        }
    }
}

if( isset($_POST['prenom']) ){
    extract($_POST);
    $p = new Personne($id, $sexe, $prenom, $nom, $age);

    $stmt = $bd->prepare("UPDATE personne SET prenom = ?, nom = ? WHERE id = ?");
    $stmt->execute([$p->getPrenom(), $p->getNom(), $p->getId()]);

    header("location: .");
    exit;
}

function getUser($id){
    global $bd;
    $res = $bd->prepare("SELECT * FROM personne WHERE id = ?");
    $res->execute([$id]);

    if( $res->rowCount() != 0 ){
        extract($res->fetch());
        return new Personne($id, $sexe, $prenom, $nom, $age);
    }

    return null;
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
    <h2>UPDATE</h2>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $p->getId(); ?>">
        <input type="radio" name="sexe" value="femme" <?= $p->getSexe() == 'femme' ? 'checked' : '' ?>>
        <label for="">Femme</label>
        <input type="radio" name="sexe" value="homme" <?= $p->getSexe() == 'homme' ? 'checked' : '' ?>>
        <label for="">Homme</label>
        <br>
        <label for="">Prénom</label>
        <input type="text" name="prenom" value="<?= $p->getPrenom(); ?>">

        <br>
        
        <label for="">Nom</label>
        <input type="text" name="nom" value="<?= $p->getNom(); ?>">
        <br>
        
        <label for="">Age</label>
        <input type="number" name="age" value="<?= $p->getAge(); ?>">
        <br>
        <button>Envoyer</button>
    </form>

</body>
</html>