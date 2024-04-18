<?php

class IntervenantModel extends ModelAbstract{

    public function getAll(){
        $stmt = $this->readAll("intervenant");
    }

    function getOne($id){
        $stmt = $this->read("intervenant", $id);
    }
    public function deleteById($id){
        $stmt = $this->delete("intervenant", $id);
    }

    public function create($object)
    {
        $query = "INSERT INTO intervenant(id, prenom, affectation, url) VALUES(NULL, :prenom, :affect, :url)"; 
        $this->executeSql($query, [
            "prenom" => "Toto", 
            "affect" => "Géographe", 
            "url"    => "ilci.fr"]);
    }

    public function update($object){
        
    }
}