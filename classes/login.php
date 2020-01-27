<?php

include_once 'auth.php';
include_once 'db.php';

class Login {
    private $auth;
    private $db;

    function __construct() {
        //Sets up DB link
        $dbclass = new DB();
        $this->db = $dbclass->pdo;

        //Sets up authorization
        $this->auth = new Auth();
    }

    function loginUser($username, $password) {
        $query = "SELECT * FROM users WHERE username = :username";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':username', $username);
        $userData = $statement->fetch(PDO::FETCH_ASSOC);
        print_r($userData);
        //$this->auth->authlogin
    }
}