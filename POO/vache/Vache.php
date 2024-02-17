<?php

class Vache{

    private $immatricule;
    private $poids;
    private $acheteur;

    public static $prixAuKilo = 20;
    public static $mat = 50;

    public function __construct($poids, $acheteur){
        $this->immatricule = self::$mat++;
        $this->setPoids($poids);
        $this->setAcheteur($acheteur);
    }

    public function setAcheteur($acheteur){
        $this->acheteur = $acheteur;
    }


    public function setPoids($poids){
        $this->poids = is_numeric($poids) ? $poids : 20;
        // if( is_numeric($poids)){
        //     $this->poids = $poids;
        // }else{
        //     $this->poids = 20;
        // }
    }

    public function getPoids(){
        return $this->poids;
    }

    public function getAcheteur(){
        return $this->acheteur;
    }

    public function getImmatricule(){
        return $this->immatricule;
    }

    function prixVache(){
        return $this->poids * self::$prixAuKilo;
    }

    public static function setPrixAuKilo($prixAuKilo) {
        self::$prixAuKilo = $prixAuKilo;
    }

    public function afficher(){
        return "Vache de matricule " . $this->immatricule." de poids: " . $this->poids." coûte: " . $this->prixVache()."€". 
        " Achéteur => " . $this->acheteur->getPrenom();
    }

}

/*
 tableau de dix vaches puis de faire l'affichage avec la methodes afficher() 
*/