<?php
class Voiture{
    private int $id;
    private $marque;
    private $prix;
    private User $user;

    public function __construct(int $id,  $marque,  float $prix, User $user){
        $this->id = $id;
        $this->marque = $marque;
        $this->prix = $prix;
        $this->user = $user;
    }
	

    public function getId() {return $this->id;}

	public function getMarque() {return $this->marque;}

	public function getPrix() {return $this->prix;}

	public function getUser(): User {return $this->user;}

	public function setId( $id): void {$this->id = $id;}

	public function setMarque( $marque): void {$this->marque = $marque;}

	public function setPrix( $prix): void {$this->prix = $prix;}

	public function setUser(User $user): void {$this->user = $user;}

	
}
