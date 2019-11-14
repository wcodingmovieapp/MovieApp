<?php 

function loginPage() {
    require("./view/login.php");
}

function loadProfile(){
    verifyUser();
    require('./model/model.php');
    require("./view/profile.php");
}