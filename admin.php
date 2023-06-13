<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <form action="cerrar_sesion.php">
        <input type="submit" name="cerrar_sesion" value="Cerrar Sesion">
    </form>    
    <form action="perfil.php">
        <input type="submit" name="perfil" value="Perfil">
    </form>
    <form action="admin.php" method="post">

        <table>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Categoría</th>
                <th>Descripcion</th>
                <th>Fecha</th>
                <th>Autor</th>
                <th>Borrar</th>
            </tr>
            <?php
            
            $conexion = new mysqli('localhost', 'root', '', 'fororeptil');
            if (isset($_REQUEST['categoria']) && ($_REQUEST['categoria'] !== '')) {
                $filtro = $_REQUEST['categoria'];
                $resultado = $conexion->query("SELECT * FROM temas WHERE categoria='$filtro'");
                $tema = $resultado->fetch_object();
                while ($tema != null) {
                    echo "<tr><td>$tema->id</td><td>$tema->titulo</td><td>$tema->categoria</td><td>$tema->descripcion</td><td>$tema->fecha</td><td>$tema->id_usuario</td><td>Borrar: <input value='$tema->id' type='checkbox' name='borrar[]'></td></tr>";
                    $tema = $resultado->fetch_object();
                }
            } else {
                $resultado = $conexion->query("SELECT * FROM temas");
                $tema = $resultado->fetch_object();
                while ($tema != null) {
                    echo "<tr><td>$tema->id</td><td>$tema->titulo</td><td>$tema->categoria</td><td>$tema->descripcion</td><td>$tema->fecha</td><td>$tema->id_usuario</td><td>Borrar: <input value='$tema->id' type='checkbox' name='borrar[]'></td></tr>";
                    $tema = $resultado->fetch_object();
                }
            }
            $conexion->close();

            ?>
        </table>
        <br>
        <div class="container row"> 
            <div class="col">
            Categoría:
            <select name="categoria">
                <?php
                $conexion = new mysqli('localhost', 'root', '', 'fororeptil');
                $resultado = $conexion->query("SELECT DISTINCT categoria FROM temas");
                $tema = $resultado->fetch_object();
                echo "<option value=''>Todos</option>";
                while ($tema != null) {
                    echo "<option value=$tema->categoria> $tema->categoria </option>";
                    $tema = $resultado->fetch_object();
                }
                $conexion->close();
                ?>
            </select>
            <input type="submit" value="Filtrar por Categoria" name="filtro">
            </div>
                <div class="col">
                <input class="text-right" type="submit" name="borrartemaes" value="Eliminar temaes marcados">
                </div>

        </div>
    </form>
    <h2>
        <p style="color:blue;">Inserción de nuevo tema</p>
    </h2>

</body>

</html>

<?php

