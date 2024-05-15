<!DOCTYPE html>
<html>
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
        }
        .role a:hover {
            transform: scale(1.1); /* Membesarkan gambar saat dihover */
        }
    </style>
</head>
<body>
    <header> Pilih Peran </header>
    <div class="role">
        <a href="../polinemaSurvey/formRegis/mahasiswa.html"> 
            <img src="../polinemaSurvey/image/mahasiswa.png">
        </a> 
        <a href="../polinemaSurvey/formRegis/alumni.html"> 
            <img src="../polinemaSurvey/image/alumni.png">
        </a> 
        <a href = "../polinemaSurvey/formRegis/orangtua.html"> 
            <img src="../polinemaSurvey/image/orangtua.png"> 
        </a>
            
        <a href="../polinemaSurvey/formRegis/dosen.html">  
            <img src="../polinemaSurvey/image/dosen.png">
        </a>
            
        <a href="../polinemaSurvey/formRegis/tendik.html"> 
            <img src="../polinemaSurvey/image/tendik.png"> 
        </a>
            
        <a href="../polinemaSurvey/formRegis/industri.html"> 
            <img src="../polinemaSurvey/image/industri.png"> 
        </a>
    </div>  
</body>
</html>