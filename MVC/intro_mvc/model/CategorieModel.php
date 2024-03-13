<?php 

class CategorieModel{
    private $pdo;

    public function __construct(){
        $this->pdo = new PDO("mysql:host=localhost;dbname=b2_intro_mvc", "root", "");
    }

    function getAll(){
        $stmt  = $this->pdo->prepare("SELECT * FROM categorie");

        $stmt->execute();

        $tab = [];

        while($res = $stmt->fetch()){
            extract($res);
            $tab[] = new Categorie($id, $nom);
        }

        return $tab;
    }
}