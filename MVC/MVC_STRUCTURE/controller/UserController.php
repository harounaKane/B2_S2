<?php

class UserController extends ControllerAbstract{

    public function userHttp(){

        $usermdl = new UserModel;

        if( isset($_GET['action']) ){

            $action = $_GET['action'];

            switch ($action) {
                case 'lireUsers':
                    $utilisateurs = $usermdl->lireUsers();
                    $this->render("user/index", ["utilisateurs" => $utilisateurs]);
                    break;

                case 'lireUser':
                    $id = $_GET['id'];
                    $user = $usermdl->lireUser($id);
                    $this->render("user/show", ["user" => $user]);
                    break;

                case 'create':

                    if( isset($_POST['login']) ){
                        extract($_POST);
                        $user = new User(0, $login, $mdp);

                        $usermdl->create($user);

                        header("location: .");
                        exit;
                    }

                    $this->render("user/new");
                    break;

                case 'updateUser':

                    if( isset($_POST['login']) ){
                        extract($_POST);
                        $user = new User($id, $login, $mdp);

                        $usermdl->update($user);

                        header("location: .");
                        exit;
                    }

                    $id = $_GET['id'];
                    $user = $usermdl->lireUser($id);
                    $this->render("user/new", ["user" => $user]);
                    break;
                
                case "deleteUser":
                    $id = $_GET['id'];
                    $usermdl->delete($id);

                    header("location: .");
                    exit;
                
                case "login":

                    if( isset($_POST['login']) ){
                        $usermdl->login($_POST['login'], $_POST['mdp']);

                        if( isset($_SESSION['user']) ){
                            header("location: .");
                            exit; 
                        }  
                    }

                    $this->render("user/login");
                    break;

                case "logout":
                    session_destroy();
                    header("location: .");
                    exit;

                default:
                    break;
            }
        }else{
            $utili = $usermdl->lireUsers();
            $this->render("user/index", ["utilisateurs" => $utili ]);
        }
        

    }


}