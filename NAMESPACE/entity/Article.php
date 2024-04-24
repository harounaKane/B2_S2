<?php 

namespace App\Entity;

class Article{
    private $id;
    private $dateP;
    private $titre;
    private $contenu;
    private Journaliste $auteur;

    public function __construct( $id,  $dateP,  $titre,  $contenu, Journaliste $auteur){
        $this->id = $id;
        $this->dateP = $dateP;
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->auteur = $auteur;
    }
	
    public function getId() {return $this->id;}

	public function getDateP() {return $this->dateP;}

	public function getTitre() {return $this->titre;}

	public function getContenu() {return $this->contenu;}

	public function getAuteur() {return $this->auteur;}

	public function setId( $id): void {$this->id = $id;}

	public function setDateP( $dateP): void {$this->dateP = $dateP;}

	public function setTitre( $titre): void {$this->titre = $titre;}

	public function setContenu( $contenu): void {$this->contenu = $contenu;}

	public function setAuteur(Journaliste $auteur): void {$this->auteur = $auteur;}

	

}