<?php
require_once __DIR__ . ("/../../../connection/database.php");
require_once __DIR__ . "/../../../modal/responden/responden_crud.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $db = new database();
    $conn = $db->conn;
    
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];
    $no_hp = $_POST['no_hp'];
    $tahun_masuk = $_POST['tahun_masuk'];

    $query = "SELECT * FROM m_user WHERE user_id = '$id'";
    $result = mysqli_query($conn, $query);

    // Validasi
    $cek = mysqli_num_rows($result);

    if ($cek = 0) {
        echo '<script>alert("Gagal Melakukan Perubahan, Username Sudah Ada");window.location.href = "../../../views/admin/modul/mahasiswa.php";</script>';
        exit;
    } else {
        $crud = new respondenCRUD();
        $crud->updateMahasiswa($id, $nama, $username, $password, $nim, $prodi, $no_hp, $tahun_masuk);

        header("Location: ../../../views/admin/modul/mahasiswa.php");
        exit;
    } 
}
