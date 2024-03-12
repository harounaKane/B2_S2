<?php

class ArticleController{

    public function afficher(){
        $model = new ArticleModele();
        return $model->afficher();
    }
    
}