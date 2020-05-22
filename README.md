# Instalando dependencias

```bash
git clone https://github.com/gregorip02/2x3.git
cd 2x3
composer install --ignore-platform-reqs -vvv
cp .env.example .env
php artisan key:generate
```

# Desplegando el proyecto
```bash
docker-compose up -d
docker exec -it fpm php artisan queue:work
```

> La aplicación escuchará peticiones en el puerto 8080.

# Migrando la base de datos

> Espere al menos 1 minuto mientras que el contenedor de MySQL esta inicia.

```bash
docker exec -it fpm php artisan migrate:fresh --seed
```
