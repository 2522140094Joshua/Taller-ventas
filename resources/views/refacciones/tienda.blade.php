<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refacciones - El Talachas</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f5f5f5;
            min-height: 100vh;
        }

        .header {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            position: relative;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .back-button {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #c0392b;
        }

        .title {
            text-align: center;
            font-size: 2.5em;
            font-weight: bold;
        }

        .subtitle {
            text-align: center;
            color: #bdc3c7;
            margin-top: 5px;
        }

        .cart-icon {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            background-color: #27ae60;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .cart-count {
            background-color: #e74c3c;
            color: white;
            border-radius: 50%;
            padding: 2px 8px;
            font-size: 0.8em;
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: 1fr 350px;
            gap: 30px;
        }

        .parts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
        }

        .part-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            border-left: 5px solid #3498db;
        }

        .part-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        }

        .part-category {
            background-color: #34495e;
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8em;
            display: inline-block;
            margin-bottom: 10px;
        }

        .part-name {
            color: #2c3e50;
            font-size: 1.3em;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .part-brand {
            color: #7f8c8d;
            font-size: 0.9em;
            margin-bottom: 10px;
        }

        .part-description {
            color: #555;
            line-height: 1.5;
            margin-bottom: 15px;
            font-size: 0.9em;
        }

        .part-price {
            color: #e74c3c;
            font-size: 1.4em;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .part-stock {
            color: #27ae60;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .stock-low {
            color: #e74c3c;
        }

        .add-to-cart {
            width: 100%;
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .add-to-cart:hover {
            background-color: #2980b9;
        }

        .add-to-cart:disabled {
            background-color: #bdc3c7;
            cursor: not-allowed;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }

        .quantity-btn {
            background-color: #ecf0f1;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
            font-weight: bold;
        }

        .quantity-input {
            width: 60px;
            text-align: center;
            padding: 5px;
            border: 1px solid #bdc3c7;
            border-radius: 3px;
        }

        /* Estilos del carrito */
        .cart-sidebar {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            height: fit-content;
            position: sticky;
            top: 20px;
        }

        .cart-title {
            color: #2c3e50;
            font-size: 1.5em;
            margin-bottom: 20px;
            text-align: center;
            border-bottom: 2px solid #ecf0f1;
            padding-bottom: 10px;
        }

        .cart-items {
            max-height: 400px;
            overflow-y: auto;
            margin-bottom: 20px;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #ecf0f1;
        }

        .item-info h4 {
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .item-info .item-price {
            color: #e74c3c;
            font-weight: bold;
        }

        .item-quantity {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .item-quantity input {
            width: 50px;
            text-align: center;
        }

        .remove-item {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
            font-size: 0.8em;
        }

        .cart-total {
            font-size: 1.3em;
            font-weight: bold;
            color: #2c3e50;
            text-align: center;
            margin: 20px 0;
            padding-top: 20px;
            border-top: 2px solid #ecf0f1;
        }

        .checkout-btn {
            width: 100%;
            background-color: #27ae60;
            color: white;
            border: none;
            padding: 15px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            font-size: 1.1em;
            transition: background-color 0.3s;
        }

        .checkout-btn:hover {
            background-color: #219a52;
        }

        .checkout-btn:disabled {
            background-color: #bdc3c7;
            cursor: not-allowed;
        }

        .empty-cart {
            text-align: center;
            color: #7f8c8d;
            font-style: italic;
            padding: 20px;
        }

        @media (max-width: 968px) {
            .container {
                grid-template-columns: 1fr;
            }
            
            .cart-sidebar {
                position: relative;
                top: 0;
            }
        }

        @media (max-width: 768px) {
            .parts-grid {
                grid-template-columns: 1fr;
            }
            
            .title {
                font-size: 2em;
            }
            
            .back-button, .cart-icon {
                position: relative;
                left: 0;
                top: 0;
                transform: none;
                margin: 10px 5px;
                display: inline-block;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <a href="javascript:history.back()" class="back-button">← Regresar</a>
        <h1 class="title">Refacciones</h1>
        <p class="subtitle">Taller Mecánico El Talachas - Piezas de calidad garantizada</p>
        <button class="cart-icon" onclick="toggleCart()">
            🛒 Carrito <span class="cart-count" id="cartCount">0</span>
        </button>
    </header>

    <div class="container">
        <!-- Catálogo de Refacciones -->
        <div class="parts-grid" id="partsGrid">
            <!-- Las refacciones se cargarán dinámicamente -->
        </div>

        <!-- Carrito de Compras -->
        <div class="cart-sidebar" id="cartSidebar">
            <h2 class="cart-title">🛒 Tu Carrito</h2>
            <div class="cart-items" id="cartItems">
                <div class="empty-cart">El carrito está vacío</div>
            </div>
            <div class="cart-total">
                Total: $<span id="cartTotal">0.00</span> MXN
            </div>
            <button class="checkout-btn" id="checkoutBtn" disabled onclick="checkout()">
                Proceder al Pago
            </button>
        </div>
    </div>

    <script>
        // Base de datos de refacciones
        const refacciones = [
            {
                id: 1,
                nombre: "Filtro de Aceite Original",
                marca: "Fram",
                categoria: "Filtros",
                descripcion: "Filtro de aceite de alta eficiencia para motor",
                precio: 180.00,
                stock: 15,
                imagen: "🛢️"
            },
            {
                id: 2,
                nombre: "Pastillas de Freno Delanteras",
                marca: "Bosch",
                categoria: "Frenos",
                descripcion: "Juego de pastillas para frenos delanteros",
                precio: 450.00,
                stock: 8,
                imagen: "🛑"
            },
            {
                id: 3,
                nombre: "Bujías Iridium",
                marca: "NGK",
                categoria: "Motor",
                descripcion: "Bujías de iridium para mejor combustión",
                precio: 320.00,
                stock: 20,
                imagen: "⚡"
            },
            {
                id: 4,
                nombre: "Amortiguador Delantero",
                marca: "Monroe",
                categoria: "Suspensión",
                descripcion: "Amortiguador gas para suspensión delantera",
                precio: 850.00,
                stock: 4,
                imagen: "🚗"
            },
            {
                id: 5,
                nombre: "Aceite Motor 5W-30",
                marca: "Castrol",
                categoria: "Lubricantes",
                descripcion: "Aceite sintético 5W-30 1 litro",
                precio: 220.00,
                stock: 25,
                imagen: "⛽"
            },
            {
                id: 6,
                nombre: "Batería 12V 60Ah",
                marca: "ACDelco",
                categoria: "Eléctrico",
                descripcion: "Batería mantenimiento libre 60 amperes",
                precio: 1800.00,
                stock: 6,
                imagen: "🔋"
            },
            {
                id: 7,
                nombre: "Líquido de Frenos DOT4",
                marca: "Bosch",
                categoria: "Frenos",
                descripcion: "Líquido de frenos DOT4 500ml",
                precio: 120.00,
                stock: 12,
                imagen: "💧"
            },
            {
                id: 8,
                nombre: "Correa de Distribución",
                marca: "Gates",
                categoria: "Motor",
                descripcion: "Kit completo de distribución",
                precio: 1200.00,
                stock: 3,
                imagen: "⛓️"
            },
            {
                id: 9,
                nombre: "Filtro de Aire",
                marca: "K&N",
                categoria: "Filtros",
                descripcion: "Filtro de aire de alto flujo",
                precio: 650.00,
                stock: 10,
                imagen: "🌬️"
            },
            {
                id: 10,
                nombre: "Aceite Dirección Hidráulica",
                marca: "Pentosin",
                categoria: "Lubricantes",
                descripcion: "Aceite para dirección hidráulica 1L",
                precio: 280.00,
                stock: 8,
                imagen: "⚙️"
            }
        ];

        // Carrito de compras
        let carrito = JSON.parse(localStorage.getItem('carritoElTalachas')) || [];

        // Inicializar la página
        document.addEventListener('DOMContentLoaded', function() {
            renderRefacciones();
            actualizarCarrito();
        });

        // Renderizar refacciones
        function renderRefacciones() {
            const grid = document.getElementById('partsGrid');
            grid.innerHTML = '';

            refacciones.forEach(refaccion => {
                const card = document.createElement('div');
                card.className = 'part-card';
                card.innerHTML = `
                    <span class="part-category">${refaccion.categoria}</span>
                    <div class="icon">${refaccion.imagen}</div>
                    <h3 class="part-name">${refaccion.nombre}</h3>
                    <p class="part-brand">Marca: ${refaccion.marca}</p>
                    <p class="part-description">${refaccion.descripcion}</p>
                    <div class="part-price">$${refaccion.precio.toFixed(2)} MXN</div>
                    <div class="part-stock ${refaccion.stock < 5 ? 'stock-low' : ''}">
                        ${refaccion.stock < 5 ? '⚠️ ' : ''}Stock: ${refaccion.stock} unidades
                    </div>
                    <div class="quantity-controls">
                        <button class="quantity-btn" onclick="changeQuantity(${refaccion.id}, -1)">-</button>
                        <input type="number" id="qty-${refaccion.id}" value="1" min="1" max="${refaccion.stock}" class="quantity-input">
                        <button class="quantity-btn" onclick="changeQuantity(${refaccion.id}, 1)">+</button>
                    </div>
                    <button class="add-to-cart" onclick="agregarAlCarrito(${refaccion.id})" 
                        ${refaccion.stock === 0 ? 'disabled' : ''}>
                        ${refaccion.stock === 0 ? 'SIN STOCK' : '🛒 Agregar al Carrito'}
                    </button>
                `;
                grid.appendChild(card);
            });
        }

        // Cambiar cantidad
        function changeQuantity(id, change) {
            const input = document.getElementById(`qty-${id}`);
            const refaccion = refacciones.find(r => r.id === id);
            let newValue = parseInt(input.value) + change;
            
            if (newValue < 1) newValue = 1;
            if (newValue > refaccion.stock) newValue = refaccion.stock;
            
            input.value = newValue;
        }

        // Agregar al carrito
        function agregarAlCarrito(id) {
            const input = document.getElementById(`qty-${id}`);
            const cantidad = parseInt(input.value);
            const refaccion = refacciones.find(r => r.id === id);

            if (cantidad > refaccion.stock) {
                alert('No hay suficiente stock disponible');
                return;
            }

            const itemExistente = carrito.find(item => item.id === id);
            
            if (itemExistente) {
                itemExistente.cantidad += cantidad;
            } else {
                carrito.push({
                    id: refaccion.id,
                    nombre: refaccion.nombre,
                    precio: refaccion.precio,
                    cantidad: cantidad,
                    imagen: refaccion.imagen
                });
            }

            // Resetear cantidad
            input.value = 1;

            // Actualizar interfaz
            actualizarCarrito();
            guardarCarrito();
            
            // Mostrar confirmación
            alert(`✅ ${cantidad} ${refaccion.nombre} agregado(s) al carrito`);
        }

        // Actualizar carrito en la interfaz
        function actualizarCarrito() {
            const cartItems = document.getElementById('cartItems');
            const cartTotal = document.getElementById('cartTotal');
            const cartCount = document.getElementById('cartCount');
            const checkoutBtn = document.getElementById('checkoutBtn');

            // Actualizar contador
            const totalItems = carrito.reduce((sum, item) => sum + item.cantidad, 0);
            cartCount.textContent = totalItems;

            // Actualizar items del carrito
            if (carrito.length === 0) {
                cartItems.innerHTML = '<div class="empty-cart">El carrito está vacío</div>';
                checkoutBtn.disabled = true;
            } else {
                cartItems.innerHTML = '';
                carrito.forEach(item => {
                    const itemElement = document.createElement('div');
                    itemElement.className = 'cart-item';
                    itemElement.innerHTML = `
                        <div class="item-info">
                            <h4>${item.nombre}</h4>
                            <div class="item-price">$${(item.precio * item.cantidad).toFixed(2)}</div>
                        </div>
                        <div class="item-quantity">
                            <span>${item.cantidad}x</span>
                            <button class="remove-item" onclick="removerDelCarrito(${item.id})">🗑️</button>
                        </div>
                    `;
                    cartItems.appendChild(itemElement);
                });
                checkoutBtn.disabled = false;
            }

            // Actualizar total
            const total = carrito.reduce((sum, item) => sum + (item.precio * item.cantidad), 0);
            cartTotal.textContent = total.toFixed(2);
        }

        // Remover item del carrito
        function removerDelCarrito(id) {
            carrito = carrito.filter(item => item.id !== id);
            actualizarCarrito();
            guardarCarrito();
        }

        // Guardar carrito en localStorage
        function guardarCarrito() {
            localStorage.setItem('carritoElTalachas', JSON.stringify(carrito));
        }

        // Proceder al pago
        function checkout() {
            if (carrito.length === 0) {
                alert('El carrito está vacío');
                return;
            }

            const total = carrito.reduce((sum, item) => sum + (item.precio * item.cantidad), 0);
            const confirmacion = confirm(`¿Proceder con la compra por $${total.toFixed(2)} MXN?`);
            
            if (confirmacion) {
                alert('¡Gracias por tu compra! En breve nos pondremos en contacto para coordinar la entrega.');
                carrito = [];
                actualizarCarrito();
                guardarCarrito();
            }
        }

        // Toggle del carrito (para móviles)
        function toggleCart() {
            const cartSidebar = document.getElementById('cartSidebar');
            cartSidebar.style.display = cartSidebar.style.display === 'none' ? 'block' : 'block';
        }
    </script>
</body>
</html>
