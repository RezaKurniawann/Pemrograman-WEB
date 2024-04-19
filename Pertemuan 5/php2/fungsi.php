<?php

function perkenalan(){
    echo "Assalamualaikum, ";
    echo "Perkenalkan, nama saya Reza Kurniawan<br/>";
    echo "Senang berkenalan dengan Anda<br/>";
}

// memanggil fungsi yang sudah dibuat
perkenalan();

// membuat fungsi
// function perkenalan($nama, $salam){
//     echo $salam.", ";
//     echo "Perkenalkan, nama saya ".$nama."<br/>";
//     echo "Senang berkenalan dengan Anda<br/>";
// }

// memanggil fungsi yang sudah dibuat
// perkenalan("Hamdana","Halo");

// echo "<hr>";

// function perkenalan($nama, $salam){
//     echo $salam.", ";
//     echo "Perkenalkan, nama saya ".$nama."<br/>";
//     echo "Senang berkenalan dengan Anda<br/>";
// }
// $saya = "Elok";
// $ucapanSalam = "Selamat Pagi";

// memanggil lagi
// perkenalan($saya, $ucapanSalam);

// function perkenalan($nama, $salam = "Assalamualaikum"){
//     echo $salam.", ";
//     echo "Perkenalkan, nama saya ".$nama."<br/>";
//     echo "Senang berkenalan dengan Anda<br/>";
// }

// // memanggil fungsi yang sudah dibuat
// perkenalan("Hamdana","Hallo");

// echo "<hr>";

// $saya = "Elok";
// $ucapanSalam = "Selamat Pagi";
// // memanggil lagi tanpa mengisi parameter salam
// perkenalan($saya);


// function hitungUmur($thn_lahir, $thn_sekarang){
//     $umur = $thn_sekarang - $thn_lahir;
//     return $umur;
// }

// echo "Umur saya adalah ". hitungUmur(2004,2024) . " tahun";



// function hitungUmur($thn_lahir, $thn_sekarang){
//     $umur = $thn_sekarang - $thn_lahir;
//     return $umur;
// }

// function perkenalan($nama, $salam = "Assalamualaikum"){
//     echo $salam. ",";
//     echo "Perkenalkan, nama saya ". $nama."<br/>";

//     // memanggil fungsi lain
//     echo "Saya berusia ". hitungUmur(2004,2024) ." tahun <br/>";
//     echo "Senang berkenalan dengan Anda <br/>";
// }

// // memanggil fungsi lain
// perkenalan("Reza");


// function tampilkanHaloDunia(){
//     echo "Halo dunia! <br>";

//     tampilkanHaloDunia();
// }

// tampilkanHaloDunia();


// for($i = 1; $i <= 25; $i++){
//     echo "Perulangan ke-{$i} <br>";
// }

// function tampilkanAngka (int $jumlah, int $indeks = 1){
//     echo "Perulangan ke-{$indeks} <br>";

//     // panggil diri sendiri selama $indeks <= jumlah
//     if($indeks < $jumlah){
//         tampilkanAngka($jumlah, $indeks+1);
//     }
// }
// tampilkanAngka(20);


?>