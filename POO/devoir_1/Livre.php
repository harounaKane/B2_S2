<?php

class Livre{
    private $titre;
    private $prix;
    private $auteur;
    private $annee;
    private $editeur;   
    private $id_biblio;

    public function __construct($titre, $prix, $auteur, $annee, $editeur, Bibliotheque $id_biblio)
    {
        $this->titre=$titre;
        $this->setPrix($prix);
        $this->setAuteur($auteur);
        $this->setAnnee($annee);
        $this->editeur=$editeur;
        $this->id_biblio = $id_biblio;
    }

    public function setId_biblio(Bibliotheque $id_biblio){
        $this->id_biblio= $id_biblio;
    }

    public function getId_biblio(){
        return $this->id_biblio;
    }

    public function setTitre($titre){
        $this->titre= $titre;
    }

    public function getTitre(){
        return $this->titre;

    }

    public function setPrix($prix){
        if ($prix>=10){
            $this->prix= $prix;
        }
    }
    
    public function getPrix(){
        return $this->prix;
    }

    public function setAuteur($auteur){
        if (strlen($auteur)>=6 && ctype_alpha($auteur)){
            $this->auteur= $auteur;
        }
    }

    public function getAuteur(){
        return $this->auteur;
    }

    public function setAnnee($annee){
        if($annee>=2000){
            $this->annee= $annee;
        }
    }

    public function getAnnee(){
        return $this->annee;
    }

    public function setEditeur($editeur){
        $this->editeur=$editeur;
    }

    public function getEditeur(){
        return $this->editeur;
    }

    function __toString(){
        return $this->titre;
    }


}
