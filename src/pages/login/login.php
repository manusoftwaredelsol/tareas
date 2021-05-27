<?php
if (!empty($_SESSION['user']['id_user'])) {
    header('Location:/tareas');
    exit;
}

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];


    $query = $connection->prepare("SELECT * FROM user WHERE USERNAME=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();


    $result = $query->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        echo '<p class="error">Usuario o contraseña incorrectos!</p>';
    }
    else {
        if (password_verify($password, $result['password'])) {
            $_SESSION['user'] = array(
                'id_user'  => $result['id_user'],
                'username' => $result['username'],
                'password' => $password
            );
            echo '<p class="success">Acceso concedido</p>';
            // header("Location: userpage.php");
            // Rutas relativas al dominio, la que pondrías en el navegador
            header("Location:/userpage");
            // Exit siempre después de un location
            exit;
        }
        else {
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
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            <h3 class="card-title text-center">Bienvenido</h3>
                            <h5 class="card-title text-center">Introduce tus datos</h5>
                            <form method="post" action="#" class="form-signin">
                                <div class="form-label-group">
                                    <label for="username">Usuario</label>
                                    <input type="text" name="username" class="form-control" placeholder="Usuario" required autofocus>
                                    <br/>
                                </div>
                                <div class="form-label-group">
                                    <label for="password">Contraseña</label>
                                    <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                                    <br/>
                                </div>
                                <button class="btn btn-primary text-center" type="submit" name="login" value="login">Sign in</button>
                            </form>
                            <div class="row">
                                <h5 class="card-title text-center">Si no tienes cuenta...</h5>
                                <a class="btn btn-primary text-center" href="/register">Registrate</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>

