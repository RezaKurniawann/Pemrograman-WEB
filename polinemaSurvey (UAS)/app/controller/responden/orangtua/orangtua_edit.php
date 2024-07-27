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
    $jk = $_POST['jk'];
    $umur = $_POST['umur'];
    $pekerjaan = $_POST['pekerjaan'];
    $no_hp = $_POST['no_hp'];

    $query = "SELECT * FROM m_user WHERE user_id = '$id'";
    $result = mysqli_query($conn, $query);

    // Validasi
    $cek = mysqli_num_rows($result);

    if ($cek = 0) {
        echo '<script>alert("Gagal Melakukan Perubahan, Username Sudah Ada");window.location.href = "../../../views/admin/modul/orangtua.php";</script>';
        exit;
    } else {
        $crud = new respondenCRUD();
        $crud->updateOrangtua($id, $nama, $username, $password, $jk, $umur, $pekerjaan, $no_hp);

        header("Location: ../../../views/admin/modul/orangtua.php");
        exit;
    } 

}
?>
