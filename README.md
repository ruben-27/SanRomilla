# SanRomilla
![SanRomilla](/img/dashboard.png "Dashboard")

San Romilla es el trabajo final de ciclo de Desarrollo de Aplicaciones Web realizado por [DCRDAW](https://github.com/DCRDAW) y [ruben-27](https://github.com/ruben-27). Consiste en una plataforma web para una carrera benéfica que se organiza cada año en Badajoz, donde los usuarios pueden realizar donaciones, inscribirse en la carrera en su categoría de edad y consultar tiempos, ganadores, donaciones, entre otras funciones. También cuenta con una sección de administración para gestionar los procesos necesarios para preparar la carrera y administrar las marcas de cada categoría en tiempo real.
## Instalación
### Requisitos previos
Para instalar el programa, primero deberás descargarlo o clonarlo desde este mismo repositorio:
    
    git clone https://github.com/ruben-27/SanRomilla.git
Asegúrate de tener `docker-compose` instalado:
    
    docker-compose -v

De no ser así, puedes instalarlo siguiendo las instrucciones de [aquí](https://docs.docker.com/compose/install/).
### Puesta en marcha
Una vez cumplidos todos los requisitos, es hora de poner en marcha el proyecto. Abre una terminal y dirígete al directorio donde tengas descargado el proyecto. Por ejemplo:
  
    cd Descargas/SanRomilla
Puedes copiar el archivo `.env` de ejemplo y configurarlo según tus necesidades:
    
    cp src/.env.example src/.env
También puedes utilizar el siguiente archivo `.env` ya configurado y pegarlo en `src/.env`, aunque deberás configurar tus [credenciales de Google](https://developers.google.com/identity/gsi/web/guides/get-google-api-clientid) para que funcione el inicio de sesión:
    
    APP_NAME="San Romilla"
    APP_ENV=local
    APP_KEY=base64:k3hCZvXP/CnJsHq7N0osGwsPIX4U7qo/GUsPSmxlo04=
    APP_DEBUG=true
    APP_URL=http://localhost

    LOG_CHANNEL=daily
    LOG_DEPRECATIONS_CHANNEL=null
    LOG_LEVEL=debug

    DB_CONNECTION=mysql
    DB_HOST=test-db
    DB_PORT=3306
    DB_DATABASE=San_Romilla
    DB_USERNAME=homestead
    DB_PASSWORD=secret

    BROADCAST_DRIVER=log
    CACHE_DRIVER=file
    FILESYSTEM_DRIVER=local
    QUEUE_CONNECTION=sync
    SESSION_DRIVER=file
    SESSION_LIFETIME=120

    MEMCACHED_HOST=127.0.0.1

    REDIS_HOST=127.0.0.1
    REDIS_PASSWORD=null
    REDIS_PORT=6379

    MAIL_MAILER=smtp
    MAIL_HOST=mailhog
    MAIL_PORT=1025
    MAIL_USERNAME=null
    MAIL_PASSWORD=null
    MAIL_ENCRYPTION=null
    MAIL_FROM_ADDRESS=null
    MAIL_FROM_NAME="${APP_NAME}"

    AWS_ACCESS_KEY_ID=
    AWS_SECRET_ACCESS_KEY=
    AWS_DEFAULT_REGION=us-east-1
    AWS_BUCKET=
    AWS_USE_PATH_STYLE_ENDPOINT=false

    PUSHER_APP_ID=
    PUSHER_APP_KEY=
    PUSHER_APP_SECRET=
    PUSHER_APP_CLUSTER=mt1

    MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
    MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

    SERVER_PORT=80
    SERVER_PORT_DB=3306
    TAG=latest

    # Aquí deberás poner tus credenciales
    GOOGLE_CLIENT_ID=""
    GOOGLE_CLIENT_SECRET=""
    GOOGLE_REDIRECT="http://localhost/admin/google/callback"

Construye y levanta los contenedores usando `Docker Compose`:

    docker-compose up -d --build
Instala las dependencias de `Composer`:
   
    docker-compose exec app composer install
Genera la clave de la aplicación Laravel:

    docker-compose exec app php artisan key:generate
Ejecuta las migraciones de la base de datos:

    docker-compose exec app php artisan migrate
Y por último ejecuta los seeders para cargar datos de prueba en la base de datos:
    
    docker-compose exec app php artisan db:seed
Una vez realizados estos pasos, la aplicación estará en funcionamiento y podrás verla en http://localhost:80 para la página de inicio, y en http://localhost:80/admin para acceder al dashboard. Para acceder al dashboard, realiza un sencillo inicio de sesión con Google.
