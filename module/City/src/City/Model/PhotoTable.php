<?php
namespace City\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class PhotoTable
{
    protected $tableGateway;
    private $limit;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchall($id_offer)
    {
         $resultSet = $this->tableGateway->select(function(Select $select) use ($id_offer){
            $select->where(array(
                    'id_offer' => $id_offer
                )
            );});
        $resultSet->buffer();
        return $resultSet;
    }
    
    public function fetchmain($id_offer)
    {
        $resultSet = $this->tableGateway->select(function(Select $select) use ($id_offer){
            $select->where(array(
                    'id_offer' => $id_offer,
                    'main' => 1,
                )
            );});
        $row = $resultSet->current();
        return $row;
    }
    
    public function addPhoto($array) {
        $this->tableGateway->insert($array);    
    }
    
    public function setMain ($photo_id, $offer_id) {
        $resultSet = $this->tableGateway->select(function(Select $select) use ($offer_id){
            $select->where(array(
                    'id_offer' => $offer_id,
                    'main' => 1,
                )
            );});
        
        $count_main = count($resultSet);
        if($count_main == 0) {
            $data = array(
                'main'      => 1,
            );

            $update = $this->tableGateway->update($data, 'id = '.$photo_id.'');
            return $update;    
        } else {
            $data = array(
                'main'      => 1,
            );
            $data_main = array(
                'main'      => 0,
            );
            
            $update_main = $this->tableGateway->update($data_main, array(
                'main' => 1,
                'id_offer' => $offer_id,
            ));
            
            $update = $this->tableGateway->update($data, array(
                'main' => 0,
                'id' => $photo_id,
            ));
        }
          
    }
}
