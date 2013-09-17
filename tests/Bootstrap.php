<?php

error_reporting(E_ALL | E_STRICT);
chdir(dirname(__DIR__));

define('ROOT_PATH', realpath(__DIR__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR );

define('APP_LIBS', ROOT_PATH . 'libs' .DIRECTORY_SEPARATOR);

define('DB_HOST','localhost');
define('DB_NAME','provi');
define('DB_USER','provi');
define('DB_PASS','testprovi');

include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'bootstrap.php';




class Bootstrap
{
    public static function init()
    {
        
    }
}

Bootstrap::init();

unset($db);