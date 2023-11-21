<?php
$servidor = "localhost";
$db = "id21552882_formulario_unam";
$username = "id21552882_dieelias";
$pasword = "Diegoelias123!";

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$db", $username, $pasword);

} catch (\Throwable $e) {
    echo $e->getMessage();
}
?>