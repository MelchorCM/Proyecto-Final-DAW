<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>

</head>

<body>
    <?php
    session_start();
    if(isset($_SESSION['usuario'])){
        include('header.php');
    }
    ?>
    <!-- Banner -->
    <section class="banner bg-white">
        <div class="container">
            <div class="row align-items-center justify-content-between mb-5">   
                <div class="col-lg-5 col-md-12 text-center">
                    <div class="banner-content p-5 mb-2 rounded bg-success text-light bg-opacity-50">
                        <img id="plantilla-logo" src="assets/REPTIL_ROOM_ROUNDED.png" alt="" class="float-end">
                        <h1 class="text-uppercase fw-bolder">Reptil Room</h1>
                        <h2 class="border-bottom border-primary border-5 pb-4">Tips que todo amante de los exóticos
                            necesita</h2>
                    </div>
                    <a href="iniciar_sesion.php" target="_blank" class="btn btn-primary text-uppercase fs-3 fw-bolder">Inicia Sesión</a>
                </div>
                <div class="col-lg-5">
                    <img class="img-fluid mt-5" src="assets/rony1.jpg" alt="portada Natos">
                    
                </div>
            </div>
        </div>
    </section>

    <!-- Consejos -->

    <section class="bg-light mb-5">
        <div class="container">
            <div class="row mb-3">
                <div class="offset-lg-3 col-lg-6 text-center">
                    <h2 class="border-bottom border-terciary border-4 p-4">Sobre Reptiles</h2>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-5 offset-lg-2 col-md-8">
                    <h3 class="pb-3">Algunos consejos sobre exóticos</h3>
                    <p>No son animales domésticos. Muchas veces menos es más, deben tener cubiertas sus necesidades
                        pero un exceso de manipulación, alimentación y extréspuede llevar a nuestras queridas
                        mascotas a una muerte prematura.
                    </p>
                    <p>
                        Asegurarnos de poder mantener sus parámetros correctos y atender sus necesidades antes de
                        adquirir cualquier animal. Dentro de este mundo hay una gran variedad de posibilidades
                        con necesidades y cuidados muy distintos.
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente eum impedit fugiat cum ipsum
                        modi suscipit,
                        aliquid ex, commodi sed magni maxime animi quis fuga corrupti blanditiis. Consequatur, numquam
                        dolorem.
                    </p>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Exercitationem aperiam quasi aliquam
                        minima blanditiis officiis officia culpa totam incidunt dicta nisi odio error voluptas, quo
                        eaque distinctio accusamus explicabo animi?</p>
                </div>
                <div class="col-lg-3 col-md-4">
                    <img src="./assets/clipper1.jpg" alt="Poecilotheria Metallica" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- Autor -->
    <section class="bg-white">
        <div class="container">
            <div class="row mb-3">
                <div class="offset-lg-3 col-lg-6 text-center">
                    <h2 class="border-bottom border-terciary border-4 p-4">Sobre el Autor</h2>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-3 offset-lg-2 col-md-4">
                    <div class="author-img mb-5">
                        <img src="./assets/poe1.jpg" alt="Poecilotheria Metallica" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-5 col-md-8">
                    <h3 class="pb-3">Algunos consejos sobre exóticos</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi repellat, pariatur quaerat sit
                        laboriosam laudantium tempora soluta delectus similique alias numquam molestiae consectetur,
                        sequi suscipit cumque assumenda sapiente vero deserunt.
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo unde, ab, corporis exercitationem
                        nesciunt eveniet deleniti rerum reprehenderit modi aliquam fugiat sit sequi alias natus quaerat
                        at similique itaque odio.
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente eum impedit fugiat cum ipsum
                        modi suscipit,
                        aliquid ex, commodi sed magni maxime animi quis fuga corrupti blanditiis. Consequatur, numquam
                        dolorem.
                    </p>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Exercitationem aperiam quasi aliquam
                        minima blanditiis officiis officia culpa totam incidunt dicta nisi odio error voluptas, quo
                        eaque distinctio accusamus explicabo animi?</p>
                </div>
            </div>
        </div>
    </section>
    <?php include("footer.php"); ?>

</body>

</html>

<style>
    body{
        font-family: 'Lato', sans-serif;
    }
</style>