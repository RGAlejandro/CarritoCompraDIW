<?php
// Establecer la conexión con la base de datos
$servername = "localhost"; // Nombre del servidor de la base de datos
$username = "root"; // Nombre de usuario de MySQL
$password = ""; // Contraseña de MySQL
$database = "carrito"; // Nombre de la base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

$nombre = trim($_POST['nombre']);
$apellido = trim($_POST['apellido']);
$telefono = trim($_POST['telefono']);
$email = trim($_POST['email']);
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Verificar que ninguno de los campos esté vacío
if (empty($nombre) || empty($apellido) || empty($telefono) || empty($email) || empty($password) || empty($confirm_password)) {
    header("Location: registroUsuario.php?registro=0&error=Campos vacíos");
}

// Verificar que las contraseñas coincidan
if ($password !== $confirm_password) {
    header("Location: registroUsuario.php?registro=0&error=Las contraseñas no coinciden");
}


// Preparar la consulta SQL para insertar el usuario en la base de datos
$sql = "INSERT INTO usuarios (nombre, apellidos , telefono, Usuario_email, Usuario_clave, perfil) VALUES ('$nombre', '$apellido', '$telefono', '$email', '$password', 'usuario')";


// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    header("Location: registroUsuario.php?registro=1");
} else {
    header("Location: registroUsuario.php?registro=0&error=Error al registrar usuario: " . $conn->error);
}

// Cerrar la conexión
$conn->close();
?>