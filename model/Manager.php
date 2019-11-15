<?php 
class Manager
{
    protected function dbConnect() {
        // Connexion to the database
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=Projects;charset=utf8', 'root', 'root');
            return $db;
        }
        catch(Exception $e)
        {
                die('Error : '.$e->getMessage());
        }
    }    
}
?>