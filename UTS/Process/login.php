<?php
session_start();
include "../Process/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Ambil data
        $username = $_POST['username']; 
        $password = $_POST['password']; 

        // Query untuk mencari data yang cocok berdasarkan username dan password
        $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $query);

        //validasi
        $cek = mysqli_num_rows($result);

        // Periksa apakah ada satu baris yang sesuai dengan kombinasi username dan password
        if ($cek == 1) {
            //set session
            $_SESSION["nama"] = $username;
            header("location:../index.php");
            exit;
        } else {
            header("location: ../loginForm.php");
            exit;
        }
    } else {
        // Jika input kosong, kembalikan ke halaman login
        header("Location: ../loginForm.php");
        exit;
    }
    // Tutup koneksi database
    mysqli_close($conn);
}
?>
