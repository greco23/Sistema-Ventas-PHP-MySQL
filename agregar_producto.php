<?php 
include "includes/conexion.php";
$error = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = trim($_POST["nombre"]);
        $precio = $_POST["precio"];
        $stock = $_POST["stock"];

        if (empty($nombre)) {
            $error = "El nombre es obligatorio";
        }
        elseif ($precio <= 0) {
            $error = "El precio debe ser mayor a 0";
        }
        elseif ($stock < 0) {
            $error = "El stock no puede ser negativo";
        }
        else {
            $sql = "INSERT INTO productos(nombre, precio, stock)
            VALUES (?, ?, ?)";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("sdi", $nombre, $precio, $stock);
            $stmt->execute();
            header("Location: productos.php");
            exit;
        }
    }

include "includes/header.php" ?>

<h2 class="text-3xl font-bold text-gray-900">Agregar Producto</h2>
<p class="mt-2 text-gray-500">Añadí un nuevo producto al inventario.</p>

<?php if($error != "") { ?>
    <div class="mt-6 max-w-xl bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
        <?= $error ?>
    </div>
<?php } ?>

<form method="POST" class="mt-8 max-w-xl bg-white p-8 rounded-xl shadow-sm">
    <div  class="mb-5">
        <label for="producto_nombre" class="block text-sm font-medium text-gray-700 mb-2">Nombre</label>
        <input type="text" name="nombre" id="producto_nombre" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-neutral-500 focus:border-neutral-500">
        <br>
    </div>
    <div class="mb-5">
        <label for="producto_precio" class="block text-sm font-medium text-gray-700 mb-2">Precio</label>
        <input type="number" name="precio" id="producto_precio" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-neutral-500 focus:border-neutral-500">
        <br>
    </div>
    <div class="mb-6">
        <label for="producto_cant" class="block text-sm font-medium text-gray-700 mb-2">Cantidad</label >
        <input type="number" name="stock" id="producto_cant" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-neutral-500 focus:border-neutral-500">
        <br>
    </div>
    
    <button type="submit" class="w-full bg-neutral-600 text-white font-medium py-3 rounded-lg hover:bg-neutral-700 transition">Guardar</button>
</form>
<a href="productos.php" class="inline-block mt-4 text-sm font-medium text-gray-600 hover:text-gray-900 transition">← Volver a productos</a>