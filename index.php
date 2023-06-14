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
    if (isset($_SESSION['usuario'])) {
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
                        <h2 class="border-bottom border-primary border-5 pb-4">Red social que todo amante de los exóticos
                            necesita</h2>
                    </div>
                    <a href="iniciar_sesion.php" target="_blank" class="btn btn-primary text-uppercase fs-3 fw-bolder">Inicia Sesión</a>
                </div>
                <div class="col-lg-5">
                <div class="video-container">
                        <video class="img-fluid rounded" autoplay muted playsinline loop>
                            <source  src="./assets/video2.mp4" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección -->

    <section class="bg-light mb-5">
        <div class="container">
            <div class="row mb-3">
                <div class="offset-lg-3 col-lg-6 text-center">
                    <h2 class="border-bottom border-terciary border-4 p-4">Consejos sobre exóticos</h2>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-5 offset-lg-2 col-md-8">
                    <ul>
                        <li>Investiga y aprende: Aprende sobre las necesidades y cuidados específicos de los animales exóticos.</li>
                        <li>Cumple con los requisitos legales: Asegúrate de conocer y cumplir con las regulaciones legales.</li>
                        <li>Proporciona un entorno adecuado: Crea un hábitat que satisfaga sus necesidades de vivienda, temperatura y alimentación.</li>
                        <li>Alimentación adecuada: Proporciona una dieta equilibrada y variada según sus necesidades.</li>
                        <li>Atención veterinaria especializada: Busca un veterinario con experiencia en animales exóticos.</li>
                        <li>Enriquecimiento y estimulación: Proporciona actividades y juguetes que estimulen su mente y cuerpo.</li>
                        <li>Educación continua: Mantente actualizado sobre las mejores prácticas en el cuidado de animales exóticos.</li>
                        <li>No los liberes en la naturaleza: Nunca liberes animales exóticos en la naturaleza.</li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-4">
                    <img src="./assets/rony1.jpg" alt="Poecilotheria Metallica" class="img-fluid">
                </div>
                </div>
            </div>
        </div>
    </section>
    <div class="video-container">
    </div>
    <!-- Sección -->
    <section class="bg-white">
        <div class="container">
            <div class="row mb-3">
                <div class="offset-lg-3 col-lg-6 text-center">
                    <h2 class="border-bottom border-terciary border-4 p-4">Animales venenosos</h2>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-3 offset-lg-2 col-md-4">
                    <div class="author-img mb-5">
                        <img src="./assets/poe1.jpg" alt="Poecilotheria Metallica" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-5 col-md-8">
                    <p>1. Investigación exhaustiva: Aprende sobre las necesidades específicas de cada especie antes de adquirirla.</p>

                    <p>2. Recinto adecuado: Proporciona un hábitat espacioso y seguro que simule su entorno natural.</p>

                    <p>3. Control de temperatura y humedad: Asegúrate de mantener los niveles adecuados en el recinto.</p>

                    <p>4. Alimentación adecuada: Investiga sobre la dieta específica y proporciona una alimentación apropiada.</p>

                    <p>5. Manejo seguro: Evita el contacto directo y utiliza herramientas adecuadas cuando sea necesario manipularlos.</p>

                    <p>6. Seguridad y prevención de escapes: Asegura los recintos para evitar escapes.</p>

                    <p>7. Consulta a expertos: Busca orientación de criadores y expertos en el cuidado de animales venenosos.</p>

                    <p>8. Educación y conciencia: Aprende sobre las leyes y regulaciones locales y promueve el cuidado responsable.</p>

                </div>
            </div>
        </div>
    </section>

    <!-- Sección -->

    <section class="bg-light mb-5">
        <div class="container">
            <div class="row mb-3">
                <div class="offset-lg-3 col-lg-6 text-center">
                    <h2 class="border-bottom border-terciary border-4 p-4">Consejos sobre alimento vivo</h2>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-5 offset-lg-2 col-md-8">
                    Para insectos:

                    Cría tus propios insectos o compra en tiendas especializadas.
                    Alimenta los insectos antes de ofrecerlos como alimento.
                    Considera suplementar los insectos para mejorar su valor nutricional.
                    Para roedores:

                    Compra roedores en tiendas especializadas.
                    Proporciona un alojamiento adecuado si decides criar tus propios roedores.
                    Ofrece una dieta equilibrada y cuidados adecuados.
                    Considera aspectos éticos y legales al utilizar roedores como alimento.
                </div>
                <div class="col-lg-3 col-md-4">
                    <img src="./assets/clipper1.jpg" alt="Poecilotheria Metallica" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <?php include("footer.php"); ?>

</body>

</html>

<style>
    body {
        font-family: 'Lato', sans-serif;
    }

/*     .video-container {
        position: relative;
        width: 100%;
        height: 0;
        padding-bottom: 56.25%;
        Relación de aspecto 16:9 (dividir la altura por el ancho y multiplicar por 100)
        overflow: hidden;
    }

    .video-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    } */
</style>