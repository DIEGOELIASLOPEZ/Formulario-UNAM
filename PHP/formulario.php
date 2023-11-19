<?php
include("conexion.php");

if ($_POST) {
    $numeroCuenta = (isset($_POST['numeroCuenta']) ? $_POST['numeroCuenta'] : "");
    $nombre = (isset($_POST['nombre']) ? $_POST['nombre'] : "");
    $apellido_paterno = (isset($_POST['apellido_paterno']) ? $_POST['apellido_paterno'] : "");
    $apellido_materno = (isset($_POST['apellido_materno']) ? $_POST['apellido_materno'] : "");
    $facultad = (isset($_POST['facultad']) ? $_POST['facultad'] : "");
    $carrera = (isset($_POST['carrera']) ? $_POST['carrera'] : "");
    $generacion = (isset($_POST['generacion']) ? $_POST['generacion'] : "");

    $stm = $conexion->prepare("INSERT INTO registro(no_cuenta, nombres, apellido_paterno, apellido_materno, facultad, carrera, anio_ingreso)
    VALUES (:numeroCuenta, :nombre, :apellido_paterno, :apellido_materno, :facultad, :carrera, :generacion)");

    $stm->bindParam(":numeroCuenta", $numeroCuenta);
    $stm->bindParam(":nombre", $nombre);
    $stm->bindParam(":apellido_paterno", $apellido_paterno);
    $stm->bindParam(":apellido_materno", $apellido_materno);
    $stm->bindParam(":facultad", $facultad);
    $stm->bindParam(":carrera", $carrera);
    $stm->bindParam(":generacion", $generacion);

    $stm->execute();
    
    header("location: enviado.php");
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="media/LOGO UNAM.png" type="image/x-icon">
    <link rel="stylesheet" href="media/estilos.css">
    <title>Formulario</title>
</head>
<body>
    <div class="contenedor">
        <form id="miFormulario" action="formulario.php" method="post">
            <label for="numeroCuenta">Número de Cuenta:</label>
            <input type="text" id="numeroCuenta" name="numeroCuenta" required>

            <label for="nombre">Nombre(s):</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="apellido_paterno">Apellido Paterno:</label>
            <input type="text" id="apellido_paterno" name="apellido_paterno" required>

            <label for="apellido_materno">Apellido Materno:</label>
            <input type="text" id="apellido_materno" name="apellido_materno" required>

            <label for="facultad">Facultad o FES:</label>
            <input type="text" id="facultad" name="facultad" required>

            <label for="carrera">Carrera:</label>
            <input type="text" id="carrera" name="carrera" required>

            <label for="generacion">Generación:</label>
            <input type="text" id="generacion" name="generacion" required>

            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>
