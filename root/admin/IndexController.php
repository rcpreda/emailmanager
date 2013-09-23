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
        $values = NULL;
        $email = NULL;
        try {
            if (isset($_POST['submit']) && $_POST['submit']) {
                $values['emailName'] = isset($_POST['emailName']) ? $_POST['emailName'] : NULL;
                $values['subject'] = isset($_POST['subject']) ? $_POST['subject'] : NULL;
                $values['content'] = isset($_POST['content']) ? $_POST['content'] : NULL;
                $values['from'] = isset($_POST['from']) ? $_POST['from'] : NULL;
                $values['fromName'] = isset($_POST['fromName']) ? $_POST['fromName'] : NULL;
                $values['to'] = isset($_POST['to']) ? $_POST['to'] : NULL;
                $values['toName'] = isset($_POST['toName']) ? $_POST['toName'] : NULL;
                $values['cc'] = isset($_POST['cc']) ? $_POST['cc'] : NULL;
                $values['bcc'] = isset($_POST['toName']) ? $_POST['bcc'] : NULL;
                $date = new \DateTime;
                $values['dc'] = $date->format("'Y-m-d H:i:s");
                $values['dm'] = $date->format("'Y-m-d H:i:s");
                $email = new \libs\Entities\Email($values);
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
            die;
        }
        
        $this->temnplate->values['email'] = $email;
        $this->temnplate->display();
    }

}
