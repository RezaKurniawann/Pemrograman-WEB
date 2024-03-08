<?php
$a = 10;
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisaBagi = $a % $b;
$pangkat = $a ** $b;
echo "Variabel a = $a <br>";
echo "Variabel b = $b <br>";
echo "$a + $b = $hasilTambah <br>";
echo "$a - $b = $hasilKurang <br>";
echo "$a x $b = $hasilKali <br>";
echo "$a / $b = $hasilBagi <br>";
echo "$a % $b = $sisaBagi <br>";
echo "$a ** $b = $pangkat <br>";

echo "<br>";
$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;
echo "$a sama dengan $b = $hasilSama <br>";
echo "$a tidak sama dengan $b = $hasilTidakSama <br>";
echo "$a Lebih Kecil $b = $hasilLebihKecil <br>";
echo "$a Lebih Besar $b = $hasilLebihBesar <br>";
echo "$a Lebih Kecil Sama Dengan $b = $hasilLebihKecilSama <br>";
echo "$a Lebih Besar Sama Dengan $b = $hasilLebihBesarSama <br>";

echo "<br>";
$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;
echo "$a And $b = $hasilAnd <br>";
echo "$a Or $b = $hasilOr <br>";
echo "Not $a  = $hasilNotA <br>";
echo "Not $b  = $hasilNotB <br>";

echo "<br>";
$a += $b;
echo "a += b : $a <br>";
$a -= $b;
echo "a -= b : $a <br>";
$a *= $b;
echo "a *= b : $a <br>";
$a /= $b;
echo "a /= b : $a <br>";
$a %= $b;
echo "a %= b : $a <br>";

echo "<br>";
$hasilIdentik = $a === $b;
$hasilTidakIdentik = $a !== $b;
echo "$a identik dengan $b = $hasilIdentik <br>";
echo "$a tidak identik dengan $b = $hasilTidakIdentik <br>";

echo "<br>";
echo "Pertanyaan <br>";
echo "Sebuah restoran memiliki 45 kursi didalamnya. Pada suatu malam, 
28 kursi telah ditempati oleh pelanggan. Berapa persen kursi yang masih kosong di restoran tersebut? <br>";
$jawaban = ((45 - 28) / 45) * 100;
echo "Hasilnya adalah : $jawaban%";
?>