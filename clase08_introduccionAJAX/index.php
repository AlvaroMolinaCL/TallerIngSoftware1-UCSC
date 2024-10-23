<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX</title>
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
</body>

</html>