if (isset($_REQUEST["insertar"])) {

    if ((!empty($_REQUEST['nombre'])) && (!empty($_REQUEST['descripcion']))) {
        $nombre = $_REQUEST['nombre'];
        $descripcion = $_REQUEST['descripcion'];
        $categoria = $_REQUEST['categoria'];
        if (empty($_FILES['imagen']['name'])) {
			echo "DEBES SUBIR ALGÚN FICHERO";
		} else {
			// Tenemos fichero!!
			if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
				// Ha subido correctamente
				$tipo = mime_content_type($_FILES['imagen']['tmp_name']);
				if (strstr($tipo, "image")) {
					// Es una imagen
					// Creamos nombre único
					$nombre_imagen = $_FILES['imagen']['name'];
					if(@move_uploaded_file($_FILES['imagen']['tmp_name'], "img/".$nombre_imagen)) {
                        $conexion = new mysqli('localhost', 'root', '', 'fororeptil');
                        $maxid = $conexion->query("SELECT MAX(id) as maximo from productos");
                        $fetchID = $maxid->fetch_object();
                        $id = $fetchID->maximo;
                        $id++;
                        $insercion = "INSERT INTO productos VALUES ('$id','$nombre','$descripcion','$categoria','$nombre_imagen')";
                        $resultado = $conexion->query($insercion);
                        header("Refresh:0");
                        $conexion->close();
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
		}
    } else {
        echo ("No se ha podido realizar la inserción debido a los siguientes errores");
        if (empty($_REQUEST['nombre'])) {
            echo "<li>Se requiere el nombre del tema</li>";
        }
        if (empty($_REQUEST['descripcion'])) {
            echo "<li>Se requiere la descripcion del tema</li>";
        }
    }

} else {
?>
    <form action="admin.php" method="POST" ENCTYPE="multipart/form-data">


        <h3><i>Insertar nuevo tema</i></h3>
        <table>
            <tr>
                <td><label for="nombre"><b>Nombre: * </b></label></td>
                <td><input type="text" name="nombre" size="50" id="nombre"></td>
            </tr>
            <tr>
                <td><label for="descripcion"><b>Descripcion: * </b></label></td>
                <td><textarea name="descripcion" id="descripcion" cols="60" rows="8"></textarea></td>
            </tr>
            <tr>
                <td><label for="categoria"><b>Categoría: </b></label></td>
                <td>
                    <SELECT NAME="categoria">
                        <OPTION VALUE="otros" SELECTED>otros</OPTION>
                        <OPTION VALUE="reptiles">reptiles</OPTION>
                        <OPTION VALUE="anfibios">anfibios</OPTION>
                        <OPTION VALUE="artropodos">artrópodos</OPTION>
                    </SELECT>
                </td>
            </tr>
            <tr>
                <td><label for="imagen"><b>Imagen: </b></label></td>
                <td>
                    <input type="file" name="imagen" id="imagen">
                </td>
            </tr>
            <tr>
                <td><INPUT TYPE="submit" NAME="insertar" VALUE="Insertar noticia"></td>
            </tr>
        </table>
    </form>
<?php
}

if (isset($_REQUEST['borrartemaes'])) {
    $conexion = new mysqli('localhost', 'root', '', 'fororeptil');
    if (!empty($_REQUEST['borrar'])) {
        foreach ($_REQUEST['borrar'] as $item) {
            $borrado = $conexion->query("DELETE from productos where id=$item");
            header("Refresh:0");
        }
        $conexion->close();
    }
}

if (isset($_REQUEST['borrarusuarios'])) {
    $conexion = new mysqli('localhost', 'root', '', 'fororeptil');
    if (!empty($_REQUEST['eliminar'])) {
        foreach ($_REQUEST['eliminar'] as $item) {
            $eliminado = $conexion->query("DELETE from usuarios where usuario='$item'");
            header("Refresh:0");
        }
        $conexion->close();
    }
}

?>
<br><br><br>
<!-- ---------------------------------------------------------------- -->
<form action="admin.php" method="post">

<table>
    <tr>
        <th>Nombre</th>
        <th>Contraseña</th>
        <th>Tipo</th>
        <th>Borrar</th>
    </tr>
    <?php
    $conexion = new mysqli('localhost', 'root', '', 'fororeptil');
    $resultado = $conexion->query("SELECT * FROM usuarios");
        $usuario = $resultado->fetch_object();
        while ($usuario != null) {
            echo "<tr><td>$usuario->usuario</td><td>$usuario->contrasena</td><td>$usuario->tipo</td><td>Borrar: <input value='$usuario->usuario' type='checkbox' name='eliminar[]'></td></tr>";
            $usuario = $resultado->fetch_object();
        }
    $conexion->close();

    ?>
</table>
<br>
<div class="container row"> 
        <input class="text-right" type="submit" name="borrarusuarios" value="Eliminar usuarios marcados">
</div>
</form>
<h2>
<p style="color:blue;">Inserción de nuevo usuario</p>
</h2>

<?php

if (isset($_REQUEST["añadir"])) {

if ((!empty($_REQUEST['nombre'])) && (!empty($_REQUEST['contraseña']))) {
$nombre = $_REQUEST['nombre'];
$descripcion = $_REQUEST['contraseña'];
$tipo = $_REQUEST['tipo'];
$conexion = new mysqli('localhost', 'root', '', 'fororeptil');
/* $insercion = "INSERT INTO usuarios VALUES ('$nombre',MD5('$contraseña'),'$tipo')";*/
$insercion = "INSERT INTO usuarios VALUES ('$nombre','$contraseña','$tipo')";
$resultado = $conexion->query($insercion);
header("Refresh:0");
$conexion->close();
} else {
echo ("No se ha podido realizar la inserción debido a los siguientes errores");
if (empty($_REQUEST['nombre'])) {
    echo "<li>Se requiere el nombre del usuario</li>";
}
if (empty($_REQUEST['contraseña'])) {
    echo "<li>Se requiere la contraseña del usuario</li>";
}
}

} else {
?>
<form action="admin.php" method="POST" ENCTYPE="multipart/form-data">


<h3><i>Insertar nuevo usuario</i></h3>
<table>
    <tr>
        <td><label for="nombre"><b>Nombre: * </b></label></td>
        <td><input type="text" name="nombre" size="50" id="nombre"></td>
    </tr>
    <tr>
        <td><label for="contraseña"><b>Contraseña: * </b></label></td>
        <td><input type="text" name="contraseña" size="50" id="contraseña"></td>
    </tr>
    <tr>
        <td><label for="tipo"><b>Tipo: </b></label></td>
        <td>
            <SELECT NAME="tipo">
                <OPTION VALUE="usuario" SELECTED>usuario</OPTION>
                <OPTION VALUE="admin">admin</OPTION>
            </SELECT>
        </td>
    </tr>
        <td><INPUT TYPE="submit" NAME="añadir" VALUE="Añadir usuario"></td>
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