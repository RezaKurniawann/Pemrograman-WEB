<?php

include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}


$sql = "SELECT * FROM user WHERE username='$username' and password = '$password'";
$result = mysqli_query($conn, $sql);
$cek = mysqli_num_rows($result);

if ($cek > 0) {
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['status'] = 'login';
    ?>
    Anda Berhasil Login, silahkan menuju
    <a href = "homeSession.php"> Halamn Home </a>
    <?php

    
} else {
    ?>
    Gagal Login, silahkan login lagi
    <a href="sessionLoginForm.html"> Halam Login </a>
    echo mysqli_error($connect);
    <?php
}
?>