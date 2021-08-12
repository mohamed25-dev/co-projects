 
## Company Projects and newsletter

### Running the App =>

`composer install`

`npm install`
 
Create a database and add it to your .env file

Add this line to your .env file

`FILESYSTEM_DRIVER=public`


Also the queue connection should be changed to database this way

`QUEUE_CONNECTION=database`


After that execute this command

`php artisan storage:link`

Generate a key using this command

`php artisan key:generate`

Run the db migration command with the seed option

`php artisan migrate:fresh --seed`

In your .env file change the `APP_URL` to the url you are using to run the app

In your .env file change the `MAIL_MAILER` to the mail you want to use 

Now run your app using the serve command

`php artisan serve`

And start the queue using this command

`php artisan queue:work`
