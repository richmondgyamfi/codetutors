<?php
    //Database params
    header("Access-Control-Allow-Origin: *");
    define('DB_HOST', '192.168.0.28'); //Add your db host
    define('DB_USER', 'hrms'); // Add your DB root
    define('DB_PASS', 'o$%^Ab$@c296O60dF42$C&e959*!dc$$&e1bD36@3o48!'); //Add your DB pass
    define('DB_NAME', 'hrmscode'); //Add your DB Name

    //APPROOT
    define('APPROOT', dirname(dirname(__FILE__)));
    define('APPROOT2', dirname(dirname(dirname(__FILE__))));
    define('EMAIL', 'rnketia25@gmail.com');
    define('PASS', '');

    //URLROOT (Dynamic links)
    define('URLROOT', 'https://hrmscode.ucc.edu.gh');

    //Sitename
    define('SITENAME', 'CODE HRMS');
