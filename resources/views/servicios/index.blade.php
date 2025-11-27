<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios - El Talachas</title>
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

        .services-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
        }

        .service-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
            border-left: 6px solid #27ae60;
            border-top: 2px solid #1e3c72;
        }

        .service-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
            background: white;
        }

        .service-title {
            color: #1e3c72;
            font-size: 1.5em;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .service-description {
            color: #2c3e50;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .service-features {
            background: linear-gradient(135deg, #e8f5e8 0%, #d4efdf 100%);
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
            border: 1px solid #27ae60;
        }

        .service-features ul {
            list-style: none;
            padding-left: 0;
        }

        .service-features li {
            padding: 8px 0;
            color: #1e3c72;
            font-weight: 500;
        }

        .service-features li:before {
            content: "✓ ";
            color: #27ae60;
            font-weight: bold;
            margin-right: 8px;
        }

        .icon {
            font-size: 3em;
            margin-bottom: 20px;
            text-align: center;
            color: #1e3c72;
        }

        .price {
            color: #27ae60;
            font-weight: bold;
            font-size: 1.3em;
            text-align: right;
            margin-top: 15px;
        }

        .contact-info {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            padding: 15px;
            border-radius: 8px;
            margin: 15px 0;
            text-align: center;
            border: 2px solid #27ae60;
        }

        .contact-info p {
            margin: 0;
            font-weight: bold;
        }

        .buttons-container {
            display: flex;
            gap: 12px;
            margin-top: 20px;
        }

        .contact-btn {
            flex: 1;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            text-align: center;
            cursor: pointer;
        }

        .contact-btn:hover {
            background: linear-gradient(135deg, #27ae60 0%, #219a52 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(39, 174, 96, 0.4);
        }

        .cart-btn {
            flex: 1;
            background: linear-gradient(135deg, #27ae60 0%, #219a52 100%);
            color: white;
            border: 2px solid #1e3c72;
            padding: 12px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .cart-btn:hover {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(30, 60, 114, 0.4);
        }

        .cart-btn:active {
            transform: translateY(0);
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
            background: linear-gradient(135deg, #95a5a6 0%, #7f8c8d 100%);
            color: white;
        }

        .modal-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        @media (max-width: 768px) {
            .services-container {
                grid-template-columns: 1fr;
                margin: 20px auto;
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
                display: inline-block;
            }

            .buttons-container {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <a href="javascript:history.back()" class="back-button">← Regresar</a>
        <h1 class="title">Servicios</h1>
        <p class="subtitle">Taller Mecánico El Talachas - Confianza sobre ruedas</p>
    </header>

    <div class="services-container">
        <!-- Servicio 1 -->
        <div class="service-card">
            <div class="icon">🔧</div>
            <h3 class="service-title">Reparación de Motor</h3>
            <p class="service-description">
                Diagnóstico y reparación completa de motores de gasolina, diésel e híbridos. 
                Desde ajustes básicos hasta reconstrucciones completas.
            </p>
            <div class="service-features">
                <ul>
                    <li>Diagnóstico computarizado</li>
                    <li>Reparación de sobrecalentamiento</li>
                    <li>Cambio de correas y tensores</li>
                    <li>Ajuste de válvulas</li>
                </ul>
            </div>
            <div class="price">Desde $800 MXN</div>
            <div class="contact-info">
                <p>📞 Para más información contáctenos directamente</p>
            </div>
            <div class="buttons-container">
                <a href="tel:+525512345678" class="contact-btn">📞 Llamar Ahora</a>
                <button class="cart-btn" onclick="agregarServicioAlCarrito('Reparación de Motor', 800)">
                    🛒 Agregar al Carrito
                </button>
            </div>
        </div>

        <!-- Servicio 2 -->
        <div class="service-card">
            <div class="icon">🛑</div>
            <h3 class="service-title">Sistema de Frenos</h3>
            <p class="service-description">
                Revisión y reparación completa del sistema de frenos para garantizar 
                tu seguridad y la de tu familia en la carretera.
            </p>
            <div class="service-features">
                <ul>
                    <li>Cambio de pastillas y discos</li>
                    <li>Rectificado de tambores</li>
                    <li>Purga de sistema</li>
                    <li>Revisión de frenos de mano</li>
                </ul>
            </div>
            <div class="price">Desde $450 MXN</div>
            <div class="contact-info">
                <p>📞 Para más información contáctenos directamente</p>
            </div>
            <div class="buttons-container">
                <a href="tel:+525512345678" class="contact-btn">📞 Llamar Ahora</a>
                <button class="cart-btn" onclick="agregarServicioAlCarrito('Sistema de Frenos', 450)">
                    🛒 Agregar al Carrito
                </button>
            </div>
        </div>

        <!-- Servicio 3 -->
        <div class="service-card">
            <div class="icon">🚗</div>
            <h3 class="service-title">Suspensión y Dirección</h3>
            <p class="service-description">
                Reparación completa del sistema de suspensión para un manejo suave, 
                estable y seguro en todo tipo de caminos.
            </p>
            <div class="service-features">
                <ul>
                    <li>Alineación y balanceo</li>
                    <li>Cambio de amortiguadores</li>
                    <li>Reparación de rótulas</li>
                    <li>Revisión de terminales</li>
                </ul>
            </div>
            <div class="price">Desde $600 MXN</div>
            <div class="contact-info">
                <p>📞 Para más información contáctenos directamente</p>
            </div>
            <div class="buttons-container">
                <a href="tel:+525512345678" class="contact-btn">📞 Llamar Ahora</a>
                <button class="cart-btn" onclick="agregarServicioAlCarrito('Suspensión y Dirección', 600)">
                    🛒 Agregar al Carrito
                </button>
            </div>
        </div>

        <!-- Servicio 4 -->
        <div class="service-card">
            <div class="icon">⚙️</div>
            <h3 class="service-title">Transmisión</h3>
            <p class="service-description">
                Reparación especializada de cajas de cambios manuales y automáticas. 
                Recupera el rendimiento original de tu vehículo.
            </p>
            <div class="service-features">
                <ul>
                    <li>Cambio de embrague</li>
                    <li>Reparación de transmisión automática</li>
                    <li>Ajuste de cambios</li>
                    <li>Cambio de líquido de transmisión</li>
                </ul>
            </div>
            <div class="price">Desde $1,200 MXN</div>
            <div class="contact-info">
                <p>📞 Para más información contáctenos directamente</p>
            </div>
            <div class="buttons-container">
                <a href="tel:+525512345678" class="contact-btn">📞 Llamar Ahora</a>
                <button class="cart-btn" onclick="agregarServicioAlCarrito('Transmisión', 1200)">
                    🛒 Agregar al Carrito
                </button>
            </div>
        </div>

        <!-- Servicio 5 -->
        <div class="service-card">
            <div class="icon">🔌</div>
            <h3 class="service-title">Sistema Eléctrico</h3>
            <p class="service-description">
                Solucionamos problemas eléctricos con equipos de diagnóstico avanzado. 
                Desde fallas simples hasta circuitos complejos.
            </p>
            <div class="service-features">
                <ul>
                    <li>Prueba de batería y alternador</li>
                    <li>Reparación de motor de arranque</li>
                    <li>Sistema de iluminación</li>
                    <li>Cableado y fusibles</li>
                </ul>
            </div>
            <div class="price">Desde $350 MXN</div>
            <div class="contact-info">
                <p>📞 Para más información contáctenos directamente</p>
            </div>
            <div class="buttons-container">
                <a href="tel:+525512345678" class="contact-btn">📞 Llamar Ahora</a>
                <button class="cart-btn" onclick="agregarServicioAlCarrito('Sistema Eléctrico', 350)">
                    🛒 Agregar al Carrito
                </button>
            </div>
        </div>

        <!-- Servicio 6 -->
        <div class="service-card">
            <div class="icon">🛠️</div>
            <h3 class="service-title">Mantenimiento Preventivo</h3>
            <p class="service-description">
                Mantén tu vehículo en óptimas condiciones y previene averías costosas 
                con nuestro programa de mantenimiento regular.
            </p>
            <div class="service-features">
                <ul>
                    <li>Cambio de aceite y filtros</li>
                    <li>Revisión de fluidos</li>
                    <li>Limpieza de inyectores</li>
                    <li>Inspección general 50 puntos</li>
                </ul>
            </div>
            <div class="price">Desde $300 MXN</div>
            <div class="contact-info">
                <p>📞 Para más información contáctenos directamente</p>
            </div>
            <div class="buttons-container">
                <a href="tel:+525512345678" class="contact-btn">📞 Llamar Ahora</a>
                <button class="cart-btn" onclick="agregarServicioAlCarrito('Mantenimiento Preventivo', 300)">
                    🛒 Agregar al Carrito
                </button>
            </div>
        </div>
    </div>

    <!-- Modal de confirmación -->
    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <h3 class="modal-title">🛒 Servicio Agregado</h3>
            <p class="modal-message" id="modalMessage">
                El servicio ha sido agregado a tu carrito de compras.
            </p>
            <div class="modal-buttons">
                <button class="modal-btn cancel" onclick="cerrarModal()">Seguir Viendo</button>
                <button class="modal-btn confirm" onclick="irAlCarrito()">Ver Carrito</button>
            </div>
        </div>
    </div>

    <script>
        // Carrito de servicios
        let carritoServicios = JSON.parse(localStorage.getItem('carritoServiciosElTalachas')) || [];

        // Agregar servicio al carrito
        function agregarServicioAlCarrito(nombreServicio, precio) {
            const servicio = {
                id: Date.now(), // ID único
                nombre: nombreServicio,
                precio: precio,
                tipo: 'servicio',
                fecha: new Date().toLocaleDateString(),
                imagen: '🔧'
            };

            // Agregar al carrito
            carritoServicios.push(servicio);
            
            // Guardar en localStorage
            localStorage.setItem('carritoServiciosElTalachas', JSON.stringify(carritoServicios));
            
            // Mostrar modal de confirmación
            mostrarModal(nombreServicio, precio);
        }

        // Mostrar modal de confirmación
        function mostrarModal(nombre, precio) {
            const modal = document.getElementById('confirmationModal');
            const modalMessage = document.getElementById('modalMessage');
            
            modalMessage.innerHTML = `
                <strong>${nombre}</strong><br>
                Precio: $${precio} MXN<br><br>
                El servicio ha sido agregado a tu carrito de compras.
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

        // Cerrar modal al hacer clic fuera
        window.onclick = function(event) {
            const modal = document.getElementById('confirmationModal');
            if (event.target === modal) {
                cerrarModal();
            }
        }

        // Efectos hover en las tarjetas
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.service-card');
            
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-8px)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        });

        // Número de teléfono (puedes cambiarlo)
        function setTelephoneNumber() {
            const telefono = '+525512345678';
            const botonesLlamar = document.querySelectorAll('.contact-btn');
            botonesLlamar.forEach(boton => {
                boton.href = `tel:${telefono}`;
            });
        }

        // Inicializar
        document.addEventListener('DOMContentLoaded', function() {
            setTelephoneNumber();
        });
    </script>
</body>
</html>
