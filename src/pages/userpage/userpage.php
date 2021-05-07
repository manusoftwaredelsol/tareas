<?php

?>
        
        


        <h2>Información del usuario</h2>
        <br><br>
        <a href="/tareas">Revisar tareas</a>
        <br><br>
        Nombre de usuario: <?= $_SESSION['user']['username'] ?><br><br>
        Contraseña: <?= $_SESSION['user']['password'] ?>
        <br><br>
        <a href="/logout">Cerrar sesión</a>   


