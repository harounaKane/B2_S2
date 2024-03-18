<?php

class ArticleModele extends ModelAbstract{
    
    public function getAll(): array {
        $stmt = $this->pdo->prepare("SELECT * FROM article");
        $stmt->execute();

        $tab = [];

        while($res = $stmt->fetch()){
            extract($res);
            $art = new Article($id, $libelle, $prix, $description, $categorie_id);
            $tab[] = $art;
        }

        return $tab;
    }

    
    public function getOne(int $id): Article{
        $query = "SELECT * FROM article WHERE id = :id";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute(["id" => $id]);
        $res = $stmt->fetch(PDO::FETCH_ASSOC);

        extract($res);
        return new Article($id, $libelle, $prix, $description, $categorie_id);
    }


    function create( $article): void{
        $query = "INSERT INTO article VALUES(NULL, :libelle, :prix, :descr, :cat)";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute([
            "libelle"   => htmlentities($article->getLibelle()),
            "prix"      => $article->getPrix(),
            "descr"     => htmlentities($article->getDescription()),
            "cat"       => $article->getCategorieId()
        ]);
    }


    public function update( $article): void{
        $query = "UPDATE article SET libelle = :lib, prix = :prix, description = :descr WHERE id = :id";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            "lib"       => htmlentities($article->getLibelle()),
            "prix"      => $article->getPrix(),
            "descr"     => htmlentities($article->getDescription()),
            "id"        => $article->getId()
        ]);
    }


    public function delete(int $id): void{
        $query = "DELETE FROM article WHERE id = :id";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute(["id" => $id]);
    }
}