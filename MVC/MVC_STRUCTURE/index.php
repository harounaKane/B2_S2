<?php

session_start();

include "classes/User.php";

include "model/ModelGenerique.php";
include "model/UserModel.php";

include "controller/ControllerAbstract.php";
include "controller/UserController.php";


$userCtl = new UserController;


$userCtl->userHttp();