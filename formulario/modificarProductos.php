<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Document</title>
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
            <img src="../imagenes/imagenes/Logotipo.png" alt="Logo Hamburguesería">
        </div>
        <!-- LISTA DEPLEGABLE-->
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

    <div class="card-container">

        <table style="margin: 0 auto;">
            <!-- Cargar los productos de la base de datos (carrito/productos) -->
            <?php
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "carrito";

        $conn = new mysqli($servername, $username, $password, $dbname);

        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        
        $sql = "SELECT * FROM productos";
        $result = $conn->query($sql);

        
        if ($result->num_rows > 0) {
            // Contador para hacer filas de 4
            $counter = 0;

            
            while ($row = $result->fetch_assoc()) {
                
                if ($counter % 4 == 0) {
                    echo "<tr>";
                }

                
                echo "<td>";
                echo "<div class='card'>";
                echo "<img class='imagen' src='../imagenes/imagenes/" . $row['imagen'] . "' alt='" . $row['imagen'] . "'>";
                echo "<div class='title'>" . $row['nombre'] . "</div>";
                echo "<div class='price'>$" . $row['precio'] . "</div>";
                $cantidad = $row['cantidad'];

                echo "<button class='modify-product-btn'><a href='modificar_producto.php?id=" . $row['idproducto'] . "'>Modificar Producto</a></button>";
                
                echo "<div class='detail'>" . $row['descripcion'] . "</div>";
                echo "</div>";
                echo "</td>";

                // Si es la ultima hamburguesa, pasa a la siguiente fila
                if (($counter + 1) % 4 == 0) {
                    echo "</tr>";
                }

                
                $counter++;
            }

            // Si la ultima fila no está completada, se cierra igualmente
            if ($counter % 4 != 0) {
                echo "</tr>";
            }
        } else {
            echo "No se encontraron productos.";
        }

       
        $conn->close();
        ?>
        </table>


    </div>
    <script>
            //BOTON CUENTA
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
    
    <div id="cart-items">
        <!-- Aquí se mostrarán los productos agregados al carrito -->
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

</html>