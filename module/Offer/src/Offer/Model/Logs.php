<?php
namespace Offer\Model;

class Logs
{
    public $id;
    public $action;
    public $disc;
    public $user_id;
    public $read;
    public $date;
    public $city;
    
    protected $inputFilter;    

    public function exchangeArray($data)
    {
        $this->id     = (isset($data['id'])) ? $data['id'] : null;
        $this->action     = (isset($data['action'])) ? $data['action'] : null;
        $this->disc     = (isset($data['disc'])) ? $data['disc'] : null;
        $this->user_id     = (isset($data['user_id'])) ? $data['user_id'] : null;
        $this->read     = (isset($data['read'])) ? $data['read'] : null;
        $this->date     = (isset($data['date'])) ? $data['date'] : null;
        $this->city     = (isset($data['city'])) ? $data['city'] : null;
    }
    

}

