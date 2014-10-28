<?php
namespace Dashboard\Model;

class Offer
{
    public $id;
    public $name;
    public $disc;
    public $how;
    public $end_time;
    public $new_price;
    public $old_price;
    public $worth;
    public $recommended;
    public $link;
    public $pass;
    public $keyworlds;
    public $id_category;
    public $code_per_person;
    protected $inputFilter;    

    public function exchangeArray($data)
    {
        $this->id     = (isset($data['id'])) ? $data['id'] : null;
        $this->name     = (isset($data['name'])) ? $data['name'] : null;
        $this->disc = (isset($data['disc'])) ? $data['disc'] : null;
        $this->how  = (isset($data['how'])) ? $data['how'] : null;
        $this->end_time  = (isset($data['end_time'])) ? $data['end_time'] : null;
        $this->recommended  = (isset($data['recommended'])) ? $data['recommended'] : null;
        $this->worth  = (isset($data['worth'])) ? $data['worth'] : null;
        $this->new_price     = (isset($data['new_price'])) ? $data['new_price'] : null;
        $this->old_price    = (isset($data['old_price'])) ? $data['old_price'] : null;
        $this->link     = (isset($data['link'])) ? $data['link'] : null;
        $this->pass     = (isset($data['pass'])) ? $data['pass'] : null;
        $this->keyworlds     = (isset($data['keyworlds'])) ? $data['keyworlds'] : null;
        $this->id_category     = (isset($data['id_category'])) ? $data['id_category'] : null;
        $this->code_per_person     = (isset($data['code_per_person'])) ? $data['code_per_person'] : null;
    }
    

}

