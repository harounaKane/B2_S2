<?php

include "CompteRemunere.php";

try{
    $c1 = new Compte(1015, 500, 0);

    var_dump( $c1 );


    $c1->retirer(550);

    var_dump( $c1 );
}catch(Exception $e){
    $error = $e->getMessage();


}



