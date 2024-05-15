<?php
    session_start();
    
    if (!isset($_SESSION["nama"])) {
        header("location: ../UTS/loginForm.php");
        exit;
    }
?>

<html>
<head>
    <title>HOME</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../UTS/style/styleHome.css">
</head>
<body>
    <!-- Div untuk header -->
    <div class="head">
        <a class="logout" href="../UTS/Process/logout.php">Log Out</a>
    </div>
    <div class="container">
        <div class="card">
            <div class="box">
                <img src="../UTS/img/analis.jpg" alt="Card Image">
                <div class="content">
                    <h3>Data Analis</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, totam velit? Iure nemo labore inventore?</p>
                    <a href="#">Daftar</a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="box">
                <img src="../UTS/img/web.jpg" alt="Card Image">
                <div class="content">
                    <h3>Web Developer</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, totam velit? Iure nemo labore inventore?</p>
                    <a href="#">Daftar</a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="box">
                <img src="../UTS/img/ai.jpg" alt="Card Image">
                <div class="content">
                    <h3>AI Engineer</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, totam velit? Iure nemo labore inventore?</p>
                    <a href="#">Daftar</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
