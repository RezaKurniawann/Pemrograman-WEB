<?php
require_once __DIR__ . ("/../../../connection/database.php");
require_once __DIR__ . ("/../../../modal/responden/responden_crud.php");

if (isset($_POST['regisAlumni'])) {    
    $db = new database();
    $conn = $db->conn;

    // Ambil data dari form
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = 'alumni';

    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];
    $tahunlulus = $_POST['tahunlulus'];
    
    $query = "SELECT * FROM m_user WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    // Validasi
    $cek = mysqli_num_rows($result);

    if ($cek > 0) {
        echo '<script>alert("Gagal Daftar, Username sudah ada");window.location.href = "../../../views/user/formRegis/alumni.php";</script>';
        exit;
    } else {
        $crud = new respondenCRUD();
        $user_id = $crud->createAkun($username, $name, $password, $role);
        $crud->createAlumni($user_id, $nim, $name, $prodi, $email, $nohp, $tahunlulus);

        echo '<script>alert("Berhasil Daftar");window.location.href = "../../../views/login.php";</script>';
        exit;
    } 
}
?>