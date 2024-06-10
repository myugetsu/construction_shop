## Construction CMS

The application uses Docker Installation Using Sail which you can read more on how to install sail from the laravel documentation https://laravel.com/docs/11.x#docker-installation-using-sail

otherwise you must first have docker installed in your system which you can download from https://docs.docker.com/engine/install/

after installing docker you can run the command from the terminal or any other command line tool

```
docker-compose up

```
this will install all the dependancies need to run the application once that is done you can run

```
./vendor/bin/sail up
```
which will start the app and you should be able to access the app from
```
http://localhost or http://0.0.0.0:80
```
once the up is up and running you should open another terminal to run the command

```
./vendor/bin/sail artisan migrate
```
to setup the database

```
./vendor/bin/sail artisan db:seed
```
to run the seed data for the admin user


once the app has started you can register as a vendor or customer using http://localhost/vendor/register and http://localhost/customer/register respectively though most of the UI is incomplete as for the APIs to perform CRUD operations for the items has already been implemented the process of linking with the UI is still not complete
