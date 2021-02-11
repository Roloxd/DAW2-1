<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registro</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    // Conectamos a la base de datos
    if (isset($_REQUEST['username'])) {
        //El stripslash es para quitarles el quote
        //El mysqli_real_escape_string basicamente nos crea una string sql que se pueda usar en sql. 
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, password, email, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>Te has registrado correctamente!.</h3><br/>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Algun campo obligatorio está vacio!.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registrarse</h1>
        <input type="text" class="login-input" name="username" placeholder="Usuario" required />
        <input type="text" class="login-input" name="email" placeholder="Dirección de correo">
        <input type="password" class="login-input" name="password" placeholder="Contraseña">
        <input type="submit" name="submit" value="Registro" class="login-button">
    </form>
<?php
    }
?>
</body>
</html>