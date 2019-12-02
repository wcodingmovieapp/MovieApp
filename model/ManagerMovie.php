<?php
require_once("Manager.php");
class  ManagerMovie extends Manager {

   function checkDB($params){
      $db = $this->dbConnect();
      $req = $db->prepare("SELECT DISTINCT(count(id)) as nb_movies FROM Movie WHERE user_id=?");
      $req->execute(array(
         (int)$params['userId']
      ));
      $countData = $req->fetch();
      return $countData["nb_movies"];
   }

   function addMovie($params){
       $db = $this->dbConnect(); //connect DB
       $countData = $this->checkDB($params);
       $req = $db->prepare('INSERT INTO Movie(title, poster, director, actors, release_date, movie_id, user_id, ranking) VALUES(:title, :poster, :director, :actors, :release_date, :movie_id, :user_id, :ranking)');
       $req->execute(array(
         'title' => $params['title'], 
         'poster' => $params['poster'], 
         'director' => $params['director'], 
         'actors' => $params['actors'], 
         'release_date' => $params['releaseDate'], 
         'movie_id' => $params['movieId'], 
         'user_id' => $params['userId'], 
         'ranking' => $countData + 1
           ));
         $stmt = $db->query("SELECT LAST_INSERT_ID()");
         $lastId = $stmt->fetchColumn();
         return $lastId;
   }

   function getNewMovie($last_id){
      $db = $this->dbConnect(); //connect DB
      $req = $db->prepare('SELECT * FROM Movie WHERE id= ?');
      $req->execute(array(
         $last_id
      ));
      return $req->fetch();
   }

   function deleteMovie($params){
      $db = $this->dbConnect();
      $req->$db->prepare('DELETE FROM Movie WHERE user_id = :user_id AND title = :title');
      $req->execute(array(
            'user_id' => $params['userId'],
            'title' =>  $params['title']
      ));
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