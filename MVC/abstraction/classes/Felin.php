<?php 

abstract class Felin extends Animal{

    public function manger(){
        return " je mande de la viande ";
    } 

    public function deplacement(){
        return " je me déplace seule ";
    }
}