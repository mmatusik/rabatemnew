<?php
namespace Messages\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class MessagesTable
{
    protected $tableGateway;
    private $limit;
    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll($username)
    {
        $resultSet = $this->tableGateway->select(function(Select $select) use ($username){
        $select->where(array(
                'username' => $username,
            )
        );});
        $resultSet->buffer();
        return $resultSet;
    }
    
    public function fetchUnRead($username)
    {
        $resultSet = $this->tableGateway->select(function(Select $select) use ($username){
        $select->where(array(
                'username' => $username,
                'read' => 0,
            )
        );});
        $resultSet->buffer();
        return $resultSet;
    }
    
    public function fetchLimit()
    {
        $resultSet = $this->tableGateway->select(function(Select $select){
        $select->limit(5);});
        return $resultSet;
    }

    public function getOfferId($link)
    {
        $resultSet = $this->tableGateway->select(function(Select $select) use ($link){
        $select->where(array(
                'link' => $link,
            )
        );});
        $row = $resultSet->current();
        return $row;
    }
    
    public function getOffer($link)
    {
        $resultSet = $this->tableGateway->select(function(Select $select) use ($link){
        $select->where(array(
                'id' => $link,
            )
        );});
        $row = $resultSet->current();
        return $row;
    }

    public function addOffer($offer)
    {
        $this->tableGateway->insert($offer);    
    }

    public function genOfferLink ($string) {
        $resultSet = $this->tableGateway->select(array('name' => $string));
        $string = str_replace( $this -> a, $this -> b, $string );
        $string = preg_replace( '#[^a-z0-9]#is', ' ', $string );
        $string = trim( $string );
        $string = preg_replace( '#\s{2,}#', ' ', $string );
        $string = str_replace( ' ', '-', $string );
        $strings = strtolower($string);
        
        if($resultSet->count() != 0) {
            return $strings.uniqid();
        } else {
            return $strings;
        }
    }
    
    public function deleteOffer($id)
    {
        $this->tableGateway->delete(array('id' => $id));    
    }
}
