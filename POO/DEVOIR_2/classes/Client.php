<?php

class Client{
    private $id;
    private $login;
    private $prenom;
    private $nom;

    public function __construct( $id,  $login,  $prenom,  $nom){
        $this->id = $id;
        $this->setLogin($login);
        $this->prenom = $prenom;
        $this->nom = $nom;
    }

    public function setId( $id): void {$this->id = $id;}

	public function setLogin( $login): void {
        if( strlen($login) < 4 ){
            throw new Exception("Le login doit avoir 4 caractères mini");
        }

        $this->login = $login;
    }

	public function setPrenom( $prenom): void {
        $this->prenom = $prenom;
    }

	public function setNom( $nom): void {$this->nom = $nom;}

	public function getId() {return $this->id;}

	public function getLogin() {return $this->login;}

	public function getPrenom() {return $this->prenom;}

	public function getNom() {return $this->nom;}

	
	
}