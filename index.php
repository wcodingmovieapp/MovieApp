<?php 
session_start();
require("./controller/controller.php");
$rawBody = file_get_contents("php://input");
$bodyArr = (array) json_decode($rawBody);
if(empty($bodyArr)) { $bodyArr =  $_REQUEST;}
try {
    if(isset($bodyArr['action'])) {
        if($bodyArr['action'] == 'login') {
            loginPage();
        } else if ($bodyArr['action'] == 'subscribeUser'){
            subscribeUser($bodyArr);
        } else if ($bodyArr['action'] == 'loginUser'){
            if(isset($bodyArr['username']) && isset($bodyArr['password'])) 
            {
                loginUser($bodyArr);
            } else {
                throw new Exception('Error: login error');
            }
        } else if($bodyArr['action'] == 'viewProfile') {
            if (isset($_SESSION['userId'])) {
                viewProfile($_SESSION['userId']);
            }
            
        } else if ($bodyArr['action'] == 'logoutUser') {
            logoutUser();
        } else if ($bodyArr['action'] == 'addMovie') {
                addMovie($bodyArr);
        }
    }
    else {
        loginPage();
    } 
}   
catch(Exception $e) {
    $errorMessage = $e->getMessage();
    $errorFile = $e->getFile();
    require('./view/error.php');
}

