# Sistema de Logs de Eventos del Sistema

## Descripción

Este sistema implementa un registro completo de **todos los eventos y actividades** que ocurren en la plataforma, incluyendo registros de usuarios, inicios de sesión, creaciones, eliminaciones, errores y más.

## Características

- ✅ Registro automático de **todos los eventos del sistema**
- ✅ Registro de inicios y cierres de sesión
- ✅ Registro de creaciones, actualizaciones y eliminaciones
- ✅ Registro de errores del sistema
- ✅ Registro de actividades de administradores
- ✅ Almacenamiento en archivo de log personalizado
- ✅ Interfaz web para visualizar logs con filtros por tipo
- ✅ Descarga de archivos de log
- ✅ Limpieza automática de logs antiguos
- ✅ Comandos Artisan para gestión

## Archivos Creados

### Servicios
- `app/Services/LogService.php` - Servicio principal para manejo de logs

### Controladores
- `app/Http/Controllers/LogController.php` - Controlador para la interfaz web

### Middleware
- `app/Http/Middleware/LogUserRegistration.php` - Middleware para registro automático

### Comandos Artisan
- `app/Console/Commands/GenerateTestLogs.php` - Generar logs de prueba
- `app/Console/Commands/CleanOldLogs.php` - Limpiar logs antiguos

### Vistas
- `resources/views/logs/index.blade.php` - Interfaz web para ver logs

### Configuración
- Canal de logging agregado en `config/logging.php`
- Rutas agregadas en `routes/web.php`

## Cómo Funciona

### 1. Registro Automático de Eventos
El sistema registra automáticamente todos los eventos que ocurren:

**Registros de Usuario:**
- Datos del usuario, fecha, hora, IP

**Inicios/Cierres de Sesión:**
- Usuario, fecha, hora, IP

**Creaciones/Actualizaciones:**
- Membresías, clases, usuarios
- Datos del registro creado/modificado

**Eliminaciones:**
- Registros eliminados con detalles

**Errores del Sistema:**
- Mensajes de error, códigos, contexto

**Actividades de Administradores:**
- Acciones realizadas por administradores

### 2. Formato del Log
Cada entrada en el log tiene el siguiente formato:

**Registros de Usuario:**
```
[2025-01-27T10:30:45.123456Z] REGISTRO_USUARIO - Fecha: 2025-01-27, Hora: 10:30:45, Usuario: Juan Pérez, Email: juan@example.com, Rol: cliente, IP: 192.168.1.100
```

**Otros Eventos:**
```
[2025-01-27T10:30:45.123456Z] INICIO_SESION - Fecha: 2025-01-27, Hora: 10:30:45, Usuario: Admin, IP: 192.168.1.100, Datos: {"usuario":{"nombre":"Admin","email":"admin@test.com","rol":"admin"}}
```

### 3. Interfaz Web
Accede a `/logs` para ver todos los eventos en una tabla ordenada con:
- Fecha y hora del evento
- Tipo de evento (con badges de colores)
- Usuario que realizó la acción
- Dirección IP
- Detalles específicos del evento
- Timestamp completo

## Uso

### Ver Logs en la Web
1. Inicia sesión como administrador
2. Ve a la URL: `/logs`
3. Verás una tabla con todos los eventos del sistema
4. Los eventos están categorizados con badges de colores:
   - 🟢 Verde: Registros de usuario
   - 🔵 Azul: Inicios de sesión
   - ⚫ Gris: Cierres de sesión
   - 🔵 Azul claro: Crear membresía
   - 🟡 Amarillo: Crear clase
   - 🔴 Rojo: Eliminaciones y errores
   - ⚫ Negro: Acciones de administrador

### Descargar Archivo de Log
1. En la página de logs, haz clic en "Descargar Log"
2. Se descargará el archivo `registros_usuarios_YYYY-MM-DD.log`

### Limpiar Logs
1. En la página de logs, haz clic en "Limpiar Log"
2. Se eliminará todo el contenido del archivo de logs

### Comandos Artisan

#### Generar Logs de Prueba
```bash
php artisan logs:generate-test 10
```
Genera 10 logs de prueba con datos aleatorios.

#### Limpiar Logs Antiguos
```bash
php artisan logs:clean --days=30
```
Elimina logs más antiguos que 30 días (por defecto).

## Configuración

### Canal de Logging
Se agregó un nuevo canal en `config/logging.php`:
```php
'registros' => [
    'driver' => 'daily',
    'path' => storage_path('logs/registros.log'),
    'level' => env('LOG_LEVEL', 'debug'),
    'days' => 30,
    'replace_placeholders' => true,
],
```

### Rutas Protegidas
Las rutas de logs están protegidas y solo accesibles para administradores:
- `/logs` - Ver logs
- `/logs/download` - Descargar archivo
- `/logs/clear` - Limpiar logs

## Mantenimiento

### Limpieza Automática
Para mantener el sistema limpio, puedes programar la limpieza automática:

1. Agrega al cron job:
```bash
0 2 * * * cd /path/to/your/project && php artisan logs:clean --days=30
```

2. O ejecuta manualmente:
```bash
php artisan logs:clean --days=30
```

### Monitoreo
- Los logs se guardan en: `storage/logs/registros_usuarios.log`
- El archivo se puede monitorear con: `tail -f storage/logs/registros_usuarios.log`

## Seguridad

- Los logs contienen información sensible, asegúrate de que el archivo no sea accesible públicamente
- Solo los administradores pueden acceder a la interfaz web
- Las rutas están protegidas con middleware de autenticación y roles

## Personalización

### Agregar Más Información al Log
Edita `app/Services/LogService.php` en el método `logUserRegistration()` para agregar más campos.

### Cambiar Formato del Log
Modifica el método `writeToCustomLogFile()` en `LogService.php` para cambiar el formato de salida.

### Agregar Logs para Otros Eventos
Crea nuevos métodos en `LogService.php` para registrar otros tipos de eventos.

## Troubleshooting

### Problema: No se generan logs
1. Verifica que el directorio `storage/logs/` tenga permisos de escritura
2. Revisa los logs de Laravel en `storage/logs/laravel.log`

### Problema: No se puede acceder a la página de logs
1. Verifica que estés logueado como administrador
2. Revisa que las rutas estén correctamente definidas

### Problema: Los logs no se muestran
1. Verifica que el archivo `registros_usuarios.log` exista
2. Revisa el formato del archivo de log 