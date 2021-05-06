<?php

?>
        
        

<html>
    <head>
        <meta charset="UTF-8">
        <title>Cuenta</title>
        <link rel="stylesheet" href="../../../public/test.css">
    </head>
    <body>
        <h2>Información del usuario</h2>
        <br><br>
        Nombre de usuario: <?= $_SESSION['user']['username'] ?><br><br>
        Contraseña: <?= $_SESSION['user']['password'] ?>
        <br><br>
        <a href="/logout">Cerrar sesión</a>   
    </body>
</html>


