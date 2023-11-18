<?php
$servidor = "localhost";
$db = "formulario_unam";
$username = "root";
$pasword = "";

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$db", $username, $pasword);
    echo "CONEXION EXITOSA";
} catch (\Throwable $e) {
    echo $e->getMessage();
}
?>
