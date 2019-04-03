# Lumen Laradock Simple Blog

This project was done with the intention to show to create a project using **Lumen** and **Laradock**.

**Lumen** is an open-source PHP based micro-framework created by Taylor Otwell in 2015. Lumen is designed for building lightning fast micro-services and APIs. And it opts for maximum speed rather than flexibility in the bootstrapping process. The PHP micro-framework was born out of the need to have light Laravel installations that could be faster than existing PHP micro-frameworks such as Slim and Silex.

>Lumen is designed for building lightning fast micro-services and APIs

**Laradock** is a full PHP development environment for Docker that Includes prepackaged Docker Images, all preconfigured to provide a wonderful PHP development environment. Laradock is well known in the Laravel/lumen community, as the project started with single focus on running Laravel projects on Docker.

## Usefull Links
- [Laradock](https://laradock.io/)
- [Lumen](https://lumen.laravel.com/)

## Requirements

To be able to run this project one needs the following technologies:

- [Docker](https://www.docker.com/) -> Laradock uses Docker
- [Composer](https://getcomposer.org/) -> No need if one uses Laradock/Docker

if one want to start Lumen from scratch Composer is need as a package manager.

## Instructions
Following the instructions one should be able to run this project or at least have a good base how to start a Lumen project using Laradock.

1. `git clone git@github.com:Jakub41/Lumen-Simple-Blog-with-Laradock.git`
2. Rename `.env.example` file to `.env`. The
.env file is the environment file that deals with project configurations like database credentials, api keys, debug mode, application keys etc and this file is out of version control.
3. Set your application key to a random string. Typically, this string should be 32 characters long. In .env file it is called eg APP_KEY=akkfjvlakengoemvgkcgelapchyekci
4. Laradock clone it inside the project folder `git clone https://github.com/laradock/laradock.git`
5. `cd laradock`
6. `cp env-example .env`
7. `docker-compose up -d nginx mysq` => To start the server
8. `docker-compose exec workspace bash` => to get access to virtual machine and here one can execute any artisan command
9. Run `composer instal` => to install all php dependencies. This will create a vendor folder which is the core lumen framework
10.  Inside `.env` file in the project root update `DB_HOST=mysql`
11. With a SQL tool as `Sequel Pro` or similar connect to the MySQL to create a new DB. Or use the Docker MySQL workspace bash to use commands instead.
12. Default values `username:root password:root host:mysql`
13. Update database name and else in `.env`

Remember all the the **Docker** commands have to be run it under **Laradock** folder as there the Docker files are placed.

If one wants to run this project as it is after `composer install` run migration as `php artisan migrate` to update the DB with the right tables. Then seed with `php artisan db:seed` to populate the DB with some fake data.

## Troubleshoot some possible issues
It is possible one has issues with connecting to MySQL image of Docker. A possible solution as follow:

From terminal
```
$ docker-compose exec mysql bash
$ mysql -u root -p

# Execute commands
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'root';
ALTER USER 'root'@'%' IDENTIFIED WITH mysql_native_password BY 'root';
ALTER USER 'default'@'%' IDENTIFIED WITH mysql_native_password BY 'secret';
```

May be need to restart the container after the changes
```
$ docker-compose down
$ docker-compose up -d nginx mysql
```

## Tutorial
How to create a **Simple Blog API**. Step by step explanations to get start with **Lumen**

**1) Create a Lumen project**

First one need to instal Lumen via Composer:
```
composer global require "laravel/lumen-installer"
```

Then can run:

```
lumen new blog
```

**2) Clone Laradock inside the Blog folder project**

The steps were showed above what to do with Laradock and Docker parts.

**3) Connect to the MySQL container**
One can connect via a program like Sequel Pro or Navicat or else to the MySQL container. Then need to create the DB.

Example of a connection set up:
![connectionDB](/images/2019/04/Edit_Connection_Laradock__MySQL.png)
