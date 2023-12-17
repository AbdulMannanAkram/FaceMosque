# FaceMosque Web application

## Overview
Welcome to the FaceMosque website, a project developed using Laravel. This web application is specifically tailored for the Chemnitz Mosque community, providing a platform for various functionalities to enhance communication and engagement within the community.

## Table of Contents

- Prerequisites
- Cloning the Repository
- Installation
- Configuration
- Starting the Project

## Prerequisites

- PHP
- Composer
- Database

```
    git clone https://github.com/AbdulMannanAkram/FaceMosque.git
    cd FaceMosque
    composer install
```


## Database Configuration
Update the .env file with the following information:

```
DB_CONNECTION=mysql
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

After updating the .env file, run the following command to migrate the database:

```
php artisan migrate
```

## Starting the Project

```
php artisan serve
```

Sign up as a new user and you are good to go!
