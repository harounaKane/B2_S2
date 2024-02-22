<?php
include "classes/Client.php";
include "classes/Article.php";
include "classes/Commande.php";

include "controller/ActionUser.php";

if( isset($_GET['action']) ){
    try{

        $actionUser = new ActionUser();

        $actionUser->requeteUrl();

    }catch(PDOException $e){
        $errorNomPrenom = "Nom et prénom existe déjà";
        include "views/client.phtml";
    }catch(Exception $e){
        $errorLogin = $e->getMessage();
        include "views/client.phtml";
    }
   
}else{
    include "views/client.phtml";
}

