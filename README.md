# Tasks-Manager-Laravel-API
Design and implement an API using Laravel to manage tasks.
This API will allow logged-in users to create, read, update and delete tasks.

## Configuration

### Requirements
    -   PHP (lts)
    -   Composer
    -   MySQL
    -   NodeJs & NPM

### Installation

1. Clone the repository:

```bash
    git clone git@github.com:linerol/Tasks-Manager-Laravel-API.git
```

2. Open the repository:

```bash
    cd Tasks-Manager-Laravel-API
```

3. Install the dependencies:

```bash
    composer install
```

4. Create a new database
<!-- I will show you how to create and set a new database with MySQl.
    But you can use another Database Server -->

```bash
    # connection to mysql
    sudo mysql -u root -p

    # create a new database
    CREATE DATABASE tasks_manager;

    # create a new user. you can replace "myuser" and "password"
    CREATE USER 'myuser'@'localhost' IDENTIFIED BY 'password';

    # grant privileges to the user
    GRANT ALL PRIVILEGES ON tasks_manager.* TO 'myuser'@'localhost';
    # flush privileges
    FLUSH PRIVILESGES;

    # exit from mysql
    exit;

```

5. Copy the `.env.example` file and rename it to `.env`.

```bash
    cp .env.example .env
```

6. Update the `.env` file with the database credentials:
<!-- By Default, you have to modify these field to use the database created 
    previously -->
    -   DB_DATABASE=task_manager
    -   DB_USERNAME=myuser
    -   DB_PASSWORD=password

7. Run the migrations:

```bash
    php artisan migrate
```

## Execution

```bash
    php artisan serve
```

Your laravel Application will be accessible at https://127.0.0.1:8000 address

## ENDPOINTS API

### List all tasks
    -   URL :   /api/tasks
    -   Method :   GET
    -   Description :   Get all tasks and print them in json format.
    -   Example of request : curl http://127.0.0.1:8000/api/tasks

### Display a specific task
    -   URL : /api/tasks/{id}
    -   Method : GET
    -   Description : Display informations about a specific tasks thanks to his ID.
    -   Example of request : curl http://127.0.0.1:8000/api/tasks/1

### Create a new task
    -   URL : /api/tasks
    -   Method : POST
    -   Description : Create a new task and add it to the remaining in the database.
    -   Example of request : curl -X POST -H "Content-Type: application/json" -d '{"title":"New Task", "description":"Task's description", etc...}' http://127.0.0.1:8000/api/tasks

### Update information about an existing task
    -   URL : /api/tasks/{id}
    -   Method : PUT or PATCH
    -   Description : Updates an existing task based on the ID.
    -   Example of request : curl -X PUT -H "Content-Type: application/json" -d '{"title":"Task update", "description":"Description update", etc...}' http://127.0.0.1:8000/api/tasks/1

### Delete task
    -   URL : /api/tasks/{id}
    -   Method : DELETE
    -   Description : Deletes a job according to ID.
    -   Example of request : curl -X DELETE http://127.0.0.1:8000/api/tasks/1


## CONTRIBUTION
If you would like to contribute to this project, please contact
one of the authors for instructions on how to contribute.

## Authors
Linerol Tchecounnou
email: sessi.tchecounnou@epitech.eu
