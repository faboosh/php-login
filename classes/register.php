<?php
include_once 'auth.php';
include_once 'db.php';

class Register
{
    private $auth;
    private $db;

    public function __construct()
    {
        //Sets up DB link
        $dbclass = new DB();
        $this->db = $dbclass->pdo;

        //Sets up authorization
        $this->auth = new Auth();
    }

    public function registerUser($username, $password)
    {
        if (ctype_alnum($username)) {
            if (!$this->auth->isRegistered($username)) {
                $passwordHash = password_hash($password, PASSWORD_BCRYPT, array("cost" => 12));

                $query = "INSERT INTO users
                            (`username`, `password`)
                            VALUES (:username, :password)";
                $statement = $this->db->prepare($query);
                $statement->bindValue(':username', $username, PDO::PARAM_STR);
                $statement->bindValue(':password', $passwordHash, PDO::PARAM_STR);
                return $statement->execute();
            } else {
                $GLOBALS['failedReg'] = "Username already exists";
            }
        } else {
            $GLOBALS['failedReg'] = "Username must only contain letters and numbers";
            return false;
        }
    }
}
