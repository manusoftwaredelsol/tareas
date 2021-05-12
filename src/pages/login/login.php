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
                'user_id' => $result['id_user'],
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
    
</head>

<body>
    
    <div class="container">
        <p class="p-1"> <h1> BIENVENIDO A TU PAGINA WEB </h1> </p>
        <p class="p-2"><h2> Introduce tu usuario y contraseña para hacer algo </h2> </p>
    </div>
    <form method="post">
        <div class="container">
            Usuario: <input type="text" class="form-control" name="username"> </br> </br>
        </div>
        <div class="container">
            Contraseña: <input type="password" class="form-control" name="password"> </br> </br>
        </div>
        <div class="container">
            <button type="submit" class="btn btn-primary" name="login" value="login">Entrar</button>
        </div>
    </form>

    <div class="container">
    <p class="p-2"><h2>Si no tienes una cuenta...<h2></p>
    <!-- <form action="../register/register.php">
        <button type="submit" name="registrarse" value="registrarse">Registrarse</button>
    </form> -->
    <!-- Con un enlace vale, a la ruta que definimos en el switch, no al .php -->
    <a href="/register" class="btn btn-primary">Registrarse</a>
    </div>
</body>

</html>