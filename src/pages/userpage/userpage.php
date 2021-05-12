<?php

?>
<div class="container">
    <div class="container">
    <h2>Información del usuario</h2>
    </div>
    <br>
    <div class="container">
    Nombre de usuario: <?= $_SESSION['user']['username'] ?><br><br>
    Id de usuario: <?= $_SESSION['user']['user_id'] ?><br><br>
    Contraseña: <?= $_SESSION['user']['password'] ?>
    <br><br> 
    </div>
    <div class="container">
    <a class="btn btn-primary" href="/tareas">Revisar tareas</a> <a class="btn btn-danger "href="/logout">Cerrar sesión</a>
    </div>
</div>    
      

