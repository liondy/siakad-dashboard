## Installation
1. copy .env.example .env
2. DB_DATABASE=nama_db & DB_HOST=mysql
3. cd docker
4. copy env.example .env
5. RUN docker-compose up --build -d
6. RUN docker exec -it nama_container composer install
7. RUN docker exec -it nama_container php artisan key:generate
8. Website: http://localhost:88

## Start App
1. cd docker
2. docker-compose up -d

## Happy Koding!