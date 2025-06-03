# Universidad Santander - Proyecto Laravel

Este proyecto es un sistema desarrollado con Laravel 12.x para la gestión de alumnos de la Universidad Santander.

## Requisitos

Asegúrate de tener instalado:

- PHP >= 8.4
- Composer
- Por default usamos SQLITE pero puedes configurar MySQL o MariaDB.
- Extensiones PHP requeridas por Laravel (pdo, mbstring, openssl, etc.)

---

## Pasos para levantar el proyecto

1. **Clonar el repositorio**

git clone https://github.com/MartinZptRms/universidad-santander.git
cd universidad-santander

2. **Instalar dependencias de PHP**

composer install

3. **Copiar y configurar el archivo .env**

cp .env.example .env

4. **Generar la clave de la aplicación**

php artisan key:generate

5. **Ejecutar migraciones y seeders**

php artisan migrate --seed

6. **Levantar el servidor de desarrollo**

php artisan serve

7. **Pruebas**

- Dentro del proyecto en raíz, viene un archivo "Pruebas - Evidencia.pdf" donde pueden encontrar el funcionamiento de las API's

8. **Postman**

- Dentro del proyecto en raíz, viene una colección de POSTMAN para que puedan hacer las pruebas necesarias.