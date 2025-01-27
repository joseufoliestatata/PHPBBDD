<?php
session_start();
$host = "localhost";
$user = "root";
$pass = "rootroot";
$name = "carrito";

$conec = mysqli_connect($host, $user, $pass, $name);
if (!$conec) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$cons = "SELECT nombre FROM productos";
$prod = mysqli_query($conec, $cons);
$noms = mysqli_num_rows($prod);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Productos Disponibles</title>
    <style>
        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>Productos Disponibles</h1>

    <form method="post" action="carrito.php">
        <?php
        for ($i = 0; $i < $noms; $i++) {
            $tabla = mysqli_fetch_array($prod);
            echo "<label>" . htmlspecialchars($tabla['nombre']) . "</label>";
            echo "<input type='checkbox' name='productos[]' value='" . htmlspecialchars($tabla['nombre']) . "'>";
            echo "<select name='cantidad[]'>
                    <option value='1'>1</option>
                    <option value='2'>2</option>
                    <option value='3'>3</option>
                    <option value='4'>4</option>
                    <option value='5'>5</option>
                    <option value='6'>6</option>
                  </select><br>";
        }
        ?>
        <input type="submit" value="Añadir al carrito">
    </form>
    <br><br>
    <a href="index.php">Volver al menú</a>
</body>
</html>
