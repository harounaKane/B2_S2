<?php

abstract class AbstractController{

    public function render($vue, $data = []){

        include "views/" . $vue.".php";
    }

    public function redirect($path){
        header("Location: " . $path);
        exit;
    }

}