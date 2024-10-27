<?php
    require('conexion.php');

    // Verificar si los campos fueron enviados por el formulario
    if (isset($_POST['id']))
    {
        $id = $_POST['id'];

        $sql = "DELETE FROM alumnos WHERE id = $id";

        // Ejecutar la consulta y verificar si fue exitosa
        if (mysqli_query($conexion, $sql))
        {
            echo "Registro eliminado exitosamente.";
        } else
        {
            echo "Error: " . mysqli_error($conexion);
        }

        // Cerrar la conexión
        mysqli_close($conexion);
    }
    else
    {
        echo "No se recibieron los datos necesarios.";
    }
?>