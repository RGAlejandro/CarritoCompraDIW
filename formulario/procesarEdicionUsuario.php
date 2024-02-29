<?php
session_start(); // Iniciar sesión para acceder a las variables de sesión

// Verificar si se recibieron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establecer conexión con la base de datos (modifica los parámetros según tu configuración)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "carrito";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener el ID de usuario de la sesión
    $id_usuario = $_SESSION['id_usuario'];

    // Obtener y validar los datos del formulario
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $nueva_password = $_POST["nueva_password"];

    // Verificar la contraseña actual del usuario desde la base de datos
    $sql = "SELECT Usuario_clave FROM usuarios WHERE id_usuario = $id_usuario";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $clave_actual_bd = $row["Usuario_clave"];

        // Verificar si la contraseña actual coincide con la almacenada en la base de datos
        if ($password == $clave_actual_bd) {
            // La contraseña es correcta, procede con la actualización de datos del usuario
            // Actualizar los datos del usuario en la base de datos
            $sql_update = "UPDATE usuarios SET nombre='$nombre', Usuario_email='$email'";
            // Verificar si se proporcionó una nueva contraseña
            if (!empty($nueva_password)) {
                $sql_update .= ", Usuario_clave='$nueva_password'";
            }
            $sql_update .= " WHERE id_usuario = $id_usuario";

            if ($conn->query($sql_update) === TRUE) {
                echo '<div style="color: green; font-size: larger;">Los datos del usuario se actualizaron correctamente, será redirigido en 3 segundos.</div>';
                echo '<meta http-equiv="refresh" content="3;url=cartaProducto.html">';
            } else {
                echo '<div style="color: red; font-size: larger;">Error al actualizar los datos del usuario: ' . $conn->error . ', será redirigido en 3 segundos.</div>';
                echo '<meta http-equiv="refresh" content="3;url=cartaProducto.html">';
            }
        } else {
            // La contraseña actual no coincide
            echo '<div style="color: red; font-size: larger;">La contraseña actual es incorrecta</div>';
            echo '<meta http-equiv="refresh" content="3;url=cartaProducto.html">';
        }
    } else {
        echo '<div style="color: red; font-size: larger;">Error: No se encontró al usuario en la base de datos</div>';
        echo '<meta http-equiv="refresh" content="3;url=cartaProducto.html">';
    }

    // Cerrar la conexión con la base de datos
    $conn->close();
} else {
    // Redirigir si se intenta acceder directamente a este archivo sin enviar datos del formulario
    header("Location: editarUsuario.php");
    exit();
}
?>
