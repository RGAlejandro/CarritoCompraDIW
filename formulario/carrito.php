<?php
session_start();

// Verifica si la sesión del carrito existe
if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    echo '<h2>Carrito:</h2>';
    echo '<ul>';
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        echo '<li>' . $item['productName'] . ' - $' . $item['price'] . '</li>';
        $total += $item['price'];
    }
    echo '</ul>';
    echo '<p>Total: $' . $total . '</p>';
} else {
    echo '<p>El carrito está vacío.</p>';
}
?>