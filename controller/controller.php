<?php 
require_once('./model/ManageUser.php');

function loginPage() {
    require("./view/login.php");
}
// insert or connect the user
function loginUser($params){
    $manageUser = new ManageUser();
    $userId = $manageUser->loginUser($params);
    if(isset($params['ajax'])) {
        echo $userId;
    } else if (isset($_SESSION['userId'])) {
        echo $_SESSION['userId'];
        header('Location: index.php?action=viewProfile');
    } else throw new Exception("Problem with login"); //or redirect to login pg and show message
}

function viewProfile($userId) {
    $manageUser = new ManageUser();
    $user = $manageUser->getProfileUserData($userId);
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

function logoutUser() {
    $_SESSION = [];
    session_destroy();
    header('Location: index.php');

}