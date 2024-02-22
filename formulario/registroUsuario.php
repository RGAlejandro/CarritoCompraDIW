<?php
// Verificar si hay un parámetro 'registro' en la URL
if (isset($_GET['registro'])) {
    // Obtener el valor de 'registro'
    $registro = $_GET['registro'];
    
    // Mostrar mensajes según el valor de 'registro'
    if ($registro == 1) { // registro = 1 exitoso
        echo "<p style='color: green;'>Usuario registrado exitosamente.</p>";
    } elseif ($registro == 0) { // registro = 0 erroneo
        // Verificar si hay un parámetro 'error' en la URL
        if (isset($_GET['error'])) {
            // Obtener el valor de 'error'
            $error = $_GET['error'];
            echo "<p style='color: red;'>Error al registrar usuario: $error.</p>";
        } else {
            echo "<p style='color: red;'>Error al registrar usuario.</p>";
        }
    }
}
?>