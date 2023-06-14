 <?php
/* if (isset($_REQUEST['user']) || isset($_REQUEST['pass'])) {
    $usuario = $_REQUEST['user'];
    $contraseña = $_REQUEST['pass'];
    $conexion = new mysqli('localhost', 'root', '', 'fororeptil');
    $maxid = $conexion->query("SELECT MAX(id) as maximo from usuarios");
    $fetchID = $maxid->fetch_object();
    $id = $fetchID->maximo;
    $id++;
    $insercion = "INSERT INTO usuarios VALUES ('$id','$usuario','$contraseña','','usuario','')";
    $resultado = $conexion->query($insercion);
    header("Location: index.php");
    $conexion->close();
}else{
    header("Location: registro.php");                    

} */
if (isset($_REQUEST['user']) || isset($_REQUEST['pass'])) {
    $usuario = $_REQUEST['user'];
    $contrasena = $_REQUEST['pass'];

    // Genera el hash de la contraseña utilizando Argon2
    $hash = password_hash($contrasena, PASSWORD_DEFAULT);

    $conexion = new mysqli('localhost', 'administrador', 'usuario', 'fororeptil');
    $maxid = $conexion->query("SELECT MAX(id) as maximo from usuarios");
    $fetchID = $maxid->fetch_object();
    $id = $fetchID->maximo;
    $id++;
    $insercion = "INSERT INTO usuarios VALUES ('$id','$usuario','$hash','','usuario','')";
    $resultado = $conexion->query($insercion);
    header("Location: iniciar_sesion.php");
    $conexion->close();
} else {
    header("Location: iniciar_sesion.php");
}
?>