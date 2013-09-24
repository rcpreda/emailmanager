<?php

namespace root\admin;

use \libs\ControllerAbstract;
use \libs\Services\MailService;


class IndexController extends ControllerAbstract {
    
    /**
     * @var \PDO $db
     */
    protected $db;
    
    /**
     * @var \libs\Services\MailService $mailService
     */
    protected $mailService;
    
    /**
     * @var \libs\Entities\Email $email
     */
    protected $email;
    
    /**
     * @return Void
     */
    public function init() {
        parent::init();
        try {
            $this->db = \libs\dibi\Database::getInstance();
            $this->mailService = new MailService($this->db);
            if (isset($_GET['emailId']) &&  $_GET['emailId']) {
                $this->email = $this->mailService->getEmailById($_GET['emailId']);
                if (!$this->email) {
                    header('Location: http://'.BASE_SEGMENT.'/admin/');
                    die;
                }
                    
            }
        } catch (\Exception $e) {
            header('Location: http://'.BASE_SEGMENT.'/admin/');
            die;
        }
    }
    
    /**
     * @retrun void
     */
    public function indexAction() {
        $this->temnplate->values['emails'] = $this->mailService->getAllEmails();
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
                $values['fromName'] = isset($_POST['fromName']) && $_POST['fromName'] ? $_POST['fromName'] : NULL;
                $values['to'] = isset($_POST['to']) && $_POST['to'] ? $_POST['to'] : NULL;
                $values['toName'] = isset($_POST['toName']) && $_POST['toName'] ? $_POST['toName'] : NULL;
                $values['cc'] = isset($_POST['cc']) && $_POST['cc'] ? $_POST['cc'] : NULL;
                $values['bcc'] = isset($_POST['bcc']) && $_POST['bcc'] ? $_POST['bcc'] : NULL;
                
                $email = new \libs\Entities\Email($values);
                $db = \libs\dibi\Database::getInstance();
                $mailService = new \libs\Services\MailService($db);
                $mailService->save($email);
                
                header('Location: http://'.BASE_SEGMENT.'/admin/');
                die;
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
            die;
        }
        
        $this->temnplate->values['email'] = $email;
        $this->temnplate->display();
    }
    
    /**
     * @return Void
     * @throws \Exception
     */
    public function deleteAction() {
        
        try {
            $this->mailService->delete($this->email);
            header('Location: http://'.BASE_SEGMENT.'/admin/');
            die;
        } catch (\Exception $e) {
            echo $e->getMessage();
            die;
        }
    }
    
    /**
     * @return Void
     * @throws \Exception
     */
    public function editAction() {
        
        $values = NULL;
        $email = NULL;
        try {
            if (isset($_POST['submit']) && $_POST['submit']) {
                
                if (isset($_POST['emailName']) && $_POST['emailName'] )
                    $this->email->setEmailName($_POST['emailName']);
                
                if (isset($_POST['subject']) && $_POST['subject'] )
                    $this->email->setSubject($_POST['subject']);
                
                if (isset($_POST['content']) && $_POST['content'] )
                    $this->email->setContent($_POST['content']);
                
                if (isset($_POST['from']) && $_POST['from'] )
                    $this->email->setFrom($_POST['from']);
                
                if (isset($_POST['fromName']) && $_POST['fromName'] )
                    $this->email->setFromName($_POST['fromName']);
                
                if (isset($_POST['to']) && $_POST['to'] )
                    $this->email->setTo($_POST['to']);
                
                if (isset($_POST['toName']) && $_POST['toName'] )
                    $this->email->setToName($_POST['toName']);
                
                if (isset($_POST['cc']) && $_POST['cc'] )
                    $this->email->setCc($_POST['cc']);
                
                if (isset($_POST['bcc']) && $_POST['bcc'] )
                    $this->email->setBcc($_POST['bcc']);
                
                $this->mailService->update($this->email);
                header('Location: http://'.BASE_SEGMENT.'/admin/');
                die;
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
            die;
        }
        
        $this->temnplate->values['email'] = $this->email;
        $this->temnplate->display();
    }
}
