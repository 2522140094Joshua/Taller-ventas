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
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #1e6b52 100%);
            min-height: 100vh;
            color: #ffffff;
        }

        .header {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #27ae60 100%);
            color: white;
            padding: 25px 20px;
            position: relative;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            border-bottom: 3px solid #27ae60;
        }

        .back-button {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            background: #1e3c72;
            color: white;
            border: 2px solid #27ae60;
            padding: 12px 24px;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .back-button:hover {
            background: #27ae60;
            border-color: #ffffff;
            transform: translateY(-50%) scale(1.05);
        }

        .title {
            text-align: center;
            font-size: 2.8em;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .subtitle {
            text-align: center;
            color: #e8f5e8;
            margin-top: 8px;
            font-size: 1.1em;
        }

        .cart-icon {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            border: 2px solid #27ae60;
            padding: 12px 24px;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
        }

        .cart-icon:hover {
            background: linear-gradient(135deg, #27ae60 0%, #219a52 100%);
            transform: translateY(-50%) scale(1.05);
        }

        .cart-count {
            background: #e74c3c;
            color: white;
            border-radius: 50%;
            padding: 4px 10px;
            font-size: 0.9em;
            border: 2px solid white;
        }

        .container {
            max-width: 1400px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .parts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
        }

        .part-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
            border-left: 6px solid #27ae60;
            border-top: 2px solid #1e3c72;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .part-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.3);
            background: white;
        }

        .part-category {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            padding: 6px 15px;
            border-radius: 20px;
            font-size: 0.8em;
            display: inline-block;
            margin-bottom: 15px;
            font-weight: bold;
            align-self: flex-start;
        }

        .part-icon {
            font-size: 3.5em;
            text-align: center;
            margin: 15px 0;
            color: #1e3c72;
        }

        .part-name {
            color: #1e3c72;
            font-size: 1.3em;
            margin-bottom: 10px;
            font-weight: bold;
            text-align: center;
        }

        .part-brand {
            color: #2c3e50;
            font-size: 0.95em;
            margin-bottom: 12px;
            font-weight: 500;
            text-align: center;
        }

        .part-description {
            color: #34495e;
            line-height: 1.5;
            margin-bottom: 15px;
            font-size: 0.9em;
            text-align: center;
            flex-grow: 1;
        }

        .part-specs {
            background: linear-gradient(135deg, #e8f5e8 0%, #d4efdf 100%);
            padding: 15px;
            border-radius: 8px;
            margin: 10px 0;
            border: 1px solid #27ae60;
        }

        .part-specs ul {
            list-style: none;
            padding-left: 0;
            margin: 0;
        }

        .part-specs li {
            padding: 4px 0;
            color: #1e3c72;
            font-size: 0.85em;
        }

        .part-specs li:before {
            content: "• ";
            color: #27ae60;
            font-weight: bold;
        }

        .part-price {
            color: #27ae60;
            font-size: 1.6em;
            font-weight: bold;
            margin: 15px 0;
            text-align: center;
        }

        .part-stock {
            color: #27ae60;
            font-weight: bold;
            margin-bottom: 15px;
            text-align: center;
        }

        .stock-low {
            color: #e74c3c;
        }

        .add-to-cart-btn {
            width: 100%;
            background: linear-gradient(135deg, #27ae60 0%, #219a52 100%);
            color: white;
            border: 2px solid #1e3c72;
            padding: 14px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            font-size: 1em;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: auto;
        }

        .add-to-cart-btn:hover {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(30, 60, 114, 0.4);
        }

        .add-to-cart-btn:disabled {
            background: #95a5a6;
            border-color: #7f8c8d;
            cursor: not-allowed;
            transform: none;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin: 15px 0;
        }

        .quantity-btn {
            background: #1e3c72;
            color: white;
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
            background: #27ae60;
            transform: scale(1.1);
        }

        .quantity-input {
            width: 70px;
            text-align: center;
            padding: 8px;
            border: 2px solid #1e3c72;
            border-radius: 8px;
            font-weight: bold;
            color: #1e3c72;
        }

        /* Modal de confirmación */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.7);
        }

        .modal-content {
            background: white;
            margin: 15% auto;
            padding: 30px;
            border-radius: 15px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            border: 3px solid #27ae60;
            text-align: center;
        }

        .modal-title {
            color: #1e3c72;
            font-size: 1.5em;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .modal-message {
            color: #2c3e50;
            margin-bottom: 25px;
            line-height: 1.5;
        }

        .modal-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
        }

        .modal-btn {
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .modal-btn.confirm {
            background: linear-gradient(135deg, #27ae60 0%, #219a52 100%);
            color: white;
        }

        .modal-btn.cancel {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
        }

        .modal-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        @media (max-width: 768px) {
            .parts-grid {
                grid-template-columns: 1fr;
            }
            
            .title {
                font-size: 2.2em;
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
        <p class="subtitle">Taller Mecánico El Talachas - Productos de calidad garantizada</p>
        <button class="cart-icon" onclick="irAlCarrito()">
            🛒 Carrito <span class="cart-count" id="cartCount">0</span>
        </button>
    </header>

    <div class="container">
        <div class="parts-grid" id="partsGrid">
            <!-- Las refacciones se cargan dinámicamente -->
        </div>
    </div>

    <!-- Modal de confirmación -->
    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <h3 class="modal-title">✅ Producto Agregado</h3>
            <p class="modal-message" id="modalMessage">
                El producto ha sido agregado a tu carrito de compras.
            </p>
            <div class="modal-buttons">
                <button class="modal-btn cancel" onclick="cerrarModal()">Seguir Comprando</button>
                <button class="modal-btn confirm" onclick="irAlCarrito()">Ver Carrito</button>
            </div>
        </div>
    </div>

    <script>
        // Base de datos de refacciones ampliada
        const refacciones = [
            {
                id: 1,
                nombre: "Aceite Motor 5W-30 Sintético",
                marca: "Castrol",
                categoria: "Lubricantes",
                descripcion: "Aceite sintético de alto rendimiento para motor",
                precio: 220.00,
                stock: 25,
                imagen: "⛽",
                especificaciones: ["1 Litro", "Fully Synthetic", "API SP", "Protección avanzada"]
            },
            {
                id: 2,
                nombre: "Refrigerante Concentrado",
                marca: "Prestone",
                categoria: "Enfriamiento",
                descripcion: "Refrigerante concentrado para todo tipo de vehículos",
                precio: 180.00,
                stock: 18,
                imagen: "🧊",
                especificaciones: ["1 Galón", "Protección anticorrosiva", "-37°C a 129°C", "Mezcla 50/50"]
            },
            {
                id: 3,
                nombre: "Filtro de Aceite Premium",
                marca: "Fram",
                categoria: "Filtros",
                descripcion: "Filtro de aceite de alta eficiencia y durabilidad",
                precio: 150.00,
                stock: 30,
                imagen: "🛢️",
                especificaciones: ["Alta capacidad", "Anti-drenaje", "Media sintética", "Fácil instalación"]
            },
            {
                id: 4,
                nombre: "Pastillas de Freno Delanteras",
                marca: "Bosch",
                categoria: "Frenos",
                descripcion: "Juego de pastillas para frenos delanteros de alto rendimiento",
                precio: 450.00,
                stock: 12,
                imagen: "🛑",
                especificaciones: ["Bajo ruido", "Bajo polvo", "Durabilidad extendida", "Fácil instalación"]
            },
            {
                id: 5,
                nombre: "Bujías Iridium",
                marca: "NGK",
                categoria: "Encendido",
                descripcion: "Bujías de iridium para mejor combustión y eficiencia",
                precio: 320.00,
                stock: 20,
                imagen: "⚡",
                especificaciones: ["Electrodo de iridium", "Mayor potencia", "Menor consumo", "Fácil arranque"]
            },
            {
                id: 6,
                nombre: "Aceite Transmisión ATF",
                marca: "Valvoline",
                categoria: "Lubricantes",
                descripcion: "Aceite para transmisión automática de alta calidad",
                precio: 280.00,
                stock: 15,
                imagen: "⚙️",
                especificaciones: ["1 Litro", "Protección sellos", "Anti-desgaste", "Transmisión suave"]
            },
            {
                id: 7,
                nombre: "Líquido de Frenos DOT4",
                marca: "Bosch",
                categoria: "Frenos",
                descripcion: "Líquido de frenos de alto punto de ebullición",
                precio: 120.00,
                stock: 22,
                imagen: "💧",
                especificaciones: ["DOT4", "500ml", "Alto punto ebullición", "Protección contra corrosión"]
            },
            {
                id: 8,
                nombre: "Filtro de Aire",
                marca: "K&N",
                categoria: "Filtros",
                descripcion: "Filtro de aire de alto flujo lavable y reutilizable",
                precio: 650.00,
                stock: 8,
                imagen: "🌬️",
                especificaciones: ["Lavable", "Reutilizable", "Alto flujo", "Mayor potencia"]
            },
            {
                id: 9,
                nombre: "Aceite Dirección Hidráulica",
                marca: "Pentosin",
                categoria: "Lubricantes",
                descripcion: "Aceite especial para dirección hidráulica",
                precio: 280.00,
                stock: 14,
                imagen: "🚗",
                especificaciones: ["1 Litro", "Protección bombas", "Baja espuma", "Larga vida"]
            },
            {
                id: 10,
                nombre: "Batería 12V 60Ah",
                marca: "ACDelco",
                categoria: "Eléctrico",
                descripcion: "Batería mantenimiento libre de alta performance",
                precio: 1800.00,
                stock: 6,
                imagen: "🔋",
                especificaciones: ["60 Amperes", "Mantenimiento libre", "Arranque potente", "2 años garantía"]
            },
            {
                id: 11,
                nombre: "Aceite Motor 10W-40",
                marca: "Mobil",
                categoria: "Lubricantes",
                descripcion: "Aceite mineral para motores de alto kilometraje",
                precio: 190.00,
                stock: 20,
                imagen: "🛢️",
                especificaciones: ["1 Litro", "High Mileage", "Protección sellos", "Reducción consumo aceite"]
            },
            {
                id: 12,
                nombre: "Kit Correa Distribución",
                marca: "Gates",
                categoria: "Motor",
                descripcion: "Kit completo de correa de distribución con tensores",
                precio: 1200.00,
                stock: 5,
                imagen: "⛓️",
                especificaciones: ["Correa + tensores", "Alta durabilidad", "Instalación profesional", "Garantía"]
            }
        ];

        // Carrito de compras
        let carrito = JSON.parse(localStorage.getItem('carritoElTalachas')) || [];

        // Inicializar la página
        document.addEventListener('DOMContentLoaded', function() {
            renderRefacciones();
            actualizarContadorCarrito();
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
                    <div class="part-icon">${refaccion.imagen}</div>
                    <h3 class="part-name">${refaccion.nombre}</h3>
                    <p class="part-brand">Marca: ${refaccion.marca}</p>
                    <p class="part-description">${refaccion.descripcion}</p>
                    ${refaccion.especificaciones ? `
                    <div class="part-specs">
                        <ul>
                            ${refaccion.especificaciones.map(spec => `<li>${spec}</li>`).join('')}
                        </ul>
                    </div>
                    ` : ''}
                    <div class="part-price">$${refaccion.precio.toFixed(2)} MXN</div>
                    <div class="part-stock ${refaccion.stock < 5 ? 'stock-low' : ''}">
                        ${refaccion.stock < 5 ? '⚠️ ' : ''}Stock: ${refaccion.stock} unidades
                    </div>
                    <div class="quantity-controls">
                        <button class="quantity-btn" onclick="cambiarCantidad(${refaccion.id}, -1)">-</button>
                        <input type="number" id="qty-${refaccion.id}" value="1" min="1" max="${refaccion.stock}" class="quantity-input">
                        <button class="quantity-btn" onclick="cambiarCantidad(${refaccion.id}, 1)">+</button>
                    </div>
                    <button class="add-to-cart-btn" onclick="agregarAlCarrito(${refaccion.id})" 
                        ${refaccion.stock === 0 ? 'disabled' : ''}>
                        🛒 Agregar al Carrito
                    </button>
                `;
                grid.appendChild(card);
            });
        }

        // Cambiar cantidad
        function cambiarCantidad(id, cambio) {
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
                    imagen: refaccion.imagen,
                    marca: refaccion.marca
                });
            }

            // Resetear cantidad
            input.value = 1;

            // Actualizar interfaz
            actualizarContadorCarrito();
            guardarCarrito();
            
            // Mostrar modal de confirmación
            mostrarModal(refaccion.nombre, refaccion.precio, cantidad);
        }

        // Mostrar modal de confirmación
        function mostrarModal(nombre, precio, cantidad) {
            const modal = document.getElementById('confirmationModal');
            const modalMessage = document.getElementById('modalMessage');
            
            const total = precio * cantidad;
            modalMessage.innerHTML = `
                <strong>${nombre}</strong><br>
                Cantidad: ${cantidad}<br>
                Precio unitario: $${precio.toFixed(2)}<br>
                <strong>Total: $${total.toFixed(2)} MXN</strong><br><br>
                El producto ha sido agregado a tu carrito.
            `;
            
            modal.style.display = 'block';
        }

        // Cerrar modal
        function cerrarModal() {
            const modal = document.getElementById('confirmationModal');
            modal.style.display = 'none';
        }

        // Ir al carrito
        function irAlCarrito() {
            window.location.href = 'carrito.php';
        }

        // Actualizar contador del carrito
        function actualizarContadorCarrito() {
            const cartCount = document.getElementById('cartCount');
            const totalItems = carrito.reduce((sum, item) => sum + item.cantidad, 0);
            cartCount.textContent = totalItems;
        }

        // Guardar carrito en localStorage
        function guardarCarrito() {
            localStorage.setItem('carritoElTalachas', JSON.stringify(carrito));
        }

        // Cerrar modal al hacer clic fuera
        window.onclick = function(event) {
            const modal = document.getElementById('confirmationModal');
            if (event.target === modal) {
                cerrarModal();
            }
        }
    </script>
</body>
</html>
