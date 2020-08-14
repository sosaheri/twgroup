
<i>Respuesta a los desafios de <strong>TWGroup</strong>:</i><br>

### Desafío 1:

Al momento de iniciar un nuevo proyecto en Laravel debemos realizar una serie de pasos para configurar el proyecto dependiendo de sus requerimientos. Imagina que necesitamos una plataforma sobre Laravel que utilizará un motor de base de datos MySQL/MariaDB, un servidor de correos SMTP y un servidor Redis.

¿Cuáles son los pasos que consideras necesarios para dejar la aplicación funcionando en modo de desarrollo? (Describe los comandos necesarios que ejecutarías y que archivos modificarías en base a los requerimientos mencionados).

<i>comandos para instalación y adecuación de un ambiente de desarrollo

instalación</i>

```
composer global require laravel/installer
composer create-project --prefer-dist laravel/laravel nombreDelProyecto
cd 

```

<i>permisos a carpetas y seguridad</i>

```
sudo chown -R $USER:www-data storage
sudo chown -R $USER:www-data bootstrap/cache
chmod -R 775 storage
chmod -R 775 bootstrap/cache
php artisan key:generate

```
<i>
Configuracion base de datos

previamente se debe haber creado una base de datos en MySQL/MariaDB, tomar los datos correspondiente a nombre de usuario  y nombre de base de datos y contraseña

ingresar modificar datos en archivo /.env
</i>

```
nano .env

```

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ombreBaseDeDatos
DB_USERNAME=NombreDeUsuario
DB_PASSWORD=contraseñaDeBaseDeDatos

<i>
Configuracion SMTP

previamente se debe haber creado un usuario y contraseña en un proveedor de servicio por ejemplo mailgun o mailtrap o en su defecto gmail o mailhog. Tomar nota de host, usuario y contraseña del servicio

ingresar modificar datos en archivo /.env
</i>

```
nano .env

```

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=nombreUsuario
MAIL_PASSWORD=contraseñaUsuario
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"
<i>
Configuracion Cache REDIS

previamente es necesario tener instalado la libreria de phpredis y obtener el usuario y clave correspondiente redis

ingresar modificar datos en archivo /.env
</i>
```
nano .env

```

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=contraseñaRedis
REDIS_PORT=6379

### Desafío 2:

Laravel cuenta con un ORM llamado Eloquent, este ORM nos permite simplificar las consultas a la base de datos, imagina los siguientes modelos con los siguientes atributos.

Publication (id, title, content, user_id)
Comment (id, publication_id, content, status)

<i>
primero debemos asegurarnos de tener como clave foranea en comentarios el id de Publications luego en los modelos que indico agregar los siguientes metodos


Publication 

public function comments()
    {
        return $this->hasMany(Comment::class);
    }


Comment 
    public function post()
    {
        return $this->belongsTo(Post::class);
    }</i>

### Desafio 3:

Imaginando los modelos anteriormente mencionados, crea una Query en Eloquent (Obligatorio) que obtenga: Todas las publicaciones que contengan comentarios con la palabra "Hola" en su contenido, y que además posean status "APROBADO".


### Desafio 4:

En Laravel existen las migraciones, en base a tu experiencia ¿Cuáles son las ventajas que nos entrega el uso de migraciones en una aplicación Laravel funcionando en un servidor de producción?

<i>Las migraciones nos permiten llevar un control de versiones de los cambios que tenemos en base de datos a nivel de la estructura que empleamos, facilitandonos el proceso de realizar el retorno a un estado anterior en caso de fallas o pruebas concepto con el modelo anterior </i>

### Desafio 5:


Pueden acceder a la aplicación por medio del siguiente enlace <a href="https://twgroup.larepaweb.com.ve" target="_blank">Enlace a Reto</a>
