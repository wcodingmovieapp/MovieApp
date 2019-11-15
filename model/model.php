<?php
require_once('model/Manager.php');
class manageUser extends Manager {
    function verifyUser($username, $password) {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT username, password FROM users WHERE username = :username AND password = :password");
        $req->execute(array(
            'username' => $username,
            'password' => $password
        ));
        $result = $req->fetch();

        if (!$result) {
            echo 'Wrong username or password, please try again.';
        } else {
            header('Location: index.php?action=profile');
        }
    }
}
