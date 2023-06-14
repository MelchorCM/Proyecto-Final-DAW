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
    if (isset($_REQUEST["publicar"])) {
        if (empty($_FILES['imagen']['name'])) {
            echo "DEBES SUBIR ALGÚN FICHERO";
        } else {
            // Tenemos fichero!!
            if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
                // Ha subido correctamente
                $tipo = mime_content_type($_FILES['imagen']['tmp_name']);
                if (strstr($tipo, "image")) {
                    // Es una imagen
                    // Creamos nombre_imagen único
                    $nombre_imagen = time() . $_FILES['imagen']['name'];
                    if (@move_uploaded_file($_FILES['imagen']['tmp_name'], "publicaciones/" . $nombre_imagen)) {
                        // Se ha movido correctamente
                        // Vamos a hacer un enlace y a mostrar la imagen
                        // El link
                        echo "<center><a href='publicaciones/$nombre_imagen' target='_blank'>Ver la imagen en otra pestaña</a><br>";
                        echo "<img src='publicaciones/$nombre_imagen'>";
                    } else {
                        // No se ha podido mover
                        echo "NO SE HA PODIDO COPIAR EL FICHERO";
                    }
                } else {
                    // No es una imagen
                    echo "EL FICHERO DEBE SER UNA IMAGEN";
                }
            } else {
                // Problemas al subir
                echo "HA OCURRIDO UN ERROR EN LA SUBIDA";
            }

            if (!empty($descripcion)) {
                $descripcion = $_REQUEST['descripcion'];
                echo "<p>$descripcion</p>";
            }else{
                $descripcion=NULL;
            }
            $conexion = new mysqli('localhost', 'administrador', 'usuario', 'fororeptil');
            $maxid = $conexion->query("SELECT MAX(id) as maximo from publicaciones");
            $fetchID = $maxid->fetch_object();
            $id = $fetchID->maximo;
            $id++;
            $insercion = "INSERT INTO publicaciones VALUES ('$id','$descripcion','$nombre_imagen','$usuario_id')";
            $resultado = $conexion->query($insercion);
            $conexion->close();
        }
        header('Location: perfil.php');
    }


    ?>

</body>

</html>