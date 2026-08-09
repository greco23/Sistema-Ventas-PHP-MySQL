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

<h2>Agregar Producto</h2>

<?php if($error != "") { ?>

    <p>
        <?php echo $error; ?>
    </p>

<?php } ?>

<form method="POST">
    <label for="producto_nombre">Nombre</label>
    <input type="text" name="nombre" id="producto_nombre" required>
    <br>
    <label for="producto_precio">Precio</label>
    <input type="number" name="precio" id="producto_precio" required>
    <br>
    <label for="producto_cant">Cantidad</label>
    <input type="number" name="stock" id="producto_cant" required>
    <br>
    <button type="submit">Guardar</button>
</form>