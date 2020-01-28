<?php
include_once './classes/register.php';
$register = new Register();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $register->registerUser($_POST['username'], $_POST['password']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <h1>Application Registration</h1>
        <form action="signup.php" method="POST" class="form">
            <input placeholder="Enter your username" name="username" type="text">
            <input placeholder="Enter your password" name="password" type="password">
            <button type="submit">Register</button>
        </form>
        <a href="index.php">Login here!</a>
        <?php
            if (!empty($GLOBALS['failedReg'])) {
                echo "<span class='failure'>" . $GLOBALS['failedReg'] . "</span>";
            }
        ?>
    </div>
</body>
</html>