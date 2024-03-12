<?php

include "entities/Article.php";

include "controller/ArticleController.php";

include "model/ArticleModele.php";

include "views/header.php";

$artCtl = new ArticleController();

if( isset($_GET['action']) ){
    $action = $_GET['action'];

    switch( $action ){
        case "article" :
            $articles = $artCtl->afficher();
            include "views/article/article.php";
            break;
    }
}