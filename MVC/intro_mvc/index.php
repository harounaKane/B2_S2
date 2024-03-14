<?php
//include ""entities/Article.php";
//include ""entities/Categorie.php";
spl_autoload_register(function($class){
    include "entities/" . $class . ".php";
});


include "controller/ArticleController.php";
include "controller/CategorieController.php";

include "model/ArticleModele.php";
include "model/CategorieModel.php";


$artCtl = new ArticleController();
$catCtl = new CategorieController();

$artCtl->articleHttp();
$catCtl->categorieHttp();