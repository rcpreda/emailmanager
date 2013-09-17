<?php

class Controller {
    
    protected $controllerName;
    protected $controllerAction;
    protected $moduleName;
    
    function __construct($info) {

        $this->controllerName = isset($info[0]) ? $info[0] : NULL;
        $this->controllerAction = isset($info[1]) ? $info[1] : NULL;
        $this->moduleName = isset($info[2]) ? $info[2] : NULL;
        $this->init();
    }
    
    public function getControllerName() {
        return $this->controllerName;
    }

    public function setControllerName($controllerName) {
        $this->controllerName = $controllerName;
    }

    public function getControllerAction() {
        return $this->controllerAction;
    }

    public function setControllerAction($controllerAction) {
        $this->controllerAction = $controllerAction;
    }
    
    public function getModuleName() {
        return $this->moduleName;
    }

    public function setModuleName($moduleName) {
        $this->moduleName = $moduleName;
    }

}
