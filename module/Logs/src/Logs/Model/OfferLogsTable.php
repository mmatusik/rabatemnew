<?php
namespace Logs\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class OfferLogsTable
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
    public function fetchByAdminId($id_admin)
    {
        $resultSet = $this->tableGateway->select(function(Select $select) use ($id_admin){
        $select->where(array(
                'user_id' => $id_admin,
            )
        )->order('date DESC');});
        return $resultSet;
    }
    public function addLog($action, $user_id, $email, $offer, $city = null, $code = null)
    {
        $time = time();
        if($action == 'success') {
            $disc = 'Kod <b>'.$code.'</b> został wysłany na adres e-mail: <b>'.$email.'</b>. - Oferta: <u>'.$offer.'</u>';              
        } elseif($action == 'fail-nocode') {
            $disc = 'Kod nie został wysłany na adres e-mail: <b>'.$email.'</b>. Powód: <b>Brak kodów</b> - Oferta: <u>'.$offer.'</u>';              
        } 
        
        $log = array(
                'action' => $action,
                'user_id' => $user_id,
                'disc' => $disc,
                'email' => $email,
                'date' => $time,
                'city' => $city,
            );
        $this->tableGateway->insert($log);    
    }
}
