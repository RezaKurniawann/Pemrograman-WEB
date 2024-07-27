<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Industri</title>
    <link rel="stylesheet" href="../../../../public/css/styleLoginRegis.css">
</head>
<body>
    <form action="../../../controller/responden/industri/industri_regis_validate.php" method="post">
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
  

                <header>Informasi Industri</header>
                
                <label for="jabatan">Jabatan</label>
                <input type="text" id="jabatan" name="jabatan" placeholder="Masukkan Jabatan Anda" required>
                
                <label for="perusahaan">Perusahaan</label>
                <input type="text" id="perusahaan" name="perusahaan" placeholder="Masukkan Nama Perusahaan Anda" required>
                
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan Email Anda" required>
                
                <label for="nohp">No. HP</label>
                <input type="text" id="nohp" name="nohp" placeholder="Masukkan No. HP Anda" required>
                
                <label for="kota">Kota</label>
                <input type="text" id="kota" name="kota" placeholder="Masukkan Kota Anda" required>
            </div>
            <div class="submit">
                <input type="submit" name ="regisIndustri" value="Register">
            </div>
            <div class="switch">
                <p>Sudah punya akun?
                    <a href="../../login.php">Login</a>
                </p>
            </div>
        </div>
    </form>
</body>
</html>
