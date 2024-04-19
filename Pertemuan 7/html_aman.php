<?php
// Inisialisasi variabel input dan email
$input = '';
$email = '';
$result = ''; // Variabel untuk menyimpan hasil pengolahan

// Cek apakah data POST telah dikirimkan
if(isset($_POST['input'])){
    // Mengambil data dari input POST
    $input = $_POST['input'];
    
    // Melakukan sanitasi dengan htmlspecialchars untuk menghindari serangan injeksi
    $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
}

// Cek apakah email POST telah dikirimkan
if(isset($_POST['email'])){
    $email = $_POST['email'];
    
    // Melakukan validasi email dengan filter_var
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        // Lanjutkan dengan pengolahan email yang aman

        // Misalnya, kita hanya akan menampilkan email yang valid
        $result = "Nama: " . $input . "<br>Email yang valid: " . $email;
    }else{
        // Tangani input email yang tidak valid
        $result = "Nama: " . $input . "<br>Email tidak valid.";
    }
}

// Tampilkan form HTML
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form PHP</title>
</head>
<body>
    <h1>Form PHP</h1>
    <form method="post" action="">
        <label for="input">Masukkan data:</label>
        <input type="text" name="input" id="input" value="<?php echo $input; ?>"><br><br>
        
        <label for="email">Masukkan email:</label>
        <input type="text" name="email" id="email" value="<?php echo $email; ?>"><br><br>
        
        <input type="submit" value="Submit">
    </form>

    <?php
    // Tampilkan hasil di bawah formulir jika ada hasil
    if(!empty($result)){
        echo "<p>" . $result . "</p>";
    }
    ?>
</body>
</html>