<?php

include "entities/Article.php";
include "entities/Categorie.php";

include "controller/ArticleController.php";
include "controller/CategorieController.php";

include "model/ModelGenerique.php";
include "model/ArticleModele.php";
include "model/CategorieModel.php";

use App\Controller\ArticleController;
use App\Controller\CategorieController;

$artCtl = new ArticleController();
$catCtl = new CategorieController();

$artCtl->articleHttp();
$catCtl->categorieHttp();