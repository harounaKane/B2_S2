<?php

class Article{
    private $id;
    private $libelle;
    private $prix;
    private $description;

    public function __construct( $id,  $libelle,  $prix,  $description){
        $this->id = $id;
        $this->libelle = $libelle;
        $this->prix = $prix;
        $this->description = $description;
    }
    
	public function getId() {return $this->id;}

	public function getLibelle() {return $this->libelle;}

	public function getPrix() {return $this->prix;}

	public function getDescription() {return $this->description;}

	public function setId( $id): void {$this->id = $id;}

	public function setLibelle( $libelle): void {$this->libelle = $libelle;}

	public function setPrix( $prix): void {$this->prix = $prix;}

	public function setDescription( $description): void {
        $this->description = $description;
    }

	

}