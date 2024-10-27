<?php
    require('conexion.php');

    // Verificar si los campos fueron enviados por el formulario
    if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['last_name']))
    {
        $id = $_POST['id'];
        $nombre_recibido = $_POST['name'];
        $apellido_recibido = $_POST['last_name'];

        // Usar comillas para los valores de las cadenas en la consulta SQL 
        $sql = "UPDATE alumnos SET nombre = '$nombre_recibido', apellido = '$apellido_recibido' WHERE id = $id";

        // Ejecutar la consulta y verificar si fue exitosa
        if (mysqli_query($conexion, $sql))
        {
            echo "Registro actualizado exitosamente.";
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