<?php
$a = 10;
$b = 5;
$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisaBagi = $a % $b;
$pangkat = $a ** $b;

echo "Nilai a: $a <br>";
echo "Nilai b: $b <br>";
echo "Hasil Penjumlahan: $hasilTambah <br>";
echo "Hasil Pengurangan: $hasilKurang <br>";
echo "Hasil Perkalian: $hasilKali <br>";
echo "Hasil Pembagian: $hasilBagi <br>";
echo "Sisa Bagi: $sisaBagi <br>";
echo "Hasil Pangkat: $pangkat <br>";
?>
<br>
<?php
$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;

echo "Hasil a sama dengan b: " . ($hasilSama) . "<br>"; 
echo "Hasil a tidak sama dengan b: " . ($hasilTidakSama) . "<br>"; 
echo "Hasil a lebih kecil dari b: " . ($hasilLebihKecil) . "<br>"; 
echo "Hasil a lebih besar dari b: " . ($hasilLebihBesar) . "<br>"; 
echo "Hasil a lebih kecil dari atau sama dengan b: " . ($hasilLebihKecilSama) . "<br>"; 
echo "Hasil a lebih besar dari atau sama dengan b: " . ($hasilLebihBesarSama) . "<br>";
?>
<br>
<?php
$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;

echo "Hasil dari operasi AND: " . ($hasilAnd) . "<br>"; 
echo "Hasil dari operasi OR: " . ($hasilOr) . "<br>"; 
echo "Hasil dari operasi NOT untuk a: " . ($hasilNotA) . "<br>"; 
echo "Hasil dari operasi NOT untuk b: " . ($hasilNotB) . "<br>";
?>
<br>
<?php
$a += $b; // $a sekarang bernilai 15 (10 + 5)
echo "Nilai a setelah ditambah dengan b: $a <br>";
$a -= $b; // $a sekarang bernilai 10 (15 - 5)
echo "Nilai a setelah dikurangi dengan b: $a <br>";
$a *= $b; // $a sekarang bernilai 50 (10 * 5)
echo "Nilai a setelah dikalikan dengan b: $a <br>";
$a /= $b; // $a sekarang bernilai 10 (50 / 5)
echo "Nilai a setelah dibagi dengan b: $a <br>";
$a %= $b; // $a sekarang bernilai 0 (10 % 5)
echo "Nilai a setelah dimodulus dengan b: $a <br>";
?>
<br>
<?php
$hasilIdentik = $a === $b;
$hasilTidakIdentik = $a !== $b;
echo "Hasil a identik dengan b: " . ($hasilIdentik) . "<br>";
echo "Hasil a tidak identik dengan b: " . ($hasilTidakIdentik) . "<br>";
?>
<br>
<?php
$jumlahKursi = 45;
$kursiTerisi = 28;
$kursiKosong = $jumlahKursi - $kursiTerisi;
$persentaseKursiKosong = ($kursiKosong / $jumlahKursi) * 100;

echo "Jumlah kursi di restoran: $jumlahKursi <br>";
echo "Jumlah kursi yang telah ditempati: $kursiTerisi <br>";
echo "Jumlah kursi yang masih kosong di restoran: $kursiKosong <br>";
echo "Persentase kursi yang masih kosong: " . number_format($persentaseKursiKosong, 2) . "%";
?>