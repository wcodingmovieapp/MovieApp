<?php
require_once("Manager.php");
class ManageUser extends Manager {

    function verifyUser($username) {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT id FROM users WHERE username = :username");
        $req->execute(array('username' => $username));
        $result = $req->fetch();
        return ($result) ?  $result['id'] : false;
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
                if(!$userId){
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
                    //get user id
                    $userId = $this->verifyUser($username);
                    
                } 
            }// } else if ($socialM == 'fb') {
            //     //Jee Soo insert FB case here
            // }
        } //else normal login add here
        echo $userId;
    } 

    function viewProfile($params) {

        $bdd = $this->dbConnect();
        $user = false;
        if(isset($params['userId'])) {
            $req = $bdd->prepare("SELECT * FROM users WHERE id = :id");
            $req->execute(array(
                'id' => $params['userId']
            ));
            $user = $req->fetch();

        } else {
            if(isset($params['username']) && isset($params['password'])) {
                $req = $bdd->prepare("SELECT * FROM users WHERE username = :username");
                // Need to add the password verify here
                $req->execute(array(
                    'username' => $params['username'],
                ));
                $user = $req->fetch();
            }
        }
        return $user;

    }

    function subscribeUser($params) {
        // Setting global variables for inputs to empty (prep for errors)
        $userErr = $emailErr = $passwordErr = "";
        $db = $this->dbConnect();

        // Get form info
        if (isset($params['username']) && isset($params['email']) && isset($params['password']) && isset($params['confirm'])) {
            $pwd = $params['password'];
            $confirm = $params['confirm'];
            $errors=[];
        
            if (empty($params['username'])) {
                $errors["username_required"] = "true";
            } else {
                $username = addslashes(htmlspecialchars(htmlentities(trim($params['username']))));
                if($this->verifyUser($username)){
                    $errors["used"] =  "true";
                }
            }
            if (empty($params['email'])) {
                $errors["email_required"] =  "true";
            } else {
                $email = addslashes(htmlspecialchars(htmlentities(trim($params['email']))));
                // check if email is well formed
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors["email_invalid"] =  "true";
                }
            }
            if (empty($params['password'])) {
                $errors["password_required"] = "true";
            } else {
                // Password Length 
                if(strlen($params['password']) <= 8) {
                    $errors["password_length"] = "true";
                }
                // REGEX 
                $regex = "#(?=.*\d)(?=.*[a-z])(?=.*[A-Z])#";
                if (!preg_match($regex, $params['password'])) {
                    $errors["password_character"] = "true";
                }

                // Passwords matches 
                // checking if matching passwords
                if ($pwd != $confirm) {
                    $errors["pwd_not_match"] =  "true";
                } 
                
            }

            if(count($errors)>0) {
               return $errors;
                // header("Location:index.php?action=login&errors=$str_errors");
            } else {
                // Hash of the password
                $pass_hache = password_hash($params['password'], PASSWORD_DEFAULT); 
                $req = $db->prepare('INSERT INTO Users(username, password, email) VALUES(:username, :password, :email)');
                $req->execute(array(
                    'username' => $username,
                    'password' => $pass_hache,
                    'email'=> $email
                ));
                return "success";
            }
        }

    }

}

    

