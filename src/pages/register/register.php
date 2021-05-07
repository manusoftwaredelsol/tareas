<head>
    <meta charset="UTF-8">
    <title>title</title>
    <link rel="stylesheet" href="../../test.css">
</head>

        <form method="post" action="" name="register">
    <div class="form-element">
        <label>Usuario</label>
        <input type="text" name="username" required />
    </div>
    <div class="form-element">
        <label>Email</label>
        <input type="email" name="email" required />
    </div>
    <div class="form-element">
        <label>Contraseña</label>
        <input type="password" name="password" required />
    </div>
    <div class="form-element">
        <label>Confirmar contraseña</label>
        <input type="password" name="password-check" required />
    </div>
    <button type="submit" name="register" value="register">Registrarse</button>
</form>
        <?php
        
        
 
        if (isset($_POST['register'])) {
 
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordCheck = $_POST['password-check'];
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
 
        $query = $connection->prepare("SELECT * FROM user WHERE EMAIL=:email and USERNAME=:username");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->execute();
        
        if ($password!=$passwordCheck){
            echo '<p class="error">Las contraseñas no coinciden</p>';
            exit();
        }
 
        if ($query->rowCount() > 0) {
            echo '<p class="error">El e-mail introducido ya ha sido registrado</p>';
        }
        
        
 
        if ($query->rowCount() == 0) {
            $query = $connection->prepare("INSERT INTO user(USERNAME,PASSWORD,EMAIL) VALUES (:username,:password_hash,:email)");
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $result = $query->execute();
 
            if ($result) {
                echo '<p class="success">Registro completado correctamente</p>';
            } else {
                echo '<p class="error">Algo no ha ido bien...</p>';
            }
        }
    }
        ?>
        
    <a href="/login"> Iniciar sesión </a>



