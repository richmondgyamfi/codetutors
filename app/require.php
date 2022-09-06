<?php
    //Require libraries from folder libraries
    //   echo $_SERVER['HTTP_HOST'];
    //   echo $_SERVER['REQUEST_URI'];
    //   echo 'pa';
    // echo  dirname(__FILE__);
    // die();
    require_once 'libraries/Core.php';
    // echo 'pa';
    // die();
    require_once 'libraries/Controller.php';

    require_once 'libraries/Database.php';

    require_once 'helpers/session_helper.php';

    require_once 'config/config.php';
    
    //Instantiate core class
    $init = new Core();
