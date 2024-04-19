<?php
    session_start();
    if (isset($_COOKIE['username'])) {
        if ($_COOKIE['username'] == $username) {
            $_SESSION ['nama']= true;
        }
    }
    if (!isset($_SESSION["nama"])) {
        header("location: ../UTS/loginForm.php");
        exit;
    }
?>

<html>
    <head>
        <title> HOME </title>
    </head>
    <body>
        <h1> ini adalah home </h1>
        <a href="../UTS/Process/logout.php"> Log Out </a>
    </body>
</html>
