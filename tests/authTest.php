<?php
use PHPUnit\Framework\TestCase;

require_once "classes/auth.php";

class AuthTest extends TestCase
{
    private $_auth;

    public function __construct() 
    {
        $this->_auth = new Auth();
    }

    public function testIsRegistered()
    {
        /*$username = [];*/
        $username = 'fabian';
        $this->assertEquals(true, $this->_auth->isRegistered($username));
        //$this->assertSame(1, 1);
    }

    public function isValidUsernameTest() 
    {
        
    }

    public function loginAuthenticationTest() 
    {
        
    }
}