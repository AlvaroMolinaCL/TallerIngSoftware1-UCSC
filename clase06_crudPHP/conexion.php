<?php
    $conexion = mysqli_connect("localhost", "root", "", "tis1");
    // server, user mysql, pass mysql, bd name

    if ($conexion->connect_error)
    {
        die("Conexión fallida: " . $conn->connect_error);
    }
?>