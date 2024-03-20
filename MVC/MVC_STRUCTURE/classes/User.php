<?php

class User
{
    private $id;
    private $login;
    private $mdp;

    public function __construct($id,  $login,  $mdp)
    {
        $this->id = $id;
        $this->login = $login;
        $this->mdp = $mdp;
    }


    public function getId()
    {
        return $this->id;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getMdp()
    {
        return $this->mdp;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setLogin($login): void
    {
        $this->login = $login;
    }

    public function setMdp($mdp): void
    {
        $this->mdp = $mdp;
    }
}
