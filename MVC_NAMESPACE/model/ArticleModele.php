<?php

class ArticleModele extends ModelGenerique{


    public function getArticles(){
        return $this->getAll("Article");
    }

    public function getArticle($id){
        return $this->getOne("Article", $id);
    }

    
    public function ajouter(Article $article){
        $query = "INSERT INTO article VALUES(NULL, :libelle, :prix, :descr, :cat)";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute([
            "libelle"   => htmlentities($article->getLibelle()),
            "prix"      => $article->getPrix(),
            "descr"     => htmlentities($article->getDescription()),
            "cat"       => $article->getCategorieId()
        ]);
    }



    public function supprimer(int $id){
        $query = "DELETE FROM article WHERE id = :id";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute(["id" => $id]);

        
    }

    public function modifier(Article $art){
        $query = "UPDATE article SET libelle = :lib, prix = :prix, description = :descr WHERE id = :id";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            "lib"       => htmlentities($art->getLibelle()),
            "prix"      => $art->getPrix(),
            "descr"     => htmlentities($art->getDescription()),
            "id"        => $art->getId()
        ]);
    }
}