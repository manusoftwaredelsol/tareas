<?php
if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];


    $query = $connection->prepare("SELECT * FROM user WHERE USERNAME=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();


    $result = $query->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        echo '<p class="error">Usuario o contraseña incorrectos!</p>';
    } else {
        if (password_verify($password, $result['password'])) {
            $_SESSION['user'] = array(
                'user_id' => $result['id'],
                'username' => $result['username'],
                'password' => $password
            );
            echo '<p class="success">Acceso concedido</p>';
            // header("Location: userpage.php");
            // Rutas relativas al dominio, la que pondrías en el navegador
            header("Location:/userpage");
            // Exit siempre después de un location
            exit;
        } else {
            echo '<p class="error">Usuario o contraseña incorrectos!</p>';
        }
    }
}
?>

<html>

<head>
    <meta charset="UTF-8">
    <title>title</title>
    <link rel="stylesheet" href="../../test.css">
</head>

<body>

    <h1> BIENVENIDO A TU PAGINA WEB </h1>
    <h2> Introduce tu usuario y contraseña para hacer algo </h2>
    <form method="post">
        <div class="form-element">
            Usuario: <input type="text" name="username"> </br> </br>
        </div>
        <div class="form-element">
            Contraseña: <input type="password" name="password"> </br> </br>
        </div>
        <div class="form-element">
            <button type="submit" name="login" value="login">Entrar</button>
        </div>
    </form>


    <h2>Si no tienes una cuenta...<h2>
    <!-- <form action="../register/register.php">
        <button type="submit" name="registrarse" value="registrarse">Registrarse</button>
    </form> -->
    <!-- Con un enlace vale, a la ruta que definimos en el switch, no al .php -->
    <a href="/register">Registrarse</a>
</body>

</html>