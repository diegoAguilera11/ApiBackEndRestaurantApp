## Bienvenido al Repositiorio BackEnd de Restaurant APP en Laravel

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Instalación
####Debe tener previamente instalado composer y PHP > 8.1.0 v para evitar futuros errores u problemas, una vez haya clonado el proyecto debera ejecutar en la terminal los siguientes comandos:

####composer install

Una vez ejecutado el comando, composer sera instalado en el proyecto.

####php artisan copy .env .example .env

Lo que hara este comando es copiar el archivo .en.example y lo nombrara como .env

####php artisan key:generate

Este comando establecera la APP_KEY en nuestro archivo .env

Ahora debemos configurar el archivo .env especificamente en los apartados de la base de datos.Debemos modificar lo siguiente:
- DB_PORT = Depende del puerto asigando por usted en la configuraciuon de su base de datos(default: 3306)
- DB_DATABASE = Aqui va el nombre de la base de datos creada en nuestro administrador de base de datos preferido.
- DB_USERNAME = root
- DB_PASSWORD = Es la contraseña que nostros asignamos en la instalación, en caso de utilizar Xampp, Laragon, etc.. Este campo se debe dejar vacio.

Una vez configurada la base de datos, en la terminal ejecutaremos los siguientes comandos:
php artisan optimize

####php artisan migrate --seed

Este comando ejecutara las migraciones del proyecto y una vez creada las tablas en la fase de datos, dara paso a ejecutar los seeders que forman parte del estado predeterminado del sistema.

Una vez ejecutado el comando verificamos si las tablas fueron creadas con exito.

Ahora procederemos a ejecutar el BackEnd con los siguientes comandos:

- php artisan serve

- npm run dev (para ejecutar los estilos de TailwindCSS)


#Con esto podremos disfrutar del BackEnd perteneciente a RestaurantAPP
