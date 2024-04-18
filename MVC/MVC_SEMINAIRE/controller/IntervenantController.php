<?php 

class IntervenantController extends AbstractController{


    function httpIntervenant(){

        if( isset($_GET['actoionInterv']) ){
            $action = $_GET['actoionInterv'];

            $intervMdl = new IntervenantModel();

            switch ($action) {
                case 'create':

                    if( isset($_POST['url']) ){
                        $interv = new Intervenant($_POST);

                        $intervMdl->create($interv);

                        $this->redirect(".");
                    }

                    $this->render("intervenant/form");
                    break;
                
                    case "readAll":
                        $intervs = $intervMdl->getAll();
                        $this->render("intervenant/index", ["intervenants" => $intervs]);
                        break;

                    case "read":
                        $interv = $intervMdl->getOne($_GET['id']);
                        $this->render("intervenant/show");
                        break;
            }
        }
        

    }

}