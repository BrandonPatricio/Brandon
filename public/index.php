<?php
require '../config/google-config.php';
$login_url = $client->createAuthUrl();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Hola</h2>
    <h2>Iniciar Sesión</h2>
    <a href="<?= $login_url ?>">Iniciar con Google</a>
</body>
</html>
