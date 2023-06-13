<?php
session_start();
session_set_cookie_params(0);
session_regenerate_id(true);
session_unset();
session_destroy();
header("Location: iniciar_sesion.php");
?>