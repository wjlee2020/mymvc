<?php
// database params
define('DB_HOST', 'localhost');
define('DB_USER', 'root'); // enter username
define('DB_PASS', '123456'); // enter pw
define('DB_NAME', 'mymvc'); // enter db name

//dirname returns parent directory path. do it twice to go up one more level
// App Root
define('APPROOT', dirname(dirname(__FILE__)));
// URL Root
define('URLROOT', 'http://localhost/mymvc'); // use own url
// Site Name
define('SITENAME', 'MyMVC'); // use own site name
