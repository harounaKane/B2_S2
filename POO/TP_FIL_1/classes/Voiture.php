<?php

class Voiture{
    private $matricule;
    private $marque;
    private $prix;
    private $annee;
    private Personne $proprietaire;

    public function __construct(  $marque,  float $prix,  $annee, Personne $proprietaire){
      //  $this->matricule = $matricule;
        $this->marque = $marque;
        $this->prix = $prix;
        $this->annee = $annee;
        $this->proprietaire = $proprietaire;
    }

    function generateMatricule(){
        $mat = "";

        for($i = 0; $i < 7; $i++){
            $mat .= chr(rand(65, 90) );
        }

        $this->matricule = $mat . "-" . rand(100, 999);
    }

    public function getMatricule() {return $this->matricule;}

	public function getMarque() {return $this->marque;}

	public function getPrix() {return $this->prix;}

	public function getAnnee() {return $this->annee;}

	public function getProprietaire():Personne {return $this->proprietaire;}

	public function setMatricule( $matricule): void {$this->matricule = $matricule;}

	public function setMarque( $marque): void {$this->marque = $marque;}

	public function setPrix( $prix): void {$this->prix = $prix;}

	public function setAnnee( $annee): void {$this->annee = $annee;}

	public function setProprietaire( Personne $proprietaire): void {
        $this->proprietaire = $proprietaire;
    }
}