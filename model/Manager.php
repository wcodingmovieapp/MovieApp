<?php

class Manager {

    protected function dbConnect() {
        return new PDO('mysql:host=localhost;dbname=MovieApp;charset=utf8', 'root', 'root');
    }
}
