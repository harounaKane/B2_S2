<?php 

class CategorieModel{
    private $pdo;

    public function __construct(){
        $this->pdo = new PDO("mysql:host=localhost;dbname=b2_intro_mvc", "root", "");
    }

    function ajouter(Categorie $categorie){
        $query = "INSERT INTO categorie VALUES(NULL, :nom)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(["nom" => $categorie->getNom()]);
    }

    function update(Categorie $categorie){
        $query = "UPDATE categorie SET nom = :nom WHERE id = :id";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute(["nom" => $categorie->getNom(), "id" => $categorie->getId()]);

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

    function getCategorie(int $id){
        $stmt = $this->pdo->prepare("SELECT * FROM categorie WHERE id = :id");
        $stmt->execute(["id" => $id]);

        extract($stmt->fetch());

        return new Categorie($id, $nom);
    }

    function delete(int $id){
        $stmt = $this->pdo->prepare("DELETE FROM categorie WHERE id = :id");
        $stmt->execute(["id" => $id]);
    }
}