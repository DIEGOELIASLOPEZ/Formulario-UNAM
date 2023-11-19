<?php
include("conexion.php");

if(isset($_GET['id'])){
    $txtid = $_GET['id'];
    $stm = $conexion->prepare("SELECT * FROM registro WHERE id=:txtid");
    $stm->bindParam(":txtid", $txtid);
    $stm->execute();
    $edicion = $stm->fetch(PDO::FETCH_ASSOC);

    // Asigna los valores a las variables
    $no_cuenta = $edicion['no_cuenta'];
    $nombre = $edicion['nombres'];
    $apellido_paterno = $edicion['apellido_paterno'];
    $apellido_materno = $edicion['apellido_materno'];
    $facultad = $edicion['facultad'];
    $carrera = $edicion['carrera'];
    $generacion = $edicion['anio_ingreso'];
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
        <form id="miFormulario" action="actualizar.php" method="post">
            <!-- Campo oculto para almacenar el id -->
            <input type="hidden" name="id" value="<?= $txtid ?>">

            <label for="numeroCuenta">Número de Cuenta:</label>
            <input type="text" id="numeroCuenta" name="numeroCuenta" value="<?= $no_cuenta ?>">

            <label for="nombre">Nombre(s):</label>
            <input type="text" id="nombre" name="nombre" value="<?= $nombre ?>">

            <label for="apellido_paterno">Apellido Paterno:</label>
            <input type="text" id="apellido_paterno" name="apellido_paterno" value="<?= $apellido_paterno ?>">

            <label for="apellido_materno">Apellido Materno:</label>
            <input type="text" id="apellido_materno" name="apellido_materno" value="<?= $apellido_materno ?>">

            <label for="facultad">Facultad o FES:</label>
            <input type="text" id="facultad" name="facultad" value="<?= $facultad ?>">

            <label for="carrera">Carrera:</label>
            <input type="text" id="carrera" name="carrera" value="<?= $carrera ?>">

            <label for="generacion">Generación:</label>
            <input type="text" id="generacion" name="generacion" value="<?= $generacion ?>">
            
            <button type="submit">Cancelar</button>
            <button type="submit">Actualizar</button>
        </form>
    </div>
</body>
</html>
