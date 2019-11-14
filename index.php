<?php 
require("./controller/controller.php");

if(isset($_GET['action'])) {
    if($_GET['action'] == 'login') {
        loginPage();
    } else if ($_GET['action'] == 'profile'){
        loadProfile();
    }
} else {
    loginPage();
}
