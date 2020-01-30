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

/**  
 * DB class
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
class DB
{
    private $_host = "127.0.0.1";
    private $_port = 3306;
    private $_db = "php_login";
    private $_user = "root";
    private $_password = "";
    private $_options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    public $pdo;
    /**  
     * Connection to SQL database.
     * Throws exception on failed
     * connetion
     * */
    function __construct() 
    {
        try {
            $this->pdo = new PDO(
                "mysql:host=".$this->_host.";
                port=".$this->_port.";
                dbname=".$this->_db.";",
                $this->_user, 
                $this->_password,
                $this->_options
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}