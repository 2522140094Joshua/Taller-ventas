<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Talachas')</title>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 260px;
            height: 100vh;
            background: linear-gradient(180deg, #2c3e50 0%, #34495e 100%);
            color: white;
            overflow-y: auto;
            z-index: 1000;
            box-shadow: 4px 0 15px rgba(0,0,0,0.2);
        }

        .sidebar-header {
            padding: 25px 20px;
            background: rgba(0,0,0,0.2);
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-header h2 {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 1.3em;
            font-weight: 700;
        }

        .sidebar-header i {
            font-size: 1.2em;
        }

        .sidebar-section {
            padding: 20px 0;
        }

        .sidebar-section-title {
            padding: 0 20px 10px;
            font-size: 0.75em;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: rgba(255,255,255,0.5);
            font-weight: 600;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin: 5px 10px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 15px;
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s;
            font-weight: 500;
        }

        .sidebar-menu a:hover {
            background: rgba(255,255,255,0.1);
            color: white;
            transform: translateX(5px);
        }

        .sidebar-menu a.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .sidebar-menu i {
            font-size: 1.2em;
            width: 24px;
            text-align: center;
        }

        /* MAIN CONTENT */
        .main-wrapper {
            margin-left: 260px;
            min-height: 100vh;
            padding: 20px;
        }

        .crud-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Header Global */
        .crud-header {
            background: white;
            border-radius: 15px;
            padding: 25px 35px;
            margin-bottom: 30px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .crud-header h1 {
            color: #2c3e50;
            font-size: 2em;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .crud-header-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.3em;
        }

        /* Content Area */
        .crud-content {
            background: white;
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            min-height: 400px;
        }

        /* Botones Globales */
        .btn {
            padding: 12px 25px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 0.95em;
        }

        .btn-primary {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(52, 152, 219, 0.6);
            color: white;
        }

        .btn-success {
            background: linear-gradient(135deg, #27ae60 0%, #229954 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(39, 174, 96, 0.4);
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(39, 174, 96, 0.6);
            color: white;
        }

        .btn-danger {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(231, 76, 60, 0.4);
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(231, 76, 60, 0.6);
            color: white;
        }

        .btn-warning {
            background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(243, 156, 18, 0.4);
        }

        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(243, 156, 18, 0.6);
            color: white;
        }

        .btn-secondary {
            background: #95a5a6;
            color: white;
        }

        .btn-secondary:hover {
            background: #7f8c8d;
            color: white;
        }

        /* Formularios */
        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: #2c3e50;
            font-size: 0.95em;
        }

        .form-group label i {
            margin-right: 8px;
            color: #667eea;
        }

        .required {
            color: #e74c3c;
            margin-left: 4px;
        }

        .form-control {
            width: 100%;
            padding: 14px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 15px;
            transition: all 0.3s;
            font-family: inherit;
        }

        .form-control:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        .error {
            color: #e74c3c;
            font-size: 13px;
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .helper-text {
            font-size: 13px;
            color: #7f8c8d;
            margin-top: 6px;
        }

        /* Tablas */
        .table-responsive {
            overflow-x: auto;
            margin-top: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table thead {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .table th {
            padding: 15px;
            text-align: left;
            color: white;
            font-weight: 600;
            font-size: 0.9em;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .table td {
            padding: 15px;
            border-bottom: 1px solid #f0f0f0;
            color: #2c3e50;
        }

        .table tbody tr {
            transition: all 0.3s;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
            transform: scale(1.01);
        }

        /* Cards Grid */
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 25px;
            margin-top: 20px;
        }

        .card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            transition: all 0.3s;
            border-left: 4px solid #667eea;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        /* Alerts */
        .alert {
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border-left: 4px solid #28a745;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border-left: 4px solid #dc3545;
        }

        .alert-warning {
            background: #fff3cd;
            color: #856404;
            border-left: 4px solid #ffc107;
        }

        .alert-info {
            background: #d1ecf1;
            color: #0c5460;
            border-left: 4px solid #17a2b8;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-state i {
            font-size: 4em;
            color: #bdc3c7;
            margin-bottom: 20px;
        }

        .empty-state h3 {
            color: #7f8c8d;
            font-size: 1.5em;
            margin-bottom: 15px;
        }

        .empty-state p {
            color: #95a5a6;
            margin-bottom: 25px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-wrapper {
                margin-left: 0;
                padding: 10px;
            }

            .crud-header {
                flex-direction: column;
                text-align: center;
                padding: 20px;
            }

            .crud-header h1 {
                font-size: 1.5em;
                flex-direction: column;
            }

            .crud-content {
                padding: 20px;
            }

            .cards-grid {
                grid-template-columns: 1fr;
            }

            .table {
                font-size: 0.85em;
            }

            .mobile-menu-btn {
                display: block !important;
            }
        }

        /* Mobile Menu Button */
        .mobile-menu-btn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            color: white;
            border: none;
            font-size: 1.5em;
            cursor: pointer;
            z-index: 999;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
        }

        /* Animaciones */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .crud-content {
            animation: fadeIn 0.5s ease-out;
        }

        /* Estilos adicionales personalizables */
        @yield('custom-styles')
    </style>

    @stack('styles')
</head>
<body>
    <!-- SIDEBAR -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h2>
                <i class="fas fa-tools"></i>
                Panel de Control
            </h2>
        </div>

        <div class="sidebar-section">
            <ul class="sidebar-menu">
                <li>
                    <a href="{{ route('home') }}" class="{{ Request::is('home') ? 'active' : '' }}">
                        <i class="fas fa-home"></i>
                        Inicio
                    </a>
                </li>
            </ul>
        </div>

        <div class="sidebar-section">
            <div class="sidebar-section-title">MÓDULOS PRINCIPALES</div>
            <ul class="sidebar-menu">
                <li>
                    <a href="{{ route('refacciones.index') }}" class="{{ Request::is('refacciones*') ? 'active' : '' }}">
                        <i class="fas fa-cog"></i>
                        Refacciones
                    </a>
                </li>
                <li>
                    <a href="{{ route('servicios.index') }}" class="{{ Request::is('servicios*') ? 'active' : '' }}">
                        <i class="fas fa-wrench"></i>
                        Servicios
                    </a>
                </li>
                <li>
                    <a href="{{ route('vehiculos.index') }}" class="{{ Request::is('vehiculos*') ? 'active' : '' }}">
                        <i class="fas fa-car"></i>
                        Vehículos
                    </a>
                </li>
                <li>
                    <a href="#" class="{{ Request::is('ventas*') ? 'active' : '' }}">
                        <i class="fas fa-shopping-cart"></i>
                        Ventas
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- MOBILE MENU BUTTON -->
    <button class="mobile-menu-btn" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </button>

    <!-- MAIN CONTENT -->
    <div class="main-wrapper">
        <div class="crud-container">
            <!-- Header -->
            <div class="crud-header">
                <h1>
                    <div class="crud-header-icon">
                        <i class="@yield('header-icon', 'fas fa-list')"></i>
                    </div>
                    @yield('header', 'Panel de Control')
                </h1>
                <div>
                    @yield('header-actions')
                </div>
            </div>

            <!-- Mensajes de Sesión -->
            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i>
                    {{ session('error') }}
                </div>
            @endif

            @if(session('warning'))
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle"></i>
                    {{ session('warning') }}
                </div>
            @endif

            @if(session('info'))
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i>
                    {{ session('info') }}
                </div>
            @endif

            <!-- Content -->
            <div class="crud-content">
                @yield('content')
            </div>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
        }

        // Cerrar sidebar al hacer clic fuera en móvil
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const menuBtn = document.querySelector('.mobile-menu-btn');
            
            if (window.innerWidth <= 768) {
                if (!sidebar.contains(event.target) && !menuBtn.contains(event.target)) {
                    sidebar.classList.remove('active');
                }
            }
        });
    </script>

    @stack('scripts')
</body>
</html>