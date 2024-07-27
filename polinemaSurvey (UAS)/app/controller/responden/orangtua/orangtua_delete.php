<?php
require_once __DIR__ . "/../../../modal/responden/responden_crud.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user_id = $_POST['user_id'];
    $responden_id = $_POST ['responden_id'];

    $crud = new respondenCRUD();
    $crud->deleteOrangtua($user_id, $responden_id);
    header("Location: ../../../views/admin/modul/orangtua.php");
    exit;
}
?>