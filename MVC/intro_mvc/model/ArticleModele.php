<?php

class ArticleModele{
    private $pdo;

    public function __construct(){
        $this->pdo = new PDO("mysql:host=localhost;dbname=b2_intro_mvc", "root", "");
    }

    public function ajouter(Article $article){
        $query = "INSERT INTO article VALUES(NULL, :libelle, :prix, :descr, :cat)";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute([
            "libelle"   => $article->getLibelle(),
            "prix"      => $article->getPrix(),
            "descr"     => $article->getDescription(),
            "cat"       => $article->getCategorieId()
        ]);
    }

    public function afficher(){
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

    public function lire(int $id){
        $query = "SELECT * FROM article WHERE id = :id";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute(["id" => $id]);
        $res = $stmt->fetch(PDO::FETCH_ASSOC);

        extract($res);
        return new Article($id, $libelle, $prix, $description, $categorie_id);

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
            "lib"       => $art->getLibelle(),
            "prix"      => $art->getPrix(),
            "descr"     => $art->getDescription(),
            "id"        => $art->getId()
        ]);
    }
}