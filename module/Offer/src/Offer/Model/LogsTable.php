<?php
namespace Offer\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class LogsTable
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

    public function getUnread($id_user)
    {
        $resultSet = $this->tableGateway->select(function(Select $select) use ($id_user){
        $select->where(array(
                'read' => 0,
                'user_id' => $id_user,
            )
        );});
        return $resultSet;
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
    
    public function setRead ($user_id) {
        $data = array(
            'read'      => 1,
        );

        $update = $this->tableGateway->update($data, 'user_id = '.$user_id.'');
        return $update;    
    }

        public function addLog($action, $user_id, $offer_title = null, $city = null)
    {
        $time = time();
        if($action == 'addoffer') {
            $disc = 'Oferta <b>'.$offer_title.'</b> została dodana pomyślnie.';              
        } elseif($action == 'deleteoffer') {
            $disc = 'Oferta <b>'.$offer_title.'</b> została usunięta pomyślnie.';
        } elseif($action == 'refuseoffer') {
            $disc = 'Oferta <b>'.$offer_title.'</b> została odrzucona pomyślnie.';
        } elseif($action == 'editoffer') {
            $disc = 'Oferta <b>'.$offer_title.'</b> została zapisana pomyślnie.';
        }  
        
        $log = array(
                'action' => $action,
                'user_id' => $user_id,
                'disc' => $disc,
                'read' => 0,
                'date' => $time,
                'city' => $city,
            );
        $this->tableGateway->insert($log);    
    }
}
