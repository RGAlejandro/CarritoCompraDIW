<?php
// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "carrito";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $database);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Recibe los datos del formulario
    $nombre_producto = $_POST["nombre_producto"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    $cantidad = $_POST["cantidad"];
    $imagen_nombre = $_FILES["imagen"]["name"];
    $imagen_temp = $_FILES["imagen"]["tmp_name"];

    // Guarda el nombre de la imagen en la base de datos
    // (aquí asumiendo que tienes una tabla llamada 'Productos')
    $sql = "INSERT INTO Productos (nombre, descripcion, precio, cantidad, imagen) 
            VALUES ('$nombre_producto', '$descripcion', '$precio', '$cantidad', '$imagen_nombre')";

    if ($conn->query($sql) === TRUE) {
        // Mueve la imagen al directorio deseado (asegúrate de que el directorio exista)
        move_uploaded_file($imagen_temp, "../imagenes/imagenes/" . $imagen_nombre);

        // Redirige a zonaAdmin.php después de 5 segundos
        header("refresh:5; url=zonaAdmin.php");

        // Muestra el mensaje de éxito
        echo "Producto dado de alta exitosamente. Redireccionando a la zona de administración en 5 segundos...";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
