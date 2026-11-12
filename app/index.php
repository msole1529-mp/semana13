<?php
$host = getenv('DB_HOST') ?: 'db';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASSWORD') ?: 'root';
$db   = getenv('DB_NAME') ?: 'semana13';

$connection = new mysqli($host, $user, $pass, $db);

if ($connection->connect_error) {
    die("Error de conexión: " . $connection->connect_error);
}

$result = $connection->query("SELECT NOW() AS momento");
$row = $result->fetch_assoc();

$connection->close();
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Semana 13 Docker</title>
</head>
<body>
    <h1>Aplicación web conectada</h1>
    <p>La aplicación consultó correctamente a MariaDB.</p>
    <p>Hora entregada por MariaDB: <?= htmlspecialchars($row['momento'], ENT_QUOTES, 'UTF-8') ?></p>
</body>
</html>
