<?php

abstract class Animal {
    private $poids;
    private $couleur;

    public function __construct($poids,  $couleur) {
        $this->poids = $poids;
        $this->couleur = $couleur;
    }

 

    public function boire(){
        return "je bois de l'eau";
    }

    public abstract function manger();
    public abstract function deplacement();
    public abstract function crier();

    public function __toString(){
        return "Je suis " . get_class($this)  ." je pèse " . 
        $this->poids."KG, de couleur " . 
        $this->couleur .' '. 
        $this->boire() . " ".
        $this->crier() . " ".
        $this->deplacement() . " ". 
        $this->manger();
    }

    public function getPoids() {
        return $this->poids;
    }

    public function getCouleur() {
        return $this->couleur;
    }

    public function setPoids($poids): void {
        $this->poids = $poids;
    }

    public function setCouleur($couleur): void {
        $this->couleur = $couleur;
    }
}
