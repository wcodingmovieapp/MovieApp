<?php
require_once("Manager.php");
class  ManagerMovie extends Manager {

   function addMovies($params){

        print_r($params);
       $db = $this->dbConnect(); //connect DB
       $req = $db->prepare('INSERT INTO Movie(title, poster, director, actors, release_date, movie_id, user_id, ranking) VALUES(:name, :email, :facebook)');
       $req->execute(array(
               'email' => $params['email']
           ));
     echo json_encode(loadUserMovies($userId));
   }

   function loadUserMovies($userId){
    $db = $this->dbConnect(); //connect DB
       $req = $db->prepare('SELECT * FROM Users WHERE id = :user_id');
       $req->execute(array(
               'user_id' => $userId
           ));

    return $req;
   }
   
}