<?php
namespace Offer\Model;

class City
{
    public $id;
    public $name;
    public $id_region;
    public $region;
    public $id_admin;
    public $link;
    protected $inputFilter;    

    public function exchangeArray($data)
    {
        $this->id     = (isset($data['id'])) ? $data['id'] : null;
        $this->name     = (isset($data['name'])) ? $data['name'] : null;
        $this->id_region     = (isset($data['id_region'])) ? $data['id_region'] : null;
        $this->link     = (isset($data['link'])) ? $data['link'] : null;
        $this->region     = (isset($data['region'])) ? $data['region'] : null;
        $this->id_admin     = (isset($data['id_admin'])) ? $data['id_admin'] : null;
    }
    

}

