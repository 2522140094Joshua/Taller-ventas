<!-- Sección de Navegación Principal -->
<div class="container my-5">
    <h2 class="text-center mb-4">Selecciona un Módulo</h2>
    
    <div class="row g-4">
        <!-- Tarjeta Refacciones -->
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('refacciones.index') }}" class="text-decoration-none">
                <div class="card shadow-sm h-100 module-card">
                    <div class="card-body text-center">
                        <div class="module-icon mb-3">
                            <i class="fas fa-cogs fa-4x text-primary"></i>
                        </div>
                        <h5 class="card-title">Refacciones</h5>
                        <p class="card-text text-muted">Gestiona el inventario de refacciones y repuestos</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Tarjeta Servicios -->
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('servicios.index') }}" class="text-decoration-none">
                <div class="card shadow-sm h-100 module-card">
                    <div class="card-body text-center">
                        <div class="module-icon mb-3">
                            <i class="fas fa-wrench fa-4x text-success"></i>
                        </div>
                        <h5 class="card-title">Servicios</h5>
                        <p class="card-text text-muted">Administra servicios y mantenimientos</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Tarjeta Vehículos -->
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('vehiculos.index') }}" class="text-decoration-none">
                <div class="card shadow-sm h-100 module-card">
                    <div class="card-body text-center">
                        <div class="module-icon mb-3">
                            <i class="fas fa-car fa-4x text-info"></i>
                        </div>
                        <h5 class="card-title">Vehículos</h5>
                        <p class="card-text text-muted">Control de vehículos y flotilla</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Tarjeta Ventas -->
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('ventas.index') }}" class="text-decoration-none">
                <div class="card shadow-sm h-100 module-card">
                    <div class="card-body text-center">
                        <div class="module-icon mb-3">
                            <i class="fas fa-shopping-cart fa-4x text-warning"></i>
                        </div>
                        <h5 class="card-title">Ventas</h5>
                        <p class="card-text text-muted">Registra y consulta ventas realizadas</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<style>
.module-card {
    transition: all 0.3s ease;
    border: 2px solid transparent;
    cursor: pointer;
}

.module-card:hover {
    transform: translateY(-5px);
    border-color: #007bff;
    box-shadow: 0 8px 16px rgba(0,0,0,0.2) !important;
}

.module-icon {
    padding: 20px;
}

.card-title {
    color: #333;
    font-weight: 600;
}

.card-text {
    font-size: 0.9rem;
}
</style>

<!-- Asegúrate de incluir Font Awesome en tu layout principal -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> -->