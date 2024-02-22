<?php

class Commande{
    private $id;
    private $article;
    private $client;

    public function __construct($id,  $article,  $client) {
        $this->id = $id;
        $this->article = $article;
        $this->client = $client;
    }

    public function getId() {
        return $this->id;
    }

    public function getArticle() {
        return $this->article;
    }

    public function getClient() {
        return $this->client;
    }
    public function setId($id): void {
        $this->id = $id;
    }

    public function setArticle($article): void {
        $this->article = $article;
    }

    public function setClient($client): void {
        $this->client = $client;
    }	
}