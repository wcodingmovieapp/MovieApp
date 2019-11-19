<?php 
require_once('./model/ManagerUser.php');
require_once('./model/ManagerMovie.php');

function loginPage() {
    require("./view/login.php");
}

function loadProfile($postParams){
    $username = htmlspecialchars($postParams['username']);
    $password = htmlspecialchars($postParams['password']);
    verifyUser($username, $password);
    require("./view/profile.php");
}

function addMovie($params) {
    //$params <== $bodyArr <== movieData of movieDB.js
    $managerMovie = new ManagerMovie ();
    $managerMovie->addMovies($params);
}