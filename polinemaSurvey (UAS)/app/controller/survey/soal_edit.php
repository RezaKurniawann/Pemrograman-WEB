<?php
require_once __DIR__ . "/../../connection/database.php";
require_once __DIR__ . "/../../modal/survey/survey_crud.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $db = new database();
    $conn = $db->conn;
    
    $soal_id = $_POST ['soal_id'];
    $soal_nama = $_POST['soal_nama'];

    $crud = new surveyCRUD();
    $crud->updateSoal($soal_id, $soal_nama);

    header("Location: ../../views/admin/modul/survey.php");
    exit();
}
?>
