<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD AJAX</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>
    <form action="" method="POST">
        <input type="text" name="nombre" id="name" placeholder="Nombre" value="">
        <input type="text" name="apellido" id="last_name" placeholder="Apellido" value="">
        <input type="button" name="guardar" id="update" value="Guardar">
    </form>
    <script>
        $("#update").click
            (
                function (e)
                {
                    e.preventDefault();

                    // Recoge los valores de los campos
                    var name = $("#name").val();
                    var last_name = $("#last_name").val();
                    // var dataString = 'name='+name+'&last_name='+last_name;

                    // Envía los datos como un objeto
                    $.ajax
                    (
                        {
                            type: 'POST',
                            data: { name: name, last_name: last_name }, // Envía el objeto completo
                            url: 'ingresar.php',

                            success: function (response)
                            {
                                console.log(response);
                                cargarAlumnos();

                                $("#name").val("");
                                $("#last_name").val("");
                            },

                            error: function (xhr, status, error)
                            {
                                console.error(xhr.responseText);
                            }
                        }
                    );
                }
            );
    </script>
    <br>
    <table id="tabla-alumnos">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!-- Las filas se insertan aquí de forma dinámica -->
        </tbody>
    </table>
    <script>
        // Función para cargar la tabla con datos usando AJAX
        function cargarAlumnos()
        {
            $.ajax
            (
                {
                    type: 'GET',
                    dataType: 'json',
                    url: 'get_alumnos.php', // Archivo PHP con la consulta que obtiene todos los datos de la tabla

                    success: function (data)
                    {
                        // Se limpia la tabla antes de llenarla
                        $("#tabla-alumnos tbody").empty();

                        // Se itera sobre los datos recibidos
                        $.each(data,
                            function (index, alumno)
                            {
                                let fila = `<tr>
                                                <td>${alumno.id}</td>
                                                <td><input type="text" value="${alumno.nombre}" id="name-${alumno.id}"></td>
                                                <td><input type="text" value="${alumno.apellido}" id="last_name-${alumno.id}"></td>
                                                <td>
                                                    <input type="button" onclick="editar(${alumno.id})" value="Guardar">
                                                    <input type="button" onclick="eliminar(${alumno.id})" value="Eliminar">
                                                </td>
                                            </tr>`;
                                // Se agrega la fila a la tabla
                                $("#tabla-alumnos tbody").append(fila);
                            }
                        );
                    },

                    error: function (xhr, status, error)
                    {
                        console.error(xhr.responseText);
                    }
                }
            );
        }

        // Se carga la tabla cuando la página es cargada
        $(document).ready(function ()
        {
            cargarAlumnos();
        });
    </script>
    <script>
        function eliminar(id)
        {
            $.ajax
            (
                {
                    type: 'POST',
                    data: { id: id },
                    dataType: 'json',
                    url: 'borrar.php',

                    success: function(response)
                    {
                        if (response.status === "success")
                        {
                            console.log(response);
                            cargarAlumnos();
                        }
                        else
                        {
                            alert("Error: " + response.message);
                        }
                    },

                    error: function (xhr, status, error)
                    {
                        console.error(xhr.responseText);
                    }
                }
            );
        }
    </script>
    <script>
        function editar(id)
        {
            var name = $("#name-" + id).val();
            var last_name = $("#last_name-" + id).val();
            
            $.ajax
            (
                {
                    type: 'POST',
                    data: { id: id, name: name, last_name: last_name },
                    dataType: 'json',
                    url: 'editar.php',

                    success: function(response)
                    {
                        if (response.status === "success")
                        {
                            alert(response.message);
                            cargarAlumnos();
                        }
                        else
                        {
                            alert("Error: " + response.message);
                        }
                    },

                    error: function (xhr, status, error)
                    {
                        console.error(xhr.responseText);
                    }
                }
            );
        }
    </script>
</body>

</html>