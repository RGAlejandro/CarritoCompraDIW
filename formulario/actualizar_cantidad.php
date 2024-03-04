<?php
session_start();

// Verificar si se ha enviado una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener la cantidad y el ID del producto desde la solicitud
    $cantidad = $_POST['cantidad'];
    $productId = $_POST['productId'];

    // Verificar si el carrito existe y si el producto está en el carrito
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as &$item) {
            // Actualizar la cantidad del producto si se encuentra en el carrito
            if ($item['productId'] == $productId) {
                $item['quantity'] = $cantidad;
                break;
            }
        }
    }

    // Devolver una respuesta (opcional)
    echo "Cantidad actualizada exitosamente";
}
