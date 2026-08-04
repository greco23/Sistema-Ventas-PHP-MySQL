
<?php 

include "includes/conexion.php";

$error = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $stock = $_POST["stock"];

    
  if (empty($nombre)|| empty($precio) || empty($stock) ) {
        $error = "Todos los campos son obligatorios";

    } else {
        $sql = "INSERT INTO productos(nombre, precio, stock)
            VALUES ('$nombre', '$precio', '$stock')";

        $conexion->query($sql);

        header("Location: productos.php");
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
    <label for="producto_precio">Precio</label>
    <input type="number" name="precio" id="producto_precio" required>
    <label for="producto_cant">Cantidad</label>
    <input type="number" name="stock" id="producto_cant" required>
    <button type="submit">Guardar</button>
</form>