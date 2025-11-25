<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras - El Talachas</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f8f9fa;
            min-height: 100vh;
        }

        .header {
            background: linear-gradient(135deg, #2c3e50, #34495e);
            color: white;
            padding: 25px 20px;
            position: relative;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .back-button {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .back-button:hover {
            background-color: #c0392b;
            transform: translateY(-50%) scale(1.05);
        }

        .title {
            text-align: center;
            font-size: 2.8em;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .subtitle {
            text-align: center;
            color: #bdc3c7;
            font-size: 1.1em;
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 20px;
        }

        /* Estados del carrito */
        .cart-empty {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .cart-empty .icon {
            font-size: 4em;
            margin-bottom: 20px;
            opacity: 0.7;
        }

        .cart-empty h2 {
            color: #2c3e50;
            margin-bottom: 15px;
        }

        .cart-empty p {
            color: #7f8c8d;
            margin-bottom: 30px;
            font-size: 1.1em;
        }

        .continue-shopping {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.1em;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .continue-shopping:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.4);
        }

        /* Carrito con items */
        .cart-with-items {
            display: none;
        }

        .cart-items {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            margin-bottom: 30px;
            overflow: hidden;
        }

        .cart-header {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr 0.5fr;
            gap: 15px;
            padding: 20px;
            background: #34495e;
            color: white;
            font-weight: bold;
        }

        .cart-item {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr 0.5fr;
            gap: 15px;
            padding: 20px;
            border-bottom: 1px solid #ecf0f1;
            align-items: center;
            transition: background-color 0.3s ease;
        }

        .cart-item:hover {
            background-color: #f8f9fa;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .item-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .item-icon {
            font-size: 2em;
            width: 50px;
            text-align: center;
        }

        .item-details h3 {
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .item-details .item-code {
            color: #7f8c8d;
            font-size: 0.9em;
        }

        .item-price {
            color: #2c3e50;
            font-weight: bold;
            font-size: 1.1em;
        }

        .item-total {
            color: #e74c3c;
            font-weight: bold;
            font-size: 1.2em;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .quantity-btn {
            background: #ecf0f1;
            border: none;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .quantity-btn:hover {
            background: #3498db;
            color: white;
        }

        .quantity-input {
            width: 60px;
            text-align: center;
            padding: 8px;
            border: 2px solid #ecf0f1;
            border-radius: 8px;
            font-weight: bold;
        }

        .remove-btn {
            background: #e74c3c;
            color: white;
            border: none;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .remove-btn:hover {
            background: #c0392b;
            transform: scale(1.1);
        }

        /* Resumen del carrito */
        .cart-summary {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .summary-title {
            color: #2c3e50;
            font-size: 1.5em;
            margin-bottom: 20px;
            text-align: center;
            border-bottom: 2px solid #ecf0f1;
            padding-bottom: 15px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            padding: 10px 0;
        }

        .summary-label {
            color: #7f8c8d;
        }

        .summary-value {
            color: #2c3e50;
            font-weight: bold;
        }

        .summary-total {
            border-top: 2px solid #ecf0f1;
            padding-top: 15px;
            margin-top: 10px;
            font-size: 1.3em;
        }

        .total-label {
            color: #2c3e50;
        }

        .total-value {
            color: #e74c3c;
            font-weight: bold;
        }

        .checkout-actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-top: 25px;
        }

        .continue-btn {
            background: #95a5a6;
            color: white;
            border: none;
            padding: 15px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            font-size: 1.1em;
            transition: all 0.3s ease;
        }

        .continue-btn:hover {
            background: #7f8c8d;
            transform: translateY(-2px);
        }

        .checkout-btn {
            background: linear-gradient(135deg, #27ae60, #219a52);
            color: white;
            border: none;
            padding: 15px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            font-size: 1.1em;
            transition: all 0.3s ease;
        }

        .checkout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(39, 174, 96, 0.4);
        }

        .checkout-btn:disabled {
            background: #bdc3c7;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        /* Mensajes de alerta */
        .alert {
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .alert-success {
            background: #d5f4e6;
            color: #27ae60;
            border: 1px solid #27ae60;
        }

        .alert-info {
            background: #d6eaf8;
            color: #3498db;
            border: 1px solid #3498db;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                margin: 20px auto;
                padding: 0 15px;
            }

            .title {
                font-size: 2.2em;
            }

            .back-button {
                position: relative;
                left: 0;
                top: 0;
                transform: none;
                margin-bottom: 15px;
                display: inline-flex;
            }

            .cart-header {
                grid-template-columns: 1fr 1fr;
                gap: 10px;
            }

            .cart-item {
                grid-template-columns: 1fr 1fr;
                gap: 10px;
                padding: 15px;
            }

            .item-info {
                grid-column: 1 / -1;
            }

            .checkout-actions {
                grid-template-columns: 1fr;
            }

            .cart-header .header-quantity,
            .cart-header .header-total,
            .cart-header .header-remove {
                display: none;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <a href="refacciones.php" class="back-button">← Volver a Refacciones</a>
        <h1 class="title">Carrito de Compras</h1>
        <p class="subtitle">Taller Mecánico El Talachas - Revisa y confirma tu pedido</p>
    </header>

    <div class="container">
        <!-- Mensajes de alerta -->
        <div id="alertMessage" class="alert" style="display: none;"></div>

        <!-- Carrito Vacío -->
        <div class="cart-empty" id="cartEmpty">
            <div class="icon">🛒</div>
            <h2>Tu carrito está vacío</h2>
            <p>No hay refacciones en tu carrito de compras.</p>
            <a href="refacciones.php" class="continue-shopping">
                🛍️ Continuar Comprando
            </a>
        </div>

        <!-- Carrito con Items -->
        <div class="cart-with-items" id="cartWithItems">
            <!-- Lista de Items -->
            <div class="cart-items">
                <div class="cart-header">
                    <div class="header-product">Producto</div>
                    <div class="header-price">Precio</div>
                    <div class="header-quantity">Cantidad</div>
                    <div class="header-total">Total</div>
                    <div class="header-remove">Quitar</div>
                </div>
                <div id="cartItemsList">
                    <!-- Los items del carrito se cargan aquí dinámicamente -->
                </div>
            </div>

            <!-- Resumen del Pedido -->
            <div class="cart-summary">
                <h3 class="summary-title">Resumen del Pedido</h3>
                
                <div class="summary-row">
                    <span class="summary-label">Subtotal:</span>
                    <span class="summary-value" id="subtotal">$0.00 MXN</span>
                </div>
                
                <div class="summary-row">
                    <span class="summary-label">IVA (16%):</span>
                    <span class="summary-value" id="iva">$0.00 MXN</span>
                </div>
                
                <div class="summary-row">
                    <span class="summary-label">Envío:</span>
                    <span class="summary-value" id="shipping">$0.00 MXN</span>
                </div>
                
                <div class="summary-row summary-total">
                    <span class="total-label">Total:</span>
                    <span class="total-value" id="total">$0.00 MXN</span>
                </div>

                <div class="checkout-actions">
                    <button class="continue-btn" onclick="continueShopping()">
                        🛍️ Seguir Comprando
                    </button>
                    <button class="checkout-btn" id="checkoutBtn" onclick="proceedToCheckout()">
                        🚀 Proceder al Pago
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Carrito de compras
        let carrito = JSON.parse(localStorage.getItem('carritoElTalachas')) || [];

        // Inicializar la página
        document.addEventListener('DOMContentLoaded', function() {
            actualizarVistaCarrito();
        });

        // Actualizar vista del carrito
        function actualizarVistaCarrito() {
            const cartEmpty = document.getElementById('cartEmpty');
            const cartWithItems = document.getElementById('cartWithItems');
            const cartItemsList = document.getElementById('cartItemsList');

            if (carrito.length === 0) {
                cartEmpty.style.display = 'block';
                cartWithItems.style.display = 'none';
            } else {
                cartEmpty.style.display = 'none';
                cartWithItems.style.display = 'block';
                renderCartItems();
                actualizarResumen();
            }
        }

        // Renderizar items del carrito
        function renderCartItems() {
            const cartItemsList = document.getElementById('cartItemsList');
            cartItemsList.innerHTML = '';

            carrito.forEach(item => {
                const itemTotal = item.precio * item.cantidad;
                const cartItem = document.createElement('div');
                cartItem.className = 'cart-item';
                cartItem.innerHTML = `
                    <div class="item-info">
                        <div class="item-icon">${item.imagen}</div>
                        <div class="item-details">
                            <h3>${item.nombre}</h3>
                            <div class="item-code">Código: REF-${item.id.toString().padStart(3, '0')}</div>
                        </div>
                    </div>
                    <div class="item-price">$${item.precio.toFixed(2)}</div>
                    <div class="quantity-controls">
                        <button class="quantity-btn" onclick="cambiarCantidad(${item.id}, -1)">-</button>
                        <input type="number" class="quantity-input" value="${item.cantidad}" 
                               min="1" max="99" onchange="actualizarCantidad(${item.id}, this.value)">
                        <button class="quantity-btn" onclick="cambiarCantidad(${item.id}, 1)">+</button>
                    </div>
                    <div class="item-total">$${itemTotal.toFixed(2)}</div>
                    <button class="remove-btn" onclick="removerItem(${item.id})">🗑️</button>
                `;
                cartItemsList.appendChild(cartItem);
            });
        }

        // Actualizar resumen de compra
        function actualizarResumen() {
            const subtotal = carrito.reduce((sum, item) => sum + (item.precio * item.cantidad), 0);
            const iva = subtotal * 0.16;
            const shipping = subtotal > 1000 ? 0 : 150; // Envío gratis sobre $1000
            const total = subtotal + iva + shipping;

            document.getElementById('subtotal').textContent = `$${subtotal.toFixed(2)} MXN`;
            document.getElementById('iva').textContent = `$${iva.toFixed(2)} MXN`;
            document.getElementById('shipping').textContent = shipping === 0 ? 'GRATIS' : `$${shipping.toFixed(2)} MXN`;
            document.getElementById('total').textContent = `$${total.toFixed(2)} MXN`;

            // Mostrar mensaje de envío gratis
            if (subtotal > 1000) {
                document.getElementById('shipping').innerHTML = 'GRATIS <span style="color:#27ae60; font-size:0.8em;">✓</span>';
            }
        }

        // Cambiar cantidad de un item
        function cambiarCantidad(id, cambio) {
            const item = carrito.find(item => item.id === id);
            if (item) {
                item.cantidad += cambio;
                if (item.cantidad < 1) item.cantidad = 1;
                if (item.cantidad > 99) item.cantidad = 99;
                
                guardarCarrito();
                actualizarVistaCarrito();
                mostrarAlerta('Cantidad actualizada', 'success');
            }
        }

        // Actualizar cantidad desde input
        function actualizarCantidad(id, nuevaCantidad) {
            const cantidad = parseInt(nuevaCantidad);
            if (isNaN(cantidad) || cantidad < 1) return;

            const item = carrito.find(item => item.id === id);
            if (item) {
                item.cantidad = Math.min(cantidad, 99);
                guardarCarrito();
                actualizarVistaCarrito();
            }
        }

        // Remover item del carrito
        function removerItem(id) {
            if (confirm('¿Estás seguro de que quieres eliminar este producto del carrito?')) {
                carrito = carrito.filter(item => item.id !== id);
                guardarCarrito();
                actualizarVistaCarrito();
                mostrarAlerta('Producto eliminado del carrito', 'success');
            }
        }

        // Continuar comprando
        function continueShopping() {
            window.location.href = 'refacciones.php';
        }

        // Proceder al pago
        function proceedToCheckout() {
            if (carrito.length === 0) {
                mostrarAlerta('El carrito está vacío', 'info');
                return;
            }

            const total = carrito.reduce((sum, item) => sum + (item.precio * item.cantidad), 0);
            const iva = total * 0.16;
            const shipping = total > 1000 ? 0 : 150;
            const totalFinal = total + iva + shipping;

            const confirmacion = confirm(
                `¿Confirmar pedido?\n\n` +
                `Productos: ${carrito.length}\n` +
                `Subtotal: $${total.toFixed(2)} MXN\n` +
                `IVA: $${iva.toFixed(2)} MXN\n` +
                `Envío: ${shipping === 0 ? 'GRATIS' : '$' + shipping.toFixed(2) + ' MXN'}\n` +
                `Total: $${totalFinal.toFixed(2)} MXN\n\n` +
                `¿Deseas proceder con el pago?`
            );

            if (confirmacion) {
                // Simular proceso de pago
                mostrarAlerta('¡Pedido confirmado! Redirigiendo al pago...', 'success');
                
                setTimeout(() => {
                    // Aquí normalmente redirigirías a una pasarela de pago
                    alert('¡Gracias por tu compra en El Talachas!\n\nTu pedido ha sido procesado exitosamente. Nos pondremos en contacto contigo para coordinar la entrega.');
                    
                    // Limpiar carrito después de la compra
                    carrito = [];
                    guardarCarrito();
                    actualizarVistaCarrito();
                }, 2000);
            }
        }

        // Guardar carrito en localStorage
        function guardarCarrito() {
            localStorage.setItem('carritoElTalachas', JSON.stringify(carrito));
        }

        // Mostrar alertas
        function mostrarAlerta(mensaje, tipo) {
            const alertDiv = document.getElementById('alertMessage');
            alertDiv.textContent = mensaje;
            alertDiv.className = `alert alert-${tipo}`;
            alertDiv.style.display = 'block';

            setTimeout(() => {
                alertDiv.style.display = 'none';
            }, 3000);
        }

        // Vaciar carrito completamente
        function vaciarCarrito() {
            if (carrito.length === 0) return;
            
            if (confirm('¿Estás seguro de que quieres vaciar completamente el carrito?')) {
                carrito = [];
                guardarCarrito();
                actualizarVistaCarrito();
                mostrarAlerta('Carrito vaciado', 'success');
            }
        }
    </script>
</body>
</html>
