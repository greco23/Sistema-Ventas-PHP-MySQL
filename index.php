<?php
include "includes/conexion.php";

$sql = "SELECT COUNT(*) AS total_productos FROM productos";
$resultado = $conexion->query($sql);
$datos = $resultado->fetch_assoc();
$total_productos = $datos["total_productos"];


$sql = "SELECT SUM(stock) AS total_stock FROM productos";
$resultado = $conexion->query($sql);
$datos = $resultado->fetch_assoc();
$total_stock = $datos["total_stock"] ?? 0;

include "includes/header.php";
?>
<div class="max-w-5xl">
    <h2 class="text-4xl font-bold text-gray-900">Sistema de Ventas</h2>
    <p class="mt-3 text-gray-500">
        Gestioná tus productos y controlá tu inventario.
    </p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-10">
        <div class="bg-white rounded-xl shadow-sm p-6">
            <p class="text-sm font-medium text-gray-500">
                Productos registrados
            </p>
            <p class="mt-2 text-4xl font-bold text-gray-900">
                <?= $total_productos ?>
            </p>
        </div>
        <div class="bg-white rounded-xl shadow-sm p-6">
            <p class="text-sm font-medium text-gray-500">
                Unidades en stock
            </p>
            <p class="mt-2 text-4xl font-bold text-gray-900">
                <?= $total_stock ?>
            </p>
        </div>
    </div>
    <div class="flex gap-4 mt-8">
        <a href="productos.php" class="bg-neutral-600 text-white px-5 py-3 rounded-lg font-medium hover:bg-neutral-700 transition">Ver productos</a>
        <a href="agregar_producto.php" class="border border-gray-300 text-gray-700 px-5 py-3 rounded-lg font-medium hover:bg-gray-100 transition">
            + Agregar producto
        </a>
    </div>
</div>