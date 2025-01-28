<!DOCTYPE html>
<html>
<head>
    <title>Carrito de la Compra</title>
</head>
<body>
    <h1>Productos</h1>
    <form method="post" action="carrito.php">
        <?php
        $conn = mysqli_connect('localhost', 'root', 'rootroot', 'carrito');

        if (!$conn) {
            die("Conexión fallida: " . mysqli_connect_error());
        }

        $sql = "SELECT id, nombre FROM productos";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Mostrar los productos en el formulario
            while($row = mysqli_fetch_assoc($result)) {
                echo '<label for="producto' . $row['id'] . '">' . $row['nombre'] . '</label>';
                echo '<input type="checkbox" name="productos[]" value="' . $row['nombre'] . '">';
                echo '<select name="cantidad[' . $row['nombre'] . ']">';
                for ($i = 1; $i <= 10; $i++) {
                    echo '<option value="' . $i . '">' . $i . '</option>';
                }
                echo '</select><br>';
            }
        } else {
            echo "No hay productos disponibles.";
        }

        // Cerrar la conexión
        mysqli_close($conn);
        ?>
        <input type="submit" value="Añadir al carrito">
    </form>
    <a href="inicio.php">Volver al menú</a>
</body>
</html>