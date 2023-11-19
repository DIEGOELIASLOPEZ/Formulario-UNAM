<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="media/LOGO UNAM.png" type="image/x-icon">
>

    <!-- Enlace a Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/e8ab9ad725.js" crossorigin="anonymous"></script>

    <title>Tabla de Alumnos UNAM</title>
</head>
<body>

<?php
include("conexion.php");

$stm = $conexion->prepare("SELECT * FROM registro");
$stm->execute();
$registro = $stm->fetchAll(PDO::FETCH_ASSOC);
?>

<table class="table">
    <caption>Lista de Alumnos UNAM</caption>
    <div class="tablaEstilos">
        <thead class="info">
            <tr>
                <th scope="col">Número de Cuenta</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido Paterno</th>
                <th scope="col">Apellido Materno</th>      
                <th scope="col">Facultad</th>
                <th scope="col">Carrera</th>     
                <th scope="col">Año de Ingreso</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($registro as $registro) { ?>
                <tr>
                    <th scope="row"><?php echo $registro['no_cuenta']; ?></th>
                    <td><?php echo $registro['nombres']; ?></td>
                    <td><?php echo $registro['apellido_paterno']; ?></td>
                    <td><?php echo $registro['apellido_materno']; ?></td>
                    <td><?php echo $registro['facultad']; ?></td>
                    <td><?php echo $registro['carrera']; ?></td>
                    <td><?php echo $registro['anio_ingreso']; ?></td>
                    <td>
                        <a href="editar" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="eliminar" class="btn btn-small btn-danger"><i class="fa-sharp fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
