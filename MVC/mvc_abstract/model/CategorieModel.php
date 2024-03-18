<?php 

class CategorieModel extends ModelAbstract{

    function create($categorie): void{
        $query = "INSERT INTO categorie VALUES(NULL, :nom)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(["nom" => $categorie->getNom()]);
    }

    function update($categorie): void{
        $query = "UPDATE categorie SET nom = :nom WHERE id = :id";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute(["nom" => $categorie->getNom(), "id" => $categorie->getId()]);

    }

    function getAll(): array{
        $stmt  = $this->pdo->prepare("SELECT * FROM categorie");

        $stmt->execute();

        $tab = [];

        while($res = $stmt->fetch()){
            extract($res);
            $tab[] = new Categorie($id, $nom);
        }

        return $tab;
    }

    function getOne(int $id): Object{
        $stmt = $this->pdo->prepare("SELECT * FROM categorie WHERE id = :id");
        $stmt->execute(["id" => $id]);

        extract($stmt->fetch());

        return new Categorie($id, $nom);
    }

    function delete(int $id): void{
        $stmt = $this->pdo->prepare("DELETE FROM categorie WHERE id = :id");
        $stmt->execute(["id" => $id]);
    }
}