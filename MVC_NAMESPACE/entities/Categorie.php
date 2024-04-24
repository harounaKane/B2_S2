<?php 

namespace App\Entity;

class Categorie{
    private $id;
    private $nom;

    public function __construct( $id=0,  $nom= ""){
        $this->id = $id;
        $this->nom = $nom;
    }


	public function getId() {return $this->id;}

	public function getNom() {return $this->nom;}

    public function setId( $id): void {$this->id = $id;}

	public function setNom( $nom): void {$this->nom = $nom;}

	
	
}