<?php
class ActionUser{

    private $pdo;

    public function __construct(){
        $this->pdo = new PDO("mysql:host=localhost;dbname=b2_devoir", "root", "");
    }

    public function requeteUrl(){
        if( isset($_GET['action']) ){
            $action = $_GET['action'];

            switch($action){
                case "client" :
                    if( isset($_POST["prenom"]) ){

                        $client = new Client(0, $_POST['login'], $_POST['prenom'], $_POST['nom']);

                        //vérifie si login existe
                        $this->isLogin($client->getLogin());

                        $query = "INSERT INTO client VALUES(NULL, ?, ?, ?)";
                        $stmt = $this->pdo->prepare($query);

                        $stmt->execute([
                            $client->getLogin(),
                            $client->getPrenom(),
                            $client->getNom()
                        ]);


                    }
                    include "views/client.phtml";
                    break;
                case "commande" :
                    $clients = $this->getClients();
                    $articles = $this->getArticles();
                    include "views/commande.phtml";
                    break;
            }

        }
    }

    public function isLogin($login){
        $stmt = $this->pdo->prepare("SELECT * FROM client WHERE login = ?");
        $stmt->execute([$login]);

        if( $stmt->rowCount() != 0 ){
            throw new Exception("Ce login existe déjà !");
        }
    }

    public function getClients(){
        $stmt = $this->pdo->prepare("SELECT * FROM client");
        $stmt->execute();
        
        $clients = [];
        while($res = $stmt->fetch()){
            extract($res);
            $clients[] = new Client($id, $login, $prenom, $nom);
        }

        return $clients;
            
    }

    public function getArticles(){
        $stmt = $this->pdo->prepare("SELECT * FROM article");
        $stmt->execute();
        
        $articles = [];
        while($res = $stmt->fetch()){
            extract($res);
            $articles[] = new Article($code, $libelle, $prix);
        }

        return $articles;
            
    }

}