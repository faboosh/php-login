<?php
include_once 'auth.php';
include_once 'db.php';

class Register {
    private $auth;
    private $db;

    function __construct() {
        //Sets up DB link
        $dbclass = new DB();
        $this->db = $dbclass->pdo;

        //Sets up authorization
        $this->auth = new Auth();
    }

    function registerUser($username, $password) {
        /*if(!$this->auth->isRegistered($username)) {
            $query = "INSERT INTO users 
                        (`username`, `password`) 
                        VALUES (:username, :password)";
            $statement = $this->db->prepare($query);
            $statement->bindValue(':username', $username);
            $statement->bindValue(':password', $password);
            return $statement->execute();
        } else {
            return false;
        }*/

        $passwordHash = password_hash($password, PASSWORD_BCRYPT, array("cost" => 12));

        $query = "INSERT INTO users 
                    (`username`, `password`) 
                    VALUES (:username, :password)";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $passwordHash);
        return $statement->execute();
    }
}