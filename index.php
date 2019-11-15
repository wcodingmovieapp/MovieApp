<?php 
require("./controller/controller.php");

if(isset($_GET['action'])) {
    if($_GET['action'] == 'login') {
        loginPage();
    } else if ($_GET['action'] == 'loginUser'){
        if(isset($_REQUEST)){
            loginUser($_REQUEST);
        } else{
            echo "Problem with the login";
        }  
    } else if($_GET['action'] == 'viewProfile') {
        if(isset($_GET['userId'])) {
            viewProfile($_GET['userId']);
        } else {
            echo "user not found";
        }
        
    }
} else {
    loginPage();
}
