<?php 

//constanst for database connections
header("Access-Control-Allow-Origin: *");
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'comedigi_root');
define('DB_PASS', 'iamRichmond@1234');
define('DB_NAME', 'comedigi_db');

//APPROOT
define('APPROOT', dirname(dirname(__FILE__)));

//URLROOT creating dynamic link
define('URLROOT', 'https://www.comedigitalize.com');

//sitelink
define('SITENAME', 'ComeDigitalize')

 ?>