<?php
require_once __DIR__ . "/../../../connection/database.php";
require_once __DIR__ . "/../../../modal/responden/responden_crud.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $db = new database();
    $conn = $db->conn;
    
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nip = $_POST['nip'];
    $unit = $_POST['unit'];

    $query = "SELECT * FROM m_user WHERE user_id = '$id'";
    $result = mysqli_query($conn, $query);

    // Validasi
    $cek = mysqli_num_rows($result);

    if ($cek = 0) {
        echo '<script>alert("Gagal Melakukan Perubahan, Username Sudah Ada");window.location.href = "../../../views/admin/modul/dosen.php";</script>';
        exit;
    } else {
        $crud = new respondenCRUD();
        $crud->updateDosen($id, $nama, $username, $password, $nip, $unit);
        header("Location: ../../../views/admin/modul/dosen.php");
        exit;
    }
}
?>
