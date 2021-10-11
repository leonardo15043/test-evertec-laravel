<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://www.evertecinc.com/wp-content/uploads/2020/07/logo-evertec.png" width="400"></a></p>


## Test Evertec

Esta tienda básica desarrollada en Laravel esta dividida en 5 etapas para el proceso de compra.

- Listado de productos.
- Ingreso de datos básicos del usuario
- Confirmación de la compra
- Pago por **PlacetoPay**
- Confirmación y respuesta de la transacción.

Adicionalmente tenemos dos pestañas donde podemos ver el listado de las ordenes que realizo el usuario y un listado con todas las ordenes de comprar que se han realizado en la tienda, cabe aclarar que el listado de ordenes por usuario solo se visualizara si se ingresaron los datos del usuario en la ultima transacción.

<img src="https://lh3.googleusercontent.com/2zT-9SMF5Xy0tb0gBLzSvpSCqhXNPu2v_mgVY-EP_ALhTrcqD-UpR17HF9YVA8ps56QkDU-Lm2bJz67kzmY=w2560-h937">

## Proceso de instalación y configuración

Después de clonar el repositorio en nuestro ambiente de desarrollo local debemos ejecutar los siguientes comandos:

#### 1 - Dependencias de Composer

```composer install```

#### 2 - Crear archivo .env

Este archivo contiene todas las variables de entorno del sistema y debe estar creado en la raíz del proyecto basado en el archivo de ejemplo **.env.example**, es importante completar las variables de entorno de **PlaceToPay** para que el proyecto funcione correctamente.

#### 3 - Crear API Key del proyecto

Cada proyecto de **Laravel** tiene una clave única y para generarla lo podemos hacer con el comando 

```php artisan key:generate```

#### 4 - Configuración de Base de datos

Para configurar la base de datos primero debemos crearla desde nuestro gestor de base de datos, posteriormente abrimos el archivo **.env** y modificamos las siguientes variables de entorno.

```DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

#### 5 - Ejecutar migraciones

Las migraciones son básicamente la estructura de la base de datos que ya esta construida en el código para pasarla a MYSQL, esto lo podemos hacer con el siguiente comando.

```php artisan migrate```

#### 6 - Ejecutar Seeders

Para ejecutar los seeders que no es mas que información prestablecida de la base de datos que esta en nuestro código y que en este caso sube los estados de las ordenes y un producto de ejemplo debemos ejecutar el siguiente comando.

```php artisan migrate --seed```

#### 7 - Ejecutar proyecto

```php artisan serve```
