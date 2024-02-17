<?php 

include "Vache.php";
include "Personne.php";

$p1 = new Personne("Lin", "Rundong");
$p2 = new Personne("Hamidou", "Bance");

$v1 = new Vache(160, new Personne("toto", "tata")); 
$v2 = new Vache(200, $p2);
$v3 = new Vache(130, $p1);



var_dump($v1);
var_dump($v1->getAcheteur()->getPrenom());
// var_dump($v2);
// var_dump($v3);

// var_dump( $v1->prixVache() );
// var_dump( $v2->prixVache() );
// var_dump( $v3->prixVache() );