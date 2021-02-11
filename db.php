<?php
//Conectamos a la base de datos, el 3 campo es la password,como estoy usando phpmyadmin
//y tengo los valores por defecto, el user es root, y no hay password.
    $con = mysqli_connect("localhost","root","","LoginSystem");
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>