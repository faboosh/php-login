<?php

    session_start();

    if(!isset($_SESSION['username'])) {
        header('Location: index.php');
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>// s e c r e t //</title>
</head>
<body>
    <div class="container">
        <h1>ur a wizard <?php echo $_SESSION['username'] ?></h1>
    </div>    
</body>
</html>