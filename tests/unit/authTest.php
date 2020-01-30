<?php
use PHPUnit\Framework\TestCase;

require_once "classes/auth.php";

class AuthTest extends TestCase
{
    private $_auth;

    public function __construct() 
    {
        parent::__construct();
        $this->_auth = new Auth();
    }

    public function testIsRegistered()
    {
        $existing_username = 'fabian';
        $non_existing_username = 'kalle';
        $this->assertTrue($this->_auth->isRegistered($existing_username));
        $this->assertFalse($this->_auth->isRegistered($non_existing_username));
    }

    public function testIsValidUsername() 
    {
        $valid_username = 'jhdfsjk2334';
        $invalid_username = ' /83 dwa =?"!';
        $this->assertTrue($this->_auth->isValidUsername($valid_username));        
        $this->assertFalse($this->_auth->isValidUsername($invalid_username));        
    }

    public function testLoginAuthentication() 
    {
        $valid_username = "fabian";      
        $invalid_username = ' /83 dwa =?"!';
        $valid_password = '123';
        $invalid_password = '645435';
        $this->assertTrue($this->_auth->loginAuthentication($valid_username, $valid_password));
        $this->assertFalse($this->_auth->loginAuthentication($invalid_username, $invalid_password));    
    }
}