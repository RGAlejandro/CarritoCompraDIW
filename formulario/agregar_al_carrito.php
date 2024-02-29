<?php
    session_start();

    // Verifica si la sesión del carrito existe, si no, créala
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Verifica si se enviaron los datos del producto
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['productName']) && isset($_POST['price'])) {
        $productName = $_POST['productName'];
        $price = $_POST['price'];

        // Agrega el producto al carrito como un nuevo elemento en la sesión
        $_SESSION['cart'][] = array('productName' => $productName, 'price' => $price);
    }

    // Redirige de vuelta a la página principal o a donde sea necesario
    header('Location: cartaProducto.php');
    ?>