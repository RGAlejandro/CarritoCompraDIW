<?php
// Verificar si se ha enviado al menos un usuario seleccionado
if(isset($_POST['usuarios']) && !empty($_POST['usuarios'])) {
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

    // Obtener la acción seleccionada
    $action = $_POST['action'];

    // Recorrer los usuarios seleccionados
    foreach($_POST['usuarios'] as $usuario_id) {
        // Realizar la operación según la acción seleccionada
        switch($action) {
            case 'admin':
                $perfil = 'administrador';
                break;
            case 'usuario':
                $perfil = 'usuario';
                break;
            case 'eliminar':
                // Eliminar el usuario de la base de datos
                $sql_delete = "DELETE FROM usuarios WHERE id_usuario = $usuario_id";
                if ($conn->query($sql_delete) === TRUE) {
                    echo "Usuario eliminado correctamente";
                } else {
                    echo "Error al eliminar usuario: " . $conn->error;
                }
                continue; // Pasar al siguiente usuario sin ejecutar el resto del código
        }

        // Actualizar el perfil del usuario en la base de datos
        $sql_update = "UPDATE usuarios SET perfil = '$perfil' WHERE id_usuario = $usuario_id";
        if ($conn->query($sql_update) === TRUE) {
            echo "Perfil actualizado correctamente";
        } else {
            echo "Error al actualizar perfil: " . $conn->error;
        }
    }

    $conn->close();

    // Redirigir después de 5 segundos
    header("Location: cambiarPerfilUsuario.php");
    exit();
} else {
    echo "Debe seleccionar al menos un usuario";
}
?>
