<?php
include "../Process/koneksi.php";

// Memastikan input tidak ada yang kosong
if (isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['email'])) {
    // Ambil data yang dikirim melalui form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Query untuk memeriksa apakah username atau email sudah ada dalam database
    $check_query = "SELECT * FROM user WHERE username = '$username' OR email = '$email'";
    $check_result = mysqli_query($conn, $check_query);

    // Periksa apakah username atau email sudah ada dalam database
    if (mysqli_num_rows($check_result) > 0) {
        header("location: ../registerForm.html");
        exit();
    } else {
        // Jika username atau email belum digunakan, lakukan proses insert data baru
        $insert_query = "INSERT INTO user (username, password, email) VALUES ('$username', '$password', '$email')";

        if (mysqli_query($conn, $insert_query)) {
            header("location: ../loginForm.php" );
            exit();
        } else {
            echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
            exit();
        }
    }
} else {
    header("location: ../registerForm.html");
    exit();
}

// Tutup koneksi database
mysqli_close($conn);
?>
