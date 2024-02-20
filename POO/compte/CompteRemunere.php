<?php 
include "Compte.php";

class CompteRemunere extends Compte{

    private $taux;

    public function __construct($numero, $montant, $taux, $decouvert = 0){
        parent::__construct($numero, $montant, $decouvert);
        $this->taux = $taux;
    }

    public function afficher(){
        return parent::afficher() ." taux: " . $this->taux;
    }

    public function getTaux() {return $this->taux;}

    public function setTaux( $taux): void {$this->taux = $taux;}

	
}


	