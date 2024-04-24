<?php 

namespace App\Model;

use App\Entity\Categorie;

class CategorieModel extends ModelGenerique{

    public function getCategories(){

        $categories = $this->getAll("Categorie");

        return $categories;
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

    function delete(int $id){
        $stmt = $this->pdo->prepare("DELETE FROM categorie WHERE id = :id");
        $stmt->execute(["id" => $id]);
    }
}