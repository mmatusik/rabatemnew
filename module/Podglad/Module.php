<?php
namespace Podglad;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Dashboard\Model\Offer;
use Dashboard\Model\OfferTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\ModuleManager;

class Module
{
    public function init(ModuleManager $manager)
    {
        $events = $manager->getEventManager();
        $sharedEvents = $events->getSharedManager();
        $sharedEvents->attach(__NAMESPACE__, 'dispatch', function($e) {
            $controller = $e->getTarget();
            if (get_class($controller) == 'Podglad\Controller\IndexController')         {
                $controller->layout('layout/rabat');
            }
        }, 100);
    }
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',               
            ),
            'Zend\Loader\StandardAutoloader' => array(
                __DIR__ . '/autoload_login.php',
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
    public function getServiceConfig()
    {
        return array(

        );
    }

}