<?php 
require("./controller/controller.php");

try {
    if(isset($_GET['action'])) {
        if($_GET['action'] == 'login') {
            loginPage();
        } else if ($_GET['action'] == 'profile'){
            loadProfile();
        }
    } else {
        loginPage();
    }
}
catch(Exception $e) {
    $errorMessage = $e->getMessage();
    $errorFile = $e->getFile();
    require('./view/login.php');
}

