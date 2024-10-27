<?php
    require('conexion.php');

    // Verificar si los campos fueron enviados por el formulario
    if (isset($_POST['name']) && isset($_POST['last_name']))
    {
        $nombre_recibido = $_POST['name'];
        $apellido_recibido = $_POST['last_name'];
    
        // Usar comillas para los valores de las cadenas en la consulta SQL
        $sql = "INSERT INTO alumnos (nombre, apellido) VALUES ('$nombre_recibido', '$apellido_recibido')";
        
        // Ejecutar la consulta y verificar si fue exitosa
        if (mysqli_query($conexion, $sql))
        {
            echo "Registro insertado exitosamente.";
        }
        else
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