<?php

include "includes/conexion.php";

$id = $_GET["id"];

$sql = "DELETE FROM productos WHERE id = ?";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: productos.php");
exit;