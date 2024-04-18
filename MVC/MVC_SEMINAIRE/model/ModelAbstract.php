<?php

abstract class ModelAbstract{

    protected $pdo;

    function __construct(){
        $this->pdo = new PDO("");
    }

    public function read($table, $id){
        $stmt = $this->executeSql("select * from " . $table ." WHERE id = :id", ["id" => $id]);

        return $stmt->fetch();
    }

    public function readAll($table){
        $stmt = $this->executeSql("select * from " . $table);

        return $stmt;
    }

    public function delete($table, $id){

    }

    public function executeSql($query, $data = []){
        $stmt = $this->pdo->prepare($query);

        $stmt->execute($data);

        return $stmt;
    }

    abstract function create($object);
    abstract function update($object);
    
}