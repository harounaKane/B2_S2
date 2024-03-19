<?php

class UtilisateurController {
    
    public function UtilisateurHttp(){
        if(isset($_GET['action'])){

            $action = $_GET['action'];

           
            $utilisateurModel =  new UtilisateurModel();
            switch ($action) {

                case 'getAll':
                    $utilisateurs = $utilisateurModel->getAll();
                    include "views/user/index.php";
                    break;
                
                case 'updateUser':
                  
                    break;

                case 'deleteUser':
                    $utilisateurModel->delete($_GET['id']);

                    header("location: ?action=getAll");

                    exit;
                
                default:
                    # code...
                    break;
            }
        }
    }
}