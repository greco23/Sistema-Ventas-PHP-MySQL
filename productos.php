<?php

include "includes/conexion.php";
include "includes/header.php";

$sql = "SELECT * FROM productos";

$resultado = $conexion->query($sql);

?>

        <h1 class="text-3xl font-bold text-gray-900">Productos</h1>
        <p class="mt-2 text-neutral-500">Gestioná tus productos y controlá el stock.</p>
        <a href="agregar_producto.php" class="inline-block mt-6 px-5 py-2.5 bg-neutral-800 text-white font-medium rounded-lg hover:bg-neutral-700 transition">Agregar producto</a>
        <table class="w-full mt-8 bg-white rounded-xl shadow-sm overflow-hidden">
        <tr  class="border-t border-neutral-200 hover:bg-neutral-100 transition">
            <th class="px-6 py-4 text-left text-sm font-semibold text-neutral-700">ID</th>
            <th class="px-6 py-4 text-left text-sm font-semibold text-neutral-700">Nombre</th>
            <th class="px-6 py-4 text-left text-sm font-semibold text-neutral-700">Precio</th>
            <th class="px-6 py-4 text-left text-sm font-semibold text-neutral-700">Stock</th>
            <th class="px-6 py-4 text-left text-sm font-semibold text-neutral-700">Acciones</th>
        </tr>


        <?php while($producto = $resultado->fetch_assoc()){ 
    ?>
        <tr>
            <td class="px-6 py-4 text-sm text-gray-500"><?= $producto["id"] ?></td>
            <td class="px-6 py-4 text-sm font-medium text-gray-900"><?= htmlspecialchars($producto["nombre"]) ?></td>
            <td class="px-6 py-4 text-sm text-gray-700">$<?= $producto["precio"] ?></td>
            <td class="px-6 py-4 text-sm text-gray-700"><?= $producto["stock"] ?></td>
            <td class="px-6 py-4">
                <div class="flex gap-3">
                    <a href="editar_producto.php?id=<?= $producto["id"] ?>" class="text-sm font-medium text-blue-600 hover:text-blue-800">
                        Editar
                    </a>
                    <a href="eliminar_producto.php?id=<?= $producto["id"] ?>"
                    onclick="return confirm('¿Estás seguro de eliminar este producto?')" class="text-sm font-medium text-red-600 hover:text-red-800">
                        Eliminar
                    </a>
                </div>
                    
            </td>
        </tr>
        <?php  
    } ?>

        </table>
<?php include "includes/footer.php"?>