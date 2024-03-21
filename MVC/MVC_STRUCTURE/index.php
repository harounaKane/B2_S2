<?php

session_start();

include "classes/User.php";
include "classes/Voiture.php";

include "model/ModelGenerique.php";
include "model/UserModel.php";
include "model/VoitureModel.php";

include "controller/ControllerAbstract.php";
include "controller/UserController.php";
include "controller/VoitureController.php";


$userCtl = new UserController;
$carCtl = new VoitureController;


$userCtl->userHttp();
$carCtl->voitureHttp();

function toto(){
    echo "hello";
}