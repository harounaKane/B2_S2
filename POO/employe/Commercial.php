<?php 

include "Employe.php";

class Commercial extends Employe{

    private $vente;
    private $partFix;

    public function __construct($id, $nom, $indice, $vente, $partFix){
        parent::__construct($id, $nom, $indice);
        $this->vente = $vente;
        $this->partFix = $partFix;
    }

    public function salaire(){
        return parent::salaire() + ($this->vente*$this->partFix/100);
       
    }

    public function getVente() {return $this->vente;}

	public function getPartFix() {return $this->partFix;}

	public function setVente( $vente): void {$this->vente = $vente;}

	public function setPartFix( $partFix): void {$this->partFix = $partFix;}



}