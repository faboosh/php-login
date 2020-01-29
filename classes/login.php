<?php

require_once 'auth.php';

class Login
{
    private $_auth;

    function __construct()
    {
        //Sets up authorization
        $this->_auth = new Auth();
    }

    public function loginUser($username, $password)
    {
        if ($this->_auth->loginAuthentication($username, $password)) {
            session_start();
            $_SESSION['username'] = $username;
            $GLOBALS['failedLogin'] = false;
            header('Location: secret.php');
        } else {
            $GLOBALS['failedLogin'] = true;
        }
    }
}
