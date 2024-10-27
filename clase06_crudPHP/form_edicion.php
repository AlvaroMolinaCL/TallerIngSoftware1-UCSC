<?php
    require('conexion.php');

    $id_recibido = $_GET["id_e"];
    $consulta = "SELECT * FROM alumnos WHERE id = '$id_recibido'";
    $resultado = mysqli_query($conexion, $consulta);

    while ($row = mysqli_fetch_assoc($resultado))
    {
        $nombre = $row["nombre"];
        $apellido = $row["apellido"];
        $rut = $row["rut"];
        $id = $row["id"];
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
</head>
<body>
    <form action="editar.php" method="POST">
        <label for="">Nombre</label>
        <input type="text" name="nombre_e" value="<?php echo $nombre ?>"><br>

        <label for="">Apellido</label>
        <input type="text" name="apellido_e" value="<?php echo $apellido ?>"><br>
        
        <label for="">RUT</label>
        <input type="number" name="rut_e" value="<?php echo $rut ?>"><br>

        <input type="hidden" name="id_e" value="<?php echo $id_recibido ?>">
        <input type="submit" value="Guardar">
    </form>

</body>
</html>