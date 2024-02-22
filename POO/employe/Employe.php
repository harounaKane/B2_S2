<?php

class Employe{

    protected $id;
    protected $nom;
    protected $indice;

    public static $coef = 1;

    public function __construct($num, $firstName, $indiceSalarial){
        $this->id = $num;
        $this->nom = $firstName;
        $this->indice = $indiceSalarial;
    }

    public function salaire(){
        return $this->indice * self::$coef;
    }    

    public static function setCoef($coef){
        self::$coef = $coef;
    }

    public static function getCoef()  {
        return self::$coef;
    }

    public function getId() {return $this->id;}

	public function getNom() {return $this->nom;}

	public function getIndice() {return $this->indice;}

	public function setId( $id): void {$this->id = $id;}

	public function setNom( $nom): void {$this->nom = $nom;}

	public function setIndice( $indice): void {$this->indice = $indice;}

	



}