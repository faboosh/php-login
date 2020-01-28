<?php
    include_once "./classes/login.php";

    $login = new Login();

    if(!empty($_POST['username']) && !empty($_POST['password'])) {
        $login->loginUser($_POST['username'], $_POST['password']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <h1>Application Login</h1>
        <form action="index.php" method="POST" class="form">
            <input placeholder="Enter your username" name="username" type="text">
            <input placeholder="Enter your password" name="password" type="password">
            <button type="submit">Login</button>
        </form>
        <a href="signup.php">Sign up here!</a>
        <?php 
            if(!empty($GLOBALS['failedLogin'])) echo "<span class='failure'>Incorrect username or password</span>" 
        ?>
    </div>
</body>
</html>
