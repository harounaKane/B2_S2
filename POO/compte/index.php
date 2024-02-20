<?php

include "CompteRemunere.php";

$c1 = new Compte(1015, 5000, 200);
$cr = new CompteRemunere(100, 450, .5 ,0);


var_dump( $c1->afficher() );
var_dump( $cr->afficher() );

