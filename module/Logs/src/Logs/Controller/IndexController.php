<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Logs\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    
    public function indexAction()
    {
        $logsTable = $this->getLogsTable();
        $id_admin = $this->zfcUserAuthentication()->getIdentity()->getId();
       
        $viewmodel = new ViewModel(array(
                'logs' => $logsTable->fetchUser($id_admin),
            ));
        
        $logsTable->setRead($id_admin);
         
        return $viewmodel;
    
    }
    
    public function offerlogsAction()
    {
        $offerlogsTable = $this->getOfferLogsTable();
        $id_admin = $this->zfcUserAuthentication()->getIdentity()->getId();
       
        $viewmodel = new ViewModel(array(
                'logs' => $offerlogsTable->fetchByAdminId($id_admin),
            ));
        
         
        return $viewmodel;
    
    }
    
    public function getLogsTable()
    {
        if (!$this->logsTable) {
            $sm = $this->getServiceLocator();
            $this->logsTable = $sm->get('Offer\Model\LogsTable');
        }
        return $this->logsTable;
    }
    
    public function getOfferLogsTable()
    {
        if (!$this->offerLogsTable) {
            $sm = $this->getServiceLocator();
            $this->offerLogsTable = $sm->get('Logs\Model\OfferLogsTable');
        }
        return $this->offerLogsTable;
    }
    
}
