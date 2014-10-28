<?php
namespace Offer\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class aOfferTable
{
    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }
    
    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        
        return $resultSet;
    }
    
    public function getaCityId($id_offer)
    {
        $resultSet = $this->tableGateway->select(function(Select $select) use ($id_offer){
        $select->where(array(
                'id_offer' => $id_offer
            )
        );});
        return $resultSet;
    }

    public function addAdressOffer($offer)
    {
        $this->tableGateway->insert($offer);    
    }
    
    public function getAdressByOfferId($li)
    {
        $resultSet = $this->tableGateway->select(function(Select $select) use ($li){
        $select->where(array(
                'id_offer' => $li
            )
        );});
        $row = $resultSet->current();
        return $row;
    }
}
