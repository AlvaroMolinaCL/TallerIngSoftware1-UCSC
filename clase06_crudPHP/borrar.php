<?php
    require('conexion.php');

    $id_r = $_GET["id_e"];
    
    $consulta = "DELETE FROM alumnos WHERE id = '$id_r';";
    $resultado = mysqli_query($conexion, $consulta);

    header('Location: index.php');
?>