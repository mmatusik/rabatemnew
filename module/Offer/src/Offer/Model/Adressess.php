<?php
namespace Offer\Model;

class Adressess
{
    public $id;
    public $company;
    public $address;
    public $phone;
    public $city;
    public $email;
    public $website;
    protected $inputFilter;    

    public function exchangeArray($data)
    {
        $this->id     = (isset($data['id'])) ? $data['id'] : null;
        $this->company     = (isset($data['company'])) ? $data['company'] : null;
        $this->address     = (isset($data['address'])) ? $data['address'] : null;
        $this->phone     = (isset($data['phone'])) ? $data['phone'] : null;
        $this->city     = (isset($data['city'])) ? $data['city'] : null;
        $this->email     = (isset($data['email'])) ? $data['email'] : null;
        $this->website     = (isset($data['website'])) ? $data['website'] : null;
    }
    

}

