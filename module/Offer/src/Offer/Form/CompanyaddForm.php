<?php

namespace Offer\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\InputFilter\InputFilter;

class CompanyaddForm extends Form implements InputFilterProviderInterface
{
    public function init()
    {
        $this->add(array(
            'name' => 'name',
            'attributes' => array(
                'type' => 'text',
                'class'  => 'round default-width-input',
                'id' => 'tags'
            ),
            'options' => array(
                'label' => 'Nazwa',
                'label_attributes' => array(
                    'for'  => 'tags',
                    'class'  => 'label_max'
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'city',
            'attributes' => array(
                'type' => 'text',
                'class'  => 'round default-width-input',
                'id' => 'tags'
            ),
            'options' => array(
                'label' => 'Miasto',
                'label_attributes' => array(
                    'for'  => 'tags',
                    'class'  => 'label_max'
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'address',
            'attributes' => array(
                'type' => 'text',
                'class'  => 'round default-width-input',
                'id' => 'tags'
            ),
            'options' => array(
                'label' => 'Adres',
                'label_attributes' => array(
                    'for'  => 'tags',
                    'class'  => 'label_max'
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'phone',
            'attributes' => array(
                'type' => 'text',
                'class'  => 'round default-width-input',
                'id' => 'tags'
            ),
            'options' => array(
                'label' => 'Telefon kontaktowy',
                'label_attributes' => array(
                    'for'  => 'tags',
                    'class'  => 'label_max'
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'email',
            'attributes' => array(
                'type' => 'text',
                'class'  => 'round default-width-input',
                'id' => 'tags'
            ),
            'options' => array(
                'label' => 'E-mail',
                'label_attributes' => array(
                    'for'  => 'tags',
                    'class'  => 'label_max'
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'website',
            'attributes' => array(
                'type' => 'text',
                'class'  => 'round default-width-input',
                'id' => 'tags'
            ),
            'options' => array(
                'label' => 'Strona internetowa',
                'label_attributes' => array(
                    'for'  => 'tags',
                    'class'  => 'label_max'
                ),
            ),
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
                'name' => 'name',
                'required' => true,
            ),
        );
    }
}
