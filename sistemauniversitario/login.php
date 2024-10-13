<?php
session_start();

$usuario = $_POST['username'];
$contraseña = $_POST['password'];

// Aquí deberías conectar a tu base de datos y verificar las credenciales
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agenda";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Actualiza la consulta SQL para que coincida con los nombres de los campos en tu base de datos
$sql = "SELECT * FROM usuarios WHERE nombre_usuario='$usuario' AND contrasena='$contraseña'";
$result = $conn->query($sql);

if ($result === false) {
    die("Error en la consulta: " . $conn->error);
}

if ($result->num_rows > 0) {
    $_SESSION['username'] = $usuario;
    header("Location: ./sistema.html");
} else {
    echo "Usuario o contraseña incorrectos.";
}

$conn->close();
?>
