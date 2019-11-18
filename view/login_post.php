<?php
// Setting global variables for inputs to empty (prep for errors)
$userErr = $emailErr = $passwordErr = "";

// Connection to database
try
{
    $db = new PDO('mysql:host=localhost;dbname=Projects;charset=utf8', 'root', 'root');
}
// Hiding password when run error - display different message
catch (Exception $e)
{
    die('Error : ' . $e->getMessage());
}




// Get form info
if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm'])) {
    $pwd = $_POST['password'];
    $confirm = $_POST['confirm'];
    $errors=[];
  
    if (empty($_POST['username'])) {
        $errors["username_required"] = "true";
    } else {
        $username = addslashes(htmlspecialchars(htmlentities(trim($_POST['username']))));
        $req = $db->query("SELECT username FROM users WHERE username = '$username'");
        $checkAlreadyExist = $req->fetch();
        if($checkAlreadyExist){
            $errors["used"] =  "true";
        }
    }
    if (empty($_POST['email'])) {
        $errors["email_required"] =  "true";
    } else {
        $email = addslashes(htmlspecialchars(htmlentities(trim($_POST['email']))));
        
        // check if email is well formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["email_invalid"] =  "true";
        }
    }
    if (empty($_POST['password'])) {
        $errors["password_required"] = "true";
    } else {
        // Hash of the password
        $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Password Length 
        if(strlen($_POST['password']) <= 8) {
            $errors["password_length"] = "true";
        }
        // Password at least one uppercase and one number
        // if(($_POST['password'])) {

        // }
    }
    // checking if matching passwords
    if ($pwd != $confirm) {
        $errors["pwd_not_match"] =  "true";
        } else {
            // Hash of the password
            $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }
    // Insertion
    if(count($errors)>0) {
        $str_errors = json_encode($errors);
        header("Location:login.php?errors=$str_errors");
    }else {
        $req = $db->prepare('INSERT INTO Users(username, password, email) VALUES(:username, :password, :email)');
        $req->execute(array(
            'username' => $username,
            'password' => $pass_hache,
            'email'=> $email
        ));
        header("Location:login.php");
    }   
}
?>