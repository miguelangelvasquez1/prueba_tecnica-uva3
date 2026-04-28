# Gestión de Tareas

Aplicación web para gestionar tareas personales construida con Laravel.

## Autor
**Miguel Angel Vasquez Gonzalez**

## Tecnologías
- PHP 8.2
- Laravel 11
- SQLite
- Blade (sistema de plantillas)

## Pasos para correr localmente

1. Clonar el repositorio:
```bash
   git clone [link](https://github.com/miguelangelvasquez1/prueba_tecnica-uva3.git)
   cd gestion-tareas
```

2. Instalar dependencias:
```bash
   composer install
```

3. Configurar entorno:
```bash
   cp .env.example .env
   php artisan key:generate
```
   En el `.env`, asegúrate de tener `DB_CONNECTION=sqlite`

4. Crear base de datos y migrar:
```bash
   touch database/database.sqlite
   php artisan migrate
```

5. Iniciar servidor:
```bash
   php artisan serve
```

6. Abrir en el navegador: [http://localhost:8000](http://localhost:8000)
