<?php
    $nama;
    if (empty($nama)) {
        echo "Nama Tidak Terdefinisi Atau Kosong.";
    } else {
        echo "nama terdifinisi dan tidak kosong.";
    }

    echo "<br><br>";

    $myArray = array (); //array kosong
    if (empty($myArray)) {
        echo "Array Tidak Terdefinisi Atau Kosong.";
    } else {
        echo "Arrat terdifinisi dan tidak kosong.";
    }

    echo "<br><br>";

    if (empty ($nonExistentVar)) {
        echo "Variabel tidak terdefinisi atau kosong";
    } else {
        echo "Variabel terdefinisi atau tidak kosong";
    }
?>