<?php
require_once __DIR__ . ("/../../../connection/database.php");
require_once __DIR__ . ("/../../../modal/responden/responden_crud.php");

if (isset($_POST['regisMahasiswa'])) {

    $db = new database ();
    $conn = $db->conn; 
  
    //ambil data dari form
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = 'mahasiswa';

    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];
    $tahunmasuk = $_POST['tahunmasuk'];
    
    // Query untuk mencari data pada tabel user berdasarkan username
    $query = "SELECT * FROM m_user WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    // Validasi
    $cek = mysqli_num_rows($result);

    if ($cek > 0) {
        echo '<script>alert("Gagal Daftar, Username sudah ada");window.location.href = "../../../views/user/formRegis/mahasiswa.php";</script>';
        exit;
    } else {
        $crud = new respondenCRUD();
        $user_id = $crud->createAkun($username, $name, $password, $role);
        $crud->createMahasiswa($user_id, $nim, $name, $prodi, $email, $nohp, $tahunmasuk);
        
        echo '<script>alert("Berhasil Daftar");window.location.href = "../../../views/login.php";</script>';
        exit;
    }
}
?>