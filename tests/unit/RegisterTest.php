<?php
/**  
 * PHP-unit
 * PHP version 7.3.1
 * 
 * @category Testing
 * @package  PHP-unit
 * @author   someone <kalle@foobar.com>
 * @license  Open Source
 * @link     none
 * */
use PHPUnit\Framework\TestCase;

require_once "classes/Register.php";

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
class RegisterTest extends TestCase
{
    private $_register;

    /**
     * Instantiates register class 
     */
    function __construct() 
    {
        parent::__construct();
        $this->_register = new Register();
    }

    /**
     * Test for registerUser method which generates
     * a random username and password, and then tries
     * inserting it twice, expecting a success
     * the first time, and a failiure on the
     * second time 
     * 
     * @return void
     */
    public function testRegisterUser()
    {
        $random_valid_username = "";
        $random_valid_password = "";


        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";  
        $size = strlen($chars);   
        for ($i = 0; $i < 10; $i++) {
            $random_valid_username .= $chars[ rand(0, $size - 1) ];
            $random_valid_password .= $chars[ rand(0, $size - 1) ];    
        }

        $this->assertTrue(
            $this->_register->registerUser(
                $random_valid_username, $random_valid_password
            )
        );

        $this->assertFalse(
            $this->_register->registerUser(
                $random_valid_username, $random_valid_password
            )
        );
    }
}
