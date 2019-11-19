<?php 
require("./controller/controller.php");
$rawBody = file_get_contents("php://input");
$bodyArr = (array) json_decode($rawBody);

if(empty($bodyArr)){ $bodyArr = $_REQUEST;}
try {
    if(isset($bodyArr['action'])) {
        if($bodyArr['action'] == 'login') {
            loginPage();
        } else if ($bodyArr['action'] == 'profile'){
            if(isset($bodyArr['username']) && isset($bodyArr['password'])) 
            {
                if(!empty($bodyArr['username']) && !empty($bodyArr['password'])) 
                {
                    //call the controller
                    loadProfile($bodyArr);
                } else {
                    throw new Exception('Error: Please fill in username and password');
                }

            }
        } else if($bodyArr['action'] == 'addMovie') {
            //print_r($bodyArr);
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
    require('./view/login.php');
}

