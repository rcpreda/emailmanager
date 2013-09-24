<?php

namespace libs\Services;

use \libs\Entities\Email;

class MailService {
    
    /**
     *
     * @var \libs\dibi\Database $db 
     */
    protected $db;

    /**
     * @param \libs\dibi\Database $db
     */
    public function __construct(\PDO $db) {
        $this->db = $db; 
    }
    
    /**
     * @param \libs\Entities\Email $mail
     */
    public function save(Email $mail) {
        
        $id = 'NULL';
        $name = $mail->getEmailName();
        $subject = $mail->getSubject();
        $content = $mail->getContent();
        $from = $mail->getFrom();
        $fromName = $mail->getFromName();
        $to = $mail->getTo();
        $toName = $mail->getToName();
        $cc = $mail->getCc();
        $bcc = $mail->getBcc();
        $dc = $mail->getDc();
        $dm = $mail->getDm();
        
        $query = "INSERT INTO email values (?,?,?,?,?,?,?,?,?,?,?,?)";
        $proc = $this->db->prepare($query);
        $proc->bindParam(1, $id, \PDO::PARAM_STR, 20);
        $proc->bindParam(2, $name, \PDO::PARAM_STR, 255);
        $proc->bindParam(3, $subject, \PDO::PARAM_STR, 255);
        $proc->bindParam(4, $content, \PDO::PARAM_STR, 5000);
        $proc->bindParam(5, $from, \PDO::PARAM_STR, 225);
        $proc->bindParam(6, $fromName, \PDO::PARAM_STR, 225);
        $proc->bindParam(7, $to, \PDO::PARAM_STR, 225);
        $proc->bindParam(8, $toName, \PDO::PARAM_STR, 225);
        $proc->bindParam(9, $cc, \PDO::PARAM_STR, 225);
        $proc->bindParam(10, $bcc, \PDO::PARAM_STR, 225);
        $proc->bindParam(11, $dc, \PDO::PARAM_STR, 225);
        $proc->bindParam(12, $dm, \PDO::PARAM_STR, 225);
        $proc->execute();
    }
    
    /**
     * @param int $emailId
     * @return \libs\Entities\Email
     */
    public function getEmailById($emailId) {
        
        $id = (int) $emailId;
        $query = "SELECT * FROM email where emailId=?";
        $proc = $this->db->prepare($query);
        $proc->bindParam(1, $id, \PDO::PARAM_INT);
        $proc->execute();
        
        $rowset = NULL;
        
        do {
            $rowset = $proc->fetchAll(\PDO::FETCH_ASSOC);
        } while ($proc->nextRowset());
        if (!empty($rowset)) {
           return new Email(array_shift($rowset));
        }
        return NULL;
    }
    
    /**
     * @param \libs\Entities\Email $mail
     */
    public function update(Email $mail) {
        
        $id = $mail->getEmailId();
        $name = $mail->getEmailName();
        $subject = $mail->getSubject();
        $content = $mail->getContent();
        $from = $mail->getFrom();
        $fromName = $mail->getFromName();
        $to = $mail->getTo();
        $toName = $mail->getToName();
        $cc = $mail->getCc();
        $bcc = $mail->getBcc();
        $dc = $mail->getDc();
        $dm = date('Y-m-d H:i:s');
        
        
        //die('here');
        $query = "UPDATE email set `emailName` = ?, `subject` = ?, `content` = ?, `from` = ?, `fromName` = ?, `to` = ?, `toName` = ?, `cc` = ?, `bcc` = ? , `dm` = ? where emailId = ?";
        $proc = $this->db->prepare($query);
        $proc->bindParam(1, $name, \PDO::PARAM_STR, 255);
        $proc->bindParam(2, $subject, \PDO::PARAM_STR, 255);
        $proc->bindParam(3, $content, \PDO::PARAM_STR, 5000);
        $proc->bindParam(4, $from, \PDO::PARAM_STR, 225);
        $proc->bindParam(5, $fromName, \PDO::PARAM_STR, 225);
        $proc->bindParam(6, $to, \PDO::PARAM_STR, 225);
        $proc->bindParam(7, $toName, \PDO::PARAM_STR, 225);
        $proc->bindParam(8, $cc, \PDO::PARAM_STR, 225);
        $proc->bindParam(9, $bcc, \PDO::PARAM_STR, 225);
        $proc->bindParam(10, $dm, \PDO::PARAM_STR, 225);
        $proc->bindParam(11, $id, \PDO::PARAM_INT);
        $proc->execute();
        
    }
    
    /**
     * @param \libs\Entities\Email $mail
     * @throws \Exception
     */
    public function delete(Email $mail) {
        
        $id = $mail->getEmailId();
        if (!$id)
            throw new \Exception('No email found!');
        
        $query = "DELETE FROM email WHERE  emailId = ?;";
        $proc = $this->db->prepare($query);
        $proc->bindParam(1, $id, \PDO::PARAM_INT);
        $proc->execute();
    }
    
    /**
     * @param int $emailId
     * @return \libs\Entities\Email
     */
    public function getAllEmails() {
        
        $query = "SELECT * FROM email";
        $proc = $this->db->prepare($query);
        $proc->bindParam(1, $emailId, \PDO::PARAM_INT);
        $proc->execute();
        
        $rowset = NULL;
        do {
            $rowset[] = $proc->fetchAll(\PDO::FETCH_ASSOC);
        } while ($proc->nextRowset());
        if (!empty($rowset)) {
           return array_map(array($this, "mapElements"), array_shift($rowset));
        }
        return NULL;
    }
    
    /**
     * @param array $row
     * @return \libs\Entities\Email
     */
    public function mapElements($row) {
        return new Email($row);
    }
    
}