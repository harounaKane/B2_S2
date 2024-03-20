<?php 

abstract class ControllerAbstract{
    
    public function render($page, array $data = []){

        ob_start();

        extract($data);

        include "views/". $page . ".php";

        $content = ob_get_clean();

        include "views/template.php";
    }
}