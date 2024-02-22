<?php 

class Article{
    private $code;
    private $libelle;
    private $prix;

    public function __construct( $code,  $libelle,  $prix){
        $this->code = $code;
        $this->libelle = $libelle;
        $this->prix = $prix;
    }

	public function getCode() {return $this->code;}

	public function getLibelle() {return $this->libelle;}

	public function getPrix() {return $this->prix;}

    public function setCode( $code): void {$this->code = $code;}

	public function setLibelle( $libelle): void {$this->libelle = $libelle;}

	public function setPrix( $prix): void {$this->prix = $prix;}

	
}

	