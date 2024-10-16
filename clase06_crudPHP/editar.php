<?php
    require('conexion.php');

    $nombre_r = $_POST["nombre_e"];
    $apellido_r = $_POST["apellido_e"];
    $rut_r = $_POST["rut_e"];
    $id_r = $_POST["id_e"];
    
    $consulta = "UPDATE alumnos SET nombre = '$nombre_r', apellido = '$apellido_r', rut = '$rut_r' WHERE id = '$id_r';";
    $resultado = mysqli_query($conexion, $consulta);

    header('Location: index.php');
?>