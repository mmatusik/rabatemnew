<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Dashboard\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    const ROUTE_LOGIN        = 'zfcuser/login';
    protected $offerTable;
    public function indexAction()
    {
        $offerTable = $this->getOfferTable();
        $offercityTable = $this->getOfferCityTable();
        $cityTable = $this->getCityTable();
        $logsTable = $this->getLogsTable();
        $addressTable = $this->getAdressessTable();
        $addressLinkTable = $this->getaOfferTable();
        $messagesTable = $this->getMessagesTable();
        $id_admin = $this->zfcUserAuthentication()->getIdentity()->getId();
        $username = $this->zfcUserAuthentication()->getIdentity()->getUsername();
        
        foreach($logsTable->getUnread($id_admin) as $log) {
            $logs[] = $log->id;
        }
        $logs_count = count($logs);
        
        foreach($cityTable->getCityAdmin($id_admin) as $off2a) { //Miasta admina
            foreach($offercityTable->getNotActive() as $offe2a) { //Pobera aktywne oferty
                if($off2a->id == $offe2a->id_city) { //Jeżeli id oferty == id miasta admina, wyswietla
                    $offer_not_active[] = $offe2a->id_city;
                }
            }
        }    
        
        
        
        foreach($cityTable->getCityAdmin($id_admin) as $off2) { //Miasta admina
            foreach($offercityTable->getActive() as $offe2) { //Pobera aktywne oferty
                if($off2->id == $offe2->id_city) { //Jeżeli id oferty == id miasta admina, wyswietla
                    foreach($offerTable->fetchLimit() as $offer2) { //Pobiera wszystkie oferty
                        if($offe2->id_offer == $offer2->id) { //Jezeli id oferty == id wyswietla
                            $offernames[] = $offer2->name;
                            $offerid[] = $offer2->id;
                            $offerend[] = $offer2->end_time;
                            $offerlink[] = $offer2->link;
                            
                            foreach($addressLinkTable->getaCityId($offer2->id) as $aoffer) {
                                $id_address[] = $aoffer->id_adress;
                                foreach($addressTable->getAddressId($aoffer->id_adress) as $address) {
                                    if($aoffer->id_adress == $address->id) {
                                        $address_company[] = $address->company;
                                        $address_phone[] = $address->phone;
                                        $address_email[] = $address->email;
                                    }
                                }
                            }
                        }
                    }                                        
                }
            }          
        }
        
               
        $waiting_offers_count = count($offer_not_active);
        $offers_count = count($offernames);
        $viewmodel = new ViewModel(array(
            'unread' => count($messagesTable->fetchUnRead($username)),
            'offernames' => $offernames,
            'offerid' => $offerid,
            'offerlink' => $offerlink,
            'id_address' => $id_address,
            'address_phone' => $address_phone,
            'address_email' => $address_email,
            'logs_count' => $logs_count,
            'offerend' => $offerend,
            'address_company' => $address_company,
            'waiting_offers_count' => $waiting_offers_count,
        ));
        
        return $viewmodel;
    
    }
    
    public function recAction()
    {
        return new ViewModel();
    }
    
    public function getOfferTable()
    {
        if (!$this->offerTable) {
            $sm = $this->getServiceLocator();
            $this->offerTable = $sm->get('Dashboard\Model\OfferTable');
        }
        return $this->offerTable;
    }
    
    public function getOfferCityTable()
    {
        if (!$this->offercityTable) {
            $sm = $this->getServiceLocator();
            $this->offercityTable = $sm->get('Offer\Model\OfferCityTable');
        }
        return $this->offercityTable;
    }
    
    public function getLogsTable()
    {
        if (!$this->logsTable) {
            $sm = $this->getServiceLocator();
            $this->logsTable = $sm->get('Offer\Model\LogsTable');
        }
        return $this->logsTable;
    }
    
    public function getCityTable()
    {
        if (!$this->cityTable) {
            $sm = $this->getServiceLocator();
            $this->cityTable = $sm->get('Offer\Model\CityTable');
        }
        return $this->cityTable;
    }
    
    public function getAdressessTable()
    {
        if (!$this->adressessTable) {
            $sm = $this->getServiceLocator();
            $this->adressessTable = $sm->get('Offer\Model\AdressessTable');
        }
        return $this->adressessTable;
    }
    
    public function getaOfferTable()
    {
        if (!$this->aofferTable) {
            $sm = $this->getServiceLocator();
            $this->aofferTable = $sm->get('Offer\Model\aOfferTable');
        }
        return $this->aofferTable;
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
