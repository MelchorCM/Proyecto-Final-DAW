<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="busqueda_inicial.js"></script>
  <!--     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
 -->
  <title>Foro</title>
</head>
<?php
session_start();
if (!isset($_SESSION['usuario'])) {
  header('Location: iniciar_sesion.php');
}
?>

<body>
  <?php include("header.php") ?>
  <div class="position-relative mb-5">
    <div class="position-absolute mt-4 start-50 translate-middle-x">
      <form action="formulario_tema.php">
        <input class="btn btn-outline-warning fs-3" type="submit" name="crear" value="Crear un tema">
      </form>
    </div>
  </div>
  </br>
  <div class="container mt-5">
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" id="buscarTitulo" class="form-control mb-3" placeholder="Buscar por título">
                </div>
                <div class="input-group">
                  <input type="text" id="buscarAutor" class="form-control" placeholder="Buscar por autor">
                </div>
            </div>
            <div class="col-md-4">
                <select id="categoriaSelect" class="form-select">
                    <option value="">Todos los resultados</option>
                    <option value="Otros">Otros</option>
                    <option value="Reptiles">Reptiles</option>
                    <option value="Anfibios">Anfibios</option>
                    <option value="Artropodos">Artropodos</option>
                </select>
            </div>
            <div class="col-md-2">
                <button id="buscarBtn" class="btn btn-warning w-100" type="button">Buscar</button>
            </div>
        </div>
    </div>
<!--   <form action="temas.php" id="searchForm" method="GET">
    <input type="text" id="searchInput" name="search" placeholder="Buscar temas...">
    <input type="submit" name="buscar" value="Buscar">
  </form> -->

  <ul id="resultados"></ul>

  <?php include("footer.php"); ?>

</body>

</html>

<script>
$(document).ready(function() {
  // Capturar el evento de clic en el botón de búsqueda
  $("#buscarBtn").click(function() {
    // Obtener los valores de los campos de búsqueda
    var titulo = $("#buscarTitulo").val();
    var autor = $("#buscarAutor").val();
    var categoria = $("#categoriaSelect").val();

    // Realizar la petición AJAX
    $.ajax({
      url: "buscar_temas.php",
      type: "POST",
      data: { titulo: titulo, autor: autor, categoria: categoria },
      success: function(response) {
        // Mostrar los resultados en el elemento con id "resultados"
        $("#resultados").html(response);
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  });
});
</script>

<style>
  body {
    background: linear-gradient(rgba(0, 0, 0,1)0%, rgba(0, 0, 0, 0)20%), rgb(2, 66, 61);
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