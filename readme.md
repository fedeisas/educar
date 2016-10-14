# Licitación Educar

> Con el objetivo de hacer foco en la calidad y velocidad técnica los oferentes deben presentar la implementación de un módulo de software de Backend implementado en Laravel 5.1 que permita administrar (Alta, baja y modificación) un contenido, deberá incluir como mínimo la posibilidad de cargar un título, descripción, cuerpo, e imagen para el listado y un módulo de software de Frontend con un listado que permita visualizar el contenido dado de alta desde el Backend y la visualización completa del contenido. El software de referencia deberá ser entregado a través de un enlace en el cual se incluirá el código fuente y cualquier documentación que sea relevante para verificar el desarrollo realizado.

## Requerimientos

- PHP 5.6+
- Sqlite3
- Composer

## Instrucciones

1. Clonar este repositorio: `git clone ...`
2. Instalar dependencias: `composer install -o`
3. Configurar entorno:
* Copiar el archivo de entorno `cp .env.example .env`
* Configurar la base de datos a Sqlite:
  ```
  DB_CONNECTION=sqlite
  ```
4. Crear el archivo de base de datos: `touch database/database.sqlite`.
5. Ejecutar las migraciones de bases de datos e insertar datos simulados: `php artisan migrate:refresh --seed`
6. Crear una clave de encriptación: `php artisan key:generate`
7. Ejecutar el servidor local: `php artisan serve`
8. Abrir el navegador y visitar: `http://localhost:8000/content`
