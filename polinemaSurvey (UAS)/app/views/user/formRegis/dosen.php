<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Dosen</title>
    <link rel="stylesheet" href="../../../../public/css/styleLoginRegis.css">
</head>
<body>
    <form action="../../../controller/responden/dosen/dosen_regis_validate.php" method="post">
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

                <header>Informasi Dosen</header>

                <label for="nip">NIP</label>
                <input type="text" id="nip" name="nip" placeholder="Masukkan NIP Anda" required>
                
                <label for="unit">Unit</label>
                <input type="text" id="unit" name="unit" placeholder="Masukkan Unit Anda" required>
            </div>
            <div class="submit">
                <input type="submit" name ="regisDosen" value="Register">
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
