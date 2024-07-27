<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Orang Tua</title>
    <link rel="stylesheet" href="../../../../public/css/styleLoginRegis.css">
</head>
<body>
    <form action="../../../controller/responden/orangtua/orangtua_regis_validate.php" method="post">
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
  

                <header>Informasi Orang Tua</header>
                
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
                
                <label for="umur">Umur</label>
                <input type="text" id="umur" name="umur" placeholder="Masukkan Umur Anda" required>
                
                <label for="nohp">No. HP</label>
                <input type="text" id="nohp" name="nohp" placeholder="Masukkan No. HP Anda" required>
                
                <label for="pendidikan">Pendidikan</label>
                <input type="text" id="pendidikan" name="pendidikan" placeholder="Masukkan Pendidikan Anda" required>
                
                <label for="pekerjaan">Pekerjaan</label>
                <input type="text" id="pekerjaan" name="pekerjaan" placeholder="Masukkan Pekerjaan Anda" required>

                <label for="nim_mahasiswa">NIM Mahasiswa</label>
                <input type="text" id="nim_mahasiswa" name="nim_mahasiswa" placeholder="Masukkan NIM Mahasiswa Anda" required>
                
                <label for="nama_mahasiswa">Nama Lengkap Mahasiswa</label>
                <input type="text" id="nama_mahasiswa" name="nama_mahasiswa" placeholder="Masukkan Nama Lengkap Mahasiswa Anda" required>
                
                <label for="prodi">Prodi Mahasiswa</label>
                <select id="prodi" name="prodi" required>
                    <option value="TI">D4 Teknik Informatika</option>
                    <option value="SIB">D4 Sistem Informasi Bisnis</option>
                    <option value = "FastTrack">D2 Fast Track</option>
                </select>
            </div>
            <div class="submit">
                <input type="submit" name ="regisOrtu" value="Register">
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
