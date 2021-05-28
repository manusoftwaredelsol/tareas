<?php

?>
<div class="container">
    <div class="container">
    </div>
    <div class="container">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
    <h2>Información del usuario</h2>
    <br>
    Nombre de usuario: <?= $_SESSION['user']['username'] ?><br><br>
    Id de usuario: <?= $_SESSION['user']['id_user'] ?><br><br>
    Contraseña: <?= $_SESSION['user']['password'] ?>
    <br><br>
    <a class="btn btn-primary" href="/tareas">Revisar tareas</a> <a class="btn btn-danger "href="/logout">Cerrar sesión</a>
    </div>
    </div>
</div>    
      

