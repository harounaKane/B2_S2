<?php

class Personne{
    private $id;
    private $sexe;
    private $prenom;
    private $nom;
    private $age;

    public function __construct($id, $sexe, $prenom, $nom, $age){
        $this->id = $id;
        $this->setSexe($sexe);
        $this->setPrenom($prenom);
        $this->nom = $nom;
        $this->age = $age;
    }

	
    public function getId() {return $this->id;}
    
	public function getSexe() {return $this->sexe;}
    
	public function getPrenom() {return $this->prenom;}
    
	public function getNom() {return $this->nom;}
    
	public function getAge() {return $this->age;}
    
	public function setId( $id): void {
        $this->id = $id;
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
    
    // private function generatedId(){
    //     $id = substr($this->prenom, 0, 2).substr($this->nom, 0, 2)."-". rand(1000, 9999);
    //     return strtoupper($id);
    // }
	
}