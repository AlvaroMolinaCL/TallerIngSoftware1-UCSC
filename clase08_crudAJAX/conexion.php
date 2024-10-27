<?php
    $conexion = mysqli_connect("localhost", "root", "", "ajax");

    if(mysqli_connect_error())
    {
        echo "Failed to connect to MySQL: ". mysqli_connect_error();
    }
?>