<?php

class UtilisateurModel extends ModelAbstract{

    public function login($username, $password){
        $query = "SELECT * FROM utilisateur WHERE username = :login AND password = :mdp";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute(["login" => $username, "mdp" => $password]);

        if( $stmt->rowCount() != 0 ){
            extract($stmt->fetch());

            $_SESSION['user'] = new Utilisateur($id, $username, $password, $is_admin);
            return true;
        }

        return false;

    }
    
    function getAll(): array{
        $stmt = $this->pdo->prepare("SELECT * FROM utilisateur");
        $stmt->execute();

        $tab = [];

        while($res = $stmt->fetch()){
            extract($res);
            $uti = new Utilisateur($id, $username, $password, $is_admin);
            $tab[] = $uti;
        }

        return $tab;
    }

    function getOne(int $id): Utilisateur{
        $stmt = $this->pdo->prepare("SELECT * FROM utilisateur WHERE id = :id");
        $stmt->execute(["id" => $id]);
        
        $res = $stmt->fetch(PDO::FETCH_ASSOC);

        extract($res);

        return new Utilisateur($id, $username, $password, $is_admin);
    }

    function delete(int $id): void{
        $query = "DELETE FROM utilisateur WHERE id = :id";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute(["id" => $id]);
    }

    function create($u): void{
        $query = "INSERT INTO utilisateur VALUES(NULL, :username, :mdp, :statut)";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute(array(
            "username" => $u->getUsername(), 
            "mdp" => $u->getPassword(), 
            "statut" => $u->getIs_admin()));
    }

    function update($u): void{
        $query = "UPDATE utilisateur SET is_admin = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute(array(
            $u->getIs_admin(),
            $u->getId()));
    }


}