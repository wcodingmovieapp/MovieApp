<?php 
require("./model/model.php");
function loginPage() {
    require("./view/login.php");
}
// insert or connect the user
function loginUser($params){
    $model = new Model();
    $model->loginUser($params);
}

function viewProfile($userId) {
    $model = new Model();
    $user = $model->loadProfile($userId);
    header("./view/profile.php");
}