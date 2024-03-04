<?php
session_start();

// Verificar si se ha enviado el formulario para vaciar el carrito
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['vaciar_carrito'])) {
    // Verificar si el carrito existe antes de intentar vaciarlo
    if (isset($_SESSION['cart'])) {
        // Vaciar el carrito
        unset($_SESSION['cart']);
        // Redirigir a la misma página para actualizar la interfaz de usuario
        header("Location: carrito.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Título Aquí</title>
    <link rel="stylesheet" type="text/css" href="./estilo.css">
    <style>
        /* Estilo para la lista desplegable */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #fff;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 5px 0;
            right: 0;
        }

        .dropdown-content a {
            color: black;
            padding: 8px 12px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .show {
            display: block;
        }

        /* Estilo para el contenedor de la tabla de productos */
        .container {
            max-width: 800px;
            margin: 100px auto 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .cart-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .cart-table th,
        .cart-table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .cart-table th {
            background-color: #f2f2f2;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 14px;
        }

        .cart-table tr:hover {
            background-color: #f5f5f5;
        }

        .product-image {
            width: 80px;
            height: 80px;
            border-radius: 5px;
        }

        .product-name {
            font-weight: bold;
        }

        .product-price {
            font-style: italic;
        }

        .total-row {
            font-weight: bold;
            text-align: right;
            margin-top: 10px;
        }

        .vaciar-carrito-btn {
            background-color: #e63900;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .vaciar-carrito-btn:hover {
            background-color: #e63900;
        }
    </style>
</head>

<body>
    <header>
        <div class="logo">
            <a href="cartaProducto.php" class="logo">
                <img src="../imagenes/imagenes/Logotipo.png" alt="Logo Hamburguesería">
            </a>
        </div>
        <div class="cart">
            <a href="carrito.php" class="cart-link">
                <img src="../imagenes/imagenes/carro.png" alt="Carrito de compras" class="cart-image">
            </a>
        </div>
        <div class="user-info">
            <div class="dropdown">
                <img src="../imagenes/imagenes/usuario.png" alt="Usuario" class="user-image" onclick="toggleDropdown()">
                <div id="dropdownContent" class="dropdown-content">
                    <a href="editarUsuario.php">Editar Usuario</a>
                    <a href="index.php">Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </header>
    <h2>CARRITO</h2>
    <div class="container">

        <?php
        // Verifica si la sesión del carrito existe
        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
            echo '<table class="cart-table">';
            echo '<tr>';
            echo '<th>Producto</th>';
            echo '<th>Imagen</th>';
            echo '<th>Precio</th>';
            echo '<th>Cantidad</th>'; // Nuevo campo "Cantidad"
            echo '</tr>';
            foreach ($_SESSION['cart'] as $item) {
                echo '<tr>';
                echo '<td class="product-name">' . $item['productName'] . '</td>';
                echo '<td><img src="' . $item['image'] . '" alt="' . $item['productName'] . '" class="product-image"></td>';
                echo '<td class="product-price">$' . $item['price'] . '</td>';
                echo '<td>'; // Abre la celda para el menú desplegable
                echo '<select name="cantidad">';
                for ($i = 0; $i <= 10; $i++) {
                    echo '<option value="' . $i . '">' . $i . '</option>';
                }
                echo '</select>';
                echo '</td>'; // Cierra la celda para el menú desplegable
                echo '</tr>';
            }
            echo '</table>';
            $total = array_sum(array_column($_SESSION['cart'], 'price'));
            echo '<form method="post" action="">';
            echo '<button type="submit" name="vaciar_carrito" class="vaciar-carrito-btn">Vaciar Carrito</button>';
            echo '</form>';
            echo '<p class="total-row">Total: $' . $total . '</p>';
        } else {
            echo '<p>El carrito está vacío.</p>';
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verifica si se ha enviado el formulario para vaciar el carrito
            if (isset($_POST['vaciar_carrito'])) {
                // Vaciar el carrito
                unset($_SESSION['cart']);
                // Devuelve una respuesta opcional
                echo '<p>Carrito vaciado exitosamente.</p>';
            }
        }
        ?>


        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST" /*&& isset($_POST['agregar_producto'])*/) {
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
            }

            // Recibe los datos del producto del formulario
            $productName = $_POST['productName'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $image = $_POST['image'];

            // Agrega el producto al carrito
            $product = array(
                'productName' => $productName,
                'price' => $price,
                'description' => $description,
                'image' => $image
            );
            array_push($_SESSION['cart'], $product);

            // Devuelve una respuesta opcional (puede ser útil para manejar la actualización de la interfaz de usuario)
            echo "Producto agregado al carrito exitosamente.";
        }
        ?>
    </div>

    <footer style="background-color: #545454; color: #fff; padding: 20px; text-align: center;">
        <div style="max-width: 1200px; margin: 0 auto;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                <div style="flex: 1;">
                    <h3>Dónde encontrarnos</h3>
                    <p>Estamos situados en Sevilla, en la Calle Principal, Número 123.</p>
                </div>
                <div style="flex: 1;">
                    <h3>Sobre nosotros</h3>
                    <p>Somos una empresa apasionada por las hamburguesas, comprometida con la calidad y el sabor auténtico.</p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>