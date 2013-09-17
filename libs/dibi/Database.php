<?php

namespace libs\dibi;

class Database {
    
    /**
     * @var type 
     */
    protected static $instance = null;
    
    private function __construct() {
    }
    
    /**
     * @return \Database $instance
     */
    public static function getInstance()
    {
        if (!isset(static::$instance)) {
            $dns = "mysql:host=" . DB_HOST . ";dbname=". DB_NAME;
            static::$instance = new \PDO($dns, DB_USER, DB_PASS);
        }
        return static::$instance;
    }
    
    public function __sleep()
    {
        return array();
    }
}