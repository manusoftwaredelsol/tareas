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

<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Introduce tus datos</h5>
            <form method="post" action="" class="form-signin" name="register">
              <div class="form-label-group">    
                <label for="inputUser">Usuario</label>
                <input type="text" name="username" class="form-control" placeholder="Usuario" required autofocus>
                <br/>
              </div>
                <div class="form-label-group">    
                <label for="inputEmail">E-mail</label>
                <input type="text" name="email" class="form-control" placeholder="E-mail" required autofocus>
                <br/>
              </div>
              <div class="form-label-group">
                <label for="inputPassword">Contraseña</label>
                <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                <br/>
              </div>
              <div class="form-label-group">
                <label for="inputConfirmPassword">Confirmar Contraseña</label>
                <input type="password" name="password-check" class="form-control" placeholder="Confirmar Contraseña" required>
                <br/>
              </div>
              <button class="btn btn-primary text-center" type="submit" value="register">Confirmar registro</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>            
<a href="/login" class="btn-check"> Iniciar sesión </a>



