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

Cabe aclarar que antes de intentar instalar las dependencias se debe tener php y composer instalado.

1. Clonar el repositorio:
```bash
   git clone https://github.com/miguelangelvasquez1/prueba_tecnica-uva3.git
   cd prueba_tecnica-uva3
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
   touch database/database.sqlite (Crear manualmente si no se esta en un entorno Unix)
   php artisan migrate
```

5. Iniciar servidor:
```bash
   php artisan serve
```

6. Abrir en el navegador: [http://localhost:8000](http://localhost:8000)
