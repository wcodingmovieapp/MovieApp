<?php
require_once("Manager.php");
class  ManagerMovie extends Manager {

   function addMovies($params){
       $db = $this->dbConnect(); //connect DB
       $req = $db->prepare('INSERT INTO Movie(title, poster, director, actors, release_date, movie_id, user_id, ranking) VALUES(:title, :poster, :director, :actors, :release_date, :movie_id, :user_id, :ranking)');
       $req->execute(array(
         'title' => $params['title'], 
         'poster' => $params['poster'], 
         'director' => $params['director'], 
         'actors' => $params['actors'], 
         'release_date' => $params['releaseDate'], 
         'movie_id' => $params['movieId'], 
         'user_id' => $params['userId'], 
         'ranking' => 1
           ));
        return $this->loadMovies($params['userId']);
   }

   function loadMovies($userId){
       $db = $this->dbConnect(); //connect DB
       $req = $db->prepare('SELECT * FROM Movie WHERE user_id = :user_id ORDER BY ranking');
       $req->execute(array(
               'user_id' => $userId
           ));
        return $req->fetchAll();
   }
   
}