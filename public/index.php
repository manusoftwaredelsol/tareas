<?php
require '../src/config.php';

$url  = parse_url($_SERVER['REQUEST_URI']);
$path = trim($url['path'], ' /');
$path = explode('/', $path);

$pagina = $path[0] ?? '';

ob_start();
switch ($pagina) {

    case '':
        if(isset($_SESSION['user'])) {
        header('Location:/tareas');
        exit;
        } else {
        header('Location:/login');
        exit;
        }

    case 'userpage':
        require '../src/pages/userpage/userpage.php';
        break;

    case 'register':
        require '../src/pages/register/register.php';
        break;

    case 'login':
        require '../src/pages/login/login.php';
        break;

    case 'tareas':
        require '../src/pages/tareas/tareas.php';
        break;
    
    case 'crearTarea':
        require '../src/pages/tareas/crearTarea.php';
        break;
    
    case 'logout':
        require '../src/clear-session.php';
        break;

    default:
        http_response_code(404);
        echo 'error 404';
        exit;
}

$body = ob_get_clean();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>title</title>
        <link rel="stylesheet" href="../../../public/test.css">
    </head>
    <body>
        <?php echo $body ?>
    </body>
</html>
