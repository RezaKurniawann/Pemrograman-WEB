<!DOCTYPE php>
<php>
<head>
    <title>Login Form</title>
    <style>
        header {
            font-size: 50px;
            text-align: center;
            margin-bottom: 10px;
            margin-top: 40px;
        }
        body {
            background-color: #2c4182;
            color: white;  
        }
        .role {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }
        .role a {
            flex: 0 0 20%; /* Setiap gambar memenuhi 30% lebar container */
            margin: 50px;
            text-align: center;
            transition: transform 0.5s ease;
        }
        img {
            width: 100%; 
            height: auto;
            max-width: 200px; /* Lebar maksimum gambar */
            box-shadow: 10px 10px 10px 10px rgba(0,0,0,0.1);
            border-radius: 15px;
        }
        .role a:hover {
            transform: scale(1.1); /* Membesarkan gambar saat dihover */
        }
    </style>
</head>
<body>
    <header> Pilih Peran </header>
    <div class="role">
        <a href="user/formRegis/mahasiswa.php"> 
            <img src="../../public/image/mahasiswa.png">
        </a> 
        <a href="user/formRegis/alumni.php"> 
            <img src="../../public/image/alumni.png">
        </a> 
        <a href = "user/formRegis/orangtua.php"> 
            <img src="../../public/image/orangtua.png"> 
        </a>
        <a href="user/formRegis/dosen.php">  
            <img src="../../public/image/dosen.png">
        </a>
        <a href="user/formRegis/tendik.php"> 
            <img src="../../public/image/tendik.png"> 
        </a>
        <a href="user/formRegis/industri.php"> 
            <img src="../../public/image/industri.png"> 
        </a>
    </div>  
</body>
</php>