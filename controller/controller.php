<?php 
require_once('./model/ManagerUser.php');
require_once('./model/ManagerMovie.php');

function loginPage() {
    require("./view/login.php");
}
// insert or connect the user
function loginUser($params){
    $managerUser = new ManagerUser();
    $userId = $managerUser->loginUser($params);
    if(isset($params['ajax'])) {
        echo $userId;
    } else if (isset($_SESSION['userId'])) {
        echo $_SESSION['userId'];
        header('Location: index.php?action=viewProfile');
    } else throw new Exception("Problem with login"); //or redirect to login pg and show message
}

function viewProfile($userId) {
    $managerUser = new ManagerUser();
    $user = $managerUser->getProfileUserData($userId);
    $managerMovie = new ManagerMovie();
    $dataMovie= $managerMovie->loadMovies($user['id']);
    require("./view/profile.php");
}

function loadProfile($postParams){
    $username = htmlspecialchars($postParams['username']);
    $password = htmlspecialchars($postParams['password']);
    // $userId = 1;
    // loadUserMovies($userId);
    // $dataUser = verifyUser($username, $password);
    // loadUserMovies($dataUser['userId'])

    require("./view/profile.php");
}

function addMovie($params) {
    //$params <== $bodyArr <== movieData of movieDB.js
    $managerMovie = new ManagerMovie ();
    $listMovies = $managerMovie->addMovies($params);
    echo json_encode($listMovies);
}

function subscribeUser($params) {
    $managerUser = new ManagerUser();
    $errors = $managerUser->subscribeUser($params);
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