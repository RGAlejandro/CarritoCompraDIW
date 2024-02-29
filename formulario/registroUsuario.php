<?php
// Verificar si hay un parámetro 'registro' en la URL
if (isset($_GET['registro'])) {
    // Obtener el valor de 'registro'
    $registro = $_GET['registro'];
    
    // Mostrar mensajes según el valor de 'registro'
    if ($registro == 1) { // registro = 1 exitoso
        echo "<p style='color: green;'>Usuario registrado exitosamente, será redirigido en 3 segundos.</p>";
    } elseif ($registro == 0) { // registro = 0 erroneo
        // Verificar si hay un parámetro 'error' en la URL
        if (isset($_GET['error'])) {
            // Obtener el valor de 'error'
            $error = $_GET['error'];
            echo "<p style='color: red;'>Error al registrar usuario: $error, será redirigido en 3 segundos.</p>";
        } else {
            echo "<p style='color: red;'>Error al registrar usuario, será redirigido en 3 segundos.</p>";
        }
    }

    // Redirigir a la página "cartaProducto.php" después de 3 segundos
    header("refresh:3;url=cartaProducto.php");
}
?>
