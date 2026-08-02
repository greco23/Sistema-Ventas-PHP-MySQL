<?php

$conexion = new mysqli(
    "localhost",
    "root",
    "",
    "sistema_ventas"
);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

?>