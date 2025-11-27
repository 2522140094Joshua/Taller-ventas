<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aviso de Privacidad - El Talacha</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            font-family: 'Figtree', sans-serif;
        }
        
        .privacy-container {
            min-height: 100vh;
            background: linear-gradient(135deg, #fff7ed 0%, #ffedd5 100%);
            padding: 2rem 1rem;
        }
        
        .privacy-content {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 1rem;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            padding: 3rem;
        }
        
        .privacy-header {
            text-align: center;
            margin-bottom: 3rem;
            padding-bottom: 2rem;
            border-bottom: 3px solid #f97316;
        }
        
        .privacy-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: #9a3412;
            margin-bottom: 0.5rem;
        }
        
        .privacy-subtitle {
            font-size: 1.25rem;
            color: #ea580c;
        }
        
        .privacy-section {
            margin-bottom: 2.5rem;
        }
        
        .section-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #9a3412;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .section-title i {
            color: #f97316;
        }
        
        .privacy-text {
            color: #78716c;
            line-height: 1.8;
            margin-bottom: 1rem;
        }
        
        .privacy-list {
            list-style: none;
            padding-left: 0;
        }
        
        .privacy-list li {
            color: #78716c;
            padding: 0.75rem 0;
            padding-left: 2rem;
            position: relative;
            line-height: 1.6;
        }
        
        .privacy-list li:before {
            content: "✓";
            position: absolute;
            left: 0;
            color: #f97316;
            font-weight: bold;
            font-size: 1.2rem;
        }
        
        .data-types {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.5rem;
            margin-top: 1.5rem;
        }
        
        .data-type-card {
            background: linear-gradient(135deg, #fff7ed 0%, #ffedd5 100%);
            padding: 1.5rem;
            border-radius: 0.75rem;
            text-align: center;
            border: 2px solid #fed7aa;
            transition: transform 0.3s ease;
        }
        
        .data-type-card:hover {
            transform: translateY(-5px);
            border-color: #f97316;
        }
        
        .data-type-icon {
            width: 3rem;
            height: 3rem;
            background: #f97316;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.5rem;
        }
        
        .data-type-card strong {
            display: block;
            color: #9a3412;
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }
        
        .data-type-card p {
            color: #78716c;
            font-size: 0.9rem;
            margin: 0;
        }
        
        .highlight-box {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            padding: 2rem;
            border-radius: 0.75rem;
            border-left: 5px solid #f59e0b;
            margin: 2rem 0;
        }
        
        .highlight-box h3 {
            color: #92400e;
            font-size: 1.25rem;
            font-weight: 600;
        }
        
        .highlight-box p {
            color: #78350f;
            line-height: 1.6;
        }
        
        .contact-info {
            background: #fff7ed;
            padding: 1.5rem;
            border-radius: 0.75rem;
            margin-top: 1rem;
        }
        
        .contact-info h4 {
            color: #9a3412;
            font-weight: 600;
        }
        
        .contact-email {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: #f97316;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            text-decoration: none;
            font-weight: 600;
            transition: background 0.3s ease;
        }
        
        .contact-email:hover {
            background: #ea580c;
        }
        
        .footer-note {
            background: #fef2f2;
            padding: 1.5rem;
            border-radius: 0.75rem;
            border-left: 5px solid #ef4444;
            color: #7f1d1d;
            display: flex;
            align-items: start;
            gap: 1rem;
        }
        
        .footer-note i {
            color: #ef4444;
            font-size: 1.25rem;
            margin-top: 0.25rem;
        }
        
        @media (max-width: 768px) {
            .privacy-content {
                padding: 1.5rem;
            }
            
            .privacy-title {
                font-size: 2rem;
            }
            
            .data-types {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="privacy-container">
        <div class="privacy-content">
            <div class="privacy-header">
                <h1 class="privacy-title">Aviso de Privacidad</h1>
                <p class="privacy-subtitle">Sistema de Gestión de Taller Mecánico - El Talacha</p>
            </div>

            <div class="privacy-section">
                <h2 class="section-title">
                    <i class="fas fa-shield-alt"></i>
                    Información General
                </h2>
                <p class="privacy-text">
                    En cumplimiento con lo establecido por la <strong>Ley Federal de Protección de Datos Personales en Posesión de los Particulares (LFPDPPP)</strong>, informamos que los datos personales que usted proporcione serán tratados por El Talacha - Sistema de Gestión de Taller Mecánico con las siguientes finalidades:
                </p>
            </div>

            <div class="privacy-section">
                <h2 class="section-title">
                    <i class="fas fa-bullseye"></i>
                    Finalidades del Tratamiento
                </h2>
                <ul class="privacy-list">
                    <li>Registrar y gestionar ventas de productos y servicios del taller</li>
                    <li>Verificar su identidad como cliente y mantener historial de compras</li>
                    <li>Mantener contacto para fines comerciales, administrativos y de seguimiento</li>
                    <li>Gestionar facturación, cotizaciones y pagos relacionados con servicios</li>
                    <li>Proporcionar información sobre productos, promociones y servicios disponibles</li>
                    <li>Control de inventario y gestión de garantías</li>
                    <li>Envío de recordatorios de mantenimiento y servicios programados</li>
                </ul>
            </div>

            <div class="privacy-section">
                <h2 class="section-title">
                    <i class="fas fa-database"></i>
                    Datos Personales Recabados
                </h2>
                <div class="data-types">
                    <div class="data-type-card">
                        <div class="data-type-icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <strong>Información Personal</strong>
                        <p>Nombre completo, edad, género</p>
                    </div>
                    <div class="data-type-card">
                        <div class="data-type-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <strong>Información de Contacto</strong>
                        <p>Correo electrónico, teléfono, dirección</p>
                    </div>
                    <div class="data-type-card">
                        <div class="data-type-icon">
                            <i class="fas fa-id-card"></i>
                        </div>
                        <strong>Identificación Fiscal</strong>
                        <p>RFC, CURP para facturación</p>
                    </div>
                    <div class="data-type-card">
                        <div class="data-type-icon">
                            <i class="fas fa-car"></i>
                        </div>
                        <strong>Información del Vehículo</strong>
                        <p>Marca, modelo, placas (cuando aplique)</p>
                    </div>
                </div>
            </div>

            <div class="highlight-box">
                <h3 style="margin-bottom: 1rem;">
                    <i class="fas fa-lock"></i>
                    Protección de Datos
                </h3>
                <p style="margin: 0;">
                    Sus datos personales no serán compartidos con terceros sin su consentimiento explícito, salvo requerimiento legal. El Talacha implementa medidas de seguridad administrativas, técnicas y físicas para proteger sus datos personales contra daño, pérdida, alteración, destrucción o el uso, acceso o tratamiento no autorizados.
                </p>
            </div>

            <div class="privacy-section">
                <h2 class="section-title">
                    <i class="fas fa-gavel"></i>
                    Derechos ARCO
                </h2>
                <p class="privacy-text">
                    Usted tiene derecho a <strong>Acceder</strong>, <strong>Rectificar</strong>, <strong>Cancelar</strong> u <strong>Oponerse</strong> al tratamiento de sus datos personales (Derechos ARCO). Para ejercer cualquiera de estos derechos, deberá presentar la solicitud respectiva a través de los medios que ponemos a su disposición.
                </p>
                <div class="contact-info">
                    <h4 style="margin-bottom: 1rem; color: #9a3412;">
                        <i class="fas fa-envelope"></i>
                        Para ejercer estos derechos, contáctenos:
                    </h4>
                    <a href="mailto:mrsmind@hotmail.com" class="contact-email">
                        <i class="fas fa-envelope"></i>
                        mrsmind@hotmail.com
                    </a>
                </div>
            </div>

            <div class="privacy-section">
                <h2 class="section-title">
                    <i class="fas fa-cookie-bite"></i>
                    Uso de Cookies y Tecnologías de Rastreo
                </h2>
                <p class="privacy-text">
                    Le informamos que en nuestra página de internet utilizamos cookies, web beacons y otras tecnologías a través de las cuales es posible monitorear su comportamiento como usuario de internet, brindarle un mejor servicio y experiencia de usuario al navegar en nuestra página, así como ofrecerle nuevos productos y servicios basados en sus preferencias.
                </p>
            </div>

            <div class="footer-note">
                <i class="fas fa-info-circle"></i>
                <div>
                    <strong>Nota importante:</strong> Este aviso de privacidad puede ser modificado en cualquier momento para adaptarlo a novedades legislativas o cambios en nuestras prácticas sobre privacidad. Las modificaciones estarán disponibles en esta misma sección del sitio web. Le recomendamos revisar periódicamente este aviso.
                </div>
            </div>

            <div style="text-align: center; margin-top: 3rem; padding-top: 2rem; border-top: 2px solid #fed7aa;">
                <p style="color: #78716c; margin-bottom: 1rem;">
                    <strong>Fecha de última actualización:</strong> Noviembre 2024
                </p>
                <a href="/" style="display: inline-flex; align-items: center; gap: 0.5rem; color: #f97316; text-decoration: none; font-weight: 600;">
                    <i class="fas fa-arrow-left"></i>
                    Volver al inicio
                </a>
            </div>
        </div>
    </div>
</body>
</html>