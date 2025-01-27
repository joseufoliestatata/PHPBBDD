<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Si no existe el carrito, inicializarlo como un array vacío
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();
    }

    // Validar si se seleccionaron productos
    if (isset($_POST['productos']) && isset($_POST['cantidad'])) {
        foreach ($_POST['productos'] as $index => $producto) {
            $cantidad = $_POST['cantidad'][$index]; // Obtener la cantidad asociada al producto

            // Si el producto ya está en el carrito, sumar la cantidad
            if (isset($_SESSION['carrito'][$producto])) {
                $_SESSION['carrito'][$producto] += (int)$cantidad;
            } else {
                // Si el producto no está en el carrito, añadirlo con la cantidad seleccionada
                $_SESSION['carrito'][$producto] = (int)$cantidad;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Carrito de la Compra</title>
</head>
<body>
    <h1>Productos del Carrito</h1>
    <?php
    if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
        echo '<ul>';
        foreach ($_SESSION['carrito'] as $producto => $cantidad) {
            echo '<li>' . htmlspecialchars($producto) . ' x ' . htmlspecialchars($cantidad) . '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>El carrito está vacío.</p>';
    }
    ?>
    <a href="index.php">Volver al menú</a>
</body>
</html>
