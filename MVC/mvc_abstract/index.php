<?php
include "model/ModelAbstract.php";

spl_autoload_register(function($class){
    include "entities/" . $class . ".php";
});


include "controller/ArticleController.php";
include "controller/CategorieController.php";
include "controller/UtilisateurController.php";

include "model/ArticleModele.php";
include "model/CategorieModel.php";
include "model/UtilisateurModel.php";


$artCtl = new ArticleController();
$catCtl = new CategorieController();
$utiCtl = new UtilisateurController();

$utiCtl->UtilisateurHttp();
$artCtl->articleHttp();
$catCtl->categorieHttp();




// $u = new Utilisateur("toto","hhhh");
// $u->setIs_admin(true);
// var_dump($u);