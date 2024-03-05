<?php
session_start();

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST["username"]; // es el email, no el usuario realmente
    $password = $_POST["password"];

    
    $authenticated = false; 

    $sql = "SELECT * FROM usuarios WHERE Usuario_email='$username' AND Usuario_clave='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) { // si hay filas, la combinacion de email y password son correctas
        $row = $result->fetch_assoc();

        // almacenar los datos del usuario en variables de sesión
        $_SESSION['id_usuario'] = $row['id_usuario'];
        $_SESSION['Usuario_email'] = $row['Usuario_email'];
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['apellidos'] = $row['apellidos'];
        $_SESSION['telefono'] = $row['telefono'];
        $_SESSION['perfil'] = $row['perfil'];

        $authenticated = true;
        
    } else { // si no, la combinacion es incorrecta
        
        $authenticated = false;
    }

    if ($authenticated) {
        if ($_SESSION['perfil'] === 'usuario') {
            header("Location: cartaProducto.php");
            exit();
        } elseif ($_SESSION['perfil'] === 'administrador') {
            header("Location: zonaAdmin.php");
            exit();
        }
    } else {
        header("Location: index.php?login=0");
        exit();
    }
}
?>