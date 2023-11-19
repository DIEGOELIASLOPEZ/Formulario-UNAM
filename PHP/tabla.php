<?php
include("conexion.php");

// Eliminación de registro
if(isset($_GET['id'])){
    $txtid = $_GET['id'];
    $stm = $conexion->prepare("DELETE FROM registro WHERE id=:txtid");
    $stm->bindParam(":txtid", $txtid);
    $stm->execute();
    header("location:tabla.php");
    exit();
}

// Consulta de registros
$stm = $conexion->prepare("SELECT * FROM registro");
$stm->execute();
$registro = $stm->fetchAll(PDO::FETCH_ASSOC);
?>
<?php
// Editar registro
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="media/LOGO UNAM.png" type="image/x-icon">
    <!-- Enlace a Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/e8ab9ad725.js" crossorigin="anonymous"></script>
    <title>Tabla de Alumnos UNAM</title>
</head>
<body>
    <table class="table">
        
        <div class="tablaEstilos">
            <thead class="info">
                <tr>
                    <th scope="col">Número de Cuenta</th>
                    <th scope="col">Nombre</th>+
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
                            <a href="edicion.php?id = <?php echo $registro['id'];?>"  class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="tabla.php?id=<?php echo $registro['id']; ?>" class="btn btn-small btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?');">
                                <i class="fa-sharp fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="botones-container">

    
 
        <a href="formulario.php" class="btn btn-small btn-success"><i class="fa-solid fa-plus"></i>
        <a href="inicio.php" class="btn btn-small btn-secondary"><i class="fa-solid fa-home"></i></a>
    

        </div>
</body>
</html>
