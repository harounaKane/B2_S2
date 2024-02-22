<?php

include "Commercial.php";

$e1 = new Employe(1, "toto", 1500);
$e2 = new Commercial(2, "Tata", 2000, 30000, 1.5);



var_dump($e1);
var_dump($e2);

var_dump($e1->salaire());
var_dump($e2->salaire());