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

            <a href="inicio.php">
                <button type="button">Regresar<i class="fas fa-paper-plane"></i></button>
                </a>
            <button type="submit">Enviar</button>


        </div>
        </form>
    </div>
</body>
</html>
