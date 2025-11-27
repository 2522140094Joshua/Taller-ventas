
@extends('layouts.app')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>El Talachas - Sistema de Gestión de Ventas</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        body {
            font-family: 'Figtree', sans-serif;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #2c6a3bff 0%, #09175eff 50%, #a17826ff 100%);
        }
        
        .card-shadow {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .hover-scale {
            transition: transform 0.3s ease;
        }
        
        .hover-scale:hover {
            transform: scale(1.05);
        }
        
        .fade-in {
            animation: fadeIn 0.8s ease-in;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .tool-animation {
            animation: rotate 4s ease-in-out infinite;
        }
        
        @keyframes rotate {
            0%, 100% { transform: rotate(-5deg); }
            50% { transform: rotate(5deg); }
        }
    </style>
</head>
<body class="antialiased bg-orange-50">
    
    <!-- Header Navigation -->
    <nav class="bg-white shadow-sm border-b border-orange-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <div class="flex items-center space-x-2">
                        <svg class="w-8 h-8 text-orange-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.78 15.3l-2.14 2.14c-.78.78-2.05.78-2.83 0-.78-.78-.78-2.05 0-2.83l2.14-2.14c.78-.78 2.05-.78 2.83 0 .78.78.78 2.05 0 2.83zM7.05 9.05c-.78.78-.78 2.05 0 2.83.78.78 2.05.78 2.83 0l2.14-2.14c.78-.78.78-2.05 0-2.83-.78-.78-2.05-.78-2.83 0L7.05 9.05z"/>
                            <path d="M21.71 8.71L15.29 2.29a.996.996 0 00-1.41 0l-9 9c-.39.39-.39 1.02 0 1.41l6.42 6.42c.39.39 1.02.39 1.41 0l9-9c.39-.39.39-1.02 0-1.41z"/>
                        </svg>
                        <h1 class="text-2xl font-bold text-orange-900">
                            El Talachas
                        </h1>
                    </div>
                </div>
                
                <!-- Auth Links -->
                
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="gradient-bg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="text-center fade-in">
                <div class="mb-6 tool-animation">
                    <svg class="w-24 h-24 text-white mx-auto" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M13.78 15.3l-2.14 2.14c-.78.78-2.05.78-2.83 0-.78-.78-.78-2.05 0-2.83l2.14-2.14c.78-.78 2.05-.78 2.83 0 .78.78.78 2.05 0 2.83zM7.05 9.05c-.78.78-.78 2.05 0 2.83.78.78 2.05.78 2.83 0l2.14-2.14c.78-.78.78-2.05 0-2.83-.78-.78-2.05-.78-2.83 0L7.05 9.05z"/>
                        <path d="M21.71 8.71L15.29 2.29a.996.996 0 00-1.41 0l-9 9c-.39.39-.39 1.02 0 1.41l6.42 6.42c.39.39 1.02.39 1.41 0l9-9c.39-.39.39-1.02 0-1.41z"/>
                    </svg>
                </div>
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">
                    Bienvenido a 
                    <span class="block text-white-300">El Talachas</span>
                </h1>
                <p class="text-xl text-orange-100 mb-4 max-w-2xl mx-auto">
                    "El trabajo bien hecho es su propia recompensa"
                </p>
                <p class="text-lg text-orange-200 mb-8 max-w-2xl mx-auto">
                    Sistema de gestión integral para tu taller. Controla ventas, inventario y clientes de manera eficiente.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    @guest
                    <a href="{{ route('register') }}" class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-orange-900 px-8 py-3 rounded-lg text-lg font-semibold transition-colors hover-scale">
                        Comenzar Ahora
                    </a>
                    <a href="{{ route('login') }}" class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-orange-900 px-8 py-3 rounded-lg text-lg font-semibold transition-colors hover-scale">
                        Iniciar Sesión
                    </a>
                     @else
                        <a href="{{ url('/home') }}" class="bg-yellow-400 text-blue-900 hover:bg-yellow-300 px-8 py-3 rounded-lg text-lg font-semibold transition-colors hover-scale">
                            Ir al Dashboard
                        </a>
                    @endguest
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-orange-900 mb-4">
                    ¿Por qué elegir El Talacha?
                </h2>
                <p class="text-xl text-orange-600 max-w-3xl mx-auto">
                    "La calidad nunca es un accidente; siempre es el resultado del esfuerzo inteligente"
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="text-center p-6 bg-orange-50 rounded-lg card-shadow hover-scale">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-orange-900 mb-2">Control de Ventas</h3>
                    <p class="text-orange-600">Registra y gestiona todas tus ventas de manera rápida y eficiente. Reportes detallados en tiempo real.</p>
                </div>
                
                <!-- Feature 2 -->
                <div class="text-center p-6 bg-orange-50 rounded-lg card-shadow hover-scale">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-orange-900 mb-2">Gestión de Inventario</h3>
                    <p class="text-orange-600">Mantén control total de tus productos, herramientas y materiales. Alertas de stock bajo automáticas.</p>
                </div>
                
                <!-- Feature 3 -->
                <div class="text-center p-6 bg-orange-50 rounded-lg card-shadow hover-scale">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-orange-900 mb-2">Base de Clientes</h3>
                    <p class="text-orange-600">Administra tu cartera de clientes, historial de compras y mantén una comunicación efectiva.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Additional Features -->
    <section class="py-20 bg-orange-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold text-orange-900 mb-6">
                        Herramientas profesionales para tu taller
                    </h2>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <svg class="w-6 h-6 text-orange-600 mr-3 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <div>
                                <h3 class="font-semibold text-orange-900">Punto de Venta Integrado</h3>
                                <p class="text-orange-600">Procesa ventas rápidamente con interfaz intuitiva</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <svg class="w-6 h-6 text-orange-600 mr-3 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <div>
                                <h3 class="font-semibold text-orange-900">Reportes y Estadísticas</h3>
                                <p class="text-orange-600">Analiza el rendimiento de tu negocio</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <svg class="w-6 h-6 text-orange-600 mr-3 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <div>
                                <h3 class="font-semibold text-orange-900">Cotizaciones y Facturas</h3>
                                <p class="text-orange-600">Genera documentos profesionales al instante</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-orange-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                ¿Listo para mejorar tu taller?
            </h2>
            <p class="text-xl text-orange-200 mb-4 max-w-2xl mx-auto">
                "El éxito es la suma de pequeños esfuerzos repetidos día tras día"
            </p>
            <p class="text-lg text-orange-300 mb-8 max-w-2xl mx-auto">
                Únete a cientos de talleres que ya confían en El Talachas
            </p>
            <a href="{{ route('register') }}" class="bg-orange-600 text-white hover:bg-orange-700 px-8 py-3 rounded-lg text-lg font-semibold transition-colors hover-scale inline-block">
                Crear Cuenta Gratis
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white border-t border-orange-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid md:grid-cols-4 gap-8">
                <div class="col-span-2">
                    <div class="flex items-center space-x-2 mb-4">
                        <svg class="w-8 h-8 text-orange-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.78 15.3l-2.14 2.14c-.78.78-2.05.78-2.83 0-.78-.78-.78-2.05 0-2.83l2.14-2.14c.78-.78 2.05-.78 2.83 0 .78.78.78 2.05 0 2.83zM7.05 9.05c-.78.78-.78 2.05 0 2.83.78.78 2.05.78 2.83 0l2.14-2.14c.78-.78.78-2.05 0-2.83-.78-.78-2.05-.78-2.83 0L7.05 9.05z"/>
                            <path d="M21.71 8.71L15.29 2.29a.996.996 0 00-1.41 0l-9 9c-.39.39-.39 1.02 0 1.41l6.42 6.42c.39.39 1.02.39 1.41 0l9-9c.39-.39.39-1.02 0-1.41z"/>
                        </svg>
                        <h3 class="text-lg font-semibold text-white-900">El Talachas</h3>
                    </div>
                    <p class="text-orange-600 mb-4">
                        Sistema de gestión profesional para talleres modernos. 
                        Optimiza tus ventas, inventario y relación con clientes.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-orange-400 hover:text-orange-600">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-orange-400 hover:text-orange-600">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-orange-200 mt-8 pt-8 text-center">
                <p class="text-orange-600">&copy; 2025 El Talachas. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Modal de Aviso de Privacidad -->
    <div id="privacidad-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50" style="display: none;">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-md text-center m-4">
            <h2 class="text-xl font-bold mb-4 text-orange-900">Aviso de Privacidad</h2>
            <p class="text-sm mb-4 text-left text-orange-600">
                Este sitio web utiliza cookies y recopila datos personales para mejorar su experiencia de navegación. 
                Al continuar utilizando nuestro sitio, usted acepta nuestro 
                <a href="/avisoprivacidad" class="text-orange-600 underline font-semibold" target="_blank">Aviso de Privacidad</a> 
                y el uso de cookies.
            </p>
            <div class="mb-4">
                <label class="inline-flex items-center cursor-pointer">
                    <input type="checkbox" id="checkbox-privacidad" class="mr-2 cursor-pointer">
                    <span class="text-sm text-orange-600">Acepto el aviso de privacidad</span>
                </label>
            </div>
            <div class="flex gap-2 justify-center">
                <button id="aceptar-privacidad" class="bg-orange-600 text-white px-4 py-2 rounded disabled:opacity-50 disabled:cursor-not-allowed flex-1" disabled>
                    Aceptar
                </button>
                <button id="rechazar-privacidad" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 flex-1">
                    Rechazar
                </button>
            </div>
        </div>
    </div>
<script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('privacidad-modal');
            const checkbox = document.getElementById('checkbox-privacidad');
            const botonAceptar = document.getElementById('aceptar-privacidad');
            const botonRechazar = document.getElementById('rechazar-privacidad');

            // Mostrar modal si aún no se ha respondido
            if (!localStorage.getItem('privacidadRespuesta')) {
                modal.style.display = 'flex';
                document.body.style.overflow = 'hidden'; // Prevenir scroll
            }

            // Habilitar/deshabilitar el botón según el estado del checkbox
            checkbox.addEventListener('change', function () {
                botonAceptar.disabled = !this.checked;
            });

            // Aceptar aviso de privacidad
            botonAceptar.addEventListener('click', function (e) {
                e.preventDefault();
                
                if (checkbox.checked) {
                    localStorage.setItem('privacidadRespuesta', 'aceptado');
                    modal.style.display = 'none';
                    document.body.style.overflow = 'auto'; // Restaurar scroll
                } else {
                    alert('Por favor, acepta el aviso de privacidad para continuar.');
                }
            });

            // Rechazar aviso de privacidad
            botonRechazar.addEventListener('click', function (e) {
                e.preventDefault();
                localStorage.setItem('privacidadRespuesta', 'rechazado');
                alert('Has rechazado el aviso de privacidad. Algunas funcionalidades pueden estar limitadas.');
                modal.style.display = 'none';
                document.body.style.overflow = 'auto'; // Restaurar scroll
            });
        });

        // Función para limpiar la respuesta (solo para testing)
        function limpiarPrivacidad() {
            localStorage.removeItem('privacidadRespuesta');
            location.reload();
        }
    </script>
</body>
</html>
