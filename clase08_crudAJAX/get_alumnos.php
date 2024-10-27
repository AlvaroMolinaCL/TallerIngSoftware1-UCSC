<?php 
    require('conexion.php');

    $consulta = "SELECT * FROM alumnos";
    $resultado = mysqli_query($conexion, $consulta);
    $alumnos = array();
    
    while ($row = mysqli_fetch_assoc($resultado))
    {
        $alumnos[] = $row;
    }

    echo json_encode($alumnos);
?>
