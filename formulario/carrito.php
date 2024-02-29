<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Título Aquí</title>
    <link rel="stylesheet" type="text/css" href="./estilo.css">
    <style>
        /* Estilo para la lista desplegable */
        /*LISTA DESPLIEGABLE*/
        .dropdown {
            position: relative;
            display: inline-block;
        }
        
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #fff; /* Fondo blanco */
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border: 1px solid #ccc; /* Borde gris */
            border-radius: 5px; /* Bordes redondeados */
            padding: 5px 0; /* Espacio interior */
            right: 0; /* Ajusta la posición a la derecha */
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
</head>

<body>
    <header>
        <div class="logo">
            <a href="cartaProducto.php" class="logo">
            <img src="../imagenes/imagenes/Logotipo.png" alt="Logo Hamburguesería">
            </a>
        </div>
        <div class="cart">
            <a href="carrito.php" class="cart-link">
                <img src="../imagenes/imagenes/carro.png" alt="Carrito de compras" class="cart-image">
            </a>
        </div>
        <div class="user-info">
            <!-- Cambié el enlace directo a editarUsuario.php por un span con la clase dropdown -->
            <div class="dropdown">
                <img src="../imagenes/imagenes/usuario.png" alt="Usuario" class="user-image" onclick="toggleDropdown()">
                <div id="dropdownContent" class="dropdown-content">
                    <a href="editarUsuario.php">Editar Usuario</a>
                    <a href="index.php">Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </header>
    <h2>CARRITO</h2>
    <div class="card-container">
    
    <?php
    // Verifica si la sesión del carrito existe
    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
        echo '<h2>Carrito:</h2><br>';
        foreach ($_SESSION['cart'] as $item) {
            echo '<div class="cart-item">';
            echo '<h3>' . $item['productName'] . '</h3>';
            echo '<img src="' . $item['image'] . '" alt="' . $item['productName'] . '" class="product-image" style="width: 200px; height: 200px;">';
            echo '<p>Precio: $' . $item['price'] . '</p>';
            echo '</div>';
        }
        $total = array_sum(array_column($_SESSION['cart'], 'price'));
        echo '<p>Total: $' . $total . '</p>';
    } else {
        echo '<p>El carrito está vacío.</p>';
    }
    ?>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Recibe los datos del producto del formulario
    $productName = $_POST['productName'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_POST['image'];

    // Agrega el producto al carrito
    $product = array(
        'productName' => $productName,
        'price' => $price,
        'description' => $description,
        'image' => $image
    );
    array_push($_SESSION['cart'], $product);

    // Devuelve una respuesta opcional (puede ser útil para manejar la actualización de la interfaz de usuario)
    echo "Producto agregado al carrito exitosamente.";
}
?>
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
</body>
<script>
            function toggleDropdown() {
            var dropdownContent = document.getElementById("dropdownContent");
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        }
                // Event listener para cerrar la lista desplegable cuando se hace clic fuera de ella
                document.addEventListener("click", function(event) {
            var dropdownContent = document.getElementById("dropdownContent");
            var userImage = document.querySelector(".user-image");
            if (event.target !== dropdownContent && event.target !== userImage) {
                dropdownContent.style.display = "none";
            }
        });
</script>

</html>
