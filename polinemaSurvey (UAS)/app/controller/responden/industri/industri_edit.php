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
    $jabatan = $_POST['jabatan'];
    $perusahaan = $_POST['perusahaan'];
    $no_hp = $_POST['no_hp'];
    $kota = $_POST['kota'];

    $query = "SELECT * FROM m_user WHERE user_id = '$id'";
    $result = mysqli_query($conn, $query);

    // Validasi
    $cek = mysqli_num_rows($result);

    if ($cek = 0) {
        echo '<script>alert("Gagal Melakukan Perubahan, Username Sudah Ada");window.location.href = "../../../views/admin/modul/industri.php";</script>';
        exit;
    } else {
        $crud = new respondenCRUD();
        $crud->updateIndustri($id, $nama, $username, $password, $jabatan, $perusahaan, $no_hp, $kota);
        header("Location: ../../../views/admin/modul/industri.php");
        exit;
    }
}
?>
