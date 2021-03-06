<?php
    /**  
     * Connection to SQL database
     * php version: 7.3.1
     * 
     * @category Util_Classes
     * @package  Php-login
     * @author   faboosh <fabulo1998@gmail.com>
     * @author   ashurw <fabulo1998@gmail.com>
     * @author   robin_neuman <fabulo1998@gmail.com>
     * @license  Open Source
     * @link     none
     * */
require_once "DB.php";

    /**  
     * Authentication packade
     * 
     * @category Util_Classes
     * @package  Php-login
     * @author   faboosh <fabulo1998@gmail.com>
     * @author   ashurw <fabulo1998@gmail.com>
     * @author   robin_neuman <fabulo1998@gmail.com>
     * @license  Open Source
     * @link     none
     * */
class AuthUser
{
    private $_db;

    /**  
     * Instatiates DB class and links PDO
     * */
    public function __construct()
    {
        $dbclass = new DB();
        $this->_db = $dbclass->pdo;
    }

    /**  
     * Checks if username is registered
     * 
     * @param $username Username to validate
     * 
     * @return any Returns user if found, otherwise false
     * */
    public function isRegistered($username = null) 
    {
        $query = "SELECT * FROM users WHERE username = :username";
        $statement = $this->_db->prepare($query);
        $statement->bindValue(':username', $username, PDO::PARAM_STR);

        $statement->execute();
        $found = (bool)$statement->fetch(PDO::FETCH_ASSOC); 
        return $found;
    }

    /**  
     * Checks if username is valid
     * 
     * @param $username Username to validate
     * 
     * @return bool based on if username is string or not empty
     * */
    public function isValidUsername($username)
    {
        return ctype_alnum($username);
    }

    /**  
     * Authenticates credentials entered by user against DB
     * 
     * @param $username Username from form 
     * @param $password Password from form 
     * 
     * @return bool based on if user is authenticated
     * */
    public function loginAuthentication($username, $password)
    {
        $query = "SELECT * FROM users WHERE username = :username";
        $statement = $this->_db->prepare($query);
        $statement->bindValue(':username', $username, PDO::PARAM_STR);

        if ($statement->execute()) {
            $userData = $statement->fetch(PDO::FETCH_ASSOC);
            return password_verify($password, $userData['password']);
        } else {
            return false;
        }
    }

    /**  
     * Gets username from session
     * 
     * @return bool based on if username is string or not empty
     * */
    public static function getUser() 
    {
        return $_SESSION['username'];
    }

    /**  
     * Saves username to session
     * 
     * @param $username Username to save
     * 
     * @return bool based on if username is string or not empty
     * */
    public static function setUser($username) 
    {
        $_SESSION['username'] = $username;
    }
}
