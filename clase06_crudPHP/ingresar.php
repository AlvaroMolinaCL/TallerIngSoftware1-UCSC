<?php
    require('conexion.php');

    $nombre_r = $_POST["nombre_e"];
    $apellido_r = $_POST["apellido_e"];
    $rut_r = $_POST["rut_e"];
    
    $consulta = "INSERT INTO alumnos (nombre, apellido, rut) VALUES ('$nombre_r', '$apellido_r', '$rut_r')";
    $resultado = mysqli_query($conexion, $consulta);

    header('Location: index.php');
?>