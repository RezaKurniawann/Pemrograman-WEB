<?php
require_once __DIR__ . ("/../../../connection/database.php");
require_once __DIR__ . ("/../../../modal/responden/responden_crud.php");

if (isset($_POST['regisOrtu'])) {

    $db = new database ();
    $conn = $db->conn;

    //ambil data dari form
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = 'orangtua';

    $jenis_kelamin = $_POST['jenis_kelamin'];
    $umur = $_POST['umur'];
    $nohp = $_POST['nohp'];
    $pendidikan = $_POST['pendidikan'];
    $pekerjaan = $_POST['pekerjaan'];
    $nim_mahasiswa = $_POST['nim_mahasiswa'];
    $nama_mahasiswa = $_POST['nama_mahasiswa'];
    $prodi_mahasiswa = $_POST['prodi'];
    
    // Query untuk mencari data pada tabel user berdasarkan username
    $query = "SELECT * FROM m_user WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    // Validasi
    $cek = mysqli_num_rows($result);

    if ($cek > 0) {
        echo '<script>alert("Gagal Daftar, Username sudah ada");window.location.href = "../../../views/user/formRegis/orangtua.php";</script>';
        exit;
    } else {
        $crud = new respondenCRUD();
        $user_id = $crud->createAkun($username, $name, $password, $role);
        $crud->createOrtu($user_id, $name, $jenis_kelamin, $umur, $nohp, $pendidikan, $pekerjaan, $nim_mahasiswa, $nama_mahasiswa, $prodi_mahasiswa);
        
        echo '<script>alert("Berhasil Daftar");window.location.href = "../../../views/login.php";</script>';
        exit;
    }
}
?>