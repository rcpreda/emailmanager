<?php

namespace libs\Entities;


class Email {
    
    /**
     * @var int $emailId
     */
    protected $emailId;
    
    /**
     * @var string $subject
     */
    protected $subject;
    
    /**
     * @var string $content
     */
    protected $content;
    
    /**
     * @var string $from
     */
    protected $from;
    
    /**
     * @var string $to
     */
    protected $to;
    
    /**
     * @var string $dc
     */
    protected $bcc;
    
    /**
     * @var datetime $dc
     */
    protected $dc;
    
    /**
     * @var datetime $dm
     */
    protected $dm;
    
    public function __construct(array $info) {
        
        if (!isset($info['subject']) || !$info['subject'])
            throw new Exception('Subject is missing!');
        
        if (!isset($info['content']) || !$info['content'])
            throw new Exception('Message is missing!');
        
        if (!isset($info['from']) || !$info['from'])
            throw new Exception('From email missing!');
        
        if (!isset($info['to']) || !$info['to'])
            throw new Exception('From email missing!');
        
        
        $this->emailId = $info['emailId'];
        $this->subject = $info['subject'];
        $this->content = $info['content'];
        $this->from = $info['from'];
        $this->to = $info['to'];
        $this->bcc = $info['bcc'];
        $this->dc = $info['dc'];
        $this->dm = $info['dm'];
    }
    
    public function setSubject($subject) {
        $this->subject = $subject;
    }
    
    public function getSubject() {
        return $this->subject;
    }
    
    public function getEmailId() {
        return $this->emailId;
    }

    public function setEmailId($emailId) {
        $this->emailId = $emailId;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function getFrom() {
        return $this->from;
    }

    public function setFrom($from) {
        $this->from = $from;
    }

    public function getTo() {
        return $this->to;
    }

    public function setTo($to) {
        $this->to = $to;
    }

    public function getBcc() {
        return $this->bcc;
    }

    public function setBcc($bcc) {
        $this->bcc = $bcc;
    }

    public function getDc() {
        return $this->dc;
    }

    public function setDc(datetime $dc) {
        $this->dc = $dc;
    }

    public function getDm() {
        return $this->dm;
    }

    public function setDm(datetime $dm) {
        $this->dm = $dm;
    }
    
}