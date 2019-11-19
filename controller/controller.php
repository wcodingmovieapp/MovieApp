<?php 
require_once('./model/ManageUser.php');

function loginPage() {
    require("./view/login.php");
}
// insert or connect the user
function loginUser($params){
    $manageUser = new ManageUser();
    $manageUser->loginUser($params);
}

function viewProfile($params) {
    $manageUser = new ManageUser();
    $user = $manageUser->viewProfile($params);
    require("./view/profile.php");
}
function subscribeUser($params) {
    $manageUser = new ManageUser();
    $errors = $manageUser->subscribeUser($params);
    $location = "Location:index.php?action=login&";
    if($errors !== "success") {
        $location.="errors=".json_encode($errors);
    } else if ($errors == "success") {
        $location.="errors=success";
    }
    header($location);
}