<?php

include "conexion.php";

$sql = "SELECT * FROM productos";

$resultado = $conexion->query($sql);

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Productos</title>
    </head>
    <body>
        <h1>Productos</h1>
        <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
        </tr>


        <?php while($producto = $resultado->fetch_assoc()){ 
    ?>
        <tr>
            <td><?= $producto["id"] ?></td>
            <td><?= $producto["nombre"] ?></td>
            <td>$<?= $producto["precio"] ?></td>
            <td><?= $producto["stock"] ?></td>
        </tr>
        <?php  
    }
    ?>

        </table>
    </body>
</html>