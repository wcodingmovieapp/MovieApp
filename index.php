<?php 
require("./controller/controller.php");

try {
    if(isset($_GET['action'])) {
        if($_GET['action'] == 'login') {
            loginPage();
        } else if ($_GET['action'] == 'profile'){
            if(isset($_POST['username']) && isset($_POST['password'])) 
            {
                if(!empty($_POST['username']) && !empty($_POST['password'])) 
                {
                    //call the controller     
                    loadProfile($_POST);
                } else {
                    throw new Exception('Error: Please fill in username and password');
                }

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

