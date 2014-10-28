<?php
namespace Offer\Model;

class OfferCity
{
    public $id;
    public $id_offer;
    public $id_city;
    public $active;
    protected $inputFilter;    

    public function exchangeArray($data)
    {
        $this->id   = (isset($data['id'])) ? $data['id'] : null;
        $this->id_offer     = (isset($data['id_offer'])) ? $data['id_offer'] : null;
        $this->id_city     = (isset($data['id_city'])) ? $data['id_city'] : null;
        $this->active     = (isset($data['active'])) ? $data['active'] : null;
    }
    

}

