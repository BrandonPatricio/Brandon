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
    <h2>Iniciar sesión</h2>
    <a href="<?= $login_url ?>">Iniciar con Google</a>
</body>
</html>
