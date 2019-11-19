<?php

class Manager {

    protected function dbConnect() {
        return new PDO('mysql:host=localhost;dbname=Projects;charset=utf8', 'root', 'root');
    }
}