<?php
if (isset($_REQUEST['usuario']) || isset($_REQUEST['contrasena'])) {
    $usuario = $_REQUEST['usuario'];
    $contrasena = $_REQUEST['contrasena'];

    $conexion = new mysqli('localhost', 'administrador', 'usuario', 'fororeptil');
    $consulta = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    $resultado = $conexion->query($consulta);
    echo $resultado->num_rows;
    if ($resultado->num_rows == 1) {
        $usuario = $resultado->fetch_object();
        echo $usuario->contrasena;
        $hash = $usuario->contrasena;
        echo $contrasena;
        // Verificar la contraseña utilizando password_verify()
        if (password_verify($contrasena, $hash)) {

/*         if($contrasena == $usuario->contrasena){ */
             // Contraseña válida
            $id = $usuario->id;
            session_start();
            $_SESSION['usuario'] = $id;

            // Continúa con el flujo de tu aplicación
            header("Location: index.php");
        } else {
            // Contraseña incorrecta
            // Maneja el error o muestra un mensaje de error al usuario
            echo "Contraseña incorrecta";
        }
    } elseif($resultado->num_rows > 1) {
        while ($usuario = $resultado->fetch_object()) {
            $hash = $usuario->contrasena;
            echo $contrasena;
            // Verificar la contraseña utilizando password_verify()
            if (password_verify($contrasena, $hash)) {
    
    /*         if($contrasena == $usuario->contrasena){ */
                 // Contraseña válida
                $id = $usuario->id;
                session_start();
                $_SESSION['usuario'] = $id;
    
                // Continúa con el flujo de tu aplicación
                header("Location: index.php");
            } else {
                // Contraseña incorrecta
                // Maneja el error o muestra un mensaje de error al usuario
                echo "Contraseña incorrecta";
            }
        }
        }else{
        // Usuario no encontrado
        // Maneja el error o muestra un mensaje de error al usuario
        echo "Usuario no encontrado";
    }

    $conexion->close();
} else {
    header("Location: iniciar_sesion.php");
}
