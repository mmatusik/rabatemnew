<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Messages\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    
    public function indexAction()
    {
        $messagesTable = $this->getMessagesTable();
        $username = $this->zfcUserAuthentication()->getIdentity()->getUsername();
        
        $viewmodel = new ViewModel(array(
                'messages' => $messagesTable->fetchAll($username),
            ));
         
        return $viewmodel;
    
    }
    
    public function getMessagesTable()
    {
        if (!$this->messagesTable) {
            $sm = $this->getServiceLocator();
            $this->messagesTable = $sm->get('Messages\Model\MessagesTable');
        }
        return $this->messagesTable;
    }
    
}
