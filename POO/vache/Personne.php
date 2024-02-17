<?php

class Personne{
    private $prenom;
    private $nom;

    public function __construct($prenom, $nom){
        $this->prenom = $prenom;
        $this->nom = $nom;
    }

    public function getPrenom(){return $this->prenom;}
    public function getNom(){return $this->nom;}

    public function setPrenom( $prenom){
        $this->prenom = $prenom;
    }

	public function setNom( $nom) {
        $this->nom = $nom;
    }

	



}