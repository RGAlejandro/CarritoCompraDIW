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
        <div class="cart">
            <a href="carrito.php" class="cart-link">
                <img src="../imagenes/imagenes/carro.png" alt="Carrito de compras" class="cart-image">
            </a>
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
            <!--Esto es una prevosualizacion de como debe quedar-->
            <tr>
                <td>
                    <div class="card">
                        <img class="imagen" src="../imagenes/imagenes/abueladryage.jpg" alt="Hamburguesa 1">
                        <div class="title">Abuela Dry Aged</div>
                        <div class="price">$5.99</div>
                        <div><button class="add-to-cart-btn" onclick="addToCart('Abuela Dry Aged', 5.99,'Deliciosa hamburguesa clásica con carne de res, queso, lechuga y tomate.', '../imagenes/imagenes/abueladryage.jpg')">Añadir al carrito</button></div>    
                        <div class="detail">Deliciosa hamburguesa clásica con carne de res, queso, lechuga y tomate.
                        
                        
                        </div>
                    </div>
                </td>
                <td>
                    <div class="card">
                        <img class="imagen" src="../imagenes/imagenes/kikaburguer.jpg" alt="Hamburguesa 1">
                        <div class="title">Kika Burguer</div>
                        <div class="price">$5.99</div>
                        <button class="add-to-cart-btn" onclick="addToCart('Kika Burguer', 5.99,'Deliciosa hamburguesa clásica con carne de res, queso, lechuga y tomate.', '../imagenes/imagenes/kikaburguer.jpg')">Añadir al carrito</button>
                        <div class="detail">Deliciosa hamburguesa clásica con carne de res, queso, lechuga y tomate.
                        
                        </div>
                    </div>
                </td>
                <td>
                    <div class="card">
                        <img class="imagen" src="../imagenes/imagenes/doblecheesebacon.jpg"
                            alt="Hamburguesa 1">
                        <div class="title">Doble Chesse Bacon</div>
                        <div class="price">$5.99</div>
                        <button class="add-to-cart-btn" onclick="addToCart('Doble Chesse Bacon', 5.99,'Deliciosa hamburguesa clásica con carne de res, queso, lechuga y tomate.', '../imagenes/imagenes/doblecheesebacon.jpg')">Añadir al carrito</button>
                        <div class="detail">Deliciosa hamburguesa clásica con carne de res, queso, lechuga y tomate.
                        
                        </div>
                    </div>
                </td>
                <td>
                    <div class="card">
                        <img class="imagen" src="../imagenes/imagenes/oklahoma.jpg" alt="Hamburguesa 1">
                        <div class="title">Oklahoma</div>
                        <div class="price">$5.99</div>
                        <button class="add-to-cart-btn" onclick="addToCart('Oklahoma', 5.99,'Deliciosa hamburguesa clásica con carne de res, queso, lechuga y tomate.', '../imagenes/imagenes/oklahoma.jpg')">Añadir al carrito</button>
                        <div class="detail">Deliciosa hamburguesa clásica con carne de res, queso, lechuga y tomate.
                        
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="card">
                        <img class="imagen" src="../imagenes/imagenes/provocacion.jpg" alt="Hamburguesa 1">
                        <div class="title">Provocacion</div>
                        <div class="price">$5.99</div>
                        <button class="add-to-cart-btn" onclick="addToCart('Provocacion', 5.99,'Deliciosa hamburguesa clásica con carne de res, queso, lechuga y tomate.', '../imagenes/imagenes/provocacion.jpg')">Añadir al carrito</button>
                        <div class="detail">Deliciosa hamburguesa clásica con carne de res, queso, lechuga y tomate.
                        
                        </div>
                    </div>
                </td>
                <td>
                    <div class="card">
                        <img class="imagen" src="../imagenes/imagenes/richard.jpg" alt="Hamburguesa 1">
                        <div class="title">Richard Chamberlein</div>
                        <div class="price">$5.99</div>
                        <button class="add-to-cart-btn" onclick="addToCart('Richard Chamberlein', 5.99,'Deliciosa hamburguesa clásica con carne de res, queso, lechuga y tomate.', '../imagenes/imagenes/richard.jpg')">Añadir al carrito</button>
                        <div class="detail">Deliciosa hamburguesa clásica con carne de res, queso, lechuga y tomate.
                        
                        </div>
                    </div>
                </td>
                <td>
                    <div class="card">
                        <img class="imagen" src="../imagenes/imagenes/smashburguer.jpg" alt="Hamburguesa 1">
                        <div class="title">Smash Burguer</div>
                        <div class="price">$5.99</div>
                        <button class="add-to-cart-btn" onclick="addToCart('Smash Burguer', 5.99,'Deliciosa hamburguesa clásica con carne de res, queso, lechuga y tomate.', '../imagenes/imagenes/smashburguer.jpg')">Añadir al carrito</button>
                        <div class="detail">Deliciosa hamburguesa clásica con carne de res, queso, lechuga y tomate.
                        
                        </div>
                    </div>
                </td>
                <td>
                    <div class="card">
                        <img class="imagen" src="../imagenes/imagenes/vegana.jpg" alt="Hamburguesa 1">
                        <div class="title">Vegana</div>
                        <div class="price">$5.99</div>
                        <button class="add-to-cart-btn" onclick="addToCart('Vegana', 5.99,'Deliciosa hamburguesa clásica con carne de res, queso, lechuga y tomate.', '../imagenes/imagenes/vegana.jpg')">Añadir al carrito</button>
                        <div class="detail">Deliciosa hamburguesa clásica con carne de res, queso, lechuga y tomate.
                        
                        </div>
                    </div>
                </td>
            </tr>
        </table>


    </div>
    <script>
        let cartItems = [];
    
        function addToCart(productName, price, description, image) {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "carrito.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Actualizar la interfaz de usuario si es necesario
                    console.log(xhr.responseText);
                }
            };
            xhr.send(`productName=${productName}&price=${price}&description=${description}&image=${image}`);
        }
    
        function renderCart() {
            const cartContainer = document.getElementById('cart-items');
            cartContainer.innerHTML = ''; // Borra el contenido actual del carrito

            cartItems.forEach(item => {
            const cartItemDiv = document.createElement('div');
            cartItemDiv.classList.add('cart-item');

            const itemName = document.createElement('h3');
            itemName.textContent = item.name;

            const itemPrice = document.createElement('p');
            itemPrice.textContent = `Precio: $${item.price}`;

            const itemDescription = document.createElement('p');
            itemDescription.textContent = item.description;

            const itemImage = document.createElement('img');
            itemImage.src = item.image;
            itemImage.alt = item.name;

            cartItemDiv.appendChild(itemName);
            cartItemDiv.appendChild(itemPrice);
            cartItemDiv.appendChild(itemDescription);
            cartItemDiv.appendChild(itemImage);

            cartContainer.appendChild(cartItemDiv);
        });
        }

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