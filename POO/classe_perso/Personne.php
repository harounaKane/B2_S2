<?php

class Personne{
    private $prenom;
    private $nom;
    private $numeSecu;
    private $tel;

    private static $salaire = 2000;
    private static $compteur = 100;

    public function __construct($prenom, $nom, $numeSecu, $tel){
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->numeSecu = $numeSecu . "" . ++self::$compteur;
        $this->tel = $tel;
    }

    public function getPrenom(){return $this->prenom;}
    public function getNom(){return $this->nom;}
    public function getNumeSecu(){return $this->numeSecu;}
    public function getTel(){return $this->tel;}

    public function  setTel($telephone){
        $this->tel = $telephone;
    }

    public function memeNom($autre){
        return $this->nom == $autre->nom;
    }

    public static function getSalaire(){
        return self::$salaire;
    }

    public static function setSalaire($montant){
        self::$salaire = $montant;
    }



}