<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.html');
    exit();
}

$mysqli = new mysqli("localhost", "root", "", "tienda");
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

$result = $mysqli->query("SELECT * FROM productos");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
</head>
<body>
    <h2>Bienvenido, <?php echo $_SESSION['user']['name']; ?>!</h2>
    <h3>Lista de Productos</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Código</th>
            <th>Precio</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['codigo']; ?></td>
            <td><?php echo $row['precio']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <br>
    <a href="agregar_producto.php">Agregar Producto</a>
</body>
</html>

<?php
$mysqli->close();
?>
