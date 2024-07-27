<?php
require_once __DIR__ . ("/../../connection/database.php");
require_once __DIR__ . ("/../survey/survey_crud.php");

class respondenCRUD {
    private $db;
    private $crud;

    public function __construct() {
        $this->db = new Database();
        $this->crud = new surveyCRUD();
    }

    // ========================= CREATE ============================
    public function createAkun($username, $name, $password, $role) {
        $conn = $this->db->conn;
        $stmt = $conn->prepare("INSERT INTO m_user (username, nama, password, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $name, $password, $role);
        $stmt->execute();
        
        // Select user_id based on username
        $selectStmt = $conn->prepare("SELECT user_id FROM m_user WHERE username = ?");
        $selectStmt->bind_param("s", $username);
        $selectStmt->execute();
        $selectStmt->bind_result($user_id);
        $selectStmt->fetch();
    
        return $user_id;
    }

    public function createAlumni($user_id, $nim, $name, $prodi, $email, $hp, $tahun_lulus) {
        $conn = $this->db->conn;
        $stmt = $conn->prepare("INSERT INTO t_responden_alumni (user_id, responden_nim, responden_nama, responden_prodi, responden_email, responden_hp, tahun_lulus, responden_tanggal) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param("isssssi", $user_id, $nim, $name, $prodi, $email, $hp, $tahun_lulus);
        $stmt->execute();
    }

    public function createDosen($user_id, $nip, $name, $unit) {
        $conn = $this->db->conn;
        $stmt = $conn->prepare("INSERT INTO t_responden_dosen (user_id, responden_nip, responden_nama, responden_unit, responden_tanggal) VALUES (?, ?, ?, ?, NOW())");
        $stmt->bind_param("isss", $user_id, $nip, $name, $unit);
        $stmt->execute();
    }

    public function createIndustri($user_id, $name, $jabatan, $perusahaan, $email, $hp, $kota) {
        $conn = $this->db->conn;
        $stmt = $conn->prepare("INSERT INTO t_responden_industri (user_id, responden_nama, responden_jabatan, responden_perusahaan, responden_email, responden_hp, responden_kota, responden_tanggal) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param("issssss", $user_id, $name, $jabatan, $perusahaan, $email, $hp, $kota);
        $stmt->execute();
    }

    public function createMahasiswa($user_id, $nim, $name, $prodi, $email, $hp, $tahun_masuk) {
        $conn = $this->db->conn;
        $stmt = $conn->prepare("INSERT INTO t_responden_mahasiswa (user_id, responden_nim, responden_nama, responden_prodi, responden_email, responden_hp, tahun_masuk, responden_tanggal) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param("isssssi", $user_id, $nim, $name, $prodi, $email, $hp, $tahun_masuk);
        $stmt->execute();
    }

    public function createOrtu($user_id, $name, $jenis_kelamin, $umur, $nohp, $pendidikan, $pekerjaan, $nim_mahasiswa, $nama_mahasiswa, $prodi_mahasiswa) {
        $conn = $this->db->conn;
        $stmt = $conn->prepare("INSERT INTO t_responden_ortu (user_id, responden_nama, responden_jk, responden_umur, responden_hp, responden_pendidikan, responden_pekerjaan, mahasiswa_nim, mahasiswa_nama, mahasiswa_prodi, responden_tanggal) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param("isssssssss", $user_id, $name, $jenis_kelamin, $umur, $nohp, $pendidikan, $pekerjaan, $nim_mahasiswa, $nama_mahasiswa, $prodi_mahasiswa);
        $stmt->execute();
    }

    public function createTendik($user_id, $nopeg, $name, $unit) {
        $conn = $this->db->conn;
        $stmt = $conn->prepare("INSERT INTO t_responden_tendik (user_id, responden_nopeg, responden_nama, responden_unit, responden_tanggal) VALUES (?, ?, ?, ?, NOW())");
        $stmt->bind_param("isss", $user_id, $nopeg, $name, $unit);
        $stmt->execute();
    }

    // ========================== READ =============================


    //take data user dan responden untuk session
    public function takeUser($username) {
        $conn = $this->db->conn;
        $stmt = $conn->prepare("SELECT user_id, nama, role 
        FROM m_user 
        WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($user_id, $nama, $role);
        $stmt->fetch();
        return array('user_id' => $user_id, 'nama' => $nama, 'role' => $role);
    }

    public function takeDataAlumni($username) {
        $conn = $this->db->conn;
        $stmt = $conn->prepare("SELECT responden_alumni_id, nama, role 
        FROM m_user
        INNER JOIN t_responden_alumni ON m_user.user_id = t_responden_alumni.user_id WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($responden_id, $nama, $role);
        $stmt->fetch();
        return array('responden_id' => $responden_id, 'nama' => $nama, 'role' => $role);
    }

    public function takeDataDosen($username) {
        $conn = $this->db->conn;
        $stmt = $conn->prepare("SELECT responden_dosen_id, nama, role
        FROM m_user
        INNER JOIN t_responden_dosen ON m_user.user_id = t_responden_dosen.user_id WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($responden_id, $nama, $role);
        $stmt->fetch();
        return array('responden_id' => $responden_id, 'nama' => $nama, 'role' => $role);
    }

    public function takeDataIndustri($username) {
        $conn = $this->db->conn;
        $stmt = $conn->prepare("SELECT responden_industri_id, nama, role
        FROM m_user
        INNER JOIN t_responden_industri ON m_user.user_id = t_responden_industri.user_id WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($responden_id, $nama, $role);
        $stmt->fetch();
        return array('responden_id' => $responden_id, 'nama' => $nama, 'role' => $role);
    }

    public function takeDataMahasiswa($username) {
        $conn = $this->db->conn;
        $stmt = $conn->prepare("SELECT responden_mahasiswa_id, nama, role
        FROM m_user
        INNER JOIN t_responden_mahasiswa ON m_user.user_id = t_responden_mahasiswa.user_id WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($responden_id, $nama, $role);
        $stmt->fetch();
        return array('responden_id' => $responden_id, 'nama' => $nama, 'role' => $role);
    }

    public function takeDataOrangtua($username) {
        $conn = $this->db->conn;
        $stmt = $conn->prepare("SELECT responden_ortu_id, nama, role
        FROM m_user
        INNER JOIN t_responden_ortu ON m_user.user_id = t_responden_ortu.user_id WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($responden_id, $nama, $role);
        $stmt->fetch();
        return array('responden_id' => $responden_id, 'nama' => $nama, 'role' => $role);
    }

    public function takeDataTendik($username) {
        $conn = $this->db->conn;
        $stmt = $conn->prepare("SELECT responden_tendik_id, nama, role
        FROM m_user
        INNER JOIN t_responden_tendik ON m_user.user_id = t_responden_tendik.user_id WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($responden_id, $nama, $role);
        $stmt->fetch();
        return array('responden_id' => $responden_id, 'nama' => $nama, 'role' => $role);
    }

    // view ke tabel alumni
    public function readAlumni():array {
        $conn = $this->db->conn;
        $query = "SELECT *
                FROM m_user
                INNER JOIN t_responden_alumni ON m_user.user_id = t_responden_alumni.user_id";
        $result = $conn->query($query);

        $alumniList = [];
        if ($result->num_rows > 0) {
            $alumniList = array();
            while ($row = $result->fetch_assoc()) {
                $alumniList[] = $row;
            }
            
        }
        return $alumniList; 
    }

    // view ke tabel dosen
    public function readDosen():array {
        $conn = $this->db->conn;
        $query = "SELECT *
                FROM m_user
                INNER JOIN t_responden_dosen ON m_user.user_id = t_responden_dosen.user_id";
        $result = $conn->query($query);

        $dosenList = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dosenList[] = $row;
            }
        }
        return $dosenList;
    } 

    // view ke tabel industri
    public function readIndustri():array {
        $conn = $this->db->conn;
        $query = "SELECT *
                FROM m_user
                INNER JOIN t_responden_industri ON m_user.user_id = t_responden_industri.user_id";
        $result = $conn->query($query);

        $industriList = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $industriList[] = $row;
            }
        }
        return $industriList;
    }

    // view ke tabel mahasiswa
    public function readMahasiswa():array {
        $conn = $this->db->conn;
        $query = "SELECT *
                FROM m_user
                INNER JOIN t_responden_mahasiswa ON m_user.user_id = t_responden_mahasiswa.user_id";
        $result = $conn->query($query);

        $mahasiswaList = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $mahasiswaList[] = $row;
            }
        }
        return $mahasiswaList;
    }

    // view ke tabel orangtua
    public function readOrangtua():array {
        $conn = $this->db->conn;
        $query = "SELECT *
                FROM m_user
                INNER JOIN t_responden_ortu ON m_user.user_id = t_responden_ortu.user_id";
        $result = $conn->query($query);

        $orangtuaList = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $orangtuaList[] = $row;
            }
        }
        return $orangtuaList;
    }

    // view ke tabel tendik
    public function readTendik():array {
        $conn = $this->db->conn;
        $query = "SELECT *
                FROM m_user
                INNER JOIN t_responden_tendik ON m_user.user_id = t_responden_tendik.user_id";
        $result = $conn->query($query);

        
        $tendikList = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $tendikList[] = $row;
            }
        }
        return $tendikList;
    }


    
    // ========================= UPDATE ============================
    public function updateAlumni($id, $nama, $username, $password, $nim, $prodi, $no_hp, $tahun_lulus) {
        $conn = $this->db->conn;
        $query = "UPDATE t_responden_alumni 
                  INNER JOIN m_user ON t_responden_alumni.user_id = m_user.user_id
                  SET m_user.nama = ?, t_responden_alumni.responden_nim = ?, 
                      t_responden_alumni.responden_prodi = ?, t_responden_alumni.responden_hp = ?, 
                      t_responden_alumni.tahun_lulus = ?, m_user.username = ?, m_user.password = ?
                  WHERE t_responden_alumni.user_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssssi", $nama, $nim, $prodi, $no_hp, $tahun_lulus, $username, $password, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function updateMahasiswa($id, $nama, $username, $password, $nim, $prodi, $no_hp, $tahun_masuk) {
        $conn = $this->db->conn;
        $query = "UPDATE t_responden_mahasiswa 
                  INNER JOIN m_user ON t_responden_mahasiswa.user_id = m_user.user_id
                  SET m_user.nama = ?, t_responden_mahasiswa.responden_nim = ?, 
                      t_responden_mahasiswa.responden_prodi = ?, t_responden_mahasiswa.responden_hp = ?, 
                      t_responden_mahasiswa.tahun_masuk = ?, m_user.username = ?, m_user.password = ?
                  WHERE t_responden_mahasiswa.user_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssssi", $nama, $nim, $prodi, $no_hp, $tahun_masuk, $username, $password, $id);
        $stmt->execute();
        $stmt->close();
    }
    
    public function updateDosen($id, $nama, $username, $password, $nip, $unit) {
        $conn = $this->db->conn;
        $query = "UPDATE t_responden_dosen 
                  INNER JOIN m_user ON t_responden_dosen.user_id = m_user.user_id
                  SET m_user.nama = ?, t_responden_dosen.responden_nip = ?, 
                      t_responden_dosen.responden_unit = ?, m_user.username = ?, m_user.password = ?
                  WHERE t_responden_dosen.user_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssi", $nama, $nip, $unit, $username, $password, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function updateTendik($id, $nama, $username, $password, $nopeg, $unit) {
        $conn = $this->db->conn;
        $query = "UPDATE t_responden_tendik 
                  INNER JOIN m_user ON t_responden_tendik.user_id = m_user.user_id
                  SET m_user.nama = ?, t_responden_tendik.responden_nopeg = ?, 
                      t_responden_tendik.responden_unit = ?, m_user.username = ?, m_user.password = ?
                  WHERE t_responden_tendik.user_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssi", $nama, $nopeg, $unit, $username, $password, $id);
        $stmt->execute();
        $stmt->close();
    }    

    public function updateIndustri($id, $nama, $username, $password, $jabatan, $perusahaan, $no_hp, $kota) {
        $conn = $this->db->conn;
        $query = "UPDATE t_responden_industri 
                  INNER JOIN m_user ON t_responden_industri.user_id = m_user.user_id
                  SET m_user.nama = ?, t_responden_industri.responden_jabatan = ?, 
                      t_responden_industri.responden_perusahaan = ?, t_responden_industri.responden_hp = ?, 
                      t_responden_industri.responden_kota = ?, m_user.username = ?, m_user.password = ?
                  WHERE t_responden_industri.user_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssssi", $nama, $jabatan, $perusahaan, $no_hp, $kota, $username, $password, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function updateOrangtua($id, $nama, $username, $password, $jk, $umur, $pekerjaan, $no_hp) {
        $conn = $this->db->conn;
        $query = "UPDATE t_responden_ortu
                  INNER JOIN m_user ON t_responden_ortu.user_id = m_user.user_id
                  SET m_user.nama = ?, t_responden_ortu.responden_jk = ?, 
                      t_responden_ortu.responden_umur = ?, t_responden_ortu.responden_pekerjaan = ?, 
                      t_responden_ortu.responden_hp = ?, m_user.username = ?, m_user.password = ?
                  WHERE t_responden_ortu.user_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssssi", $nama, $jk, $umur, $pekerjaan, $no_hp, $username, $password, $id);
        $stmt->execute();
        $stmt->close();
    }
    
    
    // ========================= DELETE ============================
    public function deleteAkun ($user_id) {
        $conn = $this->db->conn;
        $stmt = $conn->prepare("DELETE FROM m_user WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteAlumni ($user_id, $responden_id) {
        $conn = $this->db->conn;
        $this -> deleteJawabanAlumni($responden_id);
        $this -> deleteHistory($user_id);
        $stmt = $conn->prepare("DELETE FROM t_responden_alumni WHERE responden_alumni_id = ?");
        $stmt->bind_param("i", $responden_id);
        $stmt->execute();
        $stmt->close();
        $this->deleteAkun($user_id);
    }

    public function deleteJawabanAlumni ($responden_id) {
        $conn = $this-> db -> conn;
        $stmt = $conn -> prepare("DELETE FROM t_jawaban_alumni WHERE responden_alumni_id = ?");
        $stmt->bind_param("i", $responden_id);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteDosen ($user_id, $responden_id) {
        $conn = $this->db->conn;
        $this -> deleteJawabanDosen($responden_id);
        $this -> deleteHistory($user_id);
        $stmt = $conn->prepare("DELETE FROM t_responden_dosen WHERE responden_dosen_id = ?");
        $stmt->bind_param("i", $responden_id);
        $stmt->execute();
        $stmt->close();
        $this->deleteAkun($user_id);
    }

    public function deleteJawabanDosen ($responden_id) {
        $conn = $this-> db -> conn;
        $stmt = $conn -> prepare("DELETE FROM t_jawaban_dosen WHERE responden_dosen_id = ?");
        $stmt->bind_param("i", $responden_id);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteIndustri ($user_id, $responden_id) {
        $conn = $this->db->conn;
        $this -> deleteJawabanIndustri($responden_id);
        $this -> deleteHistory($user_id);
        $stmt = $conn->prepare("DELETE FROM t_responden_industri WHERE responden_industri_id = ?");
        $stmt->bind_param("i", $responden_id);
        $stmt->execute();
        $stmt->close();
        $this->deleteAkun($user_id);
    }

    public function deleteJawabanIndustri ($responden_id) {
        $conn = $this-> db -> conn;
        $stmt = $conn -> prepare("DELETE FROM t_jawaban_industri WHERE responden_industri_id = ?");
        $stmt->bind_param("i", $responden_id);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteMahasiswa ($user_id, $responden_id) {
        $conn = $this->db->conn;
        $this -> deleteJawabanMahasiswa($responden_id);
        $this -> deleteHistory($user_id);
        $stmt = $conn->prepare("DELETE FROM t_responden_mahasiswa WHERE responden_mahasiswa_id = ?");
        $stmt->bind_param("i", $responden_id);
        $stmt->execute();
        $stmt->close();
        $this->deleteAkun($user_id);
    }

    public function deleteJawabanMahasiswa ($responden_id) {
        $conn = $this-> db -> conn;
        $stmt = $conn -> prepare("DELETE FROM t_jawaban_mahasiswa WHERE responden_mahasiswa_id = ?");
        $stmt->bind_param("i", $responden_id);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteOrangtua ($user_id, $responden_id) {
        $conn = $this->db->conn;
        $this -> deleteJawabanOrangtua($responden_id);
        $this -> deleteHistory($user_id);
        $stmt = $conn->prepare("DELETE FROM t_responden_ortu WHERE responden_ortu_id = ?");
        $stmt->bind_param("i", $responden_id);
        $stmt->execute();
        $stmt->close();
        $this->deleteAkun($user_id);
    }

    public function deleteJawabanOrangtua($responden_id) {
        $conn = $this-> db -> conn;
        $stmt = $conn -> prepare("DELETE FROM t_jawaban_ortu WHERE responden_ortu_id = ?");
        $stmt->bind_param("i", $responden_id);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteTendik ($user_id, $responden_id) {
        $conn = $this->db->conn;
        $this -> deleteJawabanTendik($responden_id);
        $this -> deleteHistory($user_id);
        $stmt = $conn->prepare("DELETE FROM t_responden_tendik WHERE responden_tendik_id = ?");
        $stmt->bind_param("i", $responden_id);
        $stmt->execute();
        $stmt->close();
        $this->deleteAkun($user_id);
    }

    public function deleteJawabanTendik($responden_id) {
        $conn = $this-> db -> conn;
        $stmt = $conn -> prepare("DELETE FROM t_jawaban_tendik WHERE responden_tendik_id = ?");
        $stmt->bind_param("i", $responden_id);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteHistory ($user_id) {
        $conn = $this->db->conn;
        $stmt = $conn -> prepare ("DELETE FROM m_history WHERE user_id = ? ");
        $stmt -> bind_param("i", $user_id);
        $stmt->execute();
        $stmt->close();
    }

    // mmmmmmmmmmmmmmmmmmmmmm

    public function jumlahMahasiswa() {
        $conn = $this->db->conn;
        $query = "SELECT COUNT(*) as jumlah FROM t_responden_mahasiswa";
        $result = $conn->query($query);
    
        if ($result) {
            $row = $result->fetch_assoc();
            return $row['jumlah'];
        } else {
            return 0;
        }
    }

    public function jumlahAlumni() {
        $conn = $this->db->conn;
        $query = "SELECT COUNT(*) as jumlah FROM t_responden_alumni";
        $result = $conn->query($query);
    
        if ($result) {
            $row = $result->fetch_assoc();
            return $row['jumlah'];
        } else {
            return 0;
        }
    }

    public function jumlahDosen() {
        $conn = $this->db->conn;
        $query = "SELECT COUNT(*) as jumlah FROM t_responden_dosen";
        $result = $conn->query($query);
    
        if ($result) {
            $row = $result->fetch_assoc();
            return $row['jumlah'];
        } else {
            return 0;
        }
    }

    public function jumlahIndustri() {
        $conn = $this->db->conn;
        $query = "SELECT COUNT(*) as jumlah FROM t_responden_industri";
        $result = $conn->query($query);
    
        if ($result) {
            $row = $result->fetch_assoc();
            return $row['jumlah'];
        } else {
            return 0;
        }
    }

    public function jumlahOrangtua() {
        $conn = $this->db->conn;
        $query = "SELECT COUNT(*) as jumlah FROM t_responden_ortu";
        $result = $conn->query($query);
    
        if ($result) {
            $row = $result->fetch_assoc();
            return $row['jumlah'];
        } else {
            return 0;
        }
    }

    public function jumlahTendik() {
        $conn = $this->db->conn;
        $query = "SELECT COUNT(*) as jumlah FROM t_responden_tendik";
        $result = $conn->query($query);
    
        if ($result) {
            $row = $result->fetch_assoc();
            return $row['jumlah'];
        } else {
            return 0;
        }
    }

    public function takeHistory($user_id, $kategori_id, $survey_id) {
        $conn = $this->db->conn;
        $stmt = $conn->prepare("SELECT COUNT(*) FROM m_history WHERE user_id = ? AND kategori_id = ? AND survey_id = ?;");
        $stmt->bind_param("iii", $user_id, $kategori_id, $survey_id);
        $stmt->execute();
        $stmt->bind_result($row);
        $stmt->fetch();
        $stmt->close();
        return $row;
    }



} 
?>
