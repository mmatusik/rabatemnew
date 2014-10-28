<?php
namespace Offer\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Offer\Form\CityForm;
use Offer\Form\AddForm;
use Offer\Form\PhotoForm;
use Zend\Mvc\Controller;
use Zend\File\Transfer\Adapter\Http;
use Zend\Validator\File;
use Offer\Controller\PhotoController;

class IndexController extends AbstractActionController
{
    protected $offerTable;
    protected $adressesTable;
    protected $adressesofferTable;
    
    public function indexAction()
    {
        $offerTable = $this->getOfferTable();
        $offercityTable = $this->getOfferCityTable();
        $cityTable = $this->getCityTable();
        $addressTable = $this->getAdressessTable();
        $addressLinkTable = $this->getaOfferTable();
        $id_admin = $this->zfcUserAuthentication()->getIdentity()->getId();
        

        
        foreach($cityTable->getCityAdmin($id_admin) as $off2) { //Miasta admina
            foreach($offercityTable->getActive() as $offe2) { //Pobera aktywne oferty
                if($off2->id == $offe2->id_city) { //Jeżeli id oferty == id miasta admina, wyswietla
                    foreach($offerTable->fetchall() as $offer2) { //Pobiera wszystkie oferty
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
        
               
        $waiting_offers_count = count($offername);
        $offers_count = count($offernames);
        $viewmodel = new ViewModel(array(
            'offernames' => $offernames,
            'offerid' => $offerid,
            'offerlink' => $offerlink,
            'id_address' => $id_address,
            'address_phone' => $address_phone,
            'address_email' => $address_email,
            'offerend' => $offerend,
            'address_company' => $address_company,
        ));
        return $viewmodel;   
    }
    
    public function addAction()
    {
        $dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
        $form = new AddForm ($dbAdapter);
        $request = $this->getRequest();
        $offerTable = $this->getOfferTable();
        $codeTable = $this->getCodeTable();
        if ($request->isPost()) {  
            $form->setData($request->getPost());
          
            if ($form->isValid()) { 
                $time = time();
                $godzina = date('H:i:s');
                $end_time_1 = $request->getPost('end_time').' '.$godzina.''; 
                $end_time = strtotime($end_time_1);
                
                $keyworlds = $request->getPost('keyworlds');
                $link = $offerTable->genOfferLink($request->getPost('keyworlds'));
                $linkz = $link.'-'.uniqid();
                echo $linkz;
                for ($i = 1; $i <= $request->getPost('code_count'); $i++) {
                    $codeTable->addCode($linkz);
                }
                $offer = array(
                    'name' => $request->getPost('name'),
                    'disc' => $request->getPost('disc'),
                    'how' => $request->getPost('how'),
                    'worth' => $request->getPost('worth'),
                    'old_price' => $request->getPost('oldprice'),
                    'new_price' => $request->getPost('newprice'),
                    'add_time' => $time,
                    'end_time' => $end_time,
                    'pass' => $request->getPost('pass'),
                    'id_category' => $request->getPost('category'),
                    'link' => $linkz,
                    'keyworlds' => $keyworlds,
                    'recommended' => $request->getPost('recommended'),
                    'code_per_person' => $request->getPost('code_per_person'),
                );
                    
                $offerTable->addOffer($offer); //DODANIE OFERTY                               
                return $this->redirect()->toRoute('offer', array('action' => 'company', 'link' => $linkz, ));
            }
        }
        
        $viewmodel = new ViewModel();
        $viewmodel->setVariable('form', $form);
        return $viewmodel;
    }
    
    public function companyAction()
    {
        $form = $this->getServiceLocator()->get('FormElementManager')->get('CompanyForm');
        $request = $this->getRequest();
        $offerTable = $this->getOfferTable();
        $adressTable = $this->getAdressessTable();
        $link = $this->params('link');
        $id = $this->params('id');
        $name = $request->getPost('company');
        $offer_id = $offerTable->getOfferId($link);
        $adress_id = $adressTable->getAdressId($name);
        
        if ($request->isPost()) {  
            $form->setData($request->getPost());
            if ($form->isValid()) {               
                $adress = array(
                    'id_offer' => $offer_id->id,
                    'id_adress' => $adress_id->id,
                );
                $this->getaOfferTable()->addAdressOffer($adress); //DODANIE ADRESU OFERTY
                return $this->redirect()->toRoute('offer', array('action' => 'photo', 'link' => $link, ));               
            }
        }
        
        $viewmodel = new ViewModel();
        //$viewmodel->setVariable('form', $form);
        $viewmodel->setVariable('form', $form);
        $viewmodel->setVariable('link', $link);
        $viewmodel->setVariable('id', $id);
        $viewmodel->setVariable('addresses', $this->getAdressessTable()->fetchAll());
        return $viewmodel;
    }
    
    public function companyaddAction()
    {
        $form = $this->getServiceLocator()->get('FormElementManager')->get('CompanyaddForm');
        $request = $this->getRequest();
        $link = $this->params('link');
        $companyTable = $this->getAdressessTable();
        
        if ($request->isPost()) {  
            $form->setData($request->getPost());
            if ($form->isValid()) {    
                $company = array(
                    'company' => $request->getPost('name'),
                    'address' => $request->getPost('address'),
                    'city' => $request->getPost('city'),
                    'phone' => $request->getPost('phone'),
                    'website' => $request->getPost('website'),
                    'email' => $request->getPost('email'),
                );
                $companyTable->addCompany($company);          
                return $this->redirect()->toRoute('offer', array('action' => 'company', 'link' => $link, 'id' => $request->getPost('name') ));
                   
            }
        }
        
        
        $viewmodel = new ViewModel();
        $viewmodel->setVariable('form', $form);
        return $viewmodel;
    }
    
    public function photoAction()
    {
        $form = new PhotoForm('upload-form');
        $viewmodel = new ViewModel();
        $request = $this->getRequest();
        $photoTable = $this->getPhotoTable();
        $offerTable = $this->getOfferTable();
        $img = new PhotoController();
        
        $link = $this->params('link');
        $id = $this->params('id');
        $viewmodel->setVariable('id', $id); 
        $viewmodel->setVariable('link', $link);               
        $offer = $offerTable->getOfferId($link);
                
        if($this->params('id') == 1) {
            $add_photos = $photoTable->fetchall($offer->id);
            $viewmodel->setVariable('add_photos', $add_photos);
        }
        if ($request->isPost()) {              
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $files = $form->getData();
                $fileinfo = $this->params()->fromFiles('image');
                $filecount = count($fileinfo)-1;
                
                $ext = strchr($fileinfo[0]['type'], "/"); 
                 
                
                
                for ($x=0; $x<=$filecount; $x++) {
                    $num = uniqid();
                        
                    $photos = array(
                        'id_offer' => $offer->id,
                        'src' => $num.'_'.$fileinfo[$x]['name'],
                    ); 
                                        
                    $name = $fileinfo[$x]['name'];
                    $size = getimagesize($fileinfo[$x]['tmp_name']);
                    $width  = $size[0];
                    $height = $size[1];
                    $centreX = round($width / 2);
                    $centreY = round($height / 2);

                    $cropWidth  = 400;
                    $cropHeight = 200;
                    $cropWidthHalf  = round($cropWidth / 2); // could hard-code this but I'm keeping it flexible
                    $cropHeightHalf = round($cropHeight / 2);

                    $x1 = max(0, $centreX - $cropWidthHalf);
                    $y1 = max(0, $centreY - $cropHeightHalf);

                    $x2 = min($width, $centreX + $cropWidthHalf);
                    $y2 = min($height, $centreY + $cropHeightHalf);
                    
                    try {
                        $img->load($fileinfo[$x]['tmp_name'])->save(APPLICATION_PATH . '/../data/upload/'. $num.'_'.$name, 'jpeg');
                        //$img->load($fileinfo[$x]['tmp_name'])->crop($x1, $y1, $x2, $y2)->save(APPLICATION_PATH . '/../data/upload/' . $num.'_'.$name, 'jpeg');
                        $photoTable->addPhoto($photos);
                    } catch(Exception $e) {
                        echo 'Error: ' . $e->getMessage();
                    }
                    
                } 
		return $this->redirect()->toRoute('offer', array('action' => 'photo', 'link' => $link, 'id'=> 1 ));
            //var_dump($fileinfo);
            }
			
        }
   
        
        $viewmodel->setVariable('form', $form);
        
        return $viewmodel;
    
    }

    public function setmainAction() {
        $link = $this->params('link');
        $id = $this->params('id');
        $photoTable = $this->getPhotoTable();
        $offerTable = $this->getOfferTable();               
        $offer = $offerTable->getOfferId($link);
               
        $photoTable->setMain($id, $offer->id);
        return $this->redirect()->toRoute('offer', array('action' => 'city', 'link' => $link, ));
    }
    
    public function cityAction()
    {
        $dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
        $id_admin = $this->zfcUserAuthentication()->getIdentity()->getId();
        $form = new CityForm ($dbAdapter, $id_admin);
        $logsTable = $this->getLogsTable();
        $request = $this->getRequest();
        $cityoffer = $this->getOfferCityTable();
        $offerTable = $this->getOfferTable();
        $city = $this->getCityTable();                      
        $link = $this->params('link');
        if ($request->isPost()) {  
            $tabs = $request->getPost('ourcity');
            $t = count($tabs)-1;
            $tabs2 = $request->getPost('othercity');
            $d = count($tabs2)-1;
            $offer = $offerTable->getOfferId($link); 

                for ($x=0; $x<=$t; $x++) {
                    $ct = $city->getCityId($tabs[$x]);
                    $ct2 = $city->getCityById($tabs[$x]);
                    $cityofferadd = array(
                        'id_city' => $tabs[$x],
                        'id_offer' => $offer->id,
                        'active' => 1,
                    );
                    $cityoffer->addOfferCity($cityofferadd);
                    
                    $logsTable->addLog('addoffer', $id_admin, $offer->name, $ct2->name);
                } 
                
                for ($x=0; $x<=$d; $x++) {
                    $ct = $city->getCityId($tabs2[$x]);
                    $cityofferadd2 = array(
                        'id_city' => $tabs2[$x],
                        'id_offer' => $offer->id,
                        'active' => 0,
                    );
                    $cityoffer->addOfferCity($cityofferadd2);
                }   
                              
            return $this->redirect()->toRoute('offer', array('action' => 'success', 'link' => $link, ));
        }
        
        $viewmodel = new ViewModel();
        $viewmodel->setVariable('form', $form);
        return $viewmodel;
    }
    
    public function successAction() 
    {
        $link = $this->params('link');

        $viewmodel = new ViewModel(
                array('link' => $link,)
                );
        return $viewmodel;
    }
    
    public function categoryAction()
    {
        $categoryTable = $this->getCategoryTable();
        $categories = $categoryTable->fetchAll();
        
        $viewmodel = new ViewModel(
                    array(
                        'categories' => $categories,
                    )
                );
        return $viewmodel;
    }   
    
    public function deleteAction()
    {
        $link = $this->params('id');
        $offercityTable = $this->getOfferCityTable();
        
        $offercityTable->refuseOffer($link);
        
        $viewmodel = new ViewModel();
        return $viewmodel;
    }  
    
    public function getLogsTable()
    {
        if (!$this->LogsTable) {
            $sm = $this->getServiceLocator();
            $this->LogsTable = $sm->get('Offer\Model\LogsTable');
        }
        return $this->LogsTable;
    }
    
    public function getOfferTable()
    {
        if (!$this->offerTable) {
            $sm = $this->getServiceLocator();
            $this->offerTable = $sm->get('Dashboard\Model\OfferTable');
        }
        return $this->offerTable;
    }
    
    public function getAdressessTable()
    {
        if (!$this->adressessTable) {
            $sm = $this->getServiceLocator();
            $this->adressessTable = $sm->get('Offer\Model\AdressessTable');
        }
        return $this->adressessTable;
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
    
    public function getOfferCityTable()
    {
        if (!$this->offercityTable) {
            $sm = $this->getServiceLocator();
            $this->offercityTable = $sm->get('Offer\Model\OfferCityTable');
        }
        return $this->offercityTable;
    }
    
    public function getCityTable()
    {
        if (!$this->cityTable) {
            $sm = $this->getServiceLocator();
            $this->cityTable = $sm->get('Offer\Model\CityTable');
        }
        return $this->cityTable;
    }
    
    public function getPhotoTable()
    {
        if (!$this->photoTable) {
            $sm = $this->getServiceLocator();
            $this->photoTable = $sm->get('City\Model\PhotoTable');
        }
        return $this->photoTable;
    }
    
    public function getCategoryTable()
    {
        if (!$this->categoryTable) {
            $sm = $this->getServiceLocator();
            $this->categoryTable = $sm->get('Offer\Model\CategoryTable');
        }
        return $this->categoryTable;
    }
}
