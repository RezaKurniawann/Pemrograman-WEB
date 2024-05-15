<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <link rel="stylesheet" href="../polinemaSurvey/style/styleLoginRegis.css">
</head>
<body>
    <div class="container-login">
        <div class="image">
            <img src="../polinemaSurvey/image/logo polinema.png">
            <p>Polinema Survey</p>
        </div>
        <div class="box-login">
            <form action="../polinemaSurvey/process/loginProcess.php">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter Username">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter Password">
            </form>
        </div>
        <div class="submit">
            <input type="submit" value="Login">
        </div>
        <div class="switch">
            <p>Belum punya akun?
                <a href="../polinemaSurvey/register.php">Register</a>
            </p>
        </div>
    </div>
</body>
</html>
