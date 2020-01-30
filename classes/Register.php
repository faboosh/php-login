<?php
/**  
 * Connection to SQL database
 * php version: 7.3.1
 * 
 * @category Util_Classes
 * @package  Php-DB
 * @author   faboosh <fabulo1998@gmail.com>
 * @author   ashurw <ashurw@gmail.com>
 * @author   robin_neuman <robinneuman@hotmail.com>
 * @license  Open Source
 * @link     none
 * */
require_once 'DB.php';

/**  
 * AuthUser class
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
require_once 'AuthUser.php';

/**  
 * Register class
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
class Register
{
    private $_authUser;
    private $_db;

    /**  
     * Lets up DB link 
     * */
    public function __construct()
    {
        //Sets up DB link
        $dbclass = new DB();
        $this->_db = $dbclass->pdo;

        //Sets up authorization
        $this->_authUser = new AuthUser();
    }

    /**  
     * Checks if credentials are valid
     * 
     * @param $username Username to validate
     * @param $password Password to validate
     * 
     * @return any Returns user if found, otherwise false
     * */
    public function registerUser($username, $password)
    {
        if ($this->_authUser->isValidUsername($username)) {
            if (!$this->_authUser->isRegistered($username)) {
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
                return false;
        } else {
            $GLOBALS['failedReg'] = "Username must only contain letters and numbers";
            return false;
        }
    }
}