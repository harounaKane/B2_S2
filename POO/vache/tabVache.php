<?php 

include "Vache.php";
include "Personne.php";


$tab = [];

for($i=1; $i <= 10; $i++){
    $v = new Vache(rand(200, 300), new Personne("Toto ".$i, "Tata ".$i));
    $tab[] = $v;
}

foreach($tab as $vache){
    echo $vache->afficher()."<br>";
}