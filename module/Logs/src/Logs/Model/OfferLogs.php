<?php
namespace Logs\Model;

class OfferLogs
{
    public $id;
    public $action;
    public $offer_link;
    public $code;
    public $email;
    public $date;
    public $city;
    public $user_id;
    public $disc;
    protected $inputFilter;    

    public function exchangeArray($data)
    {
        $this->id     = (isset($data['id'])) ? $data['id'] : null;
        $this->action     = (isset($data['action'])) ? $data['action'] : null;
        $this->offer_link = (isset($data['offer_link'])) ? $data['offer_link'] : null;
        $this->code  = (isset($data['code'])) ? $data['code'] : null;
        $this->email  = (isset($data['email'])) ? $data['email'] : null;
        $this->date  = (isset($data['date'])) ? $data['date'] : null;
        $this->city  = (isset($data['city'])) ? $data['city'] : null;
        $this->user_id     = (isset($data['user_id'])) ? $data['user_id'] : null;
        $this->disc     = (isset($data['disc'])) ? $data['disc'] : null;
    }
    

}

