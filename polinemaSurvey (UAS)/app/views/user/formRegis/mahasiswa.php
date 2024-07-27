<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <link rel="stylesheet" href="../../../../public/css/styleLoginRegis.css">
</head>
<body>
    <form action="../../../controller/responden/mahasiswa/mahasiswa_regis_validate.php" method="post">
        <div class="container-register">
            
            <div class="box-register">
                <div class="image">
                    <img src="../../../../public/image/polinema-logo.png" alt="LogoPolinema">
                    <p>Polinema Survey</p>
                </div>
                <header>Akun Login</header>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Masukkan Nama Lengkap Anda" required>

                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan Username" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan Password" required>
  

                <header>Informasi Mahasiswa</header>
                <label for="nim">NIM</label>
                <input type="text" id="nim" name="nim" placeholder="Masukkan NIM Anda" required>
                
                <label for="prodi">Prodi</label>
                <select id="prodi" name="prodi" required>
                    <option value="TI">D4 Teknik Informatika</option>
                    <option value="SIB">D4 Sistem Informasi Bisnis</option>
                    <option value = "FastTrack">D2 Fast Track</option>
                </select>

                
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan Email Anda"required>
                
                <label for="nohp">No. HP</label>
                <input type="text" id="nohp" name="nohp" placeholder="Masukkan No. HP Anda" required>
                
                <label for="tahunmasuk">Tahun Masuk</label>
                <input type="number" id="tahunmasuk" name="tahunmasuk" placeholder="Masukkan Tahun Masuk Anda" required>
                           
            </div>
            <div class="submit">
                <input type="submit" name ="regisMahasiswa" value="Register">
            </div>
            <div class="switch">
                <p>sudah punya akun?
                    <a href="../../login.php">Login</a>
                </p>
            </div>
        </div>
    </form>
</body>
</html>