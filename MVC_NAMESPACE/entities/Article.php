<?php

class Article{
    private $id;
    private $libelle;
    private $prix;
    private $description;
    private $categorie_id;    

    // public function __construct( $id = "",  $libelle = "",  $prix = "",  $description = "", $categorie_id = ""){
    //     $this->id = $id;
    //     $this->libelle = $libelle;
    //     $this->prix = $prix;
    //     $this->description = $description;
    //     $this->categorie_id = $categorie_id;
    // }
    
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

	public function getCategorieId() {return $this->categorie_id;}

	public function setCategorieId( $categorie_id): void {$this->categorie_id = $categorie_id;}

	public function __toString()
    {
        return $this->libelle;
    }

}