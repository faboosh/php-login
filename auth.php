<?php
include "db.php";

class Auth {
    private $db;

    function __construct() {
        $dbclass = new DB();
        $this->db = $dbclass->pdo;
    }

    function isRegistered($username) {
        $statement = $this->db->prepare('SELECT * FROM users WHERE username = :username');
        $statement->bindValue(':username', $username);
        return $statement->execute();
    }
}

