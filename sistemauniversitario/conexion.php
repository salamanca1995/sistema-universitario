<?php
try {
    $host = "localhost";
    $usuario = "root";
    $password = "";
    $basedatos = "agenda";
    $port = 3306;
    $cn = mysqli_connect($host, $usuario, $password, $basedatos, $port);
    

    return ($cn);

    // Verificar la conexión
    if (!$cn) {
        die("Error de conexión: " . mysqli_connect_error());
    }
} catch (Exception $e) {
    echo "Error en Db" . $e;
}
