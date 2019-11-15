<?php
require_once("Manager.php");
class ManageUser extends Manager {

    function verifyUser($username) {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT username, password FROM users WHERE username = :username");
        $req->execute(array(
            'username' => $username,
        ));
        $result = $req->fetch();

        return ($result) ?  true :  false;
    }

    function loginUser($params){
        //check
        // INSERT INTO users() VALUES ()

        echo "userid";
    }
    function loadProfile($userId) {
        // SELECT FROM Users WHERE = 
        //provide back the informations about the user to display the html
    }
}

    

