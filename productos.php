<?php

include "includes/conexion.php";
include "includes/header.php";

$sql = "SELECT * FROM productos";

$resultado = $conexion->query($sql);

?>

        <h1>Productos</h1>
        <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>


        <?php while($producto = $resultado->fetch_assoc()){ 
    ?>
        <tr>
            <td><?= $producto["id"] ?></td>
            <td><?= $producto["nombre"] ?></td>
            <td>$<?= $producto["precio"] ?></td>
            <td><?= $producto["stock"] ?></td>
            <td>
                <a href="editar_producto.php?id=<?= $producto["id"] ?>">
                    Editar
                </a>
                <a href="eliminar_producto.php?id=<?= $producto["id"] ?>"
                onclick="return confirm('¿Estás seguro de eliminar este producto?')">
                    Eliminar
                </a>
            </td>
        </tr>
        <?php  
    } ?>

        </table>
<?php include "includes/footer.php"?>