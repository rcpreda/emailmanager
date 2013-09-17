<?php

define('DB_HOST','localhost');
define('DB_NAME','dbtest');
define('DB_USER','test');
define('DB_PASS','test');

define('BASE_SEGMENT','newtest');
define('LAYOUT_NAME','test');

include APPLICATION_LIBS . 'ClassLoader.php';

$loader = new \Autoload\ClassLoader();
$loader->add('libs\\', ROOT_PATH . '..' .DIRECTORY_SEPARATOR);
$loader->add('libs', ROOT_PATH . '..' .DIRECTORY_SEPARATOR);
$loader->add('root\\', ROOT_PATH . '..' .DIRECTORY_SEPARATOR);
$loader->add('root', ROOT_PATH . '..' .DIRECTORY_SEPARATOR);
$loader->register();
$loader->setUseIncludePath(true);

try {
    $app = new libs\Application();
    $app->run();
} catch (Exception $e) {
    echo $e->getMessage();
}
