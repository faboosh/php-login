<?php
/**  
 * Connection to Auth class
 * php version: 7.3.1
 * 
 * @category Util_Classes
 * @package  Php-login
 * @author   faboosh <fabulo1998@gmail.com>
 * @author   ashurw <ashurw@gmail.com>
 * @author   robin_neuman <robinneuman@hotmail.com>
 * @license  Open Source
 * @link     none
 * */

require_once 'AuthUser.php';

/**  
 * Login class
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
class Login
{
    private $_authUser;
    
    /**  
     * Sets up authUser instance    
     * */
    function __construct()
    {
        //Sets up authorization
        $this->_authUser = new AuthUser();
    }

    /**  
     * Checks if credentials are valid
     * 
     * @param $username Username to validate
     * @param $password Password to validate
     * 
     * @return void
     * */
    public function loginUser($username, $password)
    {
        if ($this->_authUser->loginAuthentication($username, $password)) {
            session_start();
            $this->_authUser->setUser($username);
            $GLOBALS['failedLogin'] = false;
            header('Location: secret.php');
        } else {
            $GLOBALS['failedLogin'] = true;
        }
    }
}
