<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Política de Privacidad - Foro de Animales Exóticos</title>
  <link rel="stylesheet" href="estilos.css"> <!-- Agrega aquí tu archivo de estilos personalizado -->
</head>
<body>
  <div class="container">
  <?php
    session_start();
    include("header.php");
    if (!isset($_SESSION['usuario'])) {
        header('Location: iniciar_sesion.php');
    } ?>
    <h1>Política de Privacidad</h1>
    
    <p>En el foro de animales exóticos, respetamos tu privacidad y nos comprometemos a proteger tus datos personales. Esta política de privacidad te informa sobre cómo recopilamos, utilizamos y protegemos la información que nos proporcionas.</p>
    
    <h2>Información recopilada</h2>
    <p>Al registrarte en el foro, podemos recopilar la siguiente información:</p>
    <ul>
      <li>Nombre de usuario: utilizado para identificarte en el foro.</li>
      <li>Dirección de correo electrónico: utilizada para fines de comunicación y verificación de la cuenta.</li>
      <li>Información del perfil: puedes proporcionar información adicional en tu perfil, como tu ubicación o intereses personales, de forma voluntaria.</li>
    </ul>
    
    <h2>Uso de la información</h2>
    <p>La información que recopilamos se utiliza para los siguientes propósitos:</p>
    <ul>
      <li>Administrar y mantener tu cuenta en el foro.</li>
      <li>Facilitar la comunicación entre los usuarios del foro.</li>
      <li>Personalizar tu experiencia en el foro.</li>
      <li>Enviar notificaciones relacionadas con tu cuenta o actividades en el foro.</li>
    </ul>
    
    <h2>Seguridad de los datos</h2>
    <p>Tomamos medidas para proteger la seguridad de tu información personal y prevenir el acceso no autorizado, el uso o la divulgación de los datos. Sin embargo, ten en cuenta que ningún método de transmisión por internet o almacenamiento electrónico es 100% seguro.</p>
    
    <h2>Cookies</h2>
    <p>El foro puede utilizar cookies para mejorar tu experiencia de navegación. Estas cookies son pequeños archivos de texto que se almacenan en tu dispositivo. Puedes controlar o eliminar las cookies según tus preferencias individuales.</p>
    
    <h2>Enlaces a sitios web de terceros</h2>
    <p>Nuestro foro puede contener enlaces a sitios web de terceros. No nos hacemos responsables de las prácticas de privacidad o el contenido de estos sitios web. Te recomendamos leer las políticas de privacidad de estos sitios antes de proporcionar cualquier información personal.</p>
    
    <h2>Consentimiento</h2>
    <p>Al utilizar nuestro foro, estás dando tu consentimiento para que recopilemos, utilicemos y protejamos tu información personal de acuerdo con esta política de privacidad.</p>
    
    <p>Si tienes alguna pregunta o inquietud sobre nuestra política de privacidad, no dudes en ponerte en contacto con nosotros.</p>
  </div>
  <?php include("footer.php"); ?>
</body>
</html>
