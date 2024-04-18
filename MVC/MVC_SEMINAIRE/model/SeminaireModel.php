<?php

class SeminaireModel extends ModelAbstract{

    public function getAll(){
        $stmt = $this->readAll("seminaire");
    }

    function getOne($id){
        $stmt = $this->read("seminaire", $id);
    }

    public function deleteById($id){
        $stmt = $this->delete("seminaire", $id);
    }

    public function create($object){
    }

    public function update($object){
        
    }

    public function getByDate($date){
        $stmt = $this->executeSql("SELECT * FROM seminaire WHERE dateIntervention = :di", ["di" => $date]);
    }
}