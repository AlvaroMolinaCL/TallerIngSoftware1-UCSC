<?php
    require('conexion.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="ingresar.php" method="POST">
        <label for="">Nombre</label>
        <input type="text" name="nombre_e"><br>

        <label for="">Apellido</label>
        <input type="text" name="apellido_e"><br>
        
        <label for="">RUT</label>
        <input type="number" name="rut_e"><br>

        <input type="submit" value="Guardar">
    </form>

    <table>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>RUT</th>
            <th>Opciones</th>
        </tr>

        <?php
        $consulta = "SELECT * FROM alumnos";
        $resultado = mysqli_query($conexion, $consulta);

        while ($row = mysqli_fetch_assoc($resultado))
        {
            $nombre = $row["nombre"];
            $apellido = $row["apellido"];
            $rut = $row["rut"];
            $id = $row["id"];

            echo "<tr>";
                echo "<td>".$nombre."</td>";
                echo "<td>".$apellido."</td>";
                echo "<td>".$rut."</td>";
                echo "<td>";
                    echo "<a href='borrar.php?id_e=".$id."'>Borrar</a>";
                    echo " ";
                    echo "<a href='form_edicion.php?id_e=".$id."'>Editar</a>";
                echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>

</body>
</html>