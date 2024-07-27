<?php
require_once __DIR__ . ("/../../connection/database.php");
require_once __DIR__ . ("/../../modal/survey/survey_crud.php");

if (isset($_POST['tambahSoal'])) {
  
    $db = new Database ();
    $conn = $db->conn;

    //ambil data dari form
    $survey = $_POST ['survey'];
    $dimensi = $_POST ['dimensi'];
    $kategori = $_POST['kategori'];
    $soal = $_POST['soal'];
    
    $crud = new surveyCRUD();
    $crud->createSoal($survey, $dimensi, $kategori, $soal);

    header("Location: ../../views/admin/modul/survey.php");
    exit();
}
?>