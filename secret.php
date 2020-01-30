<?php
/**  
 * Secret page
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
session_start();

require_once "classes/AuthUser.php";

if (empty(AuthUser::getUser())) {
    header('Location: index.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>// s e c r e t //</title>
</head>
<body>
    <div class="container">
        <h1>ur a wizard <?php echo AuthUser::getUser() ?></h1>
    </div>    
</body>
</html>