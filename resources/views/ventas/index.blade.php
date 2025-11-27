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
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #1e6b52 100%);
            min-height: 100vh;
            color: #ffffff;
        }

        .header {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #27ae60 100%);
            color: white;
            padding: 30px 20px;
            position: relative;
            box-shadow: 0 6px 20px rgba(0,0,0,0.25);
            border-bottom: 4px solid #27ae60;
        }

        .back-button {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            background: #1e3c72;
            color: white;
            border: 2px solid #27ae60;
            padding: 14px 28px;
            border-radius: 10px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .back-button:hover {
            background: #27ae60;
            border-color: #ffffff;
            transform: translateY(-50%) scale(1.05);
        }

        .title {
            text-align: center;
            font-size: 3em;
            font-weight: bold;
            text-shadow: 3px 3px 6px rgba(0,0,0,0.4);
        }

        .subtitle {
            text-align: center;
            color: #e8f5e8;
            font-size: 1.2em;
            margin-top: 10px;
        }

        .container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 0 20px;
        }

        /* Estados del carrito */
        .cart-empty {
            text-align: center;
            padding: 80px 20px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            border: 3px solid #27ae60;
        }

        .cart-empty .icon {
            font-size: 5em;
            margin-bottom: 30px;
            color: #1e3c72;
        }

        .cart-empty h2 {
            color: #1e3c72;
            margin-bottom: 20px;
            font-size: 2em;
        }

        .cart-empty p {
            color: #2c3e50;
            margin-bottom: 40px;
            font-size: 1.2em;
        }

        .continue-shopping {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            border: 2px solid #27ae60;
            padding: 18px 35px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.2em;
            transition: all 0.3s ease;
            display: inline-block;
            margin: 0 10px;
        }

        .continue-shopping:hover {
            background: linear-gradient(135deg, #27ae60 0%, #219a52 100%);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(39, 174, 96, 0.4);
        }

        /* Carrito con items */
        .cart-with-items {
            display: none;
        }

        .cart-items {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            margin-bottom: 30px;
            overflow: hidden;
            border: 3px solid #27ae60;
        }

        .cart-header {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr 0.5fr;
            gap: 20px;
            padding: 25px;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            font-weight: bold;
            font-size: 1.1em;
        }

        .cart-item {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr 0.5fr;
            gap: 20px;
            padding: 25px;
            border-bottom: 3px solid #ecf0f1;
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
            gap: 20px;
        }

        .item-icon {
            font-size: 2.5em;
            width: 60px;
            text-align: center;
            color: #1e3c72;
        }

        .item-details h3 {
            color: #1e3c72;
            margin-bottom: 8px;
            font-size: 1.3em;
        }

        .item-details .item-type {
            background: linear-gradient(135deg, #27ae60 0%, #219a52 100%);
            color: white;
            padding: 4px 12px;
            border-radius: 15px;
            font-size: 0.8em;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 5px;
        }

        .item-details .item-type.refaccion {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
        }

        .item-details .item-code {
            color: #27ae60;
            font-size: 1em;
            font-weight: bold;
        }

        .item-price {
            color: #1e3c72;
            font-weight: bold;
            font-size: 1.2em;
        }

        .item-total {
            color: #27ae60;
            font-weight: bold;
            font-size: 1.3em;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .quantity-btn {
            background: #1e3c72;
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1em;
        }

        .quantity-btn:hover {
            background: #27ae60;
            transform: scale(1.1);
        }

        .quantity-input {
            width: 70px;
            text-align: center;
            padding: 10px;
            border: 2px solid #1e3c72;
            border-radius: 10px;
            font-weight: bold;
            color: #1e3c72;
            font-size: 1.1em;
        }

        .remove-btn {
            background: #e74c3c;
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1em;
        }

        .remove-btn:hover {
            background: #c0392b;
            transform: scale(1.1);
        }

        /* Resumen del carrito */
        .cart-summary {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            border: 3px solid #27ae60;
        }

        .summary-title {
            color: #1e3c72;
            font-size: 1.8em;
            margin-bottom: 25px;
            text-align: center;
            border-bottom: 3px solid #27ae60;
            padding-bottom: 20px;
            font-weight: bold;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            padding: 12px 0;
            font-size: 1.1em;
        }

        .summary-label {
            color: #1e3c72;
            font-weight: 500;
        }

        .summary-value {
            color: #1e3c72;
            font-weight: bold;
        }

        .summary-total {
            border-top: 3px solid #27ae60;
            padding-top: 20px;
            margin-top: 15px;
            font-size: 1.5em;
        }

        .total-label {
            color: #1e3c72;
        }

        .total-value {
            color: #27ae60;
            font-weight: bold;
        }

        .checkout-actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 30px;
        }

        .continue-btn {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            border: 2px solid #27ae60;
            padding: 18px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: bold;
            font-size: 1.2em;
            transition: all 0.3s ease;
        }

        .continue-btn:hover {
            background: linear-gradient(135deg, #34495e 0%, #2c3e50 100%);
            transform: translateY(-3px);
        }

        .checkout-btn {
            background: linear-gradient(135deg, #27ae60 0%, #219a52 100%);
            color: white;
            border: 2px solid #1e3c72;
            padding: 18px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: bold;
            font-size: 1.2em;
            transition: all 0.3s ease;
        }

        .checkout-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(39, 174, 96, 0.4);
        }

        .checkout-btn:disabled {
            background: #95a5a6;
            border-color: #7f8c8d;
            cursor: not-allowed;
            transform: none;
        }

        /* Mensajes de alerta */
        .alert {
            padding: 20px 25px;
            border-radius: 10px;
            margin-bottom: 25px;
            font-weight: bold;
            font-size: 1.1em;
            border: 2px solid;
        }

        .alert-success {
            background: #d5f4e6;
            color: #27ae60;
            border-color: #27ae60;
        }

        .alert-info {
            background: #d6eaf8;
            color: #3498db;
            border-color: #3498db;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                margin: 30px auto;
                padding: 0 15px;
            }

            .title {
                font-size: 2.5em;
            }

            .back-button {
                position: relative;
                left: 0;
                top: 0;
                transform: none;
                margin-bottom: 20px;
                display: inline-flex;
            }

            .cart-header {
                grid-template-columns: 1fr 1fr;
                gap: 15px;
            }

            .cart-item {
                grid-template-columns: 1fr 1fr;
                gap: 15px;
                padding: 20px;
            }

            .item-info {
                grid-column: 1 / -1;
            }

            .checkout-actions {
                grid-template-columns: 1fr;
            }

            .cart-empty .buttons-container {
                display: flex;
                flex-direction: column;
                gap: 15px;
            }

            .continue-shopping {
                margin: 0;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <a href="javascript:history.back()" class="back-button">← Volver</a>
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
            <p>Aún no has agregado productos o servicios al carrito.</p>
            <div class="buttons-container">
                <a href="refacciones.php" class="continue-shopping">
                    🛍️ Comprar Refacciones
                </a>
                <a href="servicios.php" class="continue-shopping">
                    🔧 Solicitar Servicios
                </a>
            </div>
        </div>

        <!-- Carrito con Items -->
        <div class="cart-with-items" id="cartWithItems">
            <!-- Lista de Items -->
            <div class="cart-items">
                <div class="cart-header">
                    <div class="header-product">Producto/Servicio</div>
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
                        💳 Proceder al Pago
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Combinar carritos de refacciones y servicios
        let carritoRefacciones = JSON.parse(localStorage.getItem('carritoElTalachas')) || [];
        let carritoServicios = JSON.parse(localStorage.getItem('carritoServiciosElTalachas')) || [];
        
        // Carrito combinado
        let carritoCombinado = [...carritoRefacciones, ...carritoServicios];

        // Inicializar la página
        document.addEventListener('DOMContentLoaded', function() {
            actualizarVistaCarrito();
        });

        // Actualizar vista del carrito
        function actualizarVistaCarrito() {
            const cartEmpty = document.getElementById('cartEmpty');
            const cartWithItems = document.getElementById('cartWithItems');

            // Actualizar carrito combinado
            carritoRefacciones = JSON.parse(localStorage.getItem('carritoElTalachas')) || [];
            carritoServicios = JSON.parse(localStorage.getItem('carritoServiciosElTalachas')) || [];
            carritoCombinado = [...carritoRefacciones, ...carritoServicios];

            if (carritoCombinado.length === 0) {
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

            carritoCombinado.forEach(item => {
                const itemTotal = item.precio * (item.cantidad || 1);
                const tipo = item.tipo === 'servicio' ? 'Servicio' : 'Refacción';
                const tipoClase = item.tipo === 'servicio' ? 'servicio' : 'refaccion';
                
                const cartItem = document.createElement('div');
                cartItem.className = 'cart-item';
                cartItem.innerHTML = `
                    <div class="item-info">
                        <div class="item-icon">${item.imagen || '🔧'}</div>
                        <div class="item-details">
                            <span class="item-type ${tipoClase}">${tipo}</span>
                            <h3>${item.nombre}</h3>
                            ${item.marca ? `<div class="item-code">Marca: ${item.marca}</div>` : ''}
                            ${item.fecha ? `<div class="item-code">Fecha: ${item.fecha}</div>` : ''}
                        </div>
                    </div>
                    <div class="item-price">$${item.precio.toFixed(2)}</div>
                    <div class="quantity-controls">
                        ${item.tipo === 'servicio' ? 
                            `<span style="color: #1e3c72; font-weight: bold;">1</span>` :
                            `
                            <button class="quantity-btn" onclick="cambiarCantidad(${item.id}, -1)">-</button>
                            <input type="number" class="quantity-input" value="${item.cantidad}" 
                                   min="1" max="99" onchange="actualizarCantidad(${item.id}, this.value)">
                            <button class="quantity-btn" onclick="cambiarCantidad(${item.id}, 1)">+</button>
                            `
                        }
                    </div>
                    <div class="item-total">$${itemTotal.toFixed(2)}</div>
                    <button class="remove-btn" onclick="removerItem(${item.id}, '${item.tipo}')">🗑️</button>
                `;
                cartItemsList.appendChild(cartItem);
            });
        }

        // Actualizar resumen de compra
        function actualizarResumen() {
            const subtotal = carritoCombinado.reduce((sum, item) => {
                return sum + (item.precio * (item.cantidad || 1));
            }, 0);
            
            const iva = subtotal * 0.16;
            
            // Envío gratis para servicios, para refacciones gratis sobre $1000
            const tieneServicios = carritoCombinado.some(item => item.tipo === 'servicio');
            const soloRefacciones = carritoCombinado.every(item => !item.tipo || item.tipo !== 'servicio');
            
            let shipping = 0;
            if (soloRefacciones && subtotal < 1000) {
                shipping = 150;
            }

            const total = subtotal + iva + shipping;

            document.getElementById('subtotal').textContent = `$${subtotal.toFixed(2)} MXN`;
            document.getElementById('iva').textContent = `$${iva.toFixed(2)} MXN`;
            
            if (shipping === 0) {
                document.getElementById('shipping').innerHTML = 'GRATIS <span style="color:#27ae60; font-size:0.8em;">✓</span>';
            } else {
                document.getElementById('shipping').textContent = `$${shipping.toFixed(2)} MXN`;
            }
            
            document.getElementById('total').textContent = `$${total.toFixed(2)} MXN`;

            // Mostrar mensaje de envío gratis
            if (shipping === 0 && soloRefacciones) {
                document.getElementById('shipping').innerHTML = 'GRATIS <span style="color:#27ae60; font-size:0.8em;">✓</span>';
            }
        }

        // Cambiar cantidad de un item (solo refacciones)
        function cambiarCantidad(id, cambio) {
            const item = carritoRefacciones.find(item => item.id === id);
            if (item) {
                item.cantidad += cambio;
                if (item.cantidad < 1) item.cantidad = 1;
                if (item.cantidad > 99) item.cantidad = 99;
                
                guardarCarritos();
                actualizarVistaCarrito();
                mostrarAlerta('Cantidad actualizada', 'success');
            }
        }

        // Actualizar cantidad desde input (solo refacciones)
        function actualizarCantidad(id, nuevaCantidad) {
            const cantidad = parseInt(nuevaCantidad);
            if (isNaN(cantidad) || cantidad < 1) return;

            const item = carritoRefacciones.find(item => item.id === id);
            if (item) {
                item.cantidad = Math.min(cantidad, 99);
                guardarCarritos();
                actualizarVistaCarrito();
            }
        }

        // Remover item del carrito
        function removerItem(id, tipo) {
            if (confirm('¿Estás seguro de que quieres eliminar este item del carrito?')) {
                if (tipo === 'servicio') {
                    carritoServicios = carritoServicios.filter(item => item.id !== id);
                } else {
                    carritoRefacciones = carritoRefacciones.filter(item => item.id !== id);
                }
                
                guardarCarritos();
                actualizarVistaCarrito();
                mostrarAlerta('Item eliminado del carrito', 'success');
            }
        }

        // Continuar comprando
        function continueShopping() {
            window.location.href = 'refacciones.php';
        }

        // Proceder al pago
        function proceedToCheckout() {
            if (carritoCombinado.length === 0) {
                mostrarAlerta('El carrito está vacío', 'info');
                return;
            }

            const total = carritoCombinado.reduce((sum, item) => sum + (item.precio * (item.cantidad || 1)), 0);
            const iva = total * 0.16;
            const tieneServicios = carritoCombinado.some(item => item.tipo === 'servicio');
            const soloRefacciones = carritoCombinado.every(item => !item.tipo || item.tipo !== 'servicio');
            
            let shipping = 0;
            if (soloRefacciones && total < 1000) {
                shipping = 150;
            }

            const totalFinal = total + iva + shipping;

            const confirmacion = confirm(
                `¿Confirmar pedido?\n\n` +
                `Items en carrito: ${carritoCombinado.length}\n` +
                `Subtotal: $${total.toFixed(2)} MXN\n` +
                `IVA: $${iva.toFixed(2)} MXN\n` +
                `Envío: ${shipping === 0 ? 'GRATIS' : '$' + shipping.toFixed(2) + ' MXN'}\n` +
                `Total: $${totalFinal.toFixed(2)} MXN\n\n` +
                `¿Deseas proceder con el pago?`
            );

            if (confirmacion) {
                // Simular proceso de pago
                mostrarAlerta('¡Pedido confirmado! Procesando tu solicitud...', 'success');
                
                setTimeout(() => {
                    alert('¡Gracias por tu confianza en El Talachas!\n\n' +
                          'Tu pedido ha sido registrado exitosamente. ' +
                          (tieneServicios ? 
                           'Nos pondremos en contacto contigo para agendar tu servicio.' :
                           'Nos pondremos en contacto para coordinar la entrega de tus refacciones.'));
                    
                    // Limpiar carritos después de la compra
                    carritoRefacciones = [];
                    carritoServicios = [];
                    guardarCarritos();
                    actualizarVistaCarrito();
                }, 2000);
            }
        }

        // Guardar carritos en localStorage
        function guardarCarritos() {
            localStorage.setItem('carritoElTalachas', JSON.stringify(carritoRefacciones));
            localStorage.setItem('carritoServiciosElTalachas', JSON.stringify(carritoServicios));
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
            if (carritoCombinado.length === 0) return;
            
            if (confirm('¿Estás seguro de que quieres vaciar completamente el carrito?')) {
                carritoRefacciones = [];
                carritoServicios = [];
                guardarCarritos();
                actualizarVistaCarrito();
                mostrarAlerta('Carrito vaciado', 'success');
            }
        }
    </script>
</body>
</html>
