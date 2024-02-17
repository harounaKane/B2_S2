<?php 

class Bibliotheque{
    private $id;
    private $nom;
    private $livres = [];

    public function __construct( $nom){
        $this->nom = $nom;
    }

    public function getLivres(){return $this->livres;}

    public function ajouter(Livre $livre){
        $this->livres[] = $livre;
    }

    public function afficher(){
        $str = $this->id."<br> ";
        foreach($this->livres as $livre){
            $str .=  $livre ."<br>";
        }

        return $str;
    }

    public function getId() {return $this->id;}

	public function setId( $id): void {$this->id = $id;}

	public function getNom() {return $this->nom;}

	public function setNom( $nom): void {$this->nom = $nom;}

}

