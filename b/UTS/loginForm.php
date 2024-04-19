<?php 
  session_start();
  if (isset($_SESSION["nama"])) {
    header("location: ../UTS/index.php");
    exit;
  }
?> 
<html>
  <head>
    <title> Login Form </title>
    <link rel="stylesheet" type="text/css" href="../UTS/style/styleLogdanRegis.css">
  </head>
  <body>
      <div class="input-login">
        <h1> LOGIN </h1>
        <form action="../UTS/Process/login.php" method="post">
          <div class="box-login">
            <input type="text" name="username" placeholder="Username" />
            <input type="password" name="password" placeholder="Password" />
          </div>
          <div>
            <input type="checkbox" name="remember" value = "Remember Me">
            <label for="remember">Remember me</label>
          </div>
          <div class="submit">
            <input type="submit" name="login" value="Submit" />
          </div>
          <div class="switch">
            <p>Belum punya akun?
              <a href="../UTS/registerForm.html">Register</a>
            </p>
          </div>        
        </form>
      </div>
  </body>
</html>



