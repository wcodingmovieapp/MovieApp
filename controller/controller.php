<?php 
require_once('./model/model.php');

function loginPage() {
    require("./view/login.php");
}

function loadProfile($postParams){
    $username = htmlspecialchars($postParams['username']);
    $password = htmlspecialchars($postParams['password']);
    $manageUser = new ManageUser();
    $result = $manageUser->verifyUser($username, $password);
    require("./view/profile.php");
}