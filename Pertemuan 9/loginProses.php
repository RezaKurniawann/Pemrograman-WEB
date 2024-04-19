<?php
    include "koneksi.php";

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM user WHERE username = '$username' and password = '$password'";
    $result = mysqli_query($conn, $query);
    $cek = mysqli_num_rows($result);

    if ($cek){
        echo "Anda berhasil login"; ?>
        <a href="homeAdmin.html">Halaman Home</a>
    <?php
    } else {
        echo "Anda gagal Login, silahkan "; ?>
        <a href="loginForm.html">Login Kembali</a>
    <?php
        echo mysqli_error($conn); 
    }
?>