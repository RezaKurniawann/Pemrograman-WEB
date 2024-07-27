<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="public/css/styleHomePage.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
    <header>
        <div class="image">
            <img src="public/image/polinema-logo.png">
        </div>
        <p>Polinema Survey</p>
        <nav>
            <a href="#beranda">Beranda</a>
            <a href="#panduan">Panduan</a>
            <a href="#kontak">Kontak</a>
            <a href="app/views/login.php" class="login">Masuk</a>
        </nav> 
    </header>
    <div id="beranda" class="section">
        <div class="container-beranda">
            <div class="grid-konten">
                <p>Suara Anda Didengar!</p>
                <a>Dengan menggunakan Website Survey Kepuasan Pelanggan Polinema, Polinema dapat secara terus-menerus memperbaiki layanan mereka berdasarkan umpan balik langsung dari pelanggan, meningkatkan kepuasan pelanggan, dan membangun hubungan yang lebih kuat dengan komunitas mereka.</a>
                <button onclick="window.location.href='app/views/login.php'">Mulai Survey >></button>
            </div>
            <div class="grid-konten">
                <img class="karakter" src="public/image/character1.png">
                <img class="karakter" src="public/image/character2.png">
            </div>
        </div>
    </div>
    <div id="panduan" class="section">
    <p class="header-panduan"> Panduan </p>
    <div class="container-panduan">
        <div class="grid-konten">
            <p class="nomor">1</p>
            <p class="alur">Pilih Peran</p>
            <p class="deskripsi">Memilih role yang tersedia</p>
        </div>
        <div class="grid-konten">
            <p class="nomor">2</p>
            <p class="alur">Login/Register</p>
            <p class="deskripsi">Login dengan mengisi username dan password</p>
        </div>
        <div class="grid-konten">
            <p class="nomor">3</p>
            <p class="alur">Pilih Kategori Survey</p>
            <p class="deskripsi">Memilih Jenis survey yang telah tersedia</p>
        </div>
        <div class="grid-konten">
            <p class="nomor">4</p>
            <p class="alur">Pengisian Survey</p>
            <p class="deskripsi">Pengisian survey sesuai dengan ketentuan yang telah ditentukan</p>
        </div>
        <div class="grid-konten">
            <p class="nomor">5</p>
            <p class="alur">Pengiriman Survey</p>
            <p class="deskripsi">Pengiriman survey</p>
        </div>
        <div class="grid-konten">
            <p class="nomor">6</p>
            <p class="alur">Selesai</p>
            <p class="deskripsi">Survey telah selesai</p>
        </div>
    </div>
</div>

    <div id="kontak" class="section">
    <p class="header-kontak">Kontak</p>
        <div class= "container-kontak">
            <div class= "grid-konten">
                <img src="public/image/polinema-logo.png">
                <img src="public/image/jti-logo.png">
                <p>BLU POLITEKNIK NEGERI MALANG</p>
                <p>Soekarno Hatta Street No.9 Malang 65141, Jatimulyo, Kec. Lowokwaru, Malang, East Java - Indonesia</p>
            </div>
            <div class = "grid-konten">
                <div class = "social-media">
                    <a href="https://www.facebook.com/polinema"> 
                        <img src="public/image/facebook-logo.png">
                    </a> 
                    <a href="https://www.instagram.com/polinema_campus/?hl=en"> 
                        <img src="public/image/instagram-logo.png">
                    </a> 
                    <a href = "https://x.com/polinema_campus"> 
                        <img src="public/image/x-logo.png"> 
                    </a>
                        
                    <a href="https://www.youtube.com/@PoliteknikNegeriMalangOfficial"> 
                        <img src="public/image/youtube-logo.png"> 
                    </a>
                </div>
                
            </div>
        </div>
    </div>
    <footer>
        <a>Copyright © 2024 Polinema. All rights reserved.</a>
    </footer>
</body>
</html>
