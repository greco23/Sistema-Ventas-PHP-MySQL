<?php
include "includes/conexion.php";

$id = $_GET["id"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST["nombre"];
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
        $sql = "UPDATE productos
                SET nombre = ?, precio = ?, stock = ? 
                WHERE id = ?";

        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sdii", $nombre, $precio, $stock, $id);
        $stmt->execute();

        header("Location: productos.php");
        exit;
    }
}

$sql = "SELECT * FROM productos WHERE id = $id";
$resultado = $conexion->query($sql);
$producto = $resultado->fetch_assoc();

include "includes/header.php";
?>

<form method="POST">

    <label for="producto_nombre">Nombre</label>
    <input
        type="text"
        name="nombre"
        id="producto_nombre"
        value="<?= $producto["nombre"] ?>"
    >
    <br>
    <label for="producto_precio">Precio</label>
    <input
        type="number"
        name="precio"
        id="producto_precio"
        value="<?= $producto["precio"] ?>"
    >
    <br>
    <label for="producto_stock">Cantidad</label>
    <input
        type="number"
        name="stock"
        id="producto_stock"
        value="<?= $producto["stock"] ?>"
    >
    <br>
    <button type="submit">Guardar cambios</button>

</form>
<?php include "includes/footer.php"?>