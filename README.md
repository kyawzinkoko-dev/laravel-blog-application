# Laravel 10 blogging application 


### this Blog application is built using Filament PHP for admin panel.

## Installing with docker
### 1. Clone the repo
```bash
git clone https://github.com/kyawzinkoko-dev/laravel-blog-application.git
```

### 2. Run `composer install`
Navigate to the project folder from terminal
```bash
    docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```
### 3. copy `.env.example` to `.env`
```bash
cp .env.example .env
```
### 4.Run the project in de detached mode
```bash
./vendor/bin/sail up -d
```
after that if you want to run php artisan command you can do it from docker container.
<br>
container can be access 
```bash
./vendor/bin/sail bash
```
### 5. set encryption key

```bash
php artisan key:grnerate --ansi
```
### 6. Run migrations 
```bash
php artisan migrate
```
### 7. add filament admin user
```bash
php artisan make:filament-user
```
