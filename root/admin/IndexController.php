<?php

namespace root\admin;

use \libs\ControllerAbstract;


class IndexController extends ControllerAbstract {

    /**
     * @retrun void
     */
    public function indexAction() {
        $db = \libs\dibi\Database::getInstance();
        $mailService = new \libs\Services\MailService($db);
        $this->temnplate->values['emails'] = $mailService->getAllEmails();
        $this->temnplate->display();
    }
    
    /**
     * @retrun void
     */
    public function addAction() {
        $this->temnplate->values['token'] = 'here index';
        $this->temnplate->display();
    }

}
