<?php
$nilaiSiswa = [85,92,78,64,90,55,88,79,70,96];
$nilaiLulus = [];

foreach($nilaiSiswa as $nilai){
    if($nilai >= 70){
        $nilaiLulus[] = $nilai;
    }
}
echo "Daftar nilai siswa yang lulus: " . implode(', ',$nilaiLulus);

echo "<br>";

$daftarKaryawan = [
    ['Alice', 7],
    ['Bob', 3],
    ['Charlie', 9],
    ['David', 5],
    ['Eva', 6],
];
$karyawanPengalamanLimaTahun = [];

foreach($daftarKaryawan as $karyawan){
    if($karyawan[1] > 5){
        $karyawanPengalamanLimaTahun[] = $karyawan[0];
    }
}

echo "Daftar karyawan dengan pengalaman kerja lebih dari 5 tahun: " .implode(', ', $karyawanPengalamanLimaTahun);
echo "<br>";
echo "<br>";

$daftarNilai = [
    'Matematika' => [
        ['Alice', 85],
        ['Bob', 92],
        ['Charlie', 78],
    ],
    'Fisika' => [
        ['Alice', 90],
        ['Bob', 88],
        ['Charlie', 75],
    ],
    'Kimia' => [
        ['Alice', 92],
        ['Bob', 80],
        ['Charlie', 85],
    ],
];

$mataKuliah = 'Fisika';
echo "Daftar nilai mahasiswa dalam mata kuliah $mataKuliah: <br>";
foreach($daftarNilai[$mataKuliah] as $nilai){
    echo "Nama: {$nilai[0]}, Nilai: {$nilai[1]} <br>";
}

echo "<br>";
echo "<br>";
echo "Pertanyaan 1 <br>";
echo "Seorang guru ingin mencetak daftar nilai siswa dalam ujian matematika. Guru tersebut memiliki data setiap siswa terdrir dari nama dan nilai. Bantu guru ini mencetak daftar nilai siswa yang mencapai nilai di atas rata-rata kelas. Dengan ketentuan nama dan nilai siswa Alice dapat 85, Bob dapat 92, Charlie dapat 78, David dapat 64, Eva dapat 90 <br>";
echo "<br>";
echo "<br>";
$dataSiswa = [
    ["Alice", 85],
    ["Bob", 92],
    ["Charlie", 78],
    ["David", 64],
    ["Eva", 90]
];

// Hitung rata-rata kelas
$totalNilai = 0;
foreach ($dataSiswa as $siswa) {
    $totalNilai += $siswa[1]; // Indeks 1 adalah nilai siswa
}
$rataRataKelas = $totalNilai / count($dataSiswa);

// rata-rata kelas
echo "=> Rata-rata nilai kelas: $rataRataKelas <br>";
// Cetak daftar siswa dengan nilai di atas rata-rata kelas
echo "=> Daftar siswa dengan nilai di atas rata-rata kelas: <br>";

foreach ($dataSiswa as $siswa) {
    if ($siswa[1] > $rataRataKelas) {
        echo "Nama: " . $siswa[0] . ", Nilai: " . $siswa[1] . "<br>";
    }
}

?>