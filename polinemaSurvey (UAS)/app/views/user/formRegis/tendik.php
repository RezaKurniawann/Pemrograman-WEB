<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Tendik</title>
    <link rel="stylesheet" href="../../../../public/css/styleLoginRegis.css">
</head>
<body>
    <form action="../../../controller/responden/tendik/tendik__regis_validate.php" method="post">
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

                <header>Informasi Tendik</header>

                <label for="nopeg">NOPEG</label>
                <input type="text" id="nopeg" name="nopeg" placeholder="Masukkan NOPEG Anda" required>
                
                <label for="unit">Unit</label>
                <input type="text" id="unit" name="unit" placeholder="Masukkan Unit Anda" required>
            </div>
            <div class="submit">
                <input type="submit" name ="regisTendik" value="Register">
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
