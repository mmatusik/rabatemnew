<?php
namespace Offer\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class OfferCityTable
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
    public function addOfferCity($offer)
    {
        $this->tableGateway->insert($offer);    
    }
    
    public function getNotActive()
    {
        $resultSet = $this->tableGateway->select(function(Select $select){
        $select->where(array(
                'active' => 0,
            )
        );});
        return $resultSet;
    }
    
    public function getActive()
    {
        $resultSet = $this->tableGateway->select(function(Select $select){
        $select->where(array(
                'active' => 1,
            )
        );});
        return $resultSet;
    }
    
    public function getOfferId($link)
    {
        $resultSet = $this->tableGateway->select(function(Select $select) use ($link){
        $select->where(array(
                'id' => $link,
            )
        );});
        $row = $resultSet->current();
        return $row;
    }
    
    public function acceptOffer($offer, $id)
    {
        $this->tableGateway->update($offer, array('id' => $id));    
    }
    
    public function refuseOffer($id)
    {
        $this->tableGateway->delete(array('id' => $id));    
    }
    
    public function fetchOffers($id)
    {
        $resultSet = $this->tableGateway->select(function(Select $select) use ($id){
        $select->where(array(
                'id_city' => $id,
                'active' => 1,
            )
        );});
        return $resultSet;
    }  
}
