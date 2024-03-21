<?php

class VoitureModel extends ModelGenerique{

    public function voitures(){
        $stmt = $this->getAll("voiture");

        $userMdl = new UserModel;

        $tab = [];

        while($res = $stmt->fetch()){
            extract($res);
            $u = $userMdl->lireUser($user); 
            $tab[] = new Voiture($id, $marque, $prix, $u);
        }

        return $tab;
    } 

    public function create($voiture){
        $query = "INSERT INTO voiture VALUES(NULL, :marc, :prix, :proprio)";

        $this->executerReq($query, [
            "marc"  => $voiture->getMarque(),
            "prix"  => $voiture->getPrix(),
            "proprio" => $voiture->getUser()->getId()
        ]);
    }

    public function update($object)
    {
        
    }

    public function delete(int $id)
    {
        
    }

}