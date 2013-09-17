<?php

namespace root\admin;

use \libs\ControllerAbstract;


class IndexController extends ControllerAbstract {
    
    public function indexAction() {
        //$this->temnplate->values['token'] = 'here index';
        $this->temnplate->display();
        
    }
    
    public function addAction() {
        $this->temnplate->values['token'] = 'here index';
        $this->temnplate->display();
    }

}
