<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();
    }

    if (isset($_POST['productos'])) {
        foreach ($_POST['productos'] as $producto) {
            if (isset($_POST['cantidad'][$producto])) {
				$cantidad = $_POST['cantidad'][$producto];
			} else {
				$cantidad = 1;
			}
            if (!isset($_SESSION['carrito'][$producto])) {
                $_SESSION['carrito'][$producto] = $cantidad;
            } else {
                $_SESSION['carrito'][$producto] += $cantidad;
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
    <h1>Carrito de la Compra</h1>
    <?php
    if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
        echo '<ul>';
        foreach ($_SESSION['carrito'] as $producto => $cantidad) {
            echo '<li>' . htmlspecialchars($producto) . ' - Cantidad: ' . htmlspecialchars($cantidad) . '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>El carrito está vacío.</p>';
    }
    ?>
    <a href="inicio.php">Volver al menú</a>
    <a href="borrar.php">Borrar el carrito</a>
</body>