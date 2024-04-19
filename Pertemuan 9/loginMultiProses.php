<?php
include "koneksi.php";

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil data dari formulir
$username = $_POST['username']; // Ambil data yang ingin Anda cari
$password = md5($_POST['password']); // Ambil kata sandi


// Query untuk mencari data yang cocok berdasarkan username dan password
$query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

if ($row) {
    if ($row['level'] == 1) {
        echo "Anda berhasil login. Silahkan menuju <a href='homeAdmin.html'>Halaman HOME</a>";
    } elseif ($row['level'] == 2) {
        echo "Anda berhasil login. Silahkan menuju <a href='homeGuest.html'>Halaman HOME</a>";
    } else {
        echo "Anda gagal Login. Silahkan <a href='loginForm.html'>Login Kembali</a>";
    }
} else {
    echo "Anda gagal Login. Silahkan <a href='loginForm.html'>Login Kembali</a>";
    echo "Error: " . mysqli_error($conn);
}

   


// Tutup koneksi
mysqli_close($conn);


?>