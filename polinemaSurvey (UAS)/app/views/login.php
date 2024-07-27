<?php
session_start();
if (isset($_SESSION["username"])) {
    if ($_SESSION ["role"] == "admin") {
        header("Location: ../views/admin/modul/index.php");
        exit;
    } elseif ($_SESSION ["role"] == "alumni") {
        header("Location: ../views/user/alumni/dashboard.php");
        exit;
    } elseif ($_SESSION ["role"] == "dosen") {
        header("Location: ../views/user/dosen/dashboard.php");
        exit;
    } elseif ($_SESSION ["role"] == "industri") {
        header("Location: ../views/user/industri/dashboard.php");
        exit;
    } elseif ($_SESSION ["role"] == "mahasiswa") {
        header("Location: ../views/user/mahasiswa/dashboard.php");
        exit;
    } elseif ($_SESSION ["role"] == "orangtua") {
        header("Location: ../views/user/orangtua/dashboard.php");
        exit;
    } elseif ($_SESSION ["role"] == "tendik") {
        header("Location: ../views/user/tendik/dashboard.php");
        exit;
    } 
} 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <link rel="stylesheet" href="../../public/css/styleLoginRegis.css">
</head>
<body>
    <div class="container-login">
        <div class="image">
            <img src="../../public/image/polinema-logo.png">
            <p>Polinema Survey</p>
        </div>
        <form action="../controller/responden/login_validate.php" method="post">
            <div class="box-login">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter Username" required>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter Password" required>
            </div>
            <div class="submit">
                <input type="submit" name="login" value="Login">
            </div>
            <div class="switch">
                <p>Belum punya akun?
                <a href="role.php">Register</a>
                </p>
            </div>
        </form>
    </div>
</body>
</html>


