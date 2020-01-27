<?php
include_once "db.php";

class Auth {
    private $db;

    function __construct() {
        $dbclass = new DB();
        $this->db = $dbclass->pdo;
    }

    function isRegistered($username = null) {
        $statement = $this->db->prepare('SELECT * FROM users WHERE username = :username');
        $statement->bindValue(':username', $username);
        return $statement->execute();
    }

    function isValidUsername($username) {
        return is_string($username) && $username != ''; 
    }
}

