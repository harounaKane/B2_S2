<?php 

namespace App\Model;

class User{
    
    private $pdo;
    
public function __construct(){
    $this->pdo = "connexion to bd";
}
	

    public function setPdo( $pdo): void {$this->pdo = $pdo;}

	public function getPdo() {return $this->pdo;}

	
}