# MyMVC Framework
This was my first time creating an mvc framework. I come from frontend/js (React) background and so it was a great challenge learning Class/OOP and the MVC framework. I'm sure I have a lot more to edit and refactor.

## HTACCESS

These files help coordinate urls. <br>
Go into the public folder -> .htaccess.<br>
Line 4 should be changed to your local url. <br>
Basically, these .htaccess files help us route us into the public index.php file.

## App > config

Go into the App > config file and change the necessary named constants. <br>
These named constants should correspond w/ your local environment. <br>

## Core.php

This basically creates our urls and loads our controllers. <br>
The contructor will run the getUrl() which returns us a nicely trimmed, 'exploded' url. <br>
By getting back the url, the constructor will fetch (require_once) the url's controller. <br>
As the url returned is an array (explode returns an array), the 1st index will contain the params for the method. <br>

## Classes

This includes the autoload_register so that we can instantiate classes (or extend them)

## Controllers

Don't forget to include a public function index() {} method into your controller classes. <br>
In the Core.php, the $currentMethod is set to 'index'. If you are on your localhost/app root, you will get an error without this index method inside your newly created controller.
