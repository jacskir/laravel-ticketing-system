# AWP - Ticketing System

A ticketing system that allows authenticated users to create and assign tickets
to other users. Tickets may be Created, Read, Updated and Deleted by authorised users. Features github OAuth login, and email notifications to appropriate users when a ticket is created / closed.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

[Docker Engine](https://docs.docker.com/engine/install/ubuntu/)

[Docker Compose](https://docs.docker.com/compose/install/)

[Composer and required dependencies](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-composer-on-ubuntu-18-04)

PHP extension dom (sudo apt install php-dom)

### Installing

A step by step series of examples that tell you how to get a development env running. Once installed, you can access the app at localhost:3000

#### cd into the program folder (example):
```
cd ~/code/awp-2-jacskir/
```

#### Install the project's dependencies:
```
composer install
```

#### Create a copy of the '.env.example' file and name it  '.env'
```
cp .env.example .env
```

#### In the '.env' file:

#### Change app name:
```
APP_NAME="Ticketing System"
```

#### Change app url:
```
APP_URL="http://localhost:3000"
```

#### Add your mail credentials (example):
```
MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=12ac3acb456789
MAIL_PASSWORD=12ed34cf5d67bc
MAIL_FROM_ADDRESS=from@example.com
MAIL_FROM_NAME="${APP_NAME}"
```

#### Add your Github OAuth credentials (example):
```
GITHUB_CLIENT_ID=123a12ba3c1g23defg1h
GITHUB_CLIENT_SECRET=12a3b12ba31b231ba23b12ab3123b1a231ab231a
GITHUB_CALLBACK_URL=http://127.0.0.1:3000/login/github/callback
```

#### Generate an app encryption key:
```
php artisan key:generate
```

#### Start the docker container:
```
sudo docker-compose up -d
```

#### Migrate the database:
```
sudo docker exec -it awp-2-jacskir_laravel-app_1 php artisan migrate:fresh
```

#### [Optional]: Seed the database
```
sudo docker exec -it awp-2-jacskir_laravel-app_1 php artisan db:seed
```

## Deployment

For the most part, you can follow [this guide](https://www.digitalocean.com/community/tutorials/how-to-install-and-configure-laravel-with-lemp-on-ubuntu-18-04).

You should name the database 'ticketing_system', and the database user as 'ticket_user'. Make sure to include all the '.env' changes above.
