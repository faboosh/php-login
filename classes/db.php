<?php

class DB {
    private $host = "localhost";
    private $port = 3306;
    private $db = "php_login";
    private $user = "root";
    private $password = "";
    private $charset = "utf8mb";
    private $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    public $pdo;

    function __construct() {
        try {
            $this->pdo = new PDO(
                "mysql:host=$this->host;
                port=$this->port;
                dbname=$this->db;",
                //charset=$this->charset", 
                $this->user, 
                $this->password,
                $this->options
            );
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}