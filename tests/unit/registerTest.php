<?php
use PHPUnit\Framework\TestCase;

require_once "classes/register.php";

class RegisterTest extends TestCase
{
    private $_register;

    function __construct() 
    {
        parent::__construct();
        $this->_register = new Register();
    }

    public function testRegisterUser()
    {
        $random_valid_username = "";
        $random_valid_password = "";


        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";  
        $size = strlen( $chars );   
        for ($i = 0; $i < 10; $i++) {
            $random_valid_username .= $chars[ rand( 0, $size - 1 ) ];
            $random_valid_password .= $chars[ rand( 0, $size - 1 ) ];    
        }

        $this->assertTrue($this->_register->registerUser($random_valid_username, $random_valid_password));       
        $this->assertFalse($this->_register->registerUser($random_valid_username, $random_valid_password));       
    }
}
