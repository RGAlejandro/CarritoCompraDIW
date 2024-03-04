<?php
session_start();

// Verifica si la sesión del carrito existe, si no, créala
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Verifica si se enviaron los datos del producto
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['productName']) && isset($_POST['price']) && isset($_POST['productId']) && isset($_POST['image'])) {
    $productName = $_POST['productName'];
    $price = $_POST['price'];
    $productId = $_POST['productId'];
    $image = $_POST['image'];

    // Verifica si el producto ya está en el carrito
    $productFound = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['productId'] === $productId) {
            // Incrementa la cantidad del producto en el carrito
            $item['quantity'] += 1;
            $productFound = true;
            break;
        }
    }

    // Si el producto no se encontró en el carrito, agrégalo como un nuevo elemento
    if (!$productFound) {
        $_SESSION['cart'][] = array('productId' => $productId, 'productName' => $productName, 'price' => $price, 'quantity' => 1, 'image' => $image);
    }
}

// Redirige de vuelta a la página principal o a donde sea necesario
header('Location: cartaProducto.php');
?>
