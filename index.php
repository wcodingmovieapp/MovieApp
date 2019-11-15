<?php 
require("./controller/controller.php");

try {
    if(isset($_GET['action'])) {
        if($_GET['action'] == 'login') {
            loginPage();
        } else if ($_GET['action'] == 'loginUser'){

            if(isset($_POST['username']) && isset($_POST['password'])) 
            {
                if(!empty($_REQUEST["socialM"])){
                   loginUser($_REQUEST);
                } else{
                    throw new Exception('Error: problem with login');
                }
            }
        } else if($_GET['action'] == 'viewProfile') {
            if(!empty($_REQUEST)) {
                viewProfile($_REQUEST);
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

