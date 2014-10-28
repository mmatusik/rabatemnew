<?php

namespace Offer\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\InputFilter\InputFilter;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Adapter\Adapter;

class AddForm extends Form implements InputFilterProviderInterface
{
    protected $adapter;
    public function __construct(AdapterInterface $dbAdapter)
    {
        $this->adapter =$dbAdapter;
                parent::__construct("Test Form");
        $this->setAttribute('method', 'post');
        $this->add(array(
            'type' => 'Zend\Form\Element\Radio',
            'name' => 'colorCheckbox',
            'options' => array(
                'label' => 'Typ oferty',
                'value_options' => array(
                         'code' => 'Kody',
                         'pass' => 'Hasło',
                    ),
                )
        ));
        
        $this->add(array(
            'name' => 'name',
            'attributes' => array(
                'type' => 'text',
                'class'  => 'round default-width-input'
            ),
            'options' => array(
                'label' => 'Nazwa oferty',
                'label_attributes' => array(
                    'class'  => 'label_left'
                ),
            ),
        ));

        $this->add(array(
            'name' => 'keyworlds',
            'attributes' => array(
                'type' => 'text',
                'class'  => 'round default-width-input'
            ),
            'options' => array(
                'label' => 'Słowa kluczowe',
                'label_attributes' => array(
                    'class'  => 'label_left'
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'oldprice',
            'attributes' => array(
                'type' => 'text',
                'class'  => 'round default-width-input'
            ),
            'options' => array(
                'label' => 'Stara cena',
                'label_attributes' => array(
                    'class'  => 'label_left'
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'newprice',
            'attributes' => array(
                'type' => 'text',
                'class'  => 'round default-width-input'
            ),
            'options' => array(
                'label' => 'Nowa cena',
                'label_attributes' => array(
                    'class'  => 'label_left'
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'end_time',
            'attributes' => array(
                'type' => 'text',
                'class'  => 'round default-width-input',
                'id' => 'picker'
            ),
            'options' => array(
                'label' => 'Czas trwania oferty',
                'label_attributes' => array(
                    'class'  => 'label_left'
                ),
            ),
        ));

        $this->add(array(
            'name' => 'code_count',
            'attributes' => array(
                'type' => 'text',
                'class'  => 'round default-width-input'
            ),
            'options' => array(
                'label' => 'Ilość kodów',
                'label_attributes' => array(
                    'class'  => 'label_left'
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'code_per_person',
            'attributes' => array(
                'type' => 'text',
                'class'  => 'round default-width-input'
            ),
            'options' => array(
                'label' => 'Ilośc kodów na osobę',
                'label_attributes' => array(
                    'class'  => 'label_left'
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'pass',
            'attributes' => array(
                'type' => 'text',
                'class'  => 'round default-width-input'
            ),
            'options' => array(
                'label' => 'Hasło',
                'label_attributes' => array(
                    'class'  => 'label_left'
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'disc',
            'attributes' => array(
                'type' => 'textarea',
                'class'  => 'round full-width-textarea'
            ),
            'options' => array(
                'label' => 'Opis oferty',
                'label_attributes' => array(
                    //'class'  => 'label_left'
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'how',
            'attributes' => array(
                'type' => 'textarea',
                'class'  => 'round full-width-textarea'
            ),
            'options' => array(
                'label' => 'Jak skorzystać',
                'label_attributes' => array(
                   // 'class'  => 'label_left'
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'worth',
            'attributes' => array(
                'type' => 'textarea',
                'class'  => 'round full-width-textarea'
            ),
            'options' => array(
                'label' => 'Dlaczego warto',
                'label_attributes' => array(
                    //'class'  => 'label_left'
                ),
            ),
        ));  
        
        $this->add(array(     
            'type' => 'Zend\Form\Element\Select',       
            'name' => 'recommended',
            'attributes' =>  array(
                'class'  => 'round default-width-input select',               
                'options' => array(
                    0 => 'Nie',
                    1 => 'Tak',
                ),
            ),
            'options' => array(
                'label' => 'Polecane',
                'label_attributes' => array(
                    'class'  => 'label_left'
                ),
            ),
        )); 
        
        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'category',
            'attributes' =>  array(
                'class'  => 'round default-width-input select',                
            ),
            'options' => array(
                'value_options' => $this->getOptionsForSelect(),
                'label' => 'Kategoria',
                'label_attributes' => array(
                    'class'  => 'label_left'
                ),
                )
        ));
        
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Dalej',
                'class' => 'button round blue image-right ic-right-arrow',
            ),
        ));
    }

    public function getInputFilterSpecification()
    {

        return array(
            array(
                'name' => 'newprice',
                'required' => true,
                'validators' => array(
                    array(
                        'name' => 'Digits',
                    )
                ),  
            ),
            array(
                'name' => 'oldprice',
                'required' => true,
                'validators' => array(
                    array(
                        'name' => 'Digits',
                    )
                ),  
            ),        
            array(
                'name' => 'colorCheckbox',
                'required' => true, 
            ),
            array(
                'name' => 'name',
                'required' => true, 
            ),
            array(
                'name' => 'end_time',
                'required' => true, 
            ),
            array(
                'name' => 'worth',
                'required' => true, 
            ),
            array(
                'name' => 'how',
                'required' => true, 
            ),
            array(
                'name' => 'disc',
                'required' => true, 
            ),
            array(
                'name' => 'keyworlds',
                'required' => true, 
            ),
            array(
                'name' => 'pass',
                'required' => false, 
            ),
            array(
                'name' => 'code_count',
                'required' => false, 
                'validators' => array(
                    array(
                        'name' => 'Digits',
                    )
                ), 
            ),
            array(
                'name' => 'code_per_person',
                'required' => false,
                'validators' => array(
                    array(
                        'name' => 'Digits',
                    )
                ), 
            ),
        );
    }
    
    public function getOptionsForSelect()
    {
        $dbAdapter = $this->adapter;
        $sql       = 'SELECT id,name  FROM categories';
        $statement = $dbAdapter->query($sql);
        $result    = $statement->execute();

        $selectData = array();

        foreach ($result as $res) {
            $selectData[$res['id']] = $res['name'];
        }
        return $selectData;
    }
}
