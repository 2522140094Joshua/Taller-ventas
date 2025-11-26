<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taller Mecánico El Talachas</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            min-height: 100vh;
            color: white;
        }

        /* Navbar */
        .navbar {
            background-color: rgba(0,0,0,0.3);
            padding: 20px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            backdrop-filter: blur(10px);
        }

        .logo {
            font-size: 1.8em;
            font-weight: bold;
            color: #ffffffff;
        }

        .nav-links {
            display: flex;
            gap: 30px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #e74c3c;
        }

        /* Hero Section */
        .hero {
            text-align: center;
            padding: 100px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .hero h1 {
            font-size: 4em;
            margin-bottom: 20px;
            animation: fadeInDown 1s;
        }

        .hero .subtitle {
            font-size: 1.5em;
            color: #ecf0f1;
            margin-bottom: 40px;
            animation: fadeInUp 1s;
        }

        .hero-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
            animation: fadeIn 1.5s;
        }

        .btn {
            padding: 15px 40px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.1em;
            transition: all 0.3s;
            display: inline-block;
        }

        .btn-primary {
            background-color: #e74c3c;
            color: white;
        }

        .btn-primary:hover {
            background-color: #c0392b;
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(231, 76, 60, 0.4);
        }

        .btn-secondary {
            background-color: transparent;
            color: white;
            border: 2px solid white;
        }

        .btn-secondary:hover {
            background-color: white;
            color: #2c3e50;
            transform: translateY(-3px);
        }

        /* Services Preview */
        .services-section {
            background-color: rgba(246, 246, 246, 0.05);
            padding: 80px 20px;
            backdrop-filter: blur(10px);
        }

        .services-section h2 {
            text-align: center;
            font-size: 2.5em;
            margin-bottom: 50px;
        }

        .services-grid {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .service-card {
            background: rgba(255,255,255,0.1);
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            transition: all 0.3s;
            border: 2px solid transparent;
        }

        .service-card:hover {
            transform: translateY(-10px);
            border-color: #e74c3c;
            background: rgba(255,255,255,0.15);
        }

        .service-icon {
            font-size: 3em;
            margin-bottom: 20px;
        }

        .service-card h3 {
            font-size: 1.5em;
            margin-bottom: 15px;
            color: #ff0000ff; /* cambio de color de letras*/
        }

        .service-card p {
            color: #ecf0f1;
            line-height: 1.6;
        }

        /* Footer */
        .footer {
            background-color: rgba(0,0,0,0.3);
            padding: 40px 20px;
            text-align: center;
            margin-top: 80px;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            text-align: left;
        }

        .footer-section h3 {
            color: #e74c3c;
            margin-bottom: 15px;
        }

        .footer-section p {
            color: #ecf0f1;
            line-height: 1.8;
        }

        /* Animations */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar {
                padding: 15px 20px;
                flex-direction: column;
                gap: 20px;
            }

            .hero h1 {
                font-size: 2.5em;
            }

            .hero .subtitle {
                font-size: 1.2em;
            }

            .hero-buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                max-width: 300px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">El Talachas</div>
        <div class="nav-links">
            <a href="#inicio">Inicio</a>
            <a href="#servicios">Servicios</a>
            <a href="#contacto">Contacto</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="inicio">
        <h1>Taller Mecánico El Talachas</h1>
        <p class="subtitle">Tu aliado de confianza para el cuidado de tu vehículo</p>
        <div class="hero-buttons">
            <a href="{{ route('servicios.index') }}" class="btn btn-primary">Ver Nuestros Servicios</a>
            <a href="#contacto" class="btn btn-secondary">Contáctanos</a>
        </div>
    </section>

    <!-- Services Preview -->
    <section class="services-section" id="servicios">
        <h2>Nuestros Servicios</h2>
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">🔧</div>
                <h3>Reparación de Motor</h3>
                <p>Diagnóstico y reparación completa de motores con tecnología de punta.</p>
            </div>

            <div class="service-card">
                <div class="service-icon">🛑</div>
                <h3>Sistema de Frenos</h3>
                <p>Revisión y reparación completa para garantizar tu seguridad.</p>
            </div>

            <div class="service-card">
                <div class="service-icon">🚗</div>
                <h3>Suspensión</h3>
                <p>Alineación, balanceo y reparación de suspensión profesional.</p>
            </div>

            <div class="service-card">
                <div class="service-icon">⚙️</div>
                <h3>Transmisión</h3>
                <p>Reparación de cajas manuales y automáticas con garantía.</p>
            </div>

            <div class="service-card">
                <div class="service-icon">🔌</div>
                <h3>Sistema Eléctrico</h3>
                <p>Diagnóstico y reparación de sistemas eléctricos automotrices.</p>
            </div>

            <div class="service-card">
                <div class="service-icon">💻</div>
                <h3>Diagnóstico Computarizado</h3>
                <p>Escaneo completo con equipos de última generación.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer" id="contacto">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Sobre Nosotros</h3>
                <p>Taller mecánico con 5 años de experiencia brindando servicios de calidad.</p>
            </div>

            <div class="footer-section">
                <h3>Contacto</h3>
                <p>📍 Dirección: Universidad tecnología de Tecámac</p>
                <p>📞 Teléfono: 5612345678</p>
                <p>📧 Email: talachas_taller@gmail.com</p>
            </div>

            <div class="footer-section">
                <h3>Horarios</h3>
                <p>Lunes a Viernes: 8:00 AM - 6:00 PM</p>
                <p>Sábados: 9:00 AM - 2:00 PM</p>
                <p>Domingos: Cerrado</p>
            </div>
        </div>
        <p style="margin-top: 30px; color: #95a5a6;">© 2025 Taller Mecánico El Talachas. Todos los derechos reservados.</p>
    </footer>

    <script>
        // Smooth scroll para los enlaces del navbar
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>