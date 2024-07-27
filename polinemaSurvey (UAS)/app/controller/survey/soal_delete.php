<?php
require_once __DIR__ . "/../../modal/survey/survey_crud.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $soal_id = $_POST['soal_id'];
    $crud = new surveyCRUD();
    $crud->deleteSoal($soal_id);
    header("Location: ../../views/admin/modul/survey.php");
    exit;
}
?>
