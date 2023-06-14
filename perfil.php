<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReptilShop</title>
    <script src="https://kit.fontawesome.com/2f9bef81ee.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header('Location: iniciar_sesion.php');
    }
    include('header.php');

    $conexion = new mysqli('localhost', 'administrador', 'usuario', 'fororeptil');
    if (isset($_REQUEST['id_usuario_visitado'])) {
        $id_usuario_visitado = $_REQUEST['id_usuario_visitado'];
        $usuario = $conexion->query("SELECT * FROM usuarios WHERE id='$id_usuario_visitado'");
    } else {
        $id_usuario_visitado = $_SESSION['usuario'];
        $usuario = $conexion->query("SELECT * FROM usuarios WHERE id='$id_usuario_visitado'");
    }
    $usuario = $usuario->fetch_object();

    if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    }

    ?>
    <div class="container cabecera_perfil rounded-pill mt-4" style="background-image: linear-gradient(rgba(0, 0, 0, 0.8)10%, rgba(0, 0, 0, .2)100%), url('./assets/piel_3.jpg');">
        <div class="row text-light text-center p-5">
            <div class="col-md-6">
                <?php
                if (isset($_REQUEST['id_usuario_visitado'])) {
                    if (empty($usuario->imagen_perfil)) {
                        echo "<img src='./imagenes_perfil/contacto.png' alt='Imagen de perfil' class='profile-image'>";
                    } else {
                        echo "<img src='./imagenes_perfil/$usuario->imagen_perfil' alt='Imagen de perfil' class='profile-image'>";
                    }
                } else {
                    if (empty($usuario->imagen_perfil)) {
                        echo "<img src='./imagenes_perfil/contacto.png' alt='Imagen de perfil' class='profile-image' onclick='nueva_imagen_perfil()'>";
                    } else {
                        echo "<img src='./imagenes_perfil/$usuario->imagen_perfil' alt='Imagen de perfil' class='profile-image' onclick='nueva_imagen_perfil()'>";
                    }
                }
                function obtenerBiografia($usuario)
                {
                    $biografia = $usuario->biografia;
                    return $biografia;
                }
                ?>
                <form id="myForm" action="publicar_imagen_perfil.php" method="post" enctype="multipart/form-data">
                    <input type="file" id="hiddenInput" name="imagen" style="display: none;" onchange="submitForm()">
                </form>
                <h2 class="card-title mt-4 mb-4 fs-1"><?php echo strtoupper("$usuario->usuario") ?> </h2>
                <a href="formulario_publicar.php" class="btn btn-outline-light fs-2">Subir publicacion</a>
            </div>
            <?php
            if (isset($_REQUEST['id_usuario_visitado'])) {
                echo "<div class='col-md-5'>
                    <p id='bio' class='card-text fs-4'>$usuario->biografia</p>
            </div>";
            } else {
                echo "<div class='col-md-5'>
                    <p id='bio' class='card-text fs-4 editable mt-4' contentEditable='true'>" . obtenerBiografia($usuario) . "</p>
                    <button id='btnActualizar' class ='btn btn-outline-light fs-4'>Actualizar</button>

            </div>";
            }
            ?>

        </div>
    </div>
    <div class="row row-cols-3 m-5">
        <?php

        $resultado = $conexion->query("SELECT * FROM publicaciones WHERE id_usuario='$id_usuario_visitado'");
        $publicacion = $resultado->fetch_object();
        while ($publicacion != null) {
            $ruta = "publicaciones\\" . $publicacion->imagen;

            echo "<div class='col card imagen_container'>
                <img src='$ruta' class='imagen card-img' alt='Descripción de la imagen'>
            </div>";

            /*             <div class='card-body'>
            <p class='card-text'>$publicacion->descripcion</p>
            </div> */

            $publicacion = $resultado->fetch_object();
        }
        $conexion->close();

        ?>
    </div>
    <?php include("footer.php"); ?>

</body>

</html>

<script>
    function nueva_imagen_perfil() {
        var hiddenInput = document.getElementById('hiddenInput');
        hiddenInput.click();A
    }

    function submitForm() {
        var form = document.getElementById('myForm');
        form.submit();
    }

    $(document).ready(function() {
        $('#btnActualizar').click(function() {
            var newBio = $('#bio').text().trim();

            // Realizar una solicitud AJAX para actualizar la biografía en la base de datos
            $.ajax({
                url: 'actualizar_biografia.php',
                method: 'POST',
                data: {
                    biografia: newBio
                },
                success: function(response) {A
                    console.log(response); // Mostrar la respuesta del servidor en la consola
                },
                error: function(xhr, status, error) {
                    console.error(error); // Mostrar el mensaje de error en la consola
                }
            });
        });
    });
</script>

<style>
    .editable {
        cursor: pointer;
        padding: 5px;
    }

    body {
        background-color: #02423d;
        font-family: 'Lato', sans-serif;
    }

    .card {
        border: none;
    }

    .profile-image {
        width: 200px;
        height: 200px;
        border-radius: 50%;
    }

    .imagen {
        width: 100%;
        height: auto;
        margin: auto;
    }

    .imagen_container {
        transition: all .7s;
    }

    .imagen_container:hover {
        scale: 1.2;
        transition: all .6s;
        z-index: 1;
    }

    /* General */

    /*     :root {
        --gradient: linear-gradient(to left top, #DD2476 10%, #FF512F 90%) !important;
    }

    BODY {
        font-family: 'Pacifico';
        font-size: 10pt;

    }

    .card-body {
        background-color: #9eeaf9 !important;
    }

    .card-body button {
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif
    }

    .btn {
        border: 5px solid;
        border-image-slice: 1;
        background: var(--gradient) !important;
        -webkit-background-clip: text !important;
        -webkit-text-fill-color: transparent !important;
        border-image-source: var(--gradient) !important;
        text-decoration: none;
        transition: all .4s ease;
    }

    .btn:hover,
    .btn:focus {
        background: var(--gradient) !important;
        -webkit-background-clip: none !important;
        -webkit-text-fill-color: #fff !important;
        border: 5px solid #fff !important;
        box-shadow: #222 1px 0 10px;
        text-decoration: underline;
    } */

    /* Contenido */
    /*    H1 {font-size: 16pt; font-weight: bold; color: #0066CC;}
   H2 {font-size: 12pt; font-weight: bold; font-style: italic; color: black;}
   H3 {font-size: 10pt; font-weight: bold; color: black; }*/

    /* Formulario */
    /*    FORM.borde {border: 1px dotted #0066CC; padding: 0.5em 0.2em; width: 80%;}
   FORM P {clear: left; margin: 0.2em; padding: 0.1em;}
   FORM P LABEL {float: left; width: 25%; font-weight: bold;}
   .error {color: red;} */

    /* Tablas */
    /*    TH {font-size: 10pt; font-weight: bold; color: white; background: #0066CC; text-align: left;}
   TD {font-size: 10pt; background: #CCCCCC;}
   TD.derecha {font-size: 10pt; text-align: right; background: #FFFFFF;}
   TD.izquierda {font-size: 10pt; text-align: left; background: #FFFFFF;} */
</style>