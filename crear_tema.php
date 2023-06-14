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
    if (isset($_REQUEST["insertar"])) {

        if ((!empty($_REQUEST['titulo'])) && (!empty($_REQUEST['descripcion']))) {
            $titulo = $_REQUEST['titulo'];
            $descripcion = $_REQUEST['descripcion'];
            $categoria = $_REQUEST['categoria'];
            $conexion = new mysqli('localhost', 'administrador', 'usuario', 'fororeptil');
            $maxid = $conexion->query("SELECT MAX(id) as maximo from temas");
            $fetchID = $maxid->fetch_object();
            $id = $fetchID->maximo;
            $id++;
            $date = date('Y/m/d H:i');
            $insercion = "INSERT INTO temas VALUES ('$id','$titulo','$date','$descripcion','$categoria'," . $_SESSION['usuario'] . ")";
            echo $insercion;
            $resultado = $conexion->query($insercion);
            $conexion->close();
            header("Location: temas.php");
        } else {
            echo ("No se ha podido realizar la inserción debido a los siguientes errores");
            if (empty($_REQUEST['titulo'])) {
                echo "<li>Se requiere el título de la noticia</li>";
            }
            if (empty($_REQUEST['descripcion'])) {
                echo "<li>Se requiere el descripcion de la noticia</li>";
            }
        }
    }

    header('Location: temas.php');

    ?>

</body>

</html>
