<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <title>Tienda</title>
</head>

<body>
<?php
 session_start();
if (!isset($_SESSION['usuario'])){
die("Error - debe identificarse.");
}
$usuario_id = $_SESSION['usuario'];
$conexion = new mysqli('localhost', 'root', '', 'fororeptil');
$consulta = "SELECT * FROM usuarios WHERE id = '$usuario_id'";
$resultado = $conexion->query($consulta);
$usuario = $resultado->fetch_object();
echo $usuario->usuario;
if($usuario->tipo !== 'admin'){
die("Esta no es la página para usuarios");
}      
?>
   <div class="container">
        <h2 class="mt-4 mb-3">Administrar temas</h2>
        <div class="row">
            <div class="col">
                <form action="cerrar_sesion.php">
                    <input type="submit" class="btn btn-secondary mb-2" name="cerrar_sesion" value="Cerrar Sesión">
                </form>
            </div>
            <div class="col">
                <form action="perfil.php">
                    <input type="submit" class="btn btn-primary mb-2" name="perfil" value="Perfil">
                </form>
            </div>
        </div>

        <form action="admin.php" method="post">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Categoría</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th>Autor</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conexion = new mysqli('localhost', 'root', '', 'fororeptil');
                    if (isset($_REQUEST['categoria']) && ($_REQUEST['categoria'] !== '')) {
                        $filtro = $_REQUEST['categoria'];
                        $resultado = $conexion->query("SELECT * FROM temas WHERE categoria='$filtro'");
                        $tema = $resultado->fetch_object();
                        while ($tema != null) {
                            echo "<tr>
                                    <td>$tema->id</td>
                                    <td>$tema->titulo</td>
                                    <td>$tema->categoria</td>
                                    <td>$tema->descripcion</td>
                                    <td>$tema->fecha</td>
                                    <td>$tema->id_usuario</td>
                                    <td>Borrar: <input value='$tema->id' type='checkbox' name='borrar[]'></td>
                                </tr>";
                            $tema = $resultado->fetch_object();
                        }
                    } else {
                        $resultado = $conexion->query("SELECT * FROM temas");
                        $tema = $resultado->fetch_object();
                        while ($tema != null) {
                            echo "<tr>
                                    <td>$tema->id</td>
                                    <td>$tema->titulo</td>
                                    <td>$tema->categoria</td>
                                    <td>$tema->descripcion</td>
                                    <td>$tema->fecha</td>
                                    <td>$tema->id_usuario</td>
                                    <td>Borrar: <input value='$tema->id' type='checkbox' name='borrar[]'></td>
                                </tr>";
                            $tema = $resultado->fetch_object();
                        }
                    }
                    $conexion->close();
                    ?>
                </tbody>
            </table>

            <div class="row">
                <div class="col-md-6">
                    <label for="categoria" class="form-label">Categoría:</label>
                    <select name="categoria" class="form-select mb-3">
                        <?php
                        $conexion = new mysqli('localhost', 'root', '', 'fororeptil');
                        $resultado = $conexion->query("SELECT DISTINCT categoria FROM temas");
                        $categoria = $resultado->fetch_object();
                        while ($categoria != null) {
                            echo "<option value='$categoria->categoria'>$categoria->categoria</option>";
                            $categoria = $resultado->fetch_object();
                        }
                        $conexion->close();
                        ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <input type="submit" class="btn btn-primary mb-3" name="filtrar" value="Filtrar">
                </div>
            </div>
        </form>

        <h2 class="mt-4 mb-3">Administrar usuarios</h2>
        <form action="admin.php" method="post">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conexion = new mysqli('localhost', 'root', '', 'fororeptil');
                $resultado = $conexion->query("SELECT * FROM usuarios");
                $usuario = $resultado->fetch_object();
                while ($usuario != null) {
                    echo "<tr>
                            <td>$usuario->id</td>
                            <td>$usuario->usuario</td>
                            <td>$usuario->contrasena</td>
                            <td>$usuario->imagen_perfil</td>
                            <td>$usuario->tipo</td>
                            <td>$usuario->biografia</td>
                            <td>Borrar: <input value='$usuario->id' type='checkbox' name='borrar[]'></td>
                        </tr>";
                    $usuario = $resultado->fetch_object();
                }
                $conexion->close();
                ?>
            </tbody>
        </table>
        <div class="col text-end">
                <input class="btn btn-primary" type="submit" name="borrarusuarios" value="Eliminar usuarios marcados">
            </div>
        </form>
        <div class="container">
    <h2>
        <p class="text-primary">Inserción de nuevo usuario</p>
    </h2>

    <?php
    if (isset($_REQUEST["añadir"])) {
        if (isset($_REQUEST['nombre']) || isset($_REQUEST['contrasena'])) {
            $usuario = $_REQUEST['nombre'];
            $contrasena = $_REQUEST['contrasena'];
        
            // Genera el hash de la contrasena utilizando Argon2
        /*     $hash = password_hash($contrasena, PASSWORD_ARGON2I);
         */
            $conexion = new mysqli('localhost', 'root', '', 'fororeptil');
            $maxid = $conexion->query("SELECT MAX(id) as maximo from usuarios");
            $fetchID = $maxid->fetch_object();
            $id = $fetchID->maximo;
            $id++;
            $insercion = "INSERT INTO usuarios VALUES ('$id','$usuario','$contrasena','','usuario','')";
            $resultado = $conexion->query($insercion);
            header("Location: iniciar_sesion.php");
            $conexion->close();
        } else {
            echo ("<p>No se ha podido realizar la inserción debido a los siguientes errores:</p>");
            echo ("<ul>");
            if (empty($_REQUEST['nombre'])) {
                echo ("<li>Se requiere el nombre del usuario</li>");
            }
            if (empty($_REQUEST['contrasena'])) {
                echo ("<li>Se requiere la contrasena del usuario</li>");
            }
            echo ("</ul>");
        }
    } else {
    ?>
    <form action="admin.php" method="POST" enctype="multipart/form-data">
        <h3 class="mt-4"><i>Insertar nuevo usuario</i></h3>
        <table class="table">
            <tr>
                <td><label for="nombre"><b>Nombre: *</b></label></td>
                <td><input type="text" name="nombre" class="form-control" required></td>
            </tr>
            <tr>
                <td><label for="contrasena"><b>contrasena: *</b></label></td>
                <td><input type="text" name="contrasena" class="form-control" required></td>
            </tr>
            <tr>
                <td><label for="tipo"><b>Tipo:</b></label></td>
                <td>
                    <select name="tipo" class="form-select">
                        <option value="usuario" selected>Usuario</option>
                        <option value="admin">Admin</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="añadir" class="btn btn-primary" value="Añadir usuario"></td>
            </tr>
        </table>
    </form>
    <?php
    }
    ?>


