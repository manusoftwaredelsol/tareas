<html>
    <head>
        <meta charset="UTF-8">
        <title>Cuenta</title>
        <link rel="stylesheet" href="../../../public/test.css">
    </head>
    <body>
        <h2>Información del usuario</h2>
        
        <?php
        session_start();
        ?>
        
        Nombre de usuario: <?= $_SESSION['username'] ?><br><br>
        Contraseña: <?= $_SESSION['password'] ?>
              
        
        <br><br>
        <form action="../../clear-session.php">
            <input type="submit" value="Cerrar sesión">
        </form>  
    </body>
</html>


