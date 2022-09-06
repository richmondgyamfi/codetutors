<?php
    //Database params
    header("Access-Control-Allow-Origin: *");
    define('DB_HOST', '192.168.0.10'); //Add your db host
    define('DB_USER', 'rnketia'); // Add your DB root
    define('DB_PASS', '123456'); //Add your DB pass
    define('DB_NAME', 'topup_application'); //Add your DB Name

    //APPROOT
    define('APPROOT', dirname(dirname(__FILE__)));
    define('APPROOT2', dirname(dirname(dirname(__FILE__))));

    //URLROOT (Dynamic links)
    define('URLROOT', 'https://ioetutors.ucc.edu.gh');

    //Sitename
    define('SITENAME', 'IOE TUTORS');
