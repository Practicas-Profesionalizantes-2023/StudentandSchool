 Para arrancar el proyecto Institutec en tu sistema, necesitarás seguir una serie de pasos. Asegúrate de tener Docker instalado en tu sistema. Si no lo tienes instalado, puedes hacerlo ejecutando el siguiente comando en una terminal de Linux:

# sudo apt install docker-compose

 Para arrancar el proyecto Institutec en tu sistema, necesitarás seguir una serie de pasos. Asegúrate de tener Docker instalado en tu sistema. Si no lo tienes instalado, puedes hacerlo ejecutando el siguiente comando en una terminal de Linux:


# sudo apt install docker-compose

A continuación, sigue estos pasos:

    Crea una carpeta en tu directorio de inicio o en el escritorio con el nombre "entorno_docker". Puedes hacerlo de dos maneras:
        Haciendo clic derecho en un directorio y seleccionando "Crear carpeta".
        Abriendo una terminal y usando el comando mkdir entorno_docker.

    Abre un editor de texto, como Visual Studio Code, y selecciona la opción "Abrir carpeta". Selecciona la carpeta "entorno_docker" que creaste y crea un archivo llamado "docker-compose.yaml".

   # Dentro del archivo "docker-compose.yaml", coloca el siguiente contenido:

    version: '3'

networks:
  custom_network:
    driver: bridge

services:
  db:
    image: mysql:5.7
    container_name: db
    restart: always
    ports:
      - "3307:3306"
    volumes:
      - ./mysql:/var/lib/mysql
    env_file: .env
    networks:
      - custom_network

  admdb:
    image: phpmyadmin:latest
    container_name: admdb
    restart: always
    ports:
      - "8051"
    env_file: .env
    links:
      - db
    networks:
      - custom_network

  web:
    image: php:stack
    container_name: web
    restart: always
    ports:
      - "8050:80"
    env_file: .env
    volumes:
      - ./web:/var/www/html
    networks:
      - custom_network

  mongo:
    image: mongo:latest
    container_name: mongo
    restart: always
    env_file: .env
    ports:
      - "27017:27017"
    volumes:
      - ./mongo/:/data/db
    networks:
      - custom_network

# Crea un archivo llamado "Dockerfile" con el siguiente contenido:

FROM php:7.4-apache

RUN apt-get update && apt-get install --yes --no-install-recommends \
    zlib1g-dev \
    libzip-dev \
    unzip \    
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libssl-dev \
    && docker-php-ext-install zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mysqli \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb \  
    && echo "extension=mongodb.so" >> /usr/local/etc/php/php.ini 

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer \
    && composer require mongodb/mongodb
    
LABEL description="PHP + GD + Apache + PDO/mysqli + DriverMongo"

# Crea un archivo llamado ".env" con el siguiente contenido:

SQL_SERVER=db
MONGO_SERVER=mongo
TZ=America/Argentina/Buenos_Aires
MYSQL_ROOT_PASSWORD=hola1234
DB_NAME=institutec
PMA_HOST=db
MONGO_INITDB_ROOT_USERNAME=root
MONGO_INITDB_ROOT_PASSWORD=hola1234

Abre una terminal en la carpeta que contiene estos tres archivos y sigue estos pasos para crear y levantar el proyecto Docker:

# Crear la imagen de Docker php:stack
sudo docker build -t php:stack .

# Levantar el proyecto
sudo docker-compose up -d

### Una vez que los contenedores estén en funcionamiento, deberías ver tres carpetas en la carpeta "entorno_docker": "mongo", "mysql" y "web". Para asegurarte de que el servidor web tenga los permisos adecuados, ejecuta el siguiente comando en la carpeta "entorno_docker":
###

sudo chmod 777 web

### Luego, accede a la carpeta "web" y crea una subcarpeta llamada "www". Dentro de la carpeta "www", puedes clonar el repositorio de Institutec y probar el proyecto.
###
# Para acceder a las siguientes interfaces, utiliza los siguientes enlaces:

        PHPMyAdmin: http://localhost:8051/
        Usuario: root
        Contraseña: hola1234

    Institutec Project: http://localhost:8050/www/StudentandSchool/index.php

Dentro del proyecto, puedes iniciar sesión con las siguientes credenciales:

    Usuario: 12345678
    Contraseña: 1234

Una vez dentro, podrás explorar las diferentes funciones y características del proyecto Institutec. ¡Disfruta probándolo!

pd no olviden de pedirme la base de dato mandando un correo a esta direccion arielmega6@gmail.com para que se los pueda pasar

