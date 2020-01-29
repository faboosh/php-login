<?php
require_once 'db.php';
require_once 'auth.php';

class Register
{
    private $_auth;
    private $_db;

    public function __construct()
    {
        //Sets up DB link
        $dbclass = new DB();
        $this->_db = $dbclass->pdo;

        //Sets up authorization
        $this->_auth = new Auth();
    }

    public function registerUser($username, $password)
    {
        if (ctype_alnum($username)) {
            //echo "User to be registered: $username <br>";
            //echo "Found: ".$this->_auth->isRegistered($username);
            $found = $this->_auth->isRegistered($username);
            echo $found;
            if ($found) {
                echo "hejehekwhrkwhlkfha";
            }
            if (!$found) {
                $passwordHash = password_hash(
                    $password, PASSWORD_BCRYPT, array("cost" => 12)
                );

                $query = "INSERT INTO users
                            (`username`, `password`)
                            VALUES (:username, :password)";
                $statement = $this->_db->prepare($query);
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