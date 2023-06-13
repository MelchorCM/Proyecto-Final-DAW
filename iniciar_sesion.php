<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="style.css">
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</head>

<body>
    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Iniciar sesión</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Crear usuario</label>
            <div class="login-form">
                <form action='login.php' method='post'>
                    <div class="sign-in-htm">
                        <div class="group">
                            <label for="usuario" class="label">Usuario</label>
                            <input id="usuario" name="usuario" type="text" class="input">
                        </div>
                        <div class="group">
                            <label for="contrasena" class="label">Contraseña</label>
                            <input id="contrasena" name="contrasena" type="password" class="input pass" data-type="password">
                        </div>
                        <div class="group">
                            <input type="submit" name="enviar" class="button" value="Sign In">
                        </div>
                        <div class="hr"></div>
                    </div>
                </form>
                <div class="sign-up-htm">
                    <form action="crear_usuario.php" method='post' onsubmit="return validarFormulario(event);">
                        <div class="group">
                            <label for="user" class="label">Usuario</label>
                            <input id="user" name="user" type="text" class="input">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Contraseña</label>
                            <input id="pass" name="pass" type="password" class="input" data-type="password">
                        </div>
                        <div class="group">
                            <label for="repeat-pass" class="label">Repetir Contraseña</label>
                            <input id="repeat-pass" type="password" class="input" data-type="password">
                            <span id="error-message"></span>
                        </div>
                        <div class="group">
                            <input type="submit" name="validar" class="button" value="Sign Up">
                        </div>
                        <div class="hr"></div>
                        <div class="foot-lnk">
                            <label for="tab-1">Ya eres miembro?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    function validarFormulario(event) {

        var pass1 = document.getElementById("pass").value;
        var pass2 = document.getElementById("repeat-pass").value;

        // Comprobar que ambas contraseñas sean iguales
        if (pass1 !== pass2) {
            mostrarError("Las contraseñas no coinciden.");
            return false;
        }

        // Comprobar longitud mínima de 8 caracteres
        if (pass1.length < 8) {
            mostrarError("La contraseña debe tener al menos 8 caracteres.");
            return false;
        }

        // Comprobar si contiene letras y números, y excluye caracteres especiales
        var regex = /^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z0-9]+$/;
        if (!regex.test(pass1)) {
            mostrarError("La contraseña debe contener al menos una letra y un número, y excluir caracteres especiales.");
            return false;
        }

        return true;
    }

    function mostrarError(mensaje) {
        var errorSpan = document.getElementById("error-message");
        errorSpan.innerText = mensaje;
        errorSpan.style.color = "red";
    }
</script>

<style>
    /* Verde oscuro: RGB(0, 100, 0)
Amarillo ocre: RGB(204, 178, 0)
Marrón: RGB(139, 69, 19)
Gris oscuro: RGB(51, 51, 51)
Blanco: RGB(255, 255, 255) */

    body {
        margin: 0;
        color: #FFFFCC;
        background-color: #02423d;
        font: 600 16px/18px 'Lato', sans-serif;
    }

    *,
    :after,
    :before {
        box-sizing: border-box
    }

    .clearfix:after,
    .clearfix:before {
        content: '';
        display: table
    }

    .clearfix:after {
        clear: both;
        display: block
    }

    a {
        color: inherit;
        text-decoration: none
    }

    .login-wrap {
        width: 100%;
        margin: auto;
        margin-top: 2rem;
        max-width: 525px;
        min-height: 670px;
        position: relative;
        background: url(./assets/clipper1.jpg) no-repeat center;
        box-shadow: 0 12px 15px 0 rgba(0, 0, 0, .24), 0 17px 50px 0 rgba(0, 0, 0, .19);
    }

    .login-html {
        width: 100%;
        height: 100%;
        position: absolute;
        padding: 90px 70px 50px 70px;
        background: rgba(0, 127, 107, .8);
    }

    .login-html .sign-in-htm,
    .login-html .sign-up-htm {
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        position: absolute;
        transform: rotateY(180deg);
        backface-visibility: hidden;
        transition: all .4s linear;
    }

    .login-html .sign-in,
    .login-html .sign-up,
    .login-form .group .check {
        display: none;
    }

    .login-html .tab,
    .login-form .group .label,
    .login-form .group .button {
        text-transform: uppercase;
    }

    .login-html .tab {
        font-size: 22px;
        margin-right: 15px;
        padding-bottom: 5px;
        margin: 0 15px 10px 0;
        display: inline-block;
        border-bottom: 2px solid transparent;
    }

    .login-html .sign-in:checked+.tab,
    .login-html .sign-up:checked+.tab {
        color: #fff;
        border-color: #FFC857;
    }

    .login-form {
        min-height: 345px;
        position: relative;
        perspective: 1000px;
        transform-style: preserve-3d;
    }

    .login-form .group {
        margin-bottom: 15px;
    }

    .login-form .group .label,
    .login-form .group .input,
    .login-form .group .button {
        width: 100%;
        color: #fff;
        display: block;
    }

    .login-form .group .input,
    .login-form .group .button {
        border: none;
        padding: 15px 20px;
        border-radius: 25px;
        background: rgba(255, 255, 255, .1);
    }

    .login-form .group input[data-type="password"] {
        -webkit-text-security: circle;
    }

    .login-form .group .label {
        color: #fff;
        font-size: 12px;
    }

    .login-form .group .button {
        background: #FFC857;
    }

    .login-form .group label .icon {
        width: 15px;
        height: 15px;
        border-radius: 2px;
        position: relative;
        display: inline-block;
        background: rgba(255, 255, 255, .1);
    }

    .login-form .group label .icon:before,
    .login-form .group label .icon:after {
        content: '';
        width: 10px;
        height: 2px;
        background: #fff;
        position: absolute;
        transition: all .2s ease-in-out 0s;
    }

    .login-form .group label .icon:before {
        left: 3px;
        width: 5px;
        bottom: 6px;
        transform: scale(0) rotate(0);
    }

    .login-form .group label .icon:after {
        top: 6px;
        right: 0;
        transform: scale(0) rotate(0);
    }

    .login-form .group .check:checked+label {
        color: #fff;
    }

    .login-form .group .check:checked+label .icon {
        background: #FFC857;
    }

    .login-form .group .check:checked+label .icon:before {
        transform: scale(1) rotate(45deg);
    }

    .login-form .group .check:checked+label .icon:after {
        transform: scale(1) rotate(-45deg);
    }

    .login-html .sign-in:checked+.tab+.sign-up+.tab+.login-form .sign-in-htm {
        transform: rotate(0);
    }

    .login-html .sign-up:checked+.tab+.login-form .sign-up-htm {
        transform: rotate(0);
    }

    .hr {
        height: 2px;
        margin: 60px 0 50px 0;
        background: rgba(255, 255, 255, .2);
    }

    .foot-lnk {
        text-align: center;
    }
</style>