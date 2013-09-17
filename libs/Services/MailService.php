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
        
    }
    
    /**
     * @param int $emailId
     * @return \libs\Entities\Email
     */
    public function getEmailById($emailId) {
        
        $query = "SELECT * FROM email where emailId=?";
        $proc = $this->db->prepare($query);
        $proc->bindParam(1, $emailId, \PDO::PARAM_INT);
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
        
    }
    
}