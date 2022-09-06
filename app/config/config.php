<?php
    //Database params
    header("Access-Control-Allow-Origin: *");
    define('DB_HOST', '127.0.0.1'); //Add your db host
    define('DB_USER', 'root'); // Add your DB root
    define('DB_PASS', 'iamRichmond@1234'); //Add your DB pass
    define('DB_NAME', 'hrmscode'); //Add your DB Name

    //APPROOT
    define('APPROOT', dirname(dirname(__FILE__)));
    define('APPROOT2', dirname(dirname(dirname(__FILE__))));
    define('EMAIL', 'rnketia25@gmail.com');
    define('PASS', '');

    //URLROOT (Dynamic links)
    define('URLROOT', 'http://localhost:8110');

    //Sitename
    define('SITENAME', 'IOE TUTORS');