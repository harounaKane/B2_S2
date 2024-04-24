<?php

namespace App\Controller;

use App\Entity\Article;
use App\Model\ArticleModele;
use App\Model\CategorieModel;

class ArticleController{

    function articleHttp(){

        $model = new ArticleModele();
        $catModel = new CategorieModel();
        
        if( isset($_GET['action']) ){
            // VALEUR DE L'ACTION
            $action = $_GET['action'];


            switch( $action ){
                case "article" :
                    $articles = $model->getArticles(); 
                    include "views/article/index.php";
                    break;

                case "detailArt": 
                    $id = $_GET['id'];
                    $article = $model->getArticle($id);
                   var_dump($article);
                    break;

                case "deleteArticle": 
                    $id = $_GET['id'];
                    $model->supprimer($id);

                    header("location: ?action=article");
                    exit;
                    break;

                case "articleAdd":

                    // RECUP DONNEES DU FORMULAIRE
                    if( isset($_POST['libelle']) ){
                        extract($_POST);
                        $art = new Article(0, $libelle, $prix, $description, $categorie);

                        $model->ajouter($art);

                        header("location: ?action=article");
                        exit;
                    }
                 //   $categories = $catModel->getAll();
                    include "views/article/new.php";
                    break;

                case "updateArticle":

                     // RECUP DONNEES DU FORMULAIRE
                     if( isset($_POST['libelle']) ){
                        extract($_POST);
                        $art = new Article($id, $libelle, $prix, $description, $categorie);

                       $model->modifier($art);

                       header("location: ?action=article");
                       exit;
                    }

                    $id = $_GET['id'];
                    // $articleUpdate = $model->lire($id);
                    // $categories = $catModel->getAll();
                    include "views/article/new.php";
                    break;
            }
        }else{
            // $articles = $model->afficher(); 
            include "views/article/index.php";
        }

    }
    
}