<?php
include("conexion.php");

// Inicializar variables
$id = $numeroCuenta = $nombre = $apellido_paterno = $apellido_materno = $facultad = $carrera = $generacion = "";

// Consulta y asignación de valores
if (isset($_GET['id'])) {
    $editarId = $_GET['id'];
    $stm = $conexion->prepare("SELECT * FROM registro WHERE id = :id");
    $stm->bindParam(":id", $editarId);
    $stm->execute();
    $datosEditar = $stm->fetch(PDO::FETCH_ASSOC);

    // Asignar valores de la base de datos a las variables
    if ($datosEditar) {
        $id = $datosEditar['id'];
        $numeroCuenta = $datosEditar['no_cuenta'];
        $nombre = $datosEditar['nombres'];
        $apellido_paterno = $datosEditar['apellido_paterno'];
        $apellido_materno = $datosEditar['apellido_materno'];
        $facultad = $datosEditar['facultad'];
        $carrera = $datosEditar['carrera'];
        $generacion = $datosEditar['anio_ingreso'];
    }
}

// Actualizar registro
if ($_POST) {
    $id = $_POST['id'];
    $numeroCuenta = $_POST['numeroCuenta'];
    $nombre = $_POST['nombre'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    $facultad = $_POST['facultad'];
    $carrera = $_POST['carrera'];
    $generacion = $_POST['generacion'];

    $stm = $conexion->prepare("UPDATE registro SET no_cuenta = :numeroCuenta, nombres = :nombre, apellido_paterno = :apellido_paterno, apellido_materno = :apellido_materno, facultad = :facultad, carrera = :carrera, anio_ingreso = :generacion WHERE id = :id");

    $stm->bindParam(":id", $id);
    $stm->bindParam(":numeroCuenta", $numeroCuenta);
    $stm->bindParam(":nombre", $nombre);
    $stm->bindParam(":apellido_paterno", $apellido_paterno);
    $stm->bindParam(":apellido_materno", $apellido_materno);
    $stm->bindParam(":facultad", $facultad);
    $stm->bindParam(":carrera", $carrera);
    $stm->bindParam(":generacion", $generacion);

    $stm->execute();

    // Redireccionar a la página deseada después de la actualización
    header("location: tabla.php");
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
    <title>Edición de Alumno</title>
</head>
<body>
    <div class="fondoEnviado">
        <div class="contenedor">
            <form id="miFormulario" action="edicion.php" method="post">
                <!-- Campo oculto para almacenar el ID del registro -->
                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <label for="numeroCuenta">Número de Cuenta:</label>
                <input type="text" id="numeroCuenta" name="numeroCuenta" value="<?php echo $numeroCuenta; ?>" required>

                <label for="nombre">Nombre(s):</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>

                <label for="apellido_paterno">Apellido Paterno:</label>
                <input type="text" id="apellido_paterno" name="apellido_paterno" value="<?php echo $apellido_paterno; ?>" required>

                <label for="apellido_materno">Apellido Materno:</label>
                <input type="text" id="apellido_materno" name="apellido_materno" value="<?php echo $apellido_materno; ?>" required>

                <label for="facultad">Facultad o FES:</label>
                <input type="text" id="facultad" name="facultad" value="<?php echo $facultad; ?>" required>

                <label for="carrera">Carrera:</label>
                <input type="text" id="carrera" name="carrera" value="<?php echo $carrera; ?>" required>

                <label for="generacion">Generación:</label>
                <input type="text" id="generacion" name="generacion" value="<?php echo $generacion; ?>" required>

                <button type="button" onclick="window.location.href='tabla.php'">Cancelar</button>
                <button type="submit">Guardar Cambios</button>
            </form>
        </div>
    </div>
</body>
</html>
