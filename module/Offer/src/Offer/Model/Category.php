<?php
namespace Offer\Model;

class Category
{
    public $id;
    public $name;
    protected $inputFilter;    

    public function exchangeArray($data)
    {
        $this->id     = (isset($data['id'])) ? $data['id'] : null;
        $this->name     = (isset($data['name'])) ? $data['name'] : null;
    }
    

}

