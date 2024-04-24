<?php 

namespace App\Entity;

class Journaliste{
    private $id;
    private $prenom;
    private $nom;

    public function __construct( $id,  $prenom,  $nom){$this->id = $id;$this->prenom = $prenom;$this->nom = $nom;}
	
    public function getId() {return $this->id;}

	public function getPrenom() {return $this->prenom;}

	public function getNom() {return $this->nom;}

	public function setId( $id): void {$this->id = $id;}

	public function setPrenom( $prenom): void {$this->prenom = $prenom;}

	public function setNom( $nom): void {$this->nom = $nom;}

	

}