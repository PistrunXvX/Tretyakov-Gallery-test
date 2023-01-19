<?php

// Подключение к БД 

class DataBase {

    private $host = 'mysql';
    private $port = 3306;
    private $user = 'admin';
    private $password = '12345678';
    private $dbname = 'tretyakov_gallery';
    public $pdo;

    public function getConnection() {
        try {
            $this->pdo = new PDO("mysql:host=$this->host:$this->port;dbname=$this->dbname", "$this->user", "$this->password");
        } catch (PDOException $e) {
            echo "Failed to connect Database: " . $e->getMessage();
        }

        return $this->pdo;
    }
}