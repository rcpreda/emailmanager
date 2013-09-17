<?php

namespace libs;

class Template {

    /**
     * @var string $template
     */
    public $template = '';

    /**
     * Default template directory
     * @var string path  
     */
    protected $dir;

    /**
     * Default layout directory
     * @var string path  
     */
    protected $layoutDir;
    
    /**
     * Values passed to templates
     * @var array $values
     */
    public $values = array();
    
    /**
     * @var IController $controller 
     */
    protected $controller;
    
    /**
     * @return Void
     */
    public function __construct(IController $controller) {
        
        $dirPath = sprintf("%s%s%s",REAL_PATH, str_replace("\\", DIRECTORY_SEPARATOR, $controller->getModuleName()), DIRECTORY_SEPARATOR);
        $this->layoutDir = sprintf("%s%s%s%s%s", $dirPath, strtolower('layout'), DIRECTORY_SEPARATOR, LAYOUT_NAME, DIRECTORY_SEPARATOR);
        $this->dir = sprintf("%s%s%s%s%s%s", REAL_PATH, str_replace("\\", DIRECTORY_SEPARATOR, $controller->getModuleName()), DIRECTORY_SEPARATOR, strtolower('Templates') , DIRECTORY_SEPARATOR, ucfirst($controller->getControllerName()));
        
        $this->template = sprintf("%s%s%s.php", $this->dir, DIRECTORY_SEPARATOR, $controller->getControllerAction());
        $this->controller = $controller;
    }

    /**
     * @return string
     */
    public function load() {
        
        if (!is_dir($this->dir)) 
            throw new \Exception('Folder name is missing!');
        
        if (!is_file($this->template)) 
            throw new \Exception('Missing action template for '.$this->controller->getControllerAction().'!');
        
        // layout files
        $layoutHeader = sprintf("%s%s", $this->layoutDir, 'header.php' );
        $layoutFooter = sprintf("%s%s", $this->layoutDir, 'footer.php' );
        
        // $data is a good convention to use in view files,
        $data = (array) $this->values;
        ob_start();
        
        if (is_file($layoutHeader))
            include  $layoutHeader;
        include $this->template;
        if (is_file($layoutFooter))
            include  $layoutFooter;
        $contents = ob_get_contents();
        ob_end_clean();
        
        // Return contents of include + $values populated data
        return $contents;
    }

    /**
     * @retrun void
     */
    public function display() {
        $contents = $this->load();
        if ($contents) {
            echo $contents;
        }
    }
}
