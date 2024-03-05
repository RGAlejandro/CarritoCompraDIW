<?php
// Verificar si se envió un formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $id_producto = $_POST["id_producto"];
    $nombre_producto = $_POST["nombre_producto"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    $cantidad = $_POST["cantidad"];

    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "carrito";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Verificar si se cargó una nueva imagen
    if ($_FILES["imagen"]["name"]) {
        // Obtener la información de la imagen
        $imagen_nombre = $_FILES["imagen"]["name"];
        $imagen_temp = $_FILES["imagen"]["tmp_name"];

        // Mover la imagen cargada al directorio de imágenes
        move_uploaded_file($imagen_temp, "../imagenes/imagenes/" . $imagen_nombre);

        // Actualizar la información del producto incluyendo la nueva imagen
        $sql = "UPDATE productos SET nombre='$nombre_producto', descripcion='$descripcion', precio=$precio, cantidad=$cantidad, imagen='$imagen_nombre' WHERE idproducto=$id_producto";
    } else {
        // Actualizar la información del producto sin cambiar la imagen
        $sql = "UPDATE productos SET nombre='$nombre_producto', descripcion='$descripcion', precio=$precio, cantidad=$cantidad WHERE idproducto=$id_producto";
    }

    if ($conn->query($sql) === TRUE) {
        // Redirigir de vuelta a la página de modificación con un mensaje de éxito
        header("refresh:5; url=zonaAdmin.php");
        echo "Producto modificado exitosamente. Redireccionando a la zona de administración en 5 segundos...";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
