<?php

class Compte{

    protected $numero;
    protected $solde;
    protected $decouvert;
    
    function __construct($numero, $montant, $decouvert = 0){
        $this->numero = $numero;
        $this->solde = $montant;
        $this->decouvert = $decouvert;
    }

    public function afficher(){
        return $this->numero. " Solde: ". $this->solde;    }

    public function getDecouvert(){
        return $this->decouvert;
    }

    public function setDecouvert($montantDecouvert){
        $this->decouvert = $montantDecouvert;
    }

    public function getSolde(){
        return $this->solde;
    }

    public function getNumero(){return $this->numero;}

    public function setSolde($montant){
        $this->solde = $montant;
    }

    public function deposer($montant){
        if( $montant >= 10 ){
            $this->solde += $montant;
            return true;
        }

        return false;
    }

    public function retirer($montant){
        if( ($this->solde + $this->decouvert) >= $montant ){
            $this->solde -= $montant;
            return true;
        }
        throw new Exception("Solde < au montant");
    }

    public function virerVers($compteDest, $montant){
        if( $this->retirer($montant) ){
            $compteDest->deposer($montant);
            return true;
        }

        return false;
    }


}