# Laravel Test

## Install

Docker-compose used from [DigitalOcean](https://www.digitalocean.com/community/tutorials/how-to-set-up-laravel-nginx-and-mysql-with-docker-compose)

```sh
$ cd laravel-blog // if not in root of project
$ docker run --rm -v $(pwd):/app composer install
$ sudo chown -R $USER:$USER ./
$ mv env.example .env
$ docker-compose up -d --build
$ docker-compose exec app composer update
$ docker-compose exec app php artisan key:generate
$ docker-compose exec app php artisan migrate:refresh --seed
$ docker-compose exec app php artisan test // not completed
```

Open [localhost](http://localhost)

Can use these login details:
    email: admin@admin.com
    password: password

