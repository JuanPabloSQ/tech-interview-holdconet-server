# Prueba técnica holdconet - Juan Pablo Sepúlveda


## Descripción
Esta API es el desarrollo de la prueba técnica entregada por holdconet. La API consiste en una base de datos de MySQL que proporciona datos de regiones, provincias, ciudades y calles, junto con la manipulación de estas por medios de GET, PUT, y DELETE.

La API está creada siguiendo la arquitectura MVC y configurada en su totalidad con PHP v8.3.10 + Laravel.

Se integraron query strings para facilitar el filtrado desde el backend.

Finalmente, se implementaron migrations y seeders para poder traspasar los datos a cualquier base de datos.


## Instrucciones de depliegue

Asegurarse de tener PHP v8.3.10 para evitar problemas de compativilidad
1. **Requisitos de sistema**
    ```bash
    - PHP v8.3.10
    - Composer v2.x
    - MySQL v5.7 o superior
    ```

2. **Clonar el repositorio**
    ```bash
    git clone https://github.com/JuanPabloSQ/tech-interview-holdconet-server
    ```

3. **Crear Base de datos**
   ```sql
   CREATE DATABASE nombre_de_la_base_de_datos;
   ```

2. **Generar un archivo `.env` en la raíz del proyecto con el  contenido de `.env.example` como ejemplo**

3. **Instalar dependencias**

    ```bash
    composer install
    ```

4. **Migrar datos**

    ```bash
    php artisan migrate --seed
    ```

5. **Ejecturas server**

    ```bash
    php artisan serve
    ```

5. **Endpoints API**

    - **Regiones:**
    - GET /regions: Obtiene todas las regiones.
    - GET /regions/{id}: Obtiene la región con el ID especificado.
    - POST /regions: Crea una nueva región.
    - PUT /regions/{id}: Actualiza la región con el ID especificado.
    - DELETE /regions/{id}: Elimina la región con el ID especificado.

    - **Provincias:**
    - GET /provinces: Obtiene todas las provincias.
    - GET /provinces?region_id=1: Obtiene las provincias relacionadas con la región con ID 1.
    - GET /provinces/{id}: Obtiene la provincia con el ID especificado.
    - POST /provinces: Crea una nueva provincia.
    - PUT /provinces/{id}: Actualiza la provincia con el ID especificado.
    - DELETE /provinces/{id}: Elimina la provincia con el ID especificado.

    - **Ciudades:**
    - GET /cities: Obtiene todas las ciudades.
    - GET /cities?province_id=1: Obtiene las ciudades relacionadas con la provincia con ID 1.
    - GET /cities/{id}: Obtiene la ciudad con el ID especificado.
    - POST /cities: Crea una nueva ciudad.
    - PUT /cities/{id}: Actualiza la ciudad con el ID especificado.
    - DELETE /cities/{id}: Elimina la ciudad con el ID especificado.

    - **Calles:**
    - GET /streets: Obtiene todas las calles.
    - GET /streets?city_id=1: Obtiene las calles relacionadas con la ciudad con ID 1.
    - GET /streets/{id}: Obtiene la calle con el ID especificado.
    - POST /streets: Crea una nueva calle.
    - PUT /streets/{id}: Actualiza la calle con el ID especificado.
    - DELETE /streets/{id}: Elimina la calle con el ID especificado.

   
## Tecnologias utilizadas

- Esta API fue creada utilizando PHP, Laravel, Composer y mySQL.
