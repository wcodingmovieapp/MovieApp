<?php 
require_once('./model/model.php');

function loginPage() {
    require("./view/login.php");
}
// insert or connect the user
function loginUser($params){
    $model = new Model();
    $model->loginUser($params);
}

function loadProfile($postParams){
    $username = htmlspecialchars($postParams['username']);
    $password = htmlspecialchars($postParams['password']);
    $manageUser = new ManageUser();
    $result = $manageUser->verifyUser($username, $password);
    require("./view/profile.php");
}

function viewProfile($userId) {
    $model = new Model();
    $user = $model->loadProfile($userId);
    header("./view/profile.php");
}