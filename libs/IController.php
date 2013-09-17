<?php

namespace libs;

interface IController {
    
    public function init();
    public function getControllerName();
    public function getControllerAction();
    public function getModuleName();
}