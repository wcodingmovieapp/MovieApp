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
      echo "deleteMovie in manager";
      $db = $this->dbConnect();
      $req=$db->prepare('DELETE FROM Movie WHERE user_id = :user_id AND title = :title');
      $req->execute(array(
            'user_id' => $params['userId'],
            'title' =>  $params['title']
      ));
   }

   function updateRanking($params){
      echo "updateRanking in manager";
      print_r($params);
      $db = $this->dbConnect();
      $req=$db->prepare('UPDATE Movie SET ranking = 1 AND title = :first
                                          ranking = 2 AND title = :second
                                          ranking = 3 AND title = :third
                                          ranking = 4 AND title = :forth
                                          ranking = 5 AND title = :fifth'); 
      $req->execute(array(
            'first' => $params['1'],
            'second' =>  $params['2'],
            'third' => $params['3'],
            'forth' => $params['4'],
            'fifth' => $params['5']
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