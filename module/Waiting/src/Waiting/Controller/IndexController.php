<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Waiting\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    
    public function indexAction()
    {
        
        $offerTable = $this->getOfferTable();
        $offercityTable = $this->getOfferCityTable();
        $cityTable = $this->getCityTable();
        $id_admin = $this->zfcUserAuthentication()->getIdentity()->getId();
        foreach($cityTable->getCityAdmin($id_admin) as $off) {
            foreach($offercityTable->getNotActive() as $offe) {
                foreach($cityTable->fetchAll() as $city) {
                    if($city->id == $offe->id_city) {
                        $cityname[] = $city->name;
                    }
                }
                if($off->id == $offe->id_city) {
                    foreach($offerTable->fetchall() as $offer) {
                        if($offe->id_offer == $offer->id) {
                            $offername[] = $offer->name;
                            
                        }                                               
                    }
                }
                $offerid[] = $offe->id;
            }          
        }

        $waiting_offers_count = count($offername);
        $offers_count = count($offernames);
        $viewmodel = new ViewModel(array(
            'offername' => $offername,
            'offerid' => $offerid,
            'cityname' => $cityname,
            'waiting_offers_count' => $waiting_offers_count,
        ));
        return $viewmodel;
    
    }
    
    public function acceptAction()
    {
        $logsTable = $this->getLogsTable();
        $id_admin = $this->zfcUserAuthentication()->getIdentity()->getId();
        $offerTable = $this->getOfferTable();
        $link = $this->params('id');
        $city = $this->params('city');
        $offercityTable = $this->getOfferCityTable();
        $upload = array(
            'active' => 1,
        );
        
        $offercity = $offercityTable->getOfferId($link);
        $offer = $offerTable->getOffer($offercity->id_offer);
        $offercityTable->acceptOffer($upload, $link, $offer->name);
        $logsTable->addLog('addoffer', $id_admin, $offer->name, $city);
        
        $viewmodel = new ViewModel();
        return $viewmodel;
    
    }
    
    public function refuseAction()
    {
        $link = $this->params('id');
        $city = $this->params('city');
        $offercityTable = $this->getOfferCityTable();
        $logsTable = $this->getLogsTable();
        $id_admin = $this->zfcUserAuthentication()->getIdentity()->getId();
        
        $offercityTable->refuseOffer($link);
        $logsTable->addLog('refuseoffer', $id_admin, $offer->name, $city);
        
        $viewmodel = new ViewModel();
        return $viewmodel;
    
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
        if (!$this->LogsTable) {
            $sm = $this->getServiceLocator();
            $this->LogsTable = $sm->get('Offer\Model\LogsTable');
        }
        return $this->LogsTable;
    }
    
    public function getCityTable()
    {
        if (!$this->cityTable) {
            $sm = $this->getServiceLocator();
            $this->cityTable = $sm->get('Offer\Model\CityTable');
        }
        return $this->cityTable;
    }
    
}
