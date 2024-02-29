<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Document</title>
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
        <div class="user-info">
            <a href="editarUsuario.php" class="user-details"><img src="../imagenes/imagenes/usuario.png" alt="Usuario"
                    class="user-image"></a>
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
                        <div><button class="add-to-cart-btn" onclick="addToCart('Abuela Dry Aged', 5.99)">Añadir al carrito</button></div>    
                        <div class="detail">Deliciosa hamburguesa clásica con carne de res, queso, lechuga y tomate.
                        
                        
                        </div>
                    </div>
                </td>
                <td>
                    <div class="card">
                        <img class="imagen" src="../imagenes/imagenes/kikaburguer.jpg" alt="Hamburguesa 1">
                        <div class="title">Kika Burguer</div>
                        <div class="price">$5.99</div>
                        <button class="add-to-cart-btn" onclick="addToCart('Kika Burguer', 5.99)">Añadir al carrito</button>
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
                        <button class="add-to-cart-btn" onclick="addToCart('Doble Chesse Bacon', 5.99)">Añadir al carrito</button>
                        <div class="detail">Deliciosa hamburguesa clásica con carne de res, queso, lechuga y tomate.
                        
                        </div>
                    </div>
                </td>
                <td>
                    <div class="card">
                        <img class="imagen" src="../imagenes/imagenes/oklahoma.jpg" alt="Hamburguesa 1">
                        <div class="title">Oklahoma</div>
                        <div class="price">$5.99</div>
                        <button class="add-to-cart-btn" onclick="addToCart('Oklahoma', 5.99)">Añadir al carrito</button>
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
                        <button class="add-to-cart-btn" onclick="addToCart('Provocacion', 5.99)">Añadir al carrito</button>
                        <div class="detail">Deliciosa hamburguesa clásica con carne de res, queso, lechuga y tomate.
                        
                        </div>
                    </div>
                </td>
                <td>
                    <div class="card">
                        <img class="imagen" src="../imagenes/imagenes/richard.jpg" alt="Hamburguesa 1">
                        <div class="title">Richard Chamberlein</div>
                        <div class="price">$5.99</div>
                        <button class="add-to-cart-btn" onclick="addToCart('Richard Chamberlein', 5.99)">Añadir al carrito</button>
                        <div class="detail">Deliciosa hamburguesa clásica con carne de res, queso, lechuga y tomate.
                        
                        </div>
                    </div>
                </td>
                <td>
                    <div class="card">
                        <img class="imagen" src="../imagenes/imagenes/smashburguer.jpg" alt="Hamburguesa 1">
                        <div class="title">Smash Burguer</div>
                        <div class="price">$5.99</div>
                        <button class="add-to-cart-btn" onclick="addToCart('Smash Burguer', 5.99)">Añadir al carrito</button>
                        <div class="detail">Deliciosa hamburguesa clásica con carne de res, queso, lechuga y tomate.
                        
                        </div>
                    </div>
                </td>
                <td>
                    <div class="card">
                        <img class="imagen" src="../imagenes/imagenes/vegana.jpg" alt="Hamburguesa 1">
                        <div class="title">Vegana</div>
                        <div class="price">$5.99</div>
                        <button class="add-to-cart-btn" onclick="addToCart('Vegana', 5.99)">Añadir al carrito</button>
                        <div class="detail">Deliciosa hamburguesa clásica con carne de res, queso, lechuga y tomate.
                        
                        </div>
                    </div>
                </td>
            </tr>
        </table>


    </div>
    <script>
        let cartItems = [];
    
        function addToCart(productName, price) {
        // Crea un formulario oculto con los datos del producto y envíalo al servidor
        const form = document.createElement('form');
        form.method = 'post';
        form.action = 'agregar_al_carrito.php';

        const productNameInput = document.createElement('input');
        productNameInput.type = 'hidden';
        productNameInput.name = 'productName';
        productNameInput.value = productName;
        form.appendChild(productNameInput);

        const priceInput = document.createElement('input');
        priceInput.type = 'hidden';
        priceInput.name = 'price';
        priceInput.value = price;
        form.appendChild(priceInput);

        document.body.appendChild(form);
        form.submit();
    }
    
        function renderCart() {
            const cartContainer = document.getElementById('cart-items');
            cartContainer.innerHTML = ''; // Borra el contenido actual del carrito
    
            cartItems.forEach(item => {
                const cartItemDiv = document.createElement('div');
                cartItemDiv.classList.add('cart-item');
    
                const itemName = document.createElement('span');
                itemName.textContent = item.name;
    
                const itemPrice = document.createElement('span');
                itemPrice.textContent = `$${item.price}`;
    
                const itemQuantity = document.createElement('span');
                itemQuantity.textContent = `Cantidad: ${item.quantity}`;
    
                cartItemDiv.appendChild(itemName);
                cartItemDiv.appendChild(itemPrice);
                cartItemDiv.appendChild(itemQuantity);
    
                cartContainer.appendChild(cartItemDiv);
            });
        }
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