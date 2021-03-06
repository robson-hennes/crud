<?php

namespace App\Classes;

class Database {

    private $pdo;

    public function __construct()
    {      
        try {
            $pdo = $this->pdo = new \PDO("mysql:dbname=crud;host=localhost", "root", "");
            echo 'Ok';
                   
        } catch (PDOExcepetion $e) {
            echo $e->getMessage();
        }
    }
   
}

?>