<?php 

spl_autoload_register(function($class){
    include "classes/". $class . ".php";
});

$l = new Lion(120, "grise");

echo $l;
echo "<br>";
$lapin = new Lapin(30, "blanche");

echo $lapin;