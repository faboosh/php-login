<?php

include_once 'auth.php';

class Login
{
    private $auth;

    public function __construct()
    {
        //Sets up authorization
        $this->auth = new Auth();
    }

    public function loginUser($username, $password)
    {
        if ($this->auth->loginAuthentication($username, $password)) {
            session_start();
            $_SESSION['username'] = $username;
            $GLOBALS['failedLogin'] = false;
            header('Location: secret.php');
        } else {
            $GLOBALS['failedLogin'] = true;
        }
    }
}
