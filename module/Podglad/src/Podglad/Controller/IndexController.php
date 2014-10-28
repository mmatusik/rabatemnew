<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Podglad\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Podglad\Form\DownForm;
use Zend\Mail;
use Zend\Mail\Transport\Smtp as SmtpTransport;
use Zend\Mail\Transport\SmtpOptions;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $form = $this->getServiceLocator()->get('FormElementManager')->get('DownForm');
        $request = $this->getRequest();
        $link = $this->params('link');
        $offerTable = $this->getOfferTable(); //Pobieranie tabeli
        $photoTable = $this->getPhotoTable();
        $aofferTable = $this->getaOfferTable();
        $addresTable = $this->getAdressessTable();
        $offer = $offerTable->fetchOffer($link); //Wyświetlanie wyniku
        
        if($offer == NULL) {
            $offer_zero = TRUE;
        }
        $aoffer = $aofferTable->getAdressByOfferId($offer->id);
        $adress = $addresTable->getAdressById($aoffer->id_adress);
        if($offer->new_price) {
            $pr = $offer->new_price / $offer->old_price * 100;
        } 
        
	$percent = round(100-$pr); // Obliczanie rabatu
        $photos = $photoTable->fetchall($offer->id);       
        
        $request = $this->getRequest();
        
        if ($request->isPost()) {  
            $form->setData($request->getPost());
          echo 'POST-';
            if ($form->isValid()) { 
                echo 'Valid';
            }
        }
        $viewmodel = new ViewModel(array(
            'name' => $offer->name,
            'old_price' => $offer->old_price,
            'new_price' => $offer->new_price,
            'disc' => $offer->disc,
            'worth' => $offer->worth,
            'how' => $offer->how,
            'percent' => $percent,
            'photos' => $photos,
            'phone' => $adress->phone,
            'company' => $adress->company,
            'addres' => $adress->address,
            'city' => $adress->city,
            'website' => $adress->website,
            'email' => $adress->email,
            'link' => $offer->link,
            'form' => $form,
            'offer_zero' => $offer_zero,
        ));
        return $viewmodel;
    
    }
    
    public function pobierzAction()
    {
        
        $form = $this->getServiceLocator()->get('FormElementManager')->get('DownForm');
         
        $link = $this->params('link');
        $offerTable = $this->getOfferTable();
        $codeTable = $this->getCodeTable();
        $offerLogsTable = $this->getOfferLogsTable();
        $cityTable = $this->getCityTable();
        $city = $cityTable->getCityIdLink($_COOKIE['city']);
        $request = $this->getRequest();
        /* INFO DO LOGÓW */
        $admin_id = $city->id_admin;
        $city = $city->name;
        if($request->getPost('email')) {
            $email = $request->getPost('email');
        } 
        $offer_info = $offerTable->getOfferId($link);
        $offer = $offer_info->name;
        if($offer_info->pass == NULL) {
            $code = $codeTable->getCodeByOfferLink($link)->code;
        } else {
            $code = $offer_info->pass;
        }
        
        
        if ($request->isPost()) {  
            $form->setData($request->getPost());
            if($code->code == null && $offer_info->pass == NULL && $form->isValid() == FALSE) {
            //echo 'Brak kodów';
            $offerLogsTable->addLog('fail-nocode', $admin_id, $email, $offer, $city);
            } elseif ($form->isValid()) { 
                    $postEmail = $request->getPost('email');
                    $codeTable->updateCode($code->code, $postEmail);
                    $transport = new SmtpTransport();
                    $options   = new SmtpOptions(array(
                        'name'              => 'ns0.ovh.net',
                        'host'              => 'ns0.ovh.net',                    
                        'port' => 587,
                        'connection_class'  => 'login',
                        'connection_config' => array(
                            'username' => 'rabatem@rabatem.pl',
                            'password' => '123was45678',                       
                        ),
                    ));
                    $transport->setOptions($options);
                    $mail = new Mail\Message();
                    $mail->setBody('KOD do oferty: '.$code);
                    $mail->setFrom('rabatem@rabatem.pl', 'Rabatem');
                    $mail->addTo($postEmail, 'Email');
                    $mail->setSubject('Twój kod Rabatowy');

                    $transport->send($mail);
                    $offerLogsTable->addLog('success', $admin_id, $email, $offer, $city, $code);
                
            }
        }
        $viewmodel = new ViewModel(array(
            'form' => $form,
        ));
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
    
    public function getPhotoTable()
    {
        if (!$this->photoTable) {
            $sm = $this->getServiceLocator();
            $this->photoTable = $sm->get('City\Model\PhotoTable');
        }
        return $this->photoTable;
    }
    
    public function getOfferLogsTable()
    {
        if (!$this->offerLogsTable) {
            $sm = $this->getServiceLocator();
            $this->offerLogsTable = $sm->get('Logs\Model\OfferLogsTable');
        }
        return $this->offerLogsTable;
    }
    
    public function getAdressessTable()
    {
        if (!$this->adressessTable) {
            $sm = $this->getServiceLocator();
            $this->adressessTable = $sm->get('Offer\Model\AdressessTable');
        }
        return $this->adressessTable;
    }
    
    public function getCityTable()
    {
        if (!$this->cityTable) {
            $sm = $this->getServiceLocator();
            $this->cityTable = $sm->get('Offer\Model\CityTable');
        }
        return $this->cityTable;
    }
    
    public function getCodeTable()
    {
        if (!$this->codeTable) {
            $sm = $this->getServiceLocator();
            $this->codeTable = $sm->get('Offer\Model\CodeTable');
        }
        return $this->codeTable;
    }
    
    public function getaOfferTable()
    {
        if (!$this->aofferTable) {
            $sm = $this->getServiceLocator();
            $this->aofferTable = $sm->get('Offer\Model\aOfferTable');
        }
        return $this->aofferTable;
    }
    
}
