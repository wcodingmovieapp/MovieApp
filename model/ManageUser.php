<?php
require_once("Manager.php");
class ManageUser extends Manager {

    function verifyUser($username) {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT id FROM users WHERE username = :username");
        $req->execute(array('username' => $username));
        $result = $req->fetch();
        return ($result) ?  $result : false;
    }

    function loginUser($params){
       
        // do it the tests for the isset case normal FB and GMAIL
        $username = htmlspecialchars($params['username']);
        $password = htmlspecialchars($params['password']);



        $userId = $this->verifyUser($username);
        if($userId){
            $userId['userId']=$userId;
            viewProfile($userId);
        } else {
           
            // user creation
            $bdd = $this->dbConnect();
            $query = "INSERT INTO users SELECT( ;
            $req = $bdd->prepare($query);
        }
        echo $userId;
    }
    function viewProfile($params) {
        print_r($params);
        $bdd = $this->dbConnect();
        if(isset($params['userId'])) {
            
            $req = $bdd->prepare("SELECT * FROM users WHERE id = :userId");
            $req->execute(array(
                'userId' => $userId,
            ));
            $user = $req->fetch();
        } else {

            if(isset($params['username']) && isset($params['password']))
            $req = $bdd->prepare("SELECT * FROM users WHERE username = :username");
            // Need to add the password verify here
            $req->execute(array(
                'username' => $params['username'],
            ));
            $user = $req->fetch();
        }
       
        return ($user) ?  $user : false;
    }
}

    

