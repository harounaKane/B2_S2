<?php 

class CategorieController{

    function categorieHttp(){

        if( isset($_GET['action']) ){
            $action = $_GET['action'];

            $categorieModel = new CategorieModel();

            switch( $action ){
                case "categorie":
                    $categories = $categorieModel->getCategories();
                    include "views/categorie/index.php";
                    break;
                
                case "categorieAdd":

                    if( isset($_POST['nom']) ){
                        extract($_POST);
                        $cat = new Categorie($id, $nom);

                        $categorieModel->ajouter($cat);
                        
                        header("location: ?action=categorie");
                        exit;
                    }

                    include "views/categorie/new.php";
                    break;

                case "updateCategorie":
                    
                    if( isset($_POST['nom']) ){
                        extract($_POST);
                        $cat = new Categorie($id, $nom);

                        $categorieModel->update($cat);
                        
                        header("location: ?action=categorie");
                        exit;
                    }

                    // $categorieToUp = $categorieModel->getCategorie($_GET['id']);
                    include "views/categorie/new.php";
                    break;

                case "deleteCategorie":
                    $categorieModel->delete($_GET['id']);
                    header("location: ?action=categorie");
                    exit;
            }
        }

    }

}