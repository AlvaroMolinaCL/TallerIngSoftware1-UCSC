<?php
    $conexion = mysqli_connect("localhost", "root", "", "ajax");

    if(mysqli_connect_error())
    {
        echo "Error de Conexión con MySQL: ". mysqli_connect_error();
    }
?>