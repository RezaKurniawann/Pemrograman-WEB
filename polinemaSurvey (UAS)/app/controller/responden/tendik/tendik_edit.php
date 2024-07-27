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
    $nopeg = $_POST['nopeg'];
    $unit = $_POST['unit'];

    $query = "SELECT * FROM m_user WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    // Validasi
    $cek = mysqli_num_rows($result);

    if ($cek > 0) {
        echo '<script>alert("Gagal Melakukan Perubahan, Username Sudah Ada");window.location.href = "../../../views/admin/modul/tendik.php";</script>';
        exit;
    } else {
        $crud = new respondenCRUD();
        $crud->updateTendik($id, $nama, $username, $password, $nopeg, $unit);
        header("Location: ../../../views/admin/modul/tendik.php");
        exit;
    }
}
?>
