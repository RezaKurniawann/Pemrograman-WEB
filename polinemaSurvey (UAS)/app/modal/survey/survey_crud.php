<?php
require_once __DIR__ . ("/../../connection/database.php");

class surveyCRUD {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }


    //create soal
    public function getKategoriId($kategori) {
        $conn = $this->db->conn;
        $stmt = $conn->prepare("SELECT kategori_id FROM m_kategori WHERE kategori_nama = ?");
        $stmt->bind_param("s", $kategori);
        $stmt->execute();
        $stmt->bind_result($kategori_id);
        $stmt->fetch(); 
        $stmt->close(); 
        return $kategori_id; 
    }

    public function getSurveyId ($survey) {
        $conn = $this->db->conn;
        $stmt = $conn->prepare("SELECT survey_id FROM m_survey WHERE survey_nama = ?");
        $stmt->bind_param("s", $survey);
        $stmt->execute();
        $stmt->bind_result($survey_id);
        $stmt->fetch(); 
        $stmt->close();
        return $survey_id; 
    }
    

    public function getNoUrut ($kategori, $survey) {
        $conn = $this->db->conn;
        $kategori_id = $this->getKategoriId($kategori);
        $survey_id = $this -> getSurveyId($survey);
        $stmt = $conn->prepare("SELECT (COUNT(*) + 1) FROM m_survey_soal WHERE kategori_id = ? AND survey_id = ?");
        $stmt->bind_param("ii", $kategori_id, $survey_id);
        $stmt->execute();
        $stmt->bind_result($no_urut);
        $stmt->fetch();
        $stmt->close();
        return $no_urut;
    }

    public function createSoal ($survey, $dimensi, $kategori, $soal) {
        $conn = $this->db->conn;
        $survey_Id = $this->getSurveyId($survey);
        $kategori_Id = $this->getKategoriId($kategori);
        $no_urut = $this-> getNoUrut($kategori,$survey);
        $stmt = $conn->prepare("INSERT INTO m_survey_soal (survey_id, dimensi_id, kategori_id, no_urut, soal_nama) VALUES (?, ? ,?, ?, ?)");
        $stmt->bind_param("iiiis", $survey_Id, $dimensi, $kategori_Id, $no_urut, $soal);
        $stmt->execute();
        $stmt->close();
    }

    //update soal

    public function updateSoal($soal_id, $soal_nama) {
        $conn = $this->db->conn;
        $stmt = $conn->prepare("UPDATE m_survey_soal SET soal_nama = ? WHERE soal_id = ?");
        $stmt->bind_param("si", $soal_nama, $soal_id);
        $stmt->execute();
        $stmt->close();
    }

    //delete soal

    public function deleteSoal ($soal_id) {
        $conn = $this->db->conn;
        $stmt = $conn->prepare("DELETE FROM m_survey_soal WHERE soal_id = ?");
        $stmt->bind_param("i", $soal_id);
        $stmt->execute();
        $stmt->close();
    }

    //read soal dari seluruh kategori
    public function readSurvey() {
        $conn = $this->db->conn;
        $query = "SELECT *
                  FROM m_survey_soal
                  INNER JOIN m_kategori ON m_survey_soal.kategori_id = m_kategori.kategori_id
                  INNER JOIN dimensi ON m_survey_soal.dimensi_id = dimensi.dimensi_id
                  INNER JOIN m_survey ON m_survey_soal.survey_id = m_survey.survey_id";
        
        $result = $conn->query($query);

        $surveyList = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $surveyList[] = $row;
            }
        }
        return $surveyList;
    }

    // mmmmmmmmmmmmmmmmmmmmmmmm

    //read soal alumni =  tendik

    public function readSoalMahasiswa($survey_id, $kategori_id) {
        $conn = $this->db->conn;
        $query = "SELECT * FROM m_survey_soal WHERE survey_id = '$survey_id' AND kategori_id = '$kategori_id'";
        $result = $conn->query($query);
    
        $soalList = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $soalList[] = $row;
            }
        }
        return $soalList;
    }
    public function readSoalAlumni($survey_id, $kategori_id) {
        $conn = $this->db->conn;
        $query = "SELECT * FROM m_survey_soal WHERE survey_id = '$survey_id' AND kategori_id = '$kategori_id'";
        $result = $conn->query($query);
    
        $soalList = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $soalList[] = $row;
            }
        }
        return $soalList;
    }
    public function readSoalOrtu($survey_id, $kategori_id) {
        $conn = $this->db->conn;
        $query = "SELECT * FROM m_survey_soal WHERE survey_id = '$survey_id' AND kategori_id = '$kategori_id'";
        $result = $conn->query($query);
    
        $soalList = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $soalList[] = $row;
            }
        }
        return $soalList;
    }
    public function readSoalIndustri($survey_id, $kategori_id) {
        $conn = $this->db->conn;
        $query = "SELECT * FROM m_survey_soal WHERE survey_id = '$survey_id' AND kategori_id = '$kategori_id'";
        $result = $conn->query($query);
    
        $soalList = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $soalList[] = $row;
            }
        }
        return $soalList;
    }
    public function readSoalDosen($survey_id, $kategori_id) {
        $conn = $this->db->conn;
        $query = "SELECT * FROM m_survey_soal WHERE survey_id = '$survey_id' AND kategori_id = '$kategori_id'";
        $result = $conn->query($query);
    
        $soalList = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $soalList[] = $row;
            }
        }
        return $soalList;
    }
    public function readSoalTendik($survey_id, $kategori_id) {
        $conn = $this->db->conn;
        $query = "SELECT * FROM m_survey_soal WHERE survey_id = '$survey_id' AND kategori_id = '$kategori_id'";
        $result = $conn->query($query);
    
        $soalList = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $soalList[] = $row;
            }
        }
        return $soalList;
    }

    //create Jawaban
    public function inputJawabanMahasiswa($responden_mahasiswa_id, $soal_id, $jawaban){
        $conn = $this->db->conn;
        $stmt = $conn->prepare("INSERT INTO t_jawaban_mahasiswa (responden_mahasiswa_id, soal_id, jawaban , jawaban_tanggal) VALUES ( ?, ?, ?,NOW())");
        $stmt->bind_param("iii",$responden_mahasiswa_id, $soal_id, $jawaban);
        $stmt->execute();
        $stmt->close();
    }

    public function inputJawabanAlumni($responden_alumni_id, $soal_id, $jawaban){
        $conn = $this->db->conn;
        $stmt = $conn->prepare("INSERT INTO t_jawaban_alumni (responden_alumni_id, soal_id, jawaban , jawaban_tanggal) VALUES ( ?, ?, ?,NOW())");
        $stmt->bind_param("iii",$responden_alumni_id, $soal_id, $jawaban);
        $stmt->execute();
        $stmt->close();
    }
    public function inputJawabanDosen($responden_dosen_id, $soal_id, $jawaban){
        $conn = $this->db->conn;
        $stmt = $conn->prepare("INSERT INTO t_jawaban_dosen (responden_dosen_id, soal_id, jawaban , jawaban_tanggal) VALUES ( ?, ?, ?,NOW())");
        $stmt->bind_param("iii",$responden_dosen_id, $soal_id, $jawaban);
        $stmt->execute();
        $stmt->close();
    }

    public function inputJawabanIndustri($responden_industri_id, $soal_id, $jawaban){
        $conn = $this->db->conn;
        $stmt = $conn->prepare("INSERT INTO t_jawaban_industri (responden_industri_id, soal_id, jawaban , jawaban_tanggal) VALUES ( ?, ?, ?,NOW())");
        $stmt->bind_param("iii",$responden_industri_id, $soal_id, $jawaban);
        $stmt->execute();
        $stmt->close();
    }
    public function inputJawabanOrtu($responden_ortu_id, $soal_id, $jawaban){
        $conn = $this->db->conn;
        $stmt = $conn->prepare("INSERT INTO t_jawaban_ortu (responden_ortu_id, soal_id, jawaban , jawaban_tanggal) VALUES ( ?, ?, ?,NOW())");
        $stmt->bind_param("iii",$responden_ortu_id, $soal_id, $jawaban);
        $stmt->execute();
        $stmt->close();
    }
    public function inputJawabanTendik($responden_tendik_id, $soal_id, $jawaban){
        $conn = $this->db->conn;
        $stmt = $conn->prepare("INSERT INTO t_jawaban_tendik (responden_tendik_id, soal_id, jawaban , jawaban_tanggal) VALUES ( ?, ?, ?,NOW())");
        $stmt->bind_param("iii",$responden_tendik_id, $soal_id, $jawaban);
        $stmt->execute();
        $stmt->close();
    }


    //create History
    public function inputHistory($user_id, $kategori_id, $survey_id, $saran){
        $conn = $this->db->conn;
        $stmt = $conn->prepare("INSERT INTO m_history (user_id, kategori_id, survey_id , saran,  survey_tanggal) VALUES ( ?, ?, ?,?,now())");
        $stmt->bind_param("iiis",$user_id, $kategori_id, $survey_id, $saran);
        $stmt->execute();
        $stmt->close();
    }

     //read history melakukan submit
    public function readHistory () {
        $conn = $this->db->conn;
        $query = "SELECT * 
                  FROM m_history 
                  INNER JOIN m_user ON m_history.user_id = m_user.user_id
                  INNER JOIN m_survey ON m_history.survey_id = m_survey.survey_id
                  INNER JOIN m_kategori ON m_history.kategori_id = m_kategori.kategori_id";
        $result = $conn->query($query);

        $historyList = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $historyList[] = $row;
            }
        }
        return $historyList;

    }

    public function takeHistory($user_id, $kategori_id, $survey_id) {
        $conn = $this->db->conn;
        $stmt = $conn->prepare("SELECT COUNT(*) AS count FROM m_history WHERE user_id = ? AND kategori_id = ? AND survey_id = ?;");
        $stmt->bind_param("iii", $user_id, $kategori_id, $survey_id);
        $stmt->execute();
        $stmt->bind_result($row);
        $stmt->fetch();
        $stmt->close();
        return $row;
    }
    
    
    
    public function readKategori3($userId) {

        $conn = $this->db->conn;
        $query = "SELECT m_survey.survey_nama, 
                         m_history.survey_tanggal
                  FROM m_survey
                  LEFT JOIN m_history ON m_survey.survey_id = m_history.survey_id AND m_history.user_id = $userId
                  WHERE m_survey.survey_nama IN ('pengajaran', 'fasilitas', 'pelayanan')" ;
        
        $result = $conn->query($query);
    
        $kategoriList = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $kategoriList[] = $row;
            }
        }
        return $kategoriList;
    }
    public function readKategoriIndustri($userId) {

        $conn = $this->db->conn;
        $query = "SELECT m_survey.survey_nama, 
                         m_history.survey_tanggal
                  FROM m_survey
                  LEFT JOIN m_history ON m_survey.survey_id = m_history.survey_id AND m_history.user_id = $userId
                  WHERE m_survey.survey_nama IN ('fasilitas', 'pelayanan' ,'lulusan')" ;
        
        $result = $conn->query($query);
    
        $kategoriList = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $kategoriList[] = $row;
            }
        }
        return $kategoriList;
    }
    public function readKategori4($userId) {

    $conn = $this->db->conn;
    $query = "SELECT m_survey.survey_nama, 
                     m_history.survey_tanggal
              FROM m_survey
              LEFT JOIN m_history ON m_survey.survey_id = m_history.survey_id AND m_history.user_id = $userId" ;
    
    $result = $conn->query($query);

    $kategoriList = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $kategoriList[] = $row;
        }
    }
    return $kategoriList;
}
    
public function readKategori2($userId) {

    $conn = $this->db->conn;
    $query = "SELECT m_survey.survey_nama, 
                     m_history.survey_tanggal
              FROM m_survey
              LEFT JOIN m_history ON m_survey.survey_id = m_history.survey_id AND m_history.user_id = $userId
              WHERE m_survey.survey_nama IN ('fasilitas', 'pelayanan')" ;
    
    $result = $conn->query($query);

    $kategoriList = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $kategoriList[] = $row;
        }
    }
    return $kategoriList;
}

// analisis
public function readKriteria() {
    $conn = $this->db->conn;
    $query = "SELECT * FROM dimensi";
    $result = $conn->query($query);

    $kriteriaList = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $kriteriaList[] = $row;
        }
    }
    return $kriteriaList;
}

public function readRanking() {
    $conn = $this->db->conn;
    $query = "SELECT * FROM ranking";
    $result = $conn->query($query);

    $rankingList = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $rankingList[] = $row;
        }
    }
    return $rankingList;
}






}
?>
