<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header('Location: iniciar_sesion.php');
    }
    $usuario_id = $_SESSION['usuario'];    
    // Realizar la lógica para actualizar la biografía en la base de datos
    if (isset($_POST['biografia'])) {
        $nuevaBiografia = $_POST['biografia'];

        // Crear una conexión a la base de datos
        $conexion = new mysqli('localhost', 'root', '', 'fororeptil');

        // Verificar si hay errores en la conexión
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        // Escapar la nueva biografía para prevenir inyección SQL
/*         $nuevaBiografia = $conexion->real_escape_string($nuevaBiografia);
 */
        // Consulta SQL para actualizar la biografía en la tabla de usuarios
        $sql = "UPDATE usuarios SET biografia = '$nuevaBiografia' WHERE id='$usuario_id'";
        echo $sql;

        if ($conexion->query($sql) === TRUE) {
            echo "Biografía actualizada con éxito";
        } else {
            echo "Error al actualizar la biografía: " . $conexion->error;
        }

        // Cerrar la conexión a la base de datos
        $conexion->close();
    }

    ?>

</body>

</html>