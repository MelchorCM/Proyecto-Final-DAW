<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="style.css">
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <title>Contact Form #8</title>
</head>

<body>
    <?php
    session_start();
    include("header.php");
    if (!isset($_SESSION['usuario'])) {
        header('Location: iniciar_sesion.php');
    }
    $conexion = new mysqli('localhost', 'root', '', 'fororeptil');
    $id_usuario_visitado = $_SESSION['usuario'];
    $usuario = $conexion->query("SELECT * FROM usuarios WHERE id='$id_usuario_visitado'");
    $usuario = $usuario->fetch_object();

    ?>
    <div class="container cabecera_perfil rounded-pill mt-4 mb-4" style="background-color: #32c19d;">
        <div class="row text-light text-center p-5">
            <div class="col-md-7">
                <img src="./assets/natos1.jpg" alt="Imagen de perfil" class="profile-image">
                <h2 class="card-title mt-4 mb-4 fs-3"><?php echo strtoupper("$usuario->usuario") ?> </h2>
                <a href="formulario_publicar.php" class="btn btn-outline-light fs-2">Subir publicacion</a>
            </div>
            <div class="col-md-3">
                <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit reiciendis illo dolorem eos, eius id nobis saepe blanditiis minima vero, alias sapiente obcaecati molestias officiis rem culpa sequi quam hic?</p>
            </div>
        </div>
    </div>
    <div class=<div class="content">

        <div class="container">
            <div class="row align-items-stretch no-gutters contact-wrap">
                <div class="col-md-6">
                    <div class="form h-100">
                        <h3>Nueva publicación</h3>
                        <form action="publicar.php" class="mb-5" method="post" id="contactForm" name="contactForm" ENCTYPE="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6 form-group mb-5">
                                    <label for="imagen" class="form-label">Imagen *</label>
                                    <input class="form-control" type="file" name="imagen" id="imagen">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group mb-5">
                                    <label for="descripcion" class="col-form-label">Descripcion *</label>
                                    <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="4" placeholder="Describe tu imagen"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <input type="submit" value="Publicar" NAME="publicar" class="boton_form btn btn-primary rounded-0 py-2 px-4">
                                    <span class="submitting"></span>
                                </div>
                            </div>
                        </form>

                        <div id="form-descripcion-warning mt-4"></div>
                        <div id="form-descripcion-success">
                            Your descripcion was sent, thank you!
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-info h-100" style="background-image: url('publicaciones/1685871603publicacion2.jpg')">
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php include("footer.php"); ?>

</body>

</html>

<style>
    body {
        font-family: 'Lato', sans-serif;
        background-color: #fff;
        line-height: 1.9;
        color: #8c8c8c;
        background-color: #02423d;
        position: relative;
    }

    .card {
        border: none;
    }

    .profile-image {
        width: 200px;
        height: 200px;
        border-radius: 50%;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    .h1,
    .h2,
    .h3,
    .h4,
    .h5,
    .h6 {
        font-family: 'Lato', sans-serif;
        color: #000;
    }

    a {
        -webkit-transition: .3s all ease;
        -o-transition: .3s all ease;
        transition: .3s all ease;
    }

    a,
    a:hover {
        text-decoration: none !important;
    }

    .text-black {
        color: #000;
    }

    .content {
        padding: 7rem 0;
    }

    .heading {
        font-size: 2.5rem;
        font-weight: 900;
    }

    .form-control {
        border: none;
        border-bottom: 1px solid #ccc;
        padding-left: 0;
        padding-right: 0;
        border-radius: 0;
        background: none;
    }

    .form-control:active,
    .form-control:focus {
        outline: none;
        -webkit-box-shadow: none;
        box-shadow: none;
        border-color: #000;
    }

    .col-form-label {
        color: #000;
        font-size: 13px;
    }

    .boton_form,
    .form-control,
    .custom-select {
        height: 45px;
    }

    .custom-select:active,
    .custom-select:focus {
        outline: none;
        -webkit-box-shadow: none;
        box-shadow: none;
        border-color: #000;
    }

    .boton_form {
        border: none;
        border-radius: 0;
        font-size: 12px;
        letter-spacing: .2rem;
        text-transform: uppercase;
    }

    .boton_form.btn-primary {
        background: #32c19d;
        color: #fff;
        padding: 15px 20px;
    }

    .boton_form:hover {
        color: #fff;
    }

    .boton_form:active,
    .btn:focus {
        outline: none;
        -webkit-box-shadow: none;
        box-shadow: none;
    }

    .contact-wrap .col-form-label {
        font-size: 14px;
        color: #b3b3b3;
        margin: 0 0 10px 0;
        display: inline-block;
        padding: 0;
    }

    .contact-wrap .form,
    .contact-wrap .contact-info {
        padding: 40px;
    }

    .contact-wrap .contact-info {
        color: rgba(255, 255, 255, 0.5);
    }

    .contact-wrap .contact-info ul li {
        margin-bottom: 15px;
        color: rgba(255, 255, 255, 0.5);
    }

    .contact-wrap .contact-info ul li .wrap-icon {
        font-size: 20px;
        color: #fff;
        margin-top: 5px;
    }

    .contact-wrap .form {
        background: #fff;
    }

    .contact-wrap .form h3 {
        color: #32c19d;
        font-size: 30px;
        margin-bottom: 30px;
    }

    .contact-wrap .contact-info {
        height: 100vh;
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
    }

    .contact-wrap .contact-info a {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
    }

    @media (max-width: 1199.98px) {
        .contact-wrap .contact-info {
            height: 400px !important;
        }
    }

    .contact-wrap .contact-info h3 {
        color: #fff;
        font-size: 20px;
        margin-bottom: 30px;
    }

    label.error {
        font-size: 12px;
        color: red;
    }

    #descripcion {
        resize: vertical;
    }

    #form-descripcion-warning,
    #form-descripcion-success {
        display: none;
    }

    #form-descripcion-warning {
        color: #B90B0B;
    }

    #form-descripcion-success {
        color: #55A44E;
        font-size: 18px;
        font-weight: bold;
    }

    .submitting {
        float: left;
        width: 100%;
        padding: 10px 0;
        display: none;
        font-weight: bold;
        font-size: 12px;
        color: #000;
    }
</style>