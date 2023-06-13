<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
  <title>Document</title>
</head>

<body>
  <?php
  session_start();

  include("header.php");
  if (!isset($_SESSION['usuario'])) {
    header('Location: iniciar_sesion.php');
  }

  $usuario = $_SESSION['usuario'];
  $conexion = new mysqli('localhost', 'root', '', 'fororeptil');
  $id_tema = $_GET['id_tema'];



  $resultado = $conexion->query("SELECT * FROM temas WHERE id=$id_tema");
  $tema = $resultado->fetch_object();

  $creador_tema = $conexion->query("SELECT * FROM usuarios WHERE id='$tema->id_usuario'");
  $creador_tema = $creador_tema->fetch_object();

  $respuesta = $conexion->query("SELECT * FROM mensajes WHERE id_tema='$tema->id'");
  $mensaje = $respuesta->fetch_object();

  echo 
  "<div class='container mt-4'><a href='http://localhost/ejercicios/PROYECTO_FINAL_V1/respuestas_tema.php?id_tema=$tema->id'>
          <div class='tema card'>
            <div class='card-body'>
              <h2 class='card-title text-light m-3 pb-4'>" . $tema->titulo . "</h2>
              <div style='position: relative;'>
                <p class='card-text m-3 text-light tema_descripcion'>" . $tema->descripcion . "</p>
                <a class='creator_name' href='http://localhost/ejercicios/PROYECTO_FINAL_V1/perfil.php?id_usuario_visitado=$creador_tema->id'>
                <div class='card-text' style='position: absolute; top: 0; right: 0;'>Autor: "
          . $creador_tema->usuario . "</a></div>
                <div class='card-text' style='position: absolute; right: 0; margin-top: 10px;'>Fecha:  " . $tema->fecha . "</div>
              </div>
              <div class='card-text m-3' style='width: 100%; margin-top: 10px;'>Categoría:   " . $tema->categoria . "</div>
            </div>
          </div>
          </a>
        </div>
          <br>";

  ?>
  <div class="row justify-content-center">
    <div class="col-6">
      <form action="respuestas_tema.php?id_tema=<?php echo $id_tema ?>" method="POST" ENCTYPE="multipart/form-data">
        <div class="input-group">
          <input size="25" type="text" name="mensaje" id="mensaje" placeholder="Escribe un mensaje" class="form-control">
          <span class="input-group-btn">
            <input type="submit" class="btn btn-warning btn-flat" NAME="responder" VALUE="Responder">
          </span>
      </form>
    </div>
  </div>
  </div>
  <?php

  while ($mensaje != null) {

    $creador_respuesta = $conexion->query("SELECT * FROM usuarios WHERE id='$mensaje->id_usuario'");
    $creador_respuesta = $creador_respuesta->fetch_object();

    echo "<div class='container mt-4'>
        <div class='card'>
          <div class='card-body'>
            <p class='card-text'>$mensaje->mensaje</p>
            <a class='creator_name' href='http://localhost/ejercicios/PROYECTO_FINAL_V1/perfil.php?id_usuario_visitado=$creador_tema->id'>
            <p class='card-subtitle mb-2 text-muted'>Autor: $creador_respuesta->usuario</p></a>ñ
            <p class='card-subtitle text-muted'>Fecha: $mensaje->fecha</p>
          </div>
        </div>
      </div>";
    $mensaje = $respuesta->fetch_object();
  }


  if (isset($_REQUEST["responder"])) {

    if (!empty($_REQUEST['mensaje'])) {
      $mensaje = $_REQUEST['mensaje'];
      $maxid = $conexion->query("SELECT MAX(id) as maximo from mensajes");
      $fetchID = $maxid->fetch_object();
      $id = $fetchID->maximo;
      $id++;
      $date = date('Y/m/d H:i');
      $id_usuario = $_SESSION['usuario'];
      $insercion = "INSERT INTO mensajes VALUES ('$id','$mensaje','$date','$id_usuario',$tema->id)";
      $ejecucion = $conexion->query($insercion);
      $conexion->close();
      header("Location: respuestas_tema.php?id_tema=$id_tema");
    } else {
      echo ("No se ha podido realizar la inserción debido a los siguientes errores");
      if (empty($_REQUEST['mensaje'])) {
        echo "<li>Se requiere la respuesta</li>";
      }
    }
  } else {
  }

include("footer.php"); ?>
</body>

</html>

<style>
    body {
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0)), rgb(2, 66, 61);
    font-family: 'Lato', sans-serif;
  }

  a {
    text-decoration: none;
  }

  .creator_name {
    color: white;
  }

  .creator_name:hover {
    color: lightgray;
  }

  .tema {
    background-color: #32c19d;
    transition: all .7s;
  }

  .tema:hover {
    scale: 1.05;
    background-color: #26a39c;
    transition: all .7s;

  }

  .tema_descripcion {
    max-width: 70%;
  }
</style>