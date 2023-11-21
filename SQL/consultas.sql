
-- Se ordenan todas las consultas que se realizaron para el proyecto =)


-- formulario.php
-- Inserción de un nuevo registro
INSERT INTO registro (no_cuenta, nombres, apellido_paterno, apellido_materno, facultad, carrera, anio_ingreso)
VALUES (:numeroCuenta, :nombre, :apellido_paterno, :apellido_materno, :facultad, :carrera, :generacion);


 -- tabla.php
-- Eliminación de un registro por ID
DELETE FROM registro WHERE id = :txtid;
-- Consulta de todos los registros
SELECT * FROM registro;


--edicion.php
-- Consulta de un registro por ID
SELECT * FROM registro WHERE id = :id;
-- Actualización de un registro por ID
UPDATE registro
SET no_cuenta = :numeroCuenta, nombres = :nombre, apellido_paterno = :apellido_paterno,
    apellido_materno = :apellido_materno, facultad = :facultad, carrera = :carrera, anio_ingreso = :generacion
WHERE id = :id;
