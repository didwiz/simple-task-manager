## About

This is a simple task management app with the following features. Kindly note that this app is not mobile responsive. It is recommended you view and use on desktop mode.

# Features

## projects
- Ability to create a project

## TaskLists
-  Ability to create a task list
-  Ability to delete a task list along with it's tasks.

## Tasks
-  Ability to create a task.
-  Ability to edit a task.
- Ability to delete a task.
- Ability to reorder tasks via drag and drop with changes persisted in the database.
- Ability to move tasks across different task list and have those changes persisted in the database.

## Notification
- New Project created

## Tests
 - Tests for tasks create & edit.

## Deployment
-You can setup this project using Docker by doing the following;
0. Ensure you have installed docker and it's up and running.
1. Run `sail composer install` & `sail npm install`
2. Ensure you have created a mysql database and that you have updated the `.env` file.
3. Run migration via `sail artisan migrate:fresh --seed`. This would run the migration files and also run the necessary seeders.
4. Ensure you set up your `.env` with custom port parameters for docker if necessary. These are part of the commonly used port parameters `APP_PORT=8081` & `FORWARD_DB_PORT=3307`
5. Build the app by running `sail npm run dev` or `sail npm run build`
6. `docker-compose.yml` contains the standard docker configurations for this project.

-You can also setup the project without Docker.
1. Run `composer install` & `npm install`
2.  Ensure you have created a mysql database and that you have updated the `.env` file.
3. Run migration via `php artisan migrate:fresh --seed`. This would run the migration files and also run the necessary seeders.
4. Build the app by running `npm run dev` or `npm run build`


## Video
You may also watch the [demo here](https://www.loom.com/share/279aac3f3ecc41c2b1bbce256c5b22a4?sid=94d87249-0a82-43b0-b3f8-77115a87647e).
