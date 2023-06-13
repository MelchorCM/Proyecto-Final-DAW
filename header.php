<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="style.css">
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg p-1 " style="background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, .9)), url('./assets/piel_3.jpg');">
        <div class="container-fluid header_container1">
            <a class="navbar-brand-md" href="index.php"> <img id="plantilla-logo" src="assets/logo4 (2).png" alt="" class="float-end rounded"> </a>
            <button class="navbar-toggler" type="button" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar justify-content-end" id="navbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link fs-4 me-5" style="font-family: 'Montserrat', sans-serif; color:#FFC107; text-shadow:#FFC107 solid 10px 10px 10px;" aria-current="page" href="perfil.php">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning  fs-4 me-5" style="font-family: 'Montserrat', sans-serif;">Fichas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning  fs-4 me-5" style="font-family: 'Montserrat', sans-serif;" href="temas.php">Temas</a>
                    </li>
                </ul>
            </div>


        </div>
        <!--         <form class="d-flex me-3" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-warning fs-3" type="submit">Search</button>
        </form> -->
<!--         <div class="header_container2 justify-content-end" id="navbar">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fs-4 me-5" style="font-family: 'Montserrat', sans-serif; color:#FFC107; text-shadow:#FFC107 solid 10px 10px 10px;" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Opciones
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="perfil.php">Perfil</a></li>
                        <li><a class="dropdown-item" href="#">Fichas</a></li>
                        <li><a class="dropdown-item" href="temas.php">Temas</a></li>
                    </ul>
                </li>
            </ul> -->
            <form action="cerrar_sesion.php" class="pe-3">
            <input class="btn btn-outline-warning fs-4 rounded" type="submit" name="cerrar_sesion" value="Cerrar Sesion">
        </form>
        </div>

    </nav>
</body>

</html>

<style>
    body {
        font-family: 'Montserrat', sans-serif;
    }

    .nav-link:hover {
        border: #FFC095 solid 1px;
        border-radius: 5px;
    }

    @media (max-width: 990px) {
        .header_container1 .navbar-nav {
            visibility: hidden;
            overflow: hidden;
            display: none;
        }

        .header_container2 {
            display: flex;
            justify-content: start;
            width: 100%;
        }
        .navbar-brand-md{
            display: flex;
            justify-content: center;
        }
    }

</style>