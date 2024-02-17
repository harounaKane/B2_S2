<?php

include "classes/Personne.php";
include "classes/Voiture.php";

$p1 = new Personne("h", "Frid", "Banzuzi", 30);
$p2 = new Personne("F", "Kilany", "Rihab", 30);
var_dump($p1);
$v1 = new Voiture("hkoi1010", "opel", 20000, 2020, $p1);

$v1->setProprietaire($p2);

var_dump($v1);
