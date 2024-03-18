<?php

abstract class ModelAbstract{
    protected $pdo;


    abstract function getAll(): array;
    abstract function getOne(int $id): Object;
    abstract function delete(int $id): void;
    abstract function create($objet): void;
    abstract function update($objet): void;

    public function __construct(){
        $this->pdo = new PDO("mysql:host=localhost;dbname=b2_intro_mvc", "root", "");
    }

	
}