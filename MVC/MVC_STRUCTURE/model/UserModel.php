<?php 

class UserModel extends ModelGenerique{


    function login($login, $mdp){
        $stmt = $this->executerReq("SELECT * FROM user WHERE login = :login", ["login" => $login]);

        if( $stmt->rowCount() != 0 ){
            $res = $stmt->fetch();

            //teste le mdp
            if( password_verify($mdp, $res['mdp']) ){
                extract($res);

                $_SESSION['user'] = serialize( new User($id, $login, $mdp) );
            }
        }
        
    }

    public function create($user){
        $query = "INSERT INTO user VALUES(NULL, :login, :mdp)";

        $this->executerReq($query, [
            "login" => $user->getLogin(), 
            "mdp" => password_hash($user->getMdp(), PASSWORD_DEFAULT)]);
    }

    public function lireUsers(){
        $stmt = $this->getAll("user");

        $tab = [];

        while($res = $stmt->fetch()){
            extract($res);
            $tab[] = new User($id, $login, $mdp);
        }

        return $tab;
    }

    public function lireUser(int $id){
        $stmt = $this->getOne("user", $id);
        extract($stmt->fetch());

        return new User($id, $login, $mdp);
    }

    public function delete(int $id){
        $stmt = $this->executerReq("DELETE FROM user WHERE id = :id", ["id" => $id]);
    }

    public function update($user){
        $query = "UPDATE user SET login = :login, mdp = :mdp WHERE id = :id";
        $this->executerReq($query, [
            "login" => $user->getLogin(),
            "mdp"   => $user->getMdp(),
            "id"    => $user->getId()
        ]);
    }

}