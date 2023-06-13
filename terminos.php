<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Términos y Condiciones - Foro de Animales Exóticos</title>
    <link rel="stylesheet" href="estilos.css"> <!-- Agrega aquí tu archivo de estilos personalizado -->
</head>

<body>
    <?php
    session_start();
    include("header.php");
    if (!isset($_SESSION['usuario'])) {
        header('Location: iniciar_sesion.php');
    } ?>
    <div class="container">
        <h1>Términos y condiciones del foro de animales exóticos</h1>

        <h2>1. Registro de usuario:</h2>
        <ul>
            <li>Debes ser mayor de 18 años para registrarte en el foro.</li>
            <li>Proporciona información precisa y actualizada al crear tu perfil de usuario.</li>
            <li>Eres responsable de mantener la confidencialidad de tu información de inicio de sesión.</li>
        </ul>

        <h2>2. Uso del foro:</h2>
        <ul>
            <li>El foro está destinado a discutir temas relacionados con animales exóticos.</li>
            <li>Mantén un lenguaje respetuoso y evita contenido ofensivo, difamatorio o ilegal.</li>
            <li>No publiques información personal de otros usuarios sin su consentimiento.</li>
            <li>No compartas material protegido por derechos de autor sin permiso.</li>
        </ul>

        <h2>3. Contenido generado por el usuario:</h2>
        <ul>
            <li>Eres responsable de cualquier contenido que publiques en el foro.</li>
            <li>No publiques contenido que viole las leyes o normativas vigentes.</li>
            <li>No promociones la venta o compra ilegal de animales exóticos.</li>
            <li>No compartas imágenes inapropiadas, violentas o perturbadoras.</li>
        </ul>

        <h2>4. Propiedad intelectual:</h2>
        <ul>
            <li>El foro y su contenido son propiedad del sitio y están protegidos por derechos de autor.</li>
            <li>No reproduzcas, modifiques, distribuyas o utilices el contenido del foro sin permiso.</li>
        </ul>

        <h2>5. Exoneración de responsabilidad:</h2>
        <ul>
            <li>El foro es un espacio de intercambio de información, y no garantizamos la veracidad o exactitud de la misma.</li>
            <li>No nos hacemos responsables de las acciones tomadas por los usuarios basadas en la información proporcionada en el foro.</li>
            <li>Cualquier decisión tomada en relación con animales exóticos es responsabilidad del usuario.</li>
        </ul>

        <p>Al utilizar nuestro foro, aceptas cumplir con estos términos y condiciones. Nos reservamos el derecho de modificar o actualizar estos términos en cualquier momento sin previo aviso. Te recomendamos revisar esta página periódicamente.</p>

        <p>Si no estás de acuerdo con estos términos y condiciones, te solicitamos que no utilices nuestro foro.</p>

        <p>Gracias por ser parte de nuestra comunidad y disfruta de tus interacciones en el foro de animales exóticos.</p>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>

