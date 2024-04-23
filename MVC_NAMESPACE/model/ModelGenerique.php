<?php

abstract class ModelGenerique{
    protected $pdo;

    public function __construct(){
        $this->pdo = new PDO("mysql:host=localhost;dbname=b2_intro_mvc", "root", "", [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

    public function getAll($table){
        $query = "SELECT * FROM " . $table;

        $stmt = $this->executerReq($query);

        $stmt->setFetchMode(PDO::FETCH_CLASS, $table);

        return $stmt->fetchAll();
    }

    public function getOne($table, $id){
        $query = "SELECT * FROM " . $table . " WHERE id = :id";

        $stmt = $this->executerReq($query, ["id" => $id]);

        $stmt->setFetchMode(PDO::FETCH_CLASS, $table);

        return $stmt->fetch();
    }


    public function executerReq($query, array $params = []){
        $stmt = $this->pdo->prepare($query);

        foreach($params as $cle => $valeur){
            $params[$cle] = htmlentities($valeur);
        }

        $stmt->execute($params);

        return $stmt;
    }



}
