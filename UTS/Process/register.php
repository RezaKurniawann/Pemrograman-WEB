<?php
include "../Process/koneksi.php";

if (isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['email'])) {
    // Ambil data yang dikirim melalui form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $check_query = "SELECT * FROM user WHERE username = '$username' OR email = '$email'";
    $check_result = mysqli_query($conn, $check_query);

    // Periksa apakah username atau email sudah ada dalam database
    if (mysqli_num_rows($check_result) > 0) {
        // Tampilkan pesan kesalahan jika username atau email sudah digunakan sebelumnya
        echo "<script>alert('Username atau email sudah digunakan. Silakan gunakan yang lain.');window.location.href='../registerForm.html';</script>";
        exit();
    } else {
        // Jika username atau email belum digunakan, lakukan proses insert data baru
        $insert_query = "INSERT INTO user (username, password, email) VALUES ('$username', '$password', '$email')";

        if (mysqli_query($conn, $insert_query)) {
            //ke halaman login jika registrasi berhasil
            header("location: ../loginForm.php");
            exit();
        } else {
            // Tampilkan pesan error jika terjadi kesalahan pada query
            echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
            exit();
        }
    }
} else {
    // Tampilkan pesan jika ada kolom yang belum diisi
    echo "<script>alert('Tolong Isi Semua Kolom!');window.location.href='../registerForm.html';</script>";
    exit();
}
?>
