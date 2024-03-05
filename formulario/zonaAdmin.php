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

.card-container {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.header {
    margin-bottom: 20px;
}

.menu {
    margin-top: 20px;
}

.menu ul {
    list-style-type: none;
    padding: 0;
}

.menu ul li {
    margin-bottom: 10px;
}

.menu ul li a {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
    padding: 15px 30px;
    border-radius: 5px;
    display: block;
    background-color: #4CAF50;
    transition: background-color 0.3s ease;
}

.menu ul li a:hover {
    background-color: #45a049;
}

.dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #fff;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 5px 0;
            right: 0;
        }

        .dropdown-content a {
            color: black;
            padding: 8px 12px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .show {
            display: block;
        }
</style>    
<body>
<header>
        <div class="logo">
            <a href="cartaProducto.php" class="logo">
                <img src="../imagenes/imagenes/Logotipo.png" alt="Logo Hamburguesería">
            </a>
        </div>
        
        <div class="user-info">
            <div class="dropdown">
                <img src="../imagenes/imagenes/usuario.png" alt="Usuario" class="user-image" onclick="toggleDropdown()">
                <div id="dropdownContent" class="dropdown-content">
                    <a href="editarUsuario.php">Editar Usuario</a>
                    <a href="index.php">Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </header>
    
    <div class="card-container">
    <div class="header">
        <h1>Bienvenido a la zona de administración</h1>
    </div>
    <div class="menu">
        <ul>
            <li><a href="altaProducto.php">Dar alta a un producto</a></li>
            <li><a href="modificarProductos.php">Modificar cantidad de productos</a></li>
            <li><a href="cambiarPerfilUsuario.php">Cambiar perfil de usuario</a></li>
        </ul>
    </div>
</div>
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

        function toggleDropdown() {
            var dropdownContent = document.getElementById("dropdownContent");
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        }
    </script>
</body>

</html>