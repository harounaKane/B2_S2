<?php
include "Compte.php";

$c1 = new Compte(1015, 5000, 200);
$c2 = new Compte(650, 6000);

$c1->retirer(5200);

var_dump($c2);

$c1->deposer(150);
$c1->setDecouvert(500);
var_dump($c1->getDecouvert());
