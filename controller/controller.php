<?php 

function loginPage() {
    require("./view/login.php");
}

function loadProfile($postParams){
    $username = htmlspecialchars($postParams['username']);
    $password = htmlspecialchars($postParams['password']);
    verifyUser($username, $password);
    require("./model/model.php");
    require("./view/profile.php");
}