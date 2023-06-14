<?php
// Crear una conexión a la base de datos
$conexion = new mysqli('localhost', 'administrador', 'usuario', 'fororeptil');

// Obtener los valores enviados por AJAX
if(isset($_POST['titulo'])){
  $titulo = $_POST['titulo'];
  
}

if(isset($_POST['autor'])){
  $autor_nombre = $_POST['autor'];
  $autor = $conexion->query("SELECT * FROM usuarios WHERE usuario='$autor_nombre'");
  $autor = $autor->fetch_object();
  
}

if(isset($_POST['categoria'])){
  $categoria = $_POST['categoria'];
  
}

// Verificar si hay errores en la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Construir la consulta SQL
$sql = "SELECT * FROM temas";

if (!empty($titulo)) {
  $sql .= " WHERE titulo LIKE '%$titulo%'";
  
  if (!empty($categoria)) {
    $sql .= " AND categoria = '$categoria'";
  }

  if (!empty($autor)) {
    $sql .= " AND id_usuario IN (SELECT id FROM usuarios WHERE usuario LIKE '%$autor->usuario%')";
  }
} elseif (!empty($categoria)) {
  $sql .= " WHERE categoria = '$categoria'";

  if (!empty($autor)) {
    $sql .= " AND id_usuario IN (SELECT id FROM usuarios WHERE usuario LIKE '%$autor->usuario%')";
  }
} elseif (!empty($autor)) {
  $sql .= " WHERE id_usuario IN (SELECT id FROM usuarios WHERE usuario LIKE '%$autor->usuario%')";
}


$resultado = $conexion->query($sql);
if (!$resultado) {
  die("Error en la consulta: " . $conexion->error);
}

// Mostrar los resultados de búsqueda
if ($resultado->num_rows > 0) {
  while ($tema = $resultado->fetch_object()) {

    $creador = $conexion->query("SELECT * FROM usuarios WHERE id='$tema->id_usuario'");
    $creador = $creador->fetch_object();

    echo     "<div class='container mt-4'><a href='http://localhost/ejercicios/PROYECTO_FINAL_V1/respuestas_tema.php?id_tema=$tema->id'>
      <div class='tema card'>
        <div class='card-body'>
          <h2 class='card-title text-light m-3 pb-4'>" . $tema->titulo . "</h2>
          <div style='position: relative;'>
            <p class='card-text m-3 text-light tema_descripcion'>" . $tema->descripcion . "</p>
            <a class='creator_name' href='http://localhost/ejercicios/PROYECTO_FINAL_V1/perfil.php?id_usuario_visitado=$creador->id'>
            <div class='card-text' style='position: absolute; top: 0; right: 0;'>Autor: "
      . $creador->usuario . "</a></div>
            <div class='card-text' style='position: absolute; right: 0; margin-top: 10px;'>Fecha:  " . $tema->fecha . "</div>
          </div>
          <div class='card-text m-3' style='width: 100%; margin-top: 10px;'>Categoría:   " . $tema->categoria . "</div>
        </div>
      </div>
      </a>
    </div>
      <br>";
}} else {
  echo '<div class="alert alert-warning mt-3" role="alert">No se encontraron resultados.</div>';
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
