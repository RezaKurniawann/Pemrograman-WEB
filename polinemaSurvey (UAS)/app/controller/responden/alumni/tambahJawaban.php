<?php
session_start();

require_once __DIR__ . '/../../../connection/database.php'; 
require_once __DIR__ . ("/../../../modal/survey/survey_crud.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $db = new database ();
    $conn = $db->conn; 
    
    $user_id = $_SESSION ['user_id'];
    $responden_alumni_id = $_SESSION['responden_id'];
    $survey_id = $_POST ['survey_id'];
    $kategori_id = $_POST ['kategori_id'];
    $saran = $_POST ['saran']; 

    $crud = new surveyCRUD();
    $soalList = $crud -> readSoalAlumni($survey_id, $kategori_id);
    
    $allAnswered = true;
    foreach ($soalList as $soal) {  
        $soal_id = $soal['soal_id'];
        $jawaban_key = "jawaban_" . $soal['soal_id'];
        
      
        if (!isset($_POST[$jawaban_key])) {
            $allAnswered = false;
            break;
        }
    }

    if ($allAnswered) {
        foreach ($soalList as $soal) {  
            $soal_id = $soal['soal_id'];
            $jawaban_key = "jawaban_" . $soal['soal_id'];
            $jawaban = $_POST[$jawaban_key];
            $crud -> inputJawabanAlumni($responden_alumni_id , $soal_id , $jawaban);
        }
        $crud -> inputHistory($user_id, $kategori_id, $survey_id, $saran);
        $conn->close();
        echo '<script>alert("Terima kasih telah mengisi survey!");window.location.href = "../../../views/user/alumni/dashboard.php";</script>';
        exit;
    } else {
        echo '<script>alert("Gagal mengisi survey, harap isi seluruh jawaban!");window.location.href = "../../../views/user/alumni/dashboard.php";</script>';
        exit;
    }
}
?>
