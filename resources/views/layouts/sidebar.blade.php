<!-- Sidebar Navigation -->
<div class="sidebar" id="sidebar">
    <!-- Header del Sidebar -->
    <div class="sidebar-header">
        <h4>
            <i class="fas fa-tools"></i>
            Panel de Control
        </h4>
        <button class="sidebar-toggle" id="sidebarClose">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <!-- Menú de Navegación -->
    <nav class="sidebar-nav">
        <ul class="nav-list">
            <!-- Inicio -->
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
                    <i class="fas fa-home"></i>
                    <span>Inicio</span>
                </a>
            </li>

            <!-- Divider -->
            <li class="nav-divider">
                <span>Módulos Principales</span>
            </li>

            <!-- Refacciones -->
            <li class="nav-item">
                <a href="{{ route('refacciones.index') }}" class="nav-link {{ Request::is('refacciones*') ? 'active' : '' }}">
                    <i class="fas fa-cogs"></i>
                    <span>Refacciones</span>
                </a>
            </li>

            <!-- Servicios -->
            <li class="nav-item">
                <a href="{{ route('servicios.index') }}" class="nav-link {{ Request::is('servicios*') ? 'active' : '' }}">
                    <i class="fas fa-wrench"></i>
                    <span>Servicios</span>
                </a>
            </li>

            <!-- Vehículos -->
            <li class="nav-item">
                <a href="{{ route('vehiculos.index') }}" class="nav-link {{ Request::is('vehiculos*') ? 'active' : '' }}">
                    <i class="fas fa-car"></i>
                    <span>Vehículos</span>
                </a>
            </li>

            <!-- Ventas -->
            <li class="nav-item">
                <a href="{{ route('ventas.index') }}" class="nav-link {{ Request::is('ventas*') ? 'active' : '' }}">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Ventas</span>
                </a>
            </li>

            
            
        </ul>
    </nav>

    <!-- Footer del Sidebar -->
    <div class="sidebar-footer">
        <div class="user-info">
            <i class="fas fa-user-circle"></i>
            <span>{{ Auth::user()->name ?? 'Usuario' }}</span>
        </div>
    </div>
</div>

<!-- Botón para abrir sidebar en móvil -->
<button class="sidebar-toggle-btn" id="sidebarOpen">
    <i class="fas fa-bars"></i>
</button>

<!-- Overlay para cerrar sidebar en móvil -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<style>
/* Sidebar Styles */
.sidebar {
    position: fixed;
    left: 0;
    top: 0;
    height: 100vh;
    width: 260px;
    background: linear-gradient(180deg, #1e3a5f 0%, #2a5a8f 100%);
    box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    display: flex;
    flex-direction: column;
    transition: transform 0.3s ease;
}

.sidebar-header {
    padding: 20px;
    background: rgba(0, 0, 0, 0.2);
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.sidebar-header h4 {
    color: #fff;
    margin: 0;
    font-size: 1.1rem;
    font-weight: 600;
}

.sidebar-header h4 i {
    margin-right: 10px;
    color: #3498db;
}

.sidebar-toggle {
    background: none;
    border: none;
    color: #fff;
    font-size: 1.2rem;
    cursor: pointer;
    padding: 5px;
    display: none;
}

.sidebar-nav {
    flex: 1;
    overflow-y: auto;
    padding: 10px 0;
}

.nav-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.nav-item {
    margin: 5px 10px;
}

.nav-link {
    display: flex;
    align-items: center;
    padding: 12px 15px;
    color: #ecf0f1;
    text-decoration: none;
    border-radius: 8px;
    transition: all 0.3s ease;
    font-size: 0.95rem;
}

.nav-link i {
    width: 24px;
    margin-right: 12px;
    font-size: 1.1rem;
    color: #3498db;
}

.nav-link:hover {
    background: rgba(52, 152, 219, 0.15);
    color: #fff;
    transform: translateX(5px);
}

.nav-link.active {
    background: rgba(52, 152, 219, 0.25);
    color: #fff;
    border-left: 3px solid #3498db;
}

.nav-divider {
    padding: 15px 20px 8px;
    margin-top: 15px;
}

.nav-divider span {
    font-size: 0.75rem;
    text-transform: uppercase;
    color: #95a5a6;
    font-weight: 600;
    letter-spacing: 1px;
}

.sidebar-footer {
    padding: 15px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    background: rgba(0, 0, 0, 0.2);
}

.user-info {
    display: flex;
    align-items: center;
    color: #ecf0f1;
    font-size: 0.9rem;
}

.user-info i {
    font-size: 1.5rem;
    margin-right: 10px;
    color: #3498db;
}

/* Botón toggle para móvil */
.sidebar-toggle-btn {
    position: fixed;
    left: 20px;
    top: 20px;
    z-index: 999;
    background: #1e3a5f;
    color: #fff;
    border: none;
    width: 45px;
    height: 45px;
    border-radius: 10px;
    font-size: 1.2rem;
    cursor: pointer;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    display: none;
}

.sidebar-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 999;
    display: none;
}

/* Responsive */
@media (max-width: 768px) {
    .sidebar {
        transform: translateX(-100%);
    }

    .sidebar.active {
        transform: translateX(0);
    }

    .sidebar-toggle {
        display: block;
    }

    .sidebar-toggle-btn {
        display: block;
    }

    .sidebar-overlay.active {
        display: block;
    }
}

/* Scrollbar personalizado */
.sidebar-nav::-webkit-scrollbar {
    width: 6px;
}

.sidebar-nav::-webkit-scrollbar-track {
    background: rgba(0, 0, 0, 0.1);
}

.sidebar-nav::-webkit-scrollbar-thumb {
    background: rgba(52, 152, 219, 0.5);
    border-radius: 3px;
}

.sidebar-nav::-webkit-scrollbar-thumb:hover {
    background: rgba(52, 152, 219, 0.7);
}
</style>

<script>
// Script para toggle del sidebar en móvil
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const sidebarOpen = document.getElementById('sidebarOpen');
    const sidebarClose = document.getElementById('sidebarClose');
    const sidebarOverlay = document.getElementById('sidebarOverlay');

    function openSidebar() {
        sidebar.classList.add('active');
        sidebarOverlay.classList.add('active');
    }

    function closeSidebar() {
        sidebar.classList.remove('active');
        sidebarOverlay.classList.remove('active');
    }

    if (sidebarOpen) {
        sidebarOpen.addEventListener('click', openSidebar);
    }

    if (sidebarClose) {
        sidebarClose.addEventListener('click', closeSidebar);
    }

    if (sidebarOverlay) {
        sidebarOverlay.addEventListener('click', closeSidebar);
    }
});
</script>