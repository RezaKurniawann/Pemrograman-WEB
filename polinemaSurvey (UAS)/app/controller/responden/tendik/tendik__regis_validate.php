<?php
require_once __DIR__ . ("/../../../connection/database.php");
require_once __DIR__ . ("/../../../modal/responden/responden_crud.php");

if (isset($_POST['regisTendik'])) {
  
    $db = new database ();
    $conn = $db->conn;

    //ambil data dari form
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = 'tendik';

    $nopeg = $_POST['nopeg'];
    $unit = $_POST['unit'];

    // Query untuk mencari data pada tabel user berdasarkan username
    $query = "SELECT * FROM m_user WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    // Validasi
    $cek = mysqli_num_rows($result);

    if ($cek > 0) {
        echo '<script>alert("Gagal Daftar, Username sudah ada");window.location.href = "../../../views/user/formRegis/tendik.php";</script>';
        exit;
    } else {
        $crud = new respondenCRUD();
        $user_id = $crud->createAkun($username, $name, $password, $role);
        $crud->createTendik($user_id, $nopeg, $name, $unit);

        echo '<script>alert("Berhasil Daftar");window.location.href = "../../../views/login.php";</script>';
        exit;
    }
}
?>