</body>

</html>




<style>
    /* General */
    BODY {
        font-family: verdana, arial, sans-serif;
        font-size: 10pt;
    }

    /* Contenido */
    H1 {
        font-size: 16pt;
        font-weight: bold;
        color: #0066CC;
    }

    H2 {
        font-size: 12pt;
        font-weight: bold;
        font-style: italic;
        color: black;
    }

    H3 {
        font-size: 10pt;
        font-weight: bold;
        color: black;
    }

    /* Formulario */
    FORM.borde {
        border: 1px dotted #0066CC;
        padding: 0.5em 0.2em;
        width: 80%;
    }

    FORM P {
        clear: left;
        margin: 0.2em;
        padding: 0.1em;
    }

    FORM P LABEL {
        float: left;
        width: 25%;
        font-weight: bold;
    }

    .error {
        color: red;
    }

    /* Tablas */
    TH {
        font-size: 10pt;
        font-weight: bold;
        color: white;
        background: #0066CC;
        text-align: left;
    }

    TD {
        font-size: 10pt;
        background: #CCCCCC;
    }

    TD.derecha {
        font-size: 10pt;
        text-align: right;
        background: #FFFFFF;
    }

    TD.izquierda {
        font-size: 10pt;
        text-align: left;
        background: #FFFFFF;
    }
</style>