<?php
session_start();
define('USER', 'tareas');
define('PASSWORD', 'tareas');
define('HOST', '192.168.12.10');
define('DATABASE', 'tareas');

try {
    $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
