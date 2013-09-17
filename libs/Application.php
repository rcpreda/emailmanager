<?php

namespace libs;

class Application {
    
    /**
     * @var string $basePath
     */
    protected $basePath = 'testrp';
    
    /**
     * @var string $path
     */
    protected $path;
    
    /**
     * @var string $module 
     */
    protected $module;
    
    /**
     * @var string $controller
     */
    protected $controller;
    
    /**
     * @var string $action
     */
    protected $action;
    
    /**
     * @var string $query
     */
    protected $query;
    

    /**
     * @return void 
     */
    public function __construct() {
        
        $this->basePath = BASE_SEGMENT;
        $path = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/");
        $path = preg_replace('/[^a-zA-Z0-9]\//', "", $path);
        if (strpos($path, $this->basePath) === 0) {
            $path = substr($path, strlen($this->basePath));
        };
        
        $this->path = $path;
        $pathParser = explode("/", $path, 4);
        
        $this->module = $this->detectModule($pathParser);
        $this->controller = $this->detectController($pathParser);
        $this->action = $this->detectAction($pathParser);
    }
    
    /**
     * @param array $pathParser
     * @return string
     */
    protected function detectModule(array $pathParser) {
        if (isset($pathParser[0]) && $pathParser[0] == 'admin' )
            return 'root\\admin'; 
        
        return 'root\\front';
    }
    
    /**
     * @param array $pathParser
     * @return array|string
     */
    protected function detectController(array $pathParser) {
        if (isset($pathParser[0]) && $pathParser[0] == 'admin' )
        {
            if (isset($pathParser[1]) && $pathParser[1]) {
                return $pathParser[1];
            }
        } elseif ($pathParser[0]) {
            return $pathParser[0];
        }
        
        return 'index';
    }
    
    /**
     * @param array $pathParser
     * @return array|string
     */
    protected function detectAction(array $pathParser) {
        if (isset($pathParser[0]) && $pathParser[0] == 'admin' )
        {
            if (isset($pathParser[2]) && $pathParser[2]) {
                return $pathParser[2];
            }
        } elseif (isset($pathParser[1]) && $pathParser[1]) {
            return $pathParser[1];
        }
        
        return 'index';
    }
    
    /**
     * @return array
     */
    protected function detectQuery() {
        return $_SERVER['QUERY_STRING'];
    }
    
    /**
     * @throws Exception
     * @throws \InvalidArgumentException
     */
    public function run() {
        
        $classNamespace = sprintf("%s\%sController", $this->module, ucfirst(strtolower($this->controller)));
        $filepath = sprintf("%s%s.php", REAL_PATH, str_replace("\\",DIRECTORY_SEPARATOR, $classNamespace));
        
        if (!is_file($filepath))
            throw new \Exception("Controller: ".$this->controller." dosn't exist!");
        
        $class = new $classNamespace(array($this->controller, $this->action, $this->module));
        $actionNamespace = sprintf("%sAction", strtolower($this->action));
        
        if (!method_exists($class, $actionNamespace)) {
            throw new \InvalidArgumentException("The controller action: ".$this->action." has been not defined.");
        }
        
        call_user_func_array(array($class, $actionNamespace), array());
    }

}
