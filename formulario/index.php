<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Document</title>
</head>
<style>
    form {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 400px; 
    width: 100%;
}
</style>    
<body>
    <header>
        <div class="logo">
            <img src="../imagenes/imagenes/Logotipo.png" alt="Logo Hamburguesería">
        </div>
        
    </header>
    <div class="card-container">
        <form action="login.php" method="post">
                <?php
            session_start();
            
            if (isset($_GET['login'])) {
                if ($_GET['login'] == 1) {
                    echo "<p id='loginExitoso'>Inicio de sesión exitoso, será redirigido en breve.</p>";
                } elseif ($_GET['login'] == 0) {
                    echo "<p>Error de inicio de sesión: Credenciales incorrectas</p>";
                }
            }
            ?>
            <label for="username">Email:</label><br>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Contraseña:</label><br>
            <input type="password" id="password" name="password" required><br><br>
            <button type="submit">Iniciar sesión</button>
            <div style="margin-top: 10px; text-align: center;">
                <p>¿No tienes una cuenta?</p>
                <a href="registrarUsuario.html">Crear usuario</a>
            </div>
        </form>
    </div>
    
    <footer style="background-color: #545454; color: #fff; padding: 20px; text-align: center;">
        <div style="max-width: 1200px; margin: 0 auto;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                <div style="flex: 1;">
                    <h3>Dónde encontrarnos</h3>
                    <p>Estamos situados en Sevilla, en la Calle Principal, Número 123.</p>
                </div>
                <div style="flex: 1;">
                    <h3>Sobre nosotros</h3>
                    <p>Somos una empresa apasionada por las hamburguesas, comprometida con la calidad y el sabor
                        auténtico.</p>
                </div>
                <div style="flex: 1;">
                    <h3>Contacto</h3>
                    <p>Teléfono: 123-456-789</p>
                    <p>Email: info@hamburguesassevilla.com</p>
                </div>
                <div style="flex: 1;">
                    <!-- Iconos de redes sociales -->
                    <a href="#" style="color: #fff; margin-right: 10px;"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" style="color: #fff; margin-right: 10px;"><i class="fab fa-twitter"></i></a>
                    <a href="#" style="color: #fff; margin-right: 10px;"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <hr style="border-color: #9c9b9b;">
            <div>
                <img src="../imagenes/imagenes/Logotipo.png" alt="Logo de la empresa"
                    style="max-width: 100px; margin: 0 auto;">
            </div>
            <div style="text-align: center;">
                <p>&copy; 2024 Ray's Burger. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>
    <script>
        // Función para redirigir después de 5 segundos
        function redirectToCartaProductos() {
            window.location.href = "cartaProducto.php";
        }

        // Verificar si se muestra el mensaje de inicio de sesión exitoso
        const loginSuccessMessage = document.getElementById('loginExitoso');
        if (loginSuccessMessage) {
            // Si el mensaje se muestra, esperar 5 segundos y luego redirigir
            setTimeout(redirectToCartaProductos, 2000); 
        }
    </script>
</body>

</html>