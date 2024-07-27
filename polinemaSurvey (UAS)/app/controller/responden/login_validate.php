<?php
session_start();

require_once __DIR__ . ("/../../connection/database.php");
require_once __DIR__ . ("/../../modal/responden/responden_crud.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {

        $db = new database();
        $conn = $db->conn;

        // Ambil data
        $username = $_POST['username']; 
        $password = $_POST['password']; 

        // Query untuk mencari data pada tabel user berdasarkan username dan password
        $query = "SELECT * FROM m_user WHERE username = ? and password = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        // Validasi
        $cek = $result->num_rows;

        // Periksa apakah ada satu baris yang sesuai dengan kombinasi username dan password
        if ($cek == 1) {
            $crud = new respondenCRUD();
            $user_info = $crud->takeUser($username); // Ambil nama dan role
            $user_id = $user_info ['user_id'];
            $name = $user_info ['nama']; 
            $role = $user_info ['role'];

            $_SESSION['user_id'] = $user_id;


            if ($role == 'admin') {
                $_SESSION['nama'] = $name;
                $_SESSION['role'] = $role;

                header("Location: ../../views/admin/modul/index.php");
                exit;
            } elseif ($role == 'alumni') {
                $responden_info = $crud -> takeDataAlumni($username);
                $responden_id = $responden_info ['responden_id'];

                $_SESSION['username'] = $username;
                $_SESSION['responden_id'] = $responden_id;
                $_SESSION['nama'] = $name;
                $_SESSION['role'] = $role;
                header("Location: ../../views/user/alumni/dashboard.php");
                exit;
            } elseif ($role == 'dosen') {
                $responden_info = $crud -> takeDataDosen($username);
                $responden_id = $responden_info ['responden_id'];

                $_SESSION['username'] = $username;
                $_SESSION['responden_id'] = $responden_id;
                $_SESSION['nama'] = $name;
                $_SESSION['role'] = $role;
                
                header("Location: ../../views/user/dosen/dashboard.php");
                exit;
            } elseif ($role == 'industri') {
                $responden_info = $crud -> takeDataIndustri($username);
                $responden_id = $responden_info ['responden_id'];

                $_SESSION['username'] = $username;
                $_SESSION['responden_id'] = $responden_id;
                $_SESSION['nama'] = $name;
                $_SESSION['role'] = $role;

                header("Location: ../../views/user/industri/dashboard.php");
                exit;
            } elseif ($role == 'mahasiswa') {
                $responden_info = $crud -> takeDataMahasiswa($username);
                $responden_id = $responden_info ['responden_id'];

                $_SESSION['username'] = $username;
                $_SESSION['responden_id'] = $responden_id;
                $_SESSION['nama'] = $name;
                $_SESSION['role'] = $role;

                header("Location: ../../views/user/mahasiswa/dashboard.php");
                exit;
            } elseif ($role == 'orangtua') {
                $responden_info = $crud -> takeDataOrangtua($username);
                $responden_id = $responden_info ['responden_id'];

                $_SESSION['username'] = $username;
                $_SESSION['responden_id'] = $responden_id;
                $_SESSION['nama'] = $name;
                $_SESSION['role'] = $role;
                
                header("Location: ../../views/user/orangtua/dashboard.php");
                exit;
            }  else {
                $responden_info = $crud -> takeDataTendik($username);
                $responden_id = $responden_info ['responden_id'];

                $_SESSION['username'] = $username;
                $_SESSION['responden_id'] = $responden_id;
                $_SESSION['nama'] = $name;
                $_SESSION['role'] = $role;
                header("Location: ../../views/user/tendik/dashboard.php");
                exit;

                
            }
        } else {
            header("Location: ../../views/login.php");
            exit;
        }
    }
}
?>