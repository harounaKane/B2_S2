<?php 

class Utilisateur {
    private $id;
    private $username;
    private $password;
    private $is_admin = false;
    

    private $roles = [];

    public function __construct($id, $username,  $password,  $is_admin = false)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->is_admin = $is_admin;
    }

    public function getUsername() {return $this->username;}

	public function getPassword() {return $this->password;}

	public function getIsAdmin() {return $this->is_admin;}

    public function setUsername( $username): void {$this->username = $username;}

	public function setPassword( $password): void {$this->password = $password;}

    public function setIs_admin($is_admin):void {
        $this->is_admin = $is_admin;
    }


	public function getId() {return $this->id;}

    public function setId( $id): void {$this->id = $id;}

}