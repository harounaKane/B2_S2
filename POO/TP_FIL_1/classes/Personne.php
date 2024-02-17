<?php

class Personne{
    private $identifiant;
    private $sexe;
    private $prenom;
    private $nom;
    private $age;

    public function __construct( $sexe, $prenom, $nom, $age){
        $this->setSexe($sexe);
        $this->setPrenom($prenom);
        $this->nom = $nom;
        $this->age = $age;
        $this->identifiant  = $this->generatedId();
    }

    private function generatedId(){
        $id = substr($this->prenom, 0, 2).substr($this->nom, 0, 2)."-". rand(1000, 9999);
        return strtoupper($id);
    }
	
    public function getIdentifiant() {return $this->identifiant;}

	public function getSexe() {return $this->sexe;}

	public function getPrenom() {return $this->prenom;}

	public function getNom() {return $this->nom;}

	public function getAge() {return $this->age;}

	public function setIdentifiant( $identifiant): void {
        $this->identifiant = $this->generatedId();;
    }

	public function setSexe( $sexe): void {
        $this->sexe = $sexe;
    }

	public function setPrenom($prenom) {
       $this->prenom = $prenom;
    }

	public function setNom( $nom): void {
        $this->nom = $nom;
    }

	public function setAge( $age): void {
        $this->age = $age;
    }

	
}