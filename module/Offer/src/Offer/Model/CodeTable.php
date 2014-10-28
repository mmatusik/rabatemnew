<?php
namespace Offer\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class CodeTable
{
    protected $tableGateway;
    private $limit;
    
    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        
        return $resultSet;
    }

    public function getCodeByOfferLink($offer_link)
    {
        $resultSet = $this->tableGateway->select(function(Select $select) use ($offer_link){
        $select->where(array(
                'email' => null,
                'use' => 0,
                'offer_link' => $offer_link,
            )
        );});
        $row = $resultSet->current();
        if($row == null) {
            return FALSE;
        } else {
            return $row; 
        }       
    }
    
    public function fetchUser($id_admin)
    {
        $resultSet = $this->tableGateway->select(function(Select $select) use ($id_admin){
        $select->where(array(
                'user_id' => $id_admin,
            )
        )->order('date DESC');});
        return $resultSet;
    }
    
    public function updateCode ($code, $email) {
        $hash = md5($code);
        $host = $_SERVER['REMOTE_ADDR'];
        $data = array(
            'hash' => $hash,
            'host' => $host,
            'email' => $email,
            'use' => 1,
        );

        $update = $this->tableGateway->update($data, array('code' => $code, 'use' => 0));
        return $update;    
    }

    public function addCode($offer_link)
    {   
        $code = uniqid();    
        $log = array(
                'offer_link' => $offer_link,
                'code' => $code,
            );
        $this->tableGateway->insert($log);    
    }
    public function countCode($offer_link) {
        $resultSet = $this->tableGateway->select(function(Select $select) use ($offer_link){
            $select->where(array(
                    'offer_link' => $offer_link,                   
                )
            );});
        
        return count($resultSet);
    }    
    public function updateCodeEdit($link_new, $link_old)
    {
        $data = array(
                'offer_link' => $link_new,
            );

        $update = $this->tableGateway->update($data, array('offer_link' => $link_old));
        return $update;  
    }
}
