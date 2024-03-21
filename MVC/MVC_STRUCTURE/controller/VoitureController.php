<?php 


class VoitureController extends ControllerAbstract{

    public function voitureHttp(){

        $voitureMdl = new VoitureModel;
        $userMdl = new UserModel;

        if( isset($_GET['action']) ){
            $action = $_GET['action'];

            switch ($action) {

                //recup liste de voitures
                case 'voitures':
                    $this->render("voiture/index", ["cars" => $voitureMdl->voitures()]);
                    break;
                
                //1ere action afficher le formulaire
                //2eme action en POST pour demander au model d'inserer les donner
                case 'createCar':

                    //2eme
                    if( isset($_POST['marque']) ){
                        extract($_POST);
                        
                        $v = new Voiture(0, $marque, $prix, $userMdl->lireUser($user));

                        $voitureMdl->create($v);
                        $_SESSION['SUCCESS'] = "Voiture ajoutée avec succès !";
                        header("location: ?action=voitures");
                        exit;
                    }

                    //1ere
                    $users = $userMdl->lireUsers();
                    $this->render("voiture/new", ["proprios" => $users]);
                    break;
                
                default:
                    # code...
                    break;
            }
        }

    }

}
