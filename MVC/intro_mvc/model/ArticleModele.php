<?php

class ArticleModele{
    private $pdo;

    public function __construct(){
        $this->pdo = new PDO("mysql:host=localhost;dbname=b2_intro_mvc", "root", "");
    }

    public function ajouter(Article $article){
        $query = "INSERT INTO article VALUES(NULL, :libelle, :prix, :descr)";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute([
            "libelle"   => $article->getLibelle(),
            "prix"      => $article->getPrix(),
            "descr"     => $article->getDescription()
        ]);
    }

    public function afficher(){
        $stmt = $this->pdo->prepare("SELECT * FROM article");
        $stmt->execute();

        $tab = [];

        while($res = $stmt->fetch()){
            extract($res);
            $art = new Article($id, $libelle, $prix, $description);
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
        return new Article($id, $libelle, $prix, $description);

    }

    public function supprimer(int $id){
        $query = "DELETE FROM article WHERE id = :id";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute(["id" => $id]);

        
    }

    public function modifier(){
        
    }
}