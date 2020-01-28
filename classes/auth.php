<?php
include_once "db.php";

class Auth
{
    private $db;

    public function __construct()
    {
        $dbclass = new DB();
        $this->db = $dbclass->pdo;
    }

    public function isRegistered($username = null)
    {
        $statement = $this->db->prepare('SELECT * FROM users WHERE username = :username');
        $statement->bindValue(':username', $username);
        return $statement->execute();
    }

    public function isValidUsername($username)
    {
        return is_string($username) && $username != '';
    }

    public function loginAuthentication($username, $password)
    {
        $query = "SELECT * FROM users WHERE username = :username";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':username', $username, PDO::PARAM_STR);

        if ($statement->execute()) {
            $userData = $statement->fetch(PDO::FETCH_ASSOC);
            return password_verify($password, $userData['password']);
        } else {
            return false;
        }
    }
}
