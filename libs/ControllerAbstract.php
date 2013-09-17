<?php

namespace libs;

abstract class ControllerAbstract  extends \Controller implements IController {
    
    /**
     *
     * @var \libs\Template $temnplate
     */
    protected $temnplate;
    
    /**
     * @return void
     */
    public function init() {
        $this->temnplate = new \libs\Template($this);
    }
}
