<?php
class DB 
{
    private $_host = "localhost";
    private $_port = 3306;
    private $_db = "php_login";
    private $_user = "root";
    private $_password = "";
    private $_options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    public $pdo;

    function __construct() 
    {
        try {
            $this->pdo = new PDO(
                "mysql:host=$this->_host;
                port=$this->_port;
                dbname=$this->_db;",
                $this->_user, 
                $this->_password,
                $this->_options
            );
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}