<?php
namespace Messages\Model;

class Messages
{
    public $id;
    public $subject;
    public $text;
    public $date;
    public $username;
    public $from;
    public $read;
    protected $inputFilter;    

    public function exchangeArray($data)
    {
        $this->id     = (isset($data['id'])) ? $data['id'] : null;
        $this->subject    = (isset($data['subject'])) ? $data['subject'] : null;
        $this->text = (isset($data['text'])) ? $data['text'] : null;
        $this->date  = (isset($data['date'])) ? $data['date'] : null;
        $this->username  = (isset($data['username'])) ? $data['username'] : null;
        $this->from  = (isset($data['from'])) ? $data['from'] : null;
        $this->read  = (isset($data['read'])) ? $data['read'] : null;
    }
    

}

