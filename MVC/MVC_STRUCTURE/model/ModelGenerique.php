<?php

abstract class ModelGenerique{
    protected $pdo;

    public function __construct(){
        $this->pdo = new PDO("mysql:host=127.0.0.1;dbname=b2_mvc_str", "root", "", [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

    public function executerReq($query, array $params = []){
        $stmt = $this->pdo->prepare($query);

        foreach($params as $cle => $valeur){
            $params[$cle] = htmlentities($valeur);
        }

        $stmt->execute($params);

        return $stmt;
    }

    public function getAll($table){
        $query = "SELECT * FROM " . $table;

        return $this->executerReq($query);
    }

    
    public function getOne($table, $id){
        $query = "SELECT * FROM " . $table . " WHERE id = :id";

        return $this->executerReq($query, ["id" => $id]);
    }

    abstract function create($object);
    abstract function update($object);
    abstract function delete(int $id);


}

/*
create
update
delete
lister
lire
*/