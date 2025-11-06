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
            color: #7f8c8d;
            margin-top: 5px;
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
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
            border-left: 5px solid #e74c3c;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .service-title {
            color: #2c3e50;
            font-size: 1.4em;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .service-description {
            color: #7f8c8d;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .service-link {
            display: inline-block;
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .service-link:hover {
            background-color: #2980b9;
        }

        .icon {
            font-size: 2em;
            margin-bottom: 15px;
            color: #e74c3c;
        }

        @media (max-width: 768px) {
            .services-container {
                grid-template-columns: 1fr;
                margin: 20px auto;
            }
            
            .title {
                font-size: 2em;
            }
            
            .back-button {
                position: relative;
                left: 0;
                top: 0;
                transform: none;
                margin-bottom: 10px;
                display: inline-block;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <a href="index.php" class="back-button">← Regresar</a>
        <h1 class="title">Servicios</h1>
        <p class="subtitle">Taller Mecánico El Talachas</p>
    </header>

    <div class="services-container">
        <!-- Servicio 1: Reparación de Motor -->
        <div class="service-card" onclick="window.location.href='servicio-motor.php'">
            <div class="icon">🔧</div>
            <h3 class="service-title">Reparación de Motor</h3>
            <p class="service-description">
                Diagnóstico y reparación completa de motores. Desde ajustes básicos hasta reconstrucciones completas. 
                Trabajamos con todo tipo de motores: gasolina, diésel e híbridos.
            </p>
            <a href="servicio-motor.php" class="service-link">Más información</a>
        </div>

        <!-- Servicio 2: Frenos -->
        <div class="service-card" onclick="window.location.href='servicio-frenos.php'">
            <div class="icon">🛑</div>
            <h3 class="service-title">Sistema de Frenos</h3>
            <p class="service-description">
                Revisión y reparación completa del sistema de frenos. Cambio de pastillas, discos, tambores y líquido de frenos. 
                Garantizamos tu seguridad en la carretera.
            </p>
            <a href="servicio-frenos.php" class="service-link">Más información</a>
        </div>

        <!-- Servicio 3: Suspensión -->
        <div class="service-card" onclick="window.location.href='servicio-suspension.php'">
            <div class="icon">🚗</div>
            <h3 class="service-title">Suspensión y Dirección</h3>
            <p class="service-description">
                Reparación de amortiguadores, muelles, rótulas y terminales de dirección. 
                Alineación y balanceo profesional para un manejo suave y seguro.
            </p>
            <a href="servicio-suspension.php" class="service-link">Más información</a>
        </div>

        <!-- Servicio 4: Transmisión -->
        <div class="service-card" onclick="window.location.href='servicio-transmision.php'">
            <div class="icon">⚙️</div>
            <h3 class="service-title">Transmisión</h3>
            <p class="service-description">
                Reparación de cajas de cambios manuales y automáticas. Cambio de embrague, reparación de diferenciales 
                y servicio completo del sistema de transmisión.
            </p>
            <a href="servicio-transmision.php" class="service-link">Más información</a>
        </div>

        <!-- Servicio 5: Electricidad -->
        <div class="service-card" onclick="window.location.href='servicio-electrico.php'">
            <div class="icon">🔌</div>
            <h3 class="service-title">Sistema Eléctrico</h3>
            <p class="service-description">
                Diagnóstico y reparación de problemas eléctricos. Batería, alternador, motor de arranque, 
                sistema de iluminación y cableado en general.
            </p>
            <a href="servicio-electrico.php" class="service-link">Más información</a>
        </div>

        <!-- Servicio 6: Mantenimiento -->
        <div class="service-card" onclick="window.location.href='servicio-mantenimiento.php'">
            <div class="icon">🛠️</div>
            <h3 class="service-title">Mantenimiento Preventivo</h3>
            <p class="service-description">
                Cambio de aceite, filtros, bujías y líquidos. Revisiones periódicas para mantener 
                tu vehículo en óptimas condiciones y prevenir averías costosas.
            </p>
            <a href="servicio-mantenimiento.php" class="service-link">Más información</a>
        </div>

        <!-- Servicio 7: Aire Acondicionado -->
        <div class="service-card" onclick="window.location.href='servicio-aire.php'">
            <div class="icon">❄️</div>
            <h3 class="service-title">Aire Acondicionado</h3>
            <p class="service-description">
                Recarga de gas, reparación de compresores, limpieza de conductos y mantenimiento 
                completo del sistema de climatización de tu vehículo.
            </p>
            <a href="servicio-aire.php" class="service-link">Más información</a>
        </div>

        <!-- Servicio 8: Diagnóstico Computarizado -->
        <div class="service-card" onclick="window.location.href='servicio-diagnostico.php'">
            <div class="icon">💻</div>
            <h3 class="service-title">Diagnóstico Computarizado</h3>
            <p class="service-description">
                Escaneo completo con equipos de última generación. Identificación precisa de fallas 
                mediante lectura de códigos y parámetros en tiempo real.
            </p>
            <a href="servicio-diagnostico.php" class="service-link">Más información</a>
        </div>
    </div>

    <script>
        // JavaScript para mejorar la interactividad
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.service-card');
            
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        });
    </script>
</body>
</html>
