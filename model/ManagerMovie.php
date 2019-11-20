<?php
require_once("Manager.php");
class  ManagerMovie extends Manager {

   function addMovies($params){

        print_r($params);
       $db = $this->dbConnect(); //connect DB
       $req = $db->prepare('INSERT INTO Movie(title, poster, director, actors, release_date, movie_id, user_id, ranking) VALUES(:title, :poster, :director, :actors, :release_date, :movie_id, :user_id, :ranking)');
       $req->execute(array(
         'title' => $params['title'], 
         'poster' => $params['poster'], 
         'director' => $params['director'], 
         'actors' => $params['actors'], 
         'release_date' => $params['releaseDate'], 
         'movie_id' => $params['movieId'], 
         'user_id' => 1, 
         'ranking' => 1
           ));
     echo json_encode(loadUserMovies($userId));
   }

   function loadUserMovies($userId){
    $db = $this->dbConnect(); //connect DB
       $req = $db->prepare('SELECT * FROM Users WHERE id = :user_id');
       $req->execute(array(
               'user_id' => $userId
           ));
        echo '<ul>';
        while($data = $req->fetch()) {
          echo '<li>'.$data['title'].'</li>';
        }
        echo '</ul>';

    return $req;
   }
   
}