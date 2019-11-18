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
       
        $username = htmlspecialchars($params['username']);
        $password = htmlspecialchars($params['password']);
        $email = htmlspecialchars($params['email']);
        $imageurl = htmlspecialchars($params['imageurl']);
        $socialM = htmlspecialchars($params['socialM']);

        // do it the tests for the isset case normal FB and GMAIL
        if (isset($socialM)) {
            if ($socialM == 'gmail') {
                $userId = $this->verifyUser($username);
                if($userId){
                    viewProfile($params);
                } else {
                    // user creation
                    $bdd = $this->dbConnect();
                    $query = "INSERT INTO users(username, password, email, imageurl, google) VALUES(:username, :password, :email, :imageurl, 1)";
                    $req = $bdd->prepare($query);
                    $req->execute(array(
                        'username' => $username,
                        'password' => $password,
                        'email' => $email,
                        'imageurl' => $imageurl,
                    ));
                    // get user id
                    $userId = $this->verifyUser($username);
                    echo $userId;
                    
                } 
            } else if ($socialM == 'fb') {
                //Jee Soo insert FB case here
            }
        } //normal login add here
        
    } 

    function viewProfile($params) {
        $bdd = $this->dbConnect();
        if(isset($params['id'])) {
            $req = $bdd->prepare("SELECT * FROM users WHERE id = :id");
            $req->execute(array(
                'id' => $params['id']
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

    

