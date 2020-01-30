<?php
    /**  
     * Tests authentication of user
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

use PHPUnit\Framework\TestCase;

require_once "classes/AuthUser.php";

    /**  
     * Authentication package
     * 
     * @category Util_Classes
     * @package  Php-login
     * @author   faboosh <fabulo1998@gmail.com>
     * @author   ashurw <fabulo1998@gmail.com>
     * @author   robin_neuman <fabulo1998@gmail.com>
     * @license  Open Source
     * @link     none
     * */

class AuthTest extends TestCase
{
    private $_authUser;
    /**  
     * Instatiates AuthTest class
     * */
    public function __construct() 
    {
        parent::__construct();
        $this->_authUser = new AuthUser();
    }
    /**  
     * Function for testing isRegistered() in Auth.php
     * 
     * @return void
     */
    public function testIsRegistered()
    {
        $existing_username = 'fabian';
        $non_existing_username = 'kalle';
        $this->assertTrue($this->_authUser->isRegistered($existing_username));
        $this->assertFalse($this->_authUser->isRegistered($non_existing_username));
    }
    /**  
     * Function for testing isValidUsername() in Auth.php
     * 
     * @return void
     * */
    public function testIsValidUsername() 
    {
        $valid_username = 'jhdfsjk2334';
        $invalid_username = ' /83 dwa =?"!';
        $this->assertTrue($this->_authUser->isValidUsername($valid_username)); 
        $this->assertFalse($this->_authUser->isValidUsername($invalid_username)); 
    }
    /**  
     * Function for testing loginAuthentication() in Auth.php
     * 
     * @return void
     * */
    public function testLoginAuthentication() 
    {
        $valid_username = "fabian";      
        $invalid_username = ' /83 dwa =?"!';
        $valid_password = '123';
        $invalid_password = '645435';
        $this->assertTrue(
            $this->_authUser->loginAuthentication(
                $valid_username, $valid_password
            )
        );
        $this->assertFalse(
            $this->_authUser->loginAuthentication(
                $invalid_username, $invalid_password
            )
        );    
    }
}