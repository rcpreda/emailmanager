<?php

namespace root\front;

use \libs\ControllerAbstract;

class IndexController extends ControllerAbstract {

    const EMAIL_TEST = 1;

    /**
     * @return void
     */
    public function indexAction() {
//        $db = \libs\dibi\Database::getInstance();
//        $mailService = new \libs\Services\MailService($db);
//        $emailEntity = $mailService->getEmailById(self::EMAIL_TEST);
//        var_dump($emailEntity);
//        die;

        //$mailTransport = new libs\PHPMailer\PHPMailer();
        //$mailServer = new libs\MailServer($mailTransport);


//        $mail = new libs\PHPMailer\PHPMailer();
//        $mail->SetFrom('noreply@Provident247.com', 'Provident');
//        $mail->AddAddress('razvan.preda@tuxedomoney.com', 'Razvan');
//        $mail->Subject = 'Confirmation!';
//        $mail->MsgHTML("<div>Test</div><br />Test test");
//        //$mail->AddAttachment($filePath);
//        if ($mail->Send()) {
//            var_dump('sendt');
//        }

        //$this->temnplate->values['token'] = 'info';
        $this->temnplate->display();
    }
    
    /**
     * @return void
     */
    public function addAction() {
        $this->temnplate->values['token'] = 'here add action';
        $this->temnplate->display();
    }

}
