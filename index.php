<?php 
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
                if(!empty($bodyArr['socialM'])){
                   loginUser($bodyArr);
                } else {
                    throw new Exception('Error: problem with login');
                }
            }
        } else if($bodyArr['action'] == 'viewProfile') {
            if(!empty($bodyArr)) {
                viewProfile($bodyArr);
            } else {
                throw new Exception('Error: user not found');
            }
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

