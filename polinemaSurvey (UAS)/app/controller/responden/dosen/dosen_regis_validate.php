<?php
require_once __DIR__ . ("/../../../connection/database.php");
require_once __DIR__ . ("/../../../modal/responden/responden_crud.php");

if (isset($_POST['regisDosen'])) {

    $db = new database ();
    $conn = $db->conn;

    // Ambil data dari form
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = 'dosen';

    $nip = $_POST['nip'];
    $unit = $_POST['unit'];
    

    // Query untuk mencari data pada tabel user berdasarkan username
    $query = "SELECT * FROM m_user WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    // Validasi
    $cek = mysqli_num_rows($result);

    if ($cek > 0) {
        echo '<script>alert("Gagal Daftar, Username sudah ada");window.location.href = "../../../views/user/formRegis/dosen.php";</script>';
        exit;
    } else {
        $crud = new respondenCRUD();
        $user_id = $crud->createAkun($username, $name, $password, $role);
        $crud->createDosen($user_id, $nip, $name, $unit);

        echo '<script>alert("Berhasil Daftar");window.location.href = "../../../views/login.php";</script>';
        exit;
    } 
}    
?>