
Steps for setup Dynamic Module

1-Download module from git repo  
2-composer create-project --prefer-dist laravel/laravel Dynamic-forms
3-Create databse with name "dynamic_form" in .env 
4-php artisan migrate
5-php artisan db:seed --class=UserTableSeeder
6-Go to project directory and open cmd hit php artisan serve
7-project start


Overview about module-:

This project revolves around a dynamic form builder with two roles: admin and normal user. The admin creates fields for user forms and sets validations for each field. Users fill out the forms with the specified validations. The system then counts and displays the submissions, showing the data in a table format on the admin side. Admins can view each form's user data. The most challenging aspect for me was the schema implementation.

https://prnt.sc/r2cjKwDtm3cv

Time:3hrs

Pending:None

DB file:inside project folder name -:dynamic_forms.sql
