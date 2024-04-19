<?php
    $umur;
    if (isset ($umur) && $umur >= 18) {
        echo "Anda Sudah Dewasa.";
    } else {
        echo "Anda belum dewasa atau variabel umur tidak ditemukan.";
    }

    echo "<br><br>";
    
    $data = array ("nama" => "jane", "usia" => 25);
    if (isset($data["nama"])) {
        echo "Nama : ".$data["nama"];
    } else {
        echo "Variabel 'nama' tidak ditemukan di dalam array";
    }
?>