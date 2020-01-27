<?php

class DB {
    private $host = "localhost";
    private $port = 3306;
    private $db = "php_login";
    private $user = "root";
    private $password = "";
    private $charset = "utf8mb";

    public $pdo;

    function __construct() {
        try {
            $this->pdo = new PDO(
                "mysql:host=$this->host;
                port=$this->port;
                dbname=$this->db;
                charset=$this->charset", 
                $this->user, 
                $this->password
            );
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}