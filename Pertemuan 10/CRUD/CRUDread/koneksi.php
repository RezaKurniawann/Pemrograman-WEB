<?php
    //koneksi ke data base
    $koneksi = mysqli_connect("localhost", "root", "", "prakwebdb2");

    //periksa koneksi
    if (mysqli_connect_error()) {
        die ("Koneksi database gagal: " . mysqli_connect_error());
    }
?>