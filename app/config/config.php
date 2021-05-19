<?php
// database params
define('DB_HOST', 'localhost');
define('DB_USER', '_YOUR_USER_'); // enter username
define('DB_PASS', '_YOUR_PASS_'); // enter pw, if you have a password
define('DB_NAME', '_YOUR_DB_NAME'); // enter db name

//dirname returns parent directory path. do it twice to go up one more level
// App Root
define('APPROOT', dirname(dirname(__FILE__)));
// URL Root
define('URLROOT', 'http://localhost/_YOUR_ROOT_URL_'); // use own url
// Site Name
define('SITENAME', '_YOUR_SITE_NAME'); // use own site name (used for header title)
