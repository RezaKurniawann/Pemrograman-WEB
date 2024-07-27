<?php
$nilaiNumerik = 92;

if ($nilaiNumerik >= 90 && $nilaiNumerik <= 100) {
    echo "Nilai huruf: A <br><br>";
} elseif ($nilaiNumerik >= 80 && $nilaiNumerik < 90) {
    echo "Nilai huruf: B <br><br>";
} elseif ($nilaiNumerik >= 70 && $nilaiNumerik < 80) {
    echo "Nilai huruf: C <br><br>";
} elseif ($nilaiNumerik < 70) {
    echo "Nilai huruf: D <br><br>";
}


$jarakSaatIni = 0;
$jarakTarget = 500;
$peningkatanHarian = 30;
$hari = 0;

while ($jarakSaatIni < $jarakTarget) {
    $jarakSaatIni += $peningkatanHarian;
    $hari++;
}
echo "Atlet tersebut memerlukan $hari hari untuk mencapai jarak 500 kilometer.<br><br>";




$jumlahLahan = 10;
$tanamanPerLahan = 5;
$buahPerTanaman = 10;
$jumlahBuah = 0;

for ($i = 1; $i <= $jumlahLahan; $i++) {
    $jumlahBuah += ($tanamanPerLahan * $buahPerTanaman);
}
echo "Jumlah buah yang akan dipanen adalah: $jumlahBuah<br><br>";




$skorUjian = [85, 92, 78, 96, 88];
$totalSkor = 0;

foreach ($skorUjian as $skor) {
    $totalSkor += $skor;
}
echo "Total skor ujian adalah: $totalSkor<br><br><br>";




$nilaiSiswa = [85, 92, 58, 64, 90, 55, 88, 79, 70, 96];

foreach ($nilaiSiswa as $nilai) {
    if ($nilai < 60) {
        echo "Nilai: $nilai (Tidak lulus) <br><br>";
    } else {
        echo "Nilai: $nilai (Lulus) <br><br>";
    }
}



$nilaiSiswa = [85, 92, 78, 64, 90, 75, 88, 79, 70, 96];
sort($nilaiSiswa);

for ($i = 0; $i < 2; $i++) {
    array_shift($nilaiSiswa);
    array_pop($nilaiSiswa);
}

$totalNilai = array_sum($nilaiSiswa);

$rataRata = $totalNilai / count($nilaiSiswa);
echo "Nilai setelah dihilangkan satu nilai terendah dan satu nilai tertinggi: " . implode(", ", $nilaiSiswa) . "<br>";
echo "Total nilai setelah dihilangkan satu nilai terendah dan satu nilai tertinggi: $totalNilai <br>";
echo "Rata-rata nilai setelah dihilangkan satu nilai terendah dan satu nilai tertinggi: $rataRata <br><br>";











$hargaProduk = 120000;
$diskonPersen = 20;
$batasDiskon = 100000;

// Hitung harga setelah diskon
if ($hargaProduk > $batasDiskon) {
    $diskon = $hargaProduk * ($diskonPersen / 100);
    $hargaSetelahDiskon = $hargaProduk - $diskon;
} else {
    $hargaSetelahDiskon = $hargaProduk;
}

echo "Harga awal produk: Rp " . number_format($hargaProduk, 0, ',', '.') . "<br>";
echo "Besaran diskon: Rp " . number_format($diskon, 0, ',', '.') . "<br>";
echo "Harga yang harus dibayar setelah mendapatkan diskon: Rp " . number_format($hargaSetelahDiskon, 0, ',', '.') . "<br><br>";





$skorPemain = 551;
$mendapatkanHadiah = $skorPemain > 500 ? 'YA' : 'TIDAK';

echo "Total skor pemain adalah: $skorPemain<br>";
echo "Apakah pemain mendapatkan hadiah tambahan? ($mendapatkanHadiah)";
