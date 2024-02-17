<?php

class Compte{

    private $numero;
    private $solde;
    private $decouvert;

    function __construct($numero, $montant, $decouvert = 0){
        $this->numero = $numero;
        $this->solde = $montant;
        $this->decouvert = $decouvert;
    }

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

        return false;
    }

    public function virerVers($compteDest, $montant){
        if( $this->retirer($montant) ){
            $compteDest->deposer($montant);
            return true;
        }

        return false;
    }


}