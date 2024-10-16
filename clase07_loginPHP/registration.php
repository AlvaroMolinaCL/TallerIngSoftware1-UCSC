<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>

<body>
    <?php
        require('db.php');

            if (isset($_REQUEST['username']))
            {
                $username = stripslashes($_REQUEST['username']);
                $username = mysqli_real_escape_string($con, $username);

                $email = stripslashes($_REQUEST['email']);
                $email = mysqli_real_escape_string($con, $email);

                $password = stripslashes($_REQUEST['password']);
                $password = mysqli_real_escape_string($con, $password);

                $query = "INSERT INTO users(username, password, email) VALUES ('$username', '".md5("$password")."', '$email')";
                $result = mysqli_query($con, $query);

                if ($result)
                {
                    echo "<div class='form'><h3>¡Te has registrado correctamente!</h3><br>Haz clic aquí para <a href='login.php'>iniciar sesión</a></div>";
                }
            }
            else
            {
    ?>
    <div class="form">
        <h1>Regístrate aquí</h1>
        <form name="registration" action="" method="post">
            <input type="text" name="username" placeholder="Usuario" required>
            <input type="email" name="email" placeholder="Correo" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <input type="submit" name="submit" value="Registrarse">
        </form>
    </div>
    <?php   } ?>
</body>

</html>