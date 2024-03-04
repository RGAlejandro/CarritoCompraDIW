<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['id_usuario'])) {
    echo "Error: Debes iniciar sesión para tramitar el pedido.";
    exit();
}

// Obtener el ID del usuario logueado
$id_usuario = $_SESSION['id_usuario'];

// Verificar si el carrito está vacío
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "Error: El carrito está vacío.";
    exit();
}

// Conectar a la base de datos (reemplaza estos valores con los de tu configuración)
$host = "localhost";
$usuario_bd = "root";
$contraseña_bd = "";
$nombre_bd = "carrito";

$conexion = new mysqli($host, $usuario_bd, $contraseña_bd, $nombre_bd);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Iniciar transacción
$conexion->begin_transaction();

// Insertar el pedido en la tabla "pedido"
$sql_pedido = "INSERT INTO pedidos (fecha, id_usuario) VALUES (NOW(), $id_usuario)";

if ($conexion->query($sql_pedido) === TRUE) {
    // Obtener el ID del pedido insertado
    $id_pedido = $conexion->insert_id;

    // Insertar los detalles del pedido en la tabla "detalle_pedido"
    foreach ($_SESSION['cart'] as $producto) {
        $id_producto = $producto['productId'];
        $cantidad = $producto['quantity'];
        $precio = $producto['price'];

        // Actualizar la cantidad disponible del producto en la tabla "productos" y la disponibilidad
        $sql_actualizar_cantidad = "UPDATE productos SET cantidad = GREATEST(cantidad - $cantidad, 0), disponible = CASE WHEN (cantidad - $cantidad) <= 0 THEN 0 ELSE disponible END WHERE idproducto = $id_producto";

        if ($conexion->query($sql_actualizar_cantidad) !== TRUE) {
            // Si ocurre algún error, revertir la transacción
            $conexion->rollback();
            echo "Error al actualizar cantidad del producto: " . $conexion->error;
            exit();
        }

        // Insertar el detalle del pedido
        $sql_detalle_pedido = "INSERT INTO detalle_pedido (id_pedido, id_producto, cantidad, precio, id_usuario) VALUES ($id_pedido, $id_producto, $cantidad, $precio, $id_usuario)";

        if ($conexion->query($sql_detalle_pedido) !== TRUE) {
            // Si ocurre algún error, revertir la transacción
            $conexion->rollback();
            echo "Error al insertar detalles del pedido: " . $conexion->error;
            exit();
        }
    }

    // Confirmar la transacción
    $conexion->commit();
    echo "Pedido tramitado exitosamente.";
    session_unset();
    session_destroy();
} else {
    echo "Error al insertar pedido: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>
