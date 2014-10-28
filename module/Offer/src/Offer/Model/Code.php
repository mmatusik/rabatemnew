<?php
namespace Offer\Model;

class Code
{
    public $id;
    public $offer_link;
    public $code;
    public $hash;
    public $host;
    public $email;
    public $use;
    
    protected $inputFilter;    

    public function exchangeArray($data)
    {
        $this->id     = (isset($data['id'])) ? $data['id'] : null;
        $this->offer_link    = (isset($data['offer_link'])) ? $data['offer_link'] : null;
        $this->code     = (isset($data['code'])) ? $data['code'] : null;
        $this->hash     = (isset($data['hash'])) ? $data['hash'] : null;
        $this->host     = (isset($data['host'])) ? $data['host'] : null;
        $this->email    = (isset($data['email'])) ? $data['email'] : null;
        $this->use     = (isset($data['use'])) ? $data['use'] : null;
    }
    

